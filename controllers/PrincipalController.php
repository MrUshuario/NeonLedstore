<?php 

namespace Controllers;
//llama contraseña
include 'contra.php';

use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

define('contra', $contrasena);

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

    // ProductoDetallado
    public static function proDetallado (Router $router){
        $router->renderPrincipal("ProductoDetallado",[]);
    }
    // RegistroCliente
    public static function regCliente (Router $router){
        $router->renderPrincipal("RegistroCliente",[]);
    }
    // ADMINISTRAR
    public static function administrar (Router $router){
        $router->renderPrincipal("administrar",[]);
    }

    //carrito de compras
    public static function cart (Router $router){
        $router->renderPrincipal("cart",[]);
    }

    // Logica - Contacto
    public static function contactoEmail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
            $mail->addAddress($_POST['correo']); ////direccion de usuario que recibe
            $mail->Subject = "Nuevo Mensaje de NeonLedStore";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet= 'UTF-8';

            // Definir el contenido
            $contenido = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Gmail</title>
            
            <style type="text/css">
                body {
                    margin: 0;
                    background-color: #cccccc;
                }
                table {
                    border-spacing: 0;
                }
                td {
                    padding: 0;
                }
                img {
                    border: 0;
                }
            
                .wrapper {
                    width: 100%;
                    table-layout: fixed;
                    background-color: #cccccc;
                    padding-bottom: 40px;
                }
            
                .main{
                    background-color: #ffffff;
                    margin: 0 auto;
                    width: 100%;
                    max-width: 600px;
                    border-spacing: 0;
                    font-family: sans-serif;
                    color: #4a4a4a;
            
                }
            
                .button{
                    background-color: #368cee;
                    color: #ffffff;
                    text-decoration: none;
                    padding: 12px 20px;
                    border-radius: 10px;
                }
            
            
                .two-columns{
                    text-align: center;
                    font-size: 0;
                    padding: 20px 0;
                }
            
                .two-columns .column{
                    width: 100%;
                    max-width: 300px;
                    display: inline-block;
                    vertical-align: top;
                }
            
                .two-columns .padding{
                    padding: 5px;
                }
            
                .two-columns .content{
                    text-align: left;
                    font-size: 16px;
                    line-height: 18px;
            
                }
            
                a{
                    text-decoration: none;
                    color: #2164c9;
                }
            
                @media screen and (max-width: 600px) { 
                    .two-columns .content img{
                        width: 300px!important;
                        max-width: 300px!important;
                    }	
            
                    .padding{
                        padding-right: 0!important;
                        padding-left: 0!important;
                    }
                }
            </style>
            </head>
            <body>
            
                <center class="wrapper">
                    <table class="main" width="100%">
            
            <!-- SOCIAL MEDIA ICONS -->
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr>
                                        <td style="background-color: #4980d2; padding: 8px 0 5px; text-align: center;">
                                            <a href="https://www.facebook.com/pages/category/Lighting-Store/Neon-Led-store-100244098454782/"><img src="https://i.postimg.cc/7YXX27qS/logo-facebook.png" width="35px"></a>
                                            <a href="https://twitter.com/neonhouseleds"><img src="https://i.postimg.cc/dVykYPND/logo-twitter.png" width="35px"></a>
                                            <a href="https://www.instagram.com/neon_led_store/?hl=es"><img src="https://i.postimg.cc/FzLGSnsR/logo-instagram.png" width="25px"></a>
                                            <a href="https://www.youtube.com/channel/UCn1kkwB3YeZIuPJnvQcJkiw?view_as=subscriber"><img src="https://i.postimg.cc/nLXdZzbB/logo-youtube.png" width="25px"></a>
                                            <a href="https://neonled-store.com/"><img src="https://i.postimg.cc/vZqPpnjG/logo-linkedin.png" width="25px"></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
            
            <!-- LOGO SECTION -->
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr>
                                        <td style="text-align: center; padding: 3px;">
                                            <a href="https://neonled-store.com/"><img src="https://i.postimg.cc/15SY6sw1/logo.png" alt="Logo" width="100px" title="Logo"></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
            
            <!-- GIF BANNER IMAGE -->
                        <tr>
                            <td>
                                <a href="#"><img src="https://i.postimg.cc/T39ywY9N/FONDOHOGAR.gif" alt="Banner" width="600px" style="max-width: 100%;"></a>
                            </td>
                        </tr>
            
            <!-- TITLE, TEXT & BUTTON -->
                        <tr>
                            <td style="padding-bottom: 30px;">
                                <table width="100%">
                                    <tr>
                                        <td style="text-align: center;">
                                            <p style="font-size: 20px; font-weight: bold;">Hola '.$_POST['nombre'].' '.$_POST['apellidos'].', su consulta será procesada en la brevedad posible. ¡Gracias por contactarnos!</p>
                                            <p style="font-size: 16px; line-height: 23px; padding: 5px 0 15px;">En Neon Led Store te ayudamos a crear una nueva experiencia. Contamos con el toque ideal que necesitas para dejar impresionados a tu familia con una produccion visual espectacular, ingeniosa y de la mejor calidad; Realizamos paneles personalizados y a tu preferencia, descubre los mejores decorativos en luces Led y aprovecha nuestras grandes promociones.</p>
                                            <a href="https://neonled-store.com/" class="button">Visitar sitio web</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
            
            <!-- BLUE BORDER -->
                        <tr>
                            <td height="5" style="background-color: rgb(99, 62, 134);"></td>
                        </tr>
            
            <!-- TWO COLUMN SECTION -->
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr>
                                        <td class="two-columns">
                                            <table class="column">
                                                <tr>
                                                    <td class="padding">
                                                        <table class="content">
                                                            <tr>
                                                                <td>
                                                                    <a href="#"><img src="https://i.postimg.cc/8zrKQ9mC/560x420.webp" alt="" width="270px" style="max-width: 270px;"></a>
                                                                </td>
                                                            </tr>
                                                        </table>
            
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="column">
                                                <tr>
                                                    <td class="padding">
                                                        <table class="content">
                                                            <tr>
                                                                <td>
                                                                    <p style="font-size: 17px; font-weight: bold;"> La mejor iluminación en tu Hogar</p>
                                                                    <p>Actualmente los diseños de Neon Led se han vuelto una tendencia 
                                                                    interesante y diferente para la decoración de tu Hogar, conoce los mejores decorativos en luces Led y aprovecha nuestras grandes 
                                                                    promociones.</p>
                                                                </td>
                                                            </tr>
                                                        </table>
            
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
            
            <!-- BLUE BACKGROUND QUOTE -->
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr>
                                        <td style="text-align: center; background-color: rgb(99, 62, 134); padding: 5px; color: #ffffff; font-size: 15px;">
                                            <p style="font-weight: bold;">Somos fabricantes e importamos articulos neon led, pantallas led y paneles electronicos. Producto hecho en Perú.</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
            
            <!-- FOOTER SECTION -->
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr>
                                        <td style="padding: 5px 10px; text-align:center; font-size: 14px;">
                                            <p>Jr. Paruro 1401 tda 130 CC Shoping Center</p>
                                            <p>Celular: 994078320</p>
                                            <p>EMail: <a href="mailto:info.neonledstore@gmail.com">info.neonledstore@gmail.com</a></p>								
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td height="10px" style="background-color: #4980d2;"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
            
                    </table>
                </center>
            </body>
            </html>';

            $mail->Body = $contenido;

            /*if($mail->send()){
                $mensaje= 'Mensaje enviado Correctamente';
            }else{
                $mensaje = 'El mensaje no se pudo enviar';
            }*/

            echo json_encode([
                "prueba" => $mail->send(),
                ""=>$mail->ErrorInfo
            ]);
        }
    }


/*Correo enviado a la empresa*/

public static function contactoEmail2(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Port = 465;

        $mail->SMTPSecure= PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth=true;
        $mail->Host ='smtp.gmail.com';
        $mail->Username = 'renleds22@gmail.com';
        //temporal llamamos una contraseña para ocultarla
        $mail->Password = contra;

        $mail->setFrom('renleds22@gmail.com','NeonLedStore'); //direccion desde donde se enviará
        $mail->addAddress('info.neonledstore@gmail.com'); ////direccion de usuario que recibe
        $mail->Subject = "Nueva Consulta de Cliente";

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
                <title>Email</title>
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
                        color: #2154B0;
                    }
            
                    .img__sent {
                        display: block;
                        margin: auto;
                        width: 300px;
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
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Neon Led Store</h1>
                    <img class="img__sent" src="https://i.ibb.co/4mts7RJ/imgcorreo.webp" alt="">
                    <p class="text">Un nuevo cliente se ha contactado:</p>
                    <div class="texts">
                        <p><b>Nombres:</b> '.$_POST['vis_nombre'].'</p>
                        <p><b>Apellidos:</b> '.$_POST['vis_apellidos'].'</p>
                        <p><b>Correo:</b> '.$_POST['vis_email'].'</p>
                        <p><b>Teléfono:</b> '.$_POST['vis_telefono'].'</p>     
                        <p><b>Mensaje-Pregunta:</b> '.$_POST['vis_pregunta'].'</p>
                    </div>
                    <div class="pie">
                        <img class="" src="https://i.ibb.co/Y2c32Qw/Neon-House-Logo.png" alt="">
                    </div>
                </div>
            </body>
            </html>';

        $mail->Body = $contenido;

        echo json_encode([
            "prueba" => $mail->send(),
            ""=>$mail->ErrorInfo
        ]);
    }
}


 
    
}