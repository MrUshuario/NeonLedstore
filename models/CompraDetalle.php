<?php

namespace Model;

use Model\ActiveRecord;

class CompraDetalle extends ActiveRecord {

    protected static $tabla = "tab_compra_detalle";

    protected static $columnaDB = ['id', 'cod_id', 'pro_id', 'det_cantidad',  'det_color'];

    public $id;

    public $cod_id;

    public $pro_id;

    public $det_cantidad;

    public $det_color;

    public function __construct($args = [])

    {

        $this->id = $args['id'] ?? null;

        $this->cod_id = $args['cod_id'] ?? null;

        $this->pro_id = $args['pro_id'] ?? null;

        $this->det_cantidad = $args['det_cantidad'] ?? null;

        $this->det_color = $args['det_color' ] ?? null;

    }

    

    public function verificarCod(){

        $query = "SELECT * FROM ".static::$tabla." WHERE cod_id='".$this->cod_id."'";

        $resultado = self::$db->query($query);

        return $resultado;

    }

    

    public function editCantidad()

    {

        $query = "UPDATE " . static::$tabla . " SET det_cantidad ='" . $this->det_cantidad . "' WHERE id=" . $this->id;

        $resultado = self::$db->query($query);

        return $resultado;

    }

}
