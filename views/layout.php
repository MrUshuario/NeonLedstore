<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="shortcut icon" href="build/img/login/logo.webp" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- ICONOS FONT AWESOME -->
    <script src="https://kit.fontawesome.com/f788fcfb82.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="build/css/tablasCRUD.css">


    <link rel="stylesheet" href="build/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="build/css/plugins/bootstrap/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="build/css/style.css">
    <link rel="stylesheet" href="build/css/neon.css">
    <link rel="stylesheet" href="build/css/themes/all-themes.css">
    <link rel="stylesheet" href="build/css/estilos.css">
    <script src="build/js/sweetalert.min.js"></script>

    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/plugins/DataTable/jquery.dataTables.min.js"></script>
    <script src="build/js/plugins/DataTable/dataTables.bootstrap.min.js"></script>
    <script src="build/js/chart.min.js"></script>
</head>

<body>

    <div class="body-dashboard">
        <div class="nav-dashboard">
            <div class="logo-dashboard">
                <!-- <img src="img/logo.webp"> -->
                <h3>Neon Led Store</h3>
                <i class="fas fa-bullseye"></i>
            </div>
            <button class="btn-dashboard" id="btn-list">
                <span>
                    <i class="fas fa-home"></i> Dashboard
                </span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="nav-dashboard-element">
                <ul class="list-nav height-0">
                    <li>
                        <i class="far fa-circle"></i> Analytics
                    </li>
                    <li>
                        <i class="far fa-circle"></i> eCommerce
                    </li>
                </ul>
            </div>

            <div class="app-dashboard">
                <span class="app-title">Apps</span>
                <ul class="app-list">
                    <li><a href="/color"><i class="far fa-envelope"></i> Color</a></li>
                    <li><i class="far fa-comment-dots"></i> Chat</li>
                    <li><i class="far fa-check-square"></i> Todo</li>
                    <li><i class="far fa-calendar"></i> Calendar</li>
                    <li class="hover-caja">
                        <div class="flex-between" id="btnApp-1">
                            <span>
                                <i class="fas fa-cash-register"></i> eCommerce
                            </span>

                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <ul class="list-nav1  height-0">
                            <li>Hola</li>
                            <li>mundo</li>
                            <li>Chanchito</li>
                            <li>Feliz</li>
                        </ul>
                    </li>
                    <li class="hover-caja">
                        <div class="flex-between" id="btnApp-2">
                            <span>
                                <i class="far fa-user"></i> User
                            </span>
                            <i class="fas fa-chevron-right"></i>
                        </div>

                        <ul class="list-nav2  height-0">
                            <li>Hola</li>
                            <li>mundo</li>
                            <li>Chanchito</li>
                            <li>Feliz</li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <div class="content-dashboard overflow-scroll position-relative">
            <div class="container flex-between nav-content ">
                <nav class="nav-content-dashboard">
                    <a href="#">
                        <i class="fas fa-clipboard-check"></i>
                    </a>
                    <a href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <a href="#">
                        <i class="far fa-calendar"></i>
                    </a>
                </nav>
                <div class="user-content">
                    <div class="role-name">
                        <span class="bold">John Doe</span>
                        <span>Admin</span>
                    </div>
                    <img src="build/img/login/logo.webp" alt="">
                </div>
            </div>

            <?php echo $contenido; ?>

        </div>
    </div>

    <script src="build/js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="build/js/script.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="build/js/plugins/bootstrap-select/bootstrap-select.js"></script> -->
    <!-- <script src="build/js/plugins/jquery-datatable/jquery.dataTables.js"></script> -->
    <!-- <script src="build/js/plugins/jquery-datatable/skin/bootstrap/dataTables.bootstrap.js"></script> -->
</body>

</html>