<?php

namespace Model;

class ProductoColor extends ActiveRecord
{
    protected static $tabla = 'tab_productoxcolor';
    protected static $columnaDB = ['id', 'id_producto', 'id_color'];

    public $id;
    public $id_producto;
    public $id_color;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_producto = $args['id_producto'] ?? null;
        $this->id_color = $args['id_color'] ?? null;
    }

    public static function listarJoin()
    {
        $query = "
        select 
            tp.id as id,
            concat(p.pro_nombre,',',p.pro_imagen,',',p.pro_precio) as id_producto,
            concat(c.nombre,',',c.rgb) as id_color
        from tab_productoxcolor tp 
        inner join tab_color c on c.id = tp.id_color
        inner join tab_producto p on p.id = tp.id_producto";
        $resultado = static::consultarSQL($query);;
        return $resultado;
    }
}
