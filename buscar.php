<?php
include("conexion.php");

// Inicializamos la variable de filas para que no de error si no se busca nada
$filas = [];
$busqueda = $_GET['busqueda'] ?? ''; // Cambia 'busqueda' por el nombre de input de buscar si es diferente

if (!empty($busqueda)) {
    try {
        // Uso de marcadores seguros con PDO
        $sql = "SELECT * FROM animales WHERE 
                nombre_animal ILIKE ? OR 
                tipo ILIKE ? OR 
                tipo_otro ILIKE ? OR 
                color ILIKE ? OR 
                nombre_dueno ILIKE ?";
        
        $stmt = $conexion->prepare($sql);
        
        // El término de búsqueda con los porcentajes para el operador LIKE
        $termino = "%" . $busqueda . "%";
        
        // Ejecuta la consulta pasando el término para cada columna de forma segura
        $stmt->execute([$termino, $termino, $termino, $termino, $termino]);
        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        die("Error al buscar en la base de datos: " . $e->getMessage());
    }
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
            <a href="ver_animales.php">Ver Animales</a>
            <a href="buscar.php" class="activo">Buscar</a>
        </nav>
    </header>

    <!-- Título -->
    <section class="inicio-contenido">
        <h1 class="titulo-principal">Buscar Animales</h1>
        <p class="subtitulo">Encuentra registros por nombre, tipo, color o dueño</p>
    </section>

    <!-- Formulario de Búsqueda -->
    <section class="tabla-contenedor" style="margin-bottom: 20px; text-align: center;">
        <form action="buscar.php" method="GET">
            <input type="text" name="busqueda" value="<?php echo htmlspecialchars($busqueda); ?>" placeholder="Escribe para buscar..." style="padding: 10px; width: 60%; border-radius: 5px; border: 1px solid #ccc;">
            <button type="submit" style="padding: 10px 20px; background-color: #2e7d32; color: white; border: none; border-radius: 5px; cursor: pointer;">Buscar</button>
        </form>
    </section>

    <!-- Tabla de Resultados -->
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
            if (!empty($busqueda)) {
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
                    echo "<tr><td colspan='9'>No se encontraron resultados para '" . htmlspecialchars($busqueda) . "'.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Ingresa un término para empezar a buscar.</td></tr>";
            }
            ?>
        </table>
    </section>

</body>
</html>
