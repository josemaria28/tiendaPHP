<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	echo "<pre>";
	print_r($_SESSION["producto"]);
	print_r($_SESSION["precio"]);
	print_r($_SESSION["unidades"]);
	echo "</pre>";

	foreach ($_SESSION["producto"] as $indice=>$valor){

	}
 ?>