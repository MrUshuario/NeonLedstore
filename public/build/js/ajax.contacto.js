$(document).ready(function(){
    saveCorreo();
});

function prueba1(id){
    $.ajax({
        type:"POST",
        url:"/contacto/enviar",
        data: {id},
        success: function(e){
            console.log(e);
        }
    });
}

function saveCorreo(){
    $("#formContact").on('submit', function(e){
        e.preventDefault();
        
        prueba1(1);
    });
}