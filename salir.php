<?php 
	session_cache_limiter();
	session_name("Tipo");
	session_start();
	unset($_SESSION["Tipo"]);
	session_destroy();
	header('Location: index.php');
 ?>