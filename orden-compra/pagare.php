<?php

require_once("../../lib/dompdf/dompdf_config.inc.php");

$gui = file_get_contents('pagarehtml.php');



/*POST - DATOS PARA EL PAGARE*/

$razon_social = $_POST['raz_soc'];

if (isset($_POST['rep-legal'])) {

	$direccion_rep_legal = $_POST['dir_rep_legal'];

} else {

	$direccion_rep_legal = '';

}

$vendedor = $_POST['vendedor'];

$rut = $_POST['rut'];

if (isset($_POST['rut_rep_legal'])) {

	$rut_rep_legal = $_POST['rut_rep_legal'];

} else {

	$rut_rep_legal = '';

}

$comuna = $_POST['com'];

if (isset($_POST['com_rep_legal'])) {

	$comuna_rep_legal = $_POST['com_rep_legal'];

} else {

	$comuna_rep_legal = '';

}

$pago_inicial = $_POST["pago_inicial"];

$total_compra = $_POST['totalCompra'];



$total_compra = $total_compra * 1.19;

$total_compra = $total_compra - $pago_inicial;

$total_adeudado_coniva = floor($total_compra);

/*

$total_adeudado = $_POST['total_adeudado'];

$total_adeudado = $total_adeudado;

*/



$region = $_POST['reg'];

if (isset($_POST['reg_rep_legal'])) {

	$reg_rep_legal = $_POST['reg_rep_legal'];

} else {

	$reg_rep_legal = '';

}

$direccion = $_POST['dir'];

if (isset($_POST['rep-legal'])) {

	$direccion_rep_legal = $_POST['dir_rep_legal'];

} else {

	$direccion_rep_legal = '';

}

$telefono = $_POST['tel'];

if (isset($_POST['tel_rep_legal'])) {

	$tel_rep_legal = $_POST['tel_rep_legal'];

} else {

	$tel_rep_legal = '';

}

$fecha_orden_compra = $_POST['date'];

$dia_orden_compra = substr($fecha_orden_compra , 0, 2);

$mes_orden_compra = substr($fecha_orden_compra , 3, 2);

$anio_orden_compra = substr($fecha_orden_compra , 8, 2);



if ($_POST['conpag'] == 1) {

	$condiciones_pago = "Contado";



} elseif ($_POST['conpag'] == 2) {

	$condiciones_pago = "Cheque";

	$vencimiento_dias = str_replace('+','',$_POST['pagoVencimiento']);

	$vencimiento_fecha = $_POST['fecha_vencimiento'];



} elseif ($_POST['conpag'] == 3) {

	$condiciones_pago = "Pagare";

	$vencimiento_dias = str_replace('+','',$_POST['pagoVencimiento']);

	$vencimiento_fecha = $_POST['fecha_vencimiento'];

	//solo para el pagare

	if (isset($_POST['rep-legal'])) {

		$representante_legal = $_POST['rep-legal'];

	} else {

		$representante_legal = '';

	}

		

	//a reemplazar

	$patterns = array();

	$patterns[0] = '#{{TOTAL_ADEUDADO}}#';

	$patterns[1] = '#{{VENCIMIENTODIAS}}#';

	$patterns[2] = '#{{VENCIMIENTOFECHA}}#';

	$patterns[3] = '#{{FECHAORDENCOMPRA}}#';

	$patterns[4] = '#{{DIA}}#';

	$patterns[5] = '#{{MES}}#';

	$patterns[6] = '#{{ANIO}}#';

	if ($_POST['solicitud'] == "ord_rleg") {

		$patterns[7] = '#{{DEUDOR}}#';

		$patterns[8] = '#{{DIRECCION}}#';

		$patterns[9] = '#{{COMUNA}}#';		

		$patterns[10] = '#{{REGION}}#';

		$patterns[11] = '#{{RUT}}#';

		$patterns[12] = '#{{TELEFONO}}#';

		//por

		$replacements = array();

		$replacements[12] = $total_adeudado_coniva;

		$replacements[11] = $vencimiento_dias;

		$replacements[10] = $vencimiento_fecha;

		$replacements[9] = $fecha_orden_compra;

		$replacements[8] = $dia_orden_compra;

		$replacements[7] = $mes_orden_compra;

		$replacements[6] = $anio_orden_compra;

		$replacements[5] = $razon_social;

		$replacements[4] = $direccion;

		$replacements[3] = $comuna;

		$replacements[2] = $region;

		$replacements[1] = $rut;

		$replacements[0] = $telefono;

	} else {

		$patterns[7] = '#{{DEUDOR}}#';

		$patterns[8] = '#{{DIRECCION}}#';

		$patterns[9] = '#{{COMUNA}}#';

		$patterns[10] = '#{{REGION}}#';

		$patterns[11] = '#{{RUT}}#';

		$patterns[12] = '#{{TELEFONO}}#';

		//por

		$replacements = array();

		$replacements[12] = $total_adeudado_coniva;

		$replacements[11] = $vencimiento_dias;

		$replacements[10] = $vencimiento_fecha;

		$replacements[9] = $fecha_orden_compra;

		$replacements[8] = $dia_orden_compra;

		$replacements[7] = $mes_orden_compra;

		$replacements[6] = $anio_orden_compra;

		$replacements[5] = $representante_legal;

		$replacements[4] = $direccion_rep_legal;

		$replacements[3] = $comuna_rep_legal;

		$replacements[2] = $reg_rep_legal;

		$replacements[1] = $rut_rep_legal;

		$replacements[0] = $tel_rep_legal;		

	}

	

	$html = preg_replace($patterns, $replacements, $gui);	

	/*

	 *

	* CREAR PDF

	*

	* */

	$dompdf = new DOMPDF();

	$dompdf->load_html($html);

	

	$dompdf->render();

	

	// The next call will store the entire PDF as a string in $pdf

	

	$pdf = $dompdf->output();

	

	// You can now write $pdf to disk, store it in a database or stream it

	// to the client.

	file_put_contents("pagare.pdf", $pdf);	

}



/*

 *

* ENVIAR MAIL

*

* */



require_once('../../lib/PHPMailer_5.2.2/class.phpmailer.php');

require_once('pagare_embebido.php');

?>