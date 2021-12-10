$(document).ready(function () {
  listar();
});

  function listar() {
    
    const table = $("#tablaproductoxcolor").DataTable({
      destroy: true,
      ajax: {
           method: "GET",
           url: "/productoxcolor/listar",
    },
    columns:  [
        { data: null,
        render: function(data,type,row){
          const split=data.id_producto.split(',');
          return `${split[0]} - Precio: S/.${split[2]}`;
        } },


        { data: null,
          render: function(data,type,row){
            const split=data.id_producto.split(',');
            return `${split[0]} - Precio: S/.${split[2]}`;
          } },


        { data: "id_color" },
        {
          data: null,
          render: function (data, type, row) {
            return `<button class="btn btn-warning" data-idcolor="${data.id}" id="edit" data-bs-toggle="modal" data-bs-target="#modalColor">Edit</button>
            <button class="btn btn-danger" data-idcolor="${data.id}" id="delete">Delete</button>`;
          },
        },
      ],
    });
  }

  function getProducto(){
    const idproduct = document.querySelector("#id_producto");
    $.ajax({
      method: 'POST',
      url: '/productoxcolor/getproducto',
      success: function(e){
        const {data} = JSON.parse(e);
        data.array.forEach(e => {
          if (e.pro_estado == function getProducto(){
    const idproduct = document.querySelector("#id_producto");
    $.ajax({
      method: 'POST',
      url: '/productoxcolor/getproducto',
      success: function(e){
        const {data} = JSON.parse(e);
        data.array.forEach(e => {
          if(e.pro_estado == 'Activo') {
            idproducto.innerHTML += ``
          })
        }
      });
    }

  function getColor(){
    $.ajax({
      method: 'GET',
      url: 'productoxcolorgetColor/',
      success: function(e){
        const {data} = JSON.parse(el);
        const idcolor = document.querySelector("#id_color");
        data.forEach(e => {
          idcolor.innerHTML += ``
        })
      }
    });
  }

  function deletePC(){
    $.ajax({
      method: 'POST',
      url: '',
      success: function(e){

      }
    });
  }

  function ObtenerData(){
    $.ajax({
      method: 'POST',
      url: '',
      success: function(e){

      }
    });
  }