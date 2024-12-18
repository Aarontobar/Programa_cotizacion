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
    ------------------------------------- INICIO ITred Spa Get Bancos.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa

// Establece la conexión a la base de datos de ITred Spa
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
//---------------------------------------------------------

?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->
<?php


// Verificar si la tabla existe y tiene datos
$check_query = "SELECT COUNT(*) as count FROM Tp_banco";
$result = $mysqli->query($check_query);
if ($result) {
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        // Si no hay datos, insertar algunos por defecto
        $insert_query = "INSERT INTO Tp_banco (nombre_banco) VALUES 
            ('Banco de Chile'),
            ('Banco Estado'),
            ('Banco Santander'),
            ('Banco BCI'),
            ('Banco Itaú'),
            ('Banco Security'),
            ('Scotiabank'),
            ('Banco Falabella'),
            ('Banco Ripley')";
        $mysqli->query($insert_query);
    }
}

// Consulta para obtener los bancos
$query = "SELECT id_banco, nombre_banco FROM Tp_banco ORDER BY nombre_banco";
$result = $mysqli->query($query);

// Generar las opciones del select
echo '<option value="">Seleccione un banco</option>';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row['id_banco']) . '">' . 
             htmlspecialchars($row['nombre_banco']) . '</option>';
    }
}

//------------------------------------------------------
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
    -------------------------------------- FIN ITred Spa Get Bancos .PHP ----------------------------------------
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
