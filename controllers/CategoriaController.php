<?php

namespace Controllers;

use Model\Categoria;
use MVC\Router;

use Intervention\Image\ImageManagerStatic as Image;

class CategoriaController
{

    public static function index(Router $router)
    {
        $router->render('dashboard/categoria', []);
    }

    public static function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoria = new Categoria($_POST);

            $nombreImg = md5(uniqid(rand(), true)) . ".webp";

            if ($_FILES['cat_imagen']['tmp_name']) {
                $image = Image::make($_FILES['cat_imagen']['tmp_name'])->fit(800, 600);
                $categoria->setImagen($nombreImg);
            }

            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            $image->save(CARPETA_IMAGENES . $nombreImg);
            $resultado = $categoria->crear();

            $json = json_encode([
                'res' => $resultado
            ]);
            echo $json;
        }
    }

    public static function listados()
    {

        $listados = Categoria::listar();

        $json = json_encode([
            "listas" => $listados
        ]);

        echo $json;
    }

    public static function cambiarEstado()
    {
        $color = new Categoria();

        if ($_POST['cat_estado'] == "ACTIVO") {
            $args = [
                "cat_estado" => "INACTIVO",
                "id" => $_POST['id']
            ];
            $color->sincronizar($args);
            $resultado = $color->actualizarEstado();
        } else if ($_POST['cat_estado'] == "INACTIVO") {
            $args = [
                "cat_estado" => "ACTIVO",
                "id" => $_POST['id']
            ];
            $color->sincronizar($args);
            $resultado = $color->actualizarEstado();
        }

        echo json_encode([
            "bool" => $resultado,
            "estado" => $args['cat_estado'],
            "id" => $args['id']
        ]);
    }

    public static function getCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $resultado = Categoria::find($id);

            echo json_encode([
                "resp" => $resultado
            ]);
        }
    }

    public static function actualizar()
    {
        $categoria = new Categoria();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoria->sincronizar($_POST);

            $nombreImg = md5(uniqid(rand(), true)) . ".webp";

            if($categoria->cat_imagen !== 'undefined'){
                if ($_FILES['cat_imagen']['tmp_name'] ) {
                    $image = Image::make($_FILES['cat_imagen']['tmp_name'])->fit(800, 600);
                    $categoria->setImagen($nombreImg);
                }
    
                if ($_FILES['cat_imagen']['tmp_name']) {
                    $image->save(CARPETA_IMAGENES . $nombreImg);
                }
                
                $resultado = $categoria->actualizar();
            }else {
                $resultado = $categoria->actualizarSinImg();
            }            
            
            echo json_encode([
                "resp" => $resultado,
                "cat"=> $categoria
            ]);;
        }
        
    }
}
