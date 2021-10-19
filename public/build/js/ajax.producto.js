const contenedorProducto = document.querySelector("#tablaproducto tbody");

document.addEventListener('DOMContentLoaded',()=>{
  llenarTabla();
  getCategoria();
  crearXedit();
})


function getCategoria() {
  const select = document.querySelector("#pro_categoria");
  $.ajax({
    type: "GET",
    url: "/producto/getCategoria",
    success: function (e) {
      let json = JSON.parse(e);
      const lists = json.listCat;
      lists.forEach((list) => {
        const { cat_estado, cat_nombre, id } = list;
        if (cat_estado === "ACTIVO") {
          select.innerHTML += `
            <option value="${id}">${cat_nombre}</option>
          `;
        }
      });
    },
  });
}

function crearXedit() {

  $("#formProducto").submit(function (e) {
    e.preventDefault();

    // Variables
    const id = $("#id").val();
    const categoria = $("#pro_categoria").val().trim();
    const nombre = $("#pro_nombre").val().trim();
    const descripcion = $("#pro_descripcion").val().trim();
    const precio = $("#pro_precio").val().trim();
    const imagen = $("#pro_imagen")[0].files[0];
    const tm1 = document.querySelector("#t-1").value;
    const tm2 = document.querySelector("#t-2").value;
    const tamanio = tm1 + "x" + tm2;
    const estado = $("#pro_estado").val();

    const formData = new FormData();
    formData.append("pro_categoria", categoria);
    formData.append("pro_nombre", nombre);
    formData.append("pro_descripcion", descripcion);
    formData.append("pro_precio", precio);
    formData.append("pro_imagen", imagen);
    formData.append("pro_tamano", tamanio);
    formData.append("pro_estado", estado);

    

    if (id == "") {
      if( estado == "" || categoria == "" || nombre=="" || precio == "" || tm1 == "" || tm2 == "" ){
        swal({
          title:"Completar los campos requeridos",
          icon: "error"
        });
      }else {
        $.ajax({
          url: "/producto/crear",
          type: "POST",
          data: formData,
          processData: false,  // tell jQuery not to process the data
          contentType: false,
          success: function (e) {
            llenarTabla();
            swal({
              title:"Registro Exitoso",
              icon:"error"
            })
          },
        });
      }
    } else {
      formData.append("id", id);
      $.ajax({
        url: "/producto/editar",
        type: "POST",
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,
        success: function () {
          console.log();
        },
      });
    }
  });
}

function llenarTabla(){
  $.ajax({
    type:"GET",
    url:"/producto/getProducto",
    success: function(e){
      let json =JSON.parse(e);
      const lists = json.lists;
      
      lists.forEach((list)=>{
        const row = document.createElement("tr");
        const { id, pro_categoria, pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_tamano, pro_estado } = list;
        row.innerHTML = `
          <td>
            <img src="/imagenes/${pro_imagen}" width="150" height="150">
          </td>
          <td>
            ${pro_categoria}
          </td>
          <td>
            ${pro_precio}
          </td>
          <td>
            <button id="btnEstado" data-idpro="${id}" class="btn ${pro_estado.toLowerCase() == 'activo'? 'btn-success' : 'btn-danger'}" >${pro_estado}</button>
          </td>
          <td>
            <button class="btn btn-warning" id="edit" data-bs-toggle="modal" data-idproducto=${id} data-bs-target="#modalProducto" >Edit</button>
            <button class="btn btn-danger" id="delete">Delete</button>
          </td>
        `;
        contenedorProducto.appendChild(row);
      });
    }
  })
}

