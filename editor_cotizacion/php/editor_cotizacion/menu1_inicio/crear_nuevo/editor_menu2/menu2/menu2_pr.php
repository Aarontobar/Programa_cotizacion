<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->

<!-- ---------------------------------------------------------------------------------------------------------------
     ------------------------------------- INICIO ITred Spa menu2_pr .PHP -----------------------------------
     --------------------------------------------------------------------------------------------------------------- -->

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
// TÍTULO: PROCESAR SELECCIÓN DE EMPRESA
// Este bloque maneja la selección de empresa y almacena la información en la sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['empresa'])) {
    $_SESSION['id_empresa'] = (int)$_POST['empresa'];
    
    // Obtiene y almacena los datos de la empresa seleccionada
    $stmt = $mysqli->prepare("SELECT * FROM E_Empresa WHERE id_empresa = ?");
    $stmt->bind_param("i", $_SESSION['id_empresa']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $_SESSION['empresa_data'] = $row;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- TÍTULO IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <title>Sistema de Cotizaciones</title>
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/menu2_pr.css">
</head>
<body>
<!-- TÍTULO: SELECCIÓN DE EMPRESA -->

    <!-- contiene el formulario principal de selección de empresa -->
    <div class="programa_cotizacion">
        <form id="formulario-seleccionar-empresa" method="POST" action="">
        <?php include 'php\editor_cotizacion\menu1_inicio\crear_nuevo\editor_menu2\menu2\programa_cotizacion\seleccionar_empresa.php'; ?>
            <!-- Campo oculto para almacenar la empresa seleccionada -->
            <input type="hidden" id="selected-empresa" name="empresa" 
                   value="<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" />
            <button type="submit">Aceptar</button>
            <button type="button" id="reset-empresa">Reiniciar Selección</button>
        </form>

    <!-- TÍTULO: MENÚ DE NAVEGACIÓN PRINCIPAL -->

        <!-- Incluye el menú de navegación principal -->
        <?php include dirname(__FILE__) . '/programa_cotizacion/menu.php'; ?>

    <!-- TÍTULO: CONTENEDOR PARA EL FORMULARIO DE MODIFICACIÓN -->
     
        <!-- Contenedor para mostrar el formulario de modificación -->
        <div id="modificar-cotizacion-container"></div>

    <!-- TÍTULO: CONTENEDOR PARA MOSTRAR EL CONTENIDO DINÁMICO -->

        <!-- muestra el contenido según la opción seleccionada -->
        <div id="contenido-dinamico">
            <?php
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
                $base_path = './editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/';
                $paginas_validas = [
                    'nueva_cotizacion' => $base_path . 'boton_nueva_cotizacion/nueva_cotizacion_pr.php',
                    'crear_cliente' => $base_path . 'boton_crear_cliente/crear_cliente_pr.php',
                    'crear_producto' => $base_path . 'boton_crear_producto/crear_producto_pr.php',
                    'crear_proveedor' => $base_path . 'boton_crear_proveedor/crear_proveedor_pr.php',
                    'ver_cotizacion' => $base_path . 'boton_ver_cotizacion/ver_cotizacion_pr.php',
                    'crear_empresa' => $base_path . 'boton_crear_empresa/crear_empresa_pr.php'
                ];

                if (isset($paginas_validas[$pagina]) && file_exists($paginas_validas[$pagina])) {
                    include_once $paginas_validas[$pagina];
                } else {
                    echo '<p>Página no encontrada.</p>';
                }
            }
            ?>
        </div>
    </div>

<!-- TÍTULO IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="js\editor_cotizacion\menu1_inicio\crear_nuevo\editor_menu2\menu2\menu2_pr.js"></script>

</body>
</html>

<!-- -------------------------------
     -- INICIO CIERRE CONEXION BD --
     ------------------------------- -->
<?php
    $mysqli->close();
?>
<!-- ----------------------------
     -- FIN CIERRE CONEXION BD --
     ---------------------------- -->

<!-- ------------------------------------------------------------------------------------------------------------------
     -------------------------------------- FIN ITred Spa menu2_pr .PHP ----------------------------------------
     ------------------------------------------------------------------------------------------------------------------ -->

<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->

