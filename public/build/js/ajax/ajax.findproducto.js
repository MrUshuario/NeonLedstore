$(document).ready(function() {
    datapro();
});
function datapro() {
    console.log("sadasd");
    $.ajax({
        url: '/producto/getdata',
        type: 'GET',
        success: function(e){
            var {data} = JSON.parse(e);
            console.log(data);
            $(document).ready(function() {
                $('#nombre').text(data.pro_nombre);
                $('#precio').append("Precio: S/.",data.pro_precio);
                $('#detalles').text(data.pro_descripcion);
                $('#tamano').append("Dimensiones: ",data.pro_tamano);
            });
        }   
    });
}