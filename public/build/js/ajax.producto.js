const contenedorProducto = document.querySelector("#tablaproducto tbody");
const imgc = document.querySelector("#imgc");

$(document).ready(function(){
  llenarTablaPaginacion();
  getCategoria();
  crearXedit();
  getProdForm();
  estado();
  resetear();
  eliminarProducto();
  buscarNombre();
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
      if( imagen == undefined || estado == "" || categoria == "" || nombre=="" || precio == "" || tm1 == "" || tm2 == "" ){
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
            cierreModel("modalProducto");
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
          if(resp){
            cierreModel("modalProducto");
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
  const url = new URL(window.location.href);
  const get = parseInt(url.searchParams.get('pag'));
  $.ajax({
    type:"GET",
    url: `/producto/pagination?pag=${get}`,
    success: function(e){
      let json =JSON.parse(e);
      const {res, pags} = json;

      limpiarHTML();
      res.forEach((list)=>{
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
            <button class="btn btn-danger" data-idproducto=${id}  id="delete">Delete</button>
          </td>
        `;
        contenedorProducto.appendChild(row);
      });

      if(url.searchParams.get('pag') == null){
        window.location = `/producto?pag=1`;
      }else if( get > pags || get <= 0) {
        window.location = `/producto?pag=1`;
      }
            
      get <= 1 ? inicio.classList.add('disabled'): inicio.classList.remove('disabled');
      get >= pags ? end.classList.add('disabled'): end.classList.remove('disabled');

    }
  })
}

function llenarTablaPaginacion(){
  const url = new URL(window.location.href);
  const get = parseInt(url.searchParams.get('pag'));

  $.ajax({
    url:`/producto/pagination?pag=${get}`,
    type:'GET',
    success: function(e){
      let json =JSON.parse(e);
      const {res, pags} = json;

      const pag = document.querySelector(".pagination");
      
      const end =document.querySelector("#end");      
      const inicio =document.querySelector("#inicio");

      const url = new URL(window.location.href);
      const get = parseInt(url.searchParams.get('pag'));
      for(i=0; i<pags; i++){
        const li = document.createElement("li");
        li.classList.add('page-item')
        const a = document.createElement("a");
        a.classList.add("page-link");
        a.href=`/producto?pag=${i+1}`;
        a.id="pag";
        a.innerHTML =`
          ${i+1}
        `;
        li.appendChild(a);
        pag.insertBefore(li,end);
        get == i+1 ? li.classList.add('active') : li.classList.remove('active');
      }

      llenarTabla();
    }
  })
}

function getProdForm(){
  $(document).on("click","#edit", function(e){
    const idpro = e.target.dataset.idproducto;
    const title = document.querySelector("#title");
    const btnSave = document.querySelector("#save");
    title.textContent ="Editar Producto";
    btnSave.textContent = "Actualizar";
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
        const img = document.createElement('img');
        img.src=`/imagenes/${pro_imagen}`;
        img.alt= pro_nombre;
        img.width= 150;
        img.height= 150;
        imgc.appendChild(img);
      }
    });
  });
}

function limpiarHTML(){
  while(contenedorProducto.firstChild){
    contenedorProducto.removeChild(contenedorProducto.firstChild);
  }
}

function estado(){
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

function resetear(){
    const cerrar = document.querySelector("#cerrar");
    const btnRegistrar = document.querySelector("#model-register");
    cerrar.addEventListener('click',()=>{
        $("#formProducto").trigger('reset');
    });

    btnRegistrar.addEventListener('click',()=>{
        $("#formProducto").trigger('reset');
        $("#id").val("");
        imgc.remove(imgc.firstChild);
    })
}

function cierreModel(idModel){
  const modal = document.querySelector(`#${idModel}`);
  const modalfondo = document.querySelector(".modal-backdrop.fade");
  modal.classList.add('none');
  modal.classList.remove('show')
  modalfondo.classList.remove('show');
  $("#formProducto").trigger('reset');
}

function eliminarProducto(){
  $(document).on("click","#delete",function(ef){
    swal({
      title: "¿ Estas seguro de eliminar este producto?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(function(e){
      const idpro = ef.target.dataset.idproducto;
      if(e){
         $.ajax({
         url:"/producto/eliminar",
         type: "POST",
         data: {id: idpro},
         success: function(){
           llenarTabla();
         }
       })
      }
    })
  });
}

function buscarNombre(){
  $(document).on("keyup","#buscarnombre",function(e){
    if(e.target.value == ""){
      llenarTabla();
    }else {
      $.ajax({
        url:"/producto/buscarNombre",
        type:"POST",
        data: {pro_nombre: e.target.value},
        success: function(response){
          limpiarHTML();
          const json = JSON.parse(response);
          const { producto } = JSON.parse(response);
          if(producto.length != 0 ){
            producto.forEach(pr => {
              const {id, pro_categoria, pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_tamano, pro_estado} = pr;
              const row = document.createElement("tr");
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
                <button class="btn btn-danger" data-idproducto=${id}  id="delete">Delete</button>
              </td>
              `;
    
              contenedorProducto.appendChild(row);
            });
          }else{
            const row = document.createElement("tr");
            row.innerHTML = `
              <td colspan="5" class="text-center">
                No se encontraron resultado
              </td>
            `;
            contenedorProducto.appendChild(row);
          }
        }
      });
    }
    
  });
}