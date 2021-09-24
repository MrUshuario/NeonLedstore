<?php 

// require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

//conexion a la base de datos
$db = conexionDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);