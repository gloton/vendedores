<?php
include_once '../lib/class.php';
$sql_update_proy = "UPDATE `usuarios` SET `fecha_limite_proy` = '1' WHERE `usuarios`.`id_perfil` =4;";
mysql_query($sql_update_proy,Conectar::con()) or die('No fue posible realizar consulta');
?>