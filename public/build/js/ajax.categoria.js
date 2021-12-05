const img = document.querySelector("#img");

function createCategoria(formData) {
  $.ajax({
    url: "/categoria/crear",
    data: formData,
    type: "POST",
    processData: false, // tell jQuery not to process the data
    contentType: false,
    success: function (resp) {
      let { res } = JSON.parse(resp);
      if (res) {
        $("#modalCategoria").modal("hide");
        tablaCategoria();
        swal({
          title: "Registro completo",
          icon: "success",
        });
      } else {
        swal({
          title: "Error en el registro",
          icon: "error",
        });
      }
    },
  });
}

function updateCategoria(formData) {
  $.ajax({
    url: "/categoria/actualizar",
    data: formData,
    type: "POST",
    processData: false,
    contentType: false,
    success: function (response) {
      let json = JSON.parse(response);
      const { resp, cat } = json;
      if (resp) {
        $("#modalCategoria").modal("hide");
        tablaCategoria();
      }
    },
  });
}

function saveCategoria() {
  $("#formCategoria").submit((e) => {
    e.preventDefault();
    //Variables del formulario
    let id = $("#id").val();
    let nombre = $("#cat_nombre").val().trim();
    let imagen = $("#cat_imagen")[0].files[0];
    let link = $("#cat_link").val().trim();
    let estado = $("#cat_estado").val().trim();

    const formData = new FormData();
    formData.append("cat_nombre", nombre);
    formData.append("cat_imagen", imagen);
    formData.append("cat_link", link);
    formData.append("cat_estado", estado);

    if (id == "") {
      if (
        imagen == undefined ||
        nombre === "" ||
        link === "" ||
        estado == null
      ) {
        swal({
          title: "Completar los campos requeridos",
          icon: "error",
        });
        const data = {
            id,
            nombre,
            imagen,
            link,
            estado
        }
        console.log(data);
      } else {
        createCategoria(formData);
      }
    } else {
      formData.append("id", id);
      updateCategoria(formData);
    }
  });
}

function updateStatus() {
  $(document).on("click", "#btnEstado", (e) => {
    let id = e.target.dataset.id;
    let value = e.target.value;
    const data = {
      id: id,
      cat_estado: value,
    };
    $.ajax({
      url: "/categoria/estado",
      type: "POST",
      data: data,
      success: (resp) => {
        let json = JSON.parse(resp);
        console.log(json.estado);
        e.target.value = json.estado;
        if (json.estado == "ACTIVO") {
          e.target.classList.remove("btn-danger");
          e.target.classList.add("btn-success");
        } else {
          e.target.classList.remove("btn-success");
          e.target.classList.add("btn-danger");
        }
      },
    });
  });
}

function deleteCategoria(id) {
  $.ajax({
    type: "POST",
    url: "/categoria/eliminar",
    data: { id: id },
    success: function (ef) {
      let json = JSON.parse(ef);
      if (json.res) {
        swal({
          title: "Se elimino correctamente la categoria",
          icon: "success",
        });
        llenarTabla();
      } else {
        swal({
          title: "No se pudo eliminar, al estar alineado con otro datos",
          icon: "error",
        });
      }
    },
  });
}

function tablaCategoria() {
  const table = $("#tablacategoria").DataTable({
    destroy: true,
    ajax: {
      method: "GET",
      url: "/categoria/listar",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row) {
          return `<img width="160px" src="imagenes/${data.cat_imagen}" id="imgrow">`;
        },
      },
      { data: "cat_nombre" },
      { data: "cat_link" },
      {
        data: null,
        render: function (data, type, row) {
          return `<input type="button" id="btnEstado" class="btn ${
            data.cat_estado.toLowerCase() == "activo"
              ? "btn-success"
              : "btn-danger"
          }" data-id="${data.id}" value="${data.cat_estado.toUpperCase()}">`;
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return `<button class="btn btn-warning" id="edit" data-bs-toggle="modal" data-idcategoria=${data.id} data-bs-target="#modalCategoria" >Edit</button>
                    <button class="btn btn-danger" id="delete" data-idcategoria=${data.id}>Delete</button>`;
        },
      },
    ],
  });
}

function obtenerData() {
  $(document).on("click", "#edit", function (e) {
    let id = e.target.dataset.idcategoria;
    const data = {
      id: id,
    };
    $.ajax({
      url: "/categoria/getCategoria",
      data: data,
      type: "POST",
      success: function (e) {
        const { data } = JSON.parse(e);

        $("#id").val(data.id);
        $("#cat_nombre").val(data.cat_nombre);
        $("#cat_link").val(data.cat_link);
        $("#cat_estado").val(data.cat_estado);

        // Poner las imagenes
        img.src = `/imagenes/${data.cat_imagen}`;
        img.width = 150;
        img.height = 150;
      },
    });
  });
}

function clean() {
  $("#id").val("");
  $("#cat_nombre").val("");
  $("#cat_link").val("");
  $("#cat_estado").val("");
  img.src = "";
  img.width = 0;
  img.height = 0;
}

function deleteButton() {
  $(document).on("click", "#delete", function (e) {
    swal({
      title: "Estas seguro de eliminar esta categoria ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((ef) => {
      if (ef) {
        const id = e.target.dataset.idcategoria;
        deleteCategoria(id);
      }
    });
  });
}

function cleanButton() {
  $(document).on("click", "#model-register", function () {
    clean();
  });
}

$(document).ready(function () {
  tablaCategoria();
  cleanButton();
  obtenerData();
  cleanButton();
  updateStatus();
  saveCategoria();
});
