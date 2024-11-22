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
    ------------------------------------- INICIO ITred Spa crear proveedor.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
    -- INICIO CONEXION BD --
    ------------------------ -->

    <?php
    // Establece la conexión a la base de datos de ITred Spa
    $mysqli = new mysqli('localhost', 'root', '', 'ITredSpa_bd');
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     ----------------------- -->


<!-- INICIO HTML -->
<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title> Agregar proveedor</title> 
    
    <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
     
    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/menu_2_programas/boton4_crear_proveedor/crear_proveedor.css"> 


</head> 

<body> 
<div class='contenedor-principal'>

    <div class="contenedor">  
        <form id="formulario-proveedor" method="POST" action="" enctype="multipart/form-data">

            <!-- TÍTULO PARA EL FORMULARIO DE NUEVO PROVEEDOR -->
                
                <!-- realiza el include del archivo formulario_proveedor -->
                <h3>RELLENA EL FORMULARIO PARA AGREGAR UN NUEVO PROVEEDOR</h3>
                <?php include 'formulario_proveedor.php'; ?>


    
            <div class="contenedor"> 

                <!-- TÍTULO PARA EL FORMULARIO DE LA EMPRESA DEL PROVEEDOR -->

                    <!-- realiza el include del archivo empresa_proveedor -->
                    <h3>RELLENA EL FORMULARIO PARA AGREGAR LA EMPRESA DEL PROVEEDOR</h3>
                    <?php include 'empresa_proveedor.php'; ?>


            </div> 

            <!-- Botón de submit debe estar dentro del formulario -->
            <button type="submit" class="subir">Crear proveedor</button> 
        </form> 
    </div> 

    <div class="contenedor"> 

        <!-- TÍTULO PARA EL LISTADO DE PROVEEDORES -->

        <!-- Incluye el archivo que muestra el listado de proveedores -->
            <h3>Listado de proveedores</h3>
            <?php include 'mostrar_proveedor.php'; ?>

    </div> 

</div> 

</body>

<!--------------------------------------------------------------------->

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

<script src="../../js/menu_principal/crear_nuevo/menu_2_programas/boton4_crear_proveedor/crear_proveedor.js"></script> 

<!--------------------------------------------------------------------->
</html>

<!-- ---------------------
-- INICIO CIERRE CONEXION BD --
--------------------- -->
<?php
    $mysqli->close();
?>
<!-- ---------------------
     -- FIN CIERRE CONEXION BD --
     --------------------- -->