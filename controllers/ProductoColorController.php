<?php

namespace Controllers;

use Model\Color;
use Model\Producto;
use Model\ProductoColor;
use MVC\Router;

class ProductoColorController
{
    public static function index(Router $router)
    {
        $router->render('dashboard/productocolor', []);
    }

    public static function listar()
    {
        $listar = ProductoColor::listarJoin();

        echo json_encode([
            "data" => $listar
        ]);
    }

    public static function getProducto()
    {
        $listar = Producto::listar();
        echo json_encode([
            "data" => $listar
        ]);
    }

    public static function getColor()
    {
        $listar = Color::listar();
        echo json_encode([
            "data" => $listar
        ]);
    }

    public static function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pro_col =  new ProductoColor($_POST);

            $resultado = $pro_col->crear();

            echo json_encode([
                "res"=>$resultado
            ]);
        }
    }

    public static function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pro_col = ProductoColor::find($_POST['id']);
            $pro_col->sincronizar($_POST);

            $resultado = $pro_col->actualizar();

            echo json_encode([
                "res"=>$resultado
            ]);

        }
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $pro_col = ProductoColor::find($id);

            $resultado = $pro_col->eliminar();

            echo json_encode([
                "res"=>$resultado
            ]);
        }
    }

    public static function obtener(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $pro_col = ProductoColor::find($id);

            echo json_encode([
                "res" => $pro_col
            ]);
        }
    }
}
