$(document).ready(function () {
  tableAll();
  create();
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

/*
function create(formdata) {
  $.ajax ({
    url: "cliente/create",
    type: "POST",
    data: formdata,
    processData: false,
    contentType: false,
    success: function(e) {
      $('#modalCliente').modal(hide);

    }
  });
} */

