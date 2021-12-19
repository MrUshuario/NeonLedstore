<!-- Menu debe tener OVERFLOW (si se pasa más de lo permito de su altura, siga conteniendo más elementos y no afecte el diseño de la pagina
AGREGO EL SCROLL) -->


<?php $currentURL = explode('/', $_SERVER['PHP_SELF']); ?>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="build/img/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" id="nombre"
            aria-haspopup="true" aria-expanded="false" style="color:black">John Doe</div>
            <div class="email" style="color:black" id="email">john.doe@example.com</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color:black">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menú</li>
            <li class="<?= end($currentURL) == 'dashboard' ? 'active' : 'inactive' ?>">
                <a href="/dashboard">
                    <i class="fas fa-house-user iconos" ></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="<?= end($currentURL) == 'users' ? 'active' : 'inactive' ?>">
                <a href="/cliente">
                    <i class="fas fa-portrait iconos" ></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li class="<?= end($currentURL) == 'products' ? 'active' : 'inactive' ?>">
                <a href="/producto">
                    <i class="fas fa-archive iconos"></i>
                    <span>Productos</span>
                </a>
            </li>
            <li class="<?= end($currentURL) == 'products' ? 'active' : 'inactive' ?>">
                <a href="/categoria">
                    <i class="fas fa-th-large iconos"></i>
                    <span>Categoria</span>
                </a>
            </li>
            <li class="<?= end($currentURL) == 'colors' ? 'active' : 'inactive' ?>">
                <a href="/color">
                 <i class="fas fa-tint iconos"></i>
                    <span>Colores</span>
                </a>
            </li>
            <li class="<?= end($currentURL) == 'productoColor' ? 'active' : 'inactive' ?>">
                <a href="/productoColor">
                <i class="fas fa-fill-drip iconos "></i>
                    <span>Producto x Color</span>
                </a>
            </li>
            <li class="<?= end($currentURL) == 'configuracion' ? 'active' : 'inactive' ?>">
                <a style= "text-decoration:none" href="/configuracion ">
                <i class="fas fa-cog iconos "></i>
                    <span>configuracion</span>
                </a>
            </li>

            <li class="<?= end($currentURL) == 'cerrar' ? 'active' : 'inactive' ?>">
                <a style= "text-decoration:none" href="/cerrar">
                <i class="fas fa-times-circle iconos"></i>
                    <span>Cerrar Session</span>
                </a>
            </li>
            
        </ul>
    </div>
</aside>