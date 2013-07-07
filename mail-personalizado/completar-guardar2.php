<?php
include_once '../../lib/class.php';
include_once '../../lib/PHPMailer_5.2.2/class.phpmailer.php';

//print_r($_SESSION);//Array ( [nombre] => Marcelo [id_perfil] => 4 [apellidos] => Salas [correo] => prueba1@w7.cl [id_usuario] => 204 [telefono] => 111111111 [perfil] => vendedor )
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready( function() {
	    $( ".close").click(function (event){
	          $(this).parent().parent().parent().css("display","none");
	          event.stopPropagation();
	          
	    });
	});
</script>
<?php 
//obtengo los datos del formulario
$productos = $_POST;
$nro_campos = count($productos);

//validar ingreso de nombre
if (!isset($productos["nombre"]) || empty($productos["nombre"])) {
?>
	<div class="row">  
		<div class="span4">  
			<div class="alert alert-error">  
				<a class="close" data-dismiss="alert">×</a>
				<div id="mensaje_respuesta">
					<span>Error!:</span> Debe ingresar el nombre del cliente.
				</div>
			</div>  
		</div>  
	</div> 
<?php 
	exit();
}
//validar ingreso del mail
if (!isset($productos["correo_cli"]) || empty($productos["correo_cli"])) {
	?>
	<div class="row">  
		<div class="span4">  
			<div class="alert alert-error">  
				<a class="close" data-dismiss="alert">×</a>
				<div id="mensaje_respuesta">
					<span>Error!:</span> Debe ingresar el correo del cliente.
				</div>
			</div>  
		</div>  
	</div> 
<?php 
	exit();
}
$detalles =array();
$i = 0;
foreach ($productos as $indice => $valor) {
	
	//si el checkbok tiene el valor de 
	if ($valor == "detalle") {
		$sql_detalle = "SELECT nombre,detalle FROM productos_mail WHERE id_produto=$indice";
		$query_detalle = mysql_query($sql_detalle, Conectar::con()) or die("No se pudo ejecutar consulta");			
		$detalles = mysql_fetch_array($query_detalle);
		
		#el 0 es el primer campo que se llama en el select, en este caso nombre, por lo que [1] seria detalle
		
		$body_nombre[$i] = $detalles[0];
		$i++;
	}
	
	
	//$body_detalles contendra el detalle de los productos elegidos
	$body_detalles .= $detalles[1];
}

//imprimiendo en pantalla los detalles de los productos elegidos
//echo $body_detalles;

$nro_productos = count($body_nombre);

switch ($nro_productos) {
    case 0:
    	//validar que haya ingresado por lo menos un producto
?>
	<div class="row">  
		<div class="span4">  
			<div class="alert alert-error">  
				<a class="close" data-dismiss="alert">×</a>
				<div id="mensaje_respuesta">
					<span>Error!:</span> Debe por lo menos haber elegido un producto.
				</div>
			</div>  
		</div>  
	</div> 
<?php 
        exit();
        break;
    case 1:
        $nombre_elegidos = $body_nombre[0];
        break;
    case 2:
        $nombre_elegidos = $body_nombre[0] . " y " .$body_nombre[1];
        break;
    case 3:
        $nombre_elegidos = $body_nombre[0] . ", " .$body_nombre[1] . " y " .$body_nombre[2];
        break;
        case 2:
    case ($nro_productos > 3):
?>
        	<div class="row">  
        		<div class="span4">  
        			<div class="alert alert-error">  
        				<a class="close" data-dismiss="alert">×</a>
        				<div id="mensaje_respuesta">
        					<span>Error!:</span> la cantidad de productos, no puede ser mayor a 3.
        				</div>
        			</div>  
        		</div>  
        	</div> 
<?php         
        exit();
        break; 
}

/*
 * CONSTRUCCION DEL CONTENIDO DEL MAIL PERSONALIZADO
*
* */
$body_cabecera  = '<p>Estimad(o/a) '.$productos["nombre"].', según lo conversado telefónicamente y dado su ';
$body_cabecera .= 'interés por nuestro(s) producto(s) (<b>'.$nombre_elegidos.'</b>), ';
$body_cabecera .= 'comento a usted el funcionamiento de nuestros producto(s) tal(es) como (<b>'.$nombre_elegidos.'</b>) ';
$body_cabecera .= ', es el siguiente respectivamente:';
$body_cabecera .= '</p>';

$body_pie = '<p>Además adjunto a usted, nuestra ficha técnicas, esperando que ';
$body_pie .= 'la información entregada, haya sido de su interés, me despido ';
$body_pie .= 'alerta a sus comentarios, en caso de duda no dude en comunicarse ';
$body_pie .= 'conmigo por los medios que procedo a nombrar y de todas maneras ';
$body_pie .= 'lo estaré llamando, para comentar en persona esta información, ';
$body_pie .= 'se despide';
$body_pie .= '</p>';
$body_pie .= '<h3>Fichas tecnicas</h3>';
$body_pie .= '<ul>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=enzimark.pdf" target="_blank">Enzimark</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=mascuaja_nuevo_parte1.pdf" target="_blank">Mascuaja  Parte 1/2</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=mascuaja_nuevo_parte2.pdf" target="_blank">Mascuaja  Parte 2/2</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=micorrifort.pdf" target="_blank">Micorrifort</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=Multigranador.pdf" target="_blank">Multigranador</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=saniplant_parte1.pdf" target="_blank">Saniplant Parte 1/4</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=saniplant_parte2.pdf" target="_blank">Saniplant Parte 2/4</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=saniplant_parte3.pdf" target="_blank">Saniplant Parte 3/4</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=saniplant_parte4.pdf" target="_blank">Saniplant Parte 4/4</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=soluplant.pdf" target="_blank">Soluplant</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=indumax_foliar.pdf" target="_blank">Indumax Foliar</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=yoymark_parte1.pdf" target="_blank">Yoymark Parte 1/2</li>';
$body_pie .= '<li><a href="http://www.litar.cl/editor/mail-personalizado/descargar_pdf.php?file=yoymark_parte1.pdf" target="_blank">Yoymark Parte 2/2</li>';
$body_pie .= '</ul>';
$body_pie .= '<p>';
$body_pie .= $_SESSION["nombre"] . $_SESSION["apellidos"] . ' <br />';
$body_pie .= 'Telefono : ' .$_SESSION["telefono"] .'<br />';
$body_pie .= 'Mail : '. $_SESSION["correo"] .'<br />';
$body_pie .= '<a href="http://www.litar.cl">www.litar.cl</a>';
$body_pie .= '</p>';

//contenido completo del mail
$body_cuerpo = $body_cabecera . $body_detalles . $body_pie;
//echo $body_cuerpo;

$sql_agregar_contenido = "INSERT INTO `litarcl_bdlitar`.`mails_personalizados` (`id`, `nombre_remitente`, `mail_remitente`, `nombre_destinatario`, `mail_destinatario`, `contenido`, `id_usuario`, `estado`) VALUES
						 (
						  NULL,
						 '". $_SESSION["nombre"] . $_SESSION["apellidos"] ."',
						 '". $_SESSION["correo"] ."',
						 '". htmlspecialchars($productos["nombre"], ENT_QUOTES) ."',
						 '". htmlspecialchars($productos["correo_cli"], ENT_QUOTES) ."',
						 '". htmlspecialchars($body_cuerpo, ENT_QUOTES) ."',
						 '". $_SESSION["id_usuario"] ."',
						 '0'
						 );";
$insertar_contenido = mysql_query($sql_agregar_contenido, Conectar::con()) or die("No se pudo crear el mail personalizaso");

/*
 * CONSTRUCCION DEL MENSAJE DE ALERTA
*
* */
//mensaje de aviso de ingreso de nuevo mail personalizado
$destinatario_nombre = "Jorge Gatica";//<------ CAMBIAR
$destinatario_mail = "jorge@w7.cl";//<------ CAMBIAR

/* $destinatario_nombre = "Juan Tarrason"
 $destinatario_mail = "jtarrason@litar.cl"; */
$mail             = new PHPMailer(); //
$mail->AddReplyTo($_SESSION["correo"], $_SESSION["nombre"] . " " . $_SESSION["apellidos"] );
$mail->SetFrom($_SESSION["correo"], $_SESSION["nombre"] . " " . $_SESSION["apellidos"] );

$mail->AddAddress($destinatario_mail, $destinatario_nombre);
$mail->Subject    = "Nuevo mail personaliazado";
$mail->AltBody    = "Mensaje opcional en caso de que solo se acepte mensajes de texto sin formato";

//evalua si se guardo en la BD el mail personalizado
if ($insertar_contenido) {
	$mensaje_alerta = '<p>El vendedor '. $_SESSION["nombre"] . " " . $_SESSION["apellidos"] .' a creado un nuevo mail personalizado';
	$mensaje_alerta .= '</p>';
?>
	        	<div class="row">  
	        		<div class="span4">  
	        			<div class="alert alert-success">  
	        				<a class="close" data-dismiss="alert">×</a>
	        				<div id="mensaje_respuesta">
	        					<span>Felicitaciones!:</span> Ha creado un mail personalizado correctamente.
	        				</div>
	        			</div>  
	        		</div>  
	        	</div>
	        	<br />
<?php   	
	$mail->MsgHTML($mensaje_alerta);
} else {
	$mensaje_alerta = '<p>El vendedor '. $_SESSION["nombre"] . " " . $_SESSION["apellidos"] .' no pudo crear un nuevo mail personalizado';
	$mensaje_alerta .= '</p>';
?>
		        	<div class="row">  
		        		<div class="span4">  
		        			<div class="alert alert-error">  
		        				<a class="close" data-dismiss="alert">×</a>
		        				<div id="mensaje_respuesta">
		        					<span>Error!:</span> No se pudo enviar el mail de aviso de ingreso de nuevo correo personalizado.
		        				</div>
		        			</div>  
		        		</div>  
		        	</div>
		        	<br />
<?php  	
	$mail->MsgHTML($mensaje_alerta);
}

if(!$mail->Send()) {
	//echo "No se pudo enviar el mail de alerta";
	?>
	        	<div class="row">  
	        		<div class="span4">  
	        			<div class="alert alert-error">  
	        				<a class="close" data-dismiss="alert">×</a>
	        				<div id="mensaje_respuesta">
	        					<span>Error!:</span> No se pudo enviar el mail de aviso de ingreso a Juan Tarrason. Favor informar.
	        				</div>
	        			</div>  
	        		</div>  
	        	</div> 
	<?php   	
	exit();
	$mensaje_alerta . "Mailer Error: " . $mail->ErrorInfo;
	$mail->MsgHTML($mensaje_alerta);
} else {
	//echo "Si se pudo enviar el mail de alerta";
?>
	        	<div class="row">  
	        		<div class="span4">  
	        			<div class="alert alert-success">  
	        				<a class="close" data-dismiss="alert alert-success">×</a>
	        				<div id="mensaje_respuesta">
	        					Se ha informado a Don Juan Tarrason el ingreso de un nuevo correo personalizado.
	        				</div>
	        			</div>  
	        		</div>  
	        	</div>
	        	<br />
	<?php   	
	exit();	
	$mail->MsgHTML($mensaje_alerta);
}
?>