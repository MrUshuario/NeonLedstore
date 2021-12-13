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

    <script src="build/js/script.js"></script>

    <!-- FontAwesome -->
    <!-- <script src="build/css/fontawesome/js/all.min.js"></script> -->

    <!-- Bootstrap 5 JS -->
    <script src="build/js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>