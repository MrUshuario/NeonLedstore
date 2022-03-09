<div class="contacto bg-black container-fluid">
    <div class="row">
        <img class="fondoContacto position-absolute bg-black border-black">
    </div>
    <div class="container">
        <section class="row pb-5">
            <form id="formContact" enctype="multipart/form-data">
                <div class="container">
                    <div class="row text-white mx-1 mx-sm-5 pt-3 mb-2 d-flex justify-content-end">
                        <div class="formulario ol-lg-5 p-5 border neontabla cyan">
                            <h2 class="neones purpura" style="padding-bottom: 10px;">Registrese</h2>   
                            <div class="row"> 
                            <input type="hidden" id="id">
                            <input type="hidden" id="rol" value="2">
                            <input type="hidden" id="estado" value="1">
                                <div class="form-group col-md-6">
                                <label>Nombres</label>
                                <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="Nombres" id="nombre" placeholder="Nombres" >
                                </div>
                                <div class="form-group col-md-6">
                                <label>Apellidos</label>
                                <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="Apellidos" id="apellidos" placeholder="Apellidos" >
                                </div>    
                                <div class="form-group col-md-6">
                                <label>Contraseña</label>
                                <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="password" name="password" id="clave" placeholder="Contraseña" >
                                </div>
                                <div class="form-group col-md-6">
                                <label>Correo Electronico</label>
                                <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="email" name="email" id="email" placeholder="Correo" >
                                </div>
                                <div class="form-group col-md-6">
                                <label>Telefono</label>
                                <input class="p-2 input-contact border-0 border-bottom bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white"  minlenght="9" maxlenght="9" type="tel" name="tel" id="telefono" placeholder="Telefono" >
                                </div>
                                <div class="input-group">
                                <button type="submit" class="button-contact btn m-2 mx-auto neonbotton neontabla" name="logeo" id="logeo">Registrarse</button>
                                <span class="input-group-addon"></span>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

<script src="build/js/ajax/ajax.registroCliente.js"></script>
<script>
    function sesionactive(){
    $.ajax({
      url: '/configuracion/getData',
      type: 'GET',
      success: function(e){
        
          
          //si no esta logeado enviar un mensaje que empieza con <
          if (e[0] == "<") {
            
            var x = false;
            console.log(x);
            console.log("No logeado"); 
          } 
          else{
            var x = true;
            document.location.href='/';
          }
      }   
  });
}
</script>