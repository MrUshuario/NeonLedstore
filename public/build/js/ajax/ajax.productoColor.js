$(document).ready(function () {
  listar();
  getColor();
  getProducto();
  saveProductoColor();
  obtenerData();
  cleanForm();
  deletePC();
});

function listar() {
  const table = $("#tablaproductocolor").DataTable({
    destroy: true,
    ajax: {
      method: "GET",
      url: "/productoColor/listar",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row) {
          const split = data.id_producto.split(",");
          return `${split[0]} - Precio: S/.${split[2]}`;
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          const split = data.id_color.split(",");
          return `
                    <div style="display:flex; justify-content:center; align-itema:center">
                        ${split[0]} <div style="margin-left:10px;border-radius: 50%;background-color:${split[1]}; width:20px; height:20px;" ></div>
                    </div>`;
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return `<button class="btn btn-warning" data-id="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalProducto" >Edit</button>
                <button class="btn btn-danger" data-id="${data.id}" id="delete">Delete</button>`;
        },
      },
    ],
  });
}

function saveProductoColor() {
  $("#formProductoColor").submit(function (e) {
    e.preventDefault();
    const id = $("#id").val();
    const id_producto = $("#id_producto").val();
    const id_color = $("#id_color").val();

    const data = {
      id,
      id_producto,
      id_color,
    };

    if (id == "") {
      createPC(data);
    } else {
      updatePC(data);
    }
  });
}

function createPC(data) {
  $.ajax({
    method: "POST",
    url: "/productoColor/create",
    data: data,
    success: function (e) {
      const { res } = JSON.parse(e);
      if (e) {
        $("#modalProducto").modal("hide");
        swal({
          title: "Registro Exitoso",
          icon: "success",
        });
        listar();
      }
    },
  });
}

function updatePC(data) {
  $.ajax({
    method: "POST",
    url: "/productoColor/update",
    data: data,
    success: function (e) {
      if (e) {
        $("#modalProducto").modal("hide");
        swal({
          title: "Editar Exitoso",
          icon: "success",
        });
        listar();
      }
    },
  });
}

function deletePC(id) {
    $(document).on("click","#delete",function(e){
        let id = e.target.dataset.id;
        swal({
            title: "¿Estas seguro de eliminar este producto?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then(function(e){
              if(e){
                $.ajax({
                    method: "POST",
                    url: "/productoColor/delete",
                    data: {id},
                    success: function (e) {
                        const { res } = JSON.parse(e);
                      if (res) {
                        
                        swal({
                          title: "Se elimino exitosamente",
                          icon: "success",
                        });
                        listar();
                      }
                    },
                });
              }
          })
    })
}

function obtenerData() {
  $(document).on("click", "#edit", function (e) {
    const id = e.target.dataset.id;
    $.ajax({
      method: "POST",
      url: "/productoColor/obtener",
      data: { id },
      success: function (e) {
        const { res } = JSON.parse(e);
        $("#id").val(res.id);
        $("#id_producto").val(res.id_producto);
        $("#id_color").val(res.id_color);
      },
    });
  });
}

function clean() {
  $("#id").val("");
  $("#id_producto").val("");
  $("#id_color").val("");
}

function getProducto() {
  const idproducto = document.querySelector("#id_producto");
  $.ajax({
    method: "GET",
    url: "/productoColor/getProducto",
    success: function (el) {
      const { data } = JSON.parse(el);
      const idproducto = document.querySelector("#id_producto");
      data.forEach((e) => {
        if (e.pro_estado == "Activo") {
          idproducto.innerHTML += `<option value="${e.id}">${e.pro_nombre} - S/.${e.pro_precio}</option>`;
        }
      });
    },
  });
}

function getColor() {
  $.ajax({
    method: "GET",
    url: "/productoColor/getColor",
    success: function (el) {
      const { data } = JSON.parse(el);
      const idcolor = document.querySelector("#id_color");
      data.forEach((e) => {
        idcolor.innerHTML += `
                <option value="${e.id}">
                    ${e.nombre} - ${e.rgb}
                </option>`;
      });
    },
  });
}

function cleanForm() {
  $(document).on("click", "#model-register", function () {
    clean();
  });
}
