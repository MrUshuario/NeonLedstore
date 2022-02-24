
$(document).ready(function () {
  tableAll();
  getCategoria();
  getProducto();
  obtenerProducto();
  cleanForm();
  saveProduct();
  updateStatus();
  deleteProduct();
});

function tableAll() {

}

function cleanForm() {

}



function deleteProduct() {
 
}

function clean() {
 
}

function getCategoria() {
  /*
  const select = document.querySelector("#filtro_categoria");
  $.ajax({
    type: "GET",
    url: "/producto/getCategoria",
    success: function (e) {
      let json = JSON.parse(e);
      const lists = json.listCat; // creo que borro esta linea
      lists.forEach((list) => {
        const { cat_activo, cat_nombre, id } = list;
        console.log(list);
        if (cat_activo == 1) {
          console.log("impreso");
          select.innerHTML +=  // IMPRIME EL BOTON //EXTENDER Y SACAR FONDO NEGRO
          `<ul class="categoriaList w-100 bg-black p-0 text-center">
          <button class="btn-inline btn-dark" data-idcategoria="${id}" id="categoria" > ${cat_nombre}</button>
            </ul>`
          ;
        }
      });
    },
  });
  */
}


function getProducto() {
  const select = document.querySelector("#productoimprimir");
  $.ajax({
    type: "GET",
    url: "/producto/conseguirproducto",
    success: function (e) {
      let json = JSON.parse(e);
      const lists = json.listPro;
      console.log(lists)
      lists.forEach((list) => {
        const { id, cat_id, pro_nombre, pro_imagen, pro_activo} = list;
        if (pro_activo == 1) {
          select.innerHTML +=  // IMPRIME EL BOTON //EXTENDER Y SACAR FONDO NEGRO // ID EN IMAGEN //texto borrar
          `
          <button class="bg-black border-0" " id="promodal" data-bs-toggle="modal" data-bs-target="#modalProducto">
          <div class="card2">
          <p>${pro_nombre}</p>
          <img data-idpro="${id}" src="/build/img/landingPage/lp-hogar/dormitoriokid.webp">                                        
          </div>
          </button>
          ` 
          ;
        }
      });
    },
  });
}

function obtenerProducto() {
  $(document).on("click", "#promodal", function (e) {
    clean(); //crear un clean que vacie el modal
    let id = e.target.dataset.idpro;
    const data = {
      id: id,
    };
    $.ajax({
      type: "POST",
      url: "/producto/getProForm",
      data: data ,
      success: function (e) {
        const { data } = JSON.parse(e);
        console.log(data);
        // $("#id").val(data.id);
        // $("#pro_categoria").val(data.cat_id);
        // console.log(data.cat_id);
        // $("#pro_nombre").val(data.pro_nombre);
        // $("#pro_descripcion").val(data.pro_descripcion);
        // $("#pro_precio").val(data.pro_precio);
        // $("#pro_activo").val(data.pro_activo);
        // const tmn = data.pro_tamano.split("X");
        // $("#t-1").val(tmn[0]);
        // $("#t-2").val(tmn[1]);

        // // Mostrar imagen
        // img.src = `/imagenes/${data.pro_imagen}`;
        // img.classList.add("w-100", "imgCP");

        // $("#title").text("Actualizar Productos");
        // $("#save").text("Actualizar");
      },
    });
  });
}
function saveProduct() {
  
  
}

function create(formData) {
 
}

function update(formData) {
 
}

function updateStatus() {
  
}

// valor del volumen
/*
var slider = document.getElementById('Rango');
var output = document.getElementById('value');

output.innerHTML = slider.value;

slider.oninput = function() {
    output.innerHTML = this.value;
} */