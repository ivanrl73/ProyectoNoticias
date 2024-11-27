<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Noticia</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: space-between;
            background-color: #444;
            padding: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background 0.3s;
        }
        nav a:hover {
            background-color: #555;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], textarea, select, input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #555;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Agregar Noticia</h1>
    </header>

    <!-- Barra de navegación común -->
    <nav>
        <a href="index.php">Inicio</a>
        <a href="gestion_noticias.php">Noticias</a>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="logout.php">Cerrar sesión</a>
    </nav>

    <div class="container">
        <h2>Agregar Nueva Noticia</h2>
        <form method="POST" action="procesar_noticia.php" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" required></textarea>
            
            <label for="categoria">Categoría:</label>
            <select name="categoria">
                <?php
                include 'conexion.php';
                $conn = conectar();
                $result = $conn->query("SELECT * FROM categorias");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>
            </select>
            
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" required>
            
            <button type="submit">Publicar</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema de Noticias. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
