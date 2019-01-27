<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");


	if (!isset($_SESSION["Tipo"])) {
			$_SESSION["Tipo"] = "Invitado";
		}
	if (!isset($_SESSION["Usuario"])) {
		$_SESSION["Usuario"] = "Invitado";
		}

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
			echo "Tipos : ".$_SESSION["Usuario"];

			if ($_SESSION["Tipo"] != "Invitado" && $_SESSION["Tipo"] != "admin") {
						echo "<h1 class='display-1'>¡Bienvenido!</h1>";
						echo "<br><br>
						<form action='datosCliente.php' method='POST'>
							 <input type='submit' class='btn btn-outline-dark btn-block' name='datos' value='Ver mis datos'>
						</form>
						<br>
						<form action='comprasYpedidos.php' method='POST'>
							 <input type='submit' class='btn btn-outline-dark btn-block' name='datos' value='Ver compras y pedidos'>
						</form>";
					}elseif($_SESSION["Tipo"] == "admin"){
						echo "<h1 class='display-1'>¡Bienvenido! - ".$_SESSION["Tipo"]."</h1>";	
						echo "<section class='container'>
						<article class='row'>
						<div class='col-md-12'>

						<ul class='list-group'>
						<li class='list-group-item menu'>Gestionar:</li>
						<li class='list-group-item'><a href='usuarios.php'>Usuarios</a></li>
						<li class='list-group-item'><a href='articulos.php'>Articulos</a></li>
						</ul>

						</div>
						</article>";
					}else{
						echo "<h1 class='display-1'>¡Bienvenido!</h1>";
					}

			sectionFin();
			
	echo "</body>
			</html>";
 ?>