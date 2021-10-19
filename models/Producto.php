<?php 

namespace Model;

use Model\ActiveRecord;

class Producto  extends ActiveRecord{
    protected static $tabla = 'tab_producto';
    protected static $columnaDB = ['id','pro_categoria','pro_nombre','pro_descripcion','pro_precio','pro_imagen','pro_tamano','pro_estado'];

    public $id;
    public $pro_categoria;
    public $pro_nombre;
    public $pro_descripcion;
    public $pro_precio;
    public $pro_imagen;
    public $pro_tamano;
    public $pro_estado;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->pro_categoria = $args['pro_categoria'] ?? null;
        $this->pro_nombre = $args['pro_nombre'] ?? null;
        $this->pro_descripcion = $args['pro_descripcion'] ?? null;
        $this->pro_precio = $args['pro_precio'] ?? null;
        $this->pro_imagen = $args['pro_imagen'] ?? null;
        $this->pro_tamano = $args['pro_tamano'] ?? null;
        $this->pro_estado = $args['pro_estado'] ?? null;
    }
    public function setImagen($img){
        //Eliminar la imagen previa al editar o eliminar
        /*if(!is_null($this->id)){
            $this->borrarImagen();
        }*/

        //Asignar al atributo de imagen el nombre de la imagen
        if($img){
            $this->pro_imagen = $img;
        }
    }

    public static function listarCatXProd(){
        $query = "SELECT p.id as id, pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_tamano, pro_estado, cat_nombre as pro_categoria FROM tab_producto p inner join tab_categorias c ON c.id = p.pro_categoria ";
        $resultado = static::consultarSQL($query);
        return $resultado;
    }
}