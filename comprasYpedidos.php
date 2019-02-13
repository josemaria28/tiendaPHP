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
	echo "<h1 class='display-1'>Productos Pedidos.</h1><br>";

	$conexion = conectar("localhost","root","","bdhardware");
				// Buscamos el DNI
	$sqlDNI = "SELECT dni FROM clientes WHERE clientes.Usuario =  '".$_SESSION["Usuario"]."'";

	$dniUsuario = $conexion -> query($sqlDNI);
	$dni = $dniUsuario->fetch_assoc();

	$sql = "SELECT Num_Pedido, fecha, Total_pedido FROM pedidos WHERE DNI='".$dni["dni"]."'";

	// $sql2 = "SELECT producto.Nombre, lineas.Cantidad, pedidos.Num_Pedido FROM clientes INNER JOIN pedidos ON clientes.DNI=pedidos.DNI INNER JOIN lineas ON pedidos.Num_Pedido=lineas.Num_Pedido INNER JOIN producto ON lineas.Producto=producto.COD WHERE clientes.nombre='".$_SESSION["Usuario"]."'";
	//echo $sql2;
	formatearTablaUTF($conexion);
	$consultar = $conexion -> query($sql);
	// $consultar2 = $conexion -> query($sql2);
	echo '<table class="table"
	<tr>
	<th>Fecha</th><th>Precio</th></tr>';
	while ($fila = $consultar->fetch_assoc()) {
		echo "<tr><td><mark>".$fila["fecha"]."</mark></td>
		<td>".$fila["Total_pedido"]."€</td></tr>
		<tr><td>";
		echo '<table class="table table-condensed"
	<tr>
	<th>Preoducto</th><th>Cantidad</th></tr>';
	$sql2 = "SELECT producto.Nombre,pedidos.Num_Pedido, lineas.Cantidad FROM clientes INNER JOIN pedidos ON clientes.DNI=pedidos.DNI INNER JOIN lineas ON pedidos.Num_Pedido=lineas.Num_Pedido INNER JOIN producto ON lineas.Producto=producto.COD WHERE pedidos.Num_Pedido='".$fila["Num_Pedido"]."' AND clientes.nombre='".$_SESSION["Usuario"]."'";
	$consultar2 = $conexion -> query($sql2);
		while ($fila2 = $consultar2->fetch_assoc()) {
			echo "<tr><td>".$fila2["Nombre"]."</td><td>".$fila2["Cantidad"]."</td>";
		}
		echo "</td></tr>";
		echo "</table>";
	}
	echo "</td></tr>";
	//echo $sql;

	
	
	echo"</table>";
	sectionFin();

	echo "</body>
	</html>";
	?>