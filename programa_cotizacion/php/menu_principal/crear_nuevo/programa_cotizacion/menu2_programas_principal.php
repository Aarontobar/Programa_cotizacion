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
    ------------------------------------- INICIO ITred Spa Menu.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->


    
     <h1>Menú Principal - Cotización ITred Spa</h1>

<!-- Sección para mostrar errores -->

<?php
$error = ''; // Variable para almacenar mensajes de error
$empresaEncontrada = false; // Variable para controlar si se ha seleccionado una empresa


// Verifica si el formulario se ha enviado, es necesario en este lugar para habilitar el menu (NAV)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_empresa = $_POST['empresa']; // Obtiene el ID de la empresa seleccionada

    // Comprueba si el ID de la empresa no está vacío

    if (!empty($id_empresa)) {
        $_SESSION['id_empresa'] = $id_empresa; // Guarda el ID de la empresa en la sesión
        $empresaEncontrada = true; // Marca que la empresa ha sido encontrada
    } else {
        $error = "Por favor, seleccione una empresa."; // Mensaje de error si no se selecciona una empresa
    }

}

?>

<!-- Muestra el mensaje de error, si existe -->

<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>



<!-- Menú de navegación -->

<!-- Inicio HTML -->

<head>

<!-- llama al archivo CSS -->
<link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/programa_cotizacion/menu.css">

</head>



<!-- TÍTULO: NAVEGACIÓN PRINCIPAL -->

<!-- formato de botones para navegar entre paginas -->

<nav>  
    <ul class="menu">

        <!-- TÍTULO: ENLACE PARA NUEVA COTIZACIÓN -->

        <!-- redirige al archivo nueva_cotizacion.PHP -->
        <li>
            <a href="crear_nuevo/nueva_cotizacion/nueva_cotizacion.php?id=<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                Nueva Cotización
            </a>
        </li>
    

        <!-- TÍTULO: ENLACE PARA CREAR CLIENTE -->

        <!-- redirige al archivo crear_cliente.php -->
        <li>
            <a href="crear_nuevo/crear_cliente/crear_cliente.php?id=<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                Crear Cliente
            </a>
        </li>


        
        <!-- TÍTULO: ENLACE PARA CREAR PRODUCTO -->

        <!-- redirige al archivo crear_producto.php -->
        <li>
            <a href="crear_nuevo/crear_producto/crear_producto.php?id=<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                Crear Producto
            </a>
        </li>

        <!-- TÍTULO: ENLACE PARA CREAR PROVEEDOR -->

        <!-- redirige al archivo crear_proveedor -->
        <li>
            <a href="crear_nuevo/crear_proveedor/crear_proveedor.php" class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                Crear Proveedor
            </a>
        </li>
      
        <!-- TÍTULO: ENLACE PARA VER LISTADO DE COTIZACIÓN -->

        <!-- redirige al archivo ver_listado.php -->
        <li>
            <a href="crear_nuevo/ver_cotizacion/ver_listado.php?id=<?php echo isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : ''; ?>" class="<?php echo $empresaEncontrada ? '' : 'disabled'; ?>">
                Ver listado Cotización
            </a>
        </li>
        
        <!-- TÍTULO: ENLACE PARA CREAR NUEVA EMPRESA -->

        <!-- redirige al archivo crear_empresa.php -->
        <li>
            <a href="crear_nuevo/crear_empresa/crear_empresa.php">
                Crear nueva empresa
            </a>
        </li>

    </ul>
</nav>


<!-----------------Archivo JS--------------------------->

<script src="../../js/menu_principal/crear_nuevo/programa_cotizacion/menu.js"></script> 

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



