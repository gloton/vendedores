<?php 
include_once '../../lib/class.php';
//$conectar = Conectar::con() or die ("No se pudo realizar la conexion");
$sql_prod_mail = "SELECT * FROM productos_mail";
$consulta_prod_mail = mysql_query($sql_prod_mail,Conectar::con()) or die ("No se pudo realizar la consulta");

?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingreso de datos</title>
</head>
<body>
	<h1>Eliga como máximo 3 productos</h1>
	<ul id="lst_prod">
	<?php while ($fila = mysql_fetch_array($consulta_prod_mail)) :?>
		<li>
			<p><input name="<?php echo $fila['nombre']; ?>" type="text" value="" /><?php echo $fila['nombre']; ?></p>
		</li>
	<?php endwhile;?>
	</ul>
</body>
</html>