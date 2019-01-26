<title>Usuarios</title>
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
	$sql = "SELECT dni,usuario, nombre, tipo, direccion FROM clientes WHERE tipo='usuario'";
	formatearTablaUTF($conexion);
	$consultar = $conexion -> query($sql);
	echo "<form method='get' action='borrarUsuario.php'>";

	echo "<table class='table table-striped table-bordered text-center'>
    <thead><tr><th>DNI</th>
    	<th>Usuario</th>
        <th>Nombre</th>
        <th>Direccion</th>
      </tr>
    </thead>
    <tbody>";
    while ($fila = $consultar->fetch_assoc()) {
		echo "<tr>
		<td>".$fila["dni"]."</td>
		<td>".$fila["usuario"]."</td>
        <td>".$fila["nombre"]."</td>
        <td>".$fila["direccion"]."</td>

      </tr>";
	}
    echo "</tbody>
  </table></form></div>
	</article>";
	
$consultar->close();
$conexion->close();
	//header('Location: usuarios.php');

?>