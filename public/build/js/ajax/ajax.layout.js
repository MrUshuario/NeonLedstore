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
            const {data} = JSON.parse(e);
            console.log(e);
            if(data.cli_rol == 1){
                $(document).ready(function() {
                    $('#Perfil').text('Admin');
                    $('#Perfil').append('   <i class="fas fa-user"></i>');
                });
                document.getElementById('Iniciar_S').style.display = 'none';
            }if(data.cli_rol == 2){
                document.getElementById('Iniciar_S').style.display = 'none';
                document.getElementById('Administrar').style.display = 'none';
            }else{
                
            }
        }   
    });
}