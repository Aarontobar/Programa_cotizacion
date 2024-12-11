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
    ------------------------------------- INICIO ITred Spa Datos empresa.PHP --------------------------------------
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
    'EmpresaNombre' => '',
    'EmpresaArea' => '',
    'EmpresaDireccion' => '',
    'EmpresaTelefono' => '',
    'EmpresaEmail' => ''
];

// Si hay una empresa seleccionada en la sesión, obtener sus datos
if (isset($_SESSION['id_empresa'])) {
    $id_empresa = $_SESSION['id_empresa'];
    $query = "SELECT 
                nombre_empresa as EmpresaNombre,
                id_area_empresa as EmpresaArea,
                direccion_empresa as EmpresaDireccion,
                telefono_empresa as EmpresaTelefono,
                email_empresa as EmpresaEmail
              FROM E_Empresa
              WHERE id_empresa = ?";
              
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $id_empresa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        $stmt->close();
    }
}
?>

<!-- TITULO ARCHIVO CSS -->
<link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/datos_empresa.css">

<div class="datos_empresa_nueva_cotizacion">
    <div class="row">
        <fieldset class="box-12 cuadro-datos">
            <legend>Mi Empresa</legend>

            <input type="hidden" id="empresa-id" name="empresa_id" 
                   value="<?php echo isset($_SESSION['id_empresa']) ? htmlspecialchars($_SESSION['id_empresa']) : ''; ?>">
            
            <div class="form-group">
                <label for="empresa_nombre">Nombre</label>
                <input type="text" id="empresa_nombre" name="empresa_nombre" 
                       value="<?php echo htmlspecialchars($row['EmpresaNombre']); ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="empresa_area">Área</label>
                <select id="empresa_area" name="empresa_area" required>
                    <option value="">Seleccione un área</option>
                    <?php
                    $areas_query = "SELECT id_area, nombre_area FROM Tp_Area ORDER BY nombre_area";
                    if ($result = $mysqli->query($areas_query)) {
                        while ($area = $result->fetch_assoc()) {
                            $selected = ($area['id_area'] == $row['EmpresaArea']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($area['id_area']) . "' $selected>" 
                                 . htmlspecialchars($area['nombre_area']) . "</option>";
                        }
                        $result->free();
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="empresa_direccion">Dirección</label>
                <input type="text" id="empresa_direccion" name="empresa_direccion" 
                       value="<?php echo htmlspecialchars($row['EmpresaDireccion']); ?>">
            </div>

            <div class="form-group" style="display: flex; align-items: center;">
                <label for="empresa_telefono">Teléfono</label>
                <img id="flag" src="" alt="Bandera" style="display: none; margin: 0 10px;" width="32" height="20">
                <input type="text" id="empresa_telefono" name="empresa_telefono" 
                       value="<?php echo htmlspecialchars($row['EmpresaTelefono']); ?>"
                       placeholder="+56 9 1234 1234" 
                       maxlength="13" 
                       required>
            </div>

            <div class="form-group">
                <label for="empresa_email">Email</label>
                <input type="email" id="empresa_email" name="empresa_email" 
                       value="<?php echo htmlspecialchars($row['EmpresaEmail']); ?>"
                       required>
            </div>
        </fieldset>
    </div>
</div>

<!-- TITULO: ARCHIVO JS -->
<script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/datos_empresa.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Datos empresa.PHP ----------------------------------------
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