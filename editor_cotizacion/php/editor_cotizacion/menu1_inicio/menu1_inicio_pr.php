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
     ------------------------------------- INICIO ITred Spa menu1_incio_pr .PHP ------------------------------------
     --------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

    <?php
    // Establece la conexión a la base de datos editor tienda virtual de ITred Spa.
    $mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
    ?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

     <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="css\editor_cotizacion\menu1_inicio\menu1_inicio_pr.css">
</head>
<body>
    
    <!-- TITULO MENU DE NAVEGACION PRINCIPAL  -->

        <!-- comentario pendiente  -->
        <nav class="main-nav">

            <!-- TITULO CONTENEDOR DE NAVEGACION -->

                <!-- comentario pendiente  -->
                <div class="navigation-container">

                    <!--  TITULO BOTONES PREDISEÑADOS -->

                        <!-- comentario pendiente  -->
                        <div class="boton_prediseñados">
                            <form method="POST">
                                <button id="btn" name="view" value="prediseñados">PREDISEÑADOS</button>   
                            </form>
                        </div>

                    <!--  TITULO BOTONES CREAR NUEVO -->

                        <!-- comentario pendiente  -->
                        <div class="boton_crear_nuevo">
                            <form method="POST">
                                <button id="btn" name="view" value="crear_nuevo">CREAR NUEVO</button>
                            </form>
                        </div>

                    <!--  TITULO BOTONES MODIFICAR -->
                    
                        <!-- comentario pendiente  -->
                        <div class="boton_modificar">
                            <form method="POST">
                                <button id="btn" name="view" value="modificar">MODIFICAR</button>
                            </form>
                        </div>

                    <!--  TITULO BOTONES ELIMINAR -->

                        <!-- comentario pendiente  -->
                        <div class="boton_eliminar">
                            <form method="POST">
                                <button id="btn" name="view" value="eliminar">ELIMINAR</button>
                            </form>
                        </div>
                </div>
            </nav>

        <!-- TITULO CONTENIDO DEL CONTENEDOR -->

            <!-- comentario pendiente  -->
            <div class="content-container">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['view'])) {
                    switch($_POST['view']) {
                        case 'prediseñados':
                            include 'prediseñados/prediseñados_pr.php';
                            break;
                        case 'crear_nuevo':
                            include 'crear_nuevo/crear_nuevo_pr.php';
                            break;
                        case 'modificar':
                            include 'modificar/modificar_pr.php';
                            break;
                        case 'eliminar':
                            include 'eliminar/eliminar_pr.php';
                            break;
                    }
                }
                ?>
            </div>

    <!-- Enlace al JS -->
    <script src="js/editor_cotizacion/menu1_inicio/menu1_inicio_pr.js"></script>
</body>
</html>

<!-- -------------------------------
     -- INICIO CIERRE CONEXION BD --
     ------------------------------- -->

<!-- ----------------------------
     -- FIN CIERRE CONEXION BD --
     ---------------------------- -->

<!-- ------------------------------------------------------------------------------------------------------------------
     -------------------------------------- FIN ITred Spa menu1_incio_pr .PHP -----------------------------------------
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