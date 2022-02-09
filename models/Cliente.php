<?php

namespace Model;

use Model\ActiveRecord;

class Cliente extends ActiveRecord {
    protected static $tabla = "tab_cliente";
    protected static $columnaDB = ['id', 'cli_nombre', 'cli_apellidos', 'cli_email', 'cli_clave', 'cli_estado', 'cli_telefono','cli_rol'];

    public $id;
    public $cli_nombre;
    public $cli_apellidos;
    public $cli_email;
    public $cli_clave;
    public $cli_estado;
    public $cli_telefono;
    public $cli_rol;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->cli_nombre = $args['cli_nombre'] ?? null;
        $this->cli_apellidos = $args['cli_apellidos'] ?? null;
        $this->cli_email = $args['cli_email'] ?? null;
        $this->cli_clave = $args['cli_clave'] ?? null;
        $this->cli_estado = $args['cli_estado'] ?? null;
        $this->cli_telefono = $args['cli_telefono'] ?? null;
        $this->cli_rol = $args['cli_rol'] ?? null;
    }
    
    public function verificarCorreo(){
        $query = "SELECT * FROM ".static::$tabla." WHERE cli_email='".$this->cli_email."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }
    
    public function editEstado()
    {
        $query = "UPDATE " . static::$tabla . " SET cli_estado='" . $this->cli_estado . "' WHERE id=" . $this->id;
        $resultado = self::$db->query($query);
        return $resultado;
    }
}