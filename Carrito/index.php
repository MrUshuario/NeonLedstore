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
	<!-- las rutas pivotean con index.php -->

	<script type="text/javascript"  src="./js/scripts0.js"></script>
</head>
<body>
	<header>
		<h1>Carrito De Compras</h1>
		<!-- el path siempre toma como pivot index.php -->
		<a href="carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
		include 'conexion.php';
		// seleccionamos a todos los registros de la base
		$resultado = mysqli_query($con,"select * from tab_producto ")or die(mysqli_error());
		while ($f = mysqli_fetch_array($resultado)) {
		?>
         <div class="producto">
			<center>
			    <!-- mostramos cada registro -->
				<img src="./productos/<?php echo $f['pro_imagen'];?>"><br>
				<span><?php echo $f['pro_nombre'];?></span><br>
				<!-- vamos a la página detalle con un valor en la url -->
				<!-- dicho valor, mostrará un contenido específico -->
				<a href="detalles.php?id=<?php echo $f['id'] ?>">ver</a>
			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>