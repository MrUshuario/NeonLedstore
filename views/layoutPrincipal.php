<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Neon Led Store</title>

    <!-- Fonts Google - OpenSans -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- FontAwesome -->

    <link rel="stylesheet" href="build/css/fontawesome/css/all.min.css">

    <!-- Bootstrap 5 CSS -->

    <link rel="stylesheet" href="build/css/bootstrap/bootstrap.min.css">

    <!-- Normalize CSS -->

    <link rel="stylesheet" href="build/css/normalize/normalize.css">

    <link rel="stylesheet" href="build/css/index.css">

    <script src="build/js/jquery.min.js"></script>
    
    <!-- Para el carrusel DE LANDINGPAGE.PHP agrege este archivo -->
    
    <!-- <script src="build/js/bootstrap.min.js"></script> -->

    <!--PRUEBAS CONTACTO -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="build/css/principal/navs.css">

    <link rel="stylesheet" href="build/css/neon.css">

</head>

<body>

    <header class="bg-black">

        <div class="container container-responsive">

            <nav class="contenido navbar navbar-expand-lg navbar-light bg-black">

                <div class="container-fluid">

                    <a class="navbar-brand" href="/"><img class="w-100" src="/build/img/logo.webp" alt="logo neon led store" width="55px" height="55px"></a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="listaContenido nav-item px-2 border-end border-2 border-light">

                                <a class="enlace nav-link px-0 py-0" aria-current="page" href="/">

                                    <div class="botones text-white px-3 rounded-medium">HOME</div>

                                </a>

                            </li>

                            <li class="listaContenido nav-item px-2 border-end border-2 border-light">

                                <a class="enlace nav-link px-0 py-0" aria-current="page" href="/productos">

                                    <div class="botones text-white px-3 rounded-medium">PRODUCTOS</div>

                                </a>

                            </li>

                            <li class="listaContenido nav-item px-2 border-end border-2 border-light">

                                <a class="enlace nav-link px-0 py-0" aria-current="page" href="/servicios">

                                    <div class="botones text-white px-3 rounded-medium">SERVICIOS</div>

                                </a>

                            </li>

                            <li class="listaContenido nav-item px-2 border-end border-2 border-light">

                                <a class="enlace nav-link px-0 py-0" aria-current="page" href="/nosotros">

                                    <div class="botones text-white px-3 rounded-medium">NOSOTROS</div>

                                </a>

                            </li>

                            <li class="listaContenido nav-item px-2  border-2 border-light">

                                <a class="enlace nav-link px-0 py-0" aria-current="page" href="/contacto">

                                    <div class="botones text-white px-3 rounded-medium">CONTACTO</div>

                                </a>

                            </li>

                        </ul>

                    </div>

                    <div class="d-flex position-absolute" style="top: 1em; right:1em">

                        <div class="navbar-brand iconoUsuario ">

                            <?php //if ($this->sessionValidate == true) : 

                                    ?>

                                <div class="d-flex items-center gap-1">

                                    <p class="m-0 text-wrap text-white items-center" style="max-width: 80px; font-size: .8em;white-space: nowrap;

                text-overflow: ellipsis;

                overflow: hidden;">Alias</p>

                                    <a href="/cart/" class="text-white">

                                        <i class="fas fa-shopping-cart"></i>

                                    </a>

                                    <a href="/login" class="text-white d-flex ">

                                       <i class="fas fa-user"></i>

                                    </a>

                                </div>

                            <?php //else : 

                            ?>

                                <a href="" class="text-white" data-bs-toggle="modal" data-bs-target="#modalLogin">

                                    <i class="fas fa- fa-2x"></i>

                                </a>

                            <?php //endif; 

                            ?> 

                        </div>

                        <button class="amburguesa navbar-toggler " data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="amburguesaContenido navbar-toggler-icon bg-dark"></span>

                        </button>

                    </div>

                </div>

            </nav>

        </div>

    </header>

    <?php echo $contenido ?>

    <footer class="border-top bg-black border-light border-2 ">

        <div class="contenido container text-white px-3 px-sm-5 py-3 py-sm-4">

            <div class="row">

                <h2 class="subtitulo display-7">Tu diseño, tu espacio</h2>

            </div>

            <div class="row">

                <div class="col-12 order-1 order-sm-1 col-sm-4 pt-3">

                    <p class="parrafoFooter">Somos fabricantes e importamos articulos neon led, pantallas led y paneles

                        electronicos. Producto hecho en Perú. </p>

                </div>

                <div class="col-12 order-3 order-sm-2 col-sm-5 pt-3">

                    <a href="http://maps.google.com/?q=jr. Paruro 1401 tda. 130 sótano, CC shopping center, Cercado de Lima 15001" target="_blank" class="parrafoFooter text-white"><i class="fas fa-map-marker-alt"></i>Jr. Paruro 1401 tda 130 CC Shoping Center Paruro, Cercado de Lima</a>

                    <p class="parrafoFooter text-white"><i class="fas fa-mobile-alt"></i>994 078 320</p>

                    <a id="a-email" href="info.neonledstore@gmail.com" class="parrafoFooter text-white"><i class="fas fa-envelope"></i>info.neonledstore@gmail.com</a>

                    <a class="reset-href" href="https://api.whatsapp.com/send?phone=51994078320" target="_blank">

                        <div class="wspBox d-block d-sm-none rounded-circle p-0 m-0" style="z-index: 2500;">

                            <i class="fab fa-whatsapp fa-3x"></i>

                        </div>

                    </a>

                </div>

                <div class="redesSociales order-2 order-sm-3 col-12 col-sm-3 pt-3">

                    <ul class="lista" style="position: relative;z-index: 2500;">

                        <a class="reset-href" href="https://api.whatsapp.com/send?phone=51994078320" target="_blank">

                            <li class="redSocialWhatsapp d-inline me-1"><i class="fab fa-whatsapp fa-2x"></i></li>

                        </a>

                        <a class="reset-href" href="https://www.facebook.com/Neon-Led-store-100244098454782" target="_blank">

                            <li class="redSocial d-inline me-1"><i class="fab fa-facebook fa-2x"></i></li>

                        </a>

                        <a class="reset-href" href="https://www.instagram.com/neon_led_store/?hl=es" target="_blank">

                            <li class="redSocial d-inline me-1"><i class="fab fa-instagram fa-2x"></i></li>

                        </a>

                        <a class="reset-href" href="https://www.pinterest.com/infoneonledstore/" target="_blank">

                            <li class="redSocial d-inline me-1"><i class="fab fa-pinterest fa-2x"></i></i></li>

                        </a>

                    </ul>

                </div>

            </div>

    </footer>

    <script src="https://kit.fontawesome.com/54e80e802d.js" crossorigin="anonymous"></script>

    <script defer type="text/javascript" src="/build/js/app.js"></script> 

     <script defer src="/src/js/login.js"></script> 

    <script src="build/js/plugins/bootstrap/bootstrap.min.js"></script>

</body>

</html>
