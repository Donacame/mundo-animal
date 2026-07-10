<?php
include("conexion.php");

$busqueda = "";
$resultado = null;

if (isset($_GET['buscar'])) {
    $busqueda = $_GET['buscar'];

    $sql = "SELECT * FROM animales 
            WHERE nombre_animal LIKE '%$busqueda%' 
            OR tipo LIKE '%$busqueda%'
            OR otro_tipo LIKE '%$busqueda%'
            OR color LIKE '%$busqueda%'
            OR nombre_dueno LIKE '%$busqueda%'
            OR telefono LIKE '%$busqueda%'
            OR correo LIKE '%$busqueda%'
            OR direccion LIKE '%$busqueda%'";

    $resultado = $conexion->query($sql);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Animales - Mundo Animal</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="buscar">

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
            <a href="ver_animales.php">Ver Animales</a>
            <a href="buscar.php" class="activo">Buscar</a>
        </nav>
    </header>

    <!-- Título -->
    <section class="inicio-contenido">
        <h1 class="titulo-principal">Buscar Animales</h1>
        <p class="subtitulo">Encuentra animales por nombre, tipo o dueño</p>
    </section>

    <!-- Buscador -->
    <section class="buscar-contenedor">
        <form method="GET">
            <input type="text" name="buscar" placeholder="Escribe algo..." value="<?php echo $busqueda; ?>" required>
            <button type="submit">Buscar</button>
        </form>
    </section>

    <!-- Resultados -->
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
            if ($resultado !== null) {
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
                    echo "<tr><td colspan='9'>No se encontraron resultados.</td></tr>";
                }
            }
            ?>
        </table>
    </section>

</body>
</html>
