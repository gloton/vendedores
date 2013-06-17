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
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" type="text/css" href="http://www.litar.cl/default_interior.css" media="screen"/>
<script src="http://www.litar.cl/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
	<div class="top">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td rowspan="2" scope="col">
					<img src="http://www.litar.cl/img/logo-litar78px.png" width="78" height="59" />
				</td>
				<td scope="col" width="75" align="center" valign="bottom">
					<img src="http://www.litar.cl/img/home.png" width="32" height="32" alt="Contacto" />
				</td>
				<td scope="col" width="75" align="center"  valign="bottom">
					<img src="http://www.litar.cl/img/mail.png" width="32" height="32" alt="Contacto" />
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
			AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','830','height','237','src','http://www.litar.cl/animaciones/animacion01','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','http://www.litar.cl/animaciones/animacion01' ); //end AC code
		</script>
		<noscript>
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="830" height="237">
					  <param name="movie" value="http://www.litar.cl/animaciones/animacion01.swf" />
					  <param name="quality" value="high" />
					  <embed src="http://www.litar.cl/animaciones/animacion01.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="830" height="237"></embed>
			</object>
		</noscript>
	  </div><!--Fin header-->
	  
	<div class="main">
	    <div class="item">
			<div class="date">
					<div>
						<script type="text/javascript">        
							var mydate=new Date()
							var year=mydate.getYear()
							if (year < 1000)
							year+=1900
							var day=mydate.getDay()
							var month=mydate.getMonth()
							var daym=mydate.getDate()
							if (daym<10)
							daym="0"+daym
							var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado")
							var montharray=new Array("Enero","Feb","Mar","Abr","May","Jun","Jul","Ago","Sept","Oct","Nov","Dic")
							document.write("<normal><font color='ffffff' face='Arial'>  "+daym+" de "+montharray[month]+" </font></small>")
						</script>
					</div>
			</div>
			<div class="content">
				<h1 align="center">Inventario Mensual</h1>
				<div class="body" id="tema1_contenido" style="background-color: #FFFFFF;">
				<!-- inicio aca va el contenido -->
					<!--Inicio del formulario planilla de inventario jgl-->
					<div id="invt">
						<form name="form_invt" action="./mail-inventario.php" method="post"  >
							<table border="1" cellspacing="0" cellpadding="2" style="background-color:#FF0; width:503px;">
								<tr>
									<th style="width:200px;">Productos</td>
									<th>Cantidad en unidades</td>
								</tr>
								<tr>
									<td>Indumax_foliar :</td>
									<td align="center">
										<label>
											<input class="textoCentrado" type="text" name="indumaz_foliar" size="30"  onkeypress='return solonumeros(event)'  />
            							</label>
            						</td>
          						</tr>
          						<tr>
            						<td>Enzimark 5 litros :</td>
            						<td align="center"><input class="textoCentrado" type="text" name="enzimark_5l" size="30" onkeypress='return solonumeros(event)'/></td>
          						</tr>
          						<tr>
            						<td>Lactoplus 5 litros : </td>
            						<td align="center">
            							<input class="textoCentrado" name="lactoplus_5l" type="text" size="30" onkeypress='return solonumeros(event)'/>
            						</td>
          						</tr>
          						<tr>
            						<td>Micotric 5kg :</td>
            						<td align="center">
            							<input class="textoCentrado" name="micotric_5kg" type="text" size="30" onkeypress='return solonumeros(event)' />
            						</td>
          						</tr>
          						<tr>
            						<td>Saniplant 2kg :</td>
            						<td align="center">
            							<input class="textoCentrado" name="saniplant_2kg" type="text" size="30" onkeypress='return solonumeros(event)' />
            						</td>
          						</tr>
          						<tr>
            						<td>Multigranador 5 litros :</td>
            						<td align="center"><input class="textoCentrado" name="multigranador_5l" type="text" size="30" onkeypress='return solonumeros(event)' /></td>
          						</tr>
          						<tr>
            						<td>MasCuaja 5 litros :</td>
            						<td align="center">
            							<input class="textoCentrado" name="mascuaja_5l" type="text" size="30" onkeypress='return solonumeros(event)' />
            						</td>
          						</tr>
          						<tr>
            						<td>Saniplant 5 litros :</td>
            						<td align="center">
            							<input class="textoCentrado" name="saniplant_5l" type="text" size="30" onkeypress='return solonumeros(event)' />
            						</td>
          						</tr>
          						<tr>
            						<td>Yoymark 1 litros :</td>
            						<td align="center">
            							<input class="textoCentrado" name="yoymark_1l" type="text" size="30" onkeypress='return solonumeros(event)' />
            						</td>
          						</tr>
          						<tr>
            						<td>Aminoplant 5 litros : 	</td>
            						<td align="center">
            							<input class="textoCentrado" name="aminoplant_5l" type="text" size="30" onkeypress='return solonumeros(event)' />
            						</td>
          						</tr>          						          						
          						<tr>
            						<td>&nbsp;</td>
            						<td align="center">
										<input type="hidden" name="vend" value="<?php echo $nombre_vendedor." ".$apellidos_vendedor;?>">
										<input type="hidden" name="mailvendedor" value="<?php echo $correo_vendedor; ?>">
            							<input type="submit" title="Enviar" name="Enviar" value="Enviar" />
            						</td>
	          					</tr>
	          				</table>

						</form>
        			</div>
        			<!--Fin del formulario planilla de inventario jgl-->        
				<!-- fin aca va el contenido -->
				</div><!--fin clase body-->
			</div>
	    </div>
	    <div class="item"></div>
	</div>
<!-- inicio del menu lateral -->
  <?php include_once 'menu-vendedores.php';?>
<!-- fin del menu lateral -->
	<div class="clearer"><span></span></div>
	<div class="footer">&copy; 2008 Litar Biotecnol&oacute;gica. Todos los Derechos Reservados </div>
</div>
<img id="background-img" class="bg" src="http://www.litar.cl/img/fondo.jpg" />
</body>
</html>
<?php  
	} else {
?>
	<p>
		Usted no tiene los privilegios necesarios para acceder a esta pagina
	</p>	
<?php 		
	}
	
?>