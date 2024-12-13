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

    <?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si existe una conexión a la base de datos
if (!isset($mysqli)) {
    $mysqli = new mysqli('localhost', 'root', '', 'itredspa_bd');
    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
}

// Obtener el ID de empresa de la sesión o del parámetro GET
$id_empresa = $_SESSION['id_empresa'] ?? $_GET['id_empresa'] ?? null;

if (!$id_empresa) {
    die('ID de empresa no válido.');
}

// Resto del código de crear_proveedor_pr.php
?>

<!-- INICIO HTML -->
<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title> Agregar proveedor</title> 
    
    <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
     
    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_proveedor/crear_proveedor.css"> 


</head> 

<body> 
<div class='contenedor-principal'>

    <div class="contenedor">  
        <form id="formulario-proveedor" method="POST" action="">

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
            <button type="submit" class="submit">Crear Proveedor</button> 
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

<script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_proveedor/crear_proveedor_pr.js"></script>

<!--------------------------------------------------------------------->
</html>