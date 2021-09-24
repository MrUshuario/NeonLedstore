<?php 
namespace Controller;

use Model\Login;
use MVC\Router;

class AdminController  {
    public static function index(Router $router) {
        $cont = 1;
        $router->render("Login/login",['cont'=>$cont]);
    }
}
