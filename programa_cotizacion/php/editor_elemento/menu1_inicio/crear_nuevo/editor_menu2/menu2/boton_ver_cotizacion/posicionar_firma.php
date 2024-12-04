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
    ------------------------------------- INICIO ITred Spa Firma .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
    

    <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

        <!-- llama al archivo css -->
        <link rel="stylesheet" href="../../../css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/posicionar_firma.css">
    <div id="firma-container" style="text-align: left;"> <!-- Aseguramos que inicie a la izquierda -->

    <!-- TÍTULO: VERIFICACIÓN DE TIPO DE FIRMA -->

        <?php

        // Verifica si hay un tipo de firma

        if ($tipo_firma) {
            switch ($tipo_firma) {

                case 1: // Firma Automática

                case 2: // Firma Manual

                // Título: Mostrar Imagen de Firma

                    // Mostrar la imagen de la firma
                    if (!empty($ruta_foto)) {
                        echo "<img src='$ruta_foto' alt='Logo de la Empresa' style='max-width: 150px; vertical-align: middle;' id='imagen-firma'>";
                    }


                // Título: Información de la Firma

                    // informacion de las firmas
                    echo "<div id='texto-firma-container' style='display: inline-block; vertical-align: middle;'>";
                    echo "<p id='texto-firma'>" . htmlspecialchars($firma['nombre_encargado_firma']) . "</p>";
                    echo "<p id='texto-firma'>" . htmlspecialchars($firma['cargo_encargado_firma']) . " - " . htmlspecialchars($firma['nombre_empresa_firma']) . "</p>";
                    echo "<p id='texto-firma'>" . htmlspecialchars($firma['direccion_firma']) . "</p>";
                    echo "<p id='texto-firma'>" . htmlspecialchars($firma['ciudad_firma']) . ", " . htmlspecialchars($firma['pais_firma']) . "</p>";
                    echo "<p id='texto-firma'>Teléfono: " . htmlspecialchars($firma['telefono_empresa_firma']) . "</p>";
                    echo "<p id='texto-firma'>Celular: " . htmlspecialchars($firma['telefono_encargado_firma']) . "</p>";
                    echo "<p id='texto-firma'>Email: " . htmlspecialchars($firma['email_firma']) . "</p>";
                    echo "<p id='texto-firma'>Web: " . htmlspecialchars($firma['web_firma']) . "</p>";
                    echo "</div>"; // Cierre de texto-firma-container
                    break;


                case 3: // Firma Imagen

            // TÍTULO: MOSTRAR IMAGEN DE FIRMA DIGITAL
                
                // muestra la imagen 
                if (!empty($firma['firma_digital'])) {

                    // Mostrar la imagen de la firma

                    $firma_imagen_url = htmlspecialchars($firma['firma_digital']);
                    echo "<img src='$firma_imagen_url' alt='Firma Imagen' style='max-width: 300px;'>";

                } else {
                    echo "<p>No hay firma registrada para este tipo.</p>";
                }
                break;


            case 4: // Firma Digital

            // TÍTULO: GENERAR CÓDIGO QR PARA FIRMA DIGITAL

                // Generar el número de cotización

                $url_firma = "../ver_cotizacion/ver_firma.php?id_cotizacion=" . $numero_cotizacion;

                // URL del generador de códigos QR

                $qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($url_firma);

                // Mostrar el código QR

                echo "<p>Escanea el código QR para ver la firma digital:</p>";
                echo "<img src='$qr_url' alt='Código QR' style='max-width: 200px;'>";

                // Botón que lleva a la firma digital

                echo "<p><a href='$url_firma' class='btn btn-primary' style='padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Ver Firma Digital</a></p>";
                break;

            default:
                echo "<h3>Tipo de Firma: Desconocido</h3>";
                echo "<p>No se puede determinar el tipo de firma.</p>";
                break;

        }
    } else {
        echo "<p>No se encontró la firma de la empresa.</p>";
    }
    ?>
</div>

<!-- TÍTULO: ALINEACIÓN DE LA FIRMA -->

<div>
    <label>
        <!-- TÍTULO: OPCIÓN DE ALINEACIÓN IZQUIERDA -->
        <!-- alinea a la izquierda -->
        <input type="radio" name="alineacion" value="Izquierda" checked onchange="cambiarAlineacion('izquierda')"> <span>Izquierda</span>
    </label>

    <label>
        <!-- TÍTULO: OPCIÓN DE ALINEACIÓN CENTRO -->
        <!-- alinea al centro -->
        <input type="radio" name="alineacion" value="Centro" onchange="cambiarAlineacion('centro')"> <span>Centro</span>
    </label>

    <label>
        <!-- TÍTULO: OPCIÓN DE ALINEACIÓN DERECHA -->
        <!-- alinea a la derecha -->
        <input type="radio" name="alineacion" value="Derecha" onchange="cambiarAlineacion('derecha')"> <span>Derecha</span>
    </label>
</div>



<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    
    <!-- llama la archivo js -->
    <script src="../../../js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/posicionar_firma.js"></script>

<!-------------------------------------------------------------------------->


     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Firma  .PHP ----------------------------------------
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
