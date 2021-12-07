const img = document.querySelector("#pro_img");

/** DataTables  */

$(document).ready(function() {
  tableAll();
  getCategoria();
  obtenerData();
  cleanForm();
  saveProduct();
  updateStatus();
  deleteProduct();
});

function tableAll(){
  const table = $('#tablaproducto').DataTable({
    "destroy":true,
    "ajax":{
      "method":"GET",
      "url":"/producto/prueba"
    },
    "columns": [
        { "data": "pro_categoria" },
        { "data": "pro_nombre" },
        { "data": "pro_precio" },
        { "data": null,
          render: function(data, type, row){
            return `<button data-idpro="${data.id}" class="btn ${data.pro_estado == 'Activo'? 'btn-success' : 'btn-danger'}" id="btnEstado">${data.pro_estado}</button>`;
          }
        },
        { "data": null,
          render: function(data, type, row){
            return `<button class="btn btn-warning" data-idpro="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalProducto" >Edit</button>
            <button class="btn btn-danger" data-idpro="${data.id}" id="delete">Delete</button>`
          }
        }
    ]
  });

}

function cleanForm(){
  $(document).on("click","#model-register", function(){
    clean();
  })
}

function obtenerData(){
  $(document).on("click", "#edit", function(e){
    clean();
    let idpro = e.target.dataset.idpro;
    console.log(idpro);

    $.ajax({
      type:"POST",
      url:"/producto/getProForm",
      data:{id: idpro},
      success: function (e) {
        const { data } = JSON.parse(e);
        
        $("#id").val(data.id);
        $("#pro_categoria").val(data.pro_categoria);
        $("#pro_nombre").val(data.pro_nombre);
        $("#pro_descripcion").val(data.pro_descripcion);
        $("#pro_precio").val(data.pro_precio);
        $("#pro_estado").val(data.pro_estado);
        const tmn =data.pro_tamano.split("x");
        $("#t-1").val(tmn[0]);
        $("#t-2").val(tmn[1]);
        
        // Mostrar imagen
        img.src= `/imagenes/${data.pro_imagen}`;
        img.classList.add("w-100","imgCP");

        $("#title").text("Actualizar Productos")
        $("#save").text("Actualizar");
      }
    })
    
  });
}

function deleteProduct(){
  $(document).on("click","#delete",function(e){
    let idpro = e.target.dataset.idpro;
    swal({
      title: "¿Estas seguro de eliminar este producto?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(function(e){
      if(e){
         $.ajax({
         url:"/producto/eliminar",
         type: "POST",
         data: {id: idpro},
         success: function(){
           tableAll();
         }
       })
      }
    })
  });
}

function clean(){
    $("#id").val("");
    $("#pro_categoria").val("");
    $("#pro_nombre").val("");
    $("#pro_descripcion").val("");
    $("#pro_precio").val("");
    $("#pro_estado").val("");
    $("#t-1").val("");
    $("#t-2").val("");
    img.src="";

    $("#title").text("Registrar Productos")
    $("#save").text("Guardar");
}

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

function saveProduct(){  
  $("#formProducto").submit(function(e){
    e.preventDefault();
    // Variables
    const id = $("#id").val();
    const categoria = $("#pro_categoria").val();
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

    if(id==""){
      if( imagen == undefined || estado == "" || categoria == "" || nombre=="" || precio == "" || tm1 == "" || tm2 == "" ){
        swal({
          title:"Completar los campos requeridos",
          icon: "error"
        });
      } else {
        // Call method create product
        create(formData);
      }
    }else {
      formData.append("id", id);
      // Call method update producto
      update(formData);
    }
  });
}

function create(formData){
  $.ajax({
    url: "/producto/crear",
    type: "POST",
    data: formData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function (e) {
      $('#modalProducto').modal('hide');
      tableAll();
      swal({
        title:"Registro Exitoso",
        icon:"success"
      });
    }
  });
}

function update(formData){
  $.ajax({
    url: "/producto/editar",
    type: "POST",
    data: formData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function (e) { 
      const json = JSON.parse(e);
      const resp = json.res;
      if(resp){
        $('#modalProducto').modal('hide');
        tableAll();
        swal({
          title:"Editado correctamente",
          icon:"success"
        });
      }
    }
  }); 
}

function updateStatus(){
  $(document).on("click","#btnEstado",function(e){
    const idpro = e.target.dataset.idpro;
    const estadoText = e.target.textContent;

    $.ajax({
      url: "/producto/estado",
      type: "POST",
      data:{id: idpro, pro_estado: estadoText},
      success: function(ef){
        const json = JSON.parse(ef);
        const { pro_estado, resultado } = json;
        console.log(pro_estado, resultado)
        e.target.textContent = pro_estado;
        if(pro_estado == 'Activo'){
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