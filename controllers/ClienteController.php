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



    public static function create(Router $router){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $cliente = new Cliente($_POST);
            $verificarCorreo = $cliente->verificarCorreo();
            if ($verificarCorreo->num_rows == 0) {
                $resultado = $cliente->crear(); //PROBLEMA, LO CREA PASANDO EL
                
                if($resultado) {
                    $listado = Cliente::listar();
                    $json = json_encode([
                        "STATUS"=>1,
                        "mensaje"=>"Registro Correcto",
                        "listas"=>$listado,
                        "c"=>$cliente
                    ]);
                }  else {
                    $json = json_encode([
                        "STATUS"=>2,
                        "mensaje"=>"Error al registrar"
                    ]);
                }
            }
            //ya existe
            else {
                $json = json_encode ([
                    "STATUS"=>2,
                    "mensaje"=>"Este correo ya existe!!!",
                    "c"=>$cliente
                ]);   
            }
            echo $json;
        }
    }
    
    public static function getCliente(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){ // Hay triple =
            $id = $_POST['id'];
            $cliente = Cliente::find($id);
            $json = json_encode([
                "data"=>$cliente
            ]);
            
            echo $json;
        }
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $cliente = Cliente::find($id);
            $el = $cliente->eliminar();
            $json = json_encode($el);
        
            echo $json;
        }
    }

    public static function update(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cliente = Cliente::find($_POST['id']);
            $cliente->sincronizar($_POST);

            $dd = $cliente->actualizar();

            $json = json_encode($dd);

            echo $json;
        }
        
    }

    public static function estado()
    {
        $cliente = new Cliente();

        if ($_POST['cli_estado'] == "1") {
            $args = [
                "cli_estado" => "0",
                "id" => $_POST['id']
            ];
            $cliente->sincronizar($args);
            $resultado = $cliente->actualizarEstado();
        } else if ($_POST['cat_estado'] == "0") {
            $args = [
                "cat_estado" => "1",
                "id" => $_POST['id']
            ];
            $cliente->sincronizar($args);
            $resultado = $cliente->actualizarEstado();
        }

        echo json_encode([
            "bool" => $resultado,
            "estado" => $args['cat_estado'],
            "id" => $args['id']
        ]);
    }
}