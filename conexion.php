<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "mundo_animal";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Asegurar UTF-8 para acentos y ñ
$conexion->set_charset("utf8");
?>
