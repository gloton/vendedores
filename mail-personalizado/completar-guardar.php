<?php
include_once '../../lib/class.php';
//print_r($_SESSION);

//obtengo los datos del formulario
$productos = $_POST;
$nro_productos = count($productos);

//validar que haya ingresado [1,3] productos
if (($nro_productos > 3) && ($nro_productos < 1)) {
	//devolver a la pagina creacion con orden desplegar error
	;
}
$i = 0;
foreach ($productos as $indice => $valor){
	
	//echo $indice . " <br />" ;
	if ($indice != "nombre") {
		$sql_detalle = "SELECT detalle FROM productos_mail WHERE id_produto=$indice";
		$query_detalle = mysql_query($sql_detalle, Conectar::con()) or die("No se pudo ejecutar consulta");			
		$detalles["detalle"] = mysql_fetch_array($query_detalle);
		
		/* var_dump($detalles["detalle"][0]);
		exit(); */
	}
	//var_dump($detalles["detalle"][0]);
	echo $detalles["detalle"][0];
}

?>