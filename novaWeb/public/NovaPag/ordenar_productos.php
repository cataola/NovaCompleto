<?php
// Conexión a la base de datos (ajusta los datos de conexión)
require_once 'conexion.php';

function obtenerProductos($orden = null, $categoria = null) {
    global $conn;

    $sql = "SELECT * FROM productos";

    if ($orden || $categoria) {
        $sql .= " WHERE 1"; // Siempre se cumple para agregar las condiciones
    }

    if ($orden) {
        $ordenarPor = substr($orden, 0, -4);
        $ordenDir = substr($orden, -3);
        $sql .= " ORDER BY $ordenarPor $ordenDir";
    }

    if ($categoria) {
        $sql .= " AND categoria = '$categoria'";
    }

    $result = $conn->query($sql);
    $productos = array();

    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    return $productos;
}

// Obtener productos ordenados por precio ascendente y filtrados por categoría "Frutas"
$productos = obtenerProductos('precio-asc', 'Frutas');

// Codificar los productos en JSON para enviarlos al frontend
$productosJSON = json_encode($productos);
?>