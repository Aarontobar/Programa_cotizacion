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
    ------------------------------------- INICIO ITred Spa Traer datos bancarios.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
<?php

    // Preparar la consulta para obtener los detalles de las cuentas bancarias

    $sql_cuenta = "SELECT 
        cb.id_cuenta AS CuentaID,
        cb.rut_titular AS CuentaRutTitular,
        cb.nombre_titular AS CuentaNombreTitular,
        cb.numero_cuenta AS CuentaNumeroCuenta,
        cb.celular AS CuentaCelular,
        cb.email_banco AS CuentaEmailBanco,
        t.tipocuenta AS TipoCuentaDescripcion,
        b.nombre_banco AS BancoNombre
    FROM em_Cuenta_Bancaria cb
    LEFT JOIN Tp_cuenta t ON cb.id_tipocuenta = t.id_tipocuenta
    LEFT JOIN Tp_banco b ON cb.id_banco = b.id_banco
    WHERE cb.id_empresa = ?";

    if ($stmt_cuenta = $mysqli->prepare($sql_cuenta)) {
        $stmt_cuenta->bind_param("i", $id);
        $stmt_cuenta->execute();
        $result_cuenta = $stmt_cuenta->get_result();

        $bancos = [];
        while ($banco = $result_cuenta->fetch_assoc()) {
            $bancos[] = $banco;
        }

        $stmt_cuenta->close();
    } else {
        echo "<p>Error al preparar la consulta de cuenta bancaria: " . $mysqli->error . "</p>";
    }
?>
<!-- TÍTULO: SECCIÓN DE TRANSFERENCIAS BANCARIAS -->

<!-- Título para la sección de transferencias bancarias -->
    <h2 style="text-align: center;">TRANSFERENCIAS A:</h2> 


<!-- TÍTULO: TABLA PARA INFORMACIÓN BANCARIA DE TRANSFERENCIAS -->

    <!-- Crea una tabla para mostrar la información bancaria para transferencias -->
    <table style="margin: 0 auto; border-collapse: collapse;"> 
        <tr>
            <?php if (!empty($bancos)): ?>
                <?php foreach ($bancos as $banco): ?>

                <!-- Título: Encabezado de Tipo de Cuenta -->

                    <th style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                        <?php echo htmlspecialchars($banco['TipoCuentaDescripcion']); ?>
                    </th>
                <?php endforeach; ?>
            <?php else: ?>
                <th colspan="3" style="text-align: center; border: 1px solid #ddd; padding: 8px;">No hay información bancaria disponible.</th>
            <?php endif; ?>
        </tr>
        <?php if (!empty($bancos)): ?>
            <tr>
                <?php foreach ($bancos as $banco): ?>

                <!-- TÍTULO: BANCO -->

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    BANCO: <?php echo htmlspecialchars($banco['BancoNombre']); ?>
                </td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($bancos as $banco): ?>


                <!-- TÍTULO: TIPO DE CUENTA -->

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    TIPO CUENTA: <?php echo htmlspecialchars($banco['TipoCuentaDescripcion']); ?>
                </td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($bancos as $banco): ?>

                <!-- TÍTULO: NÚMERO DE CUENTA -->

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    NUMERO CUENTA: <?php echo htmlspecialchars($banco['CuentaNumeroCuenta']); ?>
                </td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($bancos as $banco): ?>

                <!-- TÍTULO: NOMBRE DEL TITULAR DE LA CUENTA -->

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    NOMBRE: <?php echo htmlspecialchars($banco['CuentaNombreTitular']); ?>
                </td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($bancos as $banco): ?>

                <!-- TÍTULO: RUT DEL TITULAR DE LA CUENTA -->

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    RUT: <?php echo htmlspecialchars($banco['CuentaRutTitular']); ?>
                </td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($bancos as $banco): ?>

                <!-- TÍTULO: E-MAIL DEL BANCO -->

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    E-MAIL: <?php echo htmlspecialchars($banco['CuentaEmailBanco']); ?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endif; ?>
</table>

<!-- TITULO: ARCHIVO JS -->
    <!-----------------------------archivoJS----------------------------->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/traer_datos_bancarios.js"></script> 

     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Traer datos bancarios.PHP ----------------------------------------
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
