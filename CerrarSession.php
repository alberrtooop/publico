<?php
// Iniciar sesion 
session_start();
UNSET($_SESSION["Validacion"]);
session_destroy();

header("location:index.php");
?>