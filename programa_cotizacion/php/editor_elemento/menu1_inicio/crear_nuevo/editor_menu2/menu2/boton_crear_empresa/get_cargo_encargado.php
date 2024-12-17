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
// Establece la conexión a la base de datos de ITred Spa
// Verificar conexión a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

//-------------------------------------------
?>

<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

     <?php
// Verificar si la tabla existe y tiene datos
$check_query = "SELECT COUNT(*) as count FROM tp_cargo";
$result = $mysqli->query($check_query);
if ($result) {
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        // Si no hay datos, insertar algunos por defecto
        $insert_query = "INSERT INTO tp_cargo (nombre_cargo) VALUES 
            ('Gerente General'),
            ('Gerente de Operaciones'),
            ('Supervisor'),
            ('Coordinador'),
            ('Analista')";
        $mysqli->query($insert_query);
    }
}

// Consulta para obtener los cargos
$query = "SELECT id_tp_cargo, nombre_cargo FROM tp_cargo ORDER BY nombre_cargo";
$result = $mysqli->query($query);

// Generar las opciones del select
echo '<option value="">Seleccione un cargo</option>';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row['id_tp_cargo']) . '">' . 
             htmlspecialchars($row['nombre_cargo']) . '</option>';
    }
}
?>




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