
$(document).ready(function () {
  tableAll();
  getCategoria();
  getProducto();
  obtenerProducto();
  updateStatus();
  deleteProduct();
  enviarProducto();
});

function tableAll() {

}

function deleteProduct() {
 
}

function clean() {
  $("#id").val("");
  $("#pro_precio").val("");
  $("#pro_tamano").val("");
  $("#pro_nombre").val("");
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
          <div class="card2">         
            <p>${pro_nombre}</p>
            
            <button class="bg-black border-0" " id="promodal" data-bs-toggle="modal" data-bs-target="#modalProductos"> 
              <img data-idpro="${id}" src="/build/img/landingPage/lp-hogar/dormitoriokid.webp"> 
            </button>                                       
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
        $("#id").val(data.id);
        document.getElementById("pro_precio").innerHTML = "Precio: S/."+data.pro_precio;
        document.getElementById("pro_tamano").innerHTML = data.pro_tamano;
        document.getElementById("pro_nombre").innerHTML = data.pro_nombre;
      },
    });
  });
}

// public static function dashboard(Router $router){
//   $id = $_SESSION['id'];
//   $router->render("dashboard/index",["id"=>$id]);
// }
//notas enviar un get
// de donde recibe? de AJAX LOGIN va a verificar
// $_SESSION['id'] = $user->id;
// $boolean = true;
function enviarProducto() {
  $.ajax({
    url: url,
    data: data,
    type: 'POST',
    success: function(response){
    let json = JSON.parse(response);
    console.log(json.mensaje)
    const status = json.STATUS;
        if(status == 1){
            swal({
                title: json.mensaje,
                icon: "success"
              }).then(()=>{
                window.location.href ="/dashboard"; 
              });                      
        }else{
            swal({
                title: json.mensaje,
                icon: "error",
            });
        }
    }
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