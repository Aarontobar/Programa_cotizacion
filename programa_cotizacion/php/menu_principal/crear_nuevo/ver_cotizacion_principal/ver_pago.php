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
    ------------------------------------- INICIO ITred Spa Ver .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

    <?php
$query_pagos = "
SELECT cp.numero_pago, cp.descripcion, cp.porcentaje_pago, cp.monto_pago, cp.fecha_pago, tpp.tipo
FROM C_pago cp
JOIN Tp_Pago tpp ON cp.id_forma_pago = tpp.id
WHERE cp.id_cotizacion = ?
";

// Preparar y ejecutar la consulta para obtener los pagos

$stmt_pagos = $mysqli->prepare($query_pagos);
$stmt_pagos->bind_param("i", $id_cotizacion); // $id_cotizacion debería contener el ID de la cotización
$stmt_pagos->execute();
$result_pagos = $stmt_pagos->get_result();



// Verificar si hay resultados de pagos

$pagos = [];
if ($result_pagos->num_rows > 0) {
    while ($row = $result_pagos->fetch_assoc()) {
        $pagos[] = $row; // Guardar los pagos en el array
    }
} else {
    echo "No se encontraron pagos para esta cotización.";
}



// Cerrar la conexión de la consulta de pagos
$stmt_pagos->close();
?>



<?php if (!empty($pagos)): ?>

<!-- TÍTULO: PAGOS RELACIONADOS -->
    
    <strong>Pagos relacionados: </strong><br><br>

    <table>
        <thead>
            <tr>

            <!-- TÍTULO: ENCABEZADOS DE LA TABLA -->

                <th>Número de Pago</th>
                <th>Descripción</th>
                <th>Porcentaje</th>
                <th>Monto</th>
                <th>Fecha de Pago</th>
                <th>Forma de Pago</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pagos as $pago): ?>
            <tr>

            <!-- TÍTULO: DATOS DEL PAGO -->

                <td><?php echo htmlspecialchars($pago['numero_pago']); ?></td>
                <td><?php echo htmlspecialchars($pago['descripcion']); ?></td>
                <td><?php echo htmlspecialchars($pago['porcentaje_pago']); ?>%</td>
                <td><?php echo htmlspecialchars($pago['monto_pago']); ?></td>
                <td><?php echo htmlspecialchars($pago['fecha_pago']); ?></td>
                <td><?php echo htmlspecialchars($pago['tipo']); ?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>

<!-- TÍTULO: MENSAJE CUANDO NO HAY PAGOS DISPONIBLES -->
     
    No hay pagos disponibles para esta cotización.

<?php endif; ?>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="../../../../css/menu_principal/crear_nuevo/ver_pago/.css">


<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- llama al archivo JS -->
    <script src="../../../../js/menu_principal/crear_nuevo/ver_cotizacion/ver_pago.js"></script>

    <!-------------------------------------------------------------------------->

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Ver Pago.PHP -----------------------------------
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
