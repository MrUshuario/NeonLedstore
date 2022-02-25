

function registro() {
    var nombre=document.getElementById("nombre").value;
    var apellidos=document.getElementById("apellidos").value;
    var correo=document.getElementById("correo").value;
    var contra=document.getElementById("password").value;
    console.log(nombre + " " + apellidos + " " + correo + " " + contra );
    if (nombre=="" || apellidos=="" || correo=="" || contra=="") {
        // swal('Error','Datos por completar','error');
        // console.log("error a mostrar");
    } else {
        swal('Listo!','Te haz registrado correctamente','success');
        console.log("entrando a mostrar");
    }
    return;
}