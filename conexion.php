<?php
// Lee la variable interna de Render
$database_url = getenv("DATABASE_URL"); 

if ($database_url) {
    // Configuración para el servidor de Render (PostgreSQL)
    $dbopts = parse_url($database_url);
    $host = $dbopts["host"];
    $port = $dbopts["port"];
    $user = $dbopts["user"];
    $pass = $dbopts["pass"];
    $dbname = ltrim($dbopts["path"], '/');
    
    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión en producción: " . $e->getMessage());
    }
} else {
    // Configuración en PC (XAMPP / Laragon con MySQ)
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=mascotas_db", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión local: " . $e->getMessage());
    }
}
?>
