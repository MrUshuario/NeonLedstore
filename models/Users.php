<?php

namespace Model;

use Model\ActiveRecord;

class Users extends ActiveRecord{
    protected static $tabla ="tab_user";
    protected static $columnaDB = ['id','user','pass','role'];

    public $id;
    public $user;
    public $pass;
    public $role;

    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->user = $args['user'] ?? null;
        $this->pass = $args['pass'] ?? null;
        $this->role = $args['role'] ?? null;
    }

    public function login(){
        $query = "SELECT * FROM ".self::$tabla." WHERE user='".$this->user."' LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function listar(){
        $query = "SELECT * FROM ".static::$tabla;
        $resultado = static::consultarSQL($query);
        return $resultado;
    }

    public function passwordAuth($resultado) {
        $user = $resultado->fetch_object();
        // Iniciar session        
        $autenticar = password_verify($this->pass,$user->pass);

        if($autenticar){
            $_SESSION['id'] = $user->id;
            $boolean = true;
        }else{
            $_SESSION['id'] = null;
            $boolean = false;
        }

        return $boolean;
    }

}