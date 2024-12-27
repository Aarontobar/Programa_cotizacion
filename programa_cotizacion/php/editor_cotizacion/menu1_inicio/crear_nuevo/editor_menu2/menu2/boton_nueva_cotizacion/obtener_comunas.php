

     <?php
// Establece la conexión a la base de datos de ITred Spa

$mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');

// Si no hay lugares, mostrar mensaje en el select
?>

     <?php


$id_ciudad = isset($_GET['id_ciudad']) ? intval($_GET['id_ciudad']) : 0;

$sql = "SELECT id_comuna, nombre_comuna FROM comuna WHERE id_ciudad = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id_ciudad);
$stmt->execute();
$result = $stmt->get_result();

$comunas = [];
while ($row = $result->fetch_assoc()) {
    $comunas[] = $row;
}

echo json_encode($comunas);
?>

<?php
$mysqli->close();
?>
