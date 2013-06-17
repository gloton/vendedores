<?php 
include_once("../lib/class.php");
/*
 * 1-cliente
 * 2-asesor
 * 3-editor
 * 4-vendedor
 * 5-postulante
 * 
 * */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>Litar Biotecnol&oacute;gica</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" type="text/css" href="../default_nueva.css" media="screen"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
<script type="text/javascript">
$(document).ready( function (){
    jQuery( "#cargar-cuestionario").click( function() {
        $('#ppal_vendedor').load('../cuestionarios/cuestionario.php');
    });
});
</script>
<script type="text/javascript" src="../valida/funcion_mail.js"></script>
<style type="text/css">
<!--
.Estilo13 {font-size: 1.1em}
-->
</style>
<script type="text/javascript">
var nav4 = window.Event ? true : false;
function acceptNum(evt){    
var key = nav4 ? evt.which : evt.keyCode;   
return (key <= 13 || (key >= 48 && key <= 57));
}

</script>

<script>
function validar(e) {
    tecla = (document.all)?e.keyCode:e.which;
    if (tecla==8) return true;
    patron = /\D/;
    te = String.fromCharCode(tecla);
    return patron.test(te); 
} 
</script>

<script type="text/javascript" src="../valida/validacion_ws.js"></script>
<script type="text/javascript" src="../valida/funciones_login.js"></script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<?php
$id_usuario = $_SESSION["id_usuario"];
$nombre_vendedor = $_SESSION["nombre"];
$apellidos_vendedor = $_SESSION["apellidos"];
$correo_vendedor = $_SESSION["correo"];

$objEnviProyecciones = new acceso;
$comprobar_envio_proye = $objEnviProyecciones->envioProyecciones($id_usuario);
/*
$plazo_final = 26;
$dia_actual = date('j');

if ($dia_actual > $plazo_final) {
	echo '	<script type="text/javascript">
				location.href="proyecciones.php"
			</script>';
	$cumple_plazo = 0;
} else {
	$cumple_plazo = 1;
}
*/
$id_perfil =(int) ($_SESSION["id_perfil"]);
//perfiles con que podran acceder a ver y enviar el formulario
$perf_permitidos = array (3,4,6);
if (in_array($id_perfil, $perf_permitidos, true)) 
    {   
?>

<body>
<div class="container">
    <div class="top">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
         <tr>
          <td rowspan="2" scope="col"><img src="../img/logo-litar78px.png" width="78" height="59" /></td>
          <td scope="col" width="75" align="center" valign="bottom">
            <img src="../img/home.png" width="32" height="32" alt="Contacto" />
          </td>
          <td scope="col" width="75" align="center"  valign="bottom">
            <img src="../img/mail.png" width="32" height="32" alt="Contacto" />
          </td>
         </tr>
         <tr>
          <th scope="col" valign="top"><a href="http://www.litar.cl">Home</a></th>
          <th scope="col" valign="top"><a href="http://www.litar.cl/contacto.html">Contacto</a></th>
         </tr>
        </table>
    </div><!--fin top-->
    <div class="header">
        <script type="text/javascript">
    AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','830','height','237','src','../animaciones/animacion01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../animaciones/animacion01' ); //end AC code
    </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="830" height="237">
          <param name="movie" value="../animaciones/animacion01.swf" />
          <param name="quality" value="high" />
          <embed src="../animaciones/animacion01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="830" height="237"></embed>
        </object></noscript>
      </div><!--Fin header-->
      
  <div class="main">
    <div class="item">
      <div class="content" style="width: 832px;">
	<!-- Start css3menu.com BODY section -->
      <link rel="stylesheet" href="menuvende_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<ul id="css3menu1" class="topmenu">
	<li class="topfirst"><a href="http://www.litar.cl/" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/home.png" alt=""/>Home</span></a>
	<ul>
	<?php 
	//perfiles con que podran acceder a ver y enviar el formulario
	$perf_permitidos = array (2,3,4,5,6);
	if (in_array($id_perfil, $perf_permitidos, true))
	{
	?>
		<li><a href="http://www.litar.cl/clientes"><img src="../menuvende_files/css3menu1/register.png" alt=""/>Clientes</a></li>
	<?php 
	}
	?>	
		<li><a href="http://www.litar.cl/lib/cerrar-cesion.php"><img src="menuvende_files/css3menu1/register.png" alt=""/>Cerrar Sesion</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/samples4.png" alt=""/>Entrenamiento</span></a>
	<ul>
		<li><a href="http://www.litar.cl/postulantes/temas.php">Temarios</a></li>
		<li id="cargar-cuestionario"><a href="javascript:void(0);">Cuestionarios</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/postulantes/protocolos/protocolo-operaciones.php">Protocolo Operaciones</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/postulantes/protocolos/protocolo-trabajo.php">Protocolo de Trabajo</a></li>
		<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/postulantes/protocolos/protocolo-cobro-recaudacion.php">Protocolo de Cobro y Recaudaci&oacute;n</a></li>
	</ul>
	</li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/download.png" alt=""/>Presentaciones</span></a>
	<ul>
		<li><a href="http://www.litar.cl/presentacion_tomate.php">Tomates</a></li>
		<li><a href="http://www.litar.cl/presentacion-uvas.php">Uvas</a></li>
		<li><a href="http://www.litar.cl/presentacion-cucurbitaceas.php">Cucurbitaceas</a></li>
		<li><a href="http://www.litar.cl/presentacion_arandano.php">Arandanos</a></li>
		<li><a href="http://www.litar.cl/presentacion_cerezas.php">Cerezas</a></li>
		<li><a href="http://www.litar.cl/presentacion_durazno.php">Duraznos</a></li>
		<li><a href="http://www.litar.cl/presentacion_frutilla.php">Frutillas</a></li>
		<li><a href="http://www.litar.cl/presentacion_pomaceas.php">Pomaceas</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/256-1.png" alt=""/>Gestion</span></a>
	<ul>
		<li><a href="http://www.litar.cl/vendedores/proyecciones.php"><img src="menuvende_files/css3menu1/favour3.png" alt=""/>proyecciones De Ventas</a></li>
		<li><a href="http://www.litar.cl/vendedores/planilla-de-inventario.php"><img src="menuvende_files/css3menu1/favour2.png" alt=""/>Inventario Mensual</a></li>
		<li><a href="http://www.litar.cl/vendedores/orden-compra/generar-orden-compra.php"><img src="menuvende_files/css3menu1/favour1.png" alt=""/>Generar Orden De Compra</a></li>
		<li><a href="http://www.litar.cl/vendedores/reportediario.php"><img src="menuvende_files/css3menu1/favour.png" alt=""/>Reporte Diario</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="height:32px;line-height:32px;"><span><img src="menuvende_files/css3menu1/buy.png" alt=""/>Reporte de depositos</span></a>
	<ul>
		<li><a class="pressed" href="http://www.litar.cl/vendedores/envio-pagares.php"><img src="menuvende_files/css3menu1/contact5.png" alt=""/>Envio De Pagares</a></li>
		<li><a href="http://www.litar.cl/vendedores/envio-cheques.php"><img src="menuvende_files/css3menu1/contact4.png" alt=""/>Envio De Cheques</a></li>
		<li><a href="http://www.litar.cl/vendedores/depositos-facturas.php"><img src="menuvende_files/css3menu1/contact3.png" alt=""/>Facturas en Efectivo</a></li>
		<li><a href="http://www.litar.cl/vendedores/depositos-pagare.php"><img src="menuvende_files/css3menu1/contact2.png" alt=""/>Pagares / Letra en Efectivo</a></li>
	</ul></li>
	<li class="toplast"><a href="http://www.litar.cl/correo" style="height:32px;line-height:32px;"><img src="menuvende_files/css3menu1/contact1.png" alt=""/>Ver Correo</a></li>
</ul><p class="_css3m"><a href="http://css3menu.com/">Menu HTML Template  Css3Menu.com</a></p>
<!-- End css3menu.com BODY section -->  
      
        <h1 style="width: 600px; margin-left: 50px; margin-top: 20px;">Zona Vendedores</h1>
        <div id="ppal_vendedor" class="body">
          <p align="center">
          <img src="../img/logo.png" width="396" height="304" style="padding-top: 140px;" />
          </p>
        </div>
      </div>
    </div>
    <div class="item"></div>
  </div><!--Fin main-->
<!-- inicio del menu lateral -->
  <?php //include_once 'menu-vendedores.php';?>
<!-- fin del menu lateral -->
  <div class="clearer"><span></span></div>
  <div class="footer">&copy; 2008 Litar Biotecnol&oacute;gica. Todos los Derechos Reservados </div>
</div>
</div>
<img id="background-img" class="bg" src="../img/fondo.jpg" />
<?php  
    } else {
?>
    <p>
        Usted no tiene los privilegios necesarios para acceder a esta pagina
    </p>    
<?php       
    }
    
?>

</body>
</html>