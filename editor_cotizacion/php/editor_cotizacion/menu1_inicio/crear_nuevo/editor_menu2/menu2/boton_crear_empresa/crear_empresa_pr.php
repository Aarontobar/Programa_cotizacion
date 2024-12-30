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
    ------------------------------------- INICIO ITred Spa crear_empresa_pr .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
    // Establece la conexión con la base de datos y configura los parámetros iniciales
    $mysqli = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
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

// TÍTULO: TABLA TP_AREA

    // Elige con el query de MySql la tabla Tp_Area
    $check_query = "SELECT COUNT(*) as count FROM Tp_Area";
    $result = $mysqli->query($check_query);
    if ($result) {
        $row = $result->fetch_assoc();
        if ($row['count'] == 0) {
            $insert_query = "INSERT INTO Tp_Area (nombre_area) VALUES 
                ('Recursos Humanos'),
                ('Finanzas'),
                ('Tecnología'),
                ('Marketing'),
                ('Ventas')";
            $mysqli->query($insert_query);
        }
    }

// TÍTULO: CARGA DE ÁREAS Y CARGOS

    // Obtiene las áreas y cargos de la base de datos
    $areas = [];
    $result = $mysqli->query("SELECT id_area, nombre_area FROM Tp_Area");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $areas[] = $row;
        }
        $result->free();
    }

    $cargos = [];
    $result = $mysqli->query("SELECT id_tp_cargo, nombre_cargo FROM Tp_cargo ORDER BY nombre_cargo");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $cargos[] = $row;
        }
        $result->free();
    }
?>
     
<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Formulario de Cotización</title> 
<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/crear_empresa.css"> 
</head> 

<body> 
    <div class="contenedor">

        <!-- TÍTULO: FORMULARIO DE COTIZACIÓN -->

            <!-- Formulario principal para la creación de una nueva empresa -->
            <form id="formulario-cotizacion" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="formulario" value="empresa">

                <!-- TÍTULO: FILA 1 - LOGO Y CUADRO ROJO -->

                    <!-- Crea una fila para el logo y el cuadro rojo -->
                    <div class="row"> 
                        <?php include 'upload_logo.php'; ?>
                        <?php include 'cuadro_rojo.php'; ?>
                    </div>

                <!-- TÍTULO: FILA 2 - FORMULARIOS -->

                    <!-- Incluye los formularios de empresa, encargado y vendedor -->
                    <?php include 'formulario_empresa.php'; ?>
                    <?php include 'formulario_encargado.php'; ?>
                    <?php include 'formulario_vendedor.php'; ?>            

                <!-- TÍTULO: FILA DE CUENTAS BANCARIAS -->

                    <!-- Incluye el formulario de cuentas bancarias y muestra la tabla de cuentas -->
                    <?php include 'formulario_cuenta.php';?>
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <h2>TRANSFERENCIAS A:</h2>
                            <table id="tabla-cuentas" border="1">
                                <!-- La tabla se llenará dinámicamente -->
                            </table>
                        </div>
                    </div>

                <!-- TÍTULO: REQUISITOS BÁSICOS -->

                    <!-- Incluye la sección de requisitos básicos -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <?php include_once 'requisitos_basicos.php';?>
                        </div>
                    </div>

                <!-- TÍTULO: CONDICIONES GENERALES -->

                    <!-- Incluye la sección de condiciones generales -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <?php include_once 'condiciones_generales.php';?>
                        </div>
                    </div>

                <!-- TÍTULO: OBLIGACIONES DEL CLIENTE -->

                    <!-- Incluye la sección de obligaciones del cliente -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <?php include_once 'obligaciones_cliente.php';?>
                        </div>
                    </div>

                <!-- TÍTULO: FIRMA -->

                    <!-- Incluye la sección de firma -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <?php include_once 'firma.php';?>
                        </div>
                    </div>

                <!-- TÍTULO: BOTÓN PARA ENVIAR EL FORMULARIO -->
                
                    <!-- Botón para crear la empresa -->
                    <button type="submit" id="boton-subir" class="subir">Crear empresa</button> 
            </form> 
    </div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO JS -->

    <!-- Llama al archivo JS para la funcionalidad de la página -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/crear_empresa_pr.js"></script> 
</body>
</html>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa crear_empresa_pr .PHP -----------------------------------
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

