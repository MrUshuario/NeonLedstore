<?php 
namespace Controllers;

use Model\Users;
use MVC\Router;

class AdminController  {

    public static function index(Router $router) {
        $router->renderLogin("dashboard/login",[]);
    }

    public static function index1(Router $router) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            // Instaciar la clase
            $login = new Users($_POST);
            $userExist = $login->login();

            // Condicional para saber si existe o no el usuario
            if($userExist->num_rows != 0) {
                // Saber si el usuario ingreso correctamente su contraseña
                $passAuth = $login->passwordAuth($userExist);

                // depende del resultado del metodo se dara esta condicional
                // el metodo retorna un booleano
                if($passAuth){
                    $resultado = "Bienvenido a Neon House Led";

                    $json = json_encode([
                        "mensaje"=>$resultado,
                        "STATUS"=> 1
                    ]);
                }else {
                    $resultado = "Password ingresado incorrectamente";

                    $json = json_encode([
                        "mensaje"=>$resultado,
                        "STATUS"=> 2
                    ]);
                }
            } else {
                $resultado = "No existe el Usuario";

                $json = json_encode([
                    "mensaje"=>$resultado,
                    "STATUS"=> 2
                ]);
            }
        }
        $router->renderAjax("verificar",[
            "json"=>$json
        ]);
    }

    public static function dashboard(Router $router){
        session_start();
        $id = $_SESSION['id'];
        $router->render("dashboard/index",["id"=>$id]);
    }
}
