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
// Establece la conexión a la base de datos

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['ver_cotizacion_id']) && is_numeric($_GET['ver_cotizacion_id'])) {
    $id_cotizacion = (int) $_GET['ver_cotizacion_id'];
} else {
    // If no ID is provided, get the most recent cotización
    $sql = "SELECT id_cotizacion FROM C_Cotizaciones ORDER BY id_cotizacion DESC LIMIT 1";
    $result = $mysqli->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_cotizacion = $row['id_cotizacion'];
    } else {
        die("Error: No se encontró ninguna cotización.");
    }
}

// Now that we have an $id_cotizacion, we can proceed to fetch and display the cotización details
$sql = "SELECT * FROM C_Cotizaciones WHERE id_cotizacion = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id_cotizacion);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $cotizacion = $result->fetch_assoc();
} else {
    echo "No se encontró la cotización con ID: " . $id_cotizacion;
}

$stmt->close();
?>

<html>
    <head>

        <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

            <!-- llama al archivo CSS -->
            <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/ver.css">
    
    </head>
<body>
<div class="ver">

    <!-- TÍTULO: CONTENEDOR DE BOTONES -->

    <!-- Contenedor de botones -->
    <div class="button-contenedor">



        <!-- TÍTULO: BOTÓN IMPRIMIR -->

        <button class="button imprimir" onclick="imprimir()">Imprimir</button>
        

        <!-- TÍTULO: BOTÓN MODIFICAR COTIZACIÓN -->
        
        <button class="button Modificar" onclick="location.href='modificar_cotizacion.php?id=<?php echo $id_empresa; ?>'">Modificar cotización</button>
        
    </div>


<!-- TÍTULO: CONTENEDOR PRINCIPAL -->

    <!-- Contenedor principal -->
    <div class="contenedor">

    <!-- TÍTULO: IMPORTAR LA MARCA DE AGUA -->

        <!-- Importar la marca de agua -->
        <?php include 'marca_de_agua.php'; ?>

        

    <!-- TÍTULO: HEADER -->

        <?php include 'header.php'; ?>

        

    <!-- TÍTULO: INFORMACIÓN DEL CLIENTE -->

        <?php include 'info_cliente.php'; ?>

    <!-- TÍTULO: DETALLE -->

        <?php include 'detalle.php'; ?>


    <!-- TÍTULO: TOTALES -->

        <?php include 'totales.php'; ?>
        
       
    <!-- TÍTULO: TABLA DE TOTALES -->

        <!-- muestra el sub-total -->
        <table class="totals">
            <tr class="son">
                <td colspan="2">
                    <strong>SON:</strong> <span id="total_final_letras"><?php echo htmlspecialchars($totales['total_final_letras']); ?></span> PESOS
                </td>
            </tr>
        </table>


    <!-- TÍTULO: VER PAGOS -->

        <!-- llama al archivo PHP  -->
        <?php include 'ver_pago.php'; ?>

    <!-- TÍTULO: TABLA DE REQUISITOS, CONDICIONES Y OBLIGACIONES -->

        <table>
            <tr>
                <td>

                <!-- TÍTULO: VER REQUISITOS -->

                    <!-- llama al archivo php -->
                    <?php include 'ver_requisitos.php'; ?>
                </td>
            </tr>
            <tr>
                <td>

                <!-- TÍTULO: VER CONDICIONES -->

                    <!-- llama al archivo php -->
                    <?php include 'ver_condiciones.php'; ?>

                </td>
            </tr>
            <tr>
                <td>

                <!-- TÍTULO: VER OBLIGACIONES -->

                    <!-- llama al archivo php -->
                    <?php include 'ver_obligaciones.php'; ?>


                </td>
            </tr>
        </table>


    <!-- TÍTULO: MENSAJE DE DESPEDIDA -->

        <!-- llama al archivo php -->
        <div>
            <?php include 'mensaje_despedida.php'; ?>
        </div>


    <!-- TÍTULO: BANCOS -->

        <!-- llama al archivo php -->
        <?php include 'bancos.php'; ?>

        

    <!-- TÍTULO: POSICIONAR FIRMA -->
         
        <!-- llama al archivo php -->
        <?php include 'posicionar_firma.php'; ?>

    

    </div>

    
</div>
<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/ver_pr.js"></script>
</body>
</html>
<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Ver .PHP -----------------------------------
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
