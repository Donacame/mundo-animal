<?php
include 'conexion.php'; 

try {
    $sql = "CREATE TABLE IF NOT EXISTS animales (
        id SERIAL PRIMARY KEY,
        nombre_animal VARCHAR(100) NOT NULL,
        tipo VARCHAR(50) NOT NULL,
        tipo_otro VARCHAR(100) DEFAULT NULL,
        edad INT NOT NULL,
        color VARCHAR(50) DEFAULT NULL,
        nombre_dueno VARCHAR(100) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        correo VARCHAR(100) NOT NULL,
        direccion TEXT NOT NULL,
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    $conexion->exec($sql);
    echo "<h1>¡Éxito! Tabla actualizada con éxito.</h1>";
} catch (PDOException $e) {
    echo "<h1>Error</h1><p>" . $e->getMessage() . "</p>";
}
?>
