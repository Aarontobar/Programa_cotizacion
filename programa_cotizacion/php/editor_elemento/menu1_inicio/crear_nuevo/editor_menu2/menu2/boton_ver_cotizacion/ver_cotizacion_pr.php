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
    ------------------------------------- INICIO ITred Spa Ver Listado .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->
     <?php
// Inicia la sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Asegúrate de que la conexión a la base de datos esté disponible
require_once($_SERVER['DOCUMENT_ROOT'] . '/programa_cotizacion/config/database.php');

// Verifica si el formulario de actualización de estado ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cotizacion_id'], $_POST['nuevo_estado'])) {
    $id_cotizacion = intval($_POST['cotizacion_id']);
    $nuevo_estado = $_POST['nuevo_estado'];

    // Actualiza el estado de la cotización en la base de datos
    $stmt_update = $mysqli->prepare("UPDATE C_Cotizaciones SET estado = ? WHERE id_cotizacion = ?");
    $stmt_update->bind_param('si', $nuevo_estado, $id_cotizacion);
    $stmt_update->execute();
    $stmt_update->close();
}

// Obtiene el ID de la empresa desde la URL o la sesión
$id_empresa = isset($_GET['empresa_id']) ? intval($_GET['empresa_id']) : 
             (isset($_SESSION['id_empresa']) ? intval($_SESSION['id_empresa']) : 0);

if (!$id_empresa) {
    die("Error: No se ha seleccionado una empresa.");
}

// Filtros (recibidos por GET)
$numero_cotizacion = isset($_GET['numero_cotizacion']) ? $_GET['numero_cotizacion'] : '';
$estado = isset($_GET['estado']) ? $_GET['estado'] : '';
$fecha_INICIO = isset($_GET['fecha_INICIO']) ? $_GET['fecha_INICIO'] : '';
$fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';

// Construye la consulta SQL inicial
$sql = "SELECT c.id_cotizacion AS cotizacion_id, c.fecha_emision, c.fecha_validez, c.numero_cotizacion, c.estado, 
            t.total_final, p.nombre_proyecto AS proyecto_descripcion, cl.nombre_empresa_cliente AS cliente_nombre, 
            v.nombre_vendedor AS vendedor_nombre
        FROM C_Cotizaciones c
        JOIN C_Proyectos p ON c.id_proyecto = p.id_proyecto
        JOIN C_Clientes cl ON c.id_cliente = cl.id_cliente
        JOIN Em_Vendedores v ON c.id_vendedor = v.id_vendedor
        JOIN C_Totales t ON c.id_cotizacion = t.id_cotizacion
        WHERE c.id_empresa = ?";

// Crea un array para almacenar las condiciones del WHERE
$condiciones = [];
$parametros = [$id_empresa]; // Parametros para bind_param

// Añade condiciones según los filtros ingresados
if ($numero_cotizacion != '') {
    $condiciones[] = "c.numero_cotizacion LIKE ?";
    $parametros[] = "%$numero_cotizacion%";
}

if ($estado != '') {
    $condiciones[] = "c.estado = ?";
    $parametros[] = $estado;
}

if ($fecha_INICIO != '' && $fecha_fin != '') {
    $condiciones[] = "c.fecha_emision BETWEEN ? AND ?";
    $parametros[] = $fecha_INICIO;
    $parametros[] = $fecha_fin;
}

// Si hay filtros, añade las condiciones a la consulta
if (count($condiciones) > 0) {
    $sql .= " AND " . implode(" AND ", $condiciones);
}

// Prepara la consulta
$stmt = $mysqli->prepare($sql);

// Crea dinámicamente el tipo de los parámetros (i = entero, s = string)
$tipos_param = str_repeat('s', count($parametros) - 1); // El primero es entero (id_empresa)
$tipos_param = 'i' . $tipos_param;

// Asigna los parámetros a la consulta
$stmt->bind_param($tipos_param, ...$parametros);

// Ejecuta la consulta
$stmt->execute();

// Obtiene el resultado
$result = $stmt->get_result();

$mensaje = "";

if ($result->num_rows > 0) {
    $mensaje .= "<h1>Listado de Cotizaciones</h1>";
    $mensaje .= "<table id='tabla-cotizaciones' border='1'>";
    $mensaje .= "<thead>
                    <tr>
                        <th data-type='number' class='sortable'>Numero Cotización <span class='arrow'></span></th>
                        <th data-type='date' class='sortable'>Fecha Emisión <span class='arrow'></span></th>
                        <th data-type='date' class='sortable'>Fecha Validez <span class='arrow'></span></th>
                        <th data-type='number' class='sortable'>Total <span class='arrow'></span></th>
                        <th data-type='text' class='sortable'>Proyecto <span class='arrow'></span></th>
                        <th data-type='text' class='sortable'>Cliente <span class='arrow'></span></th>
                        <th data-type='text' class='sortable'>Vendedor <span class='arrow'></span></th>
                        <th data-type='text' class='sortable'>Estado <span class='arrow'></span></th>
                        <th>Acciones</th>
                    </tr>
                </thead>";
    $mensaje .= "<tbody>";

    while ($row = $result->fetch_assoc()) {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . htmlspecialchars($row['numero_cotizacion']) . "</td>";
        $mensaje .= "<td>" . htmlspecialchars($row['fecha_emision']) . "</td>";
        $mensaje .= "<td>" . htmlspecialchars($row['fecha_validez']) . "</td>";
        $mensaje .= "<td>" . htmlspecialchars($row['total_final']) . "</td>";
        $mensaje .= "<td>" . htmlspecialchars($row['proyecto_descripcion']) . "</td>";
        $mensaje .= "<td>" . htmlspecialchars($row['cliente_nombre']) . "</td>";
        $mensaje .= "<td>" . htmlspecialchars($row['vendedor_nombre']) . "</td>";
        $mensaje .= "<td class='estado-" . strtolower($row['estado']) . "'>" . htmlspecialchars($row['estado']) . "</td>";
        $mensaje .= "<td>";
        $mensaje .= "<a href='?page=ver_cotizacion&action=ver&ver_cotizacion_id=" . $row['cotizacion_id'] . "&id=" . $id_empresa . "'>Ver</a> | ";    
        $mensaje .= "<a href='?page=ver_cotizacion&action=modificar&ver_cotizacion_id=" . $row['cotizacion_id'] . "&id=" . $id_empresa . "'>Modificar</a> | ";
        $mensaje .= "<a href='crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/eliminar_cotizacion.php?id=" . $row['cotizacion_id'] . "&id_empresa=" . $id_empresa . "'>Eliminar</a> | ";
        $mensaje .= "<form method='POST'>";
        $mensaje .= "<input type='hidden' name='cotizacion_id' value='" . $row['cotizacion_id'] . "'>";
        $mensaje .= "<select name='nuevo_estado'>";
        $mensaje .= "<option value='pendiente' " . ($row['estado'] == 'pendiente' ? 'selected' : '') . ">Pendiente</option>";
        $mensaje .= "<option value='aprobada' " . ($row['estado'] == 'aprobada' ? 'selected' : '') . ">Aprobada</option>";
        $mensaje .= "<option value='rechazada' " . ($row['estado'] == 'rechazada' ? 'selected' : '') . ">Rechazada</option>";
        $mensaje .= "</select>";
        $mensaje .= "<button type='submit'>Actualizar</button>";
        $mensaje .= "</form>";
        $mensaje .= "</td>";
        $mensaje .= "</tr>";
    }

    $mensaje .= "</tbody>";
    $mensaje .= "</table>";
} else {
    $mensaje = "<p>No hay cotizaciones que coincidan con los filtros.</p>";
}
?>

<!-- INICIO HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cotizaciones</title>

    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/ver_listado.css">
</head>
<body>
<div class="ver_cotizacion_principal">

<!-- llama al archivo PHP -->
<div>
    <?php include 'filtros_busqueda.php'; ?>
</div>

<!-- envia mensaje de estado -->
<?php echo $mensaje; ?>

</div>

<!-- Contenedor para mostrar el contenido dinámico -->
<div id="contenido-dinamico">
<?php
// Verifica si se ha pasado un parámetro 'action' en la URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Incluye el archivo PHP correspondiente según el valor de 'action'
    switch ($action) {
        case 'ver':
            include 'crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/ver.php';
            break;
        case 'modificar':
            include 'crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/modificar_cotizacion.php';
            break;
        default:
            echo '<p>Acción no encontrada.</p>';
            break;
    }
}
?>
</div>

</div>


<!-- llama al archivo CSS -->
<script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/ver_listado.js"></script>

</body>
</html>





<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa  Ver Listado .PHP -----------------------------------
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
