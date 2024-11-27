<?php
// Incluimos el archivo de conexión
include 'conexion.php';
$conexion = conectar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Noticias</title>
    <style>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f9;
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
        .add-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background 0.3s;
        }
        .add-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gestión de Noticias</h1>
    </header>
    <nav>
        <a href="index.php">Regresar al Inicio</a>
        <a href="agregar_noticia.php" class="add-button">Añadir Noticia</a>
    </nav>
    <div class="container">
        <h2>Noticias Publicadas</h2>
        <?php
        // Consulta para obtener todas las noticias junto con categorías y usuarios
        $query = "
            SELECT 
                n.id, 
                n.titulo, 
                n.contenido, 
                n.fecha_creacion, 
                u.nombre AS usuario, 
                c.nombre AS categoria, 
                n.publicado, 
                n.visitas 
            FROM noticias n
            JOIN usuarios u ON n.usuario_id = u.id
            JOIN categorias c ON n.categoria_id = c.id
            WHERE n.activo = 1
        ";
        $result = $conexion->query($query);

        if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Creador</th>
                        <th>Fecha</th>
                        <th>Publicado</th>
                        <th>Visitas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                            <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                            <td><?php echo $row['fecha_creacion']; ?></td>
                            <td><?php echo $row['publicado'] ? 'Sí' : 'No'; ?></td>
                            <td><?php echo $row['visitas']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay noticias registradas.</p>
        <?php endif; ?>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema de Noticias. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
