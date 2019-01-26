<title>Articulos</title>
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

$conexion = conectar("localhost","root","","bd_hardware");
$sql = "SELECT cod,nombre,pvp,stock,foto,descripcion FROM producto ORDER BY nombre";
formatearTablaUTF($conexion);
$consultar = $conexion -> query($sql);

echo "
	<div class='container'>
<div class='row'>";

while ($fila = $consultar->fetch_assoc()) {
	
	// Listar los articulos
	echo "<form action='comprarProductoYModificar.php' method='GET' class='col-md-3'>
	<div class='card' style='width:200px'>
	<img class='card-img-top' src='".$fila['foto']."' style='width:100%' title='".$fila["cod"]."'>
	<div class='card-body'>
	<h4 class='card-title'>".$fila["nombre"]."</h4>
	";

	
	if ($_SESSION["Tipo"] != "Invitado" && $_SESSION["Tipo"] != "admin") {
		// Listar todos articulos y poder comprar
		echo "<h4 class='card-title'>Precio :".$fila["pvp"]."€</h4>
			<h4 class='card-title'>Stock :".$fila["stock"]."</h4>
			<input type='submit' class='btn btn-primary' name='comprar' value='Comprar'>
			<input type='hidden' name='cod' value='".$fila["cod"]."'>
			<input type='hidden' name='producto' value='".$fila["nombre"]."'>
			<input type='hidden' name='precio' value='".$fila["pvp"]."'>";
	}
	if ($_SESSION["Tipo"] == "admin") {
		echo "<input type='submit' class='btn btn-primary' name='modificar' value='Modificar'>
			<input type='hidden' name='modificar' value='".$fila["cod"]."'>";
	}
	echo "</div></div></form>";
}

echo "</div></div></div></div>";
/*if ($_SESSION["Tipo"] == "admin") {
	echo "<section class='container'><form action='insertarProducto.php' method='POST' class='col-md-12'>
		<input type='submit' class='btn btn-outline-dark btn-block' name='AñadorProducto' value='Insetar Producto'>
		<input type='submit' class='btn btn-outline-dark btn-block' name='ModificarProducto' value='Modificar Producto'>
	</form>";
}*/

echo "</div>
	</article><br><br>";
 ?>