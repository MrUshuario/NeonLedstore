<?php

namespace Controllers;

use Model\Cliente;
use MVC\Router;

class ClienteController {

    public static function index (Router $router){


        $router->render("dashboard/cliente",[]);
    }

    public static function listar(Router $router){

        $listado = Cliente::listar();
        
        $json = json_encode([
            "data" => $listado
        ]);
        echo $json;
    }

    /*public static function crearCliente(Router $router){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $cliente = new Cliente($_POST);
            $verificarCorreo = $cliente->verificarCorreo();
            if ($verificarCorreo->num_rows == 0) {

            }
            //ya existe
            else {
                $json = json_encode ([
                    "STATUS"=>3,
                    "mensaje"=>"Correo ya registrado",
                    "c"=>$cliente
                ]);   
            }
            echo $json;
        }
    } */

}