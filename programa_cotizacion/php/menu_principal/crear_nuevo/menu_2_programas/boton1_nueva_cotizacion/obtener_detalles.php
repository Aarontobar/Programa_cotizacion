<?php
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');

$nombre_producto = isset($_GET['nombre']) ? $mysqli->real_escape_string($_GET['nombre']) : '';

$sql = "SELECT * FROM productos WHERE nombre_producto = '$nombre_producto'";
$result = $mysqli->query($sql);

$producto = [];
if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();
}

echo json_encode($producto);
?>