<?php 
namespace Controllers;
//llama a conrasena
include 'contra.php';

define('contra', $contrasena);

use Model\Users;
use Model\Cliente;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



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
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Port = 465;
        //$mail->Timeout = 6000;
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  -> solo para ver acciones del ruteo del mail
        $mail->SMTPSecure= PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth=true;
        $mail->Host ='smtp.gmail.com';
        $mail->Username = 'renleds22@gmail.com';
        //temporal llamamos una contraseña para ocultarla
        $mail->Password = contra;

        $mail->setFrom('renleds22@gmail.com','NeonLedStore'); //direccion desde donde se enviará
        $mail->addAddress($data->cli_email); ////direccion de usuario que recibe
        $mail->Subject = "Verificacion de correo";

        //Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet= 'UTF-8';       
        $contenido = '
 
            Gracias por crear tu cuenta!
            Por favor haga click en el siguiente enlace para activar su cuenta mientras su sesion esta abierta:

            localhost:8000/verificado?email='.password_hash($data->cli_email, PASSWORD_DEFAULT).'&verificado='.password_hash($data->cli_verificado, PASSWORD_DEFAULT).'
            
            '; // cambiar localhost:8000 al url del sitio web cuando este sea subido
        
        $mail->Body = $contenido;

        echo json_encode([
            "prueba" => $mail->send(),
            ""=>$mail->ErrorInfo
        ]);
    }
    public static function verificado(){
        
        $data = Cliente::find($_SESSION['id']);
        $email = $_GET["email"];
        $verificado = $_GET["verificado"];
        if(isset($email) && !empty($email) AND isset($verificado) && !empty($verificado)){
            // Verify data
            if(password_hash($data->cli_email, PASSWORD_DEFAULT) == $email AND password_hash($data->cli_verificado, PASSWORD_DEFAULT) == $verificado){
                mysql_query("UPDATE tab_cliente SET cli_verificado = '1' WHERE email='".$data->cli_email."'") or die(mysql_error()); 
                //$match  = mysql_num_rows($search); esto era para contar las filas de resultado de otra sentencia que pensaba usar 
                echo '<section class="bg-black pt-5 pb-5 text-white">

                <div class="container d-flex justify-content-center">
            
                    <div class="text-center mw-60">
                        <h2>Su cuenta ha sido activada!</h2>
                        <div class="d-flex justify-content-center">
                            <h3>Gracias por verificar su cuenta, puede continuar con sus compras :)</h3>
                        </div>
                    </div>
            
                </div>
            
                </section>';
            }else{
                echo 'aqui 1';
            }
            
        }else{
            // Invalid approach
            echo '<section class="bg-black pt-5 pb-5 text-white">

            <div class="container d-flex justify-content-center">
        
                <div class="text-center mw-60">
                    <h2>UPS</h2>
                    <div class="d-flex justify-content-center">
                        <h3>Hubo un error en la validacion</h3>
                    </div>
                </div>
        
            </div>
        
            </section>';
        }
        echo json_encode([
            'data'=>$data->cli_verificado
            
        ]);
        echo $email;
        
        echo "
        ";

        echo password_hash($data->cli_email, PASSWORD_DEFAULT);
        echo $data->cli_email;
    }

}
