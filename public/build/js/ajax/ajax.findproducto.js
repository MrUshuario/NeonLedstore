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
        }   
    });
}