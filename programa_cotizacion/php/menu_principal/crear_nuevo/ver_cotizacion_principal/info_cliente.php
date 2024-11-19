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
    ------------------------------------- INICIO ITred Spa info cliente .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
    
<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../../../css/menu_principal/crear_nuevo/ver_cotizacion/info_cliente.css">

<!-- TÍTULO: TABLA DE INFORMACIÓN DEL CLIENTE -->
    <!-- Llama a la tabla de información de cliente -->
    <table class="customer-info"> 
    <tbody>
        <tr>
            <td>

            <!-- TÍTULO: INFORMACIÓN DEL CLIENTE -->
                <!-- Importa la información del cliente -->
                <strong>SEÑOR(ES):</strong> <?php echo $items[0]['nombre_empresa_cliente']; ?><br>
                <strong>RUT:</strong> <?php echo $items[0]['rut_empresa_cliente']; ?><br>
                <strong>DIRECCIÓN:</strong> <?php echo $items[0]['direccion_empresa_cliente']; ?><br>
                <strong>GIRO:</strong> <?php echo $items[0]['tipo']; ?><br>
                <strong>COMUNA:</strong> <?php echo $items[0]['comuna_empresa_cliente']; ?><br>
                <strong>CIUDAD:</strong> <?php echo $items[0]['ciudad_empresa_cliente']; ?><br>
                <strong>TELÉFONO:</strong> <?php echo $items[0]['telefono_empresa_cliente']; ?><br>
            </td>

        </tr>
        <tr>
            <td colspan="1">

            <!-- TÍTULO: ENCARGADO DEL PROYECTO -->
                <!-- Importa la información del encargado del proyecto -->
                <strong>ENCARGADO DE PROYECTO:</strong><br>
                <strong>NOMBRE:</strong> <?php echo $items[0]['nombre_encargado']; ?><br>
                <strong>RUT:</strong> <?php echo $items[0]['rut_encargado']; ?><br>
                <strong>EMAIL:</strong> <?php echo $items[0]['email_encargado']; ?><br>
                <strong>TELÉFONO:</strong> <?php echo $items[0]['fono_encargado']; ?><br>
                <strong>CELULAR:</strong> <?php echo $items[0]['celular_encargado']; ?><br>
            </td>

            <td colspan="1">
                
            <!-- TÍTULO: DATOS DEL VENDEDOR -->
                <!-- Importa los datos del vendedor -->
                <strong>DATOS DEL VENDEDOR:</strong><br>
                <strong>NOMBRE:</strong> <?php echo $items[0]['nombre_vendedor']; ?><br>
                <strong>RUT:</strong> <?php echo $items[0]['rut_vendedor']; ?><br>
                <strong>EMAIL:</strong> <?php echo $items[0]['email_vendedor']; ?><br>
                <strong>TELÉFONO:</strong> <?php echo $items[0]['fono_vendedor']; ?><br>
                <strong>CELULAR:</strong> <?php echo $items[0]['celular_vendedor']; ?><br>
            </td>

        </tr>
    </tbody>
</table>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="../../../../js/menu_principal/crear_nuevo/ver_cotizacion/info_cliente.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa  info cliente .PHP -----------------------------------
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
