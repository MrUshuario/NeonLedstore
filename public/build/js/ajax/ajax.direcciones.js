$(document).ready(function () {
  tableAll();

});

function tableAll(){
  const table = $('#tabladirecciones').DataTable({
    "destroy":true,
    "ajax":{
      "method":"GET",
      "url":"/direcciones/listar"
    }, 
    columns: [
      // {data:"id"},
      {data:"url_tiktok"},
      {data:"url_instagram"},
      {data:"url_pinterest"},
      {data:"url_facebook"},
      {data:"url_whatsap"},  
      {data:"url_correoempresa"}, 
      {data:"url_correoemisor"},  
      {data: null,
        render: function(data,type,row){
          return `<button class="btn-inline btn-warning" data-iddireccion="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalDirecciones">Edit</button>`;

        }
      }
    ]
  }); 

}

function saveVisitante(){
  $("#formVisitante").submit(function(e){
    e.preventDefault();

    let id = $("#id").val();
    let vis_nombre = $("#vis_nombre").val();
    let vis_apellidos = $("#vis_apellidos").val();
    let vis_email = $("#vis_email").val();
    let vis_telefono = $("#vis_telefono").val();
    let vis_pregunta = $("#vis_pregunta").val();
    
   
    const data = {
      id: id,
      vis_nombre: vis_nombre,
      vis_apellidos: vis_apellidos,
      vis_email: vis_email,
      vis_telefono: vis_telefono,
      vis_pregunta: vis_pregunta, // puede ir vacio
    };
    console.log(id);
    if (id=="") {
      if (vis_nombre == "" || vis_apellidos == "" || vis_email == "" || vis_telefono == ""){
        swal({
          title:"Completar los campos requeridos",
          icon: "error"
        });
      } else {
        create(data)
      } 
        //function validarEmailReg(evento){
        //exprEMAIL= new RegExp (/^[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}$/);
        //email=document.getElementById("vis_email").value;

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
          $("#modalVisitante").modal("hide");
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
    url: "visitante/update",
    type: "POST",
    data: data,
    success: function(e) {
      $('#modalVisitante').modal('hide');
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
  $("#vis_nombre").val("");
  $("#vis_apellidos").val("");
  $("#vis_email").val("")
  $("#vis_telefono").val("")
  $("#vis_pregunta").val("");

}

function cleanForm() {
  $(document).on("click", "#model-Visitante", function () {
    clean();
  });
}

function obtenerData() {
  $(document).on("click", "#edit", function (e) {
    clean();

    let id = e.target.dataset.idvisitante;
    const data = {
      id: id,
    };
    $.ajax({
      type: "POST",
      url: "/visitante/getVisitante",
      data: data,
      success: function (e) {
        console.log(e); 
        const { data } = JSON.parse(e); 
        $("#id").val(data.id);
        $("#vis_nombre").val(data.vis_nombre);
        $("#vis_apellidos").val(data.vis_apellidos);
        $("#vis_email").val(data.vis_email);
        $("#vis_telefono").val(data.vis_telefono);
        $("#vis_pregunta").val(data.vis_pregunta)
      },
    });
  });
}

function deleteVisitante() {
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
              swal("Eliminado correctamente!", {
                icon: "success",
              });
            }
          },
        });
      }
    });
  });
}


