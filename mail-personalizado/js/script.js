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
                  $(".container").append(responseText+"<br />");
     };    
});

