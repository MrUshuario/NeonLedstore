<!DOCTYPE html>
<html lang="es">


<style>
html{
	padding: 0px;
	margin: 0px;
}
body{
	background-color: #ccc;
	padding: 0px;
	margin: 0px;
}
header{
	width: 100%;
	height: 60px;
	background-color: black;
	color:white;
}
header h1{
	margin-left: 10%;
	width: 30%;
	display: inline-block;
	vertical-align: top;
}
header a{
	width: 50px;
	margin-left: 50%;
	display: inline-block;
	vertical-align: top;
}
header a img{
	width: 100%;
}
section{
	width: 80%;
	min-height: 500px;
	border: 1px solid #DDD;
	padding: 2%;
	margin:0 auto;
	margin-left: 10%;
	margin-top: 50px;
}
.producto{
	width: 23%;
	height: 220px;
	background-color: #fafafa;
	border:1px solid gray;
	display: inline-block;
	vertical-align: top;
	margin-left: 1%;
	margin-top: 1%;
}
.producto img{
	width: 60%;
	height: 60%;
	margin:0 auto;
}
</style>

<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>

	<script type="text/javascript"  src="./js/scripts0.js"></script>
</head>
<body>
	<header>
		<h1>Detalles</h1>
		<!-- el path siempre parte de index.php -->
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
		include 'conexion.php';
		//tomamos la id del enlace del index
		$id = $_GET['id'];
		$resultado = mysqli_query($con,"select * from tab_producto where id=".$id)or die(mysqli_error());
		while ($f = mysqli_fetch_array($resultado)) {
		?>
         
			<center>
			     <!-- mostramos el registro indicado -->
				<img src="./productos/<?php echo $f['pro_imagen'];?>"><br>
				<span><h1><?php echo $f['pro_nombre'];?></h1></span><br>
				<span><h1>Precio:<?php echo $f['pro_precio'];?></h1></span><br>
				<!-- volvemos a la página principal -->
				<!-- redundante, poniendo "./" produce lo mismo -->
				<a href="./index.php">Volver al Catálogo</a>
				<br>
				<!-- pasamos la id del producto al carrito -->
				<a href="./carritodecompras.php?id=<?php echo $f['id'] ?>">Añadir al carrito de compras</a>
			</center>
		
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>