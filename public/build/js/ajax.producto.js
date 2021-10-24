const contenedorProducto = document.querySelector("#tablaproducto tbody");

$(document).ready(function(){
  llenarTabla();
  getCategoria();
  crearXedit();
  getCatForm();
});

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
    }
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
              icon:"success"
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
        success: function (e) { 
          const json = JSON.parse(e);
          const resp = json.res;
          console.log(resp);
          console.log(imagen);
          if(resp){
            llenarTabla();
            swal({
              title:"Editado correctamente",
              icon:"success"
            })
          }
        }
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
      limpiarHTML();
      lists.forEach((list)=>{
        const row = document.createElement("tr");
        const { id, pro_categoria, pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_tamano, pro_estado } = list;
        row.innerHTML = `
          <td>
            <img src="/imagenes/${pro_imagen}" width="150" height="150">
          </td>
          <td>
           ${pro_nombre} - ${pro_categoria}
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

function getCatForm(){
  $(document).on("click","#edit", function(e){
    const idpro = e.target.dataset.idproducto;
    const title = document.querySelector("#title");
    const btnSave = document.querySelector("#save");
    title.textContent ="Editar Producto";
    btnSave.textContent = "Actualizar";

    console.log(idpro);
    $.ajax({
      url:"/producto/getProForm",
      type:"POST",
      data:{id: idpro},
      success: function(e){
        let json = JSON.parse(e);
        const { id, pro_categoria, pro_nombre, pro_descripcion,pro_precio, pro_imagen,pro_tamano, pro_estado } = json.producto;

        // Variables
        const tmn = pro_tamano.split("x");
        
        $("#id").val(id);
        $("#pro_categoria").val(pro_categoria);
        $("#pro_nombre").val(pro_nombre);
        $("#pro_descripcion").val(pro_descripcion);
        $("#pro_precio").val(pro_precio);
        $("#t-1").val(tmn[0]);
        $("#t-2").val(tmn[1]);
        $("#pro_estado").val(pro_estado);

        // Poner las imagenes
        const img = document.querySelector('#imgc');
        img.src=`/imagenes/${pro_imagen}`;
        img.alt= pro_nombre;
        img.width= 150;
        img.height= 150;
        inputImg.appendChild(img);
      }
    });
  });
}

function limpiarHTML(){
  while(contenedorProducto.firstChild){
    contenedorProducto.removeChild(contenedorProducto.firstChild);
  }
}