<?php 
session_start();
print_r($_SESSION);
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

</head>
<body>

<div id="page">
	<form name="fmr_ingreso_datos" style="width: 600px" class="well" method="post" action="./completar-guardar.php">
		<label>Nombre de etiqueta</label>
		<input type="text" class="span3" placeholder="Escribe algo…">	
    	<ul>
        	<li><label for="ch_location">Enable location tracking: </label><input type="checkbox" id="ch_location" name="ch_location" /></li>
	        <li><label for="ch_showsearch">Include me in search results: </label><input type="checkbox" id="ch_showsearch" name="ch_showsearch" /></li>
	        <li><label for="opcion3">Esta es la opcion tercera</label><input type="checkbox" id="opcion3" name="opcion3" /></li>
	        <li><label for="opcion4">Esta es la opcion cuarta</label><input type="checkbox" id="opcion4" name="opcion4" /></li>
        </ul>
        <button type="submit" class="btn">Enviar</button>
    </form>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/jquery.tzCheckbox.js"></script>
<script src="js/script.js"></script>

<script type="text/javascript" src="http://<?php echo servidor;?>lib/bootstrap/css/js/bootstrap.js"></script>	
</body>
</html>