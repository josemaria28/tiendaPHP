<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	echo "<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<title>TiendaP</title>";
				headi();
	echo "</head>
			<body>";
			menu();
			sectionInicio();
			$conexion = conectar("localhost","root","","bd_hardware");
			
			/*echo "<pre>";
			print_r($_GET);
			echo "</pre>";*/

			// Modificar Imagen
			if (isset($_GET["modificar"])) {
				$sql = "SELECT cod,pvp,stock,foto,descripcion FROM producto WHERE cod ='".$_GET["modificar"]."'";
				formatearTablaUTF($conexion);
				$consultar = $conexion -> query($sql);
				echo "<pre>";
			print_r($_GET);
			echo "</pre>";

				// echo "<form action='modificarArticulo.php' method='GET' enctype='multipart/form-data'>";
				echo "<form action='' method='GET' enctype='multipart/form-data'>";
				while ($fila = $consultar->fetch_assoc()) {
					echo "<h1 class='display-1'>Producto : ".$fila["cod"]."</h1>
						<input type='hidden' name='cod' value='".$fila["cod"]."'>
						<div class='form-group'>
							<label for='text'>Foto :</label>
							<input type='file' class='form-control-file' id='foto' name='foto' aria-describedby='fileHelp'>
						</div>
						<div class='form-group'>
							<label for='text'>Stock :</label>
							<input type='text' class='form-control col-md-10' id='text' name='stock' value='".$fila["stock"]."'>
						</div>
						<div class='form-group'>
							<label for='text'>Precio :</label>
							<input type='text' class='form-control col-md-10' id='text' name='precio' value='".$fila["pvp"]."'>
						</div>
						<div class='form-group'>
							<label for='pwd'>Descripcion :</label>
							<textarea class='form-control col-md-10' id='txt' name='descripcion' rows='5'>".$fila["descripcion"]."</textarea>
						</div>
					<input type='submit' class='btn btn-outline-dark col-md-10' name='aceptar' value='Aceptar'>";
				}
				echo "</form>";
			// }else{
				if (isset($_GET["cod"])) {
					// No hace nada
					$foto = $_FILES["foto"]["name"];
					$ruta = $_FILES["foto"]["tmp_name"];
					$destino = "imagenes/".$foto;
					copy($ruta, $destino); 

					$conexion = conectar("localhost","root","","bd_hardware");
					$sql = "UPDATE producto SET Descripcion='".$_GET["descripcion"]."',PVP='".$_GET["precio"]."',Stock='".$_GET["stock"]."',foto='".$destino."' WHERE COD='".$_GET["cod"]."'";
					$consultar = $conexion -> query($sql);
				}
			}
			
			// Comprar Producto
			if (isset($_GET["comprar"])) {
				
				/*echo "<pre>";
				print_r($_GET);
				echo "</pre>";*/
				/*echo "<pre><hr>";
				print_r($_SESSION);
				echo "</pre>";*/


				if (!isset($_GET['borrar'])){
					if (isset($_SESSION['producto'])){
						//no es el primer producto en la cesta
						//Compruebo si el producto estaba ya en la cesta
						if (in_array($_GET["producto"],$_SESSION["producto"])){
							$posicion=array_search($_GET["producto"],$_SESSION["producto"]);
							$_SESSION["unidades"][$posicion]++;
						}else{					
							//si el producto no estaba ya en la cesta
							$indice=$_SESSION["contador"];
							$_SESSION["contador"]++;
							$_SESSION["producto"][$indice]=$_GET["producto"];
							$_SESSION["precio"][$indice]=$_GET["precio"];
							$_SESSION["unidades"][$indice]=1;
							}
					}else{
						$_SESSION["contador"]=1;
						$_SESSION["producto"][0]=$_GET["producto"];
						$_SESSION["unidades"][0]=1;
						$_SESSION["precio"][0]=$_GET["precio"];
					}
					}else{
						$borrarindice=array_search($_GET["borrar"],$_SESSION["producto"]);
						unset($_SESSION["producto"][$borrarindice]);
						unset($_SESSION["unidades"][$borrarindice]);
						unset($_SESSION["precio"][$borrarindice]);
						$_SESSION["contador"]--;
				}

				if ($_SESSION["contador"]>0){
					mostrar();
				}else{
					header('Location: articulos.php');
					echo "Cesta vacía...<a href=index.php>Volver</a>";
				}
				echo "<pre>";
print_r($_SESSION['producto']);
echo "</pre>";



			}

			sectionFin();
			
	echo "</body>
			</html>";
	//header('Location: articulos.php');
 ?>