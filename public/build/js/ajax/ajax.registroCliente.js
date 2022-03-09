var x = new Boolean(false);
$(document).ready(function () {
    saveCliente();
    sesionactive();
  });
  function sesionactive(){
    $.ajax({
      url: '/configuracion/getData',
      type: 'GET',
      success: function(e){
        
          
          //si no esta logeado enviar un mensaje que empieza con <
          if (e[0] == "<") {
            
            var x = false;
            console.log(x);
            console.log("No logeado"); 
          } 
          else{
            var x = true;
            console.log(x);
          }
      }   
  });
}

  function saveCliente(){
    if( x==false){
    $("#formRegistro").submit(function(e){
      e.preventDefault();
  
      let id = $("#id").val();
      let cli_nombre = $("#nombre").val();
      let cli_apellidos = $("#apellidos").val();
      let cli_email = $("#email").val();
      let cli_clave = $("#clave").val();
      let cli_telefono = $("#telefono").val();
      let cli_estado = $("#estado").val();
      let cli_rol= $("#rol").val();
      
      const data = {
        id: id,
        cli_nombre: cli_nombre,
        cli_apellidos: cli_apellidos,
        cli_email: cli_email,
        cli_clave: cli_clave,
        cli_telefono: cli_telefono,
        cli_estado: cli_estado,
        cli_rol: cli_rol,
      };
      console.log(data);
      if (id=="") {
          if (cli_nombre == "" || cli_apellidos == "" || cli_email == "" || cli_clave == ""  || cli_telefono == "" || cli_estado == "" || cli_rol == ""){
            swal({
              title:"Completar los campos requeridos",
              icon: "error"
            });
          }else{
            register(data);
          }

        }
      });
    }
    else{
    }
}
function register(data) {
  $.ajax ({
    url: "cliente/register",
    data: data,
    type: "POST",
    success: function(e) {
      let json = JSON.parse(e);
      switch (json.STATUS) {
        case 1:
          swal({
            title: json.mensaje,
            icon: "success",
          });
          break;
        case 2:
          swal({
            title: json.mensaje,
            icon: "error",
          });
          break;
      }
    },
  });
}