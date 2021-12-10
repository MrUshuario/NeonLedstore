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
}

function saveCorreo(){
    $("#formContact").on('submit', function(e){
        e.preventDefault();
        const data = {
            nombre: $("#nombre").val().trim(),
            correo: $("#correo").val().trim(),
            telefono: $("#telefono").val().trim(),
            pregunta: $("#pregunta").val().trim()
        };
        enviarEmail(data);
    });
}