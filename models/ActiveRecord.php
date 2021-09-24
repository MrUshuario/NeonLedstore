<?php 

namespace Model;

class ActiveRecord {
    //Base de datos
    protected static $db;
    protected static $columnaDB = [];
    protected static $tabla = '';

    //Errores
    protected static $errores = [];

    //Definir la conexion a la DB
    public static function setDB($database){
        self::$db = $database;
    }

    
}