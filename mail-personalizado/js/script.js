$(document).ready(function(){
	$('input[type=checkbox]').tzCheckbox({labels:['Habilidado','Deshabilitado']});
    $('.close').click(function() {
        //instrucciones
        $('.container').css("display","none");
	});
    $('#btn_guardar').click(function() {
    	//instrucciones
    	$('.container').css("display","block");
    });
});