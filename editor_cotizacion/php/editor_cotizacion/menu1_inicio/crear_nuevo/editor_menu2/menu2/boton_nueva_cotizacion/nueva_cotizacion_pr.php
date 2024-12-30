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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Get company ID from session or URL parameter
$id_empresa = isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : 
             (isset($_GET['id_empresa']) ? $_GET['id_empresa'] : null);

if (!$id_empresa) {
    die('Error: No se ha seleccionado una empresa');
}

// Get company data
$mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

$stmt = $mysqli->prepare("
    SELECT e.*, a.nombre_area, f.ruta_foto
    FROM E_Empresa e
    LEFT JOIN Tp_Area a ON e.id_area_empresa = a.id_area
    LEFT JOIN FP_FotosPerfil f ON e.id_foto = f.id_foto
    WHERE e.id_empresa = ?
");

$stmt->bind_param("i", $id_empresa);
$stmt->execute();
$result = $stmt->get_result();
$empresa_data = $result->fetch_assoc();

if (!$empresa_data) {
    die('Error: Empresa no encontrada');
}

// Store company data in session if not already there
if (!isset($_SESSION['empresa_data'])) {
    $_SESSION['empresa_data'] = $empresa_data;
}

// Definir la ruta base para los includes
$base_path = dirname(__FILE__) . '/';

// TÍTULO: PROCESAMIENTO DEL FORMULARIO
    // Función para empezar a dar posibilidades de intento de envío de datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    try {
        // Validar que exista una empresa seleccionada
        if (!isset($_SESSION['id_empresa'])) {
            throw new Exception('No se ha seleccionado una empresa');
        }

        // Validar campos requeridos
        $fecha_emision = $_POST['fecha_emision'] ?? null;
        if (!$fecha_emision) {
            throw new Exception('La fecha de emisión es requerida');
        }

        // Iniciar transacción
        $mysqli->begin_transaction();

        // Insertar la cotización
        $stmt = $mysqli->prepare("
            INSERT INTO C_Cotizaciones (
                fecha_emision, 
                id_empresa,
                estado
            ) VALUES (?, ?, 'pendiente')
        ");
        
        $stmt->bind_param("si", $fecha_emision, $_SESSION['id_empresa']);
        
        if (!$stmt->execute()) {
            throw new Exception('Error al crear la cotización: ' . $mysqli->error);
        }
        
        $id_cotizacion = $mysqli->insert_id;
        
        // Confirmar transacción
        $mysqli->commit();
        
        $response = array(
            'success' => true,
            'message' => 'Cotización creada exitosamente',
            'cotizacion_id' => $id_cotizacion
        );
        
    } catch (Exception $e) {
        // Revertir transacción en caso de error
        if ($mysqli->connect_errno != 0) {
            $mysqli->rollback();
        }
        
        $response = array(
            'success' => false,
            'message' => $e->getMessage()
        );
    }
    
    // Enviar respuesta
    header('Content-Type: text/html; charset=utf-8');
    echo $response['message'];
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- TÍTULO IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <title>Nueva Cotización</title>
    <link rel="stylesheet" href="/programa_cotizacion/css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/nueva_cotizacion_pr.css">
</head>

<body>
<div class="nueva-cotizacion">
        <form id="formulario-cotizacion" method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_empresa" value="<?php echo htmlspecialchars($id_empresa); ?>">
            <input type="hidden" name="formulario" value="cotizacion">
            
            <!-- Fila 1 -->
            <div class="row">
                <!-- TÍTULO: LOGO DE LA EMPRESA -->
                <?php include $base_path . 'cargar_logo_empresa.php'; ?>

                <!-- TÍTULO: CUADRO ROJO DE COTIZACIÓN -->
                <?php include $base_path . 'cuadro_rojo_cotizacion.php'; ?>

                <!-- TÍTULO: SECCIÓN DE DATOS -->
                <fieldset class="box-6 cuadro-datos">
                    <label for="fecha_emision">Fecha de Emisión:</label>
                    <input type="date" id="fecha_emision" name="fecha_emision" required>
                </fieldset>
            </div>

            <!-- TITULO: DATOS DE LA EMPRESA -->
            <?php include $base_path . 'datos_empresa.php'; ?>

            <!-- TITULO: DETALLE DEL CLIENTE -->
            <?php include $base_path . 'detalle_cliente.php'; ?>

            <div class="row">
                <!-- TITULO: DETALLE DEL PROYECTO -->
                <?php include $base_path . 'detalle_proyecto.php'; ?>
            </div>

            <!-- TITULO: DETALLE DEL ENCARGADO -->
            <?php include $base_path . 'detalle_encargado.php'; ?>

            <!-- TITULO: DETALLE DEL VENDEDOR -->
            <?php include $base_path . 'detalle_vendedor.php'; ?>

            <!-- TÍTULO: DETALLE DE COTIZACIÓN -->
            <?php include $base_path . 'detalle_cotizacion.php'; ?>
            
            <!-- TÍTULO: DETALLE GENERAL -->
            <?php include $base_path . 'detalle.php'; ?>

            <!-- TÍTULO: CÁLCULOS FINALES -->
            <?php include $base_path . 'detalle_total.php'; ?>

            <!-- TÍTULO: OBSERVACIONES -->
            <?php include $base_path . 'observaciones.php'; ?>

            <!-- TÍTULO: SECCIÓN PARA LOS PAGOS -->
            <br>
            <?php include $base_path . 'pago.php'; ?>
            <br>

            <!-- TÍTULO: CONDICIONES -->
            <?php include $base_path . 'traer_condiciones.php'; ?>

            <!-- TÍTULO: REQUISITOS -->
            <?php include $base_path . 'traer_requisitos.php'; ?>

            <!-- TÍTULO: OBLIGACIONES DEL CLIENTE -->
            <?php include $base_path . 'obligaciones_cliente.php'; ?>

            <!-- TÍTULO: MENSAJE DE DESPEDIDA -->
            <div>
                <?php include $base_path . 'mensaje_despedida.php'; ?>
            </div>

            <!-- TÍTULO: DATOS BANCARIOS -->
            <?php include $base_path . 'traer_datos_bancarios.php'; ?>

            <!-- TÍTULO: FIRMA -->
            <?php include $base_path . 'firma.php'; ?>

            <button type="submit" class="submit">Guardar cotización</button>
        </form>
    </div>

<!-- TÍTULO IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- Llama al archivo js -->
    <script src="/programa_cotizacion/js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/nueva_cotizacion_pr.js"></script>
    <script src="/programa_cotizacion/js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/cuadro_rojo_cotizacion.js"></script>
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