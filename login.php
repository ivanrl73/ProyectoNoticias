<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="#">Inicio</a>
    </div>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="procesar_login.php">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
