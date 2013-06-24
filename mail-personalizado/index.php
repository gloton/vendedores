<?php 
include_once("../../lib/class.php");
//print_r($_SESSION);
$sql_productos_mail = "SELECT id_produto,nombre FROM productos_mail;";
$query_productos_mail = mysql_query($sql_productos_mail, Conectar::con()) or die("No se realizo la consulta");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creación de correo electronico</title>
<link rel="stylesheet" type="text/css" href="http://<?php echo $servidor;?>lib/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="http://<?php echo $servidor;?>lib/bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.tzCheckbox.css" />
<script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>
<!-- inicio mensaje alerta -->
<div class="container">  
	<div class="row">  
		<div class="span4">  
			<div class="alert">  
			  <a class="close" data-dismiss="alert">�</a>  
			  <div id="mensaje_respuesta"></div>
			</div>  
		</div>  
</div>  
</div>
<!-- fin mensaje alerta -->
<div id="page">
	<form name="fmr_ingreso_datos" style="width: 600px" class="well" method="get">
		<label>Nombre del cliente : </label>
		<input name="nombre" type="text" class="span3" placeholder="Escriba el nombre…">	
		<label>Correo del cliente : </label>
		<input name="correo_cli" type="text" class="span3" placeholder="Escriba el correo…">	
    	<ul>
    	<?php while ($fila = mysql_fetch_array($query_productos_mail)) : ?>
        	<li><label for="<?php echo $fila["id_produto"]; ?>"><?php echo $fila["nombre"]; ?></label><input type="checkbox" id="<?php echo $fila["id_produto"]; ?>" name="<?php echo $fila["id_produto"]; ?>" /></li>
    	<?php endwhile; ?>
        </ul>
        <button type="button" class="btn" onclick="ejecutarajax();">Guardar</button>
    </form>
	<p><a href="#" class="btn btn-primary btn-large">Volver al portal vendedores</a></p>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/jquery.tzCheckbox.js"></script>
<script src="js/script.js"></script>

<script type="text/javascript" src="http://<?php echo servidor;?>lib/bootstrap/css/js/bootstrap.js"></script>	
</body>
</html>