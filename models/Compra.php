<?php

namespace Model;

use Model\ActiveRecord;

//aun no hecho
class Compra extends ActiveRecord {
    protected static $tabla = "tab_compra";
    protected static $columnaDB = ['id', 'com_fecha ', 'precio_total ', 'cli_id'];

    public $id;
    public $com_fecha;
    public $precio_total;
    public $cli_id;
    
    

    public function __construct($args = [])
    {
        $this->id = $args['id '] ?? null;
        $this->com_fecha = $args['com_fecha '] ?? null;
        $this->precio_total = $args['precio_total '] ?? null;
        $this->cli_id = $args['cli_id'] ?? null;
  }
    
    public function verificarCompra(){
        $query = "SELECT * FROM ".static::$tabla." WHERE cli_id ='".$this->cli_id."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }
    
  
}
