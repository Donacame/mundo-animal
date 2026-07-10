<?php
include("conexion.php");

// Recibir datos del formulario
$nombre_animal = $_POST['nombre_animal'];
$tipo = $_POST['tipo'];
$otro_tipo = isset($_POST['otro_tipo']) ? $_POST['otro_tipo'] : "";
$edad = $_POST['edad'];
$color = $_POST['color'];

$nombre_dueno = $_POST['nombre_dueno'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

// Si el tipo NO es "Otro", vaciamos el campo otro_tipo
if ($tipo !== "Otro") {
    $otro_tipo = "";
}

// Insertar en la base de datos
$sql = "INSERT INTO animales (nombre_animal, tipo, otro_tipo, edad, color, nombre_dueno, telefono, correo, direccion)
        VALUES ('$nombre_animal', '$tipo', '$otro_tipo', '$edad', '$color', '$nombre_dueno', '$telefono', '$correo', '$direccion')";

if ($conexion->query($sql) === TRUE) {
    echo "
    <script>
        alert('Animal registrado correctamente');
        window.location.href = '../html/formulario.html';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Error al registrar: " . $conexion->error . "');
        window.location.href = '../html/formulario.html';
    </script>
    ";
}

$conexion->close();
?>
