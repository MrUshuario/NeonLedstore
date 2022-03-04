
<div class="pt-5 page-container bg-black">



    <div class="recipienteProDeta">
        <div id="carouselExampleIndicators" class="carousel slide tamano-carrus" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/build/img/landingPage/lp-hogar/h1.jpg" class="d-block w-100 tam" id="imgCarrusHogar1" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/build/img/landingPage/lp-hogar/h2.jpg" class="d-block w-100 tam" id="imgCarrusHogar2" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/build/img/landingPage/lp-hogar/h3.jpg" class="d-block w-100 tam" id="imgCarrusHogar3" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    
    
    
    
    
    
        <!-- Recopilando la parte del compañero -->
    
        <div class="row text-white   pt-3 mb-2 d-flex justify-content-end tamano_des">
            <div class="formulario col-12 col-sm-12  border neontabla largoCom">
                <div class="container">
                    <div class="row">
                        <div class="container">
                        <h1 id="nombre" class="text-white display-1 weight-medium m-3">Producto</h1>
                            <div>
                                <form class="formMod col-12 col-sm-10">

                                    <input type="hidden" id="id" value="formNegocio">

                                    <div style="float: left;" class="modal-field">
                                    <label id="precio" type="text" id="pro_precio" class="font-weight-bold text-white bg-transparent text-center form-control my-3 border-0">Precio: S/.</label>
                                    </div>

                                    <div style="float: left;"class="modal-field">
                                    <label id="tamano" type="text" id="pro_tamano" class="font-weight-bold text-white bg-transparent text-center form-control my-3 border-0">Dimensiones: </label>
                                    </div>
                                
                                    <select name="color" class="neontextlanding border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block">
                                    <option id="pro-color" value="1">ROJO</option>
                                    <option id="pro-color" value="2">AZUL</option>
                                    <option id="pro-color" value="3">MULTICOLOR</option>
                                    </select>     
                                    <i class="fa-solid fa-dolly"></i>
                                    <a href="/productos" class="neonbottonlanding btn btn-primary my-sm-3 border-0" style="width: auto; height:auto font-size: 18px;"> Comprar </a>
                                </form>
                                <hr>
                                <br>
                                <p id="detalles">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</p>
                                <i class="fa-solid fa-angles-left"></i><a href="/productos" class="neonbottonlanding btn btn-primary my-sm-3 border-0" style="width: auto; height:auto font-size: 18px;"> Volver </a>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="build/js/ajax/ajax.findproducto.js"></script>
</div>

