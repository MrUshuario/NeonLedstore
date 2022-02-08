$(document).ready(function(){
    saveCorreo();
});

function enviarEmail(data){
    $.ajax({
        type:"POST",
        url:"/contacto/enviar",
        data:data,
        success: function(e){
            console.log(e);
        }
    });


    $('#formContact').submit(function(e){
        Swal.fire({
            icon: 'success',
            title: 'Consulta Enviada',
            text: '¡Revise su Correo!',
            showConfirmButton: false,
            timer: 2500,
        
})

})

formContact.reset();
}

function saveCorreo(){
    $("#formContact").submit(function(e){
        e.preventDefault();
        const data = {
            nombre: $("#nombre").val().trim(),
            apellidos: $("#apellidos").val().trim(),
            correo: $("#correo").val().trim(),
            telefono: $("#telefono").val().trim(),
            consulta: $("#consulta").val().trim()
        };
        
        enviarEmail(data);
    });
}