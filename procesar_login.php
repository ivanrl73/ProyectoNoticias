<?php
session_start();
include 'conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];

$conn = conectar();
$query = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND activo = 1");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['admin'];
        header("Location: admin_dashboard.php");
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado o inactivo.";
}
?>
