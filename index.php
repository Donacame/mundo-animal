<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mundo Animal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="inicio">

    <div class="fondo-bosque"></div>

    <!-- Barra de navegación (NO SE TOCA) -->
    <header class="navbar">
        <div class="logo">🐾Mundo Animal🐾</div>
        <nav>
            <a href="index.html" class="activo">Inicio</a>
            <a href="html/perros.html">Perros</a>
            <a href="html/gatos.html">Gatos</a>
            <a href="html/aves.html">Aves</a>
            <a href="html/salvajes.html">Salvajes</a>
            <a href="html/formulario.html">Registrar</a>
            <a href="ver_animales.php">Ver Animales</a>
            <a href="buscar.php">Buscar</a>
        </nav>
    </header>

    <!-- Título -->
    <section class="inicio-contenido">
        <h1 class="titulo-principal">Bienvenido al Mundo Animal</h1>
        <p class="subtitulo">Explora nuestras categorías</p>
    </section>

    <!-- NUEVAS CATEGORÍAS SOLO EN INICIO -->
    <section class="contenedor-tarjetas">

        <!-- Tarjeta 1 -->
        <div class="tarjeta">
            <img src="imagenes/MONARCA.jpg" alt="Insectos">
            <h3>Insectos</h3>
            <p>Pequeños, diversos y sorprendentes.</p>
            <a href="html/insectos.html" class="btn-ver">Ver más</a>
        </div>

        <!-- Tarjeta 2 -->
        <div class="tarjeta">
            <img src="imagenes/ZAZUL.avif" alt="Animales de granja">
            <h3>Animales de Granja</h3>
            <p>Caballos, vacas, ovejas y más.</p>
            <a href="html/granja.html" class="btn-ver">Ver más</a>
        </div>

        <!-- Tarjeta 3 -->
        <div class="tarjeta">
            <img src="imagenes/LINCE.avif" alt="Exóticos">
            <h3>Animales Exóticos</h3>
            <p>Raros, únicos y fascinantes.</p>
            <a href="html/exoticos.html" class="btn-ver">Ver más</a>
        </div>

        <!-- Tarjeta 4 -->
        <div class="tarjeta">
            <img src="imagenes/ARDILLA LISTADA.jpg" alt="Roedores">
            <h3>Roedores</h3>
            <p>Pequeños, ágiles y curiosos.</p>
            <a href="html/roedores.html" class="btn-ver">Ver más</a>
        </div>

    </section>

</body>
</html>
