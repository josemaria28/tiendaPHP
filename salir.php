<?php 
	session_cache_limiter();
	session_name("Usuario");
	session_start();
	unset($_SESSION["Usuario"]);
	session_destroy();
	header('Location: index.php');
 ?>