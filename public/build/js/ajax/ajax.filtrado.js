
$(document).ready(function () {
  tableAll();
  getCategoria();
  getProducto();
  obtenerData();
  cleanForm();
  saveProduct();
  updateStatus();
  deleteProduct();
});

function tableAll() {

}

function cleanForm() {

}

function obtenerData() {
 
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
      console.log(e)
      let json = JSON.parse(e);
      const lists = json.listPro;
      console.log(lists)
      lists.forEach((list) => {
        const { id, cat_id, pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_tamano, pro_activo} = list;
        if (pro_activo == 1) {
          console.log("Imprimir producto");
          select.innerHTML +=  // IMPRIME EL BOTON //EXTENDER Y SACAR FONDO NEGRO
          `
          <div class="card2">
          <p>${pro_nombre}</p>
          <img src="/build/img/landingPage/lp-hogar/dormitoriokid.webp">                                        
          </div>` 
          ;
        }
      });
    },
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