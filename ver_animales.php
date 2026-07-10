<?php
include("conexion.php");

try {
    // 1. Consulta limpia y compatible con PDO para Render
    $sql = "SELECT * FROM animales ORDER BY id DESC";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    
    // 2. Guardamos todos los animales en la variable $filas
    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al consultar la base de datos: " . $e->getMessage());
}
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
            // 3. Revisamos si hay datos guardados en $filas
            if (count($filas) > 0) {
                foreach ($filas as $fila) {
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($fila['id'])."</td>";
                    echo "<td>".htmlspecialchars($fila['nombre_animal'])."</td>";
                    echo "<td>".htmlspecialchars($fila['tipo'])."</td>";
                    echo "<td>".htmlspecialchars($fila['edad'])."</td>";
                    echo "<td>".htmlspecialchars($fila['color'])."</td>";
                    echo "<td>".htmlspecialchars($fila['nombre_dueno'])."</td>";
                    echo "<td>".htmlspecialchars($fila['telefono'])."</td>";
                    echo "<td>".htmlspecialchars($fila['correo'])."</td>";
                    echo "<td>".htmlspecialchars($fila['direccion'])."</td>";
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
