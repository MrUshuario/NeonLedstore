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
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  -> solo para ver acciones del ruteo del mail
            $mail->SMTPSecure= PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth=true;
            $mail->Host ='smtp.gmail.com';
            $mail->Username = 'renzolco26@gmail.com';
            $mail->Password = 'contrasenia';

            $mail->setFrom('neonledstore@gmail.com','NeonLedStore.com'); //direccion desde donde se enviará
            $mail->addAddress('renzolco26@gmail.com'); ////direccion del que recibe
            $mail->Subject = "Nuevo Mensaje de NeonLedStore";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet= 'UTF-8';

            // Definir el contenido
            $contenido = '<!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="utf-8">
                <title>holi</title>
            </head>
            <body style="background-color: rgb(236, 236, 236) ">
            
            
            <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                <tr>
                    <td style="background-color: #000000; text-align: left; padding: 0">
                        <a href="https://www.facebook.com/pages/category/Lighting-Store/Neon-Led-store-100244098454782/">
                            <img width="10%" style="display:block; margin: 1.5% 3%" src="https://i.postimg.cc/kG0WbPds/logo.webp">
                        </a>
                    </td>
                </tr>
            
                <tr>
                    <td style="padding: 0">
                        <img style="padding: 0; display: block" src="https://i.postimg.cc/85Cd8bHR/corona-Led.webp" width="100%">
                    </td>
                </tr>
                
                <tr>
                    <td style="background-color: #ecf0f1">
                        <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                            <h2 style="color: #e67e22; margin: 0 0 7px">Hola Estimado Cliente!</h2>
                            <p style="margin: 2px; font-size: 15px">
                            Somos una empresa que realizamos pedidos a diseño para que decores tu ambiente con las luces 
                            LED que más te gusten. Seguimo las ultimas tendencias para darte tu estilo a tu hogar y la imagen 
                            que quieres trnasmitir a tu negocio asi como ofrecemos una opcion de regalo original para familia, 
                            pareja y amigos:</p>
                            <ul style="font-size: 15px;  margin: 10px 0">
                                <li>Objetos Decorativos</li>
                                <li>Textos Luminososo</li>
                                <li>Personajes Ilustrativos</li>
                            </ul>
                            <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                                <img style="padding: 0; width: 120px; height: 120px; margin: 5px" src="https://i.postimg.cc/fkQ0b7xg/gatoled.webp">
                                <img style="padding: 0; width: 120px; height: 120px; margin: 5px" src="https://i.postimg.cc/HxZG0H3Q/karaoke-Led.webp">
                                <img style="padding: 0; width: 120px; height: 120px; margin: 5px" src="https://i.postimg.cc/W1RBw5mf/pokemon-Led.webp">
                            </div>
                            <div style="width: 100%; text-align: center">
                                <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="https://www.neonhouseled.com/">Visitar la página</a>	
                            </div>
                            <p style="color: #999797; font-size: 12px; text-align: center;margin: 30px 0 0">&#169; 2022 Neon House Led</p>
                        </div>
                    </td>
                </tr>
            </table>
            
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
            $mail->Host ='smtp.gmail.com';
            $mail->Username = 'renzolco26@gmail.com';
            $mail->Password = 'contrasenia';

            $mail->setFrom('neonledstore@gmail.com','NeonLedStore.com');
            $mail->addAddress('renzolco26@gmail.com'); 
            $mail->Subject = "Nuevo Mensaje de NeonLedStore";

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