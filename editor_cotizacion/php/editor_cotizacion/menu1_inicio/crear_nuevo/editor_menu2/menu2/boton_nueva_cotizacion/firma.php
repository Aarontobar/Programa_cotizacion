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
    
    <!-- Aseguramos que inicie a la izquierda -->
    <div id="firma-container" style="text-align: left;"> 

    <?php

// TITULO: VERIFICA SI HAY UN TIPO DE FIRMA //

if ($tipo_firma) {
    switch ($tipo_firma) {

        // Firma Automática
        case 1: 

        // Firma Manual
        case 2: 
            echo "<div id='firma-container'>";

            // Mostrar la imagen de la firma si está disponible

            if (!empty($ruta_foto)) {
                $nombre_archivo = basename($ruta_foto);
            }


            // Contenedor de los textos de la firma

            echo "<div id='texto-firma-container' style='display: inline-block; vertical-align: middle;'>";
            echo "<p class='texto-firma'><strong>FIRMA DEL REPRESENTANTE:</strong></p>";
            echo "<img class='imagen-firma' src='imagenes/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/programa_cotizacion/" . htmlspecialchars($nombre_archivo, ENT_QUOTES, 'UTF-8') . "' alt='Firma' style='width:300px; height:auto;'>";
            echo "<p class='texto-firma'>" . htmlspecialchars($firma['nombre_encargado_firma']) . "</p>";
            echo "<p class='texto-firma'>" . htmlspecialchars($firma['cargo_encargado_firma']) . " - " . htmlspecialchars($firma['nombre_empresa_firma']) . "</p>";
            echo "<p class='texto-firma'>" . htmlspecialchars($firma['direccion_firma']) . "</p>";
            echo "<p class='texto-firma'>" . htmlspecialchars($firma['ciudad_firma']) . ", " . htmlspecialchars($firma['pais_firma']) . "</p>";
            echo "<p class='texto-firma'>Teléfono: " . htmlspecialchars($firma['telefono_empresa_firma']) . "</p>";
            echo "<p class='texto-firma'>Celular: " . htmlspecialchars($firma['telefono_encargado_firma']) . "</p>";
            echo "<p class='texto-firma'>Email: " . htmlspecialchars($firma['email_firma']) . "</p>";
            echo "<p class='texto-firma'>Web: " . htmlspecialchars($firma['web_firma']) . "</p>";
            echo "</div>"; // Cierre de texto-firma-container

            // Cierre de firma-container
            echo "</div>"; 
            break;

        // Firma Imagen
        case 3:
            if (!empty($firma['firma_digital'])) {
                $firma_imagen_url = htmlspecialchars($firma['firma_digital']);
                echo "<img src='$firma_imagen_url' alt='Firma Imagen' style='max-width: 300px;'>";
            } else {
                echo "<p>No hay firma registrada para este tipo.</p>";
            }
            break;

        // Firma Digital
        case 4: 
            $url_firma = "../ver_cotizacion/ver_firma.php?id_cotizacion=" . $numero_cotizacion;
            $qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($url_firma);
            echo "<p>Escanea el código QR para ver la firma digital:</p>";
            echo "<img src='$qr_url' alt='Código QR' style='max-width: 200px;'>";
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

<!-- Título: Contenedor de Alineación -->

<div class="contenedor-alineacion"> 

<!-- Título: Opción Izquierda -->

    <!-- cambia la alineacion a la izquierda -->
    <label> 
        <input type="radio" name="alineacion" value="izquierda" checked onchange="cambiarAlineacion('izquierda')"> Izquierda
    </label>


<!-- Título: Opción Centro -->

    <!-- cambia la alineacion al centro -->
    <label>
        <input type="radio" name="alineacion" value="centro" onchange="cambiarAlineacion('centro')"> Centro
    </label>



<!-- Título: Opción Derecha -->

    <!-- cambia la alineacion a la derecha -->
    <label>
        <input type="radio" name="alineacion" value="derecha" onchange="cambiarAlineacion('derecha')"> Derecha
    </label>

</div>

<!-- TÍTULO: ARCHIVO CSS -->

    <!--------------Archivo JS--------------->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/firma.js"></script> 

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
