<!-- <link rel="stylesheet" href="grid.css">  -->

<div class="productos page-container bg-black">
    <main class="main mb-3 mb-sm-5">
        <div class="contenedorMain container pt-1 pt-sm-5">
            <div class="row text-white d-flex justify-content-around">
                <div class="d-flex flex-column col-6 col-sm-4">
                    <h1 class="title-product py-1 py-sm-3 text-start fw-bold">PRODUCTO</h1>
                    <div class="h-100 w-100 d-flex items-center">
                        <img class="img-product w-100" src="/build/img/productos/brideToBe.webp" alt="brideToBe">
                    </div>
                </div>
                <div class="contenedorTexto col-6 col-sm-4 pt-5 pt-sm-3 ">
                    <h2 class="subtitulo text-center fw-bold">NEÓN DESIGN</h2>
                    <div class="h-100 d-flex align-items-center">
                        <aside class="">
                            <p class="parrafo">Actualmente los diseños de neon led se han vuelto una tendencia interesante y
                                diferente para cualquier evento, negocio o para la decoración de tu habitación.
                                En NEON LED STORE realizamos paneles 100% personalizados al estilo de tu marca
                                o para lo que tu evento nececit. Recuerda que puedes cotizar cualquier diseño con
                            <span><a class="enlaceNosotros" href="/nosotros">nosotros.</a></span>
                            </p>
                        </aside>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<!--FILTRO-->
<article class="article1 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 text-white">
                        <div class="filtros border border-light border-4 border-bottom-0 border-start-0  d-flex align-items-center fw-bold">
                            Filtros
                        </div>

                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="cajaFiltroCategoria accordion-item border-bottom-0 border-start-0 border-4 border-light rounded-0 bg-black">
                                <h2 class="accordion-header w-100 text-white d-flex justify-content-center items-center" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button collapsed filtroCategoria float-left text-start bg-black text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Categoría
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body" id="filtro_categoria">
                                    </div>
                                </div>
                            </div>

                            <div class="cajaFiltroPrecio accordion-item border border-4 border-bottom-0 border-light border-start-0 bg-black">
                                <h2 class="accordion-header w-100 text-white d-flex justify-content-center items-center" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed filtroPrecio float-left text-start bg-black text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        Precio
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        <div class="range bg-dark p-2">
                                            <div class="container mt-4">
                                                <input type="range" id="inputrange" class="js-range-slider" name="my_range" value="" tabindex="-1" readonly="">
                                            </div>
                                            <p class="text-center">Precio S/.140 - S/.860</p>
                                            <div class="row d-flex justify-content-center">
                                                <button id="optrange" name="btn_range" class="precio btn btn-secondary col-6">Filtrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cajaFiltroColor accordion-item border border-4 border-light border-start-0 bg-black">
                                <h2 class="accordion-header w-100 text-white d-flex justify-content-center items-center" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed filtroColor float-left text-start bg-black text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                        Color
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">
                                        <ul class="row w-100  bg-black" id="contenedor-color">
                                            <li class="itemFiltroColor col-6 pt-2">
                                                <div class="paleta paletaMorada dropdown-item rounded-circle mx-auto" data-id="1"></div>
                                            </li>
                                            <li class="itemFiltroColor col-5 pt-2">
                                                <div class="paleta paletaAzul dropdown-item rounded-circle mx-auto" data-id="2"></div>
                                            </li>
                                            <li class="itemFiltroColor col-6 pt-2">
                                                <div class="paleta paletaRojo dropdown-item rounded-circle mx-auto" data-id="3"></div>
                                            </li>
                                            <li class="itemFiltroColor col-5 pt-2">
                                                <div class="paleta paletaAmarillo dropdown-item rounded-circle mx-auto" data-id="4"></div>
                                            </li>
                                            <li class="itemFiltroColor col-6 pt-2">
                                                <div class="paleta paletaVerde dropdown-item rounded-circle mx-auto" data-id="5"></div>
                                            </li>
                                            <li class="itemFiltroColor col-5 pt-2">
                                                <div class="paleta paletaCeleste dropdown-item rounded-circle mx-auto" data-id="6"></div>
                                            </li>
                                            <li class="itemFiltroColor col-6 pt-2">
                                                <div class="paleta paletaNegro dropdown-item rounded-circle mx-auto border" data-id="7"></div>
                                            </li>
                                            <li class="itemFiltroColor col-5 pt-2">
                                                <div class="paleta paletaRosa dropdown-item rounded-circle mx-auto" data-id="8"></div>
                                            </li>
                                            <li class="itemFiltroColor col-6 pt-2">
                                                <div style="background-color:#fff;" class="paletaCeleste dropdown-item rounded-circle mx-auto" data-id="9"></div>
                                            </li>
                                            <li class="itemFiltroColor col-5 pt-2">
                                                <div class="paleta paletaNaranja dropdown-item rounded-circle mx-auto" data-id="10"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="buscar">
                            <input type="text" class="entradaBuscar bg-black text-white w-100 mt-2" name="buscar" id="entradaBuscar" placeholder="Buscar">
                        </div>
                    </div>
                </div>

                <div class="busqueda container pt-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col-7 col-sm-3">
                            <h3 class="tituloOrdenar text-white text-center">Ordenar por</h3>
                            <button type="button" class="recomendado bg-black text-white w-100 mt-2 btn btn-dark">Recomendado</button>
                        </div>
                    </div>
                    <div class="articles-section row pt-3" id="articles-section">
                        <!---
                    
                        <div class='productCard col-6 p-1 col-lg-4 text-white align-self-end'>
                            <div class=''>
                                <a href='producto'>
                                    <div class='d-block d-flex justify-content-center'>
                                        <picture class='mw-75'>
                                            <source media='(min-width:600px)'  srcset=''>
                                            <img class='' src='' alt='corazonesAngelCaido'>
                                        </picture>
                                    </div>
                                </a>
                                <h3 class='productCardTitle h3 text-center'></h3>
                                <div class='d-flex justify-content-center w-100 mb-3 mt-3'>
                                    <div class='w-75 product-led' style='height: 5px;'></div>
                                </div>
                                <div class='d-block col-8 mx-auto mt-2'>
                                    <div class='gap-2 d-flex justify-content-center'></div>
                                    <p class='productCardPrice weight-bolder h4 text-center'></p>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
        </article>

<article class="article2 p-1 p-sm-5">

    <div class="container">
        <div class="row text-white d-flex justify-content-around">
                <div class="d-flex flex-column col-3 col-sm-10">
                    <h2 class="title-product py-1 py-sm-3 text-start fw-bold">GALERÍA DE PRODUCTOS</h2>               


        <ma class="ma">

            <div class="galeria">

                <div class="contenedor-imagenes">

                    <div class="imagen">

                        <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div> 

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>Ver detalle </h2>

                    </div>

            </div>

            <div class="imagen">

                <img src="build/img/productos/brideToBe.webp" alt="">

                    <div class="overlay">

                        <h2>ver detalle </h2>

                    </div>

            </div> 

        </div>

        </div>

        </ma>

        </div>
    </div>
</article>

<script src="build/js/ajax/ajax.filtrado.js"></script>

 

 
