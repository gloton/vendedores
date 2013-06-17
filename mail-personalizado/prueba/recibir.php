<?php 
//esta prueba la hice para litar
print_r($_POST);
$cantidad_on = 0;
foreach ($_POST as $item => $value){
	if ($value == "on") {
		$cantidad_on++;
	}
}

echo $cantidad_on;
?>