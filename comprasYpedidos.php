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
			$sql = "SELECT producto.COD, producto.nombre_corto, producto.PVP from clientes INNER JOIN pedidos on pedidos.DNI=clientes.DNI INNER JOIN lineas ON pedidos.Num_Pedido=lineas.Num_Pedido INNER JOIN producto ON producto.COD=lineas.Producto WHERE clientes.nombre='".$_SESSION["Usuario"]."'";
			formatearTablaUTF($conexion);
			$consultar = $conexion -> query($sql);
			echo '<table class="table table-condensed"
				<tr>
					<th>COD</th><th>Nombre</th><th>Precio</th></tr>';
			$sumaPVP = 0;
			while ($fila = $consultar->fetch_assoc()) {
				echo "<tr><td>".$fila["COD"]."</td>
						<td>".$fila["nombre_corto"]."</td>
						<td>".$fila["PVP"]."€</td></tr>";
				$sumaPVP += $fila["PVP"];
			}

			echo"</table>";

			sectionFin();
			
	echo "</body>
			</html>";
 ?>