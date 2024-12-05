<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->

<?php
// Establece la conexión a la base de datos de ITred Spa
$mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
session_start();

$error = ''; // Variable para almacenar mensajes de error
$empresaEncontrada = false; // Variable para controlar si se ha seleccionado una empresa

// Verifica si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['empresa'])) {
    $id_empresa = $_POST['empresa']; // Obtiene el ID de la empresa seleccionada
    
    // Comprueba si el ID de la empresa no está vacío
    if (!empty($id_empresa)) {
        $_SESSION['id_empresa'] = $id_empresa; // Guarda el ID de la empresa en la sesión
        $empresaEncontrada = true; // Marca que la empresa ha sido encontrada
    } else {
        $error = "Por favor, seleccione una empresa."; // Mensaje de error si no se selecciona una empresa
    }
}

// Si hay una empresa en la sesión, márcala como encontrada
if (isset($_SESSION['id_empresa']) && !empty($_SESSION['id_empresa'])) {
    $empresaEncontrada = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Cotización ITred Spa</title>
    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/programa_cotizacion/menu.css">
</head>
<body>
    <!-- Muestra el mensaje de error, si existe -->
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- TÍTULO: NAVEGACIÓN PRINCIPAL -->
    <!-- formato de botones para navegar entre paginas -->
    <nav>  
        <ul class="menu">
            <!-- TÍTULO: ENLACE PARA NUEVA COTIZACIÓN -->
            <li>
                <a href="javascript:void(0);" onclick="mostrarContenido('nueva_cotizacion');" 
                   class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Nueva Cotización
                </a>
            </li>

            <!-- TÍTULO: ENLACE PARA CREAR CLIENTE -->
            <li>
                <a href="javascript:void(0);" onclick="mostrarContenido('crear_cliente');" 
                   class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Crear Cliente
                </a>
            </li>

            <!-- TÍTULO: ENLACE PARA CREAR PRODUCTO -->
            <li>
                <a href="javascript:void(0);" onclick="mostrarContenido('crear_producto');" 
                   class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Crear Producto
                </a>
            </li>

            <!-- TÍTULO: ENLACE PARA CREAR PROVEEDOR -->
            <li>
                <a href="javascript:void(0);" onclick="mostrarContenido('crear_proveedor');" 
                   class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Crear Proveedor
                </a>
            </li>

            <!-- TÍTULO: ENLACE PARA VER LISTADO DE COTIZACIÓN -->
            <li>
                <a href="javascript:void(0);" onclick="mostrarContenido('ver_cotizacion');" 
                   class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Ver listado Cotización
                </a>
            </li>

            <!-- TÍTULO: ENLACE PARA CREAR NUEVA EMPRESA -->
            <li>
                <a href="javascript:void(0);" onclick="mostrarContenido('crear_empresa');">
                    Crear nueva empresa
                </a>
            </li>
        </ul>
    </nav>

    <!-- TÍTULO: CONTENEDOR PARA MOSTRAR EL CONTENIDO -->
    <div id="contenido-dinamico"></div>


<!-----------------Archivo JS--------------------------->

<script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/programa_cotizacion/menu.js"></script>

     <!-- ------------------------------------------------------------------------------------------------------------
-------------------------------------- FIN ITred Spa Menu .PHP ----------------------------------------
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



