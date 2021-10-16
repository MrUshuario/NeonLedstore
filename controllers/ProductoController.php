<?php 

namespace Controllers;

use MVC\Router;

class ProductoController {
    public static function index(Router $router){
        $router->render('dashboard/producto',[]);
    }

    public static function guardar(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            echo json_encode($_POST);
        }
    }
}