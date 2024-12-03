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
    ------------------------------------- INICIO ITred Ver condiciones .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="../../../css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton5_ver_cotizacion/ver_condiciones.css">


<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- llama al archivo JS -->
    <script src="../../js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton5_ver_cotizacion/ver_condiciones.js"></script>


<?php
    $query_condiciones = "
    SELECT r.id_condiciones, r.descripcion_condiciones
    FROM em_Condiciones_Generales AS r
    JOIN c_cotizacion_condiciones AS cr ON r.id_condiciones = cr.id_condiciones
    WHERE cr.id_cotizacion = ?
    ";

    // Preparar y ejecutar la consulta para obtener requisitos

        $stmt_condiciones = $mysqli->prepare($query_condiciones);
        $stmt_condiciones->bind_param("i", $id_cotizacion);
        $stmt_condiciones->execute();
        $result_condiciones = $stmt_condiciones->get_result();


    // Verificar si hay resultados de requisitos

        $condiciones = [];
        if ($result_condiciones->num_rows > 0) {
        while ($row = $result_condiciones->fetch_assoc()) {
            $condiciones[] = $row; // Guardar los requisitos en el array
        }
        } else {
        echo "No se encontraron condiciones seleccionados para esta cotización.";
        }

    // Cerrar la conexión de la consulta de requisitos

        $stmt_condiciones->close();

?>

<?php if (!empty($condiciones)): ?>
    <strong>Condiciones: </strong><br><br>
    <?php foreach ($condiciones as $condicion): ?>
        <?php echo htmlspecialchars($condicion['descripcion_condiciones']); ?><br>
    <?php endforeach; ?>
<?php else: ?>
    No hay condiciones disponibles.
<?php endif; ?>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Ver condiciones .PHP -----------------------------------
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
