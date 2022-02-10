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

            if (e){
                Swal.fire({
                    icon: 'success',
                    title: 'Envío Exitoso',
                    width: 350,
                    /*text: '¡Revise su correo!', */
                    showConfirmButton: false,
                    timer: 2500,
                    footer: '¡Revise su correo!'          
                })

                console.log(data.nombre);

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
        
        enviarEmail(data);
        console.log(data)
    });
}