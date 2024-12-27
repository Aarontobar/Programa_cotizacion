<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->

<!-- ------------------------------------------------------------------------------------------------------------
    ------------------------------------- INICIO ITred Spa Get tipo cuenta.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa
$mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
//-------------------------------------------

?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->
<?php
// Verificar si la tabla existe y tiene datos
$check_query = "SELECT COUNT(*) as count FROM Tp_cuenta";
$result = $mysqli->query($check_query);
if ($result) {
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        // Si no hay datos, insertar algunos por defecto
        $insert_query = "INSERT INTO Tp_cuenta (tipocuenta) VALUES 
            ('Cuenta Corriente'),
            ('Cuenta Vista'),
            ('Cuenta de Ahorro'),
            ('Cuenta RUT')";
        $mysqli->query($insert_query);
    }
}

// Consulta para obtener los tipos de cuenta
$query = "SELECT id_tipocuenta, tipocuenta FROM Tp_cuenta ORDER BY tipocuenta";
$result = $mysqli->query($query);

// Generar las opciones del select
echo '<option value="">Seleccione un tipo de cuenta</option>';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row['id_tipocuenta']) . '">' . 
             htmlspecialchars($row['tipocuenta']) . '</option>';
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
     
<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Get tipo cuenta .PHP -----------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->