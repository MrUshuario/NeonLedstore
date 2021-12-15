<?php

namespace Model;

use Model\ActiveRecord;

class Cliente extends ActiveRecord {
    protected static $tabla = "tab_clientes";
    protected static $columnaDB = ['id', 'cli_nombre', 'cli_apellidos', 'cli_email', 'cli_clave', 'token', 'cli_estado'];

    public $id;
    public $cli_nombre;
    public $cli_apellidos;
    public $cli_email;
    public $cli_clave;
    public $token;
    public $cli_estado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->cli_nombre = $args['cli_nombre'] ?? null;
        $this->cli_apellidos = $args['cli_apellidos'] ?? null;
        $this->cli_email = $args['cli_email'] ?? null;
        $this->cli_clave = $args['cli_clave'] ?? null;
        $this->token = $args['token'] ?? null;
        $this->token = $args['cli_estado'] ?? null;
    }
    
    public function verificarCorreo(){
        $query = "SELECT * FROM ".static::$tabla." WHERE cli_email='".$this->cli_email."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }
    
    public function editEstado()
    {
        $query = "UPDATE " . static::$tabla . " SET cli_estado='" . $this->pro_estado . "' WHERE id=" . $this->id;
        $resultado = self::$db->query($query);
        return $resultado;
    }

}