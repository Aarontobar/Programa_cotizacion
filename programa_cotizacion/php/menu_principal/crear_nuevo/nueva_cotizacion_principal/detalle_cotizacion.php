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
    ------------------------------------- INICIO ITred Spa Detalle cotizacion.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->



    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize $id_cotizacion at the start
    $id_cotizacion = null;
    
    // Obtener id_cliente
    $sql = "SELECT id_cliente FROM C_Clientes WHERE rut_empresa_cliente = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $cliente_rut);
    $stmt->execute();
    $stmt->bind_result($id_cliente);
    $stmt->fetch();
    $stmt->close();
    if (!$id_cliente) {
        die("Error: Cliente no encontrado.");
    }

    // Obtener id_proyecto
    $sql = "SELECT id_proyecto FROM C_Proyectos WHERE codigo_proyecto = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $proyecto_codigo);
    $stmt->execute();
    $stmt->bind_result($id_proyecto);
    $stmt->fetch();
    $stmt->close();
    if (!$id_proyecto) {
        die("Error: Proyecto no encontrado.");
    }

    // Obtener id_empresa
    $sql = "SELECT id_empresa FROM E_Empresa WHERE rut_empresa = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $empresa_rut);
    $stmt->execute();
    $stmt->bind_result($id_empresa);
    $stmt->fetch();
    $stmt->close();
    if (!$id_empresa) {
        die("Error: Empresa no encontrada.");
    }

    // Obtener id_encargado
    $sql = "SELECT id_encargado FROM em_encargados WHERE id_empresa = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id_empresa);
    $stmt->execute();
    $stmt->bind_result($id_enc);
    $stmt->fetch();
    $stmt->close();
    if (!$id_enc) {
        die("Error: Encargado no encontrado.");
    }

    // Recibir datos del formulario cotización
    $numero_cotizacion = isset($_POST['numero_cotizacion']) ? trim($_POST['numero_cotizacion']) : null;
    $fecha_validez = isset($_POST['fecha_validez']) ? trim($_POST['fecha_validez']) : null;
    $fecha_emision = isset($_POST['fecha_emision']) ? trim($_POST['fecha_emision']) : null;
    $estado = "Pendiente"; // Asignar por defecto 'pendiente' al estado

    // Validar datos obligatorios
    if (!$numero_cotizacion || !$fecha_emision || !$fecha_validez || !$id_cliente || !$id_proyecto || !$id_empresa || !$id_vendedor || !$id_enc) {
        die("Faltan datos obligatorios para la cotización.");
    }

    // Insertar en la tabla Cotizaciones
    $sql_cotizaciones = "INSERT INTO C_Cotizaciones (
        numero_cotizacion, fecha_emision, fecha_validez, estado,
        id_cliente, id_proyecto, id_empresa, id_vendedor, id_encargado
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql_cotizaciones)) {
        $stmt->bind_param(
            "ssssiiiii",
            $numero_cotizacion, $fecha_emision, $fecha_validez, $estado,
            $id_cliente, $id_proyecto, $id_empresa, $id_vendedor, $id_enc
        );

        if ($stmt->execute()) {
            // Get the ID only once and store it
            $id_cotizacion = $stmt->insert_id;
            
            // Store the ID in the session for later use
            $_SESSION['ultimo_id_cotizacion'] = $id_cotizacion;
            
            // You can also store it in a hidden form field if needed
            echo "<input type='hidden' id='id_cotizacion' value='" . $id_cotizacion . "'>";
            
            // Optional: Return success response
            $response = array(
                'success' => true,
                'message' => 'Cotización creada exitosamente',
                'cotizacion_id' => $id_cotizacion
            );
            echo json_encode($response);
        } else {
            // Handle error
            $response = array(
                'success' => false,
                'message' => 'Error al crear la cotización: ' . $stmt->error
            );
            echo json_encode($response);
        }
        $stmt->close();
    } else {
        // Handle preparation error
        $response = array(
            'success' => false,
            'message' => 'Error en la preparación de la consulta: ' . $mysqli->error
        );
        echo json_encode($response);
    }
}
?>



     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Detalle cotizacion.PHP ----------------------------------------
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
