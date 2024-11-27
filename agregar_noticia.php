<!DOCTYPE html>
<html>
<head>
    <title>Agregar Noticia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h2>Agregar Noticia</h2>
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
</body>
</html>
