<?php
// Conexión a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'ITredSpa_bd');

//----------------------------------------------------------------//

// Obtener el ID de la cotización desde la URL
$id_cotizacion = isset($_GET['id']) ? (int) $_GET['id'] : 0;

echo $id_cotizacion;

//----------------------------------------------------------------//

// Inicializar variables
$nombre_empresa = $rut_empresa = $direccion_empresa = $telefono_empresa = $email_empresa = $area_empresa = '';
$nombre_encargado = $email_encargado = $telefono_encargado = '';
$estado_aprobacion = 'Aprobada'; // Estado de aprobación predeterminado

//----------------------------------------------------------------//

// Validar si el ID es válido
if ($id_cotizacion > 0) {
    // Consultar cotización
    $sql_cotizacion = "SELECT 
        e.nombre_empresa,
        e.rut_empresa,
        e.direccion_empresa,
        e.telefono_empresa,
        e.email_empresa,
        e.area_empresa,
        en.nombre_encargado,
        en.email_encargado,
        en.fono_encargado
    FROM 
        C_Cotizaciones ct
        JOIN E_Empresa e ON ct.id_empresa = e.id_empresa
        JOIN C_Encargados en ON ct.id_encargado = en.id_encargado
    WHERE ct.id_cotizacion = ?";

    //----------------------------------------------------------------//
    
    $stmt = $mysqli->prepare($sql_cotizacion);
    $stmt->bind_param("i", $id_cotizacion);
    $stmt->execute();
    $result = $stmt->get_result();

    //----------------------------------------------------------------//

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Datos de la empresa
        $nombre_empresa = $row['nombre_empresa'];
        $rut_empresa = $row['rut_empresa'];
        $direccion_empresa = $row['direccion_empresa'];
        $telefono_empresa = $row['telefono_empresa'];
        $email_empresa = $row['email_empresa'];
        $area_empresa = $row['area_empresa'];

        //----------------------------------------------------------------//

        // Datos del encargado
        $nombre_encargado = $row['nombre_encargado'];
        $email_encargado = $row['email_encargado'];
        $telefono_encargado = $row['fono_encargado'];

        //----------------------------------------------------------------//
    } else {
        echo "<p class='error'>Aún no has creado la cotización.</p>";
        exit;
        //----------------------------------------------------------------//
    }
    $stmt->close();
    //----------------------------------------------------------------//
} else {
    echo "<p class='error'>ID de cotización no válido.</p>";
    exit;
    //----------------------------------------------------------------//
}
$mysqli->close();
//----------------------------------------------------------------//
?>

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Firma</title>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../../css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton5_ver_cotizacion/detalle_firma.css">

</head>

<body>
    
<!-- TÍTULO: CONTENEDOR PRINCIPAL DE LA FIRMA -->
    <!-- tag del Contenedor -->
<div class="contenedor"> 

<!-- TÍTULO: ENCABEZADO PRINCIPAL DE LA FIRMA -->
    <!-- Tag del titular firma de la empresa -->
    <h1>Firma de la Empresa</h1> 

<!-- TÍTULO: CONTENEDOR DE INFORMACIÓN DE LA EMPRESA -->
    <!-- Tag con la clase firma con el contenedor de información de la empresa -->
<div class="firma"> 

<!-- TÍTULO: NOMBRE DE LA EMPRESA -->
    <!--Tag titulo de nombre de la empresa-->
    <p><strong>Título: Nombre de la empresa</strong> <?php echo htmlspecialchars($nombre_empresa); ?></p> 

<!-- TÍTULO: RUT DE LA EMPRESA -->
    <!--Tag rut de nombre de la empresa-->
    <p><strong>Título: RUT de la empresa</strong> <?php echo htmlspecialchars($rut_empresa); ?></p> 

<!-- TÍTULO: DIRECCION DE LA EMPRESA -->
    <!--Tag dirección de nombre de la empresa-->
    <p><strong>Título: Dirección de la empresa</strong> <?php echo htmlspecialchars($direccion_empresa); ?></p> 

<!-- TÍTULO: TELÉFONO DE LA EMPRESA -->
    <!--Tag teléfono de nombre de la empresa-->
    <p><strong>Título: Teléfono de la empresa</strong> <?php echo htmlspecialchars($telefono_empresa); ?></p> 

<!-- TÍTULO: EMAIL DE LA EMPRESA -->
    <!--Tag email de nombre de la empresa-->
    <p><strong>Título: Email de la empresa</strong> <?php echo htmlspecialchars($email_empresa); ?></p> 

<!-- TÍTULO: ÁREA DE LA EMPRESA -->
    <!--Tag área de nombre de la empresa-->
    <p><strong>Título: Área de la empresa</strong> <?php echo htmlspecialchars($area_empresa); ?></p> 

<!-- TÍTULO: ESTADO DE APROBACIÓN -->
    <!--Tag estado de aprobación de nombre de la empresa-->
    <p class="status">
        <strong>Título: Estado de Aprobación</strong>: <?php echo htmlspecialchars($estado_aprobacion); ?>
        <span class="status-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" alt="Aprobado">
        </span>
    </p>

<!-- TÍTULO: CONTENEDOR DE DATOS DEL ENCARGADO -->
    <!--Tag contenedor de los datos del encargado -->
    <div class="firma-data"> 

        <!-- TÍTULO: ENCABEZADO DE DATOS DEL ENCARGADO -->
        <!-- Tag encabezado de datos del encargado -->
        <h2>Datos del Encargado</h2> 
        
        <!-- TÍTULO: NOMBRE DEL ENCARGADO -->
        <!-- Tag título del nombre del encargado -->
        <p><strong>Título: Nombre del Encargado</strong> <?php echo htmlspecialchars($nombre_encargado); ?></p> 

        <!-- TÍTULO: EMAIL DEL ENCARGADO -->
        <!-- Tag email del encargado -->
        <p><strong>Título: Email del Encargado</strong> <?php echo htmlspecialchars($email_encargado); ?></p> 

        <!-- TÍTULO: TELÉFONO DEL ENCARGADO -->
        <!-- Tag teléfono del encargo -->
        <p><strong>Título: Teléfono del Encargado</strong> <?php echo htmlspecialchars($telefono_encargado); ?></p> 
    </div>

<!-- TÍTULO: BOTÓN PARA VER LA COTIZACIÓN -->
    <!-- Tag botón ver cotización -->
    <a href="ver_cotizacion.php?id=<?php echo $id_cotizacion; ?>" class="boton"><strong>Título: Ver Cotización</strong></a>
    
</div>
</div>
</body>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="../../../js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton5_ver_cotizacion/detalle_firma.js"></script>

<!-------------------------------------------------------------------------->

</html>