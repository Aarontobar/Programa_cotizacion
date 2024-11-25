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
    ------------------------------------- INICIO ITred Ver obligaciones .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
    
    <!-------------------------------------------------------------------------->

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="../../../../../css/menu_principal/crear_nuevo/menu_2_programas/boton5_ver_cotizacion/ver_obligaciones.css">

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- llama al archivo JS -->
    <script src="../../../../../js/menu_principal/crear_nuevo/ver_cotizacion/ver_obligaciones.js"></script>

<?php
    $query_obligaciones = "
    SELECT r.id, indice,  r.descripcion
    FROM em_obligaciones_cliente AS r
    JOIN c_cotizaciones_obligaciones AS cr ON r.id = cr.id_obligacion
    WHERE cr.id_cotizacion = ?
    ";

    // Preparar y ejecutar la consulta para obtener requisitos

    $stmt_obligaciones = $mysqli->prepare($query_obligaciones);
    $stmt_obligaciones->bind_param("i", $id_cotizacion);
    $stmt_obligaciones->execute();
    $result_obligaciones = $stmt_obligaciones->get_result();

    

    // Verificar si hay resultados de requisitos

    $obligaciones = [];
    if ($result_obligaciones->num_rows > 0) {
    while ($row = $result_obligaciones->fetch_assoc()) {
        $obligaciones[] = $row; // Guardar los requisitos en el array
    }
    } else {
    echo "No se encontraron obligaciones seleccionados para esta cotización.";
    }

    // Cerrar la conexión de la consulta de requisitos

    $stmt_obligaciones->close();
   
?>

<?php if (!empty($obligaciones)): ?>
    <strong>obligaciones: </strong><br><br>
    <?php foreach ($obligaciones as $obligacion): ?>
        <?php echo htmlspecialchars($obligacion['descripcion']); ?><br>
    <?php endforeach; ?>
<?php else: ?>
    No hay obligaciones disponibles.
<?php endif; ?>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Ver obligaciones .PHP -----------------------------------
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