<?php

namespace Model;

use Model\ActiveRecord;

class Visitante extends ActiveRecord {
    protected static $tabla = "tab_visitantes";
    protected static $columnaDB = ['id', 'vis_nombre', 'vis_apellidos', 'vis_email','vis_telefono'];

    public $id;
    public $vis_nombre;
    public $vis_apellidos;
    public $vis_email;
    public $vis_telefono;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->vis_nombre = $args['vis_nombre'] ?? null;
        $this->vis_apellidos = $args['vis_apellidos'] ?? null;
        $this->vis_email = $args['vis_email'] ?? null;
        $this->vis_telefono = $args['vis_telefono'] ?? null;
    }
    
    public function verificarCorreo(){
        $query = "SELECT * FROM ".static::$tabla." WHERE vis_email='".$this->vis_email."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }

}

/* Visitante Contacto */

class VisitanteContacto extends ActiveRecord {
    protected static $tabla = "tab_visitantes";
    protected static $columnaDB = ['id', 'vis_nombre', 'vis_apellidos', 'vis_email','vis_telefono'];

    public $id;
    public $vis_nombre;
    public $vis_apellidos;
    public $vis_email;
    public $vis_telefono;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->vis_nombre = $args['vis_nombre'] ?? null;
        $this->vis_apellidos = $args['vis_apellidos'] ?? null;
        $this->vis_email = $args['vis_email'] ?? null;
        $this->vis_telefono = $args['vis_telefono'] ?? null;
    }
    
    public function verificarCorreo(){
        $query = "SELECT * FROM ".static::$tabla." WHERE vis_email='".$this->vis_email."'";
        $resultado = self::$db->query($query);
        return $resultado;
    }

}