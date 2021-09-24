<?php
 function conexionDB(){
     $db = new mysqli('localhost','root','1234','neon_store');

     if(!$db){
         echo "no se conecto";
         exit;
     }

     return $db;
 }