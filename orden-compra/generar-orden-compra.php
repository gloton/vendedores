<?php
include_once("../../lib/class.php");
/*
* 1-cliente
* 2-asesor
* 3-editor
* 4-vendedor
* 5-postulante
*
* */
$nombre_vendedor = $_SESSION["nombre"];
$apellidos_vendedor = $_SESSION["apellidos"];
$correo_vendedor = $_SESSION["correo"];
$id_perfil =(int) ($_SESSION["id_perfil"]);
//perfiles con que podran acceder a ver y enviar el formulario
$perf_permitidos = array (3,4,6);
if (in_array($id_perfil, $perf_permitidos, true))
{	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title>Litar Biotecnológica</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="../../default_nueva.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../../lib/jqueryui/css/jquery-ui.css" media="screen" />
	<script type="text/javascript" src="../../Scripts/AC_RunActiveContent.js"></script>
	<script type="text/javascript" src="../../js/fechas.js"></script>
	<script type="text/javascript" src="multiplicar-orden-compra.js"></script>
	<script type="text/javascript" src="../../valida/validar_rut.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="../../lib/jqueryui/jquery-ui.js" ></script>
	<script type="text/javascript" src="../../js/jquery.metadata.js" ></script>
	<script type="text/javascript" src="../../js/jquery-validation-1.10.0/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../../js/jquery-validation-1.10.0/localization/messages_es.js"></script>
	<style type="text/css">
	legend {font-size: 14px; padding: 0 6px;}
	fieldset {margin-bottom: 16px; padding: 8px 8px 8px 10px; -webkit-border-radius: 8px; border-radius: 8px; }
	label { width: 10em; float: left; }
	label.error {
	color: red;
	float: none;
	padding-bottom: 14px;
	vertical-align: top;
	width: 300px;
	}
	p { clear: both; }
	.submit { margin-left: 12em; }
	em { font-weight: bold; padding-right: 1em; vertical-align: top; }
	</style>
	<style type="text/css">
	td input {
	text-align: right;
	}
	.ocultar_mensj_desc {
		display: none;
		color: #567300;
	}
	</style>
	<script type="text/javascript">
	//confirmar antes de enviar el reporte
	function enviarOrenComp(){
	if(confirm("Confirme si acepta enviar la ORDEN DE COMPRA"))
	{
	document.ordencompra.submit();
	}
	}
	</script>
	<script type="text/javascript">
	// este lo estoy usando para el radiobutton
	// only for demo purposes
	$.validator.setDefaults({
	submitHandler: function() {
	if(confirm("Confirme si acepta enviar la ORDEN DE COMPRA"))
	{
	document.ordencompra.submit();
	}
	}
	});
$.metadata.setType("attr", "validate");
$(document).ready(function(){
	//calendario
	$( "#date" ).datepicker({
		dateFormat: "dd-mm-yy",
		monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
		dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
		firstDay: 1
	});
	//al tomar el foco el campo, este se borra
	var texto="0";
	$(".borrar")
	.val(texto)
	//.focus(function(){ $(this).val('') })
	.focus(function(){ 
		$(this).val('');
		//$("#radio_contado").removeAttr("checked");
		if (document.getElementById('totalCompra').value > 0) {
			//alert("hola019");
		}
		var comprobar_valor_total_prod = $(this).parent().find('td:eq(3) input').val();
		if (comprobar_valor_total_prod > 0) {
			//totalDeCompra = totalDeCompra - comprobar_valor_total_prod;
			//alert("comprobar valor total prod es de "+comprobar_valor_total_prod);
			totalDeCompra = totalDeCompra - comprobar_valor_total_prod;
			$(this).parent().find('td:eq(3) input').attr("value",0);
			sumartotales ();
			//multiplicar_ahora(parseInt($(this).parent().parent().find('td:eq(0) input').val()),parseInt($(this).parent().parent().find('td:eq(2) input').val()),parseInt(comprobar_valor_total_prod),$(this).parent().parent().find('td:eq(2) input').attr("id"));
			/*
			document.getElementById('totalCompra').value = document.getElementById('totalCompra').value - comprobar_valor_total_prod;
			document.getElementById('total_adeudado').value = document.getElementById('totalCompra').value;
			*/
		}		
		//$(this).parent().parent().find('td:eq(2) input').attr("value",0);
		//$(this).parent().parent().find('td:eq(2) input').attr("onfocus","multiplicar()");
	})
	.blur(function(){ $(this).val() === '' ? $(this).val(texto) : null; });
	//cambiar color a colocar foco
	$('input:text').focus(
		function(){
			$(this).css({'background-color' : '#FFF378'});
		}
	);
	$('input:text').blur(
		function(){
			$(this).css({'background-color' : '#FFFFFF'});
		}
	);
	//validacion
	$("#commentForm").validate();
	//formas de pago
	$( ".waypay").click(function (){
		elegido=$(this).val();
		$.post("pagoelegido.php", { elegido: elegido }, function(data){
			$("#detallespago").html(data);
		});
	});
	//pago inicial
	var texto2="Pago Inicial";
	$(".borrarPagoInicial")
	.val(texto2)
	.focus(function(){ $(this).val('') })
	.blur(function(){ $(this).val() === '' ? $(this).val(texto2) : null; });
	//mostra o ocultar informacion si es empresa
	$( "#orden_compra_emp").click(function (){
		if ($("#con_pagare").is(":checked")) {
			$("#opcion_emp_rleg").css({"display":"block"});
			$('#block_rep_legal').load('rep_legal.html');
		} else {
			$('#block_rep_legal').html('');
		}
	});
	$( "#orden_compra_pnatural").click(function (){
		$('#block_rep_legal').html('');
	});
	//pregunta pagara con pagare
	$("#con_pagare").click(function (){
		$("#sin_pagare").removeAttr("checked");
		$("#opcion_emp_rleg").css({"display":"block"});
		$("#optpagare").css({"display":"inline"});
		$("#optcontado").css({"display":"none"});
		$("#optcheque").css({"display":"none"});
		$('#radio_pagare.waypay').trigger('click');
	});
	$("#sin_pagare").click(function (){
		$("#con_pagare").removeAttr("checked");
		$("#opcion_emp_rleg").css({"display":"none"});
		$("#optpagare").css({"display":"none"});
		$("#optcontado").css({"display":"inline"});
		$("#optcheque").css({"display":"inline"});
		$('#block_rep_legal').html('');
		$('#radio_contado.waypay').trigger('click');
	});
	//ocultar / mostrar mensaje descuento
	$('#bloque_mensaje_desc').toggleClass('ocultar_mensj_desc');
	//no permitir volver atras
	/*
	$("#pago_inicial").click(function (){
		$(".borrar").attr("readonly","readonly");
	});
	*/
	/*
	$("#radio_contado").click(function (){
		alert("hola 041");
		document.getElementById('pago_inicial').value = Math.floor(totaldelacompra);
	});	
	*/
});
</script>
<script type="text/javascript">
var nav4 = window.Event ? true : false;
function solonumeros(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57));
}
</script>
<style type="text/css">
/*este lo use para validar radiobutton empresa*/
/*oculta el mensaje de error*/
.block { display: block; }
form.cmxform label.error { display: none; }
p#preg_pago_pagare label.error { display: none; }
.porc_desc {
	left: 10px;
	position: relative;
	top: 0;
}
</style>
</head>
<body>
<div class="container">
<div class="container">
<div class="top">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td rowspan="2" scope="col">
<img src="../../img/logo-litar78px.png" width="78" height="59" />
</td>
<td scope="col" width="75" align="center" valign="bottom">
<img src="../../img/home.png" width="32" height="32" alt="Contacto" />
</td>
<td scope="col" width="75" align="center" valign="bottom">
<img src="../../img/mail.png" width="32" height="32" alt="Contacto" />
</td>
</tr>
<tr>
<th scope="col" valign="top">
<a href="http://www.litar.cl">Home</a>
</th>
<th scope="col" valign="top">
<a href="http://www.litar.cl/contacto.html">Contacto</a>
</th>
</tr>
</table>
</div><!--fin top-->
<map name="Map2" id="Map2">
<area shape="rect" coords="42,3,109,17" href="http://www.cursosparati.com" target="_blank" alt="Cursos" />
</map>
</div>
<div class="header">
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','830','height','237','src','../../animaciones/animacion01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../../animaciones/animacion01' ); //end AC code
</script>
<noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="830" height="237">
<param name="movie" value="../../animaciones/animacion01.swf" />
<param name="quality" value="high" />
<embed src="../../animaciones/animacion01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="830" height="237"></embed>
</object>
</noscript>
</div><!--Fin header-->
<div class="main">
<div class="item">


      <!-- Start css3menu.com BODY section -->
      <link rel="stylesheet" href="menuvende_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<ul id="css3menu1" class="topmenu">
	<li class="topfirst"><a href="http://www.litar.cl/" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/home.png" alt=""/>Home</span></a>
	<ul>
		<li><a href="http://www.litar.cl/lib/cerrar-cesion.php"><img src="menuvende_files/css3menu1/register.png" alt=""/>Cerrar Sesion</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/samples4.png" alt=""/>Entrenamiento</span></a>
		<ul>
			<li><a href="http://www.litar.cl/postulantes/temas.php">Temarios</a></li>
			<li><a href="javascript:void(0);">Cuestionarios</a></li>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/postulantes/protocolos/protocolo-operaciones.php">Protocolo Operaciones</a></li>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/postulantes/protocolos/protocolo-trabajo.php">Protocolo de Trabajo</a></li>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/postulantes/protocolos/protocolo-cobro-recaudacion.php">Protocolo de Cobro y Recaudaci&oacute;n</a></li>
		</ul>
	</li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/download.png" alt=""/>Presentaciones</span></a>
	<ul>
		<li><a href="http://www.litar.cl/presentacion_tomate.php">Tomates</a></li>
		<li><a href="http://www.litar.cl/presentacion-uvas.php">Uvas</a></li>
		<li><a href="http://www.litar.cl/presentacion-cucurbitaceas.php">Cucurbitaceas</a></li>
		<li><a href="http://www.litar.cl/presentacion_arandano.php">Arandanos</a></li>
		<li><a href="http://www.litar.cl/presentacion_cerezas.php">Cerezas</a></li>
		<li><a href="http://www.litar.cl/presentacion_durazno.php">Duraznos</a></li>
		<li><a href="http://www.litar.cl/presentacion_frutilla.php">Frutillas</a></li>
		<li><a href="http://www.litar.cl/presentacion_pomaceas.php">Pomaceas</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/256-1.png" alt=""/>Gestion</span></a>
	<ul>
		<li><a href="http://www.litar.cl/vendedores/proyecciones.php"><img src="menuvende_files/css3menu1/favour3.png" alt=""/>proyecciones De Ventas</a></li>
		<li><a href="http://www.litar.cl/vendedores/planilla-de-inventario.php"><img src="menuvende_files/css3menu1/favour2.png" alt=""/>Inventario Mensual</a></li>
		<li><a href="http://www.litar.cl/vendedores/orden-compra/generar-orden-compra.php"><img src="menuvende_files/css3menu1/favour1.png" alt=""/>Generar Orden De Compra</a></li>
		<li><a href="http://www.litar.cl/vendedores/reportediario.php"><img src="menuvende_files/css3menu1/favour.png" alt=""/>Reporte Diario</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/buy.png" alt=""/>Reporte de depositos</span></a>
	<ul>
		<li><a class="pressed" href="http://www.litar.cl/vendedores/envio-pagares.php"><img src="menuvende_files/css3menu1/contact5.png" alt=""/>Envio De Pagares</a></li>
		<li><a href="http://www.litar.cl/vendedores/envio-cheques.php"><img src="menuvende_files/css3menu1/contact4.png" alt=""/>Envio De Cheques</a></li>
		<li><a href="http://www.litar.cl/vendedores/depositos-facturas.php"><img src="menuvende_files/css3menu1/contact3.png" alt=""/>Facturas en Efectivo</a></li>
		<li><a href="http://www.litar.cl/vendedores/depositos-pagare.php"><img src="menuvende_files/css3menu1/contact2.png" alt=""/>Pagares / Letra en Efectivo</a></li>
	</ul></li>
	<li class="toplast"><a href="http://www.litar.cl/correo" style="height:32px;line-height:32px;"><img src="menuvende_files/css3menu1/contact1.png" alt=""/>Ver Correo</a></li>
</ul><p class="_css3m"><a href="http://css3menu.com/">Menu HTML Template  Css3Menu.com</a></p>

<div class="date">
<div>
</div>
</div><!--fin date-->
<div class="content">

<div class="body">
<h1>Orden de compra</h1>
<!-- inicio del contenido -->
<?php 
$sql_precios = "SELECT * FROM productos";
$resultado_precios = mysql_query($sql_precios,Conectar::con()) or die(mysql_error());
while ($fila_precios = mysql_fetch_array($resultado_precios)) {
	$precio[] = $fila_precios;
}
?>
<div style="color: red; font-size: 16px; width: 500px; display: none">PAGINA EN PRUEBAS-NO GENERE NINGUNA ORDEN DE COMPRA</div>
<form name="ordencompra" class="cmxform" id="commentForm" method="post" action="pagare.php">
<!-- inicio consulta por pago de cheque -->
<p id="preg_pago_pagare">
<span style="display: inline-block; font-weight: bold;">¿El cliente pagara con pagare?</span> <br />
<input type="radio" id="con_pagare" class="pagopagare" value="Si" name="pago_conpagare" validate="required:true" /> SI
<input type="radio" id="sin_pagare" class="pagopagare" value="No" name="pago_conpagare"/> NO
<label for="pago_conpagare" class="error" style="font-size: 1.2em; width: 300px;padding-bottom:12px;">Este campo es obligatorio.</label>
</p>
<!-- fin consulta por pago de cheque -->
<div id="opcion_emp_rleg" style="display:none;">
<p style="padding-bottom:5px;">
<label for="orden_compra_emp">Empresa</label>
<input class="emp_pnat" type="radio" id="orden_compra_emp" value="ord_emp" name="solicitud" validate="required:true" />
</p>
<p style="padding-bottom:2px;">
<label for="orden_compra_pnatural">Persona Natural</label>
<input class="emp_pnat" type="radio" id="orden_compra_pnatural" value="ord_rleg" name="solicitud"/>
</p>
<label for="solicitud" class="error" style="font-size: 1.2em; width: 300px;padding-bottom:12px;">Este campo es obligatorio.</label>
</div>
<div id="block_rep_legal"></div>
<fieldset style="margin-top: 18px;">
<legend>Datos de Comprador</legend>
<p style="padding-top:12px;">
<label for="raz_soc">Razón social :</label>
<em>*</em><input id="cname" name="raz_soc" size="25" class="required" minlength="2" />
</p>
<p>
<label for="vendedor">Vendedor :</label>
<em>*</em><input name="vendedor" size="25" class="required" minlength="2" value="<?php echo $nombre_vendedor." ".$apellidos_vendedor; ?>" readonly="readonly" />
</p>
<p>
<label for="dir">Dirección :</label>
<em>*</em><input name="dir" size="25" class="required" minlength="2" />
</p>
<p>
<label for="com">Comuna :</label>
<em>*</em><input name="com" size="25" class="required" minlength="2" />
</p>
<p>
<label for="reg">Región :</label>
<em>*</em>
<select name="reg">
<option>Tarapacá</option>
<option>Antofagasta</option>
<option>Atacama</option>
<option>Coquimbo</option>
<option>Valparaíso</option>
<option>O`Higgins</option>
<option>El Maule</option>
<option>El Bío Bío</option>
<option>La Araucanía</option>
<option>Los Lagos</option>
<option>Aysén</option>
<option>Magallanes y Antártica Chilena</option>
<option>Región Metropolitana de Santiago</option>
<option>Los Ríos</option>
<option>Arica y Parinacota</option>
</select>
</p>
<p>
<label for="rut">Rut :</label>
<em>*</em><input name="rut" size="25" class="required" minlength="2" onblur="formatea_rut();" />
</p>
<p>
<label for="tel">Teléfono :</label>
<em>*</em><input name="tel" id="tel" size="25" class="required" minlength="2" />
</p>
<p>
<label for="date">Fecha :</label>
<em>*</em><input name="date" id="date" size="25" class="required" minlength="2" />
</p>
</fieldset>
<fieldset>
<legend>Datos Compra</legend>
<!-- JAGL inicio lista de productos -->
<table border="0" style="font-size: 1.2em;">
	<tr>
		<th style="width: 136px; text-align: left; vertical-align: top;">Nombre</th>
		<th style="width: 70px; text-align: center; vertical-align: top;">Cantidad</th>
		<th style="width: 84px; text-align: center; vertical-align: top;">Precio Unitario</th>
		<th style="width: 35px; text-align: center; vertical-align: top;">Desc</th>
		<th style="width: 35px;">&nbsp;</th>
		<th style="width: 100px; text-align: center; vertical-align: top;">Total</th>
	</tr>
	<tr>
		<td>Indumax_foliar :</td>
		<td><input style="width: 66px;" id="cant_unidades" name="cant" class="borrar"  onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades').value),parseInt(document.getElementById('cant_precio').value),0,'cant_total');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio" readonly="readonly"  size="13" value="<?php echo $precio[0][3]; ?>" name="precun" /></td>
		<td><input style="width: 33px;" id="cant_desc" name="cant_desc" readonly="readonly" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input id="cant_total" name="tot" readonly="readonly" size="13" value="0" /></td>
	</tr>
	<tr>
		<td>Enzimark 5 litros : </td>
		<td><input style="width: 66px;" id="cant_unidades2" name="cant2"  class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades2').value),parseInt(document.getElementById('cant_precio2').value),0,'cant_total2');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio2" readonly="readonly" name="precun2" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[1][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc2" name="cant_desc2" readonly="readonly" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input id="cant_total2" name="tot2" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>
	<tr>
		<td>Lactoplus 5 litros : </td>
		<td><input style="width: 66px;" id="cant_unidades3" name="cant3" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades3').value),parseInt(document.getElementById('cant_precio3').value),0,'cant_total3');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio3" readonly="readonly" name="precun3" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[2][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc3" name="cant_desc3" readonly="readonly" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input id="cant_total3" name="tot3" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>	
	<tr>
		<td>Micotric 5kg : </td>
		<td><input style="width: 66px;" id="cant_unidades5" name="cant5" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades5').value),parseInt(document.getElementById('cant_precio5').value),0,'cant_total5');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio5" readonly="readonly" name="precun5" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[3][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc5" name="cant_desc5" readonly="readonly" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input id="cant_total5" name="tot5" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>						
	<tr>
		<td>Saniplant 2kg :</td>
		<td><input style="width: 66px;" id="cant_unidades6" name="cant6" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades6').value),parseInt(document.getElementById('cant_precio6').value),0,'cant_total6');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio6" readonly="readonly" name="precun6" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[4][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc6" name="cant_desc6" readonly="readonly" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input  id="cant_total6" name="tot6" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>	
	<tr>
		<td>Multigranador 5 litros : </td>
		<td><input style="width: 66px;" id="cant_unidades7" name="cant7" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades7').value),parseInt(document.getElementById('cant_precio7').value),0,'cant_total7');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio7" readonly="readonly" name="precun7" onkeypress="return solonumeros(event);" size="13" value="<?php echo $precio[5][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc7" name="cant_desc7" readonly="readonly" type="text" value="0" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input  id="cant_total7" name="tot7" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>	
	<tr>
		<td>MasCuaja 5 litros :</td>
		<td><input style="width: 66px;" id="cant_unidades8" name="cant8" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades8').value),parseInt(document.getElementById('cant_precio8').value),0,'cant_total8');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio8" readonly="readonly" name="precun8" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[6][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc8" name="cant_desc8" readonly="readonly" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input id="cant_total8" name="tot8" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0"  readonly="readonly" /></td>
	</tr>
	<tr>
		<td>Saniplant 5 litros :</td>
		<td><input style="width: 66px;" id="cant_unidades9" name="cant9" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades9').value),parseInt(document.getElementById('cant_precio9').value),0,'cant_total9');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio9" readonly="readonly" name="precun9" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[7][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc9" name="cant_desc9" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input id="cant_total9" name="tot9" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>	
	<tr>
		<td>Yoymark 1 litros :</td>
		<td><input style="width: 66px;" id="cant_unidades10" name="cant10" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades10').value),parseInt(document.getElementById('cant_precio10').value),0,'cant_total10');" size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio10" readonly="readonly" name="precun10" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[8][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc10" name="cant_desc10" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input  id="cant_total10" name="tot10" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>
	<tr>
		<td>Aminoplant 5 litros : </td>
		<td><input style="width: 66px;" id="cant_unidades11" name="cant11" class="borrar" onkeypress="return solonumeros(event)" onblur="multiplicar_ahora(parseInt(document.getElementById('cant_unidades11').value),parseInt(document.getElementById('cant_precio11').value),0,'cant_total11');"  size="13" value="0" /></td>
		<td><input style="width: 82px;" id="cant_precio11" readonly="readonly" name="precun11" onkeypress="return solonumeros(event)" size="13" value="<?php echo $precio[9][3]; ?>" /></td>
		<td><input style="width: 33px;" id="cant_desc11" name="cant_desc11" readonly="readonly" type="text" value="0" class="cant_descuento" /></td>
		<td><img class="porc_desc" src="../../img/porcentaje.png" alt="" /></td>
		<td><input id="cant_total11" name="tot11" readonly="readonly" onkeypress="return solonumeros(event)" size="13" value="0" readonly="readonly" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>	
	<tr>
		<td><strong>Total : </strong></td>
		<td colspan="5"><input name="totalCompra" id="totalCompra" class="required" size="40" style="margin-left: 2px; width: 82px;" readonly="readonly" /></td>
	</tr>
	<tr>
		<td><strong>Adeudado : </strong></td>
		<td colspan="5"><input name="total_adeudado" id="total_adeudado" class="required" size="40" style="margin-left: 2px; width: 82px;" readonly="readonly" /><div id="bloque_mensaje_desc">Se ha realizado el descuento</div></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Pago inicial : </td>
		<td colspan="5">
			<span style="display:inline-block; font-size: 14px;">$ </span><input id="pago_inicial" name="pago_inicial" type="text" value="Pago inicial" class="borrarPagoInicial" style="width: 80px; color:#666;" onchange="totalAdeudado();" />
		</td>
	</tr>
	<tr>
		<td>Giro : </td>
		<td colspan="5"><em>*</em><input size="40" name="gir" class="required" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>																
	<tr>
		<td><strong>Atencion : </strong></td>
		<td colspan="5"><div style="color: red;">Una vez ingresada la forma de pago no puedes volver a ingresar productos</div></td>
	</tr>	
	<tr style="height: 42px;">
		<td colspan="6" align="center"><h3>Formas de pago</h3></td>
	</tr>										
	<tr style="text-align: right;">
		<td colspan="2"><div id="optcontado" style="display: inline-block;"><input id="radio_contado" class="waypay" type= "radio" name ="conpag" value= "1"/><span class="pago" style="display: inline-block;">Contado</span></div></td>
		<td colspan="2"><div id="optcheque" style="display: inline-block;"><input id="radio_cheque" class="waypay" type= "radio" name ="conpag" value= "2" /><span class="pago" style="display: inline-block;">Cheque</span></div></td>
		<td colspan="2"><div id="optpagare" style="display: inline-block;""><input id="radio_pagare" class="waypay" type= "radio" name ="conpag" value= "3" /><span class="pago" style="display: inline-block;">Pagaré</span></div></td>
	</tr>
	<tr>
		<td style="height: 28px;">&nbsp;</td>
		<td colspan="5"><div id="detallespago"></div></td>
	</tr>
</table>
<!-- JAGL fin lista de productos -->	
</fieldset>
<p>
<input type="hidden" name="nombre_vendedor" value="<?=$nombre_vendedor;?>" />
<input type="hidden" name=apellidos_vendedor value="<?=$apellidos_vendedor;?>" />
<input type="hidden" name="correo_vendedor" value="<?=$correo_vendedor;?>" />
<input class="submit" type="submit" value="Enviar orden de compra" />
</p>
</form>
<!-- fin del contenido -->
</div><!--fin body-->
</div><!--fin content-->
</div><!--fin item-->
</div><!--fin main-->

<div class="clearer"><span></span></div>
<div class="footer">
<table width="605" height="20" border="0" align="center">
<tr>
<td width="273">
<div align="right">
&copy;2010 Litar.cl - Derechos Reservados
</div>
</td>
<td width="293">
<div align="center">
<script type="text/javascript">
AC_FL_RunContent( 'type','application/x-shockwave-flash','data','../musica/dewplayer-multi.swf','width','240','height','20','id','dewplayer','name','dewplayer','movie','../musica/dewplayer-multi','flashvars','mp3=musica/musica-relax.mp3&autostart=1&bgcolor=88B531' ); //end AC code
</script>
<noscript>
<object type="application/x-shockwave-flash" data="../../musica/dewplayer-multi.swf" width="240" height="20" id="dewplayer" name="dewplayer">
<param name="movie" value="../../musica/dewplayer-multi.swf" />
<param name="flashvars" value="mp3=musica/musica-relax.mp3&amp;autostart=1&amp;bgcolor=88B531" />
</object>
</noscript>
</div>
</td>
</tr>
</table>
<div align="center">
</div>
</div>
</div>
<img id="background-img" class="bg" src="../../img/fondo.jpg" />
	<!-- JAGL inicio utilizando smoke para validar porcentaje maximo de descuento -->
	<!-- include these -->
	<link rel="stylesheet" href="../../lib/smoke/smoke.css" type="text/css" media="screen" />  
	<script type="text/javascript" src="../../lib/smoke/smoke.min.js"></script>
	<!-- you only need this if you want to include a theme...duh -->
	<link id="theme" rel="stylesheet" href="../../lib/smoke/themes/default.css" type="text/css" media="screen" />
	<script type="text/javascript">
	$(document).ready(function() {
		$('.porc_desc').click(function() {
			var cantidad_productos = parseInt($(this).parent().parent().find('td:eq(1) input').val());
			//precio unitario
			var precio_unitario_producto = parseInt($(this).parent().parent().find('td:eq(2) input').val());
			var id_producto = $(this).parent().parent().find('td:eq(1) input').attr("id");
			//id de la columna donde aparece el total del producto
			var id_producto_total = $(this).parent().parent().find('td:eq(5) input').attr("id");
			//
			var id_descuento_total = $(this).parent().parent().find('td:eq(3) input').attr("id");
			//oc_total_valor_producto es el valor del producto sin descuento
			var oc_total_producto_sindesc = parseInt($(this).parent().parent().find('td:eq(5) input').val());	
			//alert(precio_unitario_producto); OK
			//alert(id_producto); OK
			//alert(id_producto_total); OK
			//alert(oc_total_producto_sindesc); OK
			switch (id_producto) {
			    case "cant_unidades":
			    	//Indumax_foliar
			    	if (cantidad_productos <= 3) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 3 && cantidad_productos <= 10) {
			    		descuento_producto = 25;
			    	} else if (cantidad_productos > 10 && cantidad_productos <= 20) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 80) {
			    		descuento_producto = 60;
			    	} else if (cantidad_productos > 80 && cantidad_productos <= 200) {
			    		descuento_producto = 65;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 70;
			    	}
			    	break;
			    case "cant_unidades2":
			    	//Enzimark 5 litros :
			    	if (cantidad_productos <= 3) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 3 && cantidad_productos <= 10) {
			    		descuento_producto = 25;
			    	} else if (cantidad_productos > 10 && cantidad_productos <= 20) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 80) {
			    		descuento_producto = 60;
			    	} else if (cantidad_productos > 80 && cantidad_productos <= 200) {
			    		descuento_producto = 65;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 70;
			    	}			    		
			       break;
			    case "cant_unidades3":
			    	//Lactoplus 5 litros : 
			    	if (cantidad_productos <= 3) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 3 && cantidad_productos <= 10) {
			    		descuento_producto = 15;
			    	} else if (cantidad_productos > 10 && cantidad_productos <= 20) {
			    		descuento_producto = 25;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 50) {
			    		descuento_producto = 33;
			    	} else if (cantidad_productos > 50 && cantidad_productos <= 100) {
			    		descuento_producto = 38;
			    	} else if (cantidad_productos > 100 && cantidad_productos <= 500) {
			    		descuento_producto = 45;
			    	}			    		
			       break;
			    case "cant_unidades5":
				    //Micotric 5kg : 
			    	if (cantidad_productos <= 3) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 3 && cantidad_productos <= 10) {
			    		descuento_producto = 25;
			    	} else if (cantidad_productos > 10 && cantidad_productos <= 20) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 80) {
			    		descuento_producto = 60;
			    	} else if (cantidad_productos > 80 && cantidad_productos <= 200) {
			    		descuento_producto = 65;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 70;
			    	}
			    	break;  		
			       break;
			    case "cant_unidades6":
			    	//Saniplant  bolsa de 2 kg : 
			    	if (cantidad_productos <= 9) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 9 && cantidad_productos <= 20) {
			    		descuento_producto = 12;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 50) {
			    		descuento_producto = 20;
			    	} else if (cantidad_productos > 50 && cantidad_productos <= 100) {
			    		descuento_producto = 28;
			    	} else if (cantidad_productos > 100 && cantidad_productos <= 200) {
			    		descuento_producto = 35;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 40;
			    	} else if (cantidad_productos > 500 && cantidad_productos <= 1000) {
			    		descuento_producto = 45;
			    	}
			       break;
			    case "cant_unidades7":
			    	//Multigranador 5 litros : 
			    	if (cantidad_productos <= 3) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 3 && cantidad_productos <= 10) {
			    		descuento_producto = 25;
			    	} else if (cantidad_productos > 10 && cantidad_productos <= 20) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 80) {
			    		descuento_producto = 60;
			    	} else if (cantidad_productos > 80 && cantidad_productos <= 200) {
			    		descuento_producto = 65;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 70;
			    	}
			    	break;
			    case "cant_unidades8":
			    	//MasCuaja 5 litros :
			    	if (cantidad_productos <= 3) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 3 && cantidad_productos <= 10) {
			    		descuento_producto = 25;
			    	} else if (cantidad_productos > 10 && cantidad_productos <= 20) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 80) {
			    		descuento_producto = 60;
			    	} else if (cantidad_productos > 80 && cantidad_productos <= 200) {
			    		descuento_producto = 65;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 70;
			    	}
			    	break;
			    case "cant_unidades9":
			    	//Saniplant 5 litros :
			    	if (cantidad_productos <= 9) {
			    		descuento_producto = 10;
			    	} else if (cantidad_productos > 9 && cantidad_productos <= 20) {
			    		descuento_producto = 15;
			    	} else if (cantidad_productos > 20 && cantidad_productos <= 50) {
			    		descuento_producto = 25;
			    	} else if (cantidad_productos > 50 && cantidad_productos <= 100) {
			    		descuento_producto = 33;
			    	} else if (cantidad_productos > 100 && cantidad_productos <= 200) {
			    		descuento_producto = 38;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 500 && cantidad_productos <= 1000) {
			    		descuento_producto = 50;
			    	}
			    	break;
			    case "cant_unidades10":
			    	//Yoymark 1 litros :
			    	if (cantidad_productos <= 15) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 15 && cantidad_productos <= 50) {
			    		descuento_producto = 15;
			    	} else if (cantidad_productos > 50 && cantidad_productos <= 100) {
			    		descuento_producto = 30;
			    	} else if (cantidad_productos > 100 && cantidad_productos <= 200) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 51;
			    	} else if (cantidad_productos > 500 && cantidad_productos <= 1000) {
			    		descuento_producto = 55;
			    	}
			    	break;
			    case "cant_unidades11":
			    	//Aminoplant 5 litros :
			    	if (cantidad_productos <= 15) {
			    		descuento_producto = 0;
			    	} else if (cantidad_productos > 15 && cantidad_productos <= 50) {
			    		descuento_producto = 15;
			    	} else if (cantidad_productos > 50 && cantidad_productos <= 100) {
			    		descuento_producto = 30;
			    	} else if (cantidad_productos > 100 && cantidad_productos <= 200) {
			    		descuento_producto = 45;
			    	} else if (cantidad_productos > 200 && cantidad_productos <= 500) {
			    		descuento_producto = 51;
			    	} else if (cantidad_productos > 500 && cantidad_productos <= 1000) {
			    		descuento_producto = 55;
			    	}
			    	break;			    				    	
			    default:
			    	alert ("Ninguna de las anteriores");
			} 
			smoke.prompt('Ingrese % de descuento con un limite '+descuento_producto + '%',function(e){
				var porcentaje_ingresado = parseInt(e);
				var porc_descuento_producto;
				var oc_total_producto_condesc;
				var descuento_a_realizar;
				if (descuento_producto >= porcentaje_ingresado) {
					//convierte a porsetaje, si ingreso 15 queda en 0.15
					//alert(descuento_producto); OK
					//alert(porcentaje_ingresado); OK
					porc_descuento_producto = parseInt(porcentaje_ingresado)/100;
					//alert(porc_descuento_producto); OK
					//me da el descuento a realizar
					descuento_a_realizar = oc_total_producto_sindesc * porc_descuento_producto;
					//alert(descuento_a_realizar); ME SALE 0
					//me da valor final del producto con el descuento
					oc_total_producto_condesc = oc_total_producto_sindesc - descuento_a_realizar;
				    //alert(oc_total_producto_condesc);
					id_final_total_producto = '#'+id_producto_total;
					//embebe el total con descuento incluido en el item seleccionado
					$('#'+id_producto_total).attr("value", oc_total_producto_condesc);
					//embebe el descuento realizado, ejemplo; 15%, embebe nro 15
					$('#'+id_descuento_total).attr("value", porcentaje_ingresado);
					multiplicar_ahora(parseInt(cantidad_productos),parseInt(precio_unitario_producto),descuento_a_realizar,id_producto_total);
					smoke.alert('Descuento realizado!!!.');
				} else {
					smoke.alert('Descuento invalido por superar el limite de '+ descuento_producto + '%');
				}
			});				
		});
	});		
	</script>	
	<!-- JAGL fin utilizando smoke para validar porcentaje maximo de descuento -->
</body>
</html>
<!-- fin plantilla -->
<?php
} else {
?>
<p>
<script type="text/javascript">
alert("Usted no tiene los privilegios necesarios para acceder a esta pagina");
history.back(1);
</script>
</p>
<?php
}
?>