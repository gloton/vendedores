<div class="navigation">
<h1>Acceso</h1>
<ul>
<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar" target="_self">Home Litar</a></li>
<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/clientes/index.php" target="_self">Zona Clientes</a></li>
<?php 
//perfiles con que podran acceder
$perf_permitidos = array (3,6);
if (in_array($id_perfil, $perf_permitidos, true))
{
	?>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/postulantes/index.php" target="_self">Zona Postulantes</a></li>
<?php 
	}
?>
<?php
//perfiles con que podran acceder
$perf_permitidos = array (3,4,6);
if (in_array($id_perfil, $perf_permitidos, true))
{
	?>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/index.php" target="_self">Zona Vendedores</a></li>
<?php 
	}
?>
<?php 

//perfiles con que podran acceder
//perfil 6, es los supervisores
$perf_permitidos = array (3,6);
if (in_array($id_perfil, $perf_permitidos, true))
	{
?>      
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/supervisores/index.php" target="_self">Zona Supervisores</a></li>
<?php 
	}
?> 
<?php 

//perfiles con que podran acceder
$perf_permitidos = array (3,6);
if (in_array($id_perfil, $perf_permitidos, true))
	{
?>      
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/editor/index.php" target="_self">Panel de Usuarios</a></li>
<?php 
	}
?>        
     
      <li><a href="http://webmail.litar.cl" target="_blank">E-Mail</a></li>
    </ul>
        <h1>Entrenamiento</h1>
    <ul>
      <li><a href="http://www.litar.cl/postulantes/temas.php" target="_blank">Temarios</a></li>
      <li id="cargar-cuestionario"><a href="javascript:void(0);">Cuestionarios</a></li>
      <li></li>
    </ul>
        <h1>Presentaciones</h1>
    <ul>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion-uvas.php" target="_self">Uvas</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion-cucurbitaceas.php" target="_self">Cucurbitaceas</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion_arandano.php" target="_self">Arandano</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion_cerezas.php" target="_self">Cerezas</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion_durazno.php" target="_self">Duraznos</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion_frutilla.php" target="_self">Frutillas</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion_pomaceas.php" target="_self">Pomaceas</a></li>
      <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/presentacion_tomate.php" target="_self">Tomates</a></li>
    </ul>    

<?php 
//perfiles con que podran acceder a ver y enviar el formulario
$perf_permitidos = array (3,4,6);
if (in_array($id_perfil, $perf_permitidos, true)) 
	{	
?>		
	<h1>Gesti&oacute;n</h1>
	<ul>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/generar-orden-compra.php">Generar orden de compra</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/reportediario.php">Reporte Diario</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/planilla-de-inventario.php">Inventario mensual</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/proyecciones.php">Proyeccciones de ventas</a></li>
	</ul>
	<h1>Reporte dep&oacute;sitos</h1>
	<ul>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/generar-orden-compra.php">Generar orden de compra</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/reportediario.php">Reporte Diario</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/planilla-de-inventario.php">Inventario mensual</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/vendedores/proyecciones.php">Proyeccciones de ventas</a></li>
	</ul>	
<?php 
	}
?>     
	<h1>
		<div style="margin-bottom: -22px;" >
		<?php echo $_SESSION["nombre"] ?>
		</div>
		<a class="cerrar_sesion" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/litar/lib/cerrar-cesion.php">Cerrar Sesion</a>    
	</h1>
   </div>