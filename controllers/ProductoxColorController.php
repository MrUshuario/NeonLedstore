<?php 


namespace Controllers;
#Agrege todo lo que tenia producto y color
use Model\Color; #NO SE si va
use Model\Categoria; #NO SE si va
use Model\Producto; #NO SE si va
use Model\ProductoxColor; 
#use Intervention\Image\ImageManagerStatic as Image;
use MVC\Router;

class ProductoxColorController {
    public static function index(Router $router){

        $router->render("dashboard/cliente",[]);
    }

    public static function listar(){
        $listar = ProductoxColor::listarJoin();
        echo json_encode([
            "data"->$listar
        ]);
    }

    //$router->get('/productoxcolor/getProducto',[ProductoxColorController::class,'getProducto']);
    //$router->get('/productoxcolor/getColor',[ProductoxColorController::class,'getColor']);
    public static function getproducto(){
        $listar = Producto::listar();
        echo json_encode([
            "data"=>$pr::listarCatXProd()
    ]);
    }

    public static function getcolor(){
        $listar = Producto::listar();
        echo json_encode([
            "data"=>$pr::listarCatXProd()
    ]);
    }
}