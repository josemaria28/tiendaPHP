<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	/*echo "<pre>";
	print_r($_SESSION["producto"]);
	print_r($_SESSION["precio"]);
	print_r($_SESSION["unidades"]);
	echo "</pre>";*/

	// Insertar
	$conexion = conectar("localhost","root","","bd_hardware");
	

	foreach ($_SESSION["producto"] as $indice=>$valor){
		echo $_SESSION["producto"][$indice]."<br>";
		echo $_SESSION["precio"][$indice]."<br>";
		echo $_SESSION["unidades"][$indice]."<br>";
	}



	// header('Location: articulos.php');
 ?>