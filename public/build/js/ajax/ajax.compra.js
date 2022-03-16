$(document).ready(function () {
  tableAll();
  updateStatus();
  conseguirproductos();


});

function tableAll(){
  const table = $('#compratabla').DataTable({
    "destroy":true,
    "ajax":{
      "method":"GET",
      "url":"compra/listar"
    }, 
    columns: [
      {data:"id"},
      {data:"com_fecha"},
      {data: null,
        render: function(data,type,row){
          return `<button class="btn-inline btn-info" data-idcodigo="${data.id}" id="categoriaPro">${data.precio_total}</button>`;
        }
      },
      {data: "cli_id"}
    ]
  }); 

}


function   conseguirproductos(){
  $(document).on("click", "#categoriaPro", function (e) {
  let cod_id = e.target.dataset.idcodigo;
  const table = $('#productoCategoria').DataTable({
    "destroy":true,
    "ajax":{
      "data": { cod_id: cod_id }, //esto talvez me cause problemas
      "method":"POST",
      "url":"/compra/conseguirproductos"
    }, 
    columns: [
      {data:"id"},
      {data:"cod_id"},
      {data:"det_cantidad"}, 
      {data: "det_color"}
    ]
  }); 
  }); 
  }

function updateStatus(){
  $(document).on("click","#btnEstado",function(e){
    const id = e.target.dataset.idcliente;
    const estadoText = e.target.textContent;    
    const data = { id: id, cli_estado: estadoText};
    
    $.ajax({
      url: "/cliente/estado",
      type: "POST",
      data: data,
      success: function(ec){
        console.log(ec)
        const data = JSON.parse(ec);
        const { cli_estado, resultado } = data;
        e.target.textContent = cli_estado;
        if(cli_estado == "1"){
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