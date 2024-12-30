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
    ------------------------------------- INICIO ITred Spa crear_producto_pr .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

<?php
// Establece la conexión a la base de datos de ITred Spa
$mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<?php
// TÍTULO: VERIFICACIÓN DE INICIO DE SESIÓN

    // Verifica el inicio de sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Creación de Productos</title>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_producto/crear_producto.css">
</head>
<body>
<!-- TÍTULO: LLAMADO AL FORMULARIO DE CREACIÓN DEL PRODUCTO -->

    <!-- dentro del contenedor se empieza a llamar al formulario creación producto -->
    <div class="contenedor">
        <div class="form-contenedor">
            <!-- TÍTULO: INCLUYE EL FORMULARIO DE CREACIÓN DE PRODUCTO -->
            <?php include 'formulario_creacion_producto.php'; ?>
        </div>
    </div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_producto/crear_producto_pr.js"></script>
</body>
</html>
<!-- ------------------------------------------------------------------------------------------------------------
-------------------------------------- FIN ITred Spa crear_producto_pr .PHP -----------------------------------
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