<?php
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');

$sql = "SELECT id_tipo_producto, tipo_producto, titulo FROM p_tipo_producto ORDER BY titulo, tipo_producto";
$result = $mysqli->query($sql);

$tipos_producto = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $titulo = $row['titulo'];
        if (!isset($tipos_producto[$titulo])) {
            $tipos_producto[$titulo] = [
                'titulo' => $titulo,
                'productos' => []
            ];
        }
        $tipos_producto[$titulo]['productos'][] = [
            'id_tipo_producto' => $row['id_tipo_producto'],
            'tipo_producto' => $row['tipo_producto']
        ];
    }
}

echo json_encode(array_values($tipos_producto));
?>