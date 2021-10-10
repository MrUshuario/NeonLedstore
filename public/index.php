<?php

require_once __DIR__.'/../includes/app.php';

use Controllers\AdminController;
use Controllers\ColorController;
use MVC\Router;

$router = new Router();

//Zona Publica 
$router->get('/login',[AdminController::class,'index']);
$router->get('/dashboard',[AdminController::class,'dashboard']);

// Zona Privada
$router->post('/login/verificar',[AdminController::class,'index1']);

//Color
    // method get
    $router->get('/color',[ColorController::class,'Color']);
    $router->get('/color/listar',[ColorController::class,'listarColor']);

    // method post
    $router->post('/color/buscar',[ColorController::class,'buscarNombre']);
    $router->post('/color/getColor',[ColorController::class,'getColor']);
    $router->post('/color/eliminar',[ColorController::class,'eliminarColor']);
    $router->post('/color/guardar',[ColorController::class,'crearColor']);
    $router->post('/color/editar',[ColorController::class,'editColor']);

$router->comprobarRutas();

