<?php 

namespace Controllers;

use Model\Categoria;
use Model\Producto;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class ProductoController {
    public static function index(Router $router){
        $router->render('dashboard/producto',[]);
    }

    public static function obtenerCat(){
        $categoria = Categoria::listar();

        echo json_encode([
            "listCat"=>$categoria
        ]);
    }

    public static function guardar(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           $producto = new Producto($_POST);
           $nombreImg = md5(uniqid(rand(), true)) . ".webp";

            if ($_FILES['pro_imagen']['tmp_name']) {
                $image = Image::make($_FILES['pro_imagen']['tmp_name'])->fit(800, 600);
                $producto->setImagen($nombreImg);
            }

            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            $resultado = $producto->crear();

            if($resultado){
                $image->save(CARPETA_IMAGENES . $nombreImg);
            }

            echo json_encode([
                "resp"=>$resultado
            ]);
        }
    }

    public static function getProducto(){
        $producto = Producto::listarCatXProd();

        echo json_encode([
            "lists"=>$producto
        ]);
    }
}