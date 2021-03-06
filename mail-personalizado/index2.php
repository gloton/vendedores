<?php 
include_once("../../lib/class.php");
//print_r($_SESSION);
unset($_SESSION['mensaje']);
//detalle
$sql_productos_mail = "SELECT id_produto,nombre_producto,nombre FROM productos_mail;";
$query_productos_mail = mysql_query($sql_productos_mail, Conectar::con()) or die("No se realizo la consulta productos");
//ficha
$sql_fichas_mail = "SELECT id_ficha,nombre_ficha,nombre,enlace FROM fichas_mail;";
$query_fichas_mail = mysql_query($sql_fichas_mail, Conectar::con()) or die("No se realizo la consulta fichas");
//aplicacione
$sql_aplicaciones_mail = "SELECT id_aplicacion,nombre_aplicacion,nombre,lista FROM aplicaciones_mail;";
$query_aplicaciones_mail = mysql_query($sql_aplicaciones_mail, Conectar::con()) or die("No se realizo la consulta aplicaciones");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creación de correo electronico</title>
<link rel="stylesheet" type="text/css" href="http://<?php echo $servidor;?>lib/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="http://<?php echo $servidor;?>lib/bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/breadcroumbs.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.tzCheckbox.css" />
<style type="text/css">
#wrap_alertas {
	display: none;
	position: fixed;
	right: 5%;
	top: 8%;
	width: 368px;
	z-index: 1000;
}
#wrap_alertas .alert {
	margin-bottom: 0;
	box-shadow:  3px 3px 3px 3px rgba(55, 55, 55, 0.3);	
		-webkit-box-shadow:  3px 3px 3px 3px rgba(55, 55, 55, 0.3);	
}
#ficha {
	display: none;
}
#aplicacion {
	display: none;
}
</style>

</head>
<body>
<!-- inicio mensaje alerta -->
<div id="wrap_alertas">  

</div>  
<!-- fin mensaje alerta -->
<div class="container">
	<div class="row">
		<div class="span12">
			<!-- bc_ hace referencia a breadcrumbs -->
			<ul class="breadcrumb">
				<li id="bc_detalle"><a href="#">PASO 1</a></li>
				<li id="bc_ficha"><a href="#">PASO 2</a></li>
				<li id="bc_aplicacion"><a href="#">PASO 3</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="page">
	<form name="fmr_ingreso_datos" id="fmr_ingreso_datos" style="width: 600px" class="well" method="post" action="completar-guardar2.php">
		<!-- paso, hace referencia a cada pagina con su formulario, en este caso son 3 pasos -->
    	<div id="detalle" class="paso">
			<label>Nombre del cliente : </label>
			<input name="nombre" type="text" class="span3" placeholder="Escriba el nombre..." />	
			<label>Correo del cliente : </label>
			<input name="correo_cli" type="text" class="span3" placeholder="Escriba el correo..." />
    		<ul>
    		<?php while ($fila = mysql_fetch_array($query_productos_mail)) : ?>
    		        	<li><label for="<?php echo $fila["nombre_producto"]; ?>"><?php echo $fila["nombre"]; ?></label><input type="checkbox" id="<?php echo $fila["nombre_producto"]; ?>" name="<?php echo $fila["nombre_producto"]; ?>" value="detalle" /></li>
    		<?php endwhile; ?>
    		</ul>
    	</div>
    	<div id="ficha" class="paso">
    		<ul>
    		<?php while ($fila = mysql_fetch_array($query_fichas_mail)) : ?>
    		        	<li><label for="<?php echo $fila["nombre_ficha"]; ?>"><?php echo $fila["nombre"]; ?></label><input type="checkbox" id="<?php echo $fila["nombre_ficha"]; ?>" name="<?php echo $fila["nombre_ficha"]; ?>" value="ficha" /></li>
    		<?php endwhile; ?>
			</ul>
    	</div>
    	<div id="aplicacion" class="paso"> 
	    	<ul>
	    	<?php while ($fila = mysql_fetch_array($query_aplicaciones_mail)) : ?>
	        	<li><label for="<?php echo $fila["nombre_aplicacion"]; ?>"><?php echo $fila["nombre"]; ?></label><input type="checkbox" id="<?php echo $fila["nombre_aplicacion"]; ?>" name="<?php echo $fila["nombre_aplicacion"]; ?>" value="aplicacion" /></li>
	    	<?php endwhile; ?>
	        </ul>
	         <button id="btn_guardar" type="submit" class="btn">Guardar</button>
	         
	         <p style="margin-top: 20px;"><a href="#" class="btn btn-primary btn-large">Volver al portal vendedores</a></p>
		</div>	                    
       
        <div id="ajax_loader" style="margin-top: 10px;padding-left: 20px;"><img id="loader_gif" src="images/loader.gif" style=" display:none;"/></div>
    </form>
	
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.tzCheckbox.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="http://<?php echo $servidor;?>lib/bootstrap/js/bootstrap.js"></script>	
<script type="text/javascript" src="http://<?php echo $servidor;?>lib/bootstrap/js/bootstrap-alert.js"></script>

<!-- <script type="text/javascript" src="js/ajax.js"></script> -->	
</body>
</html>