$(document).ready(function () {
  tableAll();
  saveCliente();

});

function tableAll(){
  const table = $('#tablacliente').DataTable({
    "destroy":true,
    "ajax":{
      "method":"GET",
      "url":"cliente/listar"
    }, 
    "columns": [
      {"data":"cli_nombre"},
      {"data":"cli_apellidos"},
      {"data":"cli_email"},
      {"data":"cli_clave"}, 
      { "data": null,
          render: function(data, type, row){
            return `<button data-idcliente="${data.id}" class="btn ${data.cli_estado == 0? 'btn-success' : 'btn-danger'}" id="btnEstado">${data.cli_estado}</button>`;
          }
      },
      
      {"data": null,
        render: function(data,type,row){
          return `<button class="btn btn-warning" data-idcliente="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalCliente" >Edit</button>
          <button class="btn btn-danger" data-idcliente="${data.id}" id="delete">Delete</button>`;

        }
      }
    ]
  }); 

}

function saveCliente(){
  $("#formCliente").submit(function(e){
    e.preventDefault();

    let id = $("#id").val();
    let cli_nombre = $("#cli_nombre").val();
    let cli_apellidos = $("#cli_apellidos").val();
    let cli_email = $("#cli_email").val();
    let cli_clave = $("#cli_clave").val();
    let cli_estado = $("#cli_estado").val();
    /*FALTA EL TOKEN */
    const data = {
      id: id,
      cli_nombre: cli_nombre,
      cli_apellidos: cli_apellidos,
      cli_email: cli_email,
      cli_clave: cli_clave,
      cli_estado: cli_estado,
    };

    
    if (id=="") {
      if (cli_nombre == "" || cli_apellidos == "" || cli_email == "" || cli_clave == "" || cli_estado == ""){
        swal({
          title:"Completar los campos requeridos",
          icon: "error"
        });
      } else {
        create(data)
      }

    }else {
      //data.append("id", id);
      update(data);
      
    }
  });
}

function create(data) {
  $.ajax ({
    url: "cliente/create",
    data: data,
    type: "POST",
    success: function(e) {
      $('#modalCliente').modal('hide');
      tableAll();
      swal({
        title: "Registro exitoso",
        icon: "success"
      });
    }
  });
}

function update(data) {
  $.ajax ({
    url: "cliente/update",
    type: "POST",
    data: data,
    success: function(e) {
      $('#modalCliente').modal('hide');
      tableAll();
      swal({
        title: "Editado correctamente",
        icon: "success"
      });
    }

  });
}

