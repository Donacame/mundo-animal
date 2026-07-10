<?php
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');

$conn = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass");

if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

// Asegurar UTF-8 para acentos y ñ
$conexion->set_charset("utf8");
?>
