$(document).ready(function () {
  tableAll();
  saveCliente();
  cleanForm();
  obtenerData();
  deleteCliente();
  updateStatus();

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
      {data:"cli_clave"}, 
      { data: null,
          render: function(data, type, row){
            return `<button data-idcliente="${data.id}" class="btn ${data.cli_estado == 1? 'btn-success' : 'btn-danger'}" id="btnEstado">${data.cli_estado}</button>`;
          }
      },
      
      {data: null,
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
    let token = null; /*FALTA EL TOKEN                ADVERTENCIA */
    let cli_estado = $("#cli_estado").val();
    
    const data = {
      id: id,
      cli_nombre: cli_nombre,
      cli_apellidos: cli_apellidos,
      cli_email: cli_email,
      cli_clave: cli_clave,
      token: token,
      cli_estado: cli_estado,
    };
    console.log(id);
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
    /*  $('#modalCliente').modal('hide');
      tableAll();
      swal({
        title: "Registro exitoso",
        icon: "success"
      }); */
      let json = JSON.parse(e);
      switch (json.STATUS) {
        case 1:
          tableAll();
          $("#modalCliente").modal("hide");
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
        case 3:
          swal({
            title: json.mensaje,
            icon: "error",
          });
          break;
      }
    },
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

function clean() {
  $("#id").val("");
  $("#cli_nombre").val("");
  $("#cli_apellidos").val("");
  $("#cli_email").val("")
  $("#cli_clave").val("")
  $("#cli_estado").val("")
}

function cleanForm() {
  $(document).on("click", "#model-cliente", function () {
    clean();
  });
}

function obtenerData() {
  $(document).on("click", "#edit", function (e) {
    clean();

    let id = e.target.dataset.idcliente;
    const data = {
      id: id,
    };
    $.ajax({
      type: "POST",
      url: "/cliente/getCliente",
      data: data,
      success: function (e) {
        console.log(e); 
        const { data } = JSON.parse(e); 
        $("#id").val(data.id);
        $("#cli_nombre").val(data.cli_nombre);
        $("#cli_apellidos").val(data.cli_apellidos);
        $("#cli_email").val(data.cli_email)
        $("#cli_clave").val(data.cli_clave)
        $("#cli_token").val(data.token)
        $("#cli_estado").val(data.cli_estado)
      },
    });
  });
}

function deleteCliente() {
  $(document).on("click", "#delete", function (e) {
    let id = e.target.dataset.idcliente;
    swal({
      title: "¿Estas seguro de eliminar este cliente?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(function (e) {
      if (e) {
        $.ajax({
          url: "/cliente/delete",
          data: { id: id },
          type: "POST",
          success: (e) => {
            if (e) {
              tableAll();
              swal("Cliente eliminado correctamente!", {
                icon: "success",
              });
            }
          },
        });
      }
    });
  });
}

function updateStatus(){
  $(document).on("click","#btnEstado",function(e){
    const id = e.target.dataset.idcliente;
    const estadoText = e.target.textContent;
    const data = { id: id, cli_estado: estadoText};
    console.log(data);
    $.ajax({
      type: "POST",
      url: "/cliente/estado",
      data: data,
      success: function(e){
        console.log(e)
        const json = JSON.parse(e);
        
        const { cli_estado, resultado } = json;
        console.log(cli_estado, resultado)
        e.target.textContent = cli_estado;
        if(cli_estado == 1){
          e.target.classList.remove("btn-danger");
          e.target.classList.add("btn-success");
        }else {
          e.target.classList.remove("btn-success");
          e.target.classList.add("btn-danger");
        }
      }
    });
  })
}