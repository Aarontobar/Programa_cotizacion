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
    
<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
    // Establece la conexión con la base de datos y configura los parámetros iniciales
    $mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
?>

<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->
    
    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// TÍTULO: OBTENCIÓN DE ID DE EMPRESA
    /* Obtiene el ID de la empresa desde la sesión o el parámetro URL */
    $id_empresa = isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : 
                (isset($_GET['id_empresa']) ? $_GET['id_empresa'] : null);

    if (!$id_empresa) {
        die('Error: No se ha seleccionado una empresa');
    }

// TÍTULO: CONEXIÓN A LA BASE DE DATOS
    /* Establece la conexión con la base de datos y configura la codificación */
    $mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");

// TÍTULO: CONSULTA DE DATOS DE LA EMPRESA
    /* Prepara y ejecuta la consulta para obtener los datos de la empresa seleccionada */
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

// TÍTULO: ALMACENAMIENTO DE DATOS DE LA EMPRESA EN LA SESIÓN
    /* Guarda los datos de la empresa en la sesión si aún no están almacenados */
    if (!isset($_SESSION['empresa_data'])) {
        $_SESSION['empresa_data'] = $empresa_data;
    }

// TÍTULO: DEFINICIÓN DE LA RUTA BASE
    /* Define la ruta base para los archivos incluidos */
    $base_path = dirname(__FILE__) . '/';

// TÍTULO: PROCESAMIENTO DEL FORMULARIO
/* Procesa el envío del formulario de cotización */
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    try {
        // TÍTULO: VALIDACIÓN DE EMPRESA SELECCIONADA
            /* Verifica que se haya seleccionado una empresa */
            if (!isset($_SESSION['id_empresa'])) {
                throw new Exception('No se ha seleccionado una empresa');
            }

        // TÍTULO: VALIDACIÓN DE CAMPOS REQUERIDOS -->
            /* Valida que los campos obligatorios estén completos */
            $fecha_emision = $_POST['fecha_emision'] ?? null;
            if (!$fecha_emision) {
                throw new Exception('La fecha de emisión es requerida');
            }

        // TÍTULO: INICIO DE TRANSACCIÓN -->
            /* Inicia una transacción en la base de datos */
            $mysqli->begin_transaction();

        // TÍTULO: INSERCIÓN DE LA COTIZACIÓN -->
            /* Inserta los datos de la nueva cotización en la base de datos */
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
        
        // TÍTULO: CONFIRMACIÓN DE TRANSACCIÓN
            /* Confirma la transacción en la base de datos */
            $mysqli->commit();
            
            $response = array(
                'success' => true,
                'message' => 'Cotización creada exitosamente',
                'cotizacion_id' => $id_cotizacion
            );
        
    } catch (Exception $e) {
        // TÍTULO: MANEJO DE ERRORES
            /* Revierte la transacción en caso de error */
            if ($mysqli->connect_errno != 0) {
                $mysqli->rollback();
            }
            
            $response = array(
                'success' => false,
                'message' => $e->getMessage()
            );
    }
    
    // TÍTULO: ENVÍO DE RESPUESTA
        /* Envía la respuesta al cliente */
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
            
            <!-- TITULO: FILA -->

            <div class="row">
                <!-- TÍTULO: LOGO DE LA EMPRESA -->

                    <!-- carga el php del logo de la empresa -->
                    <?php include $base_path . 'cargar_logo_empresa.php'; ?>

                <!-- TÍTULO: CUADRO ROJO DE COTIZACIÓN -->

                    <!-- carga el php del cuadro rojo de cotizacion -->
                    <?php include $base_path . 'cuadro_rojo_cotizacion.php'; ?>

                <!-- TÍTULO: SECCIÓN DE DATOS -->

                    <!-- carga la fecha de emision -->
                    <fieldset class="box-6 cuadro-datos">
                        <label for="fecha_emision">Fecha de Emisión:</label>
                        <input type="date" id="fecha_emision" name="fecha_emision" required>
                    </fieldset>
            </div>

            <!-- TÍTULO: DATOS DE LA EMPRESA -->

                <!-- carga el php de los datos de la empresa -->
                <?php include $base_path . 'datos_empresa.php'; ?>

            <!-- TÍTULO: DETALLE DEL CLIENTE -->

                <!-- carga el php de los detalle del cliente -->
                <?php include $base_path . 'detalle_cliente.php'; ?>

            <div class="row">
                <!-- TÍTULO: DETALLE DEL PROYECTO -->

                    <!-- carga el php de los detalles del proyecto -->
                    <?php include $base_path . 'detalle_proyecto.php'; ?>
            </div>

            <!-- TÍTULO: DETALLE DEL ENCARGADO -->

                <!-- carga el php de los detalles del encargado -->
                <?php include $base_path . 'detalle_encargado.php'; ?>

            <!-- TÍTULO: DETALLE DEL VENDEDOR -->

                <!-- carga el php de los detalles del vendedor -->
                <?php include $base_path . 'detalle_vendedor.php'; ?>

            <!-- TÍTULO: DETALLE DE COTIZACIÓN -->

                <!-- carga el php de los detalles del vendedor -->
                <?php include $base_path . 'detalle_cotizacion.php'; ?>
            
            <!-- TÍTULO: DETALLE GENERAL -->

                <!-- carga el php de los detalles generales -->
                <?php include $base_path . 'detalle.php'; ?>

            <!-- TÍTULO: CÁLCULOS FINALES -->

                <!-- carga el php de los calculos finales -->
                <?php include $base_path . 'detalle_total.php'; ?>

            <!-- TÍTULO: OBSERVACIONES -->

                <!-- carga el php de las observaciones -->
                <?php include $base_path . 'observaciones.php'; ?>

            <!-- TÍTULO: SECCIÓN PARA LOS PAGOS -->

            <!-- carga el php para los pagos -->
                <br>
                <?php include $base_path . 'pago.php'; ?>
                <br>

            <!-- TÍTULO: CONDICIONES -->

                <!-- carga el php de las condiciones -->
                <?php include $base_path . 'traer_condiciones.php'; ?>

            <!-- TÍTULO: REQUISITOS -->

                <!-- carga el php para traer los requisitos -->
                <?php include $base_path . 'traer_requisitos.php'; ?>

            <!-- TÍTULO: OBLIGACIONES DEL CLIENTE -->

                <!-- carga el php para las obligaciones del cliente -->
                <?php include $base_path . 'obligaciones_cliente.php'; ?>

            <!-- TÍTULO: MENSAJE DE DESPEDIDA -->

                <!-- carga el php para el mensaje de despedida -->
                <div>
                    <?php include $base_path . 'mensaje_despedida.php'; ?>
                </div>

            <!-- TÍTULO: DATOS BANCARIOS -->

                <!-- carga el php de los datos bancarios -->
                <?php include $base_path . 'traer_datos_bancarios.php'; ?>

            <!-- TÍTULO: FIRMA -->

                <!-- carga el php para la firma -->
                <?php include $base_path . 'firma.php'; ?>

            <!-- TÍTULO: BOTON GUARDADO -->
                <!-- guarda la cotizacion -->
            <button type="submit" class="submit">Guardar cotización</button>
        </form>
    </div>

<!-- TÍTULO IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
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

