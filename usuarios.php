<?php
// Este archivo es un ejemplo básico para gestionar usuarios.
// Asegúrate de que los datos de conexión a la base de datos sean correctos.
include 'conexion.php'; // Archivo que establece la conexión a la base de datos.
$conexion = conectar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
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
            max-width: 900px;
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
    </style>
</head>
<body>
    <header>
        <h1>Gestión de Usuarios</h1>
    </header>
    <nav>
        <a href="index.php">Regresar al Inicio</a>
    </nav>
    <div class="container">
        <h2>Usuarios Registrados</h2>
        <?php
        // Consulta para obtener todos los usuarios
        $query = "SELECT id, nombre, correo, activo FROM usuarios";
        $result = $conexion->query($query);

        if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Activo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['correo']; ?></td>
                            <td><?php echo $row['activo'] ? 'Sí' : 'No'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay usuarios registrados.</p>
        <?php endif; ?>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema de Noticias. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
