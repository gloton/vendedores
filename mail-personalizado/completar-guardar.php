<?php
include_once '../../lib/class.php';
//print_r($_SESSION);//Array ( [nombre] => Marcelo [id_perfil] => 4 [apellidos] => Salas [correo] => prueba1@w7.cl [id_usuario] => 204 [telefono] => 111111111 [perfil] => vendedor )

//obtengo los datos del formulario
$productos = $_POST;
/* print_r($_POST);
exit(); */
$nro_campos = count($productos);

//validar que haya ingresado [1,3] productos
if (($nro_campos > 3) && ($nro_campos < 1)) {
	//devolver a la pagina creacion con orden desplegar error
	;
}
$detalles =array();
$i = 0;
foreach ($productos as $indice => $valor) {
	
	if ($valor == "on") {
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
        echo "Error: Debe por lo menos haber elegido un producto";
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
        echo "Error no puede ser mayor a 3";
        exit();
        break; 
}
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
$body_pie .= '<p>';
$body_pie .= $_SESSION["nombre"] . $_SESSION["apellidos"] . ' <br />';
$body_pie .= 'Telefono : ' .$_SESSION["telefono"] .'<br />';
$body_pie .= 'Mail : '. $_SESSION["correo"] .'<br />';
$body_pie .= '<a href="http://www.litar.cl">www.litar.cl</a>';
$body_pie .= '</p>';

$body_cuerpo = $body_cabecera . $body_detalles . $body_pie;

//echo $body_cuerpo;
/*
INSERT INTO `litarcl_bdlitar`.`mails_personalizados` (`id`, `nombre_remitente`, `mail_remitente`, `nombre_destinatario`, `mail_destinatario`, `contenido`, `id_usuario`, `estado`) VALUES (NULL, 'Jorge Gatica', 'jorge@w7.cl', 'Margot Contreras', 'margotcontreras@yahoo.es', '<p>Este es el contenido <b>Principal</b>
</p>', '204', '0');
*/
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
mysql_query($sql_agregar_contenido, Conectar::con()) or die("No se crear el mail");
?>