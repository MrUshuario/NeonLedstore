<div class="landingPage bg-black">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--INICIO CARRUSEL Bootstrap 5-->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/build/img/landingPage/lp-negocio/n1.jpg" class="d-block w-100" id="imgCarrusNegocio1" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/build/img/landingPage/lp-negocio/n2.jpg" class="d-block w-100" id="imgCarrusNegocio2" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/build/img/landingPage/lp-negocio/n3.jpg" class="d-block w-100" id="imgCarrusNegocio3" alt="...">
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
    <br>
  <!--FINAL DEL CARRUSEL-->

    <!--CENTRADO Y BLANCO-->
    <div class="container-fluid text-white text-center">
        <!--BOTON DEL MODAL-->
        <button type="button" id="model-register" class="neonbottonlanding btn btn-primary my-0 my-sm-3 border-0" data-bs-toggle="modal" data-bs-target="#modalAsesoria" onclick="AsesoriaNeg()">
            Obtén una asesoría personalizada GRATIS!
        </button>

        <!--Inicio Modal-->
            <div class="modal fade" id="modalAsesoria" tabindex="-1" aria-labelledby="modalAsesoria" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content rounded-25" id="padreModalLanding">
                <main class="main rounded-25 row pb-5 d-flex justify-content-center">
                
                    <div class="mainContent neontabla col-8 my-5 pb-3">
                        <h3 class="my-3 fs-2 neones p-50">¿Quieres tener un Negocio visualmente atractivo?</h3>
                        <div class="row d-flex justify-content-center">

                        <form class="formContact landingPageForm col-12 col-sm-10" method="POST">
                            <input type="hidden" id="consulta" value="formNegocio">
                            <div class="modal-field">
                                <input type="hidden" class="neontextlanding bg-transparent text-center form-control my-3 border-0" name="contador" id="contador" value=1>
                            </div>
                            <div class="modal-field">
                                <input type="text" class="neontextlanding bg-transparent text-center form-control my-3 border-0" name="nombre" id="nombre" placeholder="Nombres" required>
                            </div>
                            <div class="modal-field">
                                <input type="text" class="neontextlanding bg-transparent text-center form-control my-3 border-0" name="apellido" id="apellidos" placeholder="Apellidos" required>
                            </div>
                            <div class="modal-field">
                                <input type="email" class="neontextlanding bg-transparent text-center form-control my-3 border-0" name="correo" id="correo" placeholder="Correo Electrónico" required>
                            </div>
                            <div class="modal-field">
                                <input type="number" class="neontextlanding bg-transparent text-center form-control my-3 border-0 mb-3" name="telefono" id="telefono" placeholder="Número de celular" required>
                            </div> <!--crea tu propio boton, lo agregas en NEON.css -->
                            <div class="modal-field">
                                <input type="hidden" class="neontextlanding bg-transparent text-center form-control my-3 border-0" name="pregunta" id="pregunta" value="Solicita Asesoría">
                            </div>
                            <button type="submit" class="neonbottonlanding btn btn-primary my-sm-3 border-0"  id="btn-modal-asesoria Negocio" onclick="Negocio();">Pedir asesoria</button>
                        </form>
                    </div>     
                    </div>
                </main>
                </div>
            </div>
            </div>
            <!--Final Modal-->


            <div class="row questionNosotros py-2 py-sm-5 d-flex justify-content-center">

                <h2 class="questionNosotrosTitle pt-2 pt-sm-5">¿Por qué trabajar con nosotros?</h2>

                <p class="paragraph mt-3 w-75  px-4 px-sm-5 border border-5 rounded-3">Entendemos la importancia de la decoración en tu negocio para ofrecer el ambiente que tu 

                    cliente merece, con nosotros para lograrlo</p>      

            </div>


<!--LandingPageNegocio-->
            <div class="landin1 arreglo">

                <h1 class="title">¡LOS MEJORES DISEÑOS PARA NEGOCIOS!</h1>

                    <div class="container">

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/bar.webp">
                                <h4>Bar</h4>
                        </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/cine.webp">
                                <h4>Cine</h4>
                        </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/imagen3.webp">
                                <h4>Coffe Shop
                                </h4>
                        </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/restaurante.webp">
                                <h4>Restaurante</h4>
                         </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/Boutique.webp">
                                <h4>Boutique</h4>
                        </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/tienda.webp">
                                <h4>Tienda Comercial</h4>
                        </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/seminario.webp">
                                <h4>Seminario</h4>
                        </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/negocio-recepcion.webp">
                                <h4>Recepción</h4>
                        </div>

                        <div class="card">
                            <img src="build/img/landingPage/lp-negocio/club-campestre.webp">
                                <h4>Reuniones</h4>
                        </div>

                    </div>
            </div>   

<!--Fin LandinPageNegocio-->

            

            <div class="personalizado row d-flex align-items-end ">

                <div class="col-12 col-sm-4 my-3 my-sm-5">

                    <img class="personalizadoImage mx-auto d-block" src="/build/img/nightJazz.webp" alt="logo" loading="lazy">

                    <p class="personalizadoParagraph border border-5 rounded-3 text-center m-3 p-3 lh-sm">Ofrecemos diseños personalizados a pedido del cliente</p>

                </div>

                <div class="col-12 col-sm-4 my-3 my-sm-5">

                    <img class="personalizadoImage mx-auto d-block" src="/build/img/delivery.webp" alt="logo" loading="lazy">

                    <p class="deliveryParagraph border border-5 rounded-3 text-center m-3 py-3 px-5 lh-sm">Delivery gratis a todos los distritos de Lima y Provincia</p>

                </div>

                <div class="col-12 col-sm-4 my-3 my-sm-5">

                    <div class="row">

                        <img class="personalizadoImage precio mx-auto d-block" src="/build/img/precio.webp" alt="logo" loading="lazy">   

                    </div>

                    <p class="fabricantesParagraph border border-5 rounded-3 text-center m-3 p-3 lh-sm">Somos fabricantes y ofrecemos los productos a un excelente precio</p>

                </div>

            </div>

            <div class="row empresasQue py-2 py-sm-5">

                <h2 class="empresasQueTitle mb-2 mb-sm-5">Empresas que trabajan con nosotros</h2>

                <div class="col-3 d-none d-sm-block">

                    <img class="empresasQueImage mx-auto d-block" src="/build/img/metacolor.webp" alt="logo" loading="lazy">

                </div>

                <div class="col-3 d-none d-sm-block">

                    <img class="empresasQueImage mx-auto d-block" src="/build/img/digimedia.webp" alt="logo" loading="lazy">

                </div>

                <div class="col-3 d-none d-sm-block">

                    <img class="empresasQueImage mx-auto d-block" src="/build/img/nocheDePatas.webp" alt="logo" loading="lazy">

                </div>

                <div class="col-3 d-none d-sm-block">

                    <img class="empresasQueImage mx-auto d-block" src="/build/img/aje.webp" alt="logo" loading="lazy">

                </div>

                <div id="carouselExampleControls2" class="carousel slide col-12 my-3 d-block d-sm-none" data-bs-ride="carousel">

                    <div class="carousel-inner row m-0">

                        <div class="carousel-item col-6 col-sm-12 active " data-bs-interval="2000">

                            <img class="empresasQueImage mx-auto d-block" src="/build/img/metacolor.webp" alt="logo" loading="lazy">

                        </div>

                        <div class="carousel-item col-6 col-sm-12" data-bs-interval="2000">

                            <img class="empresasQueImage mx-auto d-block" src="/build/img/digimedia.webp" alt="logo" loading="lazy">

                        </div>

                        <div class="carousel-item col-6 col-sm-12" data-bs-interval="2000">

                            <img class="empresasQueImage mx-auto d-block" src="/build/img/nocheDePatas.webp" alt="logo" loading="lazy">

                        </div>

                        <div class="carousel-item col-6 col-sm-12" data-bs-interval="2000">

                            <img class="empresasQueImage mx-auto d-block" src="/build/img/aje.webp" alt="logo" loading="lazy">

                        </div>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">

                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                        <span class="visually-hidden">Previous</span>

                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">

                        <span class="carousel-control-next-icon" aria-hidden="true"></span>

                        <span class="visually-hidden">Next</span>

                    </button>

                </div>

            </div>

        </div>

    </div>

<script type="text/javascript" src="\build\js\ajax\ajaxconfi-carucel.js"></script> 

<script src="build/js/ajax/ajax.contacto.js"></script>