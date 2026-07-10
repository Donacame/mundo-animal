<?php<?php
include("conexion.php");

// Recibir datos del formulario
$nombre_animal = $_POST['nombre_animal'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$otro_tipo = isset($_POST['otro_tipo']) ? $_POST['otro_tipo'] : "";
$edad = $_POST['edad'] ?? 0;
$color = $_POST['color'] ?? '';

$nombre_dueno = $_POST['nombre_dueno'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';

// Si el tipo NO es "Otro", vaciamos el campo otro_tipo
if ($tipo !== "Otro") {
    $otro_tipo = null; // PostgreSQL maneja mejor null que cadenas vacías en estos casos
}

try {
    // Insertar en la base de datos de forma segura con marcadores (?)
    $sql = "INSERT INTO animales (nombre_animal, tipo, tipo_otro, edad, color, nombre_dueno, telefono, correo, direccion)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql);
    
    // Ejecutamos pasando las variables de forma segura
    $stmt->execute([
        $nombre_animal, 
        $tipo, 
        $otro_tipo, 
        $edad, 
        $color, 
        $nombre_dueno, 
        $telefono, 
        $correo, 
        $direccion
    ]);

    echo "
    <script>
        alert('Animal registrado correctamente');
        window.location.href = '../html/formulario.html';
    </script>
    ";

} catch (PDOException $e) {
    // Si hay un error, lo capturamos de forma segura aquí
    $mensaje_error = addslashes($e->getMessage());
    echo "
    <script>
        alert('Error al registrar: " . $mensaje_error . "');
        window.location.href = '../html/formulario.html';
    </script>
    ";
}

// Cerramos la conexión de forma correcta en PDO
$conexion = null;
?>
