<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h2>Gestión de Usuarios</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            <?php
            include 'conexion.php';
            $conn = conectar();
            $result = $conn->query("SELECT * FROM usuarios");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . ($row['activo'] ? 'Sí' : 'No') . "</td>";
                echo "<td>
                    <a href='editar_usuario.php?id=" . $row['id'] . "'>Editar</a>
                    <a href='eliminar_usuario.php?id=" . $row['id'] . "'>Eliminar</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
