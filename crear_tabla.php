<?php
include 'conexion.php'; 

try {
    $sql = "CREATE TABLE IF NOT EXISTS animales (
        id SERIAL PRIMARY KEY,
        animal_nombre VARCHAR(100) NOT NULL,
        animal_tipo VARCHAR(50) NOT NULL,
        animal_tipo_otro VARCHAR(100) DEFAULT NULL,
        animal_edad INT NOT NULL,
        dueno_nombre VARCHAR(100) NOT NULL,
        dueno_telefono VARCHAR(20) NOT NULL,
        dueno_correo VARCHAR(100) NOT NULL,
        dueno_direccion TEXT NOT NULL,
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    // Ahora usa $conexion
    $conexion->exec($sql);
    echo "<h1>¡Éxito!</h1>";
    echo "<p>La tabla <b>animales</b> se ha creado correctamente en Render.</p>";
} catch (PDOException $e) {
    echo "<h1>Error</h1>";
    echo "<p>No se pudo crear la tabla: " . $e->getMessage() . "</p>";
}
?>
