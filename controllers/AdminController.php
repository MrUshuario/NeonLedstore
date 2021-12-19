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
        echo $json;
    }

    public static function dashboard(Router $router){
        $id = $_SESSION['id'];
        $router->render("dashboard/index",["id"=>$id]);
    }

    public static function indexConfig(Router $router){
        $router->render("dashboard/configuracion",[]);
    }

    public static function dataConfig(){
        $data = Users::find($_SESSION['id']);
        echo json_encode([
            'data'=>$data
        ]);
    }

    // verifica 
    public static function verificar(){
        echo  json_encode([
            'res' => Users::verificarKey($_POST['passwordV'])
        ]);
    }

    // Actualiza la contraseña del administrador
    public static function updatePassword(){
        $id = filter_var($_SESSION['id'], FILTER_VALIDATE_INT);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $passwordHasheado = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $post = array("pass"=>$passwordHasheado, "id"=>$id);
            
            $user= Users::find($id);
            $user->sincronizar($post);

            $resultado = $user->actualizar();

            echo json_encode(['res'=>$resultado]);
        }
        
    }
    
    // Cerrar session
    public static function cerrar(){
        session_destroy();
        header("location: /login");
    }

    public static function grafico(){
        
    }

}
