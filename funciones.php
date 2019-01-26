<?php 
	// Head Documento
	function headi(){
		echo "
		<meta charset='utf-8'>
		<link rel='icon' type='image/png' href='imagenes/front-store.png' />
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
		<link href='https://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet'>
		<link rel='stylesheet' type='text/css' href='estilos.css'>
		";
	}
	// Menu de inicio
	function menu(){
		echo "
		<nav class='navbar navbar-expand-sm navbar-dark fixed-top row'>
		<a class='col-md-6 navbar-brand' href='index.php'>
		<img src='imagenes/front-store.png' alt='logo' style='width:40px;'>
		</a>
		<ul class='navbar-nav col-md-6 row'>
		<li class='nav-item col-md-3'>
		<a class='nav-link' href='articulos.php'>Articulos</a>
		</li>
		<li class='nav-item col-md-2'>
		<a class='nav-link' href='carro.php'>Carro</a>
		</li>
		<li class='nav-item col-md-2'>
		<a class='nav-link' href='registro.php'>Login</a>
		</li>
		<li class='nav-item col-md-3'>
		<a class='nav-link' href='deslogear.php'>Cerrar Sesion</a>
		</li>
		</ul>	
		</nav>
		";
		
	}
	// Seccion/Contenido
	function sectionInicio(){
		echo "<section class='container'>
				<article class='row'>
				<div class='col-md-12'>";
	}
	function sectionFin(){
		echo "</div></article>";
	}

	// Conectar
	function conectar($host,$usuario,$password,$basedatos){
	if ($conexion=@new mysqli($host,$usuario,$password,$basedatos))
		return $conexion;
	else
		return mysqli_connect_error();
	}
	// Formatear La Tabla
	function formatearTablaUTF($conexion){
		return mysqli_set_charset($conexion,"utf8");
	}
 ?>