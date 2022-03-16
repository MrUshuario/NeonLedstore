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
                
            // formContact.reset();

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

        }
    });

}

    function enviarEmail2(data){
            setTimeout(() => {
                $.ajax({
                    type:"POST",
                    url:"/contacto/enviar",
                    data:data,
                    success: function(e){
                        let json = JSON.parse(e);
                        console.log("Segundo correo enviado");
                    }
                });
                
            }, 10000); // Actualizar a 3 horas
        }


        function enviarEmail3(data){
            setTimeout(() => {
                $.ajax({
                    type:"POST",
                    url:"/contacto/enviar",
                    data:data,
                    success: function(e){
                        let json = JSON.parse(e);
                        console.log("Tercer correo enviado");
            
                    }
                });
                
            }, 15000); // Actualizar a 15 horas
            
        }

function saveCorreo(){
    $(".formContact").submit(function(e){
        e.preventDefault();
        const data = {
            contador: $("#contador").val().trim(),           
            nombre: $("#nombre").val().trim(),
            apellidos: $("#apellidos").val().trim(),
            correo: $("#correo").val().trim(),
            telefono: $("#telefono").val().trim(),
            pregunta: $("#pregunta").val().trim(),
            consulta: $("#consulta").val().trim()
        };

        const data2 = { //guarda datos de visitante con correo repetido
            //id = null,
            vis_nombre: $("#nombre").val().trim(),
            vis_apellidos: $("#apellidos").val().trim(),
            vis_email: $("#correo").val().trim(),
            vis_telefono: $("#telefono").val().trim(),
            vis_pregunta: $("#pregunta").val().trim(),
        };
        
        createContactoVis(data2) // esto primero que los correos
        enviarEmail(data);
        data.contador=2;
        console.log(data.contador)
        enviarEmail2(data);
        data.contador=3;
        console.log(data.contador)
        enviarEmail3(data);
    });
}


//RENZO


function createContactoVis(data) {
    $.ajax ({
      url: "visitante/create2",
      data: data,
      type: "POST",
      success: function(e) {
        let json = JSON.parse(e);
        console.log("Visitante creado")
        //CREAR FUNCION PARA QUE ENVIE EMAIL A LA EMPRESA
        //ventas@neon-ledstore.com
        //info.neonledstore@gmail.com
        enviarEmpresa(data);
      },
    });
  }

  // correo para enviar mensaje a la empresa
function enviarEmpresa(data){
    console.log(data);
    $.ajax ({
      url: "/contacto/enviarEmp",
      data: data,
      type: "POST",
      success: function(e) {
          console.log(e);
        let json = JSON.parse(e);
        console.log("Correo enviado a la empresa")
        
      },
    });
  }