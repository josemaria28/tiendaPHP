<title>Acceso</title>
<?php 
session_cache_limiter();
session_name("Tipo");
session_start();
include("funciones.php");
	headi();
	menu();

	$usuario = $_POST["usuario"];
	$contraseña = $_POST["password"];

	$error = "<h1 class='display-1'>El usuario no existe...</h1><br><br>
		<p class='display-4'><mark>Registrese para poder comprar.
		¡Gracias!</mark></p>";
	if ($usuario != "" && $contraseña != "") {
		$conexion = conectar("localhost","root","","bdhardware");
		$sql = "SELECT usuario, password, tipo FROM clientes WHERE usuario='".$usuario."' and password ='".$contraseña."'";
		$consultar = $conexion -> query($sql);
		$fila = $consultar->fetch_assoc();
		if ($fila>0) {
			$_SESSION["Usuario"] = $fila["usuario"];
			$_SESSION["Tipo"] = $fila["tipo"];
			//echo $inicio."<h1 class='display-1'>Bienvenido/a : ".$fila["tipo"]."</h1>".$fin;
			header('Location: index.php');
			//$_SESSION["Tipo"]["usuario"] = $fila["usuario"];
			$consultar->close();
			$conexion->close();
		}else
			echo $inicio.$error.$fin;
	}else{
		echo $inicio.$error.$fin;
	}

// echo "Tipos : ".$_SESSION["Tipo"];

	if ($usuario == "admin" && $contraseña == "admin") {
		echo $inicio."
		<ul class='list-group'>
		<li class='list-group-item menu'>Gestionar:</li>
		<li class='list-group-item'><a href='usuarios.php'>Usuario</a></li>
		<li class='list-group-item'><a href='articulos.php'>Articulos</a></li>
		</ul> ".$fin;
	}

 ?>