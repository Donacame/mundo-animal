<?php
$database_url = getenv("DATABASE_URL"); 

if ($database_url) {
    // Configuración para Render (PostgreSQL)
    $dbopts = parse_url($database_url);
    
    $host = $dbopts["host"] ?? null;
    // Si Render no da puerto explícito, PostgreSQL usa el 5432 por defecto
    $port = $dbopts["port"] ?? 5432; 
    $user = $dbopts["user"] ?? null;
    $pass = $dbopts["pass"] ?? null;
    $dbname = isset($dbopts["path"]) ? ltrim($dbopts["path"], '/') : null;
    
    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión en producción: " . $e->getMessage());
    }
} else {
    // Configuración local XAMPP/Laragon (MySQL)
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=mascotas_db", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión local: " . $e->getMessage());
    }
}
?>
