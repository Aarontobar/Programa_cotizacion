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
    ------------------------------------- INICIO ITred Spa Get forma de pago .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa

$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');

// Si no hay formas de pago, mostrar mensaje en el select
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<?php

// Consulta para obtener las formas de pago

$query = "SELECT id, tipo FROM tp_pago";
$result = $mysqli->query($query);

// Verificar si se obtuvieron resultados

if ($result->num_rows > 0) {

    echo '<option value="">Seleccionar Forma de Pago</option>';
    // Recorrer los resultados y crear opciones en el select

    while ($row = $result->fetch_assoc()) {

        // Mostrar solo el nombre en el texto de la opción, con el valor como id_tp_pago

        echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['tipo']) . '</option>';

         //-----------------------------------------------------------------
    }
} else {

    // Si no hay formas de pago, mostrar mensaje en el select

    echo "<option value=''>No hay formas de pago disponibles</option>";

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
    -------------------------------------- FIN ITred Spa Get forma de pago .PHP ----------------------------------------
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