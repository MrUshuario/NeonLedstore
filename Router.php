<?php

namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();
        $id = $_SESSION['id'] ?? null;

        // Arreglo de rutas protegidas
        $rutas_protegidas = [
            '/dashboard','/color','/color/listar','/color/buscar','/color/eliminar',
            '/color/guardar','/color/editar','/color/getColor', '/producto', '/producto/getCategoria',
            '/producto/getProducto','/producto/crear','/producto/editar','/producto/getProForm',
            '/producto/estado',"/producto/eliminar","/producto/buscarNombre", '/categoria',
            '/categoria/listar','/categoria/crear','/categoria/estado','/categoria/getCategoria',
            '/categoria/actualizar', '/categoria/eliminar',"/categoria/buscar",'/cliente',
            '/cliente/listar','/cliente/getCliente','/cliente/create','/cliente/estado',
            '/cliente/update','/cliente/delete',
            '/configuracion', '/configuracion/getData','/configuracion/verificar','/configuracion/updatePassword',
            '/cerrar',
            '/graficos',
            '/productoColor','/productoColor/listar','/productoColor/getProducto',
            '/productoColor/getColor','/productoColor/create','/productoColor/update',
            '/productoColor/delete','/productoColor/obtener'
        ];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        } 

        //Proteger las rutas
        if(in_array($urlActual,$rutas_protegidas) && !$id){
            header("location: /login");
        } else if (!empty($_SESSION['id']) && $urlActual == '/login'){
            header("location: /dashboard");
        }

        if($fn){
            call_user_func($fn, $this);
        }else {
            echo 'Pagina no encontrada';
        }
    }

    //Muestra una vista
    public function render($view, $datos=[]){
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();//Almacenamiento en memoria durante un momento...
        include __DIR__."/views/$view.php";

        $contenido = ob_get_clean(); //Limpia elbuffer

        include __DIR__."/views/layout.php";
        
    }

    //Muestra el login
    public function renderLogin($view, $datos=[]){
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();//Almacenamiento en memoria durante un momento...
        include __DIR__."/views/$view.php";

        $contenido = ob_get_clean(); //Limpia elbuffer

        include __DIR__."/views/loginlayout.php";
    }

    public function renderPrincipal($view, $datos=[]){
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();//Almacenamiento en memoria durante un momento...
        include __DIR__."/views/principal/$view.php";

        $contenido = ob_get_clean(); //Limpia elbuffer

        include __DIR__."/views/layoutPrincipal.php";
        
    }
}
