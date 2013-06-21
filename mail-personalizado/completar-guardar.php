<?php
include_once '../../lib/class.php';
print_r($_SESSION);//Array ( [nombre] => Marcelo [id_perfil] => 4 [apellidos] => Salas [correo] => prueba1@w7.cl [id_usuario] => 204 [perfil] => vendedor ) 

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

$body_cuerpo = $body_cabecera . $body_detalles;

?>