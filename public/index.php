<?php

require_once __DIR__.'/../includes/app.php';

use Controllers\AdminController;
use MVC\Router;

$router = new Router();

//Zona Publica 
$router->get('/login',[AdminController::class,'index']);
$router->get('/dashboard',[AdminController::class,'dashboard']);

// Zona Privada
$router->post('/login/verificar',[AdminController::class,'index1']);

$router->comprobarRutas();

