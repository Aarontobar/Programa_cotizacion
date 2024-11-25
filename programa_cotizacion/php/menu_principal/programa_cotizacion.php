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
    ------------------------------------- INICIO ITred Spa Programa Cotizacion.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
?>

<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menú Principal - Cotización ITred Spa</title>
    <!-- llama al archivo CSS -->

        <link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/menu_2_programas/programa_cotizacion/programa_cotizacion.css">
    </head>

    <body>

    <div class="programa_cotizacion">
        <!-- Incluye el menú de navegación desde un archivo PHP externo -->
        <?php include 'crear_nuevo/menu_2_programas/programa_cotizacion/menu.php'; ?>

        <!-- Formulario para seleccionar la Empresa -->
        <form id="formulario-seleccionar-empresa" method="POST" action="">

            <!-- Incluye el archivo PHP que maneja la selección de empresas -->
            <?php include 'crear_nuevo/menu_2_programas/programa_cotizacion/seleccionar_empresa.php'; ?>

                <!-- boton seleccionar empresa -->
                <input type="hidden" id="selected-empresa" name="empresa" value="<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" />
                <button type="submit">Seleccionar</button>
        </form>
    </div>

    <!-- Contenedor para mostrar el contenido dinámico -->
    <div id="contenido-dinamico">
        <?php
        // Verifica si se ha pasado un parámetro 'page' en la URL
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            // Incluye el archivo PHP correspondiente según el valor de 'page'
            switch ($page) {
                case 'nueva_cotizacion':
                    include 'crear_nuevo/menu_2_programas/boton1_nueva_cotizacion/nueva_cotizacion_principal.php';
                    break;
                case 'crear_cliente':
                    include 'crear_nuevo/menu_2_programas/boton2_crear_cliente/crear_cliente_principal.php';
                    break;
                case 'crear_producto':
                    include 'crear_nuevo/menu_2_programas/boton3_crear_producto/crear_producto_principal.php';
                    break;
                case 'crear_proveedor':
                    include 'crear_nuevo/menu_2_programas/boton4_crear_proveedor/crear_proveedor_principal.php';
                    break;
                case 'ver_cotizacion':
                    include 'crear_nuevo/menu_2_programas/boton5_ver_cotizacion/ver_cotizacion_principal.php';
                    break;
                case 'crear_empresa':
                    include 'crear_nuevo/menu_2_programas/boton6_crear_empresa/crear_empresa_principal.php';
                    break;
                default:
                    echo '<p>Página no encontrada.</p>';
                    break;
            }
        }
        ?>
    </div>

    <!-- Carga el archivo JavaScript para la funcionalidad del formulario -->
    <script src="../../js/menu_principal/crear_nuevo/menu_2_programas/programa_cotizacion/programa_cotizacion.js"></script> 

    <script>
        document.getElementById('formulario-seleccionar-empresa').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario por defecto
            // Aquí puedes agregar cualquier lógica adicional antes de enviar el formulario
            this.submit(); // Envía el formulario
        });

        document.getElementById('formulario-cotizacion').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario por defecto
            // Aquí puedes agregar cualquier lógica adicional antes de enviar el formulario
            this.submit(); // Envía el formulario
        });
    </script>
    </body>
</html>

<!-- ---------------------
-- INICIO CIERRE CONEXION BD --
     --------------------- -->
<?php
$mysqli->close(); // Cierra la conexión a la base de datos
?>
<!-- ---------------------
     -- FIN CIERRE CONEXION BD --
     --------------------- -->

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Programa Cotizacion .PHP ----------------------------------------
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