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
    ------------------------------------- INICIO ITred Spa crear_cliente_pr .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TÍTULO: CONEXIÓN A LA BASE DE DATOS -->
<!-- Establece la conexión con la base de datos y configura los parámetros iniciales -->
<?php
$mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");
?>

<!-- TÍTULO: INICIALIZACIÓN DE SESIÓN Y VARIABLES -->
<!-- Inicia la sesión si no está iniciada y establece variables iniciales -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id_empresa = $_SESSION['id_empresa'] ?? $_GET['id_empresa'] ?? null;

if (!$id_empresa && basename($_SERVER['PHP_SELF']) !== 'crear_empresa_pr.php') {
    die('ID de empresa no válido.');
}

$mensaje = '';
$mostrarLista = false;
?>

<!-- TÍTULO: PROCESAMIENTO DEL FORMULARIO -->
<!-- Procesa el formulario cuando se envía y realiza la inserción o actualización en la base de datos -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cliente') {
    // Captura y validación de datos del formulario
    $rut_empresa_cliente = $_POST['rut_empresa_cliente'] ?? '';
    $nombre_empresa_cliente = $_POST['nombre_empresa_cliente'] ?? '';
    $telefono_empresa_cliente = $_POST['telefono_empresa_cliente'] ?? '';
    $email_empresa_cliente = $_POST['email_empresa_cliente'] ?? '';
    $giro_empresa_cliente = $_POST['giro_empresa_cliente'] ?? '';
    $tipo_empresa_cliente = $_POST['tipo_empresa_cliente'] ?? '';
    $lugar_empresa_cliente = $_POST['lugar_empresa_cliente'] ?? '';
    $comuna_empresa_cliente = $_POST['comuna_empresa_cliente'] ?? '';
    $ciudad_empresa_cliente = $_POST['ciudad_empresa_cliente'] ?? '';
    $direccion_empresa_cliente = $_POST['direccion_empresa_cliente'] ?? '';
    $observacion = $_POST['observacion'] ?? '';
    
    $rut_encargado_cliente = $_POST['rut_encargado_cliente'] ?? '';
    $nombre_encargado_cliente = $_POST['nombre_encargado_cliente'] ?? '';
    $telefono_encargado_cliente = $_POST['telefono_encargado_cliente'] ?? '';
    $email_encargado_cliente = $_POST['email_encargado_cliente'] ?? '';
    $cargo_encargado_cliente = $_POST['cargo_encargado_cliente'] ?? '';
    $ciudad_encargado_cliente = $_POST['ciudad_encargado_cliente'] ?? '';
    $comuna_encargado_cliente = $_POST['comuna_encargado_cliente'] ?? '';
    $direccion_encargado_cliente = $_POST['direccion_encargado_cliente'] ?? '';

    // Verificación de cliente existente
    $stmt = $mysqli->prepare("SELECT id_cliente FROM C_Clientes WHERE rut_empresa_cliente = ?");
    $stmt->bind_param("s", $rut_empresa_cliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mensaje = "Este cliente ya existe. Por favor, verifique los registros o contacte a soporte.";
    } else {
        // Inserción de nuevo cliente
        $stmt = $mysqli->prepare("INSERT INTO C_Clientes (
            rut_empresa_cliente, nombre_empresa_cliente, telefono_empresa_cliente, 
            email_empresa_cliente, id_giro, tipo_empresa_cliente, 
            lugar_empresa_cliente, comuna_empresa_cliente, ciudad_empresa_cliente, 
            direccion_empresa_cliente, observacion, rut_encargado_cliente, 
            nombre_encargado_cliente, telefono_encargado_cliente, email_encargado_cliente, 
            id_cargo, ciudad_encargado_cliente, comuna_encargado_cliente, 
            direccion_encargado_cliente
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssssssssssssssss", 
            $rut_empresa_cliente, $nombre_empresa_cliente, $telefono_empresa_cliente, 
            $email_empresa_cliente, $id_giro, $tipo_empresa_cliente, 
            $lugar_empresa_cliente, $comuna_empresa_cliente, $ciudad_empresa_cliente, 
            $direccion_empresa_cliente, $observacion, $rut_encargado_cliente, 
            $nombre_encargado_cliente, $telefono_encargado_cliente, $email_encargado_cliente, 
            $id_cargo, $ciudad_encargado_cliente, $comuna_encargado_cliente, 
            $direccion_encargado_cliente
        );

        if ($stmt->execute()) {
            $mensaje = "Cliente creado exitosamente.";
            $mostrarLista = true;
        } else {
            $mensaje = "Error al crear el cliente: " . $stmt->error;
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO CSS -->
 
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_cliente/crear_cliente_pr.css">
</head>
<body>
    <div class="contenedor">
        <!-- TÍTULO: FORMULARIO DE CREACIÓN DE CLIENTE -->
            <!-- Formulario para agregar un nuevo cliente -->
            <form id="formulario-cliente" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="formulario" value="cliente">
                <h1>Rellena el formulario para agregar un nuevo cliente</h1>

                <?php if (!empty($mensaje)): ?>
                    <div class="notificacion" id="notificacion">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>

                <div class="contenedor">
                    <div class="formulario-empresa">
                        <h3>Información del Negocio / Empresa</h3>
                        <?php include 'formulario_empresa_cliente.php'; ?>
                    </div>

                    <div class="formulario-encargado">
                        <h3>Información del Encargado / Cliente</h3>
                        <?php include 'formulario_encargado.php'; ?>
                    </div>
                </div>

            <button type="submit" class="submit">Crear Cliente</button>
        </form>

        <!-- TÍTULO: LISTA DE CLIENTES -->
            <!-- Muestra la lista de clientes existentes -->
            <div class="lista-clientes">
                <h2>Listado de Clientes</h2>
                <div class="tabla-contenedor-lista">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RUT Empresa</th>
                                <th>Nombre Empresa</th>
                                <th>Email</th>
                                <th>Giro</th>
                                <th>Comuna</th>
                                <th>Dirección</th>
                                <th>RUT Encargado</th>
                                <th>Nombre Encargado</th>
                                <th>Cargo Encargado</th>
                                <th>Teléfono Encargado</th>
                                <th>Email Encargado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $resultado = $mysqli->query("SELECT * FROM C_Clientes ORDER BY id_cliente DESC");
                            if ($resultado->num_rows > 0) {
                                while ($cliente = $resultado->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$cliente['id_cliente']}</td>
                                            <td>{$cliente['rut_empresa_cliente']}</td>
                                            <td>{$cliente['nombre_empresa_cliente']}</td>
                                            <td>{$cliente['email_empresa_cliente']}</td>
                                            <td>{$cliente['id_giro']}</td>
                                            <td>{$cliente['comuna_empresa_cliente']}</td>
                                            <td>{$cliente['direccion_empresa_cliente']}</td>
                                            <td>{$cliente['rut_encargado_cliente']}</td>
                                            <td>{$cliente['nombre_encargado_cliente']}</td>
                                            <td>{$cliente['id_cargo']}</td>
                                            <td>{$cliente['telefono_encargado_cliente']}</td>
                                            <td>{$cliente['email_encargado_cliente']}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='12'>No hay clientes registrados.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO JS -->
    <!-- Llama al archivo JS para la funcionalidad de la página -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_cliente/crear_cliente_pr.js"></script>

</body>
</html>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa crear_cliente_pr .PHP ----------------------------------------
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

