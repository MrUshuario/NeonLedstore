$(document).ready(function () {
  tableAll();
  saveCliente();
  cleanForm();
  obtenerData();
  deleteCliente();
  updateStatus();

});

function tableAll(){
  const table = $('#tablavisitante').DataTable({
    "destroy":true,
    "ajax":{
      "method":"GET",
      "url":"visitante/listar"
    }, 
    columns: [
      {data:"vis_nombre"},
      {data:"vis_apellidos"},
      {data:"vis_email"},
      {data:"vis_telefono"},  
      {data: null,
        render: function(data,type,row){
          return `<button class="btn-inline btn-warning" data-idvisitante="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalVisitante" >Edit</button>
          <button class="btn-inline btn-danger" data-idvisitante="${data.id}" id="delete">Del</button>`;

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
    let cli_telefono = $("#cli_telefono").val();
    let cli_estado = $("#cli_estado").val();
    
    const data = {
      id: id,
      cli_nombre: cli_nombre,
      cli_apellidos: cli_apellidos,
      cli_email: cli_email,
      cli_clave: cli_clave,
      cli_telefono: cli_telefono,
      cli_estado: cli_estado,
    };
    console.log(id);
    if (id=="") {
      if (cli_nombre == "" || cli_apellidos == "" || cli_email == "" || cli_clave == "" || cli_estado == "" || cli_telefono == ""){
        swal({
          title:"Completar los campos requeridos",
          icon: "error"
        });
      } else {
        create(data)
      }

    }else {
     /* poner como arriba un if que mantenga que todo este relleno, y uno que verifique que el correo tenga un @*/
      update(data);
      
    }
  });
}

function create(data) {
  $.ajax ({
    url: "visitante/create",
    data: data,
    type: "POST",
    success: function(e) {
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
  $("#cli_telefono").val("")
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
        $("#cli_telefono").val(data.cli_telefono)
        $("#cli_estado").val(data.cli_estado)
      },
    });
  });
}

function deleteCliente() {
  $(document).on("click", "#delete", function (e) {
    let id = e.target.dataset.idvisitante;
    swal({
      title: "¿Estas seguro de eliminar este visitante?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(function (e) {
      if (e) {
        $.ajax({
          url: "/visitante/delete",
          data: { id: id },
          type: "POST",
          success: (e) => {
            if (e) {
              tableAll();
              swal("eliminado correctamente!", {
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
    
    $.ajax({
      url: "/cliente/estado",
      type: "POST",
      data: data,
      success: function(ec){
        console.log(ec)
        const data = JSON.parse(ec);
        const { cli_estado, resultado } = data;
        e.target.textContent = cli_estado;
        if(cli_estado == "1"){
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