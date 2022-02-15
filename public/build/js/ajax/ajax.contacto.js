$(document).ready(function(){
    saveCorreo();
});

function enviarEmail(data){
    $.ajax({
        type:"POST",
        url:"/contacto/enviar",
        data:data,
        success: function(e){
            let json = JSON.parse(e);
                
            /*formContact.reset();   */

            if (json.prueba == true){
                Swal.fire({
                    icon: 'success',
                    title: 'Envío Exitoso',
                    width: 350,
                    /*text: '¡Revise su correo!', */
                    showConfirmButton: false,
                    timer: 2500,
                    footer: '¡Revise su correo!'          
                })
            } else {
                Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: '¡Error al enviar!',
                        showConfirmButton: false,
                        timer: 2500,
                        footer: 'Intente Denuevo'
                })
            
            }
            console.log(e);
            console.log(data.nombre);

        }
    });

    //formContact1.reset();    esta linea existe para limpiar el form de contacto.php, comentada
    //porque trae problemas con los form de los landingPage.
    //Posible solucion: leer #consulta y usar switch

}

function saveCorreo(){
    $(".formContact").submit(function(e){
        e.preventDefault();
        const data = {
            nombre: $("#nombre").val().trim(),
            apellidos: $("#apellidos").val().trim(),
            correo: $("#correo").val().trim(),
            telefono: $("#telefono").val().trim(),
            consulta: $("#consulta").val().trim()
        };

        const data2 = {
            //id = null,
            vis_nombre: $("#nombre").val().trim(),
            vis_apellidos: $("#apellidos").val().trim(),
            vis_email: $("#correo").val().trim(),
            vis_telefono: $("#telefono").val().trim(),
        };
        
        enviarEmail(data);
        console.log(data)

        createContactoVis(data2)
    });
}


//--------------


function createContactoVis(data) {
    $.ajax ({
      url: "visitante/create",
      data: data,
      type: "POST",
      success: function(e) {
        let json = JSON.parse(e);

        console.log("Cliente creado")
        console.log(json)
  
      },
    });

  }




