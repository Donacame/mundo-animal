<?php
include("conexion.php");

$nombre_animal = $_POST['nombre_animal'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$otro_tipo = isset($_POST['otro_tipo']) ? $_POST['otro_tipo'] : "";
$edad = $_POST['edad'] ?? 0;
$color = $_POST['color'] ?? '';

$nombre_dueno = $_POST['nombre_dueno'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';

if ($tipo !== "Otro") {
    $otro_tipo = null;
}

try {
    $sql = "INSERT INTO animales (nombre_animal, tipo, tipo_otro, edad, color, nombre_dueno, telefono, correo, direccion)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql);
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
    $mensaje_error = addslashes($e->getMessage());
    echo "
    <script>
        alert('Error al registrar: " . $mensaje_error . "');
        window.location.href = '../html/formulario.html';
    </script>
    ";
}

$conexion = null;
?>
