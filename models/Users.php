<?php

namespace Model;

use Model\ActiveRecord;

class Users extends ActiveRecord{
    protected static $tabla ="tab_cliente";
    protected static $columnaDB = ['id','cli_email','cli_clave'];

    public $id;
    public $cli_email;
    public $cli_clave;
    

    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->cli_email = $args['cli_email'] ?? null;
        $this->cli_clave = $args['cli_clave'] ?? null;
        
    }

    public function login(){
        $query = "SELECT * FROM ".self::$tabla." WHERE cli_email='".$this->cli_email."' LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function listar(){
        $query = "SELECT * FROM ".static::$tabla;
        $resultado = static::consultarSQL($query);
        return $resultado;
    }

    public function passwordAuth($resultado) {
        $cli_email = $resultado->fetch_object();
        // Iniciar session        
        $autenticar = password_verify($this->cli_clave,$cli_email->cli_clave);

        if($autenticar){
            $_SESSION['id'] = $cli_email->id;
            $boolean = true;
        }else{
            $_SESSION['id'] = null;
            $boolean = false;
        }

        return $boolean;
    }

    // metodo para verificar el contrasenaword antiguo para cambiar a una nueva contraseña
    public static function verificarKey($cli_clave1){
        $query = 'SELECT * FROM '.static::$tabla.' where id ='.$_SESSION['id'];
        $resultado = self::$db->query($query);

        $cli_clave = $resultado->fetch_object();

        $autenticar = password_verify($cli_clave1, $cli_clave->cli_clave);

        return $autenticar;
    }

}