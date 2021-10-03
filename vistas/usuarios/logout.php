<?php 

require '../../config/conexion.php';
session_start();
session_destroy();

require '../vistas/usuarios/login.php';
exit();


?>