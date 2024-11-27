<?php
session_start();
include 'conexion.php';

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$categoria = $_POST['categoria'];
$usuario_id = $_SESSION['user_id'];
$imagen = $_FILES['imagen'];

$ruta_thumbnail = 'uploads/thumbnails/' . $imagen['name'];
$ruta_imagen_grande = 'uploads/full/' . $imagen['name'];

move_uploaded_file($imagen['tmp_name'], $ruta_imagen_grande);
copy($ruta_imagen_grande, $ruta_thumbnail);

$conn = conectar();
$query = $conn->prepare("INSERT INTO noticias (titulo, contenido, categoria_id, usuario_id, publicado) VALUES (?, ?, ?, ?, 1)");
$query->bind_param("ssii", $titulo, $contenido, $categoria, $usuario_id);
$query->execute();

$noticia_id = $conn->insert_id;
$query = $conn->prepare("INSERT INTO imagenes (noticia_id, ruta_thumbnail, ruta_imagen_grande) VALUES (?, ?, ?)");
$query->bind_param("iss", $noticia_id, $ruta_thumbnail, $ruta_imagen_grande);
$query->execute();

header("Location: admin_dashboard.php");
?>
