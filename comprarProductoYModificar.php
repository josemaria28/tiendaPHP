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
			$conexion = conectar("localhost","root","","bd_hardware");
			
			/*echo "<pre>";
			print_r($_GET);
			echo "</pre>";*/

			// Modificar Imagen
			if (isset($_GET["modificar"])) {
				$sql = "SELECT cod,pvp,stock,foto,descripcion FROM producto WHERE cod ='".$_GET["modificar"]."'";
				formatearTablaUTF($conexion);
				$consultar = $conexion -> query($sql);

				// echo "<form action='modificarArticulo.php' method='GET' enctype='multipart/form-data'>";
				echo "<form action='#' method='GET' enctype='multipart/form-data'>";
				while ($fila = $consultar->fetch_assoc()) {
					echo "<h1 class='display-1'>Producto : ".$fila["cod"]."</h1>
						<input type='hidden' name='cod' value='".$fila["cod"]."'>
						<div class='form-group'>
							<label for='text'>Foto :</label>
							<input type='file' class='form-control-file' id='foto' name='foto' aria-describedby='fileHelp'>
						</div>
						<div class='form-group'>
							<label for='text'>Stock :</label>
							<input type='text' class='form-control col-md-10' id='text' name='stock' value='".$fila["stock"]."'>
						</div>
						<div class='form-group'>
							<label for='text'>Precio :</label>
							<input type='text' class='form-control col-md-10' id='text' name='precio' value='".$fila["pvp"]."'>
						</div>
						<div class='form-group'>
							<label for='pwd'>Descripcion :</label>
							<textarea class='form-control col-md-10' id='txt' name='descripcion' rows='5'>".$fila["descripcion"]."</textarea>
						</div>
					<input type='submit' class='btn btn-outline-dark col-md-10' name='aceptar' value='Aceptar'>";
				}
				echo "</form>";
			}else{
				if (isset($_GET["cod"])) {
					// No hace nada
					$foto = $_FILES["foto"]["name"];
					$ruta = $_FILES["foto"]["tmp_name"];
					$destino = "imagenes/".$foto;
					copy($ruta, $destino); 

					$conexion = conectar("localhost","root","","bd_hardware");
					$sql = "UPDATE producto SET Descripcion='".$_GET["descripcion"]."',PVP='".$_GET["precio"]."',Stock='".$_GET["stock"]."',foto='".$destino."' WHERE COD='".$_GET["cod"]."'";
					$consultar = $conexion -> query($sql);
				}
			}
			
			// Comprar Producto
			//echo "Comprar Producto";

			sectionFin();
			
	echo "</body>
			</html>";
	//header('Location: articulos.php');
 ?>