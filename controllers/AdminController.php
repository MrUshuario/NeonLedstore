<?php 
namespace Controllers;

use Model\Login;
use MVC\Router;

class AdminController  {
    public static function index(Router $router) {
        
        $router->render("Login/login",[]);
    }
}
