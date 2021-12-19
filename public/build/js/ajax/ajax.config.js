const btnSave = document.querySelector("#save");
$(document).ready(function() {
    $("#pass").val("");
    // boton guardar
    btnSave.disabled =true;
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
            const {data} = JSON.parse(e);
            document.querySelector("#rol").textContent = data.role;
            document.querySelector("#user").value = data.user;
        }   
    });
}


function verificarKey(){
    // const data = $("#pass");
    $("#pass").on('change', function(e){
        // console.log(e.target.value);
        let passVerificar = e.target.value;

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
            const respuesta = document.querySelector("#respuesta");
            
            if(res){
                respuesta.classList.remove('d-none');
                respuesta.classList.add('d-block')
            }else {
                respuesta.classList.remove('d-block');
                respuesta.classList.add('d-none')
                swal({
                    title: "Contraseña ingresada, no es la misma que la contraseña guardada",
                    icon: "error" 
                });
            }
        }
    });
}


function igualPassword() {
    $("#passnuevo2").on('change', function(){
        const pass1 = document.querySelector("#passnuevo1");
        const pass2 = document.querySelector("#passnuevo2");

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

        const passnuevo = document.querySelector("#passnuevo2");

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
    // $("#pass").val("");
    $("#passnuevo1").val("");
    $("#passnuevo2").val("");
}