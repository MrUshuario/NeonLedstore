const btnSave = document.querySelector("#save"); // borrar
$(document).ready(function() {
    //$("#pass").val("");
    // boton guardar
    //btnSave.disabled =true;
    // metodos
    data();
    //reset();
    //verificarKey();
    //igualPassword();
    //updatePassword();
});

function data() {
    $.ajax({
        url: '/configuracion/getData',
        type: 'GET',
        success: function(e){
            //si no esta logeado enviar un mensaje que empieza con <
            if (e[0] == "<") {
            console.log("No logeado");
            document.getElementById('Carrito').style.display = '';
            document.getElementById('Iniciar_S').style.display = '';
            } else {
            var {data} = JSON.parse(e);
                if(data.cli_rol == 1){
                    //$(document).ready(function() {
                    //    $('#Perfil').text('Admin');
                    //    $('#Perfil').append('   <i class="fas fa-user"></i>');
                    //});
                    document.getElementById('Perfil').style.display = '';
                    document.getElementById('Cerrar_S').style.display = '';
                    
                }if(data.cli_rol == 2){
                    var nombre = data.cli_nombre;
                    $(document).ready(function() {
                        $('#Administrar').text(nombre);
                        $('#Administrar').append('   <i class="fas fa-cog"></i>');
                    });
                    document.getElementById('Administrar').style.display = '';
                    document.getElementById('Carrito').style.display = '';
                    document.getElementById('Cerrar_S').style.display = '';
                }
            }

            console.log(data);  
            if(document.getElementById('cli_nombre')){
                /* guia mostrar nombre  */
                console.log("hola existe");
                $("#cli_nombre").val(data.cli_nombre);
                $("#cli_apellidos").val(data.cli_apellidos);
                $("#cli_email").val(data.cli_email);
                $("#cli_telefono").val(data.cli_telefono);
                console.log(data.cli_nombre);
                
                console.log(data.cli_apellido);
            

                } 
            else {
               }
        }   
    });
}