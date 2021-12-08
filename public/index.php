<?php

require_once __DIR__.'/../includes/app.php';

use Controllers\AdminController;
use Controllers\CategoriaController;
use Controllers\ColorController;
use Controllers\ProductoController;
use Controllers\ClienteController;
use Controllers\PrincipalController;
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
    $router->post('/color/eliminar',[ColorController::class,'eliminarColor']);
    $router->post('/color/guardar',[ColorController::class,'crearColor']);
    $router->post('/color/editar',[ColorController::class,'editColor']);
    $router->post('/color/getColor',[ColorController::class,'getColor']);

//Productos
    // method get
    $router->get('/producto',[ProductoController::class,'index']);
    $router->get('/producto/getCategoria',[ProductoController::class,'obtenerCat']);
    $router->get('/producto/getProducto',[ProductoController::class,'getProducto']);
    $router->get('/producto/prueba',[ProductoController::class,"listarP"]);

    // method post
    $router->post('/producto/crear',[ProductoController::class,'guardar']);
    $router->post('/producto/editar',[ProductoController::class,'actualizar']);
    $router->post('/producto/getProForm',[ProductoController::class,'getProductoId']);
    $router->post('/producto/estado',[ProductoController::class,"estado"]);
    $router->post("/producto/eliminar",[ProductoController::class,"eliminar"]);
    
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
  
//Cliente
    //method get
    $router->get('/cliente',[ClienteController::class,'index']);

// Principal
    // Principal
        //METHOD GET
        $router->get("/", [PrincipalController::class,'index']);
        $router->get("/nosotros",[PrincipalController::class,'nosotros']);
        $router->get("/productos",[PrincipalController::class,'productos']);-
        $router->get("/contacto",[PrincipalController::class,"contacto"]);
        $router->get("/servicios",[PrincipalController::class,"servicios"]);

       //METHOD POST
        $router->post("/contacto/enviar",[PrincipalController::class,"contactoEmail"]);
        $router->post("/landingpage/enviar",[PrincipalController::class,"contactolandingEmail"]);
    // //Landig Page
    $router->get("/landingpage", [PrincipalController::class, 'landig']);


    $router->comprobarRutas();