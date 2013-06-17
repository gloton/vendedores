<script type="text/javascript">

	//al tomar el foco el campo, este se borra

	var texto="Pago total";

	$(".borrarPagoTot")

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

	

	/**********************************************************************

	*descuento del 7 porciento por pagar al contado*****ocultar_mensj_desc*

	**********************************************************************/

	/*

	$( "#desc_adicional").click(function (){

		//alert("hola 2156");

		if ($('#bloque_mensaje_desc').attr("class") == "ocultar_mensj_desc") {

			var totaldelacompra = parseInt(document.getElementById('totalCompra').value)*0.93;

			$('#bloque_mensaje_desc').toggleClass('ocultar_mensj_desc');

		} else {

			alert("El descuento esta realizado");

		}

		if (totaldelacompra > 0) {

			document.getElementById('totalCompra').value = Math.floor(totaldelacompra);

			document.getElementById('total_adeudado').value = Math.floor(totaldelacompra);

			document.getElementById('pago_inicial').value = document.getElementById('totalCompra').value;

		}

	});

	*/

	function descuento_adicional(valor) {

		var valor_desc_adic = parseInt(valor);

		var porc_desc_adic;

		if (valor_desc_adic > 0) {

			porc_desc_adic = 1 - parseInt(valor_desc_adic)/100;

			//alert(porc_desc_adic);

			//alert(valor);

			if ($('#bloque_mensaje_desc').attr("class") == "ocultar_mensj_desc") {

				totaldelacompra = parseInt(document.getElementById('totalCompra').value)*porc_desc_adic;

				$('#bloque_mensaje_desc').toggleClass('ocultar_mensj_desc');

			} else {

				alert("El descuento solo se puede hacer una vez.");

			}

			if (totaldelacompra > 0) {

				document.getElementById('totalCompra').value = Math.floor(totaldelacompra);

				document.getElementById('total_adeudado').value = Math.floor(totaldelacompra) - parseInt(document.getElementById('totalCompra').value);

				document.getElementById('pago_inicial').value = document.getElementById('totalCompra').value;

			}		

		} else {

				//no hace nada

		}

	}



</script>

<?php 

if ($_POST["elegido"]==1) {

?>

<p style="font-size: 1em;">

	<span style="display: inline-block; padding-left: 9px; margin-top: 10px;">Descontar</span>

	<select name="desc_adicional" id="desc_adicional" style="width: 50px;" onChange="descuento_adicional(document.getElementById('desc_adicional').value);">

		<option value="0">0%</option>

		<option value="1">1%</option>

		<option value="2">2%</option>

		<option value="3">3%</option>

		<option value="4">4%</option>

		<option value="5">5%</option>

		<option value="6">6%</option>

		<option value="7">7%</option>

	</select>

</p>

<p style="color: red; font-size: 12px;">IMPORTANTE:El descuento solo lo puedes ingresar un unica vez</p>

<?php 	

} elseif ($_POST["elegido"]==2) {

?>

<p style="font-size: 1em;">

	<input type="checkbox" name="cheque_aldia" value="Si" /><span style="display: inline-block;padding-left: 12px;">Cheque al día</span >

</p>

<p style="font-size: 1em;">

	<span style="display: inline-block; padding-left: 26px;">Vencimiento 1er cheque</span>

	<select name="pagoVencimiento" style="width: 50px;" onChange="mostrarFecha(document.ordencompra.pagoVencimiento.value);">

		<option value="0">Dias</option>

		<option value="+15">15</option>

		<option value="+30">30</option>

		<option value="+45">45</option>

		<option value="+60">60</option>

		<option value="+75">75</option>

		<option value="+90">90</option>

		<option value="+105">105</option>

		<option value="+120">120</option>

		<option value="+135">135</option>

		<option value="+150">150</option>

		<option value="+165">165</option>

		<option value="+180">180</option>

	</select>

</p>

<p>	

	<legend style="font-size: 11px; font-weight:bold;padding: 11px 0; padding-bottom: 5px;">Fecha Vencimiento</legend>

	<input size="40" style="margin-left: 2px; width: 82px; font-size: 12px;" name="fecha_vencimiento" readonly="readonly" />

</p>	

<?php 

} elseif ($_POST["elegido"]==3) {

?>

	<span style="display: inline-block; padding-left: 15px;">Vencimiento 1er pago</span>

	<select name="pagoVencimiento" style="width: 50px;" onChange="mostrarFecha(document.ordencompra.pagoVencimiento.value);">

		<option value="0">Dias</option>

		<option value="+15">15</option>

		<option value="+30">30</option>

		<option value="+45">45</option>

		<option value="+60">60</option>

		<option value="+75">75</option>

		<option value="+90">90</option>

		<option value="+105">105</option>

		<option value="+120">120</option>

		<option value="+135">135</option>

		<option value="+150">150</option>

		<option value="+165">165</option>

		<option value="+180">180</option>

	</select>

	<!-- hay que calcular de acuerdo a la fecha inicil de arriba y sumarle los dias elegidos en  pagoVencimiento-->

	<legend style="font-size: 11px; font-weight:bold;padding: 11px 0; padding-bottom: 5px;">Fecha Vencimiento</legend>

	<input class="required" size="40" style="margin-left: 2px; width: 82px; font-size: 12px;;" name="fecha_vencimiento" readonly="readonly" />	

<?php 

}

?>



