
function cambioHistorial() {
    document.getElementById("cambioFontHistorial").className = "row espacio-admin"; // se muestra
    document.getElementById("cambioDatosUsuarios").className = "fondo-null espacio-admin";
    document.getElementById("cambioFontContra").className = "fondo-null espacio-admin";
    document.getElementById("verificacionCorreo").className = "fondo-null espacio-admin";   
   
}
function cambioDatosPersonales() {
    document.getElementById("cambioFontHistorial").className = "fondo-null espacio-admin";
    document.getElementById("cambioDatosUsuarios").className = "row espacio-admin"; // se muestra
    document.getElementById("cambioFontContra").className = "fondo-null espacio-admin";
    document.getElementById("verificacionCorreo").className = "fondo-null espacio-admin";   
} 
function cambioContrasena() {
    document.getElementById("cambioFontHistorial").className = "fondo-null espacio-admin";
    document.getElementById("verificacionCorreo").className = "fondo-null espacio-admin";   
    document.getElementById("cambioDatosUsuarios").className = "fondo-null espacio-admin";
    document.getElementById("cambioFontContra").className = "row espacio-admin"; // se muestra  
}
function verificacionCorreo(){
    document.getElementById("cambioFontHistorial").className = "fondo-null espacio-admin";
    document.getElementById("cambioDatosUsuarios").className = "fondo-null espacio-admin";  
    document.getElementById("verificacionCorreo").className = "row espacio-admin"; // se muestra
    document.getElementById("cambioFontContra").className = "fondo-null espacio-admin";
}

function bloquear(duracionBloqueo, boton){  //bloquear el boton para evitar recibir muchos correos

    boton.disabled = true;
    
    // habilitarlo después la duración de bloqueo especificada
    setTimeout(() => boton.disabled = false, duracionBloqueo);
  
}

function correoverificacion(){
    $.ajax({
      url: '/configuracion/correoverificacion',
      type: 'GET',
      success: function(e){
        console.log(e);
        let json = JSON.parse(e);
        if(json.prueba == true){
            swal({
                title: 'Revise su correo',
                icon: "success",
              });
        
        }else{
            swal({
                title: "Su correo ya fue verificado",
                icon: "error",
              });
        }
      }
    });
}

