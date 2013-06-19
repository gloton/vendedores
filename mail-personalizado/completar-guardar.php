<?php
include_once '../../lib/class.php';
//print_r($_SESSION);
//$body_bd =
//print_r($_POST);
$productos = $_POST;
//print_r($productos);
$nro_productos = count($productos);
if (($nro_productos > 3) && ($nro_productos < 1)) {
	;
}
exit();
for ($i = 0; $i < count($productos); $i++) {
	//echo $productos[$i] . "<br />";
	foreach ($productos as $indice => $valor){
	
	        if ($valor == "on" ) {
	               echo("verdadero <br />" );
	       }
	}
	
}
?>