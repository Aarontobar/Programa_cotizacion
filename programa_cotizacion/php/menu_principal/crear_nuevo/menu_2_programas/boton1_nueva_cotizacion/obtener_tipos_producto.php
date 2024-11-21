<?php
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');


$sql = "SELECT id_tipo_producto, tipo_producto FROM p_tipo_producto";
$result = $mysqli->query($sql);

$tipos_producto = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tipos_producto[] = $row;
    }
}

echo json_encode($tipos_producto);
?>