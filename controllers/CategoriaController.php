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
                'res' => $categoria
            ]);
            echo $json;
        }
    }

    public static function listados()
    {

        $listados = Categoria::listar();

        $json = json_encode([
            "data" => $listados
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
                "data" => $resultado
            ]);
        }
    }

    public static function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoria = Categoria::find($_POST['id']);
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
                "img"=> $_POST
            ]);;
        }
        
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $categoria = Categoria::find($id);
            $resultado = $categoria->eliminar();
            if($resultado){
                $categoria->borrarImagen();
            }
            
            echo json_encode([
                "res"=>$resultado
            ]);
        }
    }

    public static function buscarNomCat(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cat_nombre = $_POST['nombre'];
            $resultado = Categoria::listarNombre($cat_nombre);

            echo json_encode([
                "list"=> $resultado
            ]);
        }
    }

    public static function pagination(){
        $cat = new Categoria();
        $get = filter_var($_GET['pag'], FILTER_VALIDATE_INT);

        $pagination = $cat->listarLimit(2, $get);
        echo json_encode([
            "pags"=>$pagination['pags'],
            "res"=>$pagination['limit']
        ]);
    }
}
