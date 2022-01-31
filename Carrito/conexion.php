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
<?php
	$server="Servidor: MySQL 8.0 Server:3306";
	$username="isabella181299";
	$password="Esan2018";
	$db='neohouseled';
	
	$con=mysqli_connect($server,$username,$password,$db);
	
	if (mysqli_connect_errno()) {
       printf("Falló la conexión: %s\n", mysqli_connect_error());
       exit();
    }

	
    if (!mysqli_set_charset($con,"utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($con));
        exit();
    } else {
        mysqli_character_set_name($con);
    }

    //mysqli_close($con);
?>
