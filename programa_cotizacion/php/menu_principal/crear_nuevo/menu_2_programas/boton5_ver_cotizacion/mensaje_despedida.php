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
    ------------------------------------- INICIO ITred Spa mensaje despedida .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<?php   

    // Consulta para obtener el mensaje de despedida

$sql = "SELECT mensaje_despedida FROM C_Mensaje_Despedida WHERE id_cotizacion = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id_cotizacion);
$stmt->execute();
$stmt->bind_result($mensaje_despedida);
$stmt->fetch();
$stmt->close();
?>

<head>
    <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
        <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../../../../css/menu_principal/crear_nuevo/menu_2_programas/boton5_ver_cotizacion/mensaje_despedida.css">
</head>

<!-- TÍTULO: MENSAJE DE DESPEDIDA -->
    <!-- Llama al archivo CSS -->
<fieldset class="mensaje_despedida-box">
    <legend>¡IMPORTANTE!</legend>
    
<!-- TÍTULO: GRUPO DE FORMULARIO PARA MENSAJE DE DESPEDIDA -->
    <!-- Formulario para el mensaje de despedida con div -->
    <div class="form-group">
    <!-- TÍTULO: MENSAJE -->
        <!-- Mensaje de despedida -->
        <label for="mensaje_despedida">MENSAJE :</label>
        <textarea id="mensaje_despedida" rows="4" cols="50" readonly><?php echo htmlspecialchars($mensaje_despedida); ?></textarea>
    </div>
</fieldset>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="../../../../../js/menu_principal/crear_nuevo/ver_cotizacion/mensaje_despedida.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa  mensaje despedida .PHP -----------------------------------
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
