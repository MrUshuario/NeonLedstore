<?php 
namespace Controllers;

use Model\Users;
use Model\Cliente;
use MVC\Router;

class AdminController  {


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

    public static function dataConfig(){
        $data = Cliente::find($_SESSION['id']); //cambie user por cliente, lo mismo pero con mas informacion
        echo json_encode([
            'data'=>$data
        ]);
    }

    // verifica 
    public static function verificar(){
        echo  json_encode([
            'res' => Users::verificarKey($_POST['passwordV'],$_POST['id'])
        ]);
    }

    

    // Actualiza la contraseña del administrador
    public static function updatePassword(){
        $id = filter_var($_SESSION['id'], FILTER_VALIDATE_INT);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $passwordHasheado = password_hash($_POST['cli_clave'], PASSWORD_DEFAULT);
            $post = array("cli_clave"=>$passwordHasheado, "id"=>$id);
            
            $user= Users::find($id);
            $user->sincronizar($post);

            $resultado = $user->actualizar();

            echo json_encode(['res'=>$resultado, 
            'user'=>$user, 'cli_clave'=>$passwordHasheado]);

        }
        
    }
    
    // Cerrar session
    public static function cerrar(){
        session_destroy();
        header("location: /");
    }

    public static function grafico(){
        
    }
    public static function correoverificacion(){
        $data = Cliente::find($_SESSION['id']);
        
        $to = $data->cli_email;   
        $subject = 'Signup | Verificacion'; // Give the email a subject 
        $message = '
 
            Thanks for signing up!
            Your account has been created
            Please click this link to activate your account:
            http://www.yourwebsite.com/verify.php?email='.$data->cli_email.'
            
            '; // Our message above including the link
                     
            $headers = 'From:noreply@nls.com' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email

            if(isset($_GET[$data->cli_email]) && !empty($_GET[$data->cli_email])){
                // Verify data
                $search = mysql_query("SELECT email active FROM tab_cliente WHERE email='".$data->cli_email."' AND '".$data->cli_verificado."' ='2'") or die(mysql_error()); 
                $match  = mysql_num_rows($search);
            }else{
                // Invalid approach
            }
            echo json_encode([
                'data'=>$data->cli_email
            ]);
    }

}
