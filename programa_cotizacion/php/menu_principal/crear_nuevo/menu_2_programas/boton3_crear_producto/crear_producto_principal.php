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
    ------------------------------------- INICIO ITred Spa Crear producto .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

<?php
// Establece la conexión a la base de datos de ITred Spa
$conn = new mysqli('localhost', 'root', '', 'ITredSpa_bd');
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------
    ------------------------------------- INICIO ITred Spa creacion producto .PHP --------------------------------------
------------------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Creación de Productos</title>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/menu_2_programas/boton3_crear_producto/crear_producto.css">

</head>
<body>
    <div class="contenedor">
        <div class="form-contenedor">
            
            <!-- TÍTULO: INCLUYE EL FORMULARIO DE CREACIÓN DE PRODUCTO -->

                <!-- Incluye el formulario de creación de producto -->
                <?php include 'formulario_creacion_producto.php'; ?>
                
        </div>
    </div>
</body>
</html>


<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="js/menu_principal/crear_nuevo/menu_2_programas/boton3_crear_producto/crear_producto_principal.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
-------------------------------------- FIN ITred Spa Creacion producto .PHP -----------------------------------
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