<?php
include 'conexion.php';
$conexion = conectar();
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE email = ? AND activo = 1";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['usuario'] = $user['id'];
            $_SESSION['admin'] = $user['admin']; // Guardar si es admin
            $_SESSION['nombre'] = $user['nombre'];    // Guardar el nombre para personalizar
            header("Location: index.php");
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .nav-bar {
            display: flex;
            justify-content: center;
            background-color: #444;
            padding: 10px;
        }
        .nav-bar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background 0.3s;
        }
        .nav-bar a:hover {
            background-color: #555;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 50px auto; /* Espaciado para que esté centrado */
        }
        .form-container h1 {
            margin: 0 0 20px;
            text-align: center;
            color: #333;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container form input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container form button {
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .form-container form button:hover {
            background-color: #555;
        }
        .error {
            color: red;
            text-align: center;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación arriba -->
    <div class="nav-bar">
        <a href="index.php">Inicio</a>
        <a href="noticias.php">Noticias</a>
        <a href="categorias.php">Categorías</a>
        <a href="usuarios.php">Usuarios</a>
    </div>

    <!-- Formulario de login -->
    <div class="form-container">
        <h1>Iniciar Sesión</h1>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
        <div class="register-link">
            <p>¿No tienes cuenta? <a href="registrar_usuario.php">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>
