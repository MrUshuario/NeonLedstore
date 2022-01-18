<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Galeria de productos </title>

    <link rel="stylesheet" href="estilos.css">

</head>

<style>

*{

    margin:0;

    padding: 0;

    box-sizing: border-box;

}

.galeria{

    font-family: open sans;

}

.galeria h1{

    text-align: center;

    margin:20px 0 15px 0;

    font-weight: 300;

}

.linea{

    border-top: 5px solid #0077C0;

    margin-bottom: 40px;

}

.contenedor-imagenes{

    display:flex;

    width: 85%;

    margin: auto;

    justify-content: space-around;

    flex-wrap: wrap;

    border-radius:3px;

}

.contenedor-imagenes .imagen{

    width: 32%;

    position: relative;

    height:250px;

    margin-bottom:5px;

    box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, .75)

}

.imagen img{

    width: 100%;

    height:100%;

    object-fit: cover;

}

.overlay{

    position: absolute;

    bottom: 0;

    left: 0;

    background:rgba(0, 118, 192, 0.781) ;

    width: 100%;

    height: 0;

    overflow: hidden;

    transition: .5s ease;

}

.overlay h2{

    color: #fff;

    font-weight: 300;

    font-size:30px;

    position: absolute;

    top: 50%;

    left:50%;

    text-align: center;

    transform: translate(-50%, -50%);

}

.imagen:hover .overlay{

    height:100%;

    cursor: pointer;

}

@media screen and (max-width:1000px){

    .contenedor-imagenes{

        width: 95%;

    }

}

@media screen and (max-width:700px){

    .contenedor-imagenes{

        width: 90%;

    }

    .contenedor-imagenes .imagen{

        width: 48%;

    }

}

@media screen and (max-width:450px){

    h1{

        font-size:22px;

    }

    .contenedor-imagenes{

        width: 98%;

    }

    .contenedor-imagenes .imagen{

        width: 80%;

    }

    

}

</style>

<div class="productos bg-black">

        <main class="main mb-3 mb-sm-5">

            <div class="contenedorMain container pt-1 pt-sm-5">

                <div class="row text-white d-flex justify-content-around">

                    <div class="d-flex flex-column col-6 col-sm-4">

                        <h1 class="title-product py-1 py-sm-3 text-start fw-bold">PRODUCTO</h1>

                        <picture class="h-100 w-100 d-flex items-center">

                            <source media="(min-width: 576px)" srcset="/build/img/productos/brideToBe.webp">

                            <img class="img-product w-100" src="/build/img/productos/brideToBe.webp" alt="brideToBe">

                        </picture>

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

                                    <div class="accordion-body">

                                        <ul class="categoriaList w-100 bg-black p-0 text-center">

                                        </ul>

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

                <div class="row d-flex justify-content-between mx-1 mx-sm-5 pb-3">

                    <h2 class="tituloFotos text-white mb-4">FOTOS DE PRODUCTO</h2>

                    <div class="col-5 py-1 py-sm-5">

                        <picture>

                            <source media="(min-width: 576px)" srcset="/build/img/productos/isThisFustFantasy.webp">

                            <img class="w-100" src="/build/img/productos/isThisFustFantasyMovil.webp" alt="isThisFustFantasy" loading="lazy">

                        </picture>

                    </div>

                    <div class="col-5 py-2 py-sm-5">

                        <picture>

                            <source media="(min-width: 576px)" srcset="/build/img/productos/thania.webp">

                            <img class="w-100" src="/build/img/productos/thaniaMovil.webp" alt="thania" loading="lazy">

                        </picture>

                    </div>

                    <div class="col-5 py-2 py-sm-5">

                        <picture>

                            <source media="(min-width: 576px)" srcset="/build/img/productos/flamenco2.webp">

                            <img class="w-100" src="/build/img/productos/flamenco2Movil.webp" alt="flamenco2" loading="lazy">

                        </picture>

                    </div>

                    <div class="col-5 py-2 py-sm-5">

                        <picture>

                            <source media="(min-width: 576px)" srcset="/build/img/productos/slicesOpenLate.webp">

                            <img class="w-100" src="/build/img/productos/slicesOpenLateMovil.webp" alt="slicesOpenLate" loading="lazy">

                        </picture>

                    </div>

                    <div class="col-5 py-2 py-sm-5">

                        <picture>

                            <source media="(min-width: 576px)" srcset="/build/img/productos/tarro.webp">

                            <img class="w-100" src="/build/img/productos/tarroMovil.webp" alt="tarro" loading="lazy">

                        </picture>

                    </div>

                    <div class="col-5 py-2 py-sm-5">

                        <picture>

                            <source media="(min-width: 576px)" srcset="/build/img/productos/amongus.webp">

                            <img class="w-100" src="/build/img/productos/amongusMovil.webp" alt="amongus" loading="lazy">

                        </picture>

                    </div>

                </div>

                <form id="formContact" method="POST" action="/api/enviarCorreo">

                    <div class="container">

                        <div class="row text-white mx-1 mx-sm-5 pt-3 mb-2 ">                          

                            <div class="col-12 col-sm-8 px-5">

                                <h2 class="tituloFormulario text-center text-white">Contáctanos</h2>                       

                                <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="nombre" id="nombre" placeholder="Nombre" required>

                                <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="email" name="correo" id="correo" placeholder="Correo" required>

                                <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="number" name="telefono" id="telefono" pattern="[0-9]{9,12}" placeholder="N° de celular" required>

                                <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="pregunta" id="pregunta" placeholder="Mensaje" required>

                                <button class="button-contact btn m-2 mx-auto d-block text-white border-white" name="enviar" id="enviar">Enviar</button>

                            </div>

                            <div class="col-12 col-sm-4 py-2 p-1 p-sm-3 border">

                                <img class="imagenFormulario mx-auto d-block my-3" src="/build/img/productos/neonLedStore.webp" alt="introNLS" loading="lazy">

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </article>

        <template id="template-items">

            <article class='article-card'>

                <a href='producto.php?pro=1'>

                    <img src="imagen" alt=''>

                </a>

                <h3>Nombre</h3>

                <div>

                    <span class='color-div' style='background: red'></span>

                </div>

                <p>S/.350.00</p>

            </article>

        </template>

        <template id="template-catlist">

            <li>

                <a></a>

            </li>

        </template>

    </div>

<body>

        <template id="template-items">

            <article class='article-card'>

                <a href='producto.php?pro=1'>

                    <img src="imagen" alt=''>

                </a>

                <h3>Nombre</h3>

                <div>

                    <span class='color-div' style='background: red'></span>

                </div>

                <p>S/.350.00</p>

            </article>

        </template>

        <template id="template-catlist">

            <li>

                <a></a>

            </li>

        </template>

    </div>

    <div class="galeria">

        <h1>Galeria</h1>

        <div class="linea"></div>

        <div class="contenedor-imagenes">

            <div class="imagen">

                <img src="img/1 (2).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (3).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (4).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (5).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (6).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (7).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (8).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (9).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (10).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div>

            <div class="imagen">

                <img src="img/1 (2).jpg" alt="">

                <div class="overlay">

                    <h2>ver detalle </h2>

                </div>

            </div> 

        </div>

    </div>

</body>



</html>
