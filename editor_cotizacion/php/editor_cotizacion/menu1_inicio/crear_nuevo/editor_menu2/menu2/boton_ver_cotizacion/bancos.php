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
    ------------------------------------- INICIO ITred Spa bancos .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->



<?php
    // Consulta para obtener las cuentas bancarias de la empresa
    $query_bancos = "
        SELECT 
            cb.rut_titular,
            cb.nombre_titular,
            cb.numero_cuenta,
            cb.email_banco,
            b.nombre_banco,
            tc.tipocuenta
        FROM em_Cuenta_Bancaria cb
        JOIN Tp_banco b ON cb.id_banco = b.id_banco
        JOIN Tp_cuenta tc ON cb.id_tipocuenta = tc.id_tipocuenta
        WHERE cb.id_empresa = ?
    ";

    //--------------------------------------------------------------------//

    // Preparar la consulta de cuentas bancarias
    $stmt_bancos = $mysqli->prepare($query_bancos);
    $stmt_bancos->bind_param("i", $id_empresa);

    //--------------------------------------------------------------------//

    // Ejecutar la consulta de cuentas bancarias
    $stmt_bancos->execute();

    //--------------------------------------------------------------------//

    // Obtener los resultados de cuentas bancarias
    $result_bancos = $stmt_bancos->get_result();

    //--------------------------------------------------------------------//

    // Verificar si hay resultados de cuentas bancarias
    $bancos = [];
    if ($result_bancos->num_rows > 0) {
        $bancos = $result_bancos->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "No se encontraron cuentas bancarias para esta empresa.";
    }
    
    //--------------------------------------------------------------------//
?>

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/bancos.css">

<!-- TÍTULO: CONTENEDOR DE INFORMACIÓN BANCARIA -->
    <!-- Llamada de tabla con información bancaria -->
    <div class="barcode-contenedor">

    <!-- TÍTULO: TABLA DE BANCOS -->

        <!-- Llamada de tabla de bancos -->
        <table>
            <tr>
                <?php foreach ($bancos as $banco): ?>
                <td>
                    <strong>BANCO:</strong> <?php echo $banco['nombre_banco']; ?><br>
                    <strong>TIPO CUENTA:</strong> <?php echo $banco['tipocuenta']; ?><br>
                    <strong>N° CUENTA:</strong> <?php echo $banco['numero_cuenta']; ?><br>
                    <strong>RUT:</strong> <?php echo $banco['rut_titular']; ?><br>
                    <strong>TITULAR:</strong> <?php echo $banco['nombre_titular']; ?><br>
                    <strong>ENVIAR EMAIL A:</strong> <?php echo $banco['email_banco']; ?>
                </td>
                <?php endforeach; ?>
            </tr>
        </table>

    <!-------------------------------------------------------------------------------------------------------------->

</div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/bancos.js"></script> 

<!------------------------------------------------------------------------------------->

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa  bancos .PHP -----------------------------------
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
