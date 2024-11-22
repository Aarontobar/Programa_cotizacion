<?php
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');

$id_producto = isset($_GET['id']) ? $mysqli->real_escape_string($_GET['id']) : '';

$sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
$result = $mysqli->query($sql);

$producto = [];
if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();
}

echo json_encode($producto);
?>