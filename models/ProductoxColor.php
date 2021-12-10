<?php

namespace Model;

use Model\ActiveRecord;

class ProductoxColor extends ActiveRecord{
    protected static $tabla = "tab_productoxcolor";
    protected static $columnaDB = ["id","id_producto","id_color"];

    public $id;
    public $id_producto;
    public $id_color;

    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->id_producto = $args['id_producto'] ?? null;
        $this->color = $args['id_color'] ?? null;
    }

    public function listarJoin(){
        $query = "SELECT 
        concat(p.pro_nombre, ',', p.pro_imagen, ',', p.pro_precio) as id_producto, concat (c.nombre, ',',c.rgb) as id_color
        FROM `tab_productoxcolor` tp inner JOIN
        tab_color c on c.id = tp.id_color inner JOIN
        tab_producto p on p.id = tp.id_producto";
    }

}