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
    ------------------------------------- INICIO ITred Spa Procesar modificacion .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa
$conn = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// datos cotizacion
$id_cotizacion = $_POST['numero_cotizacion'];
$fecha_validez = $_POST['fecha_validez'];
$fecha_emision = $_POST['fecha_emision'];

// Datos empresa
$empresa_rut = $_POST['empresa_rut'];
$empresa_nombre = $_POST['empresa_nombre'];
$empresa_area = $_POST['empresa_area'];
$empresa_direccion = $_POST['empresa_direccion'];
$empresa_telefono = $_POST['empresa_telefono'];
$empresa_email = $_POST['empresa_email'];

// datos proyecto
$proyecto_nombre = $_POST['proyecto_nombre'];
$proyecto_codigo = $_POST['proyecto_codigo'];
$area_trabajo = $_POST['area_trabajo'];
$tipo_trabajo = $_POST['tipo_trabajo'];
$riesgo = $_POST['riesgo'];
$dias_compra = $_POST['dias_compra'];
$dias_trabajo = $_POST['dias_trabajo'];
$trabajadores = $_POST['trabajadores'];
$horario = $_POST['horario'];
$colacion = $_POST['colacion'];
$entrega = $_POST['entrega'];

// datos cliente
$cliente_nombre = $_POST['cliente_nombre'];
$cliente_rut = $_POST['cliente_rut'];
$cliente_empresa = $_POST['cliente_empresa'];
$cliente_direccion = $_POST['cliente_direccion'];
$cliente_lugar = $_POST['cliente_lugar'];
$cliente_fono = $_POST['cliente_fono'];
$cliente_email = $_POST['cliente_email'];
$cliente_cargo = $_POST['cliente_cargo'];
$cliente_giro = $_POST['cliente_giro'];
$cliente_comuna = $_POST['cliente_comuna'];
$cliente_ciudad = $_POST['cliente_ciudad'];
$cliente_tipo = $_POST['cliente_tipo'];

// datos encargado
$enc_nombre = $_POST['enc_nombre'];
$enc_email = $_POST['enc_email'];
$enc_fono = $_POST['enc_fono'];
$enc_celular = $_POST['enc_celular'];
$enc_proyecto = $_POST['enc_proyecto'];

// datos vendedor
$vendedor_nombre = $_POST['vendedor_nombre'];
$vendedor_email = $_POST['vendedor_email'];
$vendedor_telefono = $_POST['vendedor_telefono'];
$vendedor_celular = $_POST['vendedor_celular'];

// Actualizar datos de la empresa
$sql = "UPDATE E_Empresa 
        SET nombre_empresa = IFNULL(NULLIF(?, ''), nombre_empresa),
            id_area_empresa = IFNULL(NULLIF(?, ''), id_area_empresa),
            direccion_empresa = IFNULL(NULLIF(?, ''), direccion_empresa),
            telefono_empresa = IFNULL(NULLIF(?, ''), telefono_empresa),
            email_empresa = IFNULL(NULLIF(?, ''), email_empresa)
        WHERE rut_empresa = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", 
    $empresa_nombre, $empresa_area, $empresa_direccion, 
    $empresa_telefono, $empresa_email, $empresa_rut
);

if ($stmt->execute()) {
    echo "Datos de la empresa actualizados correctamente.<br>";
} else {
    echo "Error al actualizar datos de la empresa: " . $stmt->error . "<br>";
}
$stmt->close();

// Actualizar datos del cliente
$sql_update = "UPDATE C_Clientes 
               SET nombre_empresa_cliente = IFNULL(NULLIF(?, ''), nombre_empresa_cliente),
                   telefono_empresa_cliente = IFNULL(NULLIF(?, ''), telefono_empresa_cliente),
                   email_empresa_cliente = IFNULL(NULLIF(?, ''), email_empresa_cliente),
                   giro_empresa_cliente = IFNULL(NULLIF(?, ''), giro_empresa_cliente),
                   tipo_empresa_cliente = IFNULL(NULLIF(?, ''), tipo_empresa_cliente),
                   ciudad_empresa_cliente = IFNULL(NULLIF(?, ''), ciudad_empresa_cliente),
                   comuna_empresa_cliente = IFNULL(NULLIF(?, ''), comuna_empresa_cliente),
                   direccion_empresa_cliente = IFNULL(NULLIF(?, ''), direccion_empresa_cliente),
                   nombre_encargado_cliente = IFNULL(NULLIF(?, ''), nombre_encargado_cliente),
                   cargo_encargado_cliente = IFNULL(NULLIF(?, ''), cargo_encargado_cliente)
               WHERE rut_empresa_cliente = ?";

$stmt_update = $conn->prepare($sql_update);
$stmt_update->bind_param("sssssssssss", 
    $cliente_empresa, $cliente_fono, $cliente_email, $cliente_giro, $cliente_tipo,
    $cliente_ciudad, $cliente_comuna, $cliente_direccion, $cliente_nombre, $cliente_cargo, $cliente_rut
);

if ($stmt_update->execute()) {
    echo "Datos del cliente actualizados correctamente.<br>";
} else {
    echo "Error al actualizar datos del cliente: " . $stmt_update->error . "<br>";
}
$stmt_update->close();

// Obtener y actualizar datos del proyecto
$sql_get_id_proyecto = "SELECT id_proyecto FROM C_Cotizaciones WHERE numero_cotizacion = ?";
$stmt_get_id_proyecto = $conn->prepare($sql_get_id_proyecto);
$stmt_get_id_proyecto->bind_param("i", $id_cotizacion);
$stmt_get_id_proyecto->execute();
$result_get_id_proyecto = $stmt_get_id_proyecto->get_result();

if ($result_get_id_proyecto->num_rows > 0) {
    $row = $result_get_id_proyecto->fetch_assoc();
    $id_proyecto = $row['id_proyecto'];
    
    $sql_update = "UPDATE C_Proyectos 
                   SET nombre_proyecto = IFNULL(NULLIF(?, ''), nombre_proyecto),
                       codigo_proyecto = IFNULL(NULLIF(?, ''), codigo_proyecto),
                       id_tp_trabajo = IFNULL(NULLIF(?, ''), id_tp_trabajo),
                       id_area = IFNULL(NULLIF(?, ''), id_area),
                       id_tp_riesgo = IFNULL(NULLIF(?, ''), id_tp_riesgo)
                   WHERE id_proyecto = ?";

    $stmt_update_proyecto = $conn->prepare($sql_update);
    $stmt_update_proyecto->bind_param("sssssi", 
        $proyecto_nombre, $proyecto_codigo, $tipo_trabajo, $area_trabajo, $riesgo, $id_proyecto
    );

    if ($stmt_update_proyecto->execute()) {
        echo "Datos del proyecto actualizados correctamente.<br>";
    } else {
        echo "Error al actualizar datos del proyecto: " . $stmt_update_proyecto->error . "<br>";
    }
    $stmt_update_proyecto->close();
} else {
    echo "No se encontró el proyecto asociado con la cotización proporcionada.<br>";
}
$stmt_get_id_proyecto->close();

// Actualizar datos del encargado
$sql_update_encargado = "UPDATE Em_Encargados 
                         SET nombre_encargado = IFNULL(NULLIF(?, ''), nombre_encargado),
                             email_encargado = IFNULL(NULLIF(?, ''), email_encargado),
                             fono_encargado = IFNULL(NULLIF(?, ''), fono_encargado),
                             celular_encargado = IFNULL(NULLIF(?, ''), celular_encargado)
                         WHERE id_encargado = (SELECT id_encargado FROM C_Cotizaciones WHERE numero_cotizacion = ?)";

$stmt_update_encargado = $conn->prepare($sql_update_encargado);
$stmt_update_encargado->bind_param("ssssi", 
    $enc_nombre, $enc_email, $enc_fono, $enc_celular, $id_cotizacion
);

if ($stmt_update_encargado->execute()) {
    echo "Datos del encargado actualizados correctamente.<br>";
} else {
    echo "Error al actualizar datos del encargado: " . $stmt_update_encargado->error . "<br>";
}
$stmt_update_encargado->close();

// Actualizar datos del vendedor
$sql_update_vendedor = "UPDATE Em_Vendedores 
                        SET nombre_vendedor = IFNULL(NULLIF(?, ''), nombre_vendedor),
                            email_vendedor = IFNULL(NULLIF(?, ''), email_vendedor),
                            fono_vendedor = IFNULL(NULLIF(?, ''), fono_vendedor),
                            celular_vendedor = IFNULL(NULLIF(?, ''), celular_vendedor)
                        WHERE id_vendedor = (SELECT id_vendedor FROM C_Cotizaciones WHERE numero_cotizacion = ?)";

$stmt_update_vendedor = $conn->prepare($sql_update_vendedor);
$stmt_update_vendedor->bind_param("ssssi", 
    $vendedor_nombre, $vendedor_email, $vendedor_telefono, $vendedor_celular, $id_cotizacion
);

if ($stmt_update_vendedor->execute()) {
    echo "Datos del vendedor actualizados correctamente.<br>";
} else {
    echo "Error al actualizar datos del vendedor: " . $stmt_update_vendedor->error . "<br>";
}
$stmt_update_vendedor->close();

// Cerrar la conexión
$conn->close();
?>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
<link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/procesar_modificacion.css">

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
<script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/procesar_modificacion.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Procesar Modificacion .PHP ----------------------------------------
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