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
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="../default_nueva.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../lib/jqueryui/css/jquery-ui.css" media="screen" />
	<script type="text/javascript" src="../Scripts/AC_RunActiveContent.js"></script>
	<script type="text/javascript" src="../js/fechas.js"></script>
	<script type="text/javascript" src="../js/multiplicar-orden-compra.js"></script>
	<script type="text/javascript" src="../valida/validar_rut.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="../lib/jqueryui/jquery-ui.js" ></script>
	<script type="text/javascript" src="../js/jquery.metadata.js" ></script>
	<script type="text/javascript" src="../js/jquery-validation-1.10.0/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../js/jquery-validation-1.10.0/localization/messages_es.js"></script>
	<style type="text/css">
		legend {font-size: 14px; padding: 0 6px;}
		fieldset {margin-bottom: 16px; padding: 8px 8px 8px 10px; -webkit-border-radius: 8px; border-radius: 8px; }
		label { width: 10em; float: left; }
		label.error { 
		    color: red;
		    float: none;
		    padding-bottom: 14px;
		    vertical-align: top;
		    width: 300px;	
		}
		p { clear: both; }
		.submit { margin-left: 12em; }
		em { font-weight: bold; padding-right: 1em; vertical-align: top; }
	</style>
	<style type="text/css">
		span.pago {
			display: inline-block;
			width: 68px;
		}
		td input {
			text-align: right;
		}
	</style>
<script type="text/javascript">
//confirmar antes de enviar el reporte
function enviarOrenComp(){
    if(confirm("Confirme si acepta enviar la ORDEN DE COMPRA"))
    {
        document.ordencompra.submit();
    }
}
</script>
	<script type="text/javascript">
	// este lo estoy usando para el radiobutton
	// only for demo purposes
	$.validator.setDefaults({
		submitHandler: function() {
		    if(confirm("Confirme si acepta enviar la ORDEN DE COMPRA"))
		    {
		        document.ordencompra.submit();
		    }
		}
	});
	$.metadata.setType("attr", "validate");
		$(document).ready(function(){
			//calendario
			$( "#date" ).datepicker({
				dateFormat: "dd-mm-yy",
				monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
				dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
				firstDay: 1
			});
			//al tomar el foco el campo, este se borra
			var texto="0";
			$(".borrar")
			  .val(texto)
			  .focus(function(){ $(this).val('') })
			  .blur(function(){ $(this).val() === '' ? $(this).val(texto) : null; });
			//cambiar color a colocar foco
		    $('input:text').focus(
				function(){
					$(this).css({'background-color' : '#FFF378'});
				}
			);
			$('input:text').blur(
				function(){
					$(this).css({'background-color' : '#FFFFFF'});
				}
			);
			//validacion
			$("#commentForm").validate();
			//formas de pago
			$( ".waypay").click(function (){
				elegido=$(this).val();
				$.post("pagoelegido.php", { elegido: elegido }, function(data){
					$("#detallespago").html(data);
				});					
			});
			//pago inicial
			var texto2="Pago Inicial";
			$(".borrarPagoInicial")
			  .val(texto2)
			  .focus(function(){ $(this).val('') })
			  .blur(function(){ $(this).val() === '' ? $(this).val(texto2) : null; });
				//mostra o ocultar informacion si es empresa
				$( "#orden_compra_emp").click(function (){
					if ($("#con_pagare").is(":checked")) {
							$("#opcion_emp_rleg").css({"display":"block"});
							$('#block_rep_legal').load('rep_legal.html');
					} else {
							$('#block_rep_legal').html('');
					}						
				});
				$( "#orden_compra_pnatural").click(function (){
					$('#block_rep_legal').html('');
				});
				//pregunta pagara con pagare
				$("#con_pagare").click(function (){
					$("#sin_pagare").removeAttr("checked");
					$("#opcion_emp_rleg").css({"display":"block"});
					$("#optpagare").css({"display":"inline"});
					$("#optcontado").css({"display":"none"});
					$("#optcheque").css({"display":"none"});
					$('#radio_pagare.waypay').trigger('click');
				});
				$("#sin_pagare").click(function (){
					$("#con_pagare").removeAttr("checked");
					$("#opcion_emp_rleg").css({"display":"none"});
					$("#optpagare").css({"display":"none"});
					$("#optcontado").css({"display":"inline"});
					$("#optcheque").css({"display":"inline"});					
					$('#block_rep_legal').html('');
					$('#radio_contado.waypay').trigger('click');
				});												
			});
	</script>	
	<script type="text/javascript">
		var nav4 = window.Event ? true : false;
		function solonumeros(evt){ 
		var key = nav4 ? evt.which : evt.keyCode; 
		return (key <= 13 || (key >= 48 && key <= 57));
		}
	</script>
	<style type="text/css">
	/*este lo use para validar radiobutton empresa*/
	/*oculta el mensaje de error*/	
	.block { display: block; }
	form.cmxform label.error { display: none; }	
	p#preg_pago_pagare label.error { display: none; }	
	</style>	
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
			<h1>Orden de compra</h1>
			<div class="body">
			<!-- inicio del contenido -->
				<div style="color: red; font-size: 16px; width: 500px; display: block;">PAGINA EN PRUEBAS-NO GENERE NINGUNA ORDEN DE COMPRA</div>
				<form name="ordencompra" class="cmxform" id="commentForm" method="post" action="pagare.php">
					<!-- inicio consulta por pago de cheque -->
						<p id="preg_pago_pagare">
							<span style="display: inline-block; font-weight: bold;">¿El cliente pagara con pagare?</span> <br />
							<input  type="radio" id="con_pagare" class="pagopagare" value="Si" name="pago_conpagare" validate="required:true" /> SI 
							<input  type="radio" id="sin_pagare" class="pagopagare" value="No" name="pago_conpagare"/> NO
							<label for="pago_conpagare" class="error" style="font-size: 1.2em; width: 300px;padding-bottom:12px;">Este campo es obligatorio.</label>
						</p>
					<!-- fin consulta por pago de cheque -->
					<div id="opcion_emp_rleg" style="display:none;">
						<p style="padding-bottom:5px;">
							<label for="orden_compra_emp">Empresa</label>
							<input class="emp_pnat" type="radio" id="orden_compra_emp" value="ord_emp" name="solicitud" validate="required:true" />
						</p>
						<p style="padding-bottom:2px;">
							<label for="orden_compra_pnatural">Persona Natural</label>
								<input class="emp_pnat"  type="radio" id="orden_compra_pnatural" value="ord_rleg" name="solicitud"/>
						</p>	
						<label for="solicitud" class="error" style="font-size: 1.2em; width: 300px;padding-bottom:12px;">Este campo es obligatorio.</label>
					</div>
					<div id="block_rep_legal"></div>									
					<fieldset style="margin-top: 18px;">
						<legend>Datos de Comprador</legend>
						<p style="padding-top:12px;">
							<label for="raz_soc">Razón social :</label>
							<em>*</em><input id="cname" name="raz_soc" size="25" class="required" minlength="2" />
						</p>				
						<p>
							<label for="vendedor">Vendedor :</label>
							<em>*</em><input name="vendedor" size="25" class="required" minlength="2" value="<?php echo $nombre_vendedor." ".$apellidos_vendedor; ?>" readonly="readonly" />
						</p>
						<p>
							<label for="dir">Dirección :</label>
							<em>*</em><input name="dir" size="25" class="required" minlength="2" />
						</p>
						<p>
							<label for="com">Comuna :</label>
							<em>*</em><input name="com" size="25" class="required" minlength="2" />
						</p>
						<p>
							<label for="reg">Región :</label>
							<em>*</em>
							<select name="reg">
								<option>Tarapacá</option>
								<option>Antofagasta</option>
								<option>Atacama</option>
								<option>Coquimbo</option>
								<option>Valparaíso</option>
								<option>O`Higgins</option>
								<option>El Maule</option>
								<option>El Bío Bío</option>
								<option>La Araucanía</option>
								<option>Los Lagos</option>
								<option>Aysén</option>
								<option>Magallanes y Antártica Chilena</option>
								<option>Región Metropolitana de Santiago</option>
								<option>Los Ríos</option>
								<option>Arica y Parinacota</option>
							</select>
						</p>
						<p>
							<label for="rut">Rut :</label>
							<em>*</em><input name="rut" size="25" class="required" minlength="2" onblur="formatea_rut();" />
						</p>
						<p>
							<label for="tel">Teléfono :</label>
							<em>*</em><input name="tel" id="tel" size="25" class="required" minlength="2" />
						</p>
						<p>
							<label for="date">Fecha :</label>
							<em>*</em><input name="date" id="date" size="25" class="required" minlength="2" />
						</p>
					</fieldset>
					<fieldset>
						<legend>Datos Compra</legend>
						<table width="480" border="0" style="font-size: 1.2em;">
							<tbody>
								<tr>
									<td>&nbsp;</td>
									<td>
										<table width="246" border="0">
											<tbody>
												<tr>
													<td><div style="text-align: center;">Cantidad</div></td>
													<td><div style="text-align: center;">Precio Unitario </div></td>
													<td><div style="text-align: center;">Total</div></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Indumax_foliar :</td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun" /></td>
													<td><input size="13" value="0" name="tot" readonly="readonly" onfocus="multiplicar();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Enzimark 5 litros : </td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant2" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun2" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot2" readonly="readonly" onfocus="multiplicar2();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Lactoplus 5 litros : </td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant3" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun3" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot3" readonly="readonly" onfocus="multiplicar3();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Micotric 5kg : </td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant5" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun5" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot5" readonly="readonly" onfocus="multiplicar5();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Saniplant 2kg :</td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant6" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun6" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot6" readonly="readonly" onfocus="multiplicar6();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Multigranador 5 litros : </td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant7" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun7" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot7" readonly="readonly" onfocus="multiplicar7();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>MasCuaja 5 litros :</td>
									<td>
									  <table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant8" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun8" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot8" readonly="readonly" onfocus="multiplicar8();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Saniplant 5 litros :</td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant9" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun9" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot9" readonly="readonly" onfocus="multiplicar9();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Yoymark 1 litros :</td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant10" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun10" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot10" readonly="readonly" onfocus="multiplicar10();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>Aminoplant 5 litros : </td>
									<td>
										<table width="247" border="0">
											<tbody>
												<tr>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="cant11" /></td>
													<td><input class="borrar" onkeypress="return solonumeros(event)" size="13" value="0" name="precun11" /></td>
													<td><input onkeypress="return solonumeros(event)" size="13" value="0" name="tot11" readonly="readonly" onfocus="multiplicar11();" /></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>				
								<tr>
									<td><strong>Total : </strong></td>
									<td><input class="required" size="40" style="margin-left: 2px; width: 82px;" name="totalCompra" readonly="readonly" /></td>
								</tr>
								<tr>
									<td><strong>Adeudado : </strong></td>
									<td><input class="required" size="40" style="margin-left: 2px; width: 82px;" name="total_adeudado" readonly="readonly" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Pago inicial : </td>
									<td>
										<span style="display:inline-block; font-size: 14px;">$ </span>
										<input type="text" name="pago_inicial" value="Pago inicial" class="borrarPagoInicial" style="width: 80px; color:#666;" onchange="totalAdeudado();" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>								
								<tr>
									<td>Giro : </td>
									<td><em>*</em><input size="40" name="gir" class="required" /></td>
								</tr>
								<tr>
									<td style="height: 28px;">Formas de Pago : </td>
									<!--  
									<td><input onkeypress="return validar(event)" size="40" name="conpag"></td>
									-->
									<td>
										<div id="optcontado" style="display: inline;"><input id="radio_contado" class="waypay" type= "radio" name ="conpag" value= "1" checked="checked" /><span class="pago">Contado</span></div>
										<div id="optcheque" style="display: inline;"><input id="radio_cheque" class="waypay" type= "radio" name ="conpag" value= "2" /><span class="pago">Cheque</span></div>
										<div id="optpagare" style="display: inline;"><input id="radio_pagare" class="waypay" type= "radio" name ="conpag" value= "3" /><span class="pago">Pagaré</span></div>
									</td>
								</tr>
								<tr>
									<td style="height: 28px;">&nbsp;</td>
									<!--  
									<td><input onkeypress="return validar(event)" size="40" name="conpag"></td>
									-->
									<td><div id="detallespago"></div></td>
								</tr>
							</tbody>
						</table>		
				</fieldset>
						<p>
							<input type="hidden" name="nombre_vendedor" value="<?=$nombre_vendedor;?>" />
							<input type="hidden" name=apellidos_vendedor value="<?=$apellidos_vendedor;?>" />
							<input type="hidden" name="correo_vendedor" value="<?=$correo_vendedor;?>" />
							<input class="submit" type="submit" value="Enviar orden de compra" />
						</p>
				</form>
			<!-- fin del contenido -->
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
<img id="background-img" class="bg" src="../img/fondo.jpg" />
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