<title>Registro</title>
<?php 
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/

session_cache_limiter();
session_name("Tipo");
session_start();
include("funciones.php");
headi();
menu();
echo "<section class='container'>
	<article class='row'>
	<div class='col-md-12'>";

$dni = $_POST["rDni"];
$nombre = $_POST["rNombre"];
$direccion = $_POST["rDireccion"];
$usuario = $_POST["rUsuario"];
$contraseña = $_POST["rPassword"];

if ($dni != "" && $nombre != "" && $direccion != "" && $usuario != "" && $contraseña != "") {
	$conexion = conectar("localhost","root","","bdhardware");
	$sql = "INSERT INTO clientes(DNI, Nombre, Direccion, usuario, Password, Tipo) VALUES ('".$dni."','".$nombre."','".$direccion."','".$usuario."','".$contraseña."','usuario')";
	formatearTablaUTF($conexion);
	$consultar = $conexion -> query($sql);

	$_SESSION["Tipo"] = "usuario";
	$_SESSION["Usuario"] = $usuario;

	echo "<h1 class='display-1'>Usuario ".$usuario." registrado.</h1>";
	//echo $_SESSION["Tipo"];
	//$consultar->close();
	$conexion->close();
}else{
	echo "<h1 class='display-1'>Imposible de registrar este usuario, debe rellenar todos los campos. <br>¡Gracias!</h1>";
}

echo "</div>
	</article>";
//header('Location: registro.php');
 ?>