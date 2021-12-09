<?php

namespace Model;

use Model\ActiveRecord;

class ProductoxColor extends ActiveRecord{
    protected static $tabla = "tab_productoxcolor";
    protected static $columnaDB = ["id","id_producto","id:color"];

    public $id;
    public $id_producto;
    public $id_color;

    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->id_producto = $args['id_producto'] ?? null;
        $this->color = $args['id_color'] ?? null;
    }

    public function verificarNombreColor(){
        $query = "SELECT * FROM ".static::$tabla." WHERE id_color='".$this->id_color."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function verificarNombreProducto(){
        $query = "SELECT * FROM ".static::$tabla." WHERE id_producto='".$this->id_producto."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}