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
    $("#formContact").submit(function(e){
        e.preventDefault();
        const data = {
            nombre: $("#nombre").val().trim(),
            correo: $("#correo").val().trim(),
            telefono: $("#telefono").val().trim(),
            consulta: $("#consulta").val().trim()
        };
        enviarEmail(data);
    });
}