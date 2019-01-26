<?php
session_cache_limiter();
session_start();
unset("cesta");
header('Location: articulos.php');
?>
