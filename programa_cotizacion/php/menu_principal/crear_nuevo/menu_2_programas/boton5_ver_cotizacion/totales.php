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
    ------------------------------------- INICIO ITred Spa totales .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
<?php
    // Consulta para obtener los totales

    $query_totales = "
        SELECT 
            total.sub_total,
            total.descuento_global,
            total.total_iva,
            total.monto_neto,
            total.total_final,
            upper(total.total_final_letras) AS total_final_letras
        FROM C_Totales total
        JOIN C_Cotizaciones cot ON total.id_cotizacion = cot.id_cotizacion
        WHERE cot.id_cotizacion = ?
    ";

    // Preparar la consulta de totales

    $stmt_totales = $mysqli->prepare($query_totales);
    $stmt_totales->bind_param("i", $id_cotizacion);



    // Ejecutar la consulta de totales

    $stmt_totales->execute();


    // Obtener los resultados de totales

    $result_totales = $stmt_totales->get_result();


    // Verificar si hay resultados de totales

    if ($result_totales->num_rows > 0) {
        $totales = $result_totales->fetch_assoc();
    } else {
        echo "No se encontraron totales para esta cotización.";
    }


    // Consulta para obtener observaciones

    $query_observaciones = "
    SELECT o.id_observacion, o.observacion
    FROM C_Observaciones AS o
    WHERE o.id_cotizacion = ?
    ";


    // Preparar y ejecutar la consulta para obtener observaciones

    $stmt_observaciones = $mysqli->prepare($query_observaciones);
    $stmt_observaciones->bind_param("i", $id_cotizacion);
    $stmt_observaciones->execute();
    $result_observaciones = $stmt_observaciones->get_result();


    // Verificar si hay resultados de observaciones

    $observaciones = [];
    if ($result_observaciones->num_rows > 0) {
    while ($row = $result_observaciones->fetch_assoc()) {
        $observaciones[] = $row; // Guardar las observaciones en el array
    }
    }


    // Cerrar la conexión de la consulta de observaciones

    $stmt_observaciones->close();
?>

    
<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- llama al archivo css -->
    <link rel="stylesheet" href="../../../../../css/menu_principal/crear_nuevo/ver_cotizacion/totales.css">


<!-- TITULO: CONTENEDOR TOTAL -->

<div class="totals-contenedor">

<!-- TÍTULO: TABLA DE OBSERVACIONES -->

    <table class="observations">
        <tr>
            <td>

            <!-- TÍTULO: ENCABEZADO DE OBSERVACIONES -->

                <strong>OBSERVACIONES</strong>

            </td>
        </tr>
        <tr class="large-cell">
            <td>
                <?php
                // Verificar si hay observaciones
                if (!empty($observaciones)) {
                    foreach ($observaciones as $observacion) {
                        echo htmlspecialchars($observacion['observacion']) . "<br>"; // Mostrar cada observación
                    }
                } else {
                    echo "Sin observaciones extras."; // Mensaje por defecto si no hay observaciones
                }
                ?>
            </td>
        </tr>
    </table>


<!-- TÍTULO: TABLA DE TOTALES -->

    <table class="totals">
        <tr>
        <!-- TÍTULO: SUB-TOTAL -->
            
            
            <td>
                Sub-total
            </td>
            
        <!-- TÍTULO: VALOR DEL SUB-TOTAL -->

            <!-- muestra el valor subtotal -->
            <td>
                $ <?php echo number_format($totales['sub_total'], 0, ',', '.'); ?>
            </td>

        </tr>
        <tr>

        <!-- TÍTULO: MONTO DE DESCUENTO POR PORCENTAJE -->

            <td>
                Monto descuento_porcentaje
            </td>

            

        <!-- TÍTULO: VALOR DEL DESCUENTO -->

            <!-- muestra el valor de descuento -->
            <td>
                $ <?php echo number_format($totales['descuento_global'], 0, ',', '.'); ?>
            </td>

        </tr>
        <tr>
        <!-- TÍTULO: IVA -->

            <td>
                19% I.V.A.
            </td>

        <!-- TÍTULO: VALOR DEL IVA -->
            
            <!-- muestra el valor del iva -->
            <td>
                $ <?php echo number_format($totales['total_iva'], 0, ',', '.'); ?>
            </td>

        </tr>
        <tr>

        <!-- TÍTULO: MONTO NETO -->

            <td>
                Monto neto
            </td>


        <!-- TÍTULO: VALOR DEL MONTO NETO -->

            <!-- muestra el valor del monto neto -->
            <td>
                $ <?php echo number_format($totales['monto_neto'], 0, ',', '.'); ?>
            </td>
            
        </tr>
        <tr>

        <!-- TÍTULO: TOTAL FINAL -->
            <td>
                <strong> TOTAL FINAL </strong>
            </td>


        <!-- TÍTULO: VALOR DEL TOTAL FINAL -->
            <td>
                $ <?php echo number_format($totales['total_final'], 0, ',', '.'); ?>
            </td>
        </tr>
    </table>
</div>


<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- llama al archivo JS -->
    <script src="../../../../../js/menu_principal/crear_nuevo/ver_cotizacion/totales.js"></script>


<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa  totales .PHP -----------------------------------
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
