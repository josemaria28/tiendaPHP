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
			
			if ($_SESSION["Tipo"] != "Invitado" && $_SESSION["Tipo"] != "admin") {
				
				// Mostrar el contenido del carro
				// ----------------------------------------

				if (isset($_SESSION["contador"])){
					if ($_SESSION["contador"]>0)
						mostrar();
				}
				else{
					echo "<h1 class='display-1'>Tu cesta esta vacia.</h1>
					<br>
					<a href='articulos.php' class='btn btn-outline-dark btn-block'>Comprar</a>";
				}
			}elseif ($_SESSION["Tipo"] == "admin") {
				header('Location: index.php');
			}else{
				echo "<h1 class='display-1'>Debe registrarse para poder comprar. <br> ¡Gracias!</h1>";
			}
			
			sectionFin();
			
			
	echo "</body>
			</html>";
 ?>