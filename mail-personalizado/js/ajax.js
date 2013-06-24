function ejecutarajax () {
     var conexion;
     if (window.XMLHttpRequest) {
          //para los navegadores modernos
          conexion = new XMLHttpRequest();
     } else {
          //para las versiones antiguas de internet explorer
          conexion = ActiveXObject("Microsoft.XMLHTTP");
     }
     conexion.open("GET","completar-guardar.php",true);
     conexion.send();
     conexion.onreadystatechange=function(){
          if (conexion.readyState==4 && conexion.status==200) {
               document.getElementById("mensaje_respuesta").innerHTML=conexion.responseText;
          }
     }
}