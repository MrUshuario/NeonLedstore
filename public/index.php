<?php

require_once __DIR__.'/../include/app.php';

use Controllers\AdminController;
use Controllers\CategoriaController;

use Controllers\CompraDetalleController;
use Controllers\ProductoController;
use Controllers\ClienteController;
use Controllers\PrincipalController;

use Controllers\GraficosController;
use Controllers\ConfiguracionController;
use Controllers\CompraController;
use Controllers\VisitanteController;
use MVC\Router;

$router = new Router();

//Zona Publica 
    $router->get('/login',[AdminController::class,'index']);
    $router->get('/dashboard',[AdminController::class,'dashboard']);

// Zona Privada
    $router->post('/login/verificar',[AdminController::class,'index1']);
   
//Productos
    // method get
    $router->get('/producto',[ProductoController::class,'index']);
    $router->get('/producto/getCategoria',[ProductoController::class,'obtenerCat']);
    $router->get('/producto/getProducto',[ProductoController::class,'getProducto']);
    $router->get('/producto/listar',[ProductoController::class,"listarP"]);

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
    $router->post('/categoria/crear',[CategoriaController::class, 'create']);
    $router->post('/categoria/estado',[CategoriaController::class,'cambiarEstado']);
    $router->post('/categoria/getCategoria',[CategoriaController::class,'getCategoria']);
    $router->post('/categoria/actualizar',[CategoriaController::class,'actualizar']);
    $router->post('/categoria/eliminar',[CategoriaController::class,'eliminar']);
  

//Cliente

    //RUTAS AUN NO PROTEGIDAS
    //method get 
    $router->get('/cliente',[ClienteController::class,'index']);
    $router->get('/cliente/listar',[ClienteController::class,'listar']); 
     //aun no implementado

    //method post
    $router->post('/cliente/getCliente',[ClienteController::class,'getCliente']);
    $router->post('/cliente/create',[ClienteController::class,'create']);
    $router->post('/cliente/estado',[ClienteController::class,'estado']); 
    $router->post('/cliente/update',[ClienteController::class,'update']); 
    $router->post('/cliente/delete',[ClienteController::class,'delete']);

//Visitantes

    //RUTAS AUN NO PROTEGIDAS
    //method get 
    $router->get('/visitante',[VisitanteController::class,'index']);
    $router->get('/visitante/listar',[VisitanteController::class,'listar']); 

     //aun no implementado

    //method post
    $router->post('/visitante/getVisitante',[VisitanteController::class,'getVisitante']);
    $router->post('/visitante/create',[VisitanteController::class,'create']);
    $router->post('/visitante/estado',[VisitanteController::class,'estado']); 
    $router->post('/visitante/update',[VisitanteController::class,'update']); 
    $router->post('/visitante/delete',[VisitanteController::class,'delete']);
    $router->post('/visitante/create2',[VisitanteController::class,'create2']); //no estar rutasprotegidas

    
//CompraDetalle

    //method get 
    $router->get('/compraDetalle',[CompraDetalleController::class,'CompraDetalle']);
    $router->get('/compraDetalle/listar',[CompraDetalleController::class,'listar']);
     //aun no implementado

    //method post
    $router->post('/compraDetalle/create',[CompraDetalleController::class,'create']);

//Compra

    //method get 
    $router->get('/compra',[CompraController::class,'Compra']);
    $router->get('/compra/listar',[CompraController::class,'listar']);
    //POST
    $router->post('/compra/conseguirproductos',[CompraController::class,'conseguirproductos']);
     //aun no implementado

    //method post
    $router->post('/compra/create',[CompraController::class,'create']);


// BotonConfiguracion
    // method get
    $router->get("/configuracion", [AdminController::class,'indexConfig']);
    $router->get("/configuracion/getData", [AdminController::class,'dataConfig']);
    
    // method post
    $router->post("/configuracion/verificar", [AdminController::class,'verificar']);
    $router->post("/configuracion/updatePassword", [AdminController::class,'updatePassword']);
    
// Cerrar Session - DASHBOARD
    //method get
    $router->get("/cerrar", [AdminController::class, 'cerrar']);

//graficos
    $router->get('/graficos',[GraficosController::class,'index']);


// Principal
        //METHOD GET
        $router->get("/", [PrincipalController::class,'index']);
        $router->get("/nosotros",[PrincipalController::class,'nosotros']);
        $router->get("/productos",[PrincipalController::class,'productos']);
        $router->get("/contacto",[PrincipalController::class,"contacto"]);
        $router->get("/servicios",[PrincipalController::class,"servicios"]);

        //formularios
        $router->get("/usuarioLogeo",[PrincipalController::class,"usuarioLogeo"]);
        $router->get("/usuarioRegistro",[PrincipalController::class,"usuarioRegistro"]);

       //METHOD POST
        $router->post("/contacto/enviar",[PrincipalController::class,"contactoEmail"]);
        //$router->post("/landingpage/enviar",[PrincipalController::class,"contactolandingEmail"]);

        //Landig Page
        $router->get("/landingPageNegocio", [PrincipalController::class, 'landingNegocio']);
        $router->get("/landingPageEvento", [PrincipalController::class, 'landingEvento']);
        $router->get("/landingPageHogar", [PrincipalController::class, 'landingHogar']);




    $router->comprobarRutas();