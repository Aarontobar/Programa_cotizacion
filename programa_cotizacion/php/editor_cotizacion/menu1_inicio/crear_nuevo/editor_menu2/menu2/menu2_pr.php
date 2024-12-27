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
    // TÍTULO: INICIO DE SESIÓN
    // Establece la conexión a la base de datos editor tienda virtual de ITred Spa.
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['empresa'])) {
    $_SESSION['id_empresa'] = (int)$_POST['empresa'];
    
    // Obtener información de la empresa seleccionada
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

<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cotizaciones</title>
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/menu2_pr.css">
</head>
<body>
    <!-- TÍTULO: SELECCIÓN DE EMPRESA -->
    <div class="programa_cotizacion">
        <form id="formulario-seleccionar-empresa" method="POST" action="">
            <?php include dirname(__FILE__) . '/programa_cotizacion/seleccionar_empresa.php'; ?>
            <input type="hidden" id="selected-empresa" name="empresa" 
                   value="<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" />
            <button type="submit">Aceptar</button>
            <button type="button" id="reset-empresa">Reiniciar Selección</button>
        </form>

        <!-- TÍTULO: MENÚ DE NAVEGACIÓN PRINCIPAL -->
        <?php include dirname(__FILE__) . '/programa_cotizacion/menu.php'; ?>

        <!-- TÍTULO: CONTENEDOR PARA EL FORMULARIO DE MODIFICACIÓN -->
        <div id="modificar-cotizacion-container"></div>

        <!-- TÍTULO: CONTENEDOR PARA MOSTRAR EL CONTENIDO DINÁMICO -->
        <div id="contenido-dinamico">
            <?php
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
                $base_path = dirname(__FILE__) . '/programa_cotizacion/';
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


<!-- TÍTULO: ARCHIVOS JAVASCRIPT -->
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