<?php
//print_r($_POST);
//*****************************************************************
//ahora env�o el mail de notificaci�n a mi cuenta
$remitente="".$_POST['vend']." <".$_POST['mailvendedor'].">";
$asunto="Inventario de ".$_POST['vend']." ";
$cuerpo="<h1>".$_POST['vend']."</h1>
<table style='width:503px;' border='1' cellspacing='0' cellpadding='2'>

          <tr bgcolor='#CCCCCC'>
            <th style='width:200px;'>Productos</td>
            <th>Cantidad en unidades</td>
          </tr>

          <tr bgcolor='#F0F0F0'>
            <td width='100'>Indumax_foliar :</td>
            <td align='center'>".$_POST["indumaz_foliar"]."</td>
          </tr>

          <tr>
            <td>Enzimark 5 litros :</td>
            <td align='center'>".$_POST["enzimark_5l"]."</td>
          </tr>

          <tr bgcolor='#F0F0F0'>
            <td>Lactoplus 5 litros : </td>
            <td align='center'>".$_POST["lactoplus_5l"]."</td>
          </tr>
          <tr>
            <td>Micotric 5kg :</td>
            <td align='center'>".$_POST["micotric_5kg"]."</td>
          </tr>
          <tr  bgcolor='#F0F0F0'>
            <td>Saniplant 2kg :</td>
            <td align='center'>".$_POST["saniplant_2kg"]."</td>
          </tr>
          <tr>
            <td>Multigranador 5 litros :</td>
            <td align='center'>".$_POST["multigranador_5l"]."</td>
          </tr>
          <tr  bgcolor='#F0F0F0'>
            <td>MasCuaja 5 litros :</td>
            <td align='center'>".$_POST["mascuaja_5l"]."</td>
          </tr>

          <tr>
            <td>Saniplant 5 litros :</td>
            <td align='center'>".$_POST["saniplant_5l"]."</td>
          </tr>
          <tr>
            <td>Yoymark 1 litros :</td>
            <td align='center'>".$_POST["yoymark_1l"]."</td>
          </tr>
          <tr>
            <td>Aminoplant 5 litros : </td>
            <td align='center'>".$_POST["aminoplant_5l"]."</td>
          </tr>            		            		
          <tr bgcolor='#F0F0F0'>
            <td>Usuario</td>
            <td align='center'>".$_POST["vend"]."</td>
          </tr>        
		  </table>
";
$sheader="From:".$remitente."\nReply-To:".$remitente."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html"; 
//descomentar $destinatarios="".$_POST["mailvendedor"].", jtarrason@litar.cl";
$destinatarios="".$_POST["mailvendedor"].", jorge@w7.cl";
//mail("j.gatica@yahoo.com, prueba@w7.cl",$asunto,$cuerpo,$sheader);
mail($destinatarios,$asunto,$cuerpo,$sheader);
echo "<script type='text/javascript'>
	alert('Inventario enviado');
	history.back(1)
</script>";

?>

