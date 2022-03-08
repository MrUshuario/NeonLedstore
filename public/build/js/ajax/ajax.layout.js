const btnSave = document.querySelector("#save");
$(document).ready(function() {
    $("#contra").val("");
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

//contraseña cambiar-verifcar


// $(".formcontra").hide(); 

// function mostrarform(){
//     let text = "";
    
//     if($("#btncontra").text() == "Cambiar Contraseña"){
//         $(".formcontra").show();
//         text = "Guardar contraseña";
     
//     } 
//     else{
//         $(".formcontra").hide();
//         text = "Cambiar Contraseña";
//     }

//     $("#btncontra").html(text);

// }

function verificarKey(){
    // const data = $("#pass");
    $("#contra").on('change', function(e){
        // console.log(e.target.value);
        let passVerificar = e.target.value;
        console.log("verificado");
        const data = {
            passwordV: passVerificar
        }

        verificarPassword(data);
    });
}

function verificarPassword(data){
    $.ajax({
        url:"/configuracion/verificar",
        type:"POST",
        data:data,
        success: function(e){
            const { res } = JSON.parse(e);
            const respcontra = document.querySelector("#respcontra");
            
            if(rol){
                respcontra.classList.remove('d-none');
                respcontra.classList.add('d-block')
            }else {
                respcontra.classList.remove('d-block');
                respcontra.classList.add('d-none')
                swal({
                    title: "Contraseña ingresada, no es la misma que la contraseña guardada",
                    icon: "error" 
                });
            }
        }
    });
}


function igualPassword() {
    $("#contranuevo2").on('change', function(){
        const pass1 = document.querySelector("#contranuevo1");
        const pass2 = document.querySelector("#contranuevo2");

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
    $("#btnModal").on('click', function(){
        limpiarCaja();
    });
}

function updatePassword(){
    $("#formpassword").submit(function(e){
        e.preventDefault();

        const passnuevo = document.querySelector("#contranuevo2");

        const data = {
            pass: passnuevo.value
        };
        
        updatePass(data);
    });
}

function updatePass(data){
    $.ajax({
        url:"/configuracion/updatePassword",
        type:"POST",
        data:data,
        success: function(e){
            const {res} = JSON.parse(e);

            if(res){
                swal({
                    text: 'Contraseña correctamente cambiado',
                    icon: 'success'
                });
                limpiarCaja();
                $("#modalPassword").modal("hide");
            }
        }
    })
}

function limpiarCaja(){
    // $("#contra").val("");
    $("#contranuevo1").val("");
    $("#contranuevo2").val("");
}
