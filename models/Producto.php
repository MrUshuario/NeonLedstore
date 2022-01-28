<?php

namespace Model;

use Model\ActiveRecord;

class Producto  extends ActiveRecord
{
    protected static $tabla = 'tab_producto';
    protected static $columnaDB = ['id', 'cat_id', 'pro_nombre', 'pro_descripcion', 'pro_precio', 'pro_imagen', 'pro_tamano', 'pro_activo'];

    public $id; 
    public $cat_id;
    public $pro_nombre;
    public $pro_descripcion;
    public $pro_precio;
    public $pro_imagen;
    public $pro_tamano;
    public $pro_activo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->cat_id = $args['cat_id'] ?? null;
        $this->pro_nombre = $args['pro_nombre'] ?? null;
        $this->pro_descripcion = $args['pro_descripcion'] ?? null;
        $this->pro_precio = $args['pro_precio'] ?? null;
        $this->pro_imagen = $args['pro_imagen'] ?? null;
        $this->pro_tamano = $args['pro_tamano'] ?? null;
        $this->pro_activo = $args['pro_activo'] ?? null;
    }
    public function setImagen($img)
    {
        //Eliminar la imagen previa al editar o eliminar
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen el nombre de la imagen
        if ($img) {
            $this->pro_imagen = $img;
        }
    }

    public function borrarImagen()
    {
        //Comprobar si existe el archivo
        $existArchivo = file_exists(CARPETA_IMAGENES . $this->pro_imagen);
        if ($existArchivo) {
            unlink(CARPETA_IMAGENES . $this->pro_imagen);
        }
    }

    public static function listarCatXProd()
    {
        $query = "SELECT p.id as id, pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_tamano, pro_activo, cat_nombre as cat_id FROM tab_producto p inner join tab_categorias c ON c.id = p.pro_categoria ";
        $resultado = static::consultarSQL($query);
        return $resultado;
    }

    public function editSinImg()
    {
        $query = "UPDATE " . static::$tabla . " SET pro_nombre='" . $this->pro_nombre . "', pro_descripcion='" . $this->pro_descripcion . "', pro_precio='" . $this->pro_precio . "', pro_tamano='" . $this->pro_tamano . "', pro_activo='" . $this->pro_activo . "' where id = " . $this->id;
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function editEstado()
    {
        $query = "UPDATE " . static::$tabla . " SET pro_activo='" . $this->pro_activo . "' WHERE id=" . $this->id;
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function searchNombre()
    {
        $query="select p.id as id, pro_nombre, pro_descripcion, pro_precio, pro_imagen, pro_tamano, pro_activo, cat_nombre as pro_categoria from ".static::$tabla." p inner join tab_categorias c ON c.id = p.pro_categoria where pro_nombre LIKE '%".$this->pro_nombre."%'";
        $resultado = static::consultarSQL($query);
        return $resultado;
    }
}
