const btnSave = document.querySelector("#save");
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
            document.getElementById('Administrar').style.display = 'none';
            document.getElementById('Perfil').style.display = 'none';
            document.getElementById('Cerrar_S').style.display = 'none';
            } else {
            const {data} = JSON.parse(e);
            console.log(data);
                if(data.cli_rol == 1){
                    //$(document).ready(function() {
                    //    $('#Perfil').text('Admin');
                    //    $('#Perfil').append('   <i class="fas fa-user"></i>');
                    //});
                    document.getElementById('Iniciar_S').style.display = 'none';
                    document.getElementById('Carrito').style.display = 'none';
                    document.getElementById('Administrar').style.display = 'none';
                }if(data.cli_rol == 2){
                    var nombre = data.cli_nombre;
                    document.getElementById('Iniciar_S').style.display = 'none';
                    document.getElementById('Perfil').style.display = 'none';
                    $(document).ready(function() {
                        $('#Administrar').text(nombre);
                        $('#Administrar').append('   <i class="fas fa-cog"></i>');
                    });
                }
            }
        }   
    });
}