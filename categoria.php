<?php
session_start();
include 'conexion.php';

$conn = conectar();

// Verificar si el usuario tiene permisos de administrador
if (!isset($_SESSION['user_id']) || $_SESSION['admin'] != 1) {
    // Redirigir si el usuario no tiene permisos
    header("Location: login.php");
    exit;
}

// Obtener las categorías desde la base de datos
$query = "SELECT * FROM categorias";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Administración</title>
    <link rel="stylesheet" href="style.css"> <!-- Asegúrate de tener el archivo de estilos -->
</head>
<body>
    <div class="navbar">
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="categorias.php">Categorías</a>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
    
    <div class="container">
        <h2>Lista de Categorías</h2>

        <!-- Mostrar las categorías en una tabla -->
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td>
                                <!-- Puedes agregar más acciones como editar o eliminar -->
                                <a href="editar_categoria.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                                <a href="eliminar_categoria.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay categorías registradas.</p>
        <?php endif; ?>
        
        <h3>Agregar Nueva Categoría</h3>
        <!-- Formulario para agregar una nueva categoría -->
        <form method="POST" action="procesar_categoria.php">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" name="nombre" required>
            <button type="submit">Agregar Categoría</button>
        </form>
    </div>
</body>
</html>
