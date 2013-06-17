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

</script>
<?php 
if ($_POST["elegido"]==1) {
?>

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

