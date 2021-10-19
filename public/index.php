<?php

require_once __DIR__.'/../includes/app.php';

use Controllers\AdminController;
use Controllers\CategoriaController;
use Controllers\ColorController;
use Controllers\ProductoController;
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
    $router->post('/color/eliminar',[ColorController::class,'eliminarColor']);
    $router->post('/color/guardar',[ColorController::class,'crearColor']);
    $router->post('/color/editar',[ColorController::class,'editColor']);
    $router->post('/color/getColor',[ColorController::class,'getColor']);

//Productos
    // method get
    $router->get('/producto',[ProductoController::class,'index']);
    $router->get('/producto/getCategoria',[ProductoController::class,'obtenerCat']);
    $router->get('/producto/getProducto',[ProductoController::class,'getProducto']);

    // method post
    $router->post('/producto/crear',[ProductoController::class,'guardar']);
    $router->post('/producto/actualizar',[ProductoController::class,'actualizar']);

//Categoria
    // method get
    $router->get('/categoria',[CategoriaController::class, 'index']);
    $router->get('/categoria/listar',[CategoriaController::class, 'listados']);

    // method post
    $router->post('/categoria/crear',[CategoriaController::class, 'crear']);
    $router->post('/categoria/estado',[CategoriaController::class,'cambiarEstado']);
    $router->post('/categoria/getCategoria',[CategoriaController::class,'getCategoria']);
    $router->post('/categoria/actualizar',[CategoriaController::class,'actualizar']);
    $router->post('/categoria/eliminar',[CategoriaController::class,'eliminar']);
    $router->post("/categoria/buscar",[CategoriaController::class,'buscarNomCat']);

$router->comprobarRutas();

