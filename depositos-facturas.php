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
<!-- inicio plantilla -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Depósitos en efectivo de facturas</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
<!--inicio comprobar que ninguna fila quede incompleta -->
	<script type="text/javascript">
	var ufa = "fila1";
	var contador_vacios = 0;
	//numero de columnas que contendran datos en la tabla
	var nro_columnas = 4;
	function comprobarFila (fila_anterior) {
		//alert(ufa);
		//alert(fila_anterior);
		//alert("esta es el interior de la funcion comprobarFila");
		
		$("."+ufa).children().find("input").each(function(indice,valor){
			//alert("indice: "+indice+$(this).html());
			
			//captura el valor de cada input
			valor_input = $(this).val();
			if (valor_input == "") {
				contador_vacios = contador_vacios + 1;
				//alert("numero vacios "+contador_vacios);
				if (contador_vacios != nro_columnas) {
					$("."+ufa+" "+ ".alertar").html("<img src=\"http://www.litar.cl/img/error.gif\" alt=\"\" />");
				} else {
					$("."+ufa+" "+ ".alertar").html("");
				}
			} else {
			//alert(valor_input);
			}
			if (indice == (nro_columnas-1) && contador_vacios == 0) {
				$("."+ufa+" "+ ".alertar").html("<img src=\"http://www.litar.cl/img/bueno.gif\" alt=\"\" />");
			}
		});
	}
	
	$(document).ready(function() {
		//indica que el foco estara en el primer campo fila1Xcolumna1
		$('#nfactura_1').focus();
		
		//identifica en que fila se esta trabajando
		$('tr').click(function() {
			//alert($(this).attr("class"));
			//var fila = $(this).attr("class");
			if (ufa != $(this).attr("class")) {
				contador_vacios = 0;
				//alert("esta es una fila distinta");
				comprobarFila(ufa);
				ufa = $(this).attr("class");
			} else {
				//alert("esta es la misma fila");
			}
		});
	});
	</script>
<!--fin comprobar que ninguna fila quede incompleta -->
<script type="text/javascript">
function enviarFormulario(){
if(confirm("Confirme si acepta enviar el formulario"))
{
	document.frm_depositos_factura.submit();
}
}
function volverReportes(){
if(confirm("Confirme desea volver a la Zona de Vendedores"))
{
window.location="./index.php"
}
}
</script>
<script language="JavaScript">
var nav4 = window.Event ? true : false;
function solonumeros(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57));
}
</script>


<style type="text/css">
	body{
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:0.6em;
	color:#FFFFFF;
	background-color:#567300;
	background-image:url(../img/fondo.jpg);
	}
	th{
	background-color:#666;
	}
	input[type=text]{
	width: 100% !important;
	border:0;
	}
	.reporte_depositos {
	color: #000000;
	}
	.reporte_depositos TH {
	color: #FFFFFF;
	}
	table.reporte_depositos tr {
		height: 28px;
	}
</style>
</head>
<body>
<h1>Depósitos en efectivo de facturas</h1>
<form name="frm_depositos_factura" action="mail-depositos-factura.php" method="post">
	<table class="reporte_depositos" width="933" border="1" align="center" bgcolor="#FFFFFF">
		<tr bgcolor="#FFFF00">
			<th width="208" scope="col">N°factura asociada</th>
			<th width="135" scope="col">Monto del deposito</th>
			<th width="108" scope="col">dia del deposito</th>
		  <th width="244" scope="col">Banco</th>
			<th width="27" align="center" scope="col">&nbsp;</th>
		</tr>
		<tr class="fila1">
			<td><input id="nfactura_1" name="nfactura_1" type="text" value="" /></td>
			<td align="center"><input name="monto_1" type="text" value="" /></td>
			<td align="center"><input name="fecha_1" type="text" value="" /></td>
		  <td><input name="banco_1" type="text" value="" /></td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila2">
			<td><input name="nfactura_2" type="text" value="" /></td>
			<td align="center"><input name="monto_2" type="text" value="" /></td>
			<td align="center"><input name="fecha_2" type="text" value="" /></td>
		  <td><input name="banco_2" type="text" value="" /></td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila3">
			<td><input name="nfactura_3" type="text" value="" /></td>
			<td align="center"><input name="monto_3" type="text" value="" /></td>
			<td align="center"><input name="fecha_3" type="text" value="" /></td>
		  <td><input name="banco_3" type="text" value="" /></td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila4">
			<td><input name="nfactura_4" type="text" value="" /></td>
			<td align="center"><input name="monto_4" type="text" value="" /></td>
			<td align="center"><input name="fecha_4" type="text" value="" /></td>
		  <td><input name="banco_4" type="text" value="" /></td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila5">
			<td><input name="nfactura_5" type="text" value="" /></td>
			<td align="center"><input name="monto_5" type="text" value="" /></td>
			<td align="center"><input name="fecha_5" type="text" value="" /></td>
		  <td><input name="banco_5" type="text" value="" /></td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila6">
			<td><input name="nfactura_6" type="text" value="" /></td>
			<td align="center"><input name="monto_6" type="text" value="" /></td>
			<td align="center"><input name="fecha_6" type="text" value="" /></td>
		  <td><input name="banco_6" type="text" value="" /></td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr class="fila7">
			<td><input name="nfactura_7" type="text" value="" /></td>
			<td align="center"><input name="monto_7" type="text" value="" /></td>
			<td align="center"><input name="fecha_7" type="text" value="" /></td>
		  <td><input name="banco_7" type="text" value="" /></td>
			<td align="center"><div class="alertar"></div></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
		  <td>&nbsp;</td>
			<td align="center">&nbsp;</td>
		</tr>
		<tr>
			<td><a href="http://www.litar.cl/vendedores">Volver</a></td>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td>
		  <td align="center">
				<input type="hidden" name="nombre_vendedor" value="<?=$nombre_vendedor;?>" />
				<input type="hidden" name=apellidos_vendedor value="<?=$apellidos_vendedor;?>" />
				<input type="hidden" name="correo_vendedor" value="<?=$correo_vendedor;?>" />		  
		  		<input style="cursor:pointer" name="enviar" title="Enviar depositos" value="Enviar reporte" onclick="enviarFormulario();" />
		  </td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
</form>
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