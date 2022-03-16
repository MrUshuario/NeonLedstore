$(document).ready(function () {
  tableAll();
  conseguirproductos();
});

function tableAll(){
  const table = $('#clientecompraver').DataTable({
    "destroy":true,
    "ajax":{
      "method":"GET",
      "url":"/compra/clienteverFactura"
    }, 
    columns: [
      {data:"com_fecha"},
      {data:"precio_total"},
      {data: null,
        render: function(data,type,row){
          return `<button class="btn-inline btn-info" id="categoriaPro">Ver Detalle</button>`;
        }
      }
    ]
  }); 

}


function conseguirproductos(){
  $(document).on("click", "#categoriaPro", function (e) {
  let cod_id = e.target.dataset.idcodigo;
  const table = $('#productoCategoria').DataTable({
    "destroy":true,
    "ajax":{
      "data": { cod_id: cod_id }, //esto talvez me cause problemas
      "method":"POST",
      "url":"/compra/conseguirproductos" // conseguirproductos clientefactura
    }, 
    columns: [
      {data:"id"},
      {data:"cod_id"},
      {data:"det_cantidad"}, 
      {data: "det_color"} // es total lo enmascare como color
    ]
  }); 
  }); 
  }
