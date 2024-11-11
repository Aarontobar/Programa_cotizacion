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
    ------------------------------------- INICIO ITred Spa Get cargo cliente .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa

$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');

// Si no hay cargos, mostrar mensaje en el select
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<?php

// Consulta para obtener los cargos

$query = "SELECT id_tp_cargo, nombre_cargo FROM tp_cargo";
$result = $mysqli->query($query);

// Verificar si se obtuvieron resultados

if ($result->num_rows > 0) {

    echo '<option value="">Seleccionar Cargo</option>';
    // Recorrer los resultados y crear opciones en el select

    while ($row = $result->fetch_assoc()) {

        // Mostrar solo el nombre en el texto de la opción, con el valor como id_tp_cargo

        echo '<option value="' . htmlspecialchars($row['id_tp_cargo']) . '">' . htmlspecialchars($row['nombre_cargo']) . '</option>';

         //-----------------------------------------------------------------
    }
} else {

    // Si no hay cargos, mostrar mensaje en el select

    echo "<option value=''>No hay cargos disponibles</option>";

     //----------------------------------------------
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
    -------------------------------------- FIN ITred Spa Get cargo cliente .PHP ----------------------------------------
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