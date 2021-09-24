<?php
 function conexionDB(){
     $db = new mysqli('localhost','root','1234','ghxumdmy_neonledstore');

     if(!$db){
         echo "no se conecto";
         exit;
     }

     return $db;
 }