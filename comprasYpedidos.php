<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	echo "<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<title>Compras</title>";
				headi();
	echo "</head>
			<body>";
			menu();
			sectionInicio();

			$conexion = conectar("localhost","root","","bd_hardware");
			$sql = "SELECT clientes.nombre,nombre_corto,pvp from clientes INNER JOIN pedidos on pedidos.DNI=clientes.DNI INNER JOIN lineas ON pedidos.Num_Pedido=lineas.Num_Pedido INNER JOIN producto ON producto.COD=lineas.Producto WHERE clientes.nombre='".$_SESSION["Usuario"]."'";
			formatearTablaUTF($conexion);
			$consultar = $conexion -> query($sql);

			while ($fila = $consultar->fetch_assoc()) {
				
			}

			sectionFin();
			
	echo "</body>
			</html>";
 ?>