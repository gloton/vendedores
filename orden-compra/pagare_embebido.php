<?php
if (!isset($vencimiento_dias)) {
	$vencimiento_dias = "";
}
if (!isset($vencimiento_fecha)) {
	$vencimiento_fecha = "";
}
if (!isset($representante_legal)) {
	$representante_legal = "";
}
if (isset($_POST["cheque_aldia"])) {
	$cheque_aldia = $_POST["cheque_aldia"];
} else {
	$cheque_aldia = "NO";
}
if (isset($_POST['desc_adicional'])) {
	$desc_adicional = $_POST["desc_adicional"];
} else {
	$desc_adicional = "0";
}
$nombre_vendedor =$_POST["nombre_vendedor"];
$apellidos_vendedor =$_POST["apellidos_vendedor"];
$correo_vendedor =$_POST["correo_vendedor"];
$body = '
<table width="400" border="1">
  <tr bgcolor="#999999">
    <td colspan="3" align="center"><strong>DATOS DE LA ORDEN DE COMPRA</strong></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>		
    <td>Raz&oacute;n social</td>
    <td>:</td>
    <td>'.$_POST['raz_soc'].'</td>
  </tr>
  <tr>		
    <td>Giro</td>
    <td>:</td>
    <td>'.$_POST['gir'].'</td>
  </tr>    		
  <tr bgcolor="#F0F0F0">
    <td width="87">Vendedor</td>
    <td width="30">:</td>
    <td width="511">'.$_POST['vendedor'].'</td>
  </tr>
  <tr>
    <td>Direccion</td>
    <td>:</td>
    <td>'.$_POST['dir'].'</td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td>Comuna </td>
    <td>:</td>
    <td>'.$_POST['com'].'</td>
  </tr>
  <tr>
    <td>Regi&oacute;n</td>
    <td>:</td>
    <td>'.$_POST['reg'].'</td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td>Rut</td>
    <td>:</td>
    <td>'.$_POST['rut'].'</td>
  </tr>
  <tr>
    <td>Tel&eacute;fono</td>
    <td>:</td>
    <td>'.$_POST['tel'].'</td>
  </tr>
  <tr bgcolor="#F0F0F0">
    <td>Fecha</td>
    <td>:</td>
    <td>'.$_POST['date'].'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table border="1" style="font-size: 1.2em;">
	<tbody>
		<tr>
		  <th colspan="6" style="text-align: center;;">DATOS DE LA ORDEN DE COMPRA</th>
	  </tr>
		<tr>
		  <th style="width: 136px; text-align: left; vertical-align: top;">&nbsp;</th>
		  <th style="width: 70px; text-align: center; vertical-align: top;">&nbsp;</th>
		  <th style="width: 84px; text-align: center; vertical-align: top;">&nbsp;</th>
		  <th style="width: 35px; text-align: center; vertical-align: top;">&nbsp;</th>
		  <th style="width: 35px;">&nbsp;</th>
		  <th style="width: 100px; text-align: center; vertical-align: top;">&nbsp;</th>
	  </tr>
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
			<td>'.$_POST['cant'].'</td>
			<td>'.$_POST['precun'].'</td>
			<td>'.$_POST['cant_desc'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot'].'</td>
		</tr>
		<tr>
			<td>Enzimark 5 litros : </td>
			<td>'.$_POST['cant2'].'</td>
			<td>'.$_POST['precun2'].'</td>
			<td>'.$_POST['cant_desc2'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot2'].'</td>
		</tr>
		<tr>
			<td>Lactoplus 5 litros : </td>
			<td>'.$_POST['cant3'].'</td>
			<td>'.$_POST['precun3'].'</td>
			<td>'.$_POST['cant_desc3'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot3'].'</td>					
		</tr>	
		<tr>
			<td>Micotric 5kg : </td>
			<td>'.$_POST['cant5'].'</td>
			<td>'.$_POST['precun5'].'</td>
			<td>'.$_POST['cant_desc5'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot5'].'</td>
		</tr>						
		<tr>
			<td>Saniplant 2kg :</td>
			<td>'.$_POST['cant6'].'</td>
			<td>'.$_POST['precun6'].'</td>
			<td>'.$_POST['cant_desc6'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot6'].'</td>
		</tr>	
		<tr>
			<td>Multigranador 5 litros : </td>
			<td>'.$_POST['cant7'].'</td>
			<td>'.$_POST['precun7'].'</td>
			<td>'.$_POST['cant_desc7'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot7'].'</td>
			</tr>	
		<tr>
			<td>MasCuaja 5 litros :</td>
			<td>'.$_POST['cant8'].'</td>
			<td>'.$_POST['precun8'].'</td>
			<td>'.$_POST['cant_desc8'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot8'].'</td>	
		</tr>
		<tr>
			<td>Saniplant 5 litros :</td>
			<td>'.$_POST['cant9'].'</td>
			<td>'.$_POST['precun9'].'</td>
			<td>'.$_POST['cant_desc9'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot9'].'</td>	
		</tr>	
		<tr>
			<td>Yoymark 1 litros :</td>
			<td>'.$_POST['cant10'].'</td>
			<td>'.$_POST['precun10'].'</td>
			<td>'.$_POST['cant_desc10'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot10'].'</td>
		</tr>
		<tr>
			<td>Aminoplant 5 litros : </td>
			<td>'.$_POST['cant11'].'</td>
			<td>'.$_POST['precun11'].'</td>
			<td>'.$_POST['cant_desc11'].'</td>
			<td>&nbsp;</td>
			<td style="text-align: right;">'.$_POST['tot11'].'</td>		
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
		<tr style="height: 42px;">
			<td align="center" colspan="6">Forma de pago</td>
		</tr>										
		<tr style="text-align: right;">
			<td colspan="6" align="center">'.$condiciones_pago.'</td>
		</tr>
	</tbody>
</table>
<h1>Resumen</h1>
<table width="500" border="1">
  <tr>
    <th width="200" align="left" scope="row">&nbsp;</th>
    <td width="12" align="center">&nbsp;</td>
    <td width="240" align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Total</th>
    <td align="center">:</td>
    <td align="right">'.$_POST['totalCompra'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>    		
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Descuento Adicional (7%)</th>
    <td align="center">:</td>
    <td align="right">'.$desc_adicional.'</td>
    <td>&nbsp;</td>
  </tr>    		
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Adeudado</th>
    <td align="center">:</td>
    <td align="right">'.$_POST['total_adeudado'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Pago inicial</th>
    <td align="center">:</td>
    <td align="right">'.$_POST['pago_inicial'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Dias de vencimiento</th>
    <td align="center">:</td>
    <td align="right">'.$vencimiento_dias.'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Fecha de vencimiento</th>
    <td align="center">:</td>
    <td align="right">'.$vencimiento_fecha.'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Representante legal</th>
    <td align="center">:</td>
    <td align="right">'.$representante_legal.'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>    		
  <tr bgcolor="#FFFF00">
    <th align="left" scope="row">Cheque al dia</th>
    <td align="center">:</td>
    <td align="right">'.$cheque_aldia.'</td>
    <td>&nbsp;</td>
  </tr>    		
  <tr>
    <th align="left" scope="row">&nbsp;</th>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>					
';
$mail             = new PHPMailer(); // defaults to using php "mail()"
$mail->CharSet = 'UTF-8';
$correo_administrador_sitio = "jtarrason@litar.cl";
$nombre_administrador_sitio = "Juan Tarrason";
/*
$correo_administrador_sitio = "jorge@w7.cl";
$nombre_administrador_sitio = "Jorge Gatica";
*/
$mail->AddAddress($correo_administrador_sitio, $nombre_administrador_sitio);
//$mail->AddAddress("jorge@w7.cl", "Jorge Gatica");
/* JAGL POR PRUEBA
$mail->AddAddress("supervisor@litar.cl", "Supervisor");
$mail->AddAddress("fabiolaquezada@litar.cl", "Fabiola Quezada");
*/
$mail->AddCC("jorge@w7.cl", "Jorge Gatica");
$mail->AddReplyTo($correo_vendedor,$nombre_vendedor." ".$apellidos_vendedor);
$mail->SetFrom($correo_vendedor,$nombre_vendedor." ".$apellidos_vendedor);
$mail->AddCC($correo_vendedor, $nombre_vendedor." ".$apellidos_vendedor);
if (file_exists("pagare.pdf")) {
	$mail->AddAttachment("pagare.pdf");
}
$mail->Subject    = "Nueva orden de compra";
$mail->AltBody    = "Para ver el mensaje su cliente de correo debe aceptar recivir correos en formato html"; // optional, comment out and test
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
	<link rel="stylesheet" href="../../lib/smoke/smoke.css" type="text/css" media="screen" />  
	<script type="text/javascript" src="../../lib/smoke/smoke.min.js"></script>
	<!-- you only need this if you want to include a theme...duh -->
	<link id="theme" rel="stylesheet" href="../../lib/smoke/themes/default.css" type="text/css" media="screen" />	<!-- styles/js for the demo page. ignore them...or don't. i don't really care. -->
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
<body style="background-image: url(../../img/fondo.jpg);">
	<div id="mail-contacto">
	</div>
</body>
</html>
<?php 
}
if (file_exists("pagare.pdf")) {
	unlink("pagare.pdf");
}
?>