<?php

namespace Model;

use Model\ActiveRecord;

//aun no hecho
class Compra extends ActiveRecord {
    protected static $tabla = "tab_compra";
    protected static $columnaDB = ['cod_com', 'comp_fecha ', 'precio_total ', 'cli_id'];

    public $cod_com;
    public $comp_fecha;
    public $precio_total;
    public $cli_id;
    
    

    public function __construct($args = [])
    {
        $this->id = $args['cod_com '] ?? null;
        $this->cli_nombre = $args['comp_fecha '] ?? null;
        $this->cli_apellidos = $args['precio_total '] ?? null;
        $this->cli_email = $args['cli_id'] ?? null;
  }
    
    public function verificarCompra(){
        $query = "SELECT * FROM ".static::$tabla." WHERE cli_id ='".$this->cli_id."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }
    
  
}
