$(document).ready(function() {
	$('input[type=checkbox]').tzCheckbox({labels:['Habilidado','Deshabilitado']});
    /*AJAX*/
	$('#btn_guardar').click(function() {
		//instrucciones
		$('.container').css("display","block");
	});
    // definimos las opciones del plugin AJAX FORM
    var opciones= {
                       beforeSubmit: mostrarLoader, //funcion que se ejecuta antes de enviar el form
                       success: mostrarRespuesta, //funcion que se ejecuta una vez enviado el formulario
					   
    };
     //asignamos el plugin ajaxForm al formulario myForm y le pasamos las opciones
    $('#fmr_ingreso_datos').ajaxForm(opciones) ; 
    
     //lugar donde defino las funciones que utilizo dentro de "opciones"
     function mostrarLoader(){
              $("#loader_gif").fadeIn("slow");
     };
     function mostrarRespuesta (responseText){
		          //alert("Mensaje enviado: "+responseText);
                  $("#loader_gif").fadeOut("slow");
                  $("#wrap_alertas").css("display","block");
                  $("#wrap_alertas").append(responseText+"<br />");
     };
     /*
      * BREADCROUMBS CON LOS PASOS
      * */
		$( '#bc_detalle').trigger('click' );

		//cuando se hace click en el paso 1
		$('#bc_detalle').click(function() {
			//instrucciones
			$('.paso').css("display","none");
			$('#detalle').css("display","block"); 
			//alert("detalle");
		});
		//cuando se hace click en el paso 2
		$('#bc_ficha').click(function() {
			//instrucciones
			$('.paso').css("display","none");
			$('#ficha').css("display","block"); 
			//alert("detalle");
		});
		//cuando se hace click en el paso 3
		$('#bc_aplicacion').click(function() {
			//instrucciones
			$('.paso').css("display","none");
			$('#aplicacion').css("display","block"); 
			//alert("detalle");
		});
});

