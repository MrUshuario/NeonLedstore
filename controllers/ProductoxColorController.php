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
    public static function listarProductoxColor(Router $router){

        $listado = ProductoxColor::listar();
        
        $json = json_encode([
            "data" => $listado
        ]);
        echo $json;
    }

    public static function ProductoxColor(Router $router){
        
        $router->render("dashboard/ProductoxColor",[]);
    }

    public static function crearProductoxColor(Router $router){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $ProductoxColor = new ProductoxColor($_POST);
            
            $verificarColor = $ProductoxColor->verificarNombreColor();
            $verificarProducto = $ProductoxColor->verificarNombreProducto();
            //$json = json_encode($verificarNombreColor);
            if($verificarColor->num_rows == 0 && $verificarProducto->num_rows == 0 ){
                $resultado = $ProductoxColor->crear();
                if($resultado){
                    $listado = ProductoxColor::listar();
                    $json = json_encode([
                        "STATUS"=>1,
                        "mensaje"=>"Registro correctamente",
                        "listas"=>$listado,
                        "c"=>$ProductoxColor
                    ]);
                } else {
                    $json = json_encode([
                        "STATUS"=>2,
                        "mensaje"=>"Error al registrar"
                    ]);
                }
            }else {
                $json = json_encode([
                    "STATUS"=>3,
                    "mensaje"=>"Nombre del color o producto ya registrado",
                    "c"=>$ProductoxColor
                ]);
            }
            
            echo $json;
        }
    }

    public static function editProductoxColor(Router $router){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ProductoxColor = ProductoxColor::find($_POST['id']);
            $ProductoxColor->sincronizar($_POST);

            $dd = $ProductoxColor->actualizar();

            $json = json_encode($dd);

            echo $json;
        }
        
    }

    #public static function buscarNombreColor(Router $router) {
    #    if($_SERVER["REQUEST_METHOD"] == "POST"){
    #        $nombre = $_POST['id_color'];
    #        $listar = ProductoxColor::listarNombre($nombre);
    #        $json = json_encode([
    #            "resp"=>$listar
    #        ]);
    #        echo $json;
    #    }
    #}

    #public static function buscarNombreProducto(Router $router) {
    #    if($_SERVER["REQUEST_METHOD"] == "POST"){
    #        $nombre = $_POST['id_producto'];
    #        $listar = ProductoxColor::listarNombre($nombre);
    #        $json = json_encode([
    #            "resp"=>$listar
    #        ]);
    #        echo $json;
    #    }
    #}

    public static function getProductoxColor(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $ProductoxColor = ProductoxColor::find($id);

            $json = json_encode([
                "data"=>$ProductoxColor
            ]);
             
            echo $json;
        }
    }

    public static function eliminarProductoxColor(Router $router){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $ProductoxColor = ProductoxColor::find($id);
            $el = $ProductoxColor->eliminar();
            $json = json_encode($el);
        
            echo $json;
        }
    }

    public static function pagination(){
        $ProductoxColor = new ProductoxColor();
        $get = filter_var($_GET['pag'], FILTER_VALIDATE_INT);

        $pagination = $ProductoxColor->listarLimit(4, $get);
        echo json_encode([
            "pags"=>$pagination['pags'],
            "res"=>$pagination['limit']
        ]);
    }
}