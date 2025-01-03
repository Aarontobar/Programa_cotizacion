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
    ------------------------------------- INICIO ITred Spa Cargar Logo.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
    <?php

// Verificar si el ID es mayor que 0
if ($id_empresa > 0) {
    // Preparar la consulta para obtener los detalles de la empresa
    $sql_empresa = "SELECT 
        e.rut_empresa AS EmpresaRUT,
        e.nombre_empresa AS EmpresaNombre,
        e.id_area_empresa AS EmpresaArea,
        e.direccion_empresa AS EmpresaDireccion,
        e.telefono_empresa AS EmpresaTelefono,
        e.email_empresa AS EmpresaEmail,
        f.ruta_foto,
        e.id_tipo_firma AS tipo_firma
    FROM e_empresa e
    LEFT JOIN FP_FotosPerfil f ON f.id_foto = e.id_foto
    WHERE e.id_empresa = ?";

    //----------------------------------------------------------------------//

    // Preparar la consulta
    if ($stmt_empresa = $mysqli->prepare($sql_empresa)) {
        // Asociar el parámetro
        $stmt_empresa->bind_param("i", $id_empresa);
        // Ejecutar la consulta
        $stmt_empresa->execute();
        // Obtener el resultado
        $result_empresa = $stmt_empresa->get_result();
    
        //----------------------------------------------------------------------//

        // Verificar si se encontró exactamente una empresa
        if ($result_empresa->num_rows == 1) {
            // Obtener los detalles de la empresa
            $items = $result_empresa->fetch_assoc();
            // Obtener el tipo de firma de la empresa
            $tipo_firma = $items['tipo_firma'];

            //----------------------------------------------------------------------//

            // Consulta para obtener la firma de la empresa
            $sql_firma = "
            SELECT 
                f.id_firma,
                f.id_empresa,
                f.titulo_firma, 
                f.nombre_encargado_firma, 
                f.cargo_encargado_firma, 
                f.telefono_encargado_firma,
                f.nombre_empresa_firma, 
                f.area_empresa_firma,
                f.telefono_empresa_firma, 
                f.firma_digital,
                f.email_firma, 
                f.direccion_firma, 
                f.ciudad_firma,
                f.pais_firma,
                f.rut_firma,
                f.web_firma
            FROM em_firmas f
            WHERE f.id_empresa = ?";

            //----------------------------------------------------------------------//

            // Preparar la consulta de la firma
            if ($stmt_firma = $mysqli->prepare($sql_firma)) {
                // Asociar el parámetro
                $stmt_firma->bind_param("i", $id_empresa);
                // Ejecutar la consulta
                $stmt_firma->execute();
                // Obtener el resultado
                $result_firma = $stmt_firma->get_result();

                //----------------------------------------------------------------------//

                // Verificar si se encontró exactamente una firma
                if ($result_firma->num_rows == 1) {
                    // Obtener los detalles de la firma
                    $firma = $result_firma->fetch_assoc();
                } else {
                    $firma = null; // No hay firma manual
                }

                //----------------------------------------------------------------------//

                // Cerrar la consulta de la firma
                $stmt_firma->close();
            } else {
                echo "<p>Error al preparar la consulta de la firma: " . $mysqli->error . "</p>";
            }

            //----------------------------------------------------------------------//

            // Consulta para obtener los días de validez de la empresa
            $sql_validez = "SELECT dias_validez FROM E_Empresa WHERE id_empresa = ? ";
            if ($stmt_validez = $mysqli->prepare($sql_validez)) {
                // Asociar el parámetro
                $stmt_validez->bind_param("i", $id_empresa);
                // Ejecutar la consulta
                $stmt_validez->execute();
                // Asociar el resultado
                $stmt_validez->bind_result($dias_validez);
                // Obtener el valor
                $stmt_validez->fetch();
                // Cerrar la consulta
                $stmt_validez->close();
            } else {
                echo "<p>Error al preparar la consulta de días de validez: " . $mysqli->error . "</p>";
            }

            //----------------------------------------------------------------------//

            // Obtener el número de cotización más alto
            $sql_last_cot = "SELECT numero_cotizacion FROM C_Cotizaciones WHERE id_empresa = ? ORDER BY numero_cotizacion DESC LIMIT 1";
            if ($stmt_last_cot = $mysqli->prepare($sql_last_cot)) {
                // Asociar el parámetro
                $stmt_last_cot->bind_param("i", $id_empresa);
                // Ejecutar la consulta
                $stmt_last_cot->execute();
                // Asociar el resultado
                $stmt_last_cot->bind_result($last_num_cotizacion);
                // Obtener el valor
                $stmt_last_cot->fetch();
                // Cerrar la consulta
                $stmt_last_cot->close();
                // Calcular el próximo número de cotización
                $numero_cotizacion = ($last_num_cotizacion) ? (int)$last_num_cotizacion + 1 : 1;
            } else {
                echo "<p>Error al preparar la consulta de cotización: " . $mysqli->error . "</p>";
            }
            //----------------------------------------------------------------------//
        } else {
            // Si no se encontró la empresa, mostrar un mensaje
            echo "<p>No se encontró la empresa con el ID proporcionado.</p>";
        }
    }
}
//----------------------------------------------------------------------//
?>

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
 
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/cargar_logo_empresa.css">

    <div class=cargar_logo_empresa>
<!-- TÍTULO: SECCIÓN DE CÓDIGO PARA LA CARGA DE LOGO -->

    <!-- Tabla de carga para los logos -->
<div class="box-6 caja-logo">
    <?php
    
    // TÍTULO: PROCESAMIENTO DE LA SUBIDA DE IMAGEN

    // Procesar la subida de la imagen cuando se envía el formulario
    $upload_dir = '../../imagenes/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/cotizacion/'; // Ruta relativa desde el archivo PHP
    $empresa_id_foto = null;

    //----------------------------------------------------------------------//

    // TÍTULO: VERIFICACIÓN DEL ENVÍO DEL FORMULARIO

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // TÍTULO: VERIFICACIÓN DE LA CARGA DE IMAGEN

        // Verificar si se ha cargado una imagen sin errores
        if (isset($_FILES['logo_upload']) && $_FILES['logo_upload']['error'] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['logo_upload']['tmp_name'];
            $name = basename($_FILES['logo_upload']['name']);

            // TÍTULO: VALIDACIÓN DE TIPO DE ARCHIVO

            // Validar el tipo de archivo permitido
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($_FILES['logo_upload']['type'], $allowed_types)) {
                die("Error: Tipo de archivo no permitido."); // Terminar si el tipo de archivo no es permitido
            }

            $upload_file = $upload_dir . $name; // Ruta del archivo a cargar

            //----------------------------------------------------------//

            // TÍTULO: MOVIMIENTO DE ARCHIVO CARGADO

            // Mover el archivo cargado al directorio de destino
            if (move_uploaded_file($tmp_name, $upload_file)) {
                echo "Imagen subida correctamente."; // Mensaje de éxito

                // TÍTULO: INSERCIÓN DE RUTA DE FOTO EN LA BASE DE DATOS

                // Insertar la ruta de la foto en la tabla FotosPerfil
                $sql_foto = "INSERT INTO C_FotosPerfil (ruta_foto) VALUES (?)";
                $stmt_foto = $mysqli->prepare($sql_foto);
                $stmt_foto->bind_param("s", $upload_file);

                //---------------------------------------------------------------------------------------------//

                // Ejecutar la inserción
                if ($stmt_foto->execute()) {
                    echo "Foto del perfil insertada correctamente."; // Mensaje de éxito
                    $empresa_id_foto = $mysqli->insert_id; // Obtener el ID de la foto insertada
                } else {
                    die("Error al insertar la foto del perfil: " . $stmt_foto->error); // Mensaje de error
                }
                // Cerrar la consulta
                $stmt_foto->close();
            } else {
                die("Error al mover el archivo."); // Mensaje de error si la subida falla
            }
            //----------------------------------------------------------//
        } else {
            echo "Error: No se subió una imagen."; // Mensaje de error si no se subió una imagen
        }
    }
    ?>

<!-- TÍTULO: CARGA DE LOGO -->

    <!-- Tabla de carga para los logos -->
    <label for="subir-logo" class="contenedor-logo">
        <?php if (isset($items['ruta_foto']) && !empty($items['ruta_foto'])): ?>

        <!-- TÍTULO: PREVISUALIZACIÓN DE IMAGEN -->

            <!-- Mostrar la imagen de perfil si existe -->
            <img src="<?php echo htmlspecialchars($items['ruta_foto'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto de perfil" id="Previsualizar-logo" class="logo" onclick="document.getElementById('subir-logo').click();" />
        <?php else: ?>

            <!-- TÍTULO: TEXTO PARA CARGAR LOGO -->

            <!-- Mostrar texto para cargar logo si no hay imagen -->
            <span id="logo-text" onclick="document.getElementById('subir-logo').click();">Cargar Logo de Empresa</span>
        <?php endif; ?>

        <!-- TÍTULO: INPUT OCULTO PARA CARGAR IMAGEN -->
         
        <!-- Input oculto para cargar la imagen -->
        <input type="file" id="subir-logo" name="logo_upload" accept="image/*" style="display:none;" onchange="previewImage(event)">

    </label>
</div>
</div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/cargar_logo_empresa.js"></script> 
     
     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Cargar Logo .PHP ----------------------------------------
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
