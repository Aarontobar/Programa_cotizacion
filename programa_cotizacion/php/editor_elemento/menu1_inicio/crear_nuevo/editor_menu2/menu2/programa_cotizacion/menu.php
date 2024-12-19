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
if (!isset($mysqli)) {
    $mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
}

$error = '';
$empresaEncontrada = false;

// Verifica si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['empresa'])) {
    $id_empresa = $_POST['empresa'];
    
    if (!empty($id_empresa)) {
        $_SESSION['id_empresa'] = $id_empresa;
        $empresaEncontrada = true;
    } else {
        $error = "Por favor, seleccione una empresa.";
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
            <li>
                <a href="#" data-pagina="nueva_cotizacion" 
                   class="menu-link <?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Nueva Cotización
                </a>
            </li>
            <li>
                <a href="#" data-pagina="crear_cliente" 
                   class="menu-link <?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Crear Cliente
                </a>
            </li>
            <li>
                <a href="#" data-pagina="crear_producto" 
                   class="menu-link <?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Crear Producto
                </a>
            </li>
            <li>
                <a href="#" data-pagina="crear_proveedor" 
                   class="menu-link <?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Crear Proveedor
                </a>
            </li>
            <li>
                <a href="#" data-pagina="ver_cotizacion" 
                   class="menu-link <?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                    Ver listado Cotización
                </a>
            </li>
            <li>
                <a href="#" data-pagina="crear_empresa" class="menu-link">
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



