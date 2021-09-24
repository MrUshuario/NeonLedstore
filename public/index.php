<?php

require_once __DIR__.'/../includes/app.php';

use Controllers\AdminController;
use MVC\Router;

$router = new Router();

//Zona Publica 
$router->get('/login',[AdminController::class,'index']);

$router->comprobarRutas();