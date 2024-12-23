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
    ------------------------------------- INICIO ITred Spa Crear Empresa .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar conexión a la base de datos
if (!isset($mysqli)) {
    $mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
}

// Verificar si la tabla Tp_Area existe y tiene datos
$check_query = "SELECT COUNT(*) as count FROM Tp_Area";
$result = $mysqli->query($check_query);
if ($result) {
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        // Si no hay datos, insertar algunos por defecto
        $insert_query = "INSERT INTO Tp_Area (nombre_area) VALUES 
            ('Recursos Humanos'),
            ('Finanzas'),
            ('Tecnología'),
            ('Marketing'),
            ('Ventas')";
        $mysqli->query($insert_query);
    }
}

// Capta las areas
$areas = [];
$result = $mysqli->query("SELECT id_area, nombre_area FROM Tp_Area");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $areas[] = $row;
    }
    $result->free();
}

// Obtener los cargos
$cargos = [];
$result = $mysqli->query("SELECT id_tp_cargo, nombre_cargo FROM Tp_cargo ORDER BY nombre_cargo");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $cargos[] = $row;
    }
    $result->free();
}
?>

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->
     
<!DOCTYPE html>
<html lang="es">

     <!-- Abre el elemento de cabecera que contiene metadatos y enlaces a recursos externos -->

<head> 

<!-- Define la codificación de caracteres como UTF-8 para asegurar la correcta visualización de caracteres especiales y diversos idiomas -->  

<meta charset="UTF-8"> 

    <!-- Configura la vista en dispositivos móviles. width=device-width asegura que el ancho de la página se ajuste al ancho de la pantalla del dispositivo, y initial-scale=1.0 establece el nivel de zoom inicial -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <!-- Define el título de la página que se muestra en la pestaña del navegador -->

    <title>Formulario de Cotización</title> 

    <!-- Enlaza una hoja de estilo externa que se encuentra en la ruta especificada para estilizar el contenido de la página -->

    <link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/crear_empresa.css"> 

    <!------------------------------------------------------------------------------------------------------------------------->

<!-- Cierra el elemento de cabecera -->
</head> 
<!-- Abre el elemento del cuerpo de la página donde se coloca el contenido visible -->
<body> 
    <!-- Contenedor principal que puede ayudar a centrar y organizar el contenido en la página -->
    <div class="contenedor">
        
        <!-- TÍTULO: FORMULARIO DE COTIZACIÓN -->
            <form id="formulario-cotizacion" method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="formulario" value="empresa">

                
                <!-- Fila 1 -->

                <!-- TÍTULO: FILA 1 - LOGO Y CUADRO ROJO -->
                    <div class="row"> 

                        <!-- Incluye el archivo para la carga del logo -->
                        <?php include 'upload_logo.php'; ?>

                        <!-- Incluye el archivo para mostrar el cuadro rojo -->
                        <?php include 'cuadro_rojo.php'; ?>
                        
                    </div> <!-- Cierra la fila 1 -->
                <!------------------------------------------------------------------------------------------->

                <!-- Fila 2 -->
                <!-- TÍTULO: FILA 2 - FORMULARIOS -->
                    <!-- Incluye el archivo para el formulario de empresa -->
                    <?php include 'formulario_empresa.php'; ?>

                    <!-- Incluye el archivo para el formulario del encargado -->
                    <?php include 'formulario_encargado.php'; ?>

                    <!-- Incluye el archivo para el formulario del vendedor -->
                    <?php include 'formulario_vendedor.php'; ?>            
                <!------------------------------------------------------------------------------------------->

                <!-- Fila para cuentas bancarias -->

                <!-- TÍTULO: FILA DE CUENTAS BANCARIAS -->
                    <!-- Incluye el archivo para el formulario de cuenta -->
                    <?php include 'formulario_cuenta.php';?>

                    <!-- Crea una fila para organizar los elementos en una disposición horizontal -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <h2>TRANSFERENCIAS A:</h2>
                            <table id="tabla-cuentas" border="1">
                                <!-- La tabla se llenará dinámicamente -->
                            </table>
                        </div>
                    </div>

                <!------------------------------------------------------------------------------------------->

                <!-- Título: Requisitos básicos -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <!-- Incluye el archivo para los requisitos básicos -->
                            <?php include_once 'requisitos_basicos.php';?>
                        </div>
                    </div>

                <!-- TÍTULO: CONDICIONES GENERALES -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <!-- Incluye el archivo para las condiciones generales -->
                            <?php include_once 'condiciones_generales.php';?>
                        </div>
                    </div>
                <!------------------------------------------------------------------------------------------->

                <!-- TÍTULO: OBLIGACIONES DEL CLIENTE -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <!-- Incluye el archivo para las obligaciones del cliente -->
                            <?php include_once 'obligaciones_cliente.php';?>
                        </div>
                    </div>

                <!------------------------------------------------------------------------------------------->
    

                <!-- TÍTULO: FIRMA -->
                    <!-- Crea una fila para organizar los elementos en una disposición horizontal -->
                    <div class="row"> 
                        <div class="box-12 data-box">
                            <!-- Incluye el archivo para la firma -->
                            <?php include_once 'firma.php';?>
                        </div>
                    </div>
                <!------------------------------------------------------------------------------------------->


                <!-- TÍTULO: BOTÓN PARA ENVIAR EL FORMULARIO Y GENERAR LA COTIZACIÓN -->
                    <button type="submit" id="boton-subir" class="subir">Crear empresa</button> 
                <!-- Cierra el formulario -->

                
            </form> 
        <!-- Cierra el contenedor principal -->

    </div>

    <!-- Enlaza un archivo JavaScript externo para actualizar el logo o realizar otras actualizaciones -->

    <script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/crear_empresa_pr.js"></script> 

    <!--------------------------------------------------------------------------------------------------->
    
</body>
</html>



<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa crear_empresa .PHP -----------------------------------
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