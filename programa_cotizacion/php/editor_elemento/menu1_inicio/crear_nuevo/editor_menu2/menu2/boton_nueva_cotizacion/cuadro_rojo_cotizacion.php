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
    ------------------------------------- INICIO ITred Spa Cuadro rojo cotizacion.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
    <?php
// Verificar si hay una sesión activa
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

$row = [
    'EmpresaRUT' => '',
];
$numero_cotizacion = isset($_POST['numero_cotizacion']) ? $_POST['numero_cotizacion'] : 30; // Valor por defecto
$dias_validez = isset($_POST['dias_validez']) ? $_POST['dias_validez'] : 30; // Valor por defecto

// Si hay una empresa seleccionada en la sesión, obtener sus datos
if (isset($_SESSION['id_empresa'])) {
    $id_empresa = $_SESSION['id_empresa'];
    $query = "SELECT rut_empresa as EmpresaRUT FROM E_Empresa WHERE id_empresa = ?";
    
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $id_empresa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        $stmt->close();
    }

    // Obtener el último número de cotización para esta empresa
    $query_numero = "SELECT MAX(CAST(numero_cotizacion AS UNSIGNED)) as ultimo_numero 
                    FROM C_Cotizaciones 
                    WHERE id_empresa = ?";
    
    if ($stmt = $mysqli->prepare($query_numero)) {
        $stmt->bind_param("i", $id_empresa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $num_row = $result->fetch_assoc();
            if ($num_row['ultimo_numero'] !== null) {
                $numero_cotizacion = $num_row['ultimo_numero'] + 1;
            }
        }
        $stmt->close();
    }
}
?>
    
<!-- TITULO IMPORT ARCHIVO CSS -->
<link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/cuadro_rojo_cotizacion.css">

<body onload="calcularFechaValidez();"> 
    
<div class="cuadro_rojo_nueva_cotizacion">
    <fieldset class="box-6 cuadro-datos cuadro-datos-rojo"> 
        <legend>Detalle Cotización</legend>

        <label for="empresa_rut">RUT de la Empresa:</label>
        <input type="text" 
               id="empresa_rut" 
               name="empresa_rut" 
               minlength="7" 
               maxlength="12" 
               title="El RUT debe contener entre 7 y 12 caracteres numéricos o 'K'." 
               required 
               oninput="FormatearRut(this)" 
               value="<?php echo htmlspecialchars($row['EmpresaRUT']); ?>">

        <label for="numero_cotizacion">Número de Cotización:</label>
        <input type="number" 
               id="numero-cotizacion" 
               name="numero_cotizacion" 
               required 
               min="1" 
               placeholder="30" 
               value="<?php echo htmlspecialchars($numero_cotizacion); ?>">

        <label for="dias_validez">Días de Validez:</label>
        <input type="number" 
               id="dias_validez" 
               name="dias_validez" 
               required 
               min="1" 
               placeholder="30" 
               value="<?php echo htmlspecialchars($dias_validez); ?>" 
               readonly>

        <label for="fecha_validez">Fecha de Validez:</label>
        <input type="date" 
               id="fecha_validez" 
               name="fecha_validez" 
               readonly>
    </fieldset>   
</div>
</body>

<!-- TÍTULO: AQUÍ SE CARGA EL JS DEL ARCHIVO -->
<script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/cuadro_rojo_cotizacion.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Cuadro rojo cotizacion.PHP ----------------------------------------
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