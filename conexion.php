<?php
$database_url = getenv("DATABASE_URL"); 

if ($database_url) {
    // Configuración para Render (PostgreSQL)
    $dbopts = parse_url($database_url);
    
    $host = $dbopts["host"] ?? null;
    $port = $dbopts["port"] ?? 5432; 
    $user = $dbopts["user"] ?? null;
    $pass = $dbopts["pass"] ?? null;
    $dbname = isset($dbopts["path"]) ? ltrim($dbopts["path"], '/') : null;
    
    try {
        // Cambiamos el nombre de la variable a $conexion
        $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión en producción: " . $e->getMessage());
    }
} else {
    // Configuración local (MySQL) usando también $conexion
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=mascotas_db", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión local: " . $e->getMessage());
    }
}
?>
