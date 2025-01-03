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
    ------------------------------------- INICIO ITred Spa observaciones.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
 <!--TITULO: ARCHIVO CSS  -->
    
    <!-- llama al archivo css -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/observaciones.css">

<!-- TÍTULO: SECCIÓN DE OBSERVACIONES -->

    <fieldset class="observaciones-box">
        <div class="form-group">

        <!-- TÍTULO: CAMPO PARA OBSERVACIONES -->

            <!-- muestra las observaciones -->
            <label for="observacion">Observaciones:</label>
            <textarea id="observacion" name="observacion" rows="4" cols="50" placeholder="Agrega cualquier comentario adicional (OPCIONAL)..."></textarea>

        </div>        
    </fieldset>


<!-- TITULO: llama al archivo JS -->
    <!--------archivo JS------------------------>
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/observaciones.js"></script> 



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    $observacion = $_POST['observacion'] ?? '';

    // Asegúrate de que no esté vacío

    if (!empty($observacion)) {
        $sql_insert_observacion = "INSERT INTO C_Observaciones (id_cotizacion, observacion) VALUES (?, ?)";
        $stmt_insert_observacion = $mysqli->prepare($sql_insert_observacion);

        if (!$stmt_insert_observacion) {
            die("Error al preparar la consulta: " . $mysqli->error);
        }
        

        // Asocia la ID de la cotización y la observación

        $stmt_insert_observacion->bind_param("is", $id_cotizacion, $observacion);
        
        if ($stmt_insert_observacion->execute()) {
            echo "Observación guardada correctamente.";
        } else {
            echo "Error al guardar la observación: " . $stmt_insert_observacion->error;
        }

        // Cerrar la consulta
        $stmt_insert_observacion->close();
        //-------------------

    } 
}

?>





     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa observaciones .PHP ----------------------------------------
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
