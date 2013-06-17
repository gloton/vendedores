<?php
/***************************************************\
 * PHP 4.1.0+ version of email script. For more
* information on the mail() function for PHP, see
* http://www.php.net/manual/en/function.mail.php
\***************************************************/

// First, set up some variables to serve you in
// getting an email.  This includes the email this is
// sent to (yours) and what the subject of this email
// should be.  It's a good idea to choose your own
// subject instead of allowing the user to.  This will
// help prevent spam filters from snatching this email
// out from under your nose when something unusual is put.

$sendTo = "jtarrason@litar.cl";
//$sendTo = "j.gatica@yahoo.com";
$subject = "Nueva orden de compra";

// variables are sent to this PHP page through
// the POST method.  $_POST is a global associative array
// of variables passed through this method.  From that, we
// can get the values sent to this page from Flash and
// assign them to appropriate variables which can be used
// in the PHP mail() function.

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From: ".$_POST["nombre_vendedor"]." ".$_POST["apellidos_vendedor"]." <".$_POST["correo_vendedor"].">\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: ".$_POST["correo_vendedor"]."\r\n";

//ruta del mensaje desde origen a destino
$headers .= "Return-path: ".$_POST["correo_vendedor"]."\r\n";

//direcciones que recibián copia
$headers .= "Cc: ".$_POST["correo_vendedor"].",supervisor@litar.cl,fabiolaquezada@litar.cl\r\n";

//direcciones que recibirán copia oculta
//$headers .= "Bcc: gloton@gmail.com,j.gatica@yahoo.com\r\n";




// now we can add the content of the message to a body variable
/*
$message .=  "==================================" . "\n";
$message .=  "MENSAJE DESDE MI DOMINIO" . "\n";
$message .=  "==================================" . "\n" . "\n";
$message .= "Nombre: " . $HTTP_POST_VARS["nombre"] . "\n" . "\n";
$message .= "Direccion: " . $HTTP_POST_VARS["direccion"] . "\n" . "\n";
$message .= "Telefono: " . $HTTP_POST_VARS["telefono"] . "\n" . "\n";
$message .= "Email: " . $HTTP_POST_VARS["email"] . "\n" . "\n";
$message .= "Mensaje: " . $HTTP_POST_VARS["mensaje"] . "\n" . "\n";
*/

/*inicio de la tabla*/
$mensaje = '
<table width="400" border="1">
  <tr bgcolor="#999999">
    <td colspan="3" align="center"><strong>DATOS DE LA ORDEN DE COMPRA</strong></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
    <td>Raz&oacute;n social</td>
    <td>:</td>
    <td>'.$_POST['raz_soc'].'</td>
  </tr>		
  <tr bgcolor="#F0F0F0">
    <td width="87">Vendedor</td>
    <td width="30">:</td>
    <td width="511">'.$_POST['nombre_vendedor'].' '.$_POST['apellidos_vendedor'].'</td>
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
    <td>'.$_POST['dia'].' '.$_POST['mes'].' '.$_POST['ano'].'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="650" border="1">
  <tr>
    <td colspan="4" align="center" bgcolor="#CCCCCC"><strong>ORDEN DE COMPRA</strong></td>
  </tr>
  <tr bgcolor="#999999">
    <td width="143">Producto</td>
    <td width="140">Cantidad</td>
    <td width="169">Precio Unitario</td>
    <td width="170">Total</td>
  </tr>
  <tr>
    <td>Indumax</td>
    <td>'.$_POST['cant'].'</td>
    <td>'.$_POST['precun'].'</td>
    <td>'.$_POST['tot'].'</td>
  </tr>
  <tr bgcolor="#f0f0f0">
    <td>Enzimark </td>
    <td>'.$_POST['cant2'].'</td>
    <td>'.$_POST['precun2'].'</td>
    <td>'.$_POST['tot2'].'</td>
  </tr>
  <tr>
    <td>Mifoliar ice</td>
    <td>'.$_POST['cant3'].'</td>
    <td>'.$_POST['precun3'].'</td>
    <td>'.$_POST['tot3'].'</td>
  </tr>
  <tr bgcolor="#f0f0f0">
    <td>Micotric </td>
    <td>'.$_POST['cant5'].'</td>
    <td>'.$_POST['precun5'].'</td>
    <td>'.$_POST['tot5'].'</td>
  </tr>
  <tr>
    <td>Saniplant </td>
    <td>'.$_POST['cant6'].'</td>
    <td>'.$_POST['precun6'].'</td>
    <td>'.$_POST['tot6'].'</td>
  </tr>
  <tr bgcolor="#f0f0f0">
    <td>Multigran </td>
    <td>'.$_POST['cant7'].'</td>
    <td>'.$_POST['precun7'].'</td>
    <td>'.$_POST['tot7'].'</td>
  </tr>
  <tr>
    <td>Mascuaja</td>
    <td>'.$_POST['cant8'].'</td>
    <td>'.$_POST['precun8'].'</td>
    <td>'.$_POST['tot8'].'</td>
  </tr>
  <tr bgcolor="#f0f0f0">
    <td>Micorrifort</td>
    <td>'.$_POST['cant9'].'</td>
    <td>'.$_POST['precun9'].'</td>
    <td>'.$_POST['tot9'].'</td>
  </tr>
  <tr>
    <td>Yoymark</td>
    <td>'.$_POST['cant10'].'</td>
    <td>'.$_POST['precun10'].'</td>
    <td>'.$_POST['tot10'].'</td>
  </tr>
  <tr bgcolor="#f0f0f0">
    <td>Aminoplant</td>
    <td>'.$_POST['cant11'].'</td>
    <td>'.$_POST['precun11'].'</td>
    <td>'.$_POST['tot11'].'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#999999"><strong>Giro </strong></td>
    <td bgcolor="#999999">'.$_POST['gir'].'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#999999"><strong>Condiciones de Pago</strong></td>
    <td bgcolor="#999999">'.$_POST['conpag'].'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
';
/*fin de la tabla*/
// once the variables have been defined, they can be included
// in the mail function call which will send you an email
mail($sendTo, $subject, $mensaje, $headers);
echo "<script type='text/javascript'>
alert('Orden de compra enviado');
history.back(1)
</script>";
?>