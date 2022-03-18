$(document).ready(function () {
    confirmacion();
  });

  function confirmacion(){
    let email = document.getElementById('email').value;
    let verificado = document.getElementById('verificado').value;
    const datos = {
      email: email,
      verificado: verificado
    };
    $.ajax({
      url: '/configuracion/verificado',
      type: 'GET',
      data: datos,
      success: function(e){
        console.log(e);
      }
    });
}