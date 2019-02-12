<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	echo "<pre>";
	print_r($_SESSION);
	/*print_r($_SESSION["precio"]);
	print_r($_SESSION["unidades"]);*/
	echo "</pre>";
	$totaPrecio = 0;
	foreach ($_SESSION["precio"] as $value) {
		$totaPrecio += $value; 
	}
	echo "Total Precio : ".$totaPrecio;

	// Insertar
	$conexion = conectar("localhost","root","","bd_hardware");
	// Buscamos el DNI
	$sqlDNI = "SELECT clientes.dni FROM pedidos INNER JOIN clientes ON pedidos.DNI=clientes.DNI WHERE clientes.Usuario = '".$_SESSION["Usuario"]."'";

	$dniUsuario = $conexion -> query($sqlDNI);
	$dni = $dniUsuario->fetch_assoc();
	echo " - ".$dni["dni"]." - <br>";
	// Insertamos Pedido
	$sqlPedido = "INSERT INTO pedidos(DNI, Fecha, Total_pedido) VALUES ('".$dni["dni"]."',CURRENT_TIMESTAMP,".$totaPrecio.")";
	echo $sqlPedido;
	//$conexion -> query($sqlPedido);
	// Insertamos todos las lineas
	foreach ($_SESSION["producto"] as $value) {
		$codArticulo = "SELECT cod FROM producto WHERE producto.nombre = '".$value."'";
		$sqlCodArticulo = $conexion -> query($codArticulo);
		$codArt = $sqlCodArticulo->fetch_assoc();
		echo "<hr>";
		echo $value." - - - ".$codArt["cod"];
		echo "<hr>";
		$sqlLinea = "INSERT INTO lineas(Num_Pedido, Num_linea, Producto, Cantidad) VALUES ()";
	}
	$sqlLinea = "";
	//$conexion -> query($sqlLinea);
	

	/*foreach ($_SESSION["producto"] as $indice=>$valor){
		echo $_SESSION["producto"][$indice]."<br>";
		echo $_SESSION["precio"][$indice]."<br>";
		echo $_SESSION["unidades"][$indice]."<br>";
	}*/



	// header('Location: articulos.php');
 ?>