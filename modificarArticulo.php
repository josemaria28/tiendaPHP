<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	echo "<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<title>TiendaP</title>";
				headi();
	echo "</head>
			<body>";
			menu();
			sectionInicio();

			// echo "<pre>";
			// print_r($_GET);
			// echo "</pre><hr>";

			// echo "<pre>";
			// print_r($_SESSION);
			// echo "</pre>";

			$foto = $_FILES["foto"]["name"];
			$ruta = $_FILES["foto"]["tmp_name"];
			$destino = "imagenes/".$foto;
			copy($ruta, $destino); 

			$conexion = conectar("localhost","root","","bd_hardware");
			$sql = "UPDATE producto SET Descripcion='".$_GET["descripcion"]."',PVP='".$_GET["precio"]."',Stock='".$_GET["stock"]."',foto='".$destino."' WHERE COD='".$_GET["cod"]."'";
			$consultar = $conexion -> query($sql);
			
			sectionFin();
			
	echo "</body>
			</html>";
	//header('Location: articulos.php');
 ?>