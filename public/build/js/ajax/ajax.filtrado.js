
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
        const { id, cat_id, pro_nombre, pro_imagen, pro_activo, pro_precio, pro_tamano} = list;
        if (pro_activo == 1) {
          select.innerHTML +=  // IMPRIME EL BOTON //EXTENDER Y SACAR FONDO NEGRO // ID EN IMAGEN //texto borrar
          `
          <button class="bg-black border-0" " id="promodal" data-bs-toggle="modal" data-bs-target="#modalProducto${list.id}">
          <div class="card2">
          <p>${pro_nombre}</p>
          <img data-idpro="${id}" src="/build/img/landingPage/lp-hogar/dormitoriokid.webp">                                        
          </div>
          </button>
          <div class="modal fade" id="modalProducto${list.id}" tabindex="-1" aria-labelledby="modalAsesoria" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-25" id="padreModalLanding">
                <main class="main rounded-25 row pb-5 d-flex justify-content-center">
                <!--Modificar para que quede como lo piden -->
                    <div class="mainConte col-8 my-5 pb-3">
                        <h1 class="my-3 fs-2 neones p-50">${pro_nombre}</h1>
                          <div class="row d-flex justify-content-center">
                            <img data-idpro="${id}" src="/build/img/landingPage/lp-hogar/dormitoriokid.webp">   
                          </div>
                        <div class="row d-flex justify-content-center">

                        <form class="formContact landingPageForm col-12 col-sm-10" method="POST">
                            <input type="hidden" id="consulta" value="formNegocio">
                            <!--<div class="modal-field">  NO SE SI ES NECESARIO UN HIDDEN AQUI
                                <input type="hidden" class="neontextlanding bg-transparent text-center form-control my-3 border-0" name="contador" id="contador" value=1>
                            </div>-->
                            <div class="modal-field">
                                <label type="text" class="font-weight-bold text-white bg-transparent text-center form-control my-3 border-0" name="precio" id="precio">PRECIO:  S/.${pro_precio}</label>
                            </div>
                            <div class="modal-field">
                                <label type="text" class="font-weight-bold text-white bg-transparent text-center form-control my-3 border-0" name="tamano" id="tamano">MEDIDAS: ${pro_tamano}</label>
                            </div>
                            
                            <select name="color" class="font-weight-bold text-black bg-grey text-center form-control  border-0">
                                <option value="1">ROJO</option>
                                <option value="2">AZUL</option>
                                <option value="3">MULTICOLOR</option>
                            </select>
                         <!--crea tu propio boton, lo agregas en NEON.css -->
                            <button type="submit" class="neonbottonlanding btn btn-primary my-sm-3 border-0"  id="btn-modal-asesoria Negocio" onclick="Negocio();">Añadir al carrito</button>
                        </form>
                    </div>     
                    </div>

                </main>
                </div>
            </div>
    </div>
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