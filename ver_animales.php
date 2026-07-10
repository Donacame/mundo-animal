<?php
include("conexion.php");

$sql = "SELECT * FROM animales";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Animales - Mundo Animal</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="ver">

    <div class="fondo-bosque"></div>

    <!-- Barra de navegación -->
    <header class="navbar">
        <div class="logo">🐾Mundo Animal🐾</div>
        <nav>
            <a href="../index.php">Inicio</a>
            <a href="../html/perros.html">Perros</a>
            <a href="../html/gatos.html">Gatos</a>
            <a href="../html/aves.html">Aves</a>
            <a href="../html/salvajes.html">Salvajes</a>
            <a href="../html/formulario.html">Registrar</a>
            <a href="ver_animales.php" class="activo">Ver Animales</a>
            <a href="buscar.php">Buscar</a>
        </nav>
    </header>

    <!-- Título -->
    <section class="inicio-contenido">
        <h1 class="titulo-principal">Animales Registrados</h1>
        <p class="subtitulo">Lista completa de animales y sus dueños</p>
    </section>

    <!-- Tabla -->
    <section class="tabla-contenedor">
        <table>
            <tr>
                <th>ID</th>
                <th>Animal</th>
                <th>Tipo</th>
                <th>Edad</th>
                <th>Color</th>
                <th>Dueño</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
            </tr>

            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$fila['id']."</td>";
                    echo "<td>".$fila['nombre_animal']."</td>";
                    echo "<td>".$fila['tipo']."</td>";
                    echo "<td>".$fila['edad']."</td>";
                    echo "<td>".$fila['color']."</td>";
                    echo "<td>".$fila['nombre_dueno']."</td>";
                    echo "<td>".$fila['telefono']."</td>";
                    echo "<td>".$fila['correo']."</td>";
                    echo "<td>".$fila['direccion']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay animales registrados.</td></tr>";
            }
            ?>
        </table>
    </section>

</body>
</html>
