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
<title>Planilla de proyecciones de ventas para el mes</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready( function (){
	//indica que el foco estara en el primer campo fila1Xcolumna1
	$('#nombrecli_1').focus();
	
	//agregar una fila mas
	numero=5;
    $("#img_anadir_fila").click(function(event){
    	numero=numero+1;
    	var table=document.getElementById("tbl_prod");
    	var row=table.insertRow(-1);
    	var cell1=row.insertCell(0);
    	var cell2=row.insertCell(1);
    	var cell3=row.insertCell(2);
    	var cell4=row.insertCell(3);
    	var cell5=row.insertCell(4);
    	var cell6=row.insertCell(5);
    	var cell7=row.insertCell(6);
    	var cell8=row.insertCell(7);
    	var cell9=row.insertCell(8);
    	var cell10=row.insertCell(9);
    	var cell11=row.insertCell(10);
    	var cell12=row.insertCell(11);
    	var cell13=row.insertCell(12);
    	var cell14=row.insertCell(13);
    	var cell15=row.insertCell(14);
    	var cell16=row.insertCell(15);
    	var cell17=row.insertCell(16);
    	var cell18=row.insertCell(17);
    	var cell19=row.insertCell(18);
    	var cell20=row.insertCell(19);
    	var cell21=row.insertCell(20);
    	var cell22=row.insertCell(21);
        var fila = "fila" + numero;
        row.setAttribute( "class" ,fila)
    	cell1.innerHTML= "<input type='text' class='nombrecli' value='' name='nombrecli_"+ numero +"' id='nombrecli_"+ numero +"' />";
    	cell2.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio gris' value='0' name='indu_precio_"+ numero +"' id='indu_precio_"+ numero +"' />";
    	cell3.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad gris' value='0' name='indu_cant_"+ numero +"' id='indu_cant_"+ numero +"' />";
    	cell4.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio' value='0' name='enzi5l_precio_"+ numero +"' id='enzi5l_precio_"+ numero +"' />";
    	cell5.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad' value='0' name='enzi5l_cant_"+ numero +"' id='enzi5l_cant_"+ numero +"' />";
    	cell6.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio gris' value='0' name='lact5l_precio_"+ numero +"' id='lact5l_precio_"+ numero +"' />";
    	cell7.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad gris' value='0' name='lact5l_cant_"+ numero +"' id='lact5l_cant_"+ numero +"' />";
    	cell8.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio' value='0' name='mico5k_precio_"+ numero +"' id='mico5k_precio_"+ numero +"' />";
    	cell9.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad' value='0' name='mico5k_cant_"+ numero +"' id='mico5k_cant_"+ numero +"' />";
    	cell10.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio gris' value='0' name='sani2k_precio_"+ numero +"' id='sani2k_precio_"+ numero +"' />";
    	cell11.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad gris' value='0' name='sani2k_cant_"+ numero +"' id='sani2k_cant_"+ numero +"' />";
    	cell12.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio' value='0' name='mult5l_precio_"+ numero +"' id='mult5l_precio_"+ numero +"' />";
    	cell13.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad' value='0' name='mult5l_cant_"+ numero +"' id='mult5l_cant_"+ numero +"' />";
    	cell14.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio gris' value='0' name='masc5l_precio_"+ numero +"' id='masc5l_precio_"+ numero +"' />";
    	cell15.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad gris' value='0' name='masc5l_cant_"+ numero +"' id='masc5l_cant_"+ numero +"' />";
    	cell16.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio' value='0' name='sani5l_precio_"+ numero +"' id='sani5l_precio_"+ numero +"' />";
    	cell17.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad' value='0' name='sani5l_cant_"+ numero +"' id='sani5l_cant_"+ numero +"' />";
    	cell18.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio gris' value='0' name='yoym1l_precio_"+ numero +"' id='yoym1l_precio_"+ numero +"' />";
    	cell19.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad gris' value='0' name='yoym1l_cant_"+ numero +"' id='yoym1l_cant_"+ numero +"' />";
    	cell20.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='precio' value='0' name='amin5l_precio_"+ numero +"' id='amin5l_precio_"+ numero +"' />";
    	cell21.innerHTML="<input type='text' onkeypress='return solonumeros(event)' class='cantidad' value='0' name='amin5l_cant_"+ numero +"' id='amin5l_cant_"+ numero +"' />";
    	cell22.innerHTML="<input readonly='readonly' class='totalfila' onfocus=\"sumar_fila('"+ numero +"');\" type='text' value='0' name='totalfila_"+ numero +"' id='totalfila_"+ numero +"' />";
        event.preventDefault();
      })

	//jagl - inicio - calcular total
    $("#calculartotal").click(function(event){
    	var total = 0;
        $('.totalfila').each(function(indice,valor) {
            total = total + parseInt(valor.value);
         });
        //mostrar boton para que puedan enviar el formulario
        $("#boton_envio_proyecciones").css("display","block");
        document.getElementById('totalsumas').value = total;
        event.preventDefault();
      });	
    //jagl - fin - calcular total 

	//identifica en que fila se esta trabajando
	//y si se pincha en una fila distinta
    var ufa = "fila1";
	$('tr').click(function() {
		//escondo el boton enviar formulario para obligarlos a calcular
		$("#boton_envio_proyecciones").css("display","none");
		// ufa
		//es la fila actual
		// fila
		//es la fila a la que se cambio(si es que se cambio)

		var fila = $(this).attr("class");
		if (ufa != fila) {
			//alert("esta es una fila distinta");
			contador_vacios = 0;
			
			//solo deja el numero de fila ej< fila3, nrofila almacena solo 3
			nrofila = ufa.substring(4);
			
			//alert(nrofila);
			sumar_fila(nrofila);
			ufa = fila;
		} else {
			//alert("esta es la misma fila");
		}

	});         
});

</script>
<script type="text/javascript">
function enviarProyecciones(){
	if(confirm("Confirme si acepta enviar las PROYECCIONES"))
	{
		document.fmr_proy.submit();
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

<script type="text/javascript">
function sumar_fila (nrofila){
	//alert("entro a la funcion suma" + " " + nrofila);
	id_indu_cant="indu_cant_" + nrofila;
	id_indu_precio = "indu_precio_" + nrofila;
	id_enzi5l_cant="enzi5l_cant_" + nrofila;
	id_enzi5l_precio = "enzi5l_precio_" + nrofila;
	id_lact5l_cant = "lact5l_cant_" + nrofila;
	id_lact5l_precio = "lact5l_precio_" + nrofila;
	id_mico5k_cant = "mico5k_cant_" + nrofila;
	id_mico5k_precio = "mico5k_precio_" + nrofila;
	id_sani2k_cant = "sani2k_cant_" + nrofila;
	id_sani2k_precio = "sani2k_precio_" + nrofila;
	id_mult5l_cant = "mult5l_cant_" + nrofila;
	id_mult5l_precio = "mult5l_precio_" + nrofila;
	id_masc5l_cant = "masc5l_cant_" + nrofila;
	id_masc5l_precio = "masc5l_precio_" + nrofila;
	id_sani5l_cant = "sani5l_cant_" + nrofila;
	id_sani5l_precio = "sani5l_precio_" + nrofila;
	id_yoym1l_cant = "yoym1l_cant_" + nrofila;
	id_yoym1l_precio = "yoym1l_precio_" + nrofila;
	id_amin5l_cant = "amin5l_cant_" + nrofila;
	id_amin5l_precio = "amin5l_precio_" + nrofila;

	id_totalfila = "totalfila_" + nrofila;

	prodprecio1 = Number(document.getElementById(id_indu_precio).value);
	prodprecio2 = Number(document.getElementById(id_enzi5l_precio).value);
	prodprecio3 = Number(document.getElementById(id_lact5l_precio).value);
	prodprecio4 = Number(document.getElementById(id_mico5k_precio).value);
	prodprecio5 = Number(document.getElementById(id_sani2k_precio).value);
	prodprecio6 = Number(document.getElementById(id_mult5l_precio).value);
	prodprecio7 = Number(document.getElementById(id_masc5l_precio).value);
	prodprecio8 = Number(document.getElementById(id_sani5l_precio).value);
	prodprecio9 = Number(document.getElementById(id_yoym1l_precio).value);
	prodprecio10 = Number(document.getElementById(id_amin5l_precio).value);
	
	prodcant1 = Number(document.getElementById(id_indu_cant).value);
	prodcant2 = Number(document.getElementById(id_enzi5l_cant).value);
	prodcant3 = Number(document.getElementById(id_lact5l_cant).value);
	prodcant4 = Number(document.getElementById(id_mico5k_cant).value);
	prodcant5 = Number(document.getElementById(id_sani2k_cant).value);
	prodcant6 = Number(document.getElementById(id_mult5l_cant).value);
	prodcant7 = Number(document.getElementById(id_masc5l_cant).value);
	prodcant8 = Number(document.getElementById(id_sani5l_cant).value);
	prodcant9 = Number(document.getElementById(id_yoym1l_cant).value);
	prodcant10 = Number(document.getElementById(id_amin5l_cant).value);

	total = (prodcant1*prodprecio1)+(prodcant2*prodprecio2)+(prodcant3*prodprecio3)+(prodcant4*prodprecio4)+(prodcant5*prodprecio5)+(prodcant6*prodprecio6)+(prodcant7*prodprecio7)+(prodcant8*prodprecio8)+(prodcant9*prodprecio9)+(prodcant10*prodprecio10);
	document.getElementById(id_totalfila).value = total;
	}
</script>
<style type="text/css">
body{
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:0.6em;
	color:#FFFFFF;
	background-color:#567300;
	background-image:url(../../img/fondo-proyecciones.jpg);
}
input[type=text]{
	width: 100% !important;
	height: 20px;	
	border:0;
}
_______
</style>
<style type="text/css">
#tbl_prod {
	background-color:#FFFFFF;
	color: #000000;
	width:1546px;
}
#tbl_prod tr th {
	background-color:#333333;
	color: #FFFFFF;
	width:1546px;
}
#tbl_prod tr td input {
	text-align: right;
	width: 68px;
}
#tbl_prod tr td input.cantidad {
}
#tbl_prod tr td input.precio {
}
#tbl_prod tr td input.gris {
	background-color: #D3DCF2;
}
#tbl_prod #subcabecera {
	background-color: #ABABAB;
	text-align: center;
	font-weight: bold;
}
#tbl_prod td input.nombrecli {
	background-color: #CCFF60;
	text-align: left;
}
/*CALCULO DEL TOTAL*/
.totalabsoluto {
	margin-top: 10px;
}
.totalabsoluto .col1 {
	float: left;	
}
.totalabsoluto .col2 {
	float: left;
	margin-right: 10px;
}
.totalabsoluto .col2 #calculartotal {
	background-color: #FFFF00;
	color: #FF0000;
	font-size: 15px;
	font-weight: bold;
	height: 30px;
	padding-bottom: 7px;
}
.totalabsoluto .col3 {
	float: left;	
}
.totalabsoluto .col3 #totalsumas {
	height: 27px;
	padding-right: 5px;
	text-align: right;
}
/*boton de envio de proyecciones*/
html body form table.texto tbody tr td div#boton_envio_proyecciones {
	display: none;
}
</style>
</head>
<body>
<h1>Planilla de proyecciones de ventas para el mes</h1>
<div id="anadirfila">
<p><img id="img_anadir_fila" src="../img/agregar.gif" alt="Agregar Fila" title="Agregar una fila" /> Agregar una fila
</p>
</div>
<form name="fmr_proy" method="post" action="mail-proyecciones.php" >
<table id="tbl_prod" border="1" cellspacing="0" cellpadding="0">
	<colgroup style="background-color: #CCFF60;"></colgroup>
	<tr align="center">
		<th width="200">Nombre Cliente</th>
		<th colspan="2">Indumax_foliar</th>
		<th colspan="2">Enzimark 5 litros</th>
		<th colspan="2">Lactoplus 5 litros</th>
		<th colspan="2">Micotric 5kg</th>
		<th colspan="2">Saniplant 2kg</th>
		<th colspan="2">Multigranador 5 litros</th>
		<th colspan="2">MasCuaja 5 litros</th>
		<th colspan="2">Saniplant 5 litros</th>
		<th colspan="2">Yoymark 1 litros</th>
		<th colspan="2">Aminoplant 5 litros</th>
		<th width="100">Total</th>
	</tr>
	<tr id="subcabecera">
		<td>&nbsp;</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td width="122">Precio</td>
		<td width="122">Cant.</td>
		<td>&nbsp;</td>
	</tr>
	<tr class="fila1">
		<td><input name="nombrecli_1" id="nombrecli_1" class="nombrecli" type="text" value="" /></td>
		<td><input name="indu_precio_1" id="indu_precio_1" class="precio gris" type="text" value="0" /></td>
		<td><input name="indu_cant_1" id="indu_cant_1" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="enzi5l_precio_1" id="enzi5l_precio_1" class="precio" type="text" value="0" /></td>
		<td><input name="enzi5l_cant_1" id="enzi5l_cant_1" class="cantidad" type="text" value="0" /></td>
		<td><input name="lact5l_precio_1" id="lact5l_precio_1" class="precio gris" type="text" value="0" /></td>
		<td><input name="lact5l_cant_1" id="lact5l_cant_1" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mico5k_precio_1" id="mico5k_precio_1" class="precio" type="text" value="0" /></td>
		<td><input name="mico5k_cant_1" id="mico5k_cant_1" class="cantidad" type="text" value="0" /></td>
		<td><input name="sani2k_precio_1" id="sani2k_precio_1" class="precio gris" type="text" value="0" /></td>
		<td><input name="sani2k_cant_1" id="sani2k_cant_1" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mult5l_precio_1" id="mult5l_precio_1" class="precio" type="text" value="0" /></td>
		<td><input name="mult5l_cant_1" id="mult5l_cant_1" class="cantidad" type="text" value="0" /></td>
		<td><input name="masc5l_precio_1" id="masc5l_precio_1" class="precio gris" type="text" value="0" /></td>
		<td><input name="masc5l_cant_1" id="masc5l_cant_1" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="sani5l_precio_1" id="sani5l_precio_1" class="precio" type="text" value="0" /></td>
		<td><input name="sani5l_cant_1" id="sani5l_cant_1" class="cantidad" type="text" value="0" /></td>
		<td><input name="yoym1l_precio_1" id="yoym1l_precio_1" class="precio gris" type="text" value="0" /></td>
		<td><input name="yoym1l_cant_1" id="yoym1l_cant_1" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="amin5l_precio_1" id="amin5l_precio_1" class="precio" type="text" value="0" /></td>
		<td><input name="amin5l_cant_1" id="amin5l_cant_1" class="cantidad" type="text" value="0" /></td>															
		<td><input name="totalfila_1" id="totalfila_1" class="totalfila" type="text" value="0" onfocus="sumar_fila('1');" /></td>
	</tr>
	<tr class="fila2">
		<td><input name="nombrecli_2" id="nombrecli_2" class="nombrecli" type="text" value="" /></td>
		<td><input name="indu_precio_2" id="indu_precio_2" class="precio gris" type="text" value="0" /></td>
		<td><input name="indu_cant_2" id="indu_cant_2" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="enzi5l_precio_2" id="enzi5l_precio_2" class="precio" type="text" value="0" /></td>
		<td><input name="enzi5l_cant_2" id="enzi5l_cant_2" class="cantidad" type="text" value="0" /></td>
		<td><input name="lact5l_precio_2" id="lact5l_precio_2" class="precio gris" type="text" value="0" /></td>
		<td><input name="lact5l_cant_2" id="lact5l_cant_2" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mico5k_precio_2" id="mico5k_precio_2" class="precio" type="text" value="0" /></td>
		<td><input name="mico5k_cant_2" id="mico5k_cant_2" class="cantidad" type="text" value="0" /></td>
		<td><input name="sani2k_precio_2" id="sani2k_precio_2" class="precio gris" type="text" value="0" /></td>
		<td><input name="sani2k_cant_2" id="sani2k_cant_2" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mult5l_precio_2" id="mult5l_precio_2" class="precio" type="text" value="0" /></td>
		<td><input name="mult5l_cant_2" id="mult5l_cant_2" class="cantidad" type="text" value="0" /></td>
		<td><input name="masc5l_precio_2" id="masc5l_precio_2" class="precio gris" type="text" value="0" /></td>
		<td><input name="masc5l_cant_2" id="masc5l_cant_2" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="sani5l_precio_2" id="sani5l_precio_2" class="precio" type="text" value="0" /></td>
		<td><input name="sani5l_cant_2" id="sani5l_cant_2" class="cantidad" type="text" value="0" /></td>
		<td><input name="yoym1l_precio_2" id="yoym1l_precio_2" class="precio gris" type="text" value="0" /></td>
		<td><input name="yoym1l_cant_2" id="yoym1l_cant_2" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="amin5l_precio_2" id="amin5l_precio_2" class="precio" type="text" value="0" /></td>
		<td><input name="amin5l_cant_2" id="amin5l_cant_2" class="cantidad" type="text" value="0" /></td>															
		<td><input name="totalfila_2" id="totalfila_2" class="totalfila" type="text" value="0" onfocus="sumar_fila('2');" /></td>
	</tr>
	<tr class="fila3">
		<td><input name="nombrecli_3" id="nombrecli_3" class="nombrecli" type="text" value="" /></td>
		<td><input name="indu_precio_3" id="indu_precio_3" class="precio gris" type="text" value="0" /></td>
		<td><input name="indu_cant_3" id="indu_cant_3" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="enzi5l_precio_3" id="enzi5l_precio_3" class="precio" type="text" value="0" /></td>
		<td><input name="enzi5l_cant_3" id="enzi5l_cant_3" class="cantidad" type="text" value="0" /></td>
		<td><input name="lact5l_precio_3" id="lact5l_precio_3" class="precio gris" type="text" value="0" /></td>
		<td><input name="lact5l_cant_3" id="lact5l_cant_3" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mico5k_precio_3" id="mico5k_precio_3" class="precio" type="text" value="0" /></td>
		<td><input name="mico5k_cant_3" id="mico5k_cant_3" class="cantidad" type="text" value="0" /></td>
		<td><input name="sani2k_precio_3" id="sani2k_precio_3" class="precio gris" type="text" value="0" /></td>
		<td><input name="sani2k_cant_3" id="sani2k_cant_3" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mult5l_precio_3" id="mult5l_precio_3" class="precio" type="text" value="0" /></td>
		<td><input name="mult5l_cant_3" id="mult5l_cant_3" class="cantidad" type="text" value="0" /></td>
		<td><input name="masc5l_precio_3" id="masc5l_precio_3" class="precio gris" type="text" value="0" /></td>
		<td><input name="masc5l_cant_3" id="masc5l_cant_3" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="sani5l_precio_3" id="sani5l_precio_3" class="precio" type="text" value="0" /></td>
		<td><input name="sani5l_cant_3" id="sani5l_cant_3" class="cantidad" type="text" value="0" /></td>
		<td><input name="yoym1l_precio_3" id="yoym1l_precio_3" class="precio gris" type="text" value="0" /></td>
		<td><input name="yoym1l_cant_3" id="yoym1l_cant_3" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="amin5l_precio_3" id="amin5l_precio_3" class="precio" type="text" value="0" /></td>
		<td><input name="amin5l_cant_3" id="amin5l_cant_3" class="cantidad" type="text" value="0" /></td>															
		<td><input name="totalfila_3" id="totalfila_3" class="totalfila" type="text" value="0" onfocus="sumar_fila('3');" /></td>
	</tr>
	<tr class="fila4">
		<td><input name="nombrecli_4" id="nombrecli_4" class="nombrecli" type="text" value="" /></td>
		<td><input name="indu_precio_4" id="indu_precio_4" class="precio gris" type="text" value="0" /></td>
		<td><input name="indu_cant_4" id="indu_cant_4" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="enzi5l_precio_4" id="enzi5l_precio_4" class="precio" type="text" value="0" /></td>
		<td><input name="enzi5l_cant_4" id="enzi5l_cant_4" class="cantidad" type="text" value="0" /></td>
		<td><input name="lact5l_precio_4" id="lact5l_precio_4" class="precio gris" type="text" value="0" /></td>
		<td><input name="lact5l_cant_4" id="lact5l_cant_4" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mico5k_precio_4" id="mico5k_precio_4" class="precio" type="text" value="0" /></td>
		<td><input name="mico5k_cant_4" id="mico5k_cant_4" class="cantidad" type="text" value="0" /></td>
		<td><input name="sani2k_precio_4" id="sani2k_precio_4" class="precio gris" type="text" value="0" /></td>
		<td><input name="sani2k_cant_4" id="sani2k_cant_4" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mult5l_precio_4" id="mult5l_precio_4" class="precio" type="text" value="0" /></td>
		<td><input name="mult5l_cant_4" id="mult5l_cant_4" class="cantidad" type="text" value="0" /></td>
		<td><input name="masc5l_precio_4" id="masc5l_precio_4" class="precio gris" type="text" value="0" /></td>
		<td><input name="masc5l_cant_4" id="masc5l_cant_4" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="sani5l_precio_4" id="sani5l_precio_4" class="precio" type="text" value="0" /></td>
		<td><input name="sani5l_cant_4" id="sani5l_cant_4" class="cantidad" type="text" value="0" /></td>
		<td><input name="yoym1l_precio_4" id="yoym1l_precio_4" class="precio gris" type="text" value="0" /></td>
		<td><input name="yoym1l_cant_4" id="yoym1l_cant_4" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="amin5l_precio_4" id="amin5l_precio_4" class="precio" type="text" value="0" /></td>
		<td><input name="amin5l_cant_4" id="amin5l_cant_4" class="cantidad" type="text" value="0" /></td>															
		<td><input name="totalfila_4" id="totalfila_4" class="totalfila" type="text" value="0" onfocus="sumar_fila('4');" /></td>
	</tr>
	<tr class="fila5">
		<td><input name="nombrecli_5" id="nombrecli_5" class="nombrecli" type="text" value="" /></td>
		<td><input name="indu_precio_5" id="indu_precio_5" class="precio gris" type="text" value="0" /></td>
		<td><input name="indu_cant_5" id="indu_cant_5" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="enzi5l_precio_5" id="enzi5l_precio_5" class="precio" type="text" value="0" /></td>
		<td><input name="enzi5l_cant_5" id="enzi5l_cant_5" class="cantidad" type="text" value="0" /></td>
		<td><input name="lact5l_precio_5" id="lact5l_precio_5" class="precio gris" type="text" value="0" /></td>
		<td><input name="lact5l_cant_5" id="lact5l_cant_5" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mico5k_precio_5" id="mico5k_precio_5" class="precio" type="text" value="0" /></td>
		<td><input name="mico5k_cant_5" id="mico5k_cant_5" class="cantidad" type="text" value="0" /></td>
		<td><input name="sani2k_precio_5" id="sani2k_precio_5" class="precio gris" type="text" value="0" /></td>
		<td><input name="sani2k_cant_5" id="sani2k_cant_5" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="mult5l_precio_5" id="mult5l_precio_5" class="precio" type="text" value="0" /></td>
		<td><input name="mult5l_cant_5" id="mult5l_cant_5" class="cantidad" type="text" value="0" /></td>
		<td><input name="masc5l_precio_5" id="masc5l_precio_5" class="precio gris" type="text" value="0" /></td>
		<td><input name="masc5l_cant_5" id="masc5l_cant_5" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="sani5l_precio_5" id="sani5l_precio_5" class="precio" type="text" value="0" /></td>
		<td><input name="sani5l_cant_5" id="sani5l_cant_5" class="cantidad" type="text" value="0" /></td>
		<td><input name="yoym1l_precio_5" id="yoym1l_precio_5" class="precio gris" type="text" value="0" /></td>
		<td><input name="yoym1l_cant_5" id="yoym1l_cant_5" class="cantidad gris" type="text" value="0" /></td>
		<td><input name="amin5l_precio_5" id="amin5l_precio_5" class="precio" type="text" value="0" /></td>
		<td><input name="amin5l_cant_5" id="amin5l_cant_5" class="cantidad" type="text" value="0" /></td>															
		<td><input name="totalfila_5" id="totalfila_5" class="totalfila" type="text" value="0" onfocus="sumar_fila('5');" /></td>
	</tr>
</table>
<div class="totalabsoluto">
	<div class="col1"></div>
	<div class="col2">
		<input id="calculartotal" type="button" value="Calcular total" onclick="calcular_total" />
	</div>
	<div class="col3"><input id="totalsumas" name="totalsumas" type="text" value="0" /></div>
</div>
<?php 
//TEMPORAL
$nombre_vendedor = $_SESSION["nombre"];
$apellidos_vendedor = $_SESSION["apellidos"];
$correo_vendedor = $_SESSION["correo"];

?>
	<table align="center" class="texto" border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td>Volver a Zona Vendedores <img style="cursor:pointer" onclick="volverReportes();" src="../../img/volver-flecha.png" width="32" height="32" alt="boton atras" /></td>
			<td align="right" colspan="12" style="font-size:24px; padding:5px;width:170px;">
				<input type="hidden" name="vend" value="<?php echo $nombre_vendedor." ".$apellidos_vendedor; ?>">
				<input type="hidden" name="mailvendedor" value="<?php echo $correo_vendedor; ?>">
				<input type="hidden" name="mailsupervisor" value="j.gatica@yahoo.com">
				<div id="boton_envio_proyecciones">
					<input style="cursor:pointer" name="enviar" title="Enviar proyecciones" value="Enviar proyecciones" onclick="enviarProyecciones();" />
				</div>
			</td>
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
