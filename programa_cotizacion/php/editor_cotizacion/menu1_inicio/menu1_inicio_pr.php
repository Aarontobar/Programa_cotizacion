<!-- Sitio Web Creado por ITred Spa. -->
<!-- Informacion sobre ITred Spa -->

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
    <link rel="stylesheet" href="css\editor_cotizacion\menu1_inicio\menu1_inicio_pr.css">
    <title>Menu Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #f0f0f0;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .navigation-container {
            display: flex;
            justify-content: center;
            gap: 0;
        }
        form {
            margin: 0;
        }
        .main-nav button {
            padding: 8px 20px;
            background-color: #e8e8e8;
            border: 1px solid #999;
            color: #333;
            cursor: pointer;
            font-size: 14px;
            margin: 0;
            min-width: 120px;
            text-transform: uppercase;
        }
        .main-nav button:hover {
            background-color: #ddd;
        }
        .boton_prediseñados button,
        .boton_crear_nuevo button,
        .boton_modificar button {
            border-right: none;
        }
        .content-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- MENU DE NAVEGACION PRINCIPAL  -->
    <nav class="main-nav">
        <div class="navigation-container">
            <!--  TITULO BOTONES PREDISEÑADOS -->
            <div class="boton_prediseñados">
                <form method="POST">
                    <button id="btn" name="view" value="prediseñados">PREDISEÑADOS</button>   
                </form>
            </div>

            <!--  TITULO BOTONES CREAR NUEVO -->
            <div class="boton_crear_nuevo">
                <form method="POST">
                    <button id="btn" name="view" value="crear_nuevo">CREAR NUEVO</button>
                </form>
            </div>

            <!--  TITULO BOTONES MODIFICAR -->
            <div class="boton_modificar">
                <form method="POST">
                    <button id="btn" name="view" value="modificar">MODIFICAR</button>
                </form>
            </div>

            <!--  TITULO BOTONES ELIMINAR -->
            <div class="boton_eliminar">
                <form method="POST">
                    <button id="btn" name="view" value="eliminar">ELIMINAR</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content Container for Included Files -->
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

<!-- Sitio Web Creado por ITred Spa. -->
<!-- Informacion sobre ITred Spa -->
