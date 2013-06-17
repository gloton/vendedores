<?php
include_once("../lib/class.php");
//print_r($_POST);
//*****************************************************
//*****Recorre el array post jgl
 for( $i = 1; $i < count($_POST)/22; $i ++)//count($_POST) cuanta todos los campos
    {
		if ($i%2==0){
		$abrefila="<tr>";			
		}else{
		$abrefila="<tr bgcolor='#F0F0F0'>";
		}
		$cierrafila="</tr>";
		
		$columna_1='nombrecli_'.$i;
		$columna_2='indu_cant_'.$i;
		$columna_3='indu_precio_'.$i;
		$columna_4='enzi5l_cant_'.$i;
		$columna_5='enzi5l_precio_'.$i;
		$columna_6='lact5l_cant_'.$i;
		$columna_7='lact5l_precio_'.$i;
		$columna_8='mico5k_cant_'.$i;
		$columna_9='mico5k_precio_'.$i;
		$columna_10='sani2k_cant_'.$i;
		$columna_11='sani2k_precio_'.$i;
		$columna_12='mult5l_cant_'.$i;
		$columna_13='mult5l_precio_'.$i;
		$columna_14='masc5l_cant_'.$i;
		$columna_15='masc5l_precio_'.$i;
		$columna_16='sani5l_cant_'.$i;
		$columna_17='sani5l_precio_'.$i;
		$columna_18='yoym1l_cant_'.$i;
		$columna_19='yoym1l_precio_'.$i;
		$columna_20='amin5l_cant_'.$i;
		$columna_21='amin5l_precio_'.$i;
		$columna_22='totalfila_'.$i;
		
//*****************************************************
//*****Va creando cada fila con los datos ingresados jgl		
		$filacompleta=$abrefila."<td width='250'>"
		.$_POST[$columna_1]."</td><td>".$_POST[$columna_2]."</td><td>".$_POST[$columna_3]."</td><td>".$_POST[$columna_4]
		."</td><td>".$_POST[$columna_5]."</td><td>".$_POST[$columna_6]."</td><td>".$_POST[$columna_7]."</td><td>".$_POST[$columna_8]
		."</td><td>".$_POST[$columna_9]."</td><td>".$_POST[$columna_10]."</td><td>".$_POST[$columna_11]."</td><td>".$_POST[$columna_12]
		."</td><td>".$_POST[$columna_13]."</td><td>".$_POST[$columna_14]."</td><td>".$_POST[$columna_15]."</td><td>".$_POST[$columna_16]
		."</td><td>".$_POST[$columna_17]."</td><td>".$_POST[$columna_18]."</td><td>".$_POST[$columna_19]."</td><td>".$_POST[$columna_20]
		."</td><td>".$_POST[$columna_21]."</td><td>".$_POST[$columna_22]."</td>"
		.$cierrafila;
//*****************************************************
//*****cada fila se va a�adiendo a $cadena jgl		
		$cadena.=$filacompleta;
    }

//$remitente="j.gatica@yahoo.com";
//$asunto="codigo html 9";
$remitente="".$_POST['vend']." <".$_POST['mailvendedor'].">";
$asunto="Proyecciones de ".$_POST['vend']." ";
$th="<tr bgcolor='#CCCCCC'>
		<th width='250'>&nbsp;</th>
		<th colspan='2'>Indumax_foliar</th>
		<th colspan='2'>Enzimark 5 litros</th>
		<th colspan='2'>Lactoplus 5 litros</th>
		<th colspan='2'>Micotric 5kg</th>
		<th colspan='2'>Saniplant 2kg</th>
		<th colspan='2'>Multigranador 5 litros</th>
		<th colspan='2'>MasCuaja 5 litros</th>
		<th colspan='2'>Saniplant 5 litros</th>
		<th colspan='2'>Yoymark 1 litros</th>
		<th colspan='2'>Aminoplant 5 litros</th>
		<th width='100'>Total</th>
  </tr>
	<tr id='subcabecera'>
		<td width='250'>&nbsp;</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td width='122'>Precio</td>
		<td width='122'>Cant.</td>
		<td>&nbsp;</td>
	</tr>		
		";
$cuerpo="
		<html>
			<head>
			</head>
			<body>
			<h1>Proyecciones de ".$_POST['vend']."</h1>
			<a href='http://jorge.w7.cl/litar/lib/verificacionEnvProyecc.php?verificador=R7008fdtG*k_g&id=".$_SESSION["id_usuario"]."'>
			http://jorge.w7.cl/litar/lib/verificacionEnvProyecc.php?id=".$_SESSION["id_usuario"]."
			</a>					
			<h2>Total proyecciones : $".$_POST["totalsumas"]."</h2>
			<table border='1'>".$th.$cadena."</table></body></html>";
$sheader="From:".$remitente."\nReply-To:".$remitente."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html"; 
$destinatarios="".$_POST["mailvendedor"].", ".$_POST["mailsupervisor"]."";
mail($destinatarios,$asunto,$cuerpo,$sheader);
include_once '../lib/class.php';
$sql_fecha_limite = "UPDATE `usuarios` SET `fecha_limite_proy` = '0' WHERE `usuarios`.`id_usuario` =".$_POST["id"].";";
$sql_fecha_limite = "SELECT fecha_limite FROM `fechas_limites` WHERE id_fechas_limites =2";
$res_fecha_limite=mysql_query($sql_fecha_limite,Conectar::con());

echo "<script type='text/javascript'>
	alert('Reporte PROYECCIONES enviado');
	history.back(1)
</script>";
?>