<?php
session_cache_limiter();
//session_name('producto');
session_start();
unset($_SESSION['producto']);
echo "<pre>";
print_r($_SESSION['producto']);
echo "</pre>";
// unset($_SESSION["contador"]);
// unset($_SESSION["unidades"]);
session_destroy();
//header('Location: articulos.php');
?>
