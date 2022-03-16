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




    // Logica - Contáctanos
    public static function contactoEmail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if ($_REQUEST['consulta'] == "formHogar"){

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
                                    <td style="padding: 5px 10px; text-align:center;">                          
                                        <p style="font-size: 16px;">Jr. Paruro 1401 tda 130 CC Shoping Center, Cercado de Lima.</p>
                                        <p style="font-size: 16px;"> Celular: 994078320</p>
                                        <p style="font-size: 16px;">Email: <a href="mailto:info.neonledstore@gmail.com" style="color: #2e54fa">info.neonledstore@gmail.com</a></p>
                                        <p style="color: #d063eb; font-size: 15px; text-align: center;margin: 20px 0px" id="brand">&#169; 2022 Neon House Led</p>								
                                    </td>                       
                                </tr>
                                <tr>
                                    <td height="14px" style="background-color: #4980d2;"></td>
                                </tr>
                                </table>
                            </td>
                        </tr>           
                    </table>
                </center>
            </body>
            </html>';

            $mail->Body = $contenido;

            echo json_encode([
                "prueba" => $mail->send(),
                ""=>$mail->ErrorInfo
            ]);
        }
                
            } else if($_REQUEST['consulta'] == "formEvento"){

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
                $contenido = '<!DOCTYPE html>
                <html lang="es">
                <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Correo Evento</title>
                
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
                
                
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <link rel="stylesheet" href="style.css">
                
                <style type="text/css">
                
                    body{
                        margin: 0;
                        padding: 0;
                        font-family: Roboto Condensed;
                    }
                
                    .panel-externo{
                        width: 60%;
                        padding: 0% 7%;
                        background-color:rgba(0, 0, 0, 0.059);
                    }
                
                    .container{
                        display: flex;
                        justify-content: center;
                    }
                
                    .panel-interno{
                        background-color: rgba(255, 255, 255, 0.55);
                        box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.34);
                    }
                
                    p{
                        font-size: 20px;
                    }
                
                    a{
                        text-decoration: none;
                    }
                
                    h5{
                        font-weight: 700;
                    }
                
                    h3{
                        font-weight: 300;
                    }
                
                    .button{
                        background-color: #368cee;
                        color: #ffffff;
                        text-decoration: none;
                        padding: 10px 10px;
                        border-radius: 10px;
                    }
                
                    .circle{
                        width: 40px;
                        height: 40px;
                        border-radius: 100px;
                        margin:auto;
                        border: 1px solid rgba(0, 0, 0, 0.55);
                        text-align: center;
                        padding-top: 10px;
                    }
                
                    @media only screen and (max-device-width: 425px){
                        .panel-externo{
                            width: 100%;
                            padding: 0% 3%;
                        }
                
                        .title-text{
                            padding-top: 10%;
                        }
                
                        .circle{
                            border: 0px;
                        }
                        
                    }
                
                </style>
                
                </head>
                <body>
                    <div class="container">
                        <div class="panel-externo text-center rounded">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        
                            <div class="panel-interno rounded">
                                <div class="row">
                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: center; padding: 10px;">
                                                <a href="https://neonled-store.com/"><img src="img/logo.webp" alt="Logo" width="70px" title="Logo"></a>
                                            </td>
                                        </tr>
                                    </table>
                
                                    <div class="col-md-12">
                                        <h3 class="mt-3">¡Dale Iluminación a tus Eventos!</h3>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <img src="img/fondo2.webp" alt="image2" style="width: 100%; height: 90%;">
                                    </div>
                
                                    <div class="col-md-12" style="padding-bottom: 20px;">
                                        <div style="margin: 0px 20px;">
                                            <h4 style="font-size: 20px; font-weight: bold;">Hola '.$_POST['nombre'].' '.$_POST['apellidos'].', su consulta será procesada. ¡Gracias por contactarnos!</h4>
                                            <p>
                                            Aquí en Neon Led Store te ofrecemos la mejor iluminación, con excelentes luces 
                                            led neón de acuerdo a tu preferencia para darle vida a todo tipo de Eventos: Bodas, Cumpleaños, Bautizos, etc. 
                                            </p>
                                            <a class="button btn-warning" href="https://neonled-store.com/" >Visitar sitio web</a>               
                                        </div>
                                    </div>
                
                                </div>
                                <hr>
                                <div class="row">              
                                    <table>
                                        <tr>
                                            <td style="display: inline-block;width: 100%; text-align: center;">
                                                <img src="img/evento2-1.webp" style="padding: 0; width: 250px; height: 200px; margin: 3px">
                                                <h5>Salón Decorativo</h5>
                                                <p style="margin:0;color:#444444; margin-bottom:20px">S/.300,00</p>
                                            </td>           
                                            <td style="display: inline-block;width: 100%; text-align: center;">
                                                <img src="img/evnto2-2.webp" style="padding: 0; width: 250px; height: 200px; margin: 3px">
                                                <h5>Iluminación Neón</h5>
                                                <p style="margin:0; color:#444444; margin-bottom:20px">S/.199,00</p>
                                            </td>
                                            <td style="display: inline-block;width: 100%; text-align: center;">
                                                <img src="img/evento2-3.webp" style="padding: 0; width: 250px; height: 200px; margin: 3px">
                                                <h5>Iluminación led</h5>
                                                <p style="margin:0; color:#444444; margin-bottom:5px">S/.199,00</p>
                                            </td>
                                        </tr>          
                                    </table>  
                
                                    <div class="col-md-12 p-4">
                                        <h6>Escríbenos para más detalles</h5>
                                        <a href="mailto:info.neonledstore@gmail.com" style="font-size: 16px; text-decoration: none;">info.neonledstore@gmail.com</a>
                                    </div>
                
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-15">
                                    <footer style="padding: 2% 19%;">
                                        <div style="text-align: center;margin:auto">
                                            <a href="https://www.facebook.com/pages/category/Lighting-Store/Neon-Led-store-100244098454782/" style="color: #1654ff;">
                                                <i class="fa-brands fa-facebook circle"></i>
                                            </a>
                                            <a href="https://www.instagram.com/neon_led_store/?hl=es" style="color: #d633ff;">
                                                <i class="fa-brands fa-instagram circle"></i>
                                            </a>
                                            <a href="https://twitter.com/neonhouseleds" style="color: #0ec0f7;">
                                                <i class="fa-brands fa-twitter circle"></i>
                                            </a>
                                        </div>
                                        <p style="color: #b52ad8; font-size: 14px; text-align: center;margin: 10px 0 0">&#169; 2022 Neon Led Store</p>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                </html>';

            $mail->Body = $contenido;

            echo json_encode([
                "prueba" => $mail->send(),
                ""=>$mail->ErrorInfo
            ]);

            } else if($_REQUEST['consulta'] == "formNegocio"){

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
                $contenido = '<!DOCTYPE html>
                <html>
                <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Email Negocio</title>
                
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
                
                
                <style type="text/css">
                
                    h1,h2,h3,h4,h5,h6,a,button{
                        font-family: sans-serif;
                    }
                
                    h1,h3,h5{
                        font-weight: 300;
                    }
                
                    h2,h6{
                        font-weight: 700;
                    }
                
                    h4{
                        font-weight: 400;
                    }
                
                    p{
                        font-size: 18px;
                        font-weight: 300;
                    }
                
                    a{
                        text-decoration: none;
                    }
                    
                    .main{
                    max-width: 602px; width: 100%; border: 1px; margin: 0 auto;
                    border: 0;
                    border:1px solid #d5d5d5;
                    }
                
                    .inicio{
                        background-color: #000000; padding: 15px; 
                        text-align: center;
                    }
                
                    .titulo{
                        margin:0;
                        font-size:25px; 
                        color: #b36fc4;
                    }
                
                    #imagen{
                        padding: 0; display: block;
                        width:100%;
                        height:450px;;
                
                        
                    }
                
                    #btnRegistrarse{
                        display: inline-block;
                        background-color: #46f6fc;
                        text-decoration: none;
                        padding:10px 20px;
                        text-decoration: none; 
                        color:#000000;
                        margin-bottom:15px;
                        border-radius: 5px
                    }
                
                    .mifooter{
                        font-style: italic;
                    }
                
                    #brand{
                        font-style: normal;
                    }
                
                </style>
                </head>
                
                <body style="background-color: #e3e3e3;">
                
                    <table class="main" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="inicio" valign="middle">
                            <h1 class="titulo">
                                Hola '.$_POST['nombre'].' '.$_POST['apellidos'].', su consulta será procesada. ¡Gracias por confiar en nosotros!
                            </h1>
                        </td>
                    </tr>
                
                
                    <tr>
                        <td style="padding: 0">       
                            <img id="imagen" src="img/fondoNegocio1.webp">
                        </td>      
                    </tr>
                
                    <tr>
                        <td valign="top">
                            <table cellpadding="0" cellspacing="0" style="width: 100%;background-color: #ffffff;padding: 20px; text-align: center;">
                                <tr>                 
                                    <td style="display: inline-block;max-width:270px;width: 100%; text-align: center;">
                                        <img src="img/negocio1.webp" style="padding: 0; width: 250px; height: 200px; margin: 5px">
                                        <h2>Letreros Salas Gamer</h2>
                                    </td>
                                    <td style="display: inline-block;max-width:20px;width: 100%">
                                        &nbsp;
                                    </td>
                                    <td style="display: inline-block;max-width:270px;width: 100%; text-align: center;">
                                        <img src="img/negocio2.webp" style="padding: 0; width: 250px; height: 200px; margin: 5px">
                                        <h2>Centros Fotográficos</h2>
                                    </td>
                
                                </tr>
                                <tr>
                                    <td style="display: inline-block;max-width:270px;width: 100%; text-align: center;">
                                        <img src="img/negocio3.webp" style="padding: 0; width: 250px; height: 200px; margin: 5px">
                                        <h2>Letreros Hospedaje</h2>
                                    </td>
                                    <td style="display: inline-block;max-width:20px;width: 100%">
                                        &nbsp;
                                    </td>
                                    <td style="display: inline-block;max-width:270px;width: 100%; text-align: center;">
                                        <img src="img/negocio4.webp" style="padding: 0; width: 250px; height: 200px; margin: 5px">
                                        <h2>Decoracion Spa</h2>
                                    </td>
                                </tr>
                                <td>
                                <a id="btnRegistrarse" href="">Registrarme</a>
                                </td>
                            </table>       
                        </td>
                        
                    </tr>
                    <tr>
                        <td valign="top">
                            <table cellpadding="0" cellspacing="0" style="width: 100%;background-color: #ffffff;padding:0px 20px 40px">
                                <tr>
                                    <td valign="middle">
                                        <div style="display: block;width:100%;height: 1px;background-color: #d5d5d5;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;" valign="middle">
                                        <p style="font-size:16px; color:#000000;margin:20px 0px">Visita nuestras redes sociales:</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;" valign="middle">
                                        <a href="https://www.facebook.com/Neon-Led-store-100244098454782/" style="display: inline-block;font-size:14px;color:#ffffff;background-color:#4b69b0;padding:4px 10px;text-decoration: none;border-radius:4px;margin:0px 1px 6px 1px;">
                                            Facebook
                                        </a>
                                        <a href="https://www.instagram.com/neon_led_store/" style="display: inline-block;font-size:14px;color:#ffffff;background-color:#ee5be2;padding:4px 10px;text-decoration: none;border-radius:4px;margin:0px 1px 6px 1px;">
                                        Instagram
                                        </a>
                                        <a href="" style="display: inline-block;font-size:14px;color:#ffffff;background-color:#e83f3a;padding:4px 10px;text-decoration: none;border-radius:4px;margin:0px 1px 6px 1px;">
                                            Youtube
                                        </a>
                                        <a href="https://twitter.com/neonhouseleds" style="display: inline-block;font-size:14px;color:#ffffff;background-color:#37b1e1;padding:4px 10px;text-decoration: none;border-radius:4px;margin:0px 1px 6px 1px;">
                                            Twitter
                                        </a>
                                    </td>
                                </tr>
                                
                            </table>
                        </td>
                    </tr>
                
                <!--Footer-->
                <tr class="mifooter">
                    <td style="background-color: #1a1a1a; color: #fff;">
                        <table width="100%">
                            <tr>
                                <td style="padding: 10px 15px; text-align:center; font-size: 14px;">
                                    <a href="https://neonled-store.com/"><img src="img/logo.webp" alt="Logo" width="70px" title="Logo"></a>
                                    
                                    <p>Jr. Paruro 1401 tda 130 CC Shoping Center, Cercado de Lima.</p>
                                    <p>Celular: 994078320</p>
                                    <p>Email: <a href="mailto:info.neonledstore@gmail.com" style="color: #37b1e1;">info.neonledstore@gmail.com</a></p>													
                                        <p style="color: #d353f3; font-size: 12px; text-align: center;margin: 10px 0 0" id="brand">&#169; 2022 Neon House Led</p>		
                                </td>			
                            </tr>										
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="100%" height="20px" style="background-color: #000000;"></td>
                </tr>
                </table>
                
                </body>
                </html>';

            $mail->Body = $contenido;

            echo json_encode([
                "prueba" => $mail->send(),
                ""=>$mail->ErrorInfo
            ]);

            }

            
    }





/*Correo enviado a la empresa*/

public static function contactoEmailEm(){
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