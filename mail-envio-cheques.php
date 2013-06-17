<?php
require_once('../lib/PHPMailer_5.2.2/class.phpmailer.php');
//print_r($_POST);
$correo_vendedor = $_POST["correo_vendedor"];
$nombre_vendedor = $_POST["nombre_vendedor"];
$apellidos_vendedor = $_POST["apellidos_vendedor"];
$body = '
	<h1> Nombre del vendedor : '.$_POST["nombre_vendedor"].' '.$_POST["apellidos_vendedor"].'</h1>
	<table class="reporte_depositos" width="972" border="1" align="center" bgcolor="#FFFFFF">
		<tr bgcolor="#FFFF00">
			<th width="151" scope="col">N° de cheque</th>
			<th width="161" scope="col">Banco</th>
			<th width="144" scope="col">nombre del titular</th>
			<th width="144" scope="col">N° de factura</th>
		  <th width="152" scope="col">fecha del cheque</th>
		  <th width="144" align="center" scope="col">Monto</th>
			<th width="30" align="center" scope="col">&nbsp;</th>
		</tr>
		<tr class="fila1">
			<td>'.$_POST["nrocheque_1"].'</td>
			<td>'.$_POST["banco_1"].'</td>
			<td align="center">'.$_POST["nombre_1"].'</td>
			<td align="center">'.$_POST["nfactura_1"].'</td>
		  <td>'.$_POST["fecha_1"].'</td>
		  <td align="center">'.$_POST["monto_1"].'</td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila2">
			<td>'.$_POST["nrocheque_2"].'</td>
			<td>'.$_POST["banco_2"].'</td>
			<td align="center">'.$_POST["nombre_2"].'</td>
			<td align="center">'.$_POST["nfactura_2"].'</td>
		  <td>'.$_POST["fecha_2"].'</td>
		  <td align="center">'.$_POST["monto_2"].'</td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila3">
			<td>'.$_POST["nrocheque_3"].'</td>
			<td>'.$_POST["banco_3"].'</td>
			<td align="center">'.$_POST["nombre_3"].'</td>
			<td align="center">'.$_POST["nfactura_3"].'</td>
		  <td>'.$_POST["fecha_3"].'</td>
		  <td align="center">'.$_POST["monto_3"].'</td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila4">
			<td>'.$_POST["nrocheque_4"].'</td>
			<td>'.$_POST["banco_4"].'</td>
			<td align="center">'.$_POST["nombre_4"].'</td>
			<td align="center">'.$_POST["nfactura_4"].'</td>
		  <td>'.$_POST["fecha_4"].'</td>
		  <td align="center">'.$_POST["monto_4"].'</td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila5">
			<td>'.$_POST["nrocheque_5"].'</td>
			<td>'.$_POST["banco_5"].'</td>
			<td align="center">'.$_POST["nombre_5"].'</td>
			<td align="center">'.$_POST["nfactura_5"].'</td>
		  <td>'.$_POST["fecha_5"].'</td>
		  <td align="center">'.$_POST["monto_5"].'</td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila6">
			<td>'.$_POST["nrocheque_6"].'</td>
			<td>'.$_POST["banco_6"].'</td>
			<td align="center">'.$_POST["nombre_6"].'</td>
			<td align="center">'.$_POST["nfactura_6"].'</td>
		  <td>'.$_POST["fecha_6"].'</td>
		  <td align="center">'.$_POST["monto_6"].'</td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila7">
			<td>'.$_POST["nrocheque_7"].'</td>
			<td>'.$_POST["banco_7"].'</td>
			<td align="center">'.$_POST["nombre_7"].'</td>
			<td align="center">'.$_POST["nfactura_7"].'</td>
		  <td>'.$_POST["fecha_7"].'</td>
		  <td align="center">'.$_POST["monto_7"].'</td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
	</table>		
		';
$mail             = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->SetFrom($correo_vendedor,$nombre_vendedor." ".$apellidos_vendedor);
/*
$correo_administrador_sitio = "jorge@w7.cl";
$nombre_administrador_sitio = "Jorge Gatica";
*/
$correo_administrador_sitio = "jtarrason@litar.cl";
$nombre_administrador_sitio = "Juan Tarrason";

$mail->AddAddress($correo_administrador_sitio, $nombre_administrador_sitio);
$mail->AddCC($correo_vendedor, $nombre_vendedor." ".$apellidos_vendedor);
$mail->Subject    = "Envió de cheques";
$mail->MsgHTML($body);
if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Gracias por contactarnos</title>
	<!-- include these -->
	<link rel="stylesheet" href="../lib/smoke/smoke.css" type="text/css" media="screen" />  
	<script type="text/javascript" src="../lib/smoke/smoke.min.js"></script>
	<!-- you only need this if you want to include a theme...duh -->
	<link id="theme" rel="stylesheet" href="../lib/smoke/themes/default.css" type="text/css" media="screen" />	<!-- styles/js for the demo page. ignore them...or don't. i don't really care. -->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			smoke.alert('<h1>ATENCION</h1><p>Su orden de compra ya ha sido enviada al administrador y una copia para usted.</p><p>Por favor, si le queda alguna duda respecto a lo enviado, revice la copia que fue enviada a su correo.</p><p>Si no esta correcto algun dato o falta agregar alguna informacion, contactese con administrador al correo jtarrason@litar.cl, quien le proporcionara las instrucciones necesarias</p>', {}, function(){
				//ejecutara luego de hacer click en OK
				location.href="http://www.litar.cl/vendedores/";
			});
		});		
	</script>	
</head>
<body style="background-image: url(../img/fondo.jpg);">
	<div id="mail-contacto">
	</div>
</body>
</html>
<?php 
}
?>