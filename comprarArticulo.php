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

			if (isset($_POST["cod"])) {
				$foto = $_FILES["foto"]["name"];
				$ruta = $_FILES["foto"]["tmp_name"];
				$destino = "imagenes/".$foto;
				copy($ruta, $destino); 

				$conexion = conectar("localhost","root","","bd_hardware");
				$sql = "UPDATE producto SET Descripcion='".$_POST["descripcion"]."',PVP='".$_POST["precio"]."',Stock='".$_POST["stock"]."',foto='".$destino."' WHERE COD='".$_POST["cod"]."'";
				$consultar = $conexion -> query($sql);
			}

			sectionFin();
			
	echo "</body>
			</html>";
	header('Location: articulos.php');
 ?>