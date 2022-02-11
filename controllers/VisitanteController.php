<?php

namespace Controllers;

use Model\Visitante;
use MVC\Router;

class VisitanteController {

    public static function index (Router $router){


        $router->render("dashboard/visitante",[]);
    }

    public static function listar(Router $router){

        $listado = Visitante::listar();
       
        $json = json_encode([
            "data" => $listado
        ]);
        echo $json;
    }



    public static function create(Router $router){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $visitante = new Visitante($_POST);
            $verificarCorreo = $visitante->verificarCorreo();
            if ($verificarCorreo->num_rows == 0) {
                $resultado = $visitante->crear(); 
                
                if($resultado) {
                    $listado = Visitante::listar();
                    $json = json_encode([
                        "STATUS"=>1,
                        "mensaje"=>"Registro Agregado",
                        "listas"=>$listado,
                        "c"=>$visitante
                    ]);
                }  else {
                    $json = json_encode([
                        "STATUS"=>2,
                        "mensaje"=>"Error al registrar"
                    ]);
                } // habria un tercer caso con no se puede borrar padres
            }
            //ya existe
            else {
                $json = json_encode ([
                    "STATUS"=>2,
                    "mensaje"=>"Este correo ya existe!!!",
                    "c"=>$visitante
                ]);   
            }
            echo $json;
        }
    }
    
    public static function getVisitante(Router $router){ //cliente<>visitante
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            $id = $_POST['id'];
            $id = intval($id);
            $visitante = Visitante::find($id);
            $json = json_encode([
                "data"=>$visitante
            ]);
            echo $json;
        }
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $visitante = Visitante::find($id);
            $el = $visitante->eliminar();
            $json = json_encode($el);
        
            echo $json;
        }
    }

    public static function update(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $visitante = Visitante::find($_POST['id']);
            $visitante->sincronizar($_POST);

            $dd = $visitante->actualizar();

            $json = json_encode($dd);

            echo $json;
        }
        
    }

  /* public static function estado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cliente = new Cliente($_POST);        

        if ($cliente->cli_estado == "1") {

            $cliente->cli_estado = "0";
            $resultado = $cliente->editEstado();

        } else {
            $cliente->cli_estado = "1";
            $resultado = $cliente->editEstado();
        }
        //ESTO SIRVE NO ES UN SOLO IMPRIMIR
        echo json_encode([
            "cli_estado" => $cliente->cli_estado,
            "resultado" => $resultado
        ]);

        }
    } */
}

