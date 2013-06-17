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
$id_usuario = $_SESSION["id_usuario"];

$objAcceso = new acceso();
$retorno_horario = $objAcceso->horarioRepDiario($id_usuario);
$hora_inicio = $retorno_horario["horainicio"];
$hora_fin = $retorno_horario["horafin"];
$hora_actual = date('G');

/*

echo "<pre>";
var_dump($retorno_horario);
echo "</pre>";
exit();
*/
$nombre_vendedor = $_SESSION["nombre"];
$apellidos_vendedor = $_SESSION["apellidos"];
$correo_vendedor = $_SESSION["correo"];

$id_perfil =(int) ($_SESSION["id_perfil"]);
//perfiles con que podran acceder a ver y enviar el formulario
$perf_permitidos = array (3,4,6);
if (in_array($id_perfil, $perf_permitidos, true)) 
	{	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>Litar Biotecnol&oacute;gica</title>
<meta http-equiv="content-type" content="text/html; charset=utf8"/>
<link rel="stylesheet" type="text/css" href="../default_nueva.css" media="screen"/>
<script type="text/javascript" src="../valida/funcion_mail.js"></script>
<script type="text/javascript" src="../valida/validacion_ws.js"></script>
<script type="text/javascript" src="../valida/funciones_login.js"></script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<script>
function validar(e) {
    tecla = (document.all)?e.keyCode:e.which;
    if (tecla==8) return true;
    patron = /\D/;
    te = String.fromCharCode(tecla);
    return patron.test(te); 
} 
</script>

<script language="JavaScript">

var nav4 = window.Event ? true : false;
function solonumeros(evt){ 
var key = nav4 ? evt.which : evt.keyCode; 
return (key <= 13 || (key >= 48 && key <= 57));
}

</script>
<script type="text/javascript">
function enviar()
{
	if(confirm("Confirme si acepta enviar las REPORTE DIARIO"))
	{
		//document.frm-rep-diario.submit();
	    if( document.getElementById("kil").value=="")
	      {
	        alert("Debe ingresar el kilometraje recorrido");
	        return false;
	      }
	    if( document.getElementById("nombre1").value=="")
	      {
	        alert("Debe ingresar el nombre del cliente");
	        return false;
	      }
	    if( document.getElementById("apell1").value=="")
	      {
	        alert("Debe ingresar el apellido del cliente");
	        return false;
	      }
	    if( document.getElementById("tel1").value=="")
	      {
	        alert("Debe ingresar el teléfono del cliente");
	        return false;
	      }
	    if( document.getElementById("neg1").value=="")
	      {
	        alert("Debe ingresar al menos una negociación");
	        return false;
	      }           
	    if( document.getElementById("dir1").value=="")
	      {
	        alert("Debe ingresar la dirección");
	        return false;
	      }
	       		
	} else {
		return false;
	}
                                
}
</script>
<script type="text/javascript">
/*
function enviarRepDiario(){
	if(confirm("Confirme si acepta enviar las REPORTE DIARIO"))
	{
		document.frm-rep-diario.submit();
		alert("jorge");
	}

}
*/
</script>
</head>
<body>
<div class="container">
	<div class="container">
		<div class="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td rowspan="2" scope="col">
						<img src="../img/logo-litar78px.png" width="78" height="59" />
					</td>
					<td scope="col" width="75" align="center" valign="bottom">
						<img src="../img/home.png" width="32" height="32" alt="Contacto" />
					</td>
					<td scope="col" width="75" align="center"  valign="bottom">
						<img src="../img/mail.png" width="32" height="32" alt="Contacto" />
					</td>
				</tr>
				<tr>
					<th scope="col" valign="top">
						<a href="http://www.litar.cl">Home</a>
					</th>
					<th scope="col" valign="top">
						<a href="http://www.litar.cl/contacto.html">Contacto</a>
					</th>
				</tr>
			</table>
		</div><!--fin top-->   
		<map name="Map2" id="Map2">
			<area shape="rect" coords="42,3,109,17" href="http://www.cursosparati.com" target="_blank" alt="Cursos" />
		</map>
	</div>

	
	

<div class="header">
	<script type="text/javascript">
		AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','830','height','237','src','../animaciones/animacion01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../animaciones/animacion01' ); //end AC code
	</script>
	<noscript>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="830" height="237">
			<param name="movie" value="../animaciones/animacion01.swf" />
			<param name="quality" value="high" />
			<embed src="../animaciones/animacion01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="830" height="237"></embed>
		</object>
	</noscript>
</div><!--Fin header-->
 
 
 
 
<div class="main">
	<div class="item">
		<div class="date">
		<div>
	</div>
	</div><!--fin date-->
		<div class="content">
			<h1>Reporte Diario</h1>
			<div class="body" style="background-color: #FFFFFF;">
				<!--inicio conenido-->
<!-- inicio formulario de reporte -->
<form name="frm-rep-diario" action="./envio_formulario.php" method="post" onSubmit="return enviar()">
		    <table width="381" border="0">
              <tbody><tr>
                <th width="107" scope="col"><div align="left">Vendedor(a):</div></th>
                <th width="258" scope="col"> <div align="left"><?php echo $nombre_vendedor." ".$apellidos_vendedor; ?></div></th>
              </tr>
            </tbody></table>
            
             <table width="381" border="0">
              <tbody><tr>
                <th width="143" scope="col"><div align="left">Kilometraje recorrido:</div></th>
                <th width="228" scope="col"> <div align="left">
                  <input type="text" onkeypress="return solonumeros(event)" size="15" name="kil" id="kil" />
                </div></th>
              </tr>
            </tbody></table>
            <table width="381" border="0">
              <tbody><tr>
                <th width="111" scope="col">Nombre </th>
                <th width="71" scope="col">Apellido</th>
                <th width="68" scope="col">Tel&eacute;fono</th>
                <th width="103" scope="col">Negociaci&oacute;n y Compromiso </th>
                <th width="71" scope="col">Direcci&oacute;n</th>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre1" id="nombre1" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell1" id="apell1" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel1" id="tel1" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg1" id="neg1" />
                </div></td>
                <td><input type="text" size="13" name="dir1" id="dir1" /></td>
              </tr>
              <tr>
                 <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre2" />
                </div></td>
				<td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell2" />
                </div></td> 
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel2" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg2" />
                </div></td>
                <td><input type="text" size="13" name="dir2" /></td>
              </tr>
              <tr>
                 <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre3" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell3" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel3" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg3" />
                </div></td>
                <td><input type="text" size="13" name="dir3" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre4" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell4" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel4" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg4" />
                </div></td>
                <td><input type="text" size="13" name="dir4" /></td>
              </tr>
              <tr>
               <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre5" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell5" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel5" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg5" />
                </div></td>
                <td><input type="text" size="13" name="dir5" /></td>
              </tr>
              <tr>
                 <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre6" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell6" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel6" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg6" />
                </div></td>
                <td><input type="text" size="13" name="dir6" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre7" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell7" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel7" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg7" />
                </div></td>
                <td><input type="text" size="13" name="dir7" /></td>
              </tr>
              <tr>
                 <td><div align="center">
                   <input type="text" size="10" onkeypress="return validar(event)" name="nombre8" />
                 </div></td>
                 <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell8" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel8" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg8"/>
                </div></td>
                <td><input type="text" size="13" name="dir8" /></td>
              </tr>
              <tr>
                  <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre9" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell9" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel9" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg9" />
                </div></td>
                <td><input type="text" size="13" name="dir9" /></td>
              </tr>
              <tr>
                 <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre10" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell10" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel10" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg10" />
                </div></td>
                <td><input type="text" size="13" name="dir10" /></td>
              </tr>
              <tr>
                 <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre11" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell11" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel11" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg11" />
                </div></td>
                <td><input type="text" size="13" name="dir11" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre12" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell12" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel12" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg12" />
                </div></td>
                <td><input type="text" size="13" name="dir12" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre13" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell13" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel13" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg13" />
                </div></td>
                <td><input type="text" size="13" name="dir13" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre14" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell14" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel14" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg14" />
                </div></td>
                <td><input type="text" size="13" name="dir14" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre15" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell15" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel15" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg15" / >
                </div></td>
                <td><input type="text" size="13" name="dir15" /></td>
              </tr>
              <tr>
               <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre16" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell16" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel16" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg16" />
                </div></td>
                <td><input type="text" size="13" name="dir16" /></td>
              </tr>
              <tr>
                 <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre17" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell17" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel17" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg17" />
                </div></td>
                <td><input type="text" size="13" name="dir17" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre18" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell18" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel18" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg18" />
                </div></td>
                <td><input type="text" size="13" name="dir18" /></td>
              </tr>
              <tr>
               <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre19" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell19" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel19" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg19" />
                </div></td>
                <td><input type="text" size="13" name="dir19" /></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="nombre20" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" onkeypress="return validar(event)" name="apell20" />
                </div></td>
                <td><div align="center">
                  <input type="text" onkeypress="return solonumeros(event)" size="10" name="tel20" />
                </div></td>
                <td><div align="center">
                  <input type="text" size="10" name="neg20" />
                </div></td>
                <td><input type="text" size="13" name="dir20" /></td>
              </tr>
            </tbody></table>
            <p align="center">
              <input type="hidden" name="nombre" value="<?php echo $nombre_vendedor; ?>" />
              <input type="hidden" name="apellidos" value="<?php echo $apellidos_vendedor; ?>" />		
			  <input type="hidden" name="correo" value="<?php echo $correo_vendedor; ?>" />	
			  <!--  
              <button type="button" onclick="enviarRepDiario();" value="Enviar REPORTE DIARIO" title="Enviar REPORTE DIARIO" name="enviar" style="cursor:pointer">Enviar REPORTE DIARIO</button>
              -->
<?php 
if ($retorno_horario) {
	if ($hora_actual > $hora_inicio && $hora_actual <= $hora_fin) {
		$mostrar = "block";
	} else {
		$mostrar = "none";
	}
} else {
	$mostrar = "block";
}

?>            
              <input type="submit" value="enviar" style="display:<?php echo $mostrar; ?>" />
			  <input type="hidden" value="http://litar.cl/enviocorrectodereporte.html" name="success" />
			</p>
		  </form> 
<!-- fin formulario de reporte -->			
			
				<!-- fin contenido -->
			</div><!--fin body-->
		</div><!--fin content-->
	</div><!--fin item-->
</div><!--fin main-->

	<!--inicio menu jgl-->
	<?php include_once './menu-vendedores.php'; ?>
	<!--fin menu jgl--> 

	 
<div class="clearer"><span></span></div>  
<div class="footer">
<table width="605" height="20" border="0" align="center">
	<tr>
		<td width="273">
			<div align="right">
				&copy;2010 Litar.cl - Derechos Reservados
			</div>
		</td>
		<td width="293">      
			<div align="center">
				<script type="text/javascript">
					AC_FL_RunContent( 'type','application/x-shockwave-flash','data','../musica/dewplayer-multi.swf','width','240','height','20','id','dewplayer','name','dewplayer','movie','../musica/dewplayer-multi','flashvars','mp3=musica/musica-relax.mp3&autostart=1&bgcolor=88B531' ); //end AC code
				</script>
				<noscript>
					<object type="application/x-shockwave-flash" data="../musica/dewplayer-multi.swf" width="240" height="20" id="dewplayer" name="dewplayer">
						<param name="movie" value="../musica/dewplayer-multi.swf" />
						<param name="flashvars" value="mp3=musica/musica-relax.mp3&amp;autostart=1&amp;bgcolor=88B531" />
					</object>
				</noscript>
			</div>
		</td>
	</tr>
</table>
	<div align="center">
	</div>
</div>
  

</div>
<img id="background-img" class="bg" src="../img/fondo.jpg" alt="fondo de pagina" />
</body>
</html>
<!-- fin plantilla -->
<?php  
	} else {
?>
	<p>
		<script type="text/javascript">
			alert("Usted no tiene los privilegios necesarios para acceder a esta pagina");
			history.back(1);
		</script>
	</p>	
<?php 		
	}
	
?>