<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	/*echo "<pre>";
	print_r($_SESSION);
	print_r($_SESSION["precio"]);
	print_r($_SESSION["unidades"]);
	echo "</pre>";*/
	$totaPrecio = 0;
	foreach ($_SESSION["precio"] as $value) {
		$totaPrecio += $value; 
	}
	echo "Total Precio : ".$totaPrecio;

	// Insertar
	$conexion = conectar("localhost","root","","bdhardware");
	// Buscamos el DNI
	$sqlDNI = "SELECT dni FROM clientes WHERE clientes.Usuario =  '".$_SESSION["Usuario"]."'";

	$dniUsuario = $conexion -> query($sqlDNI);
	$dni = $dniUsuario->fetch_assoc();
	echo $sqlDNI." - ".$dni["dni"]." - <br>";

	// Insertamos Pedido
	$sqlPedido = "INSERT INTO pedidos(DNI, Fecha, Total_pedido) VALUES ('".$dni["dni"]."',CURRENT_TIMESTAMP,".$totaPrecio.")";
	echo $sqlPedido;
	$conexion -> query($sqlPedido);

	// Numero Pedido
	$sqlNPedido = "SELECT MAX(Num_Pedido) AS nPedido FROM pedidos";
	$rNPedido = $conexion -> query($sqlNPedido);
	$pedido = $rNPedido->fetch_assoc();

	echo $pedido["nPedido"];


	// Insertamos todos las lineas
	foreach ($_SESSION["producto"] as $indice => $value) {
		$codArticulo = "SELECT cod FROM producto WHERE producto.nombre = '".$value."'";
		$sqlCodArticulo = $conexion -> query($codArticulo);
		$codArt = $sqlCodArticulo->fetch_assoc();

		$sqlLinea = "INSERT INTO lineas(Num_Pedido, Num_linea, Producto, Cantidad) VALUES (".$pedido["nPedido"].",".$indice.", '".$codArt["cod"]."',".$_SESSION["unidades"][$indice].")";
		echo $sqlLinea."<br>";
		$conexion -> query($sqlLinea);
	}
	

	/*foreach ($_SESSION["producto"] as $indice=>$valor){
		echo $_SESSION["producto"][$indice]."<br>";
		echo $_SESSION["precio"][$indice]."<br>";
		echo $_SESSION["unidades"][$indice]."<br>";
	}*/



	header('Location: articulos.php');
	header('Location: anularCompra.php');
 ?>