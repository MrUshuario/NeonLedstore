<?php

namespace Model;

use Model\ActiveRecord;

class Categoria extends ActiveRecord{

    protected static $tabla = 'tab_categorias';
    protected static $columnaDB   = ['id','cat_nombre','cat_imagen','cat_link','cat_estado'];

    public $id;
    public $cat_nombre;
    public $cat_imagen;
    public $cat_link;
    public $cat_estado;

    public function __construct ($args = []){
        $this->id = $args['id'] ?? null;
        $this->cat_nombre = $args['cat_nombre'] ?? null;
        $this->cat_imagen = $args['cat_imagen'] ?? null;
        $this->cat_link = $args['cat_link'] ?? null;
        $this->cat_estado = $args['cat_estado'] ?? null;
    }

    public function setImagen($img){
        //Eliminar la imagen previa al editar o eliminar
        if(!is_null($this->id)){
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen el nombre de la imagen
        if($img){
            $this->cat_imagen = $img;
        }
    }

    public function borrarImagen(){
        //Comprobar si existe el archivo
    }

    public function actualizarEstado(){
        $query = "UPDATE ".static::$tabla." SET cat_estado = '".$this->cat_estado."' where id =".$this->id." limit 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function actualizarSinImg(){   
        $query = "UPDATE ".static::$tabla." SET cat_nombre= '".$this->cat_nombre."', cat_link='".$this->cat_link."', cat_estado='".$this->cat_estado."' WHERE id=".$this->id." limit 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}