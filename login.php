<title>Login</title>
<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	include("funciones.php");

	if (!isset($_SESSION["Tipo"])) {
		$_SESSION["Usuario"] = "Invitado";
	}

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

			echo "<div class='row'><div class='col-md-6'>
			<form action='acceder.php' method='POST'>
				<h1>Acceder :</h1>
				<div class='form-group'>
					<label for='text'>Usuario:</label>
					<input type='text' class='form-control col-md-8' id='text' name='usuario'>
				</div>
				<div class='form-group'>
					<label for='pwd'>Password:</label>
					<input type='password' class='form-control col-md-8' id='pwd' name='password'>
				</div>
				<input type='submit' class='btn btn-primary' name='aceptarAcceder' value='Acceder'>
				<input type='reset' class='btn btn-danger' name='cancelarAccesder' value='Cancelar'>
			</form>
		</div>
		<div class='col-md-6'>
			<form action='registrar.php' method='POST'>
				<h1>Registrate :</h1>
				<div class='form-group'>
					<label for='text'>DNI :<span class='obligatorio' title='Este campo es obligatorio de rellenar'>*</span></label>
					<input type='text' class='form-control col-md-8' id='text' name='rDni'>
				</div>
				<div class='form-group'>
					<label for='text'>Nombre :<span class='obligatorio' title='Este campo es obligatorio de rellenar'>*</span></label>
					<input type='text' class='form-control col-md-8' id='text' name='rNombre'>
				</div>
				<div class='form-group'>
					<label for='text'>Dirección :<span class='obligatorio' title='Este campo es obligatorio de rellenar'>*</span></label>
					<input type='text' class='form-control col-md-8' id='text' name='rDireccion'>
				</div>
				<div class='form-group'>
					<label for='text'>Usuario :<span class='obligatorio' title='Este campo es obligatorio de rellenar'>*</span></label>
					<input type='text' class='form-control col-md-8' id='text' name='rUsuario'>
				</div>
				<div class='form-group'>
					<label for='pwd'>Password :<span class='obligatorio' title='Este campo es obligatorio de rellenar'>*</span></label>
					<input type='password' class='form-control col-md-8' id='pwd' name='rPassword'>
				</div>
				<input type='submit' class='btn btn-primary' name='aceptarRegistro' value='Registrar'>
				<input type='reset' class='btn btn-danger' name='cancelarRegistro' value='Cancelar'>
			</form>
		</div></div>";

			sectionFin();
			
	echo "</body>
			</html>";
 ?>