<div class="landingPage bg-black">

  <!--INICIA CARRUSEL lAYOUTpRINCIPAL.php, AGREGAR LOS SCRIPT NECESARIO PARA QUE FUNCIONES, SI SUBES UN NUEVO SCRIPT, PUBLIC/BUILD/JS 
    https://www.youtube.com/watch?v=N7JXmnaVWL0&t=269s-->
    <div  class="carrusel">
    <!--Titulo y botones-->
	<section class="pt-3 pb-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
					<!--TITUTLO -->
                        <h3 class="mb-3" id="Leaxtor">Servicios para el Negocio </h3> <!--no olvidar darle su ID-->
                    </div>
					<!--USO: LOS BOTONES, DEBEN TENER DE HREF, EL MISMO QUE DIV -->
                    <div class="col-6 text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#carusel1" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3 " href="#carusel1" role="button" data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
					<!--de este div su id debe ser igual al href de los botones-->
                        <div id="carusel1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
								<!--verticales ES col-md-2 -->
								<!--Horizontales ES col-md-4 -->

									<!--INICIO VAGON-->
									<div class="carousel-item active"> <!--el primero tiene el ACTIVE, los demas no-->
									<div class="row">
									<!--IMAGEN 1-->
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                 <img height="300"  alt="100%x180"
                                                     src="/build/img/landingPage/jovenEscuchandoMovil.webp" />
                                                <div class="card-body">
                                                    <h4 class="neones">aaaaaaaaaaaa</h4>
                                                </div>
                                            </div>
                                        </div>
										<!-- cerrando vagon -->
                                        <!--IMAGEN 1-->
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                 <img height="300"  alt="100%x180"
                                                     src="/build/img/landingPage/jovenEscuchandoMovil.webp" />
                                                <div class="card-body">
                                                    <h4 class="neones">eeee</h4>
                                                </div>
                                            </div>
                                        </div>
										<!-- cerrando vagon -->
                                    </div>
                                </div>
								<!-- FIN DEL VAGON -->
								
								
                                <!--INICIO VAGON-->
									<div class="carousel-item "> <!--el primero tiene el ACTIVE, los demas no-->
									<div class="row">
									<!--IMAGEN 1-->
                                        <div class="col-md-12 mb-3">
                                            <div class="card">
                                                 <img  height="300" alt="100%x180"
                                                     src="/build/img/contacto/jovenLuz.webp" />
                                                <div class="card-body">
                                                    <h4 class="neones">Plus</h4>
                                                </div>
                                            </div>
                                        </div>

										<!-- cerrando vagon -->
                                    </div>
                                </div>
								<!-- FIN DEL VAGON -->
                                <!--cerrando el div -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
        <!--FINAL DEL CARRUSEL-->


    <!--CENTRADO Y BLANCO-->
    <div class="container-fluid text-white text-center">
        <!--BOTON DEL MODAL-->
        <button type="button" id="model-register" class="neonbottonlanding btn btn-primary my-0 my-sm-3 border-0" data-bs-toggle="modal" data-bs-target="#modalAsesoria">
            Obtén una asesoría personalizada GRATIS!
        </button>

        <!--Inicio Modal-->
        <div class="modal fade" id="modalAsesoria" tabindex="-1" aria-labelledby="modalAsesoria" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content rounded-25">
                <main class="main rounded-25 row pb-5 d-flex justify-content-center">
                
                    <div class="mainContent col-8 my-5 pb-3">
                        <h1 class="my-3 fs-2 neones p-50">¿Quieres tener un negocio visualmente atractivo?</h1>
                        <div class="row d-flex justify-content-center">

                        <form class="landingPageForm col-12 col-sm-10" method="POST" action="/build/enviingPage">
                            <div class="">
                                <input type="text" class="neontextlanding bg-transparent text-center form-control my-1 my-sm-5 border-0" name="nombre" placeholder="Nombres y Apellidos" required>
                            </div>
                            <div class="">
                                <input type="email" class="neontextlanding bg-transparent text-center form-control my-1 my-sm-5 border-0" name="correo" placeholder="Correo Electrónico" required>
                            </div>
                            <div class="">
                                <input type="tel" class="neontextlanding bg-transparent text-center form-control my-1 my-sm-5 border-0" name="telefono" id="telefono" placeholder="Número de celular" required>
                            </div> <!--crea tu propio boton, lo agregas en NEON.css -->
                            <button type="submit" class="neonbottonlanding btn btn-primary my-0 my-sm-3 border-0">Pedir asesoria</button>
                        </form>
                    </div>     
                    </div>
                </main>
                </div>
            </div>
            </div>
            <!--Final Modal-->

        <!--fondo anterior-->
           <!-- <main class="main row pb-5 d-flex justify-content-center">

                <img src="/build/img/jovenEscuchandoMovil.webp"  srcset="/build/img/jovenEscuchandoMovil.webp 420w, /build/img/jovenEscuchando.webp 870w" alt="jovenEscuchando" class="mainFondo position-absolute">
            </main> -->

            <div class="row questionNosotros py-2 py-sm-5 d-flex justify-content-center">

                <h2 class="questionNosotrosTitle pt-2 pt-sm-5">¿Por qué trabajar con nosotros?</h2>

                <p class="paragraph mt-3 w-75  px-4 px-sm-5 border border-5 rounded-3">Entendemos la importancia de la decoración en tu negocio para ofrecer el ambiente que tu 

                    cliente merece, con nosotros para lograrlo</p>      

            </div>

            <div class="teMostraremos row py-2 py-sm-5">

                <h2 class="teMostraremosTitle">Te mostraremos nuestros diseños</h2>

                <div class="col-4 my-2 my-sm-5 d-none d-sm-block">

                    <img class="teMostraremosImage mx-auto d-block" src="/build/img/viendoZamba.webp" alt="logo" loading="lazy">

                </div>

                <div class="col-4 my-2 my-sm-5 d-none d-sm-block">

                    <img class="teMostraremosImage mx-auto d-block" src="/build/img/zamba.webp" alt="logo" loading="lazy">

                </div>

                <div class="col-4 my-2 my-sm-5 d-none d-sm-block">

                    <img class="teMostraremosImage mx-auto d-block" src="/build/img/puma.webp" alt="logo" loading="lazy">

                </div>
            </div>
           

            <div class="personalizado row d-flex align-items-end ">

                <div class="col-12 col-sm-4 my-3 my-sm-5">

                    <img class="personalizadoImage mx-auto d-block" src="/build/img/nightJazz.webp" alt="logo" loading="lazy">

                    <p class="personalizadoParagraph border border-5 rounded-3 text-center m-3 p-3 lh-sm">Ofrecemos diseños personalizados a pedido del cliente</p>

                </div>

                <div class="col-12 col-sm-4 my-3 my-sm-5">

                    <img class="personalizadoImage mx-auto d-block" src="/build/img/hotAndFresh.webp" alt="logo" loading="lazy">

                    <p class="deliveryParagraph border border-5 rounded-3 text-center m-3 py-3 px-5 lh-sm">Delivery gratis a todos los distritos de Lima y Provincia</p>

                </div>

                <div class="col-12 col-sm-4 my-3 my-sm-5">

                    <div class="row">

                        <img class="personalizadoImage cocktails mx-auto d-block" src="/build/img/cocktails.webp" alt="logo" loading="lazy">   

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
