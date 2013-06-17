var totalDeCompra=0;



//calcular totalDeCompra adudado

function totalAdeudado () {

	if (typeof(document.ordencompra.pago_inicial) === "undefined") {

		document.ordencompra.total_adeudado.value = totalDeCompra ;

	} else {

		if (document.ordencompra.pago_inicial.value == "Pago Inicial") {

			document.ordencompra.total_adeudado.value = totalDeCompra;	

		} else {

			document.ordencompra.total_adeudado.value = totalDeCompra;

			document.ordencompra.total_adeudado.value = totalDeCompra-parseInt(document.ordencompra.pago_inicial.value);	

		}

	}

}



function sumartotales () {

	

	if (totalDeCompra != "0") {

		document.ordencompra.totalCompra.value = totalDeCompra;

		totalAdeudado(descuento=0);

	} else {

		document.ordencompra.totalCompra.value ="";

	}

	

}

//jagl multiplicar_ahora

//con esta funcion tratare que solo haya una funcion de multiplicar

//lo primero que se necesitara sera pasarle los 2 parametros

//la cantidad y el valor

function multiplicar_ahora (valor1,valor2,descuento_realizado,cant_total){
	totalDeCompra -= parseInt(document.getElementById(cant_total).value)+descuento_realizado;
	
	//document.getElementById(cant_total).value = valor1*valor2-descuento_realizado;
	document.getElementById(cant_total).value = (!parseInt(valor1*valor2-descuento_realizado)) ? 0 : parseInt(valor1*valor2-descuento_realizado);

	//alert(valor1*valor2-descuento_realizado); sale correcto
	document.ordencompra.total_adeudado.value = totalDeCompra;
	totalDeCompra += parseInt(document.getElementById(cant_total).value);
	sumartotales(descuento_realizado);	
}

//script para multiplicar la cantidad + el precio unitario

function multiplicar(valorproducto){

	var m1;

	var m2 = 39500;

	totalDeCompra -= parseInt(document.ordencompra.tot.value);

	m1 = (! parseInt(document.ordencompra.cant.value))?0:parseInt(document.ordencompra.cant.value);

	document.ordencompra.tot.value = m1*m2;

	document.ordencompra.total_adeudado.value = totalDeCompra;

	totalDeCompra += parseInt(document.ordencompra.tot.value);

	sumartotales();

} 

function multiplicar2(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot2.value);

	m1 = (! parseInt(document.ordencompra.cant2.value))?0:parseInt(document.ordencompra.cant2.value);

	document.ordencompra.tot2.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot2.value);

	sumartotales();

} 

function multiplicar3(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot3.value);

	m1 = (! parseInt(document.ordencompra.cant3.value))?0:parseInt(document.ordencompra.cant3.value);

	document.ordencompra.tot3.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot3.value);

	sumartotales();

} 

function multiplicar4(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot4.value);

	m1 = (! parseInt(document.ordencompra.cant4.value))?0:parseInt(document.ordencompra.cant4.value);

	document.ordencompra.tot4.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot4.value);

	sumartotales();

} 

function multiplicar5(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot5.value);

	m1 = (! parseInt(document.ordencompra.cant5.value))?0:parseInt(document.ordencompra.cant5.value);

	document.ordencompra.tot5.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot5.value);

	sumartotales();

} 

function multiplicar6(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot6.value);

	m1 = (! parseInt(document.ordencompra.cant6.value))?0:parseInt(document.ordencompra.cant6.value);

	document.ordencompra.tot6.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot6.value);

	sumartotales();

} 

function multiplicar7(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot7.value);

	m1 = (! parseInt(document.ordencompra.cant7.value))?0:parseInt(document.ordencompra.cant7.value);

	document.ordencompra.tot7.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot7.value);

	sumartotales();

} 

function multiplicar8(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot8.value);

	m1 = (! parseInt(document.ordencompra.cant8.value))?0:parseInt(document.ordencompra.cant8.value);

	document.ordencompra.tot8.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot8.value);

	sumartotales();

} 

function multiplicar9(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot9.value);

	m1 = (! parseInt(document.ordencompra.cant9.value))?0:parseInt(document.ordencompra.cant9.value);

	document.ordencompra.tot9.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot9.value);

	sumartotales();

} 

function multiplicar10(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot10.value);

	m1 = (! parseInt(document.ordencompra.cant10.value))?0:parseInt(document.ordencompra.cant10.value);

	document.ordencompra.tot10.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot10.value);

	sumartotales();

} 

function multiplicar11(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot11.value);

	m1 = (! parseInt(document.ordencompra.cant11.value))?0:parseInt(document.ordencompra.cant11.value);

	document.ordencompra.tot11.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot11.value);

	sumartotales();

} 

function multiplicar12(valorproducto){

	var m1;

	var m2 = valorproducto;

	totalDeCompra -= parseInt(document.ordencompra.tot12.value);

	m1 = (! parseInt(document.ordencompra.cant12.value))?0:parseInt(document.ordencompra.cant12.value);

	document.ordencompra.tot12.value = m1*m2;

	totalDeCompra += parseInt(document.ordencompra.tot12.value);

	sumartotales();

} 

