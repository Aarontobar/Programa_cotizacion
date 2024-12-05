<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPj
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
        <!-- llama al archivo CSS -->
        <link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/programa_cotizacion/programa_cotizacion.css">
    </head>

    <body>

    <div class="programa_cotizacion">
        <!-- Incluye el menú de navegación desde un archivo PHP externo -->
        <?php include 'crear_nuevo/editor_menu2/menu2/programa_cotizacion/menu.php'; ?>

        <!-- Formulario para seleccionar la Empresa -->
        <form id="formulario-seleccionar-empresa" method="POST" action="">
            <!-- Incluye el archivo PHP que maneja la selección de empresas -->
            <?php include 'crear_nuevo/editor_menu2/menu2/programa_cotizacion/seleccionar_empresa.php'; ?>

            <!-- boton seleccionar empresa -->
            <input type="hidden" id="selected-empresa" name="empresa" value="<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" />
            <button type="submit">Seleccionar</button>
        </form>
    </div>

    <!-- Contenedor para mostrar el contenido dinámico -->
    <div id="contenido-dinamico">
        <?php
        // Verifica si se ha pasado un parámetro 'pagina' en la URL
        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];

            // Incluye el archivo PHP correspondiente según el valor de 'pagina'
            switch ($pagina) {
                case 'nueva_cotizacion':
                    include 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/nueva_cotizacion_pr.php';
                    break;
                case 'crear_cliente':
                    include 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_cliente/crear_cliente_pr.php';
                    break;
                case 'crear_producto':
                    include 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_producto/crear_producto_pr.php';
                    break;
                case 'crear_proveedor':
                    include 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_proveedor/crear_proveedor_pr.php';
                    break;
                case 'ver_cotizacion':
                    include 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/ver_cotizacion_pr.php';
                    break;
                case 'crear_empresa':
                    include 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/crear_empresa_pr.php';
                    break;
                default:
                    echo '<p>Página no encontrada.</p>';
                    break;
            }
        }
        ?>
    </div>

    <!-- TÍTULO: CONTENEDOR PARA EL FORMULARIO DE MODIFICACIÓN -->
    <div id="modificar-cotizacion-container"></div>

    <!-- Carga el archivo JavaScript para la funcionalidad del formulario -->
    <script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/programa_cotizacion/programa_cotizacion.js"></script> 

    <script>
    document.getElementById('formulario-seleccionar-empresa').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto
        // Aquí puedes agregar cualquier lógica adicional antes de enviar el formulario
        this.submit(); // Envía el formulario
    });

    // TÍTULO: FUNCIÓN PARA CARGAR EL FORMULARIO DE MODIFICACIÓN
    function cargarModificarCotizacion(id) {
        fetch(`crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/modificar_cotizacion.php?id=${id}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('modificar-cotizacion-container').innerHTML = html;
                document.getElementById('modificar-cotizacion-container').style.display = 'block';
                document.getElementById('modificar-cotizacion-container').scrollIntoView({behavior: 'smooth'});
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al cargar el formulario de modificación');
            });
    }
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