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



//administrador al cual se le envara el reporte

$sendTo = "jtarrason@litar.cl";

//$sendTo = "jorge@w7.cl";





$subject = "Nuevo reporte diario";



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

$headers .= "From: ".$_POST["nombre"]." ".$_POST["apellidos"]."<".$_POST["correo"].">\r\n";



//dirección de respuesta, si queremos que sea distinta que la del remitente

$headers .= "Reply-To: ".$_POST["correo"]."\r\n";



//ruta del mensaje desde origen a destino

$headers .= "Return-path: ".$_POST["correo"]."\r\n";



//direcciones que recibián copia

$headers .= "Cc: ".$_POST["correo"].",supervisor@litar.cl,fabiolaquezada@litar.cl\r\n";



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

<p>		

	<strong>Kilometraje recorrido </strong>

	'.$_POST['kil'].'&nbsp;

</p>

<br />							

<table width="520" border="1">

	<tr>

		<th scope="col">Nro</th>

		<th scope="col">Nombre</th>

		<th scope="col">Apellido</th>

		<th scope="col">Telefono</th>

		<th scope="col">Negociacion y Compromiso</th>

		<th scope="col">Direccion</th>

	</tr>

	<tr>

		<td>1&nbsp;</td>

		<td>'.$_POST['nombre1'].'&nbsp;</td>

		<td>'.$_POST['apell1'].'&nbsp;</td>

		<td>'.$_POST['tel1'].'&nbsp;</td>

		<td>'.$_POST['neg1'].'&nbsp;</td>

		<td>'.$_POST['dir1'].'&nbsp;</td>

	</tr>

	<tr>

		<td>2&nbsp;</td>

		<td>'.$_POST['nombre2'].'&nbsp;</td>

		<td>'.$_POST['apell2'].'&nbsp;</td>

		<td>'.$_POST['tel2'].'&nbsp;</td>

		<td>'.$_POST['neg2'].'&nbsp;</td>

		<td>'.$_POST['dir2'].'&nbsp;</td>

	</tr>

	<tr>

		<td>3&nbsp;</td>

		<td>'.$_POST['nombre3'].'&nbsp;</td>

		<td>'.$_POST['apell3'].'&nbsp;</td>

		<td>'.$_POST['tel3'].'&nbsp;</td>

		<td>'.$_POST['neg3'].'&nbsp;</td>

		<td>'.$_POST['dir3'].'&nbsp;</td>

	</tr>

	<tr>

		<td>4&nbsp;</td>

		<td>'.$_POST['nombre4'].'&nbsp;</td>

		<td>'.$_POST['apell4'].'&nbsp;</td>

		<td>'.$_POST['tel4'].'&nbsp;</td>

		<td>'.$_POST['neg4'].'&nbsp;</td>

		<td>'.$_POST['dir4'].'&nbsp;</td>

	</tr>

	<tr>

		<td>5&nbsp;</td>

		<td>'.$_POST['nombre5'].'&nbsp;</td>

		<td>'.$_POST['apell5'].'&nbsp;</td>

		<td>'.$_POST['tel5'].'&nbsp;</td>

		<td>'.$_POST['neg5'].'&nbsp;</td>

		<td>'.$_POST['dir5'].'&nbsp;</td>

	</tr>

	<tr>

		<td>6&nbsp;</td>

		<td>'.$_POST['nombre6'].'&nbsp;</td>

		<td>'.$_POST['apell6'].'&nbsp;</td>

		<td>'.$_POST['tel6'].'&nbsp;</td>

		<td>'.$_POST['neg6'].'&nbsp;</td>

		<td>'.$_POST['dir6'].'&nbsp;</td>

	</tr>

	<tr>

		<td>7&nbsp;</td>

		<td>'.$_POST['nombre7'].'&nbsp;</td>

		<td>'.$_POST['apell7'].'&nbsp;</td>

		<td>'.$_POST['tel7'].'&nbsp;</td>

		<td>'.$_POST['neg7'].'&nbsp;</td>

		<td>'.$_POST['dir7'].'&nbsp;</td>

	</tr>

	<tr>

		<td>8&nbsp;</td>

		<td>'.$_POST['nombre8'].'&nbsp;</td>

		<td>'.$_POST['apell8'].'&nbsp;</td>

		<td>'.$_POST['tel8'].'&nbsp;</td>

		<td>'.$_POST['neg8'].'&nbsp;</td>

		<td>'.$_POST['dir8'].'&nbsp;</td>

	</tr>

	<tr>

		<td>9&nbsp;</td>

		<td>'.$_POST['nombre9'].'&nbsp;</td>

		<td>'.$_POST['apell9'].'&nbsp;</td>

		<td>'.$_POST['tel9'].'&nbsp;</td>

		<td>'.$_POST['neg9'].'&nbsp;</td>

		<td>'.$_POST['dir9'].'&nbsp;</td>

	</tr>

	<tr>

		<td>10&nbsp;</td>

		<td>'.$_POST['nombre10'].'&nbsp;</td>

		<td>'.$_POST['apell10'].'&nbsp;</td>

		<td>'.$_POST['tel10'].'&nbsp;</td>

		<td>'.$_POST['neg10'].'&nbsp;</td>

		<td>'.$_POST['dir10'].'&nbsp;</td>

	</tr>

	<tr>

		<td>11&nbsp;</td>

		<td>'.$_POST['nombre11'].'&nbsp;</td>

		<td>'.$_POST['apell11'].'&nbsp;</td>

		<td>'.$_POST['tel11'].'&nbsp;</td>

		<td>'.$_POST['neg11'].'&nbsp;</td>

		<td>'.$_POST['dir11'].'&nbsp;</td>

	</tr>

	<tr>

		<td>12&nbsp;</td>

		<td>'.$_POST['nombre12'].'&nbsp;</td>

		<td>'.$_POST['apell12'].'&nbsp;</td>

		<td>'.$_POST['tel12'].'&nbsp;</td>

		<td>'.$_POST['neg12'].'&nbsp;</td>

		<td>'.$_POST['dir12'].'&nbsp;</td>

	</tr>

	<tr>

		<td>13&nbsp;</td>

		<td>'.$_POST['nombre13'].'&nbsp;</td>

		<td>'.$_POST['apell13'].'&nbsp;</td>

		<td>'.$_POST['tel13'].'&nbsp;</td>

		<td>'.$_POST['neg13'].'&nbsp;</td>

		<td>'.$_POST['dir13'].'&nbsp;</td>

	</tr>

	<tr>

		<td>14&nbsp;</td>

		<td>'.$_POST['nombre14'].'&nbsp;</td>

		<td>'.$_POST['apell14'].'&nbsp;</td>

		<td>'.$_POST['tel14'].'&nbsp;</td>

		<td>'.$_POST['neg14'].'&nbsp;</td>

		<td>'.$_POST['dir14'].'&nbsp;</td>

	</tr>

	<tr>

		<td>15&nbsp;</td>

		<td>'.$_POST['nombre15'].'&nbsp;</td>

		<td>'.$_POST['apell15'].'&nbsp;</td>

		<td>'.$_POST['tel15'].'&nbsp;</td>

		<td>'.$_POST['neg15'].'&nbsp;</td>

		<td>'.$_POST['dir15'].'&nbsp;</td>

	</tr>

	<tr>

		<td>16&nbsp;</td>

		<td>'.$_POST['nombre16'].'&nbsp;</td>

		<td>'.$_POST['apell16'].'&nbsp;</td>

		<td>'.$_POST['tel16'].'&nbsp;</td>

		<td>'.$_POST['neg16'].'&nbsp;</td>

		<td>'.$_POST['dir16'].'&nbsp;</td>

	</tr>

	<tr>

		<td>17&nbsp;</td>

		<td>'.$_POST['nombre17'].'&nbsp;</td>

		<td>'.$_POST['apell17'].'&nbsp;</td>

		<td>'.$_POST['tel17'].'&nbsp;</td>

		<td>'.$_POST['neg17'].'&nbsp;</td>

		<td>'.$_POST['dir17'].'&nbsp;</td>

	</tr>

	<tr>

		<td>18&nbsp;</td>

		<td>'.$_POST['nombre18'].'&nbsp;</td>

		<td>'.$_POST['apell18'].'&nbsp;</td>

		<td>'.$_POST['tel18'].'&nbsp;</td>

		<td>'.$_POST['neg18'].'&nbsp;</td>

		<td>'.$_POST['dir18'].'&nbsp;</td>

	</tr>

	<tr>

		<td>19&nbsp;</td>

		<td>'.$_POST['nombre19'].'&nbsp;</td>

		<td>'.$_POST['apell19'].'&nbsp;</td>

		<td>'.$_POST['tel19'].'&nbsp;</td>

		<td>'.$_POST['neg19'].'&nbsp;</td>

		<td>'.$_POST['dir19'].'&nbsp;</td>

	</tr>

	<tr>

		<td>20&nbsp;</td>

		<td>'.$_POST['nombre20'].'&nbsp;</td>

		<td>'.$_POST['apell20'].'&nbsp;</td>

		<td>'.$_POST['tel20'].'&nbsp;</td>

		<td>'.$_POST['neg20'].'&nbsp;</td>

		<td>'.$_POST['dir20'].'&nbsp;</td>

	</tr>



</table>

';

/*fin de la tabla*/

// once the variables have been defined, they can be included

// in the mail function call which will send you an email

mail($sendTo, $subject, $mensaje, $headers);

echo "<script type='text/javascript'>

alert('Reporte diario enviado');

history.back(1)

</script>";

?>