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
    ------------------------------------- INICIO ITred Spa header .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<?php

// Función para convertir fecha a formato distinto
function formatearFechaEspanol($fecha) {
    $meses = array(
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    );
    
    $fecha = new DateTime($fecha);
    $dia = $fecha->format('j');
    $mes = $meses[$fecha->format('n') - 1];
    $año = $fecha->format('Y');
    
    return "$dia de $mes de $año";
}

// Consulta para obtener los datos de la empresa, cliente y detalles de la cotización
$query = "
    SELECT 
        cot.id_empresa,
        cot.numero_cotizacion,
        e.nombre_empresa,
        e.id_area_empresa,
        e.direccion_empresa,
        e.telefono_empresa,
        e.email_empresa,
        e.web_empresa,
        e.rut_empresa,
        e.id_foto,
        c.nombre_empresa_cliente,
        c.rut_empresa_cliente,
        c.direccion_empresa_cliente,
        c.id_giro,
        c.comuna_empresa_cliente,
        c.ciudad_empresa_cliente,
        c.telefono_empresa_cliente,
        cot.fecha_emision,
        cot.fecha_validez,
        enc.nombre_encargado,
        enc.rut_encargado,
        enc.email_encargado,
        enc.fono_encargado,
        enc.celular_encargado,
        ven.nombre_vendedor,
        ven.rut_vendedor,
        ven.email_vendedor,
        ven.fono_vendedor,
        ven.celular_vendedor,
        tpg.tipo,
        tpp.tipo
    FROM C_Cotizaciones cot
    JOIN C_Clientes c ON cot.id_cliente = c.id_cliente
    JOIN E_Empresa e ON cot.id_empresa = e.id_empresa
    JOIN C_Encargados enc ON cot.id_encargado = enc.id_encargado 
    JOIN Em_Vendedores ven ON cot.id_vendedor = ven.id_vendedor
    JOIN Tp_Giro tpg ON c.id_giro = tpg.id 
    JOIN C_pago cp ON cot.id_cotizacion = cp.id_cotizacion
    JOIN Tp_Pago tpp ON cp.id_pago = tpp.id
    WHERE cot.id_cotizacion = ?
";

//---------------------------------------------------------------------------------------------//

// Preparar la consulta
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_cotizacion);

//---------------------------------------------------------------------------------------------//

// Ejecutar la consulta
$stmt->execute();

//---------------------------------------------------------------------------------------------//

// Obtener los resultados
$result = $stmt->get_result();

//---------------------------------------------------------------------------------------------//

// Verificar si hay resultados
if ($result->num_rows > 0) {
    $items = $result->fetch_all(MYSQLI_ASSOC);
    $id_empresa = $items[0]['id_empresa']; // Guardar id_empresa para la siguiente consulta
    $id_area = $items[0]['id_area_empresa'];
    $id_foto = $items[0]['id_foto']; // Guardar id_foto para cargar la imagen

    //---------------------------------------------------------------------------------------------//

    $query_foto = "SELECT ruta_foto FROM fp_fotosperfil WHERE id_foto = ?";
    $stmt_foto = $mysqli->prepare($query_foto);
    $stmt_foto->bind_param("i", $id_foto);

    //---------------------------------------------------------------------------------------------//
    
    // Ejecutar la consulta para la foto
    $stmt_foto->execute();
    $result_foto = $stmt_foto->get_result();
    
    //---------------------------------------------------------------------------------------------//

    // Verificar si se encontró la foto
    if ($result_foto->num_rows > 0) {
        $foto = $result_foto->fetch_assoc();
        $ruta_foto = $foto['ruta_foto']; // Obtener la ruta de la foto
    } else {
        $ruta_foto = null; // No se encontró la foto
    }

    //---------------------------------------------------------------------------------------------//

    $query_area = "SELECT nombre_area FROM Tp_Area WHERE id_area = ?";
    $stm_area = $mysqli->prepare($query_area);
    $stm_area->bind_param("i", $id_area);

    //---------------------------------------------------------------------------------------------//

    $stm_area->execute();
    $result_area = $stm_area->get_result();

    //---------------------------------------------------------------------------------------------//

    if ($result_area->num_rows > 0) {
        $area = $result_area->fetch_assoc();
        $area_empresa = $area['nombre_area'];
    } else {
        $area_empresa = null;
    }
} else {
    echo "No se encontró la cotización o la empresa relacionada.";
}

//---------------------------------------------------------------------------------------------//

$sql_firma = "
    SELECT 
        f.id_firma,
        f.id_empresa,
        f.titulo_firma, 
        f.nombre_encargado_firma, 
        f.cargo_encargado_firma, 
        f.telefono_encargado_firma,
        f.nombre_empresa_firma, 
        f.area_empresa_firma,
        f.telefono_empresa_firma, 
        f.firma_digital,
        f.email_firma, 
        f.direccion_firma, 
        f.ciudad_firma,
        f.pais_firma,
        f.rut_firma,
        f.web_firma,
        e.id_tipo_firma AS tipo_firma
    FROM em_firmas f
    JOIN e_empresa e ON f.id_empresa = e.id_empresa
    WHERE f.id_empresa = ? 
    LIMIT 1";

    //---------------------------------------------------------------------------------------------//

if ($stmt_firma = $mysqli->prepare($sql_firma)) {
    $stmt_firma->bind_param("i", $id_empresa);
    $stmt_firma->execute();
    $result_firma = $stmt_firma->get_result();

    if ($result_firma->num_rows == 1) {
        $firma = $result_firma->fetch_assoc();
        
        $tipo_firma = $firma['tipo_firma'];
    } else {
        $firma = null; // No hay firma manual
    }

//---------------------------------------------------------------------------------------------//

    $stmt_firma->close();
} else {
    echo "<p>Error al preparar la consulta de la firma: " . $mysqli->error . "</p>";
}
//---------------------------------------------------------------------------------------------//
?>

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/header.css">


<!-- TÍTULO: CONTENEDOR DEL ENCABEZADO -->

    <!-- La etiqueta lleva la clase header contenedor dentro del encabezado -->
<div class="header-contenedor">

    <!-- TÍTULO: LOGO DE LA EMPRESA -->

    <!-- La etiqueta lleva el logo de la compañia -->
    <img alt="Company Logo" class="logo" src="<?php echo $ruta_foto; ?>"/>

    <!-- TÍTULO: INFORMACIÓN DE LA EMPRESA -->

    <!-- Este header obtiene los datos de la información de contacto -->
    <div class="header"> 
        <h1><?php echo $items[0]['nombre_empresa']; ?></h1>
        <h2><?php echo $area_empresa ?></h2>
        
        <div class="contact-info"> <!-- Título: Información de contacto -->
            <p>DIRECCIÓN: <?php echo $items[0]['direccion_empresa']; ?></p>
            <p>TELÉFONO: <?php echo $items[0]['telefono_empresa']; ?></p>
            <p>E-MAIL: <?php echo $items[0]['email_empresa']; ?></p>
            <p>WEB: <?php echo $items[0]['web_empresa']; ?></p>
        </div>
    </div>

    <!-- TÍTULO: INFORMACIÓN DE LA COTIZACIÓN -->

    <!-- Importa los datos para la cotización -->
    <div class="invoice-info"> 
        <p>R.U.T.: <?php echo $items[0]['rut_empresa']; ?></p>
        <h3>COTIZACIÓN</h3>
        <p>Nº: <?php echo $items[0]['numero_cotizacion']; ?></p>
        <p class="sii-info"> SISTEMA DE PRUEBAS</p>
        <p>Fecha de vencimiento: <?php echo $items[0]['fecha_validez']; ?></p>
    </div>

</div>

    <!-- TÍTULO: FECHA DE EMISIÓN-->

    <!-- Importa la Fecha de emisión -->
    <div class="fecha-emision">
        <?php 
        $ciudad = "Santiago";
        $fecha_emision = formatearFechaEspanol($items[0]['fecha_emision']);
        echo htmlspecialchars($ciudad . ", " . $fecha_emision); 
        ?>
    </div>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/header.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa  header .PHP -----------------------------------
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
