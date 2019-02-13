<title>Mis Datos</title>
<?php 

session_cache_limiter();
session_name("Tipo");
session_start();
include("funciones.php");
headi();
menu();

echo "<section class='container'>
	<article class='row'>
	<div class='col-md-12'>";

//echo $_SESSION["Usuario"];

	$conexion = conectar("localhost","root","","bdhardware");
	$sql = "SELECT nombre, direccion, usuario, password FROM clientes WHERE usuario='".$_SESSION["Usuario"]."'";
	$consultar = $conexion -> query($sql);
	echo "<form action='modificarUsuario.php' method='POST'>";
		if ($fila = $consultar->fetch_assoc()) {
			echo "<h1 class='display-1'>Usuario : ".$fila["usuario"]."</h1>
			<div class='form-group'>
				<label for='text'>Nombre:</label>
				<input type='text' class='form-control col-md-8' id='text' name='nombre' value='".$fila["nombre"]."'>
			</div>
			<div class='form-group'>
				<label for='text'>Dirección:</label>
				<input type='text' class='form-control col-md-8' id='text' name='direccion' value='".$fila["direccion"]."'>
			</div>
				<div class='form-group'>
					<label for='pwd'>Password:</label>
					<input type='password' class='form-control col-md-8' id='pwd' name='password' value='".$fila["password"]."'>
				</div>
				<input type='submit' class='btn btn-outline-dark col-md-8' name='acceder' value='Cambiar'>";
		

		
		}
$consultar->close();
$conexion->close();
echo "</form>
</div>
	</article>";
 ?>