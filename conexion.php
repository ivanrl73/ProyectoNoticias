<?php
function conectar() {
    $servername = "localhost"; 
    $username = "ivanuser";       
    $password = "root";         
    $dbname = "noticias_db";    

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
?>
