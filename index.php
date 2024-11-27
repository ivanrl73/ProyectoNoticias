<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Noticias - Inicio</title>
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
            justify-content: center;
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
        <h1>Sistema de Noticias</h1>
        <p>Bienvenido a nuestro periódico en línea</p>
    </header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="login.php">Iniciar Sesión</a>
        <a href="noticias.php">Noticias</a>
        <a href="categorias.php">Categorías</a>
        <a href="usuarios.php">Usuarios</a>
        <a href="admin.php">Panel Admin</a>
    </nav>
    <div class="container">
        <h2>Página Principal</h2>
        <p>¡Bienvenido al Sistema de Noticias! Aquí podrás encontrar las últimas noticias, gestionar usuarios, categorías y mucho más. Por favor, inicia sesión para acceder a los módulos administrativos.</p>
        <h3>Noticias Destacadas</h3>
        <p>Consulta las noticias más importantes en nuestra página pública.</p>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema de Noticias. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
