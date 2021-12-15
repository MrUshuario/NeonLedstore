<?php 


namespace Controllers;

use Model\Color;
use MVC\Router;

class ColorController {
    public static function listarColor(Router $router){

        $listado = Color::listar();
        
        $json = json_encode([
            "data" => $listado
        ]);
        echo $json;
    }

    public static function Color(Router $router){
        
        $router->render("dashboard/color",[]);
    }

    public static function crearColor(Router $router){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $color = new Color($_POST);
            
            $verificarNombre = $color->verificarNombreColor();
            //$json = json_encode($verificarNombre);
            if($verificarNombre->num_rows == 0){
                $resultado = $color->crear();
                if($resultado){
                    $listado = Color::listar();
                    $json = json_encode([
                        "STATUS"=>1,
                        "mensaje"=>"Registro correctamente",
                        "listas"=>$listado,
                        "c"=>$color
                    ]);
                } else {
                    $json = json_encode([
                        "STATUS"=>2,
                        "mensaje"=>"Error al registrar"
                    ]);
                }
            }else {
                $json = json_encode([
                    "STATUS"=>3,
                    "mensaje"=>"Nombre del color ya registrado",
                    "c"=>$color
                ]);
            }
            
            echo $json;
        }
    }

    public static function editColor(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $color = Color::find($_POST['id']);
            $color->sincronizar($_POST);

            $dd = $color->actualizar();

            $json = json_encode($dd);

            echo $json;
        }
        
    }

    public static function buscarNombre(Router $router) {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST['nombre'];
            $listar = Color::listarNombre($nombre);
            $json = json_encode([
                "resp"=>$listar
            ]);

            echo $json;
        }
        
    }

    public static function getColor(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $color = Color::find($id);

            $json = json_encode([
                "data"=>$color
            ]);
             
            echo $json;
        }
    }

    public static function eliminarColor(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $color = Color::find($id);
            $el = $color->eliminar();
            $json = json_encode($el);
        
            echo $json;
        }
    }

    public static function pagination(){
        $color = new Color();
        $get = filter_var($_GET['pag'], FILTER_VALIDATE_INT);

        $pagination = $color->listarLimit(4, $get);
        echo json_encode([
            "pags"=>$pagination['pags'],
            "res"=>$pagination['limit']
        ]);
    }

    
}