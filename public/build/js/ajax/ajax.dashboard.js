
$(document).ready(function() {
  
    data();
 
});

function data() {
    $.ajax({
        url: '/configuracion/getData',
        type: 'GET',
        success: function(e){
            const {data} = JSON.parse(e);
            console.log(data);
            document.querySelector("#cli_nombre").value = data.cli_nombre;
            $("#cli_email").val(data.cli_email); //para input
            // document.querySelector("#cli_email").value = data.cli_email;  etiqueta
            
           
        }   
    });
}