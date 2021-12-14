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
    <link rel="stylesheet" href="build/css/bootstrap/bootstrap.min.js">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="build/css/normalize/normalize.css">

    <link rel="stylesheet" href="build/css/index.css">
    <script src="build/js/jquery.min.js"></script>

    <!--PRUEBAS CONTACTO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="build/css/principal/navs.css">
</head>

<body>
    <header class="bg-black">
        <div class="nav w-100">
            <div class="header-flex">
                <div class="logo">
                    <img src="build/img/logo.webp" alt="">
                    <i class="fas fa-bars" id="ham"></i>
                </div>
                <nav class="nav-enlace">
                    <a href="#">Home</a><span class="barra"></span>
                    <a href="#">Productos</a><span class="barra"></span>
                    <a href="#">Servicios</a><span class="barra"></span>
                    <a href="#">Nosotros</a><span class="barra"></span>
                    <a href="#">Contacto</a><span class="barra"></span>
                    <a href="#">Blog</a>
                </nav>
            </div>
            <div class="opcion">
                <i class="fas fa-user-circle"></i>
                <i class="fas fa-cart-plus"></i>
            </div>
        </div>
    </header>

    <?php echo $contenido ?>

    <footer class="bg-black border-top-white">
        <div class="footer contenedor">
            <div class="descripcion">
                <span>Tu diseño, tu espacio</span>
                <p>
                    Somos fabricante e importamos articulo neon led, pantalla led y paneles electronicos. Producto hecho en Perú
                </p>
            </div>
            <div class="info">
                <div class="ubicacion">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Jr. Paruro 1401 tda 130 CC Shoping Center Paruro, Cercado de Lima</span>
                </div>
                <div class="telefono">
                    <i class="fas fa-mobile-alt"></i>
                    <span>994 078 320</span>
                </div>
                <div class="email">
                    <i class="far fa-envelope"></i>
                    <span>info.neonleadstore@gmail.com</span>
                </div>
            </div>
            <div class="redes">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest"></i>
            </div>
        </div>
    </footer>

    <script src="build/js/script.js"></script>

    <!-- FontAwesome -->
    <!-- <script src="build/css/fontawesome/js/all.min.js"></script> -->

    <!-- Bootstrap 5 JS -->
    <script src="build/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>