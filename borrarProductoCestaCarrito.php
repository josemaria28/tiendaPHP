<?php 
session_cache_limiter();
session_name("Tipo");
session_start();
/*echo $_GET["borrar"];*/

$borrarindice=array_search($_GET["borrar"],$_SESSION["producto"]);
unset($_SESSION["producto"][$borrarindice]);
unset($_SESSION["unidades"][$borrarindice]);
unset($_SESSION["precio"][$borrarindice]);
$_SESSION["contador"]--;


header('Location: carrito.php');
 ?>