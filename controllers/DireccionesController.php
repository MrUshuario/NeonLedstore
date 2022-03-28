<?php

namespace Controllers;

use Model\Direcciones;
use MVC\Router;

class DireccionesController 
{
    public static function direcciones(Router $router){
        $router->render("dashboard/direcciones",[]);
    }

    public static function listar(Router $router){

        $listado = Direcciones::listar();
       
        $json = json_encode([
            "data" => $listado
        ]);
        echo $json;
    }
}
