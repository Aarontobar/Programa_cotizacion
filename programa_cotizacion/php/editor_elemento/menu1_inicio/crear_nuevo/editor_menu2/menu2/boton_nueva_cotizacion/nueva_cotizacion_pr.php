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
    ------------------------------------- INICIO ITred Spa Nueva cotizacion .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si existe una conexión a la base de datos
if (!isset($mysqli)) {
    $mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
}

// Definir la ruta base para los includes
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/programa_cotizacion/php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/');

// TÍTULO: PROCESAMIENTO DEL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    try {
        // Validar que exista una empresa seleccionada
        if (!isset($_SESSION['id_empresa'])) {
            throw new Exception('No se ha seleccionado una empresa');
        }

        // Validar campos requeridos
        $fecha_emision = $_POST['fecha_emision'] ?? null;
        $numero_cotizacion = $_POST['numero_cotizacion'] ?? null;
        $empresa_rut = $_POST['empresa_rut'] ?? null;

        if (!$fecha_emision || !$numero_cotizacion || !$empresa_rut) {
            throw new Exception('Faltan campos requeridos');
        }

        // Iniciar transacción
        $mysqli->begin_transaction();

        // Insertar la cotización
        $stmt = $mysqli->prepare("
            INSERT INTO C_Cotizaciones (
                fecha_emision, 
                numero_cotizacion,
                id_empresa,
                estado
            ) VALUES (?, ?, ?, 'pendiente')
        ");
        
        $stmt->bind_param("ssi", $fecha_emision, $numero_cotizacion, $_SESSION['id_empresa']);
        
        if (!$stmt->execute()) {
            throw new Exception('Error al crear la cotización: ' . $mysqli->error);
        }
        
        $id_cotizacion = $mysqli->insert_id;
        
        // Aquí puedes agregar más inserciones para los otros detalles de la cotización
        // Por ejemplo, insertar en C_pago, etc.

        // Confirmar transacción
        $mysqli->commit();
        
        $response = array(
            'success' => true,
            'message' => 'Cotización creada exitosamente',
            'cotizacion_id' => $id_cotizacion
        );
        
    } catch (Exception $e) {
        // Revertir transacción en caso de error
        $mysqli->rollback();
        
        $response = array(
            'success' => false,
            'message' => $e->getMessage()
        );
    }
    
    // Enviar respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cotización</title>
    <link rel="stylesheet" href="/programa_cotizacion/css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/nueva_cotizacion.css">
</head>

<body>
    <div class="nueva-cotizacion">
        <form id="formulario-cotizacion" method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="formulario" value="cotizacion">
            
            <!-- Fila 1 -->
            <div class="row">
                <!-- TÍTULO: LOGO DE LA EMPRESA -->
                <?php include BASE_PATH . 'cargar_logo_empresa.php'; ?>

                <!-- TÍTULO: CUADRO ROJO DE COTIZACIÓN -->
                <?php include BASE_PATH . 'cuadro_rojo_cotizacion.php'; ?>

                <!-- TÍTULO: SECCIÓN DE DATOS -->
                <fieldset class="box-6 cuadro-datos">
                    <label for="fecha_emision">Fecha de Emisión:</label>
                    <input type="date" id="fecha_emision" name="fecha_emision" required>
                </fieldset>
            </div>

            <!-- Fila 2: DATOS DE LA EMPRESA -->
            <?php include BASE_PATH . 'datos_empresa.php'; ?>

            <!-- Fila 3: DETALLE DEL CLIENTE -->
            <?php include BASE_PATH . 'detalle_cliente.php'; ?>

            <div class="row">
                <!-- Fila 4: DETALLE DEL PROYECTO -->
                <?php include BASE_PATH . 'detalle_proyecto.php'; ?>
            </div>

            <!-- Fila 5: DETALLE DEL ENCARGADO -->
            <?php include BASE_PATH . 'detalle_encargado.php'; ?>

            <!-- Fila 6: DETALLE DEL VENDEDOR -->
            <?php include BASE_PATH . 'detalle_vendedor.php'; ?>

            <!-- TÍTULO: DETALLE DE COTIZACIÓN -->
            <?php include BASE_PATH . 'detalle_cotizacion.php'; ?>
            
            <!-- TÍTULO: DETALLE GENERAL -->
            <?php include BASE_PATH . 'detalle.php'; ?>

            <!-- TÍTULO: CÁLCULOS FINALES -->
            <?php include BASE_PATH . 'detalle_total.php'; ?>

            <!-- TÍTULO: OBSERVACIONES -->
            <?php include BASE_PATH . 'observaciones.php'; ?>

            <!-- TÍTULO: SECCIÓN PARA LOS PAGOS -->
            <br>
            <?php include BASE_PATH . 'pago.php'; ?>
            <br>

            <!-- TÍTULO: CONDICIONES -->
            <?php include BASE_PATH . 'traer_condiciones.php'; ?>

            <!-- TÍTULO: REQUISITOS -->
            <?php include BASE_PATH . 'traer_requisitos.php'; ?>

            <!-- TÍTULO: OBLIGACIONES DEL CLIENTE -->
            <?php include BASE_PATH . 'obligaciones_cliente.php'; ?>

            <!-- TÍTULO: MENSAJE DE DESPEDIDA -->
            <div>
                <?php include BASE_PATH . 'mensaje_despedida.php'; ?>
            </div>

            <!-- TÍTULO: DATOS BANCARIOS -->
            <?php include BASE_PATH . 'traer_datos_bancarios.php'; ?>

            <!-- TÍTULO: FIRMA -->
            <?php include BASE_PATH . 'firma.php'; ?>

            <button type="submit" class="submit">Guardar cotización</button>
        </form>
    </div>

    <!-- TÍTULO: ARCHIVOS JAVASCRIPT -->
    <script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/nueva_cotizacion_pr.js"></script> 
    <script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/cuadro_rojo_cotizacion.js"></script> 

</body>
</html>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa nueva cotizacion .PHP -----------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITredSpa.
BPPJ
-->