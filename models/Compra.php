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
    

  public static function compraXCliente()
  {
    $query = "SELECT  co.id, co.com_fecha, co.precio_total, concat(co.cli_id,',',cl.cli_nombre)  AS cli_id 
    FROM tab_compra AS co INNER JOIN tab_cliente AS cl 
    ON co.id = cl.id";

      $resultado = static::consultarSQL($query);
      return $resultado;
  }

}
