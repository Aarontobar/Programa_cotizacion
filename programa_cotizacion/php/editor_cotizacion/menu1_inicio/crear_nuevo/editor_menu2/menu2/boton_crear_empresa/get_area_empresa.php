<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Agui Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->

<!-- ------------------------------------------------------------------------------------------------------------
    ------------------------------------- INICIO ITred Spa Get Area Empresa .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Verificar conexión a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

// Verificar si la tabla existe y tiene datos
$check_query = "SELECT COUNT(*) as count FROM Tp_Area";
$result = $mysqli->query($check_query);
if ($result) {
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        // Si no hay datos, insertar algunos por defecto
        $insert_query = "INSERT INTO Tp_Area (nombre_area) VALUES 
            ('Recursos Humanos'),
            ('Finanzas'),
            ('Tecnología'),
            ('Marketing'),
            ('Ventas')";
        $mysqli->query($insert_query);
    }
}

// Consulta para obtener las áreas
$query = "SELECT id_area, nombre_area FROM Tp_Area ORDER BY nombre_area";
$result = $mysqli->query($query);

// Generar las opciones del select
echo '<option value="">Seleccione un área</option>';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row['id_area']) . '">' . 
             htmlspecialchars($row['nombre_area']) . '</option>';
    }
}

$mysqli->close();
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<!-- ---------------------
-- INICIO CIERRE CONEXION BD --
--------------------- -->
<?php
$mysqli->close();
?>
<!-- ---------------------
     -- FIN CIERRE CONEXION BD --
     --------------------- -->


<!-- ----------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Get Area Empresa .PHP ----------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Agui Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->