<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Crear conexión
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    echo "Conexión exitosa";
} catch (mysqli_sql_exception $e) {
    echo "Error de conexión: " . $e->getMessage();
}

if ($conn) {
    $conn->close();
}
?>