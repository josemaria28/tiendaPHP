<?php 
	session_cache_limiter();
	session_start();
	include("funciones.php");

	echo "<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<title>Compras</title>";
				headi();
	echo "</head>
			<body>";
			menu();
			sectionInicio();

			$conexion = conectar("localhost","root","","bd_hardware");
			$sql = "";
			formatearTablaUTF($conexion);
			$consultar = $conexion -> query($sql);

			sectionFin();
			
	echo "</body>
			</html>";
 ?>