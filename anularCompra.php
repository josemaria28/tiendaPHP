<?php
session_cache_limiter();
session_name("Tipo");
session_start();
echo "<pre>";
print_r($_SESSION['producto']);
echo "</pre>";
unset($_SESSION['producto']);

// unset($_SESSION["contador"]);
// unset($_SESSION["unidades"]);
//session_destroy();
header('Location: articulos.php');
?>
