$(document).ready(function () {
  tableColor();
  cleanForm();
  saveColor();
  obtenerData();
  deleteColor();
});

function tableColor() {
  const table = $("#tablacolor").DataTable({
    destroy: true,
    ajax: {
      method: "GET",
      url: "/productoxcolor/listar",
    },
    columns: [
      { data: "id" },
      { data: "id_producto" },
      { data: "color" },
      {
        data: null,
        render: function (data, type, row) {
          return `<button class="btn btn-warning" data-idcolor="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalColor">Edit</button>
          <button class="btn btn-danger" data-idcolor="${data.id}" id="delete">Delete</button>`;
        },
      },
    ],
  });
}

function obtenerData() {
  $(document).on("click", "#edit", function (e) {
    clean();

    let id = e.target.dataset.idcolor;

    $.ajax({
      type: "POST",
      url: "/productoxcolor/getColor",
      data: { id: id },
      success: function (e) {
        const { data } = JSON.parse(e);
        $("#id").val(data.id);
        $("#id_producto").val(data.id_producto);
        $("#id_color").val(data.id_color);

        $("#title").text("Actualizar Color");
        $("#save").text("Actualizar");
      },
    });
  });
}

function clean() {
  $("#id").val("");
  $("#id_producto").val("");
  $("#id_color").val("");

  $("#title").text("Guardar Color");
  $("#save").text("Guardar");
}

function cleanForm() {
  $(document).on("click", "#model-register", function () {
    clean();
  });
}

function saveColor() {
  $("#formColor").submit(function (e) {
    e.preventDefault();

    let id_color = $("#id_color").val();
    let id_producto = $("#id_producto").val();
    let id = $("#id").val();

    const data = {
      id: id,
      id_producto: id_producto,
      id_color: id_color,
    };
    if (id == "") {
      const data = {
        id_producto: id_producto,
        id_color: id_color,
      };
      createColor(data);
    } else {
      updateColor(data);
    }
  });
}

function createColor(data) {
  $.ajax({
    url: "/productoxcolor/guardar",
    data: data,
    type: "POST",
    success: function (response) {
      let json = JSON.parse(response);
      switch (json.STATUS) {
        case 1:
          tableColor();
          $("#modalColor").modal("hide");
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

function updateColor(data) {
  $.ajax({
    url: "/productoxcolor/editar",
    data: data,
    type: "POST",
    success: function (response) {
      let json = JSON.parse(response);
      console.log(json);
      if (json) {
        tableColor();
        $("#modalColor").modal("hide");
        swal({
          title: "Se edito correctamente",
          icon: "success",
        });
      } else {
        swal({
          title: "Error al editar",
          icon: "error",
        });
      }
    },
  });
}

function deleteColor() {
  $(document).on("click", "#delete", function (e) {
    let id = e.target.dataset.id;
    console.log(id);
    swal({
      title: "¿Estas seguro de eliminar esta seleccion?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(function (e) {
      if (e) {
        $.ajax({
          url: "/productocolor/eliminar",
          data: { id: id },
          type: "POST",
          success: (e) => {
            if (e) {
              tableColor();
              swal("Color eliminado correctamente!", {
                icon: "success",
              });
            }
          },
        });
      }
    });
  });
}