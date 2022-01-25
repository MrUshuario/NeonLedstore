<?php 

namespace Controllers;

use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class PrincipalController {
    public static function index(Router $router){
        $router->renderPrincipal('index',[]);
    }

    public static function landingNegocio(Router $router){
        $router->renderPrincipal('landingPageNegocio',[]);
    }

    public static function landingEvento(Router $router){
        $router->renderPrincipal('landingPageEvento',[]);
    }

    public static function landingHogar(Router $router){
        $router->renderPrincipal('landingPageHogar',[]);
    }

    public static function nosotros(Router $router){
        $router->renderPrincipal('nosotros',[]);
    }

    public static function productos(Router $router){
        $router->renderPrincipal('productos',[]);
    }

    public static function contacto(Router $router){
        $router->renderPrincipal("contacto",[]);
    }

    public static function servicios(Router $router){
        $router->renderPrincipal("servicio",[]);
    }

    //formulario registro cliente
    public static function usuarioLogeo(Router $router){
        $router->renderPrincipal("usuarioLogeo",[]);
    }

    public static function usuarioRegistro(Router $router){
        $router->renderPrincipal("usuarioRegistro",[]);
    }

    // Logica - Contacto
    public static function contactoEmail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Port = 465;
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->SMTPSecure= PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth=true;
            $mail->Host='smtp.gmail.com';
            $mail->Username = 'israeldavi0904@gmail.com';
            $mail->Password = 'atmzeesqgcyhtzsl';

            $mail->setFrom('neonledstore@gmail.com','LedStore.com');
            $mail->addAddress('israeldavi0904@gmail.com');
            $mail->Subject = "Tienes un nuevo mensaje";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet= 'UTF-8';

            // Definir el contenido
            $contenido = '
            <!DOCTYPE html>
            <html lang="es_ES">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <style>
                    * {
                        margin: 0;
                        box-sizing: border-box;
                        font-family: Calibri, sans-serif;
                    }
            
                    .container {
                        width: 80%;
                        height: 100vh;
                        margin: 0 auto;
                    }
            
                    h1 {
                        text-transform: uppercase;
                        font-size: 3.3rem;
                        text-align: center;
                        font-weight: bold;
                    }
            
                    .img__sent {
                        display: block;
                        margin: auto;
                        width: 200px;
                    }
            
                    .text {
                        text-align: center;
                        font-size: 1.5rem;
                        font-weight: 400;
                        margin-bottom: 5px;
                    }
            
                    .texts {
                        width: 60%;
                        margin: 0 auto;
                        font-size: 1.1rem;
                        border: 3px double lightslategray;
                        padding: 3px 7px;
                    }
            
                    .pie {
                        border: 4px solid lightskyblue;
                        width: max-content;
                        padding: 0.7rem;
                        margin-top: 1.8rem;
                    }
            
                    .pie img {
                        display: block;
                        margin: auto;
                    }

                    .logo {
                    position: 
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Neon Led Store</h1>
                    <img class="img__sent" src="https://i.ibb.co/zXP3BkD/sent.png" alt="">
                    <p class="text">Un nuevo usuario quiere contactarse:</p>
                    <div class="texts">
                        <p><b>Nombres:</b> nombre</p>
                        <p><b>Teléfono:</b> telefono</p>
                        <p><b>Correo:</b> correo</p>
                        <p><b>Interesado en:</b> Interes</p>
                        <p><b>Mensaje:</b> pregunta</p>
                    </div>
                    <div class="pie">
                        <img class="" src="https://i.ibb.co/Wf5jqrL/logo.webp" alt="">
                    </div>
                </div>
            </body>
            </html>
            ';

            $mail->Body = $contenido;

            if($mail->send()){
                $mensaje= 'Mensaje enviado Correctamente';
            }else{
                $mensaje = 'El mensaje no se pudo enviar';
            }

            echo json_encode([
                "prueba" => $mail->send(),
                ""=>$mail->ErrorInfo
            ]);
        }
    }
    
    public static function contactolandingEmail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Port = 465;
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  -> solo para ver acciones del ruteo del mail
            $mail->SMTPSecure= PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth=true;
            $mail->Host='smtp.gmail.com';
            $mail->Username = 'renzolco26@gmail.com';
            $mail->Password = 'Renzo13578';

            $mail->setFrom('neonledstore@gmail.com','NeonLedStore.com');//direccion desde donde se enviará
            $mail->addAddress('renzolco26@gmail.com'); ////direccion del que recibe
            $mail->Subject = "Tienes un nuevo mensaje";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet= 'UTF-8';

            // Definir el contenido
            $contenido = '<!DOCTYPE html>
            <html lang="es_ES">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <style>
                    * {
                        margin: 0;
                        box-sizing: border-box;
                        font-family: Calibri, sans-serif;
                    }
            
                    .container {
                        width: 80%;
                        height: 100vh;
                        margin: 0 auto;
                    }
            
                    h1 {
                        text-transform: uppercase;
                        font-size: 3.3rem;
                        text-align: center;
                        font-weight: bold;
                    }
            
                    .img__sent {
                        display: block;
                        margin: auto;
                        width: 200px;
                    }
            
                    .text {
                        text-align: center;
                        font-size: 1.5rem;
                        font-weight: 400;
                        margin-bottom: 5px;
                    }
            
                    .texts {
                        width: 60%;
                        margin: 0 auto;
                        font-size: 1.1rem;
                        border: 3px double lightslategray;
                        padding: 3px 7px;
                    }
            
                    .pie {
                        border: 4px solid lightskyblue;
                        width: max-content;
                        padding: 0.7rem;
                        margin-top: 1.8rem;
                    }
            
                    .pie img {
                        display: block;
                        margin: auto;
                    }

                    .logo {
                    position: 
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Neon Led Store</h1>
                    <img class="img__sent" src="https://i.ibb.co/zXP3BkD/sent.png" alt="">
                    <p class="text">Un nuevo usuario quiere contactarse:</p>
                    <div class="texts">
                        <p><b>Nombres:</b> '.$_POST["nombre"].'</p>
                        <p><b>Teléfono:</b> '.$_POST["telefono"].'</p>
                        <p><b>Correo:</b> '.$_POST["correo"].'</p>
                        <p><b>Mensaje:</b> '.$_POST["pregunta"].'</p>
                    </div>
                    <div class="pie">
                        <img class="" src="https://i.ibb.co/Wf5jqrL/logo.webp" alt="">
                    </div>
                </div>
            </body>
            </html>';

            $mail->Body = $contenido;

            if($mail->send()){
                $mensaje= 'Mensaje enviado Correctamente';
            }else{
                $mensaje = 'El mensaje no se pudo enviar';
            }

            echo json_encode([
                "prueba" => $mail->send(),
                ""=>$mail->ErrorInfo,
                "post"=>$_POST
            ]);
        }
    }
    
}
