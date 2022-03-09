const btnSave = document.querySelector("#save");
$(document).ready(function() {
    $("#pass").val("");
    // boton guardar
    if(btnSave!=null){
        btnSave.disabled =true;
    }
    // metodos
    data();
    reset();
    verificarKey();
    igualPassword();
    updatePassword();
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
                        nombre = nombre.toUpperCase();
                        $('#Nombre').text(nombre);
                        $('#Nombre').append('   <i class="fas fa-cog"></i>');
                    });
                    document.getElementById('Administrar').style.display = '';
                    document.getElementById('Carrito').style.display = '';
                    document.getElementById('Cerrar_S').style.display = '';
                }
            }

            if(document.getElementById('cli_nombre')){
                /* guia mostrar nombre  */
                console.log("hola existe");
                $("#cli_nombre").val(data.cli_nombre);
                $("#cli_apellidos").val(data.cli_apellidos);
                $("#cli_email").val(data.cli_email);
                $("#cli_telefono").val(data.cli_telefono);
                console.log(data.cli_nombre);
                

                } 

        }   
        
    });
}


function verificarKey(){
    // const data = $("#pass");
    $("#pass").on('change', function(e){
        let passVerificar = e.target.value;
        console.log("verificado");
        const data = {
            passwordV: passVerificar,
            id: "default"
        }
        console.log(data);
        verificarPass(data);
    });
}

function verificarPass(data){
    $.ajax({
        url:"/configuracion/verificar",
        type:"POST",
        data:data,

        success: function(e){
            console.log(e);
            const { res } = JSON.parse(e);
            const respcontra = document.querySelector("#respcontra");
            
            if(res){
                respcontra.classList.remove('d-none');
                respcontra.classList.add('d-block')
            }else {
                respcontra.classList.remove('d-block');
                respcontra.classList.add('d-none')
                Swal.fire({
                    icon: 'error',
                    title: 'Contraseña ingresada no es la misma a la contraseña guardada',
                    text: '¡Intente Denuevo!',
                    showConfirmButton: false,
                    timer: 2700,
                    // footer: 'Intente Denuevo'
            })
            }
        }
    });
}


function igualPassword() {
    $("#passnew2").on('change', function(){
        const pass1 = document.querySelector("#passnew1");
        const pass2 = document.querySelector("#passnew2");

        // crear un nuevo elemento
        const contenedorPassword = document.querySelector("#mensaje");
        const span = document.createElement('div');

        // limpiar el html dentro del div mensaje
        while(contenedorPassword.firstChild){
            contenedorPassword.removeChild(contenedorPassword.firstChild);
        }

        if(pass1.value == pass2.value){
            
            pass1.classList.remove('border-danger');
            pass2.classList.remove('border-danger');

            pass1.classList.add('border-success');
            pass2.classList.add('border-success');

            // mensaje
            span.textContent =`Contraseña coincide con la nueva contraseña `;
            span.classList.remove("text-danger");
            span.classList.add("text-success");
            btnSave.disabled= false;
            contenedorPassword.appendChild(span);

        }else {
            pass1.classList.remove('border-success');
            pass2.classList.remove('border-success');

            pass1.classList.add('border-danger');
            pass2.classList.add('border-danger');

            //mensaje
            span.textContent =`Contraseña no coincide con la nueva contraseña `;
            span.classList.remove("text-success");
            span.classList.add("text-danger");
            btnSave.disabled= true;
            contenedorPassword.appendChild(span);
        }
    });
}

function reset(){
    $("#btncerrar").on('click', function(){
        limpiarCaja();
    });
}

function updatePassword(){
    $("#formcontra").submit(function(e){
        e.preventDefault();
console.log("texto");
        const passnew = document.querySelector("#passnew2");
        var data = {
            cli_clave: passnew.value
        };
        
        updatePass(data);
    });
}

function updatePass(data){
    $.ajax({
        url: "/configuracion/updatePassword",
        type: "POST",
        data: data,
        success: function(e){
            console.log(e);
            let { res } = JSON.parse(e);

            if(res){

                Swal.fire({
                    icon: 'success',
                    title: 'Contraseña Cambiada!',
                    // text: '¡Error al enviar!',
                    showConfirmButton: false,
                    timer: 2500,
                    // footer: 'Intente Denuevo'
            })
                limpiarCaja();
                $("#formcontra").modal("hide");
            }
        }
    })
}

function limpiarCaja(){
    $("#pass").val("");
    $("#passnew1").val("");
    $("#passnew2").val("");
}
