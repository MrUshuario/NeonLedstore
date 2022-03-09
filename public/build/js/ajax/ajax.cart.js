$(document).ready(function () {
  tableAll();
  saveCliente();
  cleanForm();
  obtenerData();
  deleteCliente();
  updateStatus();
  verificarcontra();
});

function tableAll(){
  const table = $('#tablacliente').DataTable({
    "destroy":true,
    "ajax":{
      "method":"GET",
      "url":"cliente/listar"
    }, 
    columns: [
      {data:"cli_nombre"},
      {data:"cli_apellidos"},
      {data:"cli_email"},
      //{data:"cli_clave"}, // si quiero ver calve descomentar cliente.php linea 19
      {data:"cli_telefono"},  
      { data: null,
          render: function(data, type, row){
            return `<button data-idcliente="${data.id}" class="btn ${data.cli_estado == "1"? 'btn-success' : 'btn-danger'}" id="btnEstado">${data.cli_estado}</button>`;
          }
      },
      {data:"cli_rol"},  
      {data: null,
        render: function(data,type,row){ //agrege un div botones[id]
          return `
          <div class=" ${data.cli_rol == "1"? 'd-none' : ''}" id="botones${data.id}">
          <button class="btn-inline btn-warning"
          data-idcliente="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalCliente" >Edit</button>
          <button class="btn-inline btn-danger" 
          data-idcliente="${data.id}" id="delete">Del</button>
          </div>`;
        }
      },
      {data: null,
        render: function(data,type,row){
          return `
          <input class="${data.cli_rol == "2"? 'd-none' : ''} form-control" style="width: 100px;"
          data-idcliente="${data.id}" input-lg w-20 p-3 " placeholder="pass" type="password"  id ="pass${data.id}">`;
        }
      },
      {data: null,
        render: function(data,type,row){
          return `
          <button class="btn-inline btn-info ${data.cli_rol == "2"? 'd-none' : ''}" data-idcliente="${data.id}" id="verificar">ver</button>
          `;
        }
      }
    ]
  }); 
  
}