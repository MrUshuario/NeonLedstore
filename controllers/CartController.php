<?php

namespace Controllers;

use Model\Producto;
use MVC\Router;

class CartController 
{
    public static function aggCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $_SESSION['pro_vermas'] = $id; //nueva varibale session

            echo json_encode([
                "mensaje" => $id
            ]);
        }
    }
    public static function getdatacart(){
        $data = Producto::find($_SESSION['pro_vermas']); //cambie user por cliente, lo mismo pero con mas informacion
        echo json_encode([
            'data'=>$data
        ]);
    }
    /* una funcion que es llamada por la URL de findproducto al hacer click al boton comprar*/
    /* agarra la variable pro_vermas que es un session y es el ID del producto actual*/
    /*consigues sus datos y te devuelve un objetos, si no te devuelve un objeto buscas una funcion para convertirlo */
    /*la variable donde lo guardastes lo agregas a una nueva variable llamada lista_carrito, que tiene que ser una lista */
    /* $json = json_encode devolver la informacion /*
    /*
    function
    $prod = Producto::find($_SESSION['pro_vermas']); 
    $_SESSION[lista_carrito[]] = add objeto($prod)
    */
}
