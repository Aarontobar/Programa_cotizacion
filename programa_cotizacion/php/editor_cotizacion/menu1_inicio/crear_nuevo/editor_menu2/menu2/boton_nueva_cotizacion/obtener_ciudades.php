
     <?php
$mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');

?>

     <?php
$id_pais = isset($_GET['id_pais']) ? intval($_GET['id_pais']) : 0;

$sql = "SELECT id_ciudad, nombre_ciudad FROM ciudades WHERE id_pais = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id_pais);
$stmt->execute();
$result = $stmt->get_result();

$ciudades = [];
while ($row = $result->fetch_assoc()) {
    $ciudades[] = $row;
}

echo json_encode($ciudades);
?>

<?php
$mysqli->close();
?>
