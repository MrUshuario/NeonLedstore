<?php

namespace Controllers;

use Model\ActiveRecord;
use MVC\Router;

$id=$_POST[''];
$categoria=$_POST[''];
$nombre=$_POST[''];
$descripcion=$_POST[''];
$precio=$_POST[''];

$alto=$_POST[''];
$ancho=$_POST[''];
$tamano=$alto."X".$ancho;

$estado=$_POST[''];
$img1 = $_FILES['txtfoto']['name'];
	$dirfinal = "../../img/".$img1;
	copy($_FILES['txtfoto']['tmp_name'],$dirfinal);
$img2 = $_FILES['txtfoto']['name'];
	$dirfinal = "../../img/".$img2;
	copy($_FILES['txtfoto']['tmp_name'],$dirfinal);
$img3 = $_FILES['txtfoto']['name'];
	$dirfinal = "../../img/".$img3;
	copy($_FILES['txtfoto']['tmp_name'],$dirfinal);
$precioMul=$_POST[''];

static function buscat()
{

	$query = "SELECT id FROM tab_categoria WHERE cat_nombre=".$categoria;
    $resultado = self::$db->query($query);
    return $resultado;

}

$catId=buscat();

$query = "INSERT INTO tab_producto values('$id','$catId','$nombre','$descripcion','$precio','$tamano','$estado','$img1','$img2','$img3','$precioMul')";
$resultado = self::$db->query($query);
return $resultado;

if ($resultado)
{
	header("location:producto.php");
}
else
{
	echo "<br>Error de Registro del Producto";
	exit();
}

?>