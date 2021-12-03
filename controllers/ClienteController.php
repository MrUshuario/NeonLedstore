<?php

namespace Controllers;

use MVC\Router;

class ClienteController {

    public static function index (Router $router){


        $router->render("dashboard/cliente",[]);
    }

}