<?php
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');


$tipo_producto = isset($_GET['tipo']) ? $mysqli->real_escape_string($_GET['tipo']) : '';

$sql = "SELECT id_producto, nombre_producto, precio, descripcion, cantidad FROM productos WHERE tipo_producto = '$tipo_producto'";
$result = $mysqli->query($sql);

$productos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

echo json_encode($productos);
?>