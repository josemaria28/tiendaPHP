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
				echo "<h1 class='display-1'>Puedes comprar.</h1>";
				/*if (isset($_SESSION["contador"])){
					echo "<pre>";
					print_r($_GET);
					echo "</pre>";
					echo "<pre>";
					print_r($_SESSION["contador"]);
					echo "</pre>";
					if ($_SESSION["contador"]>0)
						mostrarCarro();
				}
				else{
					echo "<h1 class='display-1'>Cesta vacía...</h1><a href='articulos.php' class='btn btn-outline-dark btn-block'>Volver</a>";
				}*/
			}elseif ($_SESSION["Tipo"] == "admin") {
				header('Location: index.php');
			}else{
				echo "<h1 class='display-1'>Debe registrarse para poder comprar. <br> ¡Gracias!</h1>";
			}

			sectionFin();
			
			
	echo "</body>
			</html>";
 ?>