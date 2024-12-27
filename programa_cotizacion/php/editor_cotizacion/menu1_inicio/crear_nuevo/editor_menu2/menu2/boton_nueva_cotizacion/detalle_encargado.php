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
    ------------------------------------- INICIO ITred Spa Detalle encargado.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: Llama al CSS -->

<!-- llama al Archivo css -->
<link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/detalle_encargado.css">

<?php
// Obtener todos los datos de los encargados
$sql = "SELECT * FROM C_Encargados";
$result = $mysqli->query($sql);

$encargados = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $encargados[] = $row;
    }
}
?>

<!-- Select para mostrar u ocultar el formulario -->
<div class="form-group">
    <label for="formulario_opcion_cli">Seleccione un encargado</label>
    <select id="formulario_opcion_cli" name="formulario_opcion_cli" onchange="toggleFormulario_cli()">
        <option value="" disabled selected>Seleccione una opción</option>
        <option value="nuevo">Nuevo</option>
        <?php foreach ($encargados as $encargado): ?>
            <option value="<?php echo $encargado['id_encargado']; ?>"><?php echo $encargado['nombre_encargado']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Contenedor del formulario -->
<div id="formulario_encargado" style="display: none;">
    <fieldset class="row"> 
        <legend>Datos encargado</legend>
        <div class="box-6 cuadro-datos"> 
            <div class="form-group-inline">
                <div class="form-group">
                    <label for="encargado_rut">RUT: </label> 
                    <input type="text" id="encargado_rut" name="encargado_rut" 
                        minlength="7" maxlength="12" 
                        placeholder="Ej: 12.345.678-9"
                        oninput="FormatearRut(this)"
                        oninput="QuitarCaracteresInvalidos(this)"
                        required> 
                </div>
                <div class="form-group">
                    <label for="enc_nombre">Nombre:</label>
                    <input type="text" id="enc_nombre" name="enc_nombre" 
                        placeholder="Ej: Juan Pérez" 
                        required 
                        minlength="3" 
                        maxlength="50" 
                        pattern="^[a-zA-ZÀ-ÿ\s]+$" 
                        oninput="QuitarCaracteresInvalidos(this)"
                        title="Ingresa un nombre válido (Ej: Juan Pérez). Solo se permiten letras y espacios."> 
                </div>
            </div>
            <div class="form-group">
                <label for="enc_email">Email:</label> 
                <input type="email" id="enc_email" name="enc_email"
                    placeholder="ejemplo@gmail.com" 
                    maxlength="255" 
                    required 
                    title="Ingresa un correo electrónico válido, como ejemplo@empresa.com" 
                    oninput="QuitarCaracteresInvalidos(this)"
                    onblur="CompletarEmail(this)"> 
            </div>
            <div class="form-group">
                <label for="enc_fono">Teléfono:</label>
                <img id="flag_encargado" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Flag_of_None.svg/32px-Flag_of_None.svg.png" 
                    alt="Bandera" style="display: none; margin-right: 10px;" width="32" height="20">
                <input type="text" id="enc_fono" name="enc_fono" 
                    placeholder="+56 9 1234 1234" 
                    maxlength="16" 
                    required 
                    title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"
                    oninput="asegurarMasYDetectarPais2(this)"> 
            </div>
        </div>
        <div class="box-6 cuadro-datos cuadro-datos-left"> 
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="enc_celular" style="margin-right: 0; height: 68%;">Teléfono:</label> 
                <div class="custom-select1-wrapper1">
                    <select id="countryCode1" name="countryCode1" class="custom-select1">
                        <option value="+1" data-flag="us">US +1</option>
                        <option value="+44" data-flag="gb">GB +44</option>
                        <option value="+34" data-flag="es">ES +34</option>
                        <option value="+56" data-flag="cl">CL +56</option>
                        <option value="+54" data-flag="ar">AR +54</option>
                        <option value="+591" data-flag="bo">BO +591</option>
                        <option value="+55" data-flag="br">BR +55</option>
                        <option value="+57" data-flag="co">CO +57</option>
                        <option value="+506" data-flag="cr">CR +506</option>
                        <option value="+53" data-flag="cu">CU +53</option>
                        <option value="+593" data-flag="ec">EC +593</option>
                        <option value="+503" data-flag="sv">SV +503</option>
                        <option value="+502" data-flag="gt">GT +502</option>
                        <option value="+504" data-flag="hn">HN +504</option>
                        <option value="+52" data-flag="mx">MX +52</option>
                        <option value="+505" data-flag="ni">NI +505</option>
                        <option value="+507" data-flag="pa">PA +507</option>
                        <option value="+595" data-flag="py">PY +595</option>
                        <option value="+51" data-flag="pe">PE +51</option>
                        <option value="+1" data-flag="pr">PR +1</option>
                        <option value="+598" data-flag="uy">UY +598</option>
                        <option value="+58" data-flag="ve">VE +58</option>
                        <option value="+34" data-flag="es">ES +34</option>
                        <option value="+33" data-flag="fr">FR +33</option>
                        <option value="+44" data-flag="gb">GB +44</option>
                        <option value="+39" data-flag="it">IT +39</option>
                        <option value="+49" data-flag="de">DE +49</option>
                        <option value="+81" data-flag="jp">JP +81</option>
                        <option value="+86" data-flag="cn">CN +86</option>
                        <option value="+82" data-flag="kr">KR +82</option>
                    </select>
                </div>
                <input type="text" id="enc_celular" name="enc_celular"
                    placeholder="+56 9 1234 1234" 
                    maxlength="15" 
                    required 
                    title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"> 
            </div>
            <div class="form-group">
                <label for="enc_proyecto">Proyecto Asignado:</label> 
                <input type="text" id="enc_proyecto" name="enc_proyecto" 
                    placeholder="Ej: Proyecto XYZ" 
                    minlength="3" 
                    maxlength="100" 
                    pattern="^[a-zA-ZÀ-ÿ0-9\s\-]+$" 
                    oninput="QuitarCaracteresInvalidos(this)"
                    title="Ingresa un nombre de proyecto válido (Ej: Proyecto XYZ). Solo se permiten letras, números, espacios y guiones."> 
            </div>
        </div>
    </fieldset>
</div>

<script>
function toggleFormulario_cli() {
    var select = document.getElementById('formulario_opcion_cli');
    var formulario = document.getElementById('formulario_encargado');
    var encargados = <?php echo json_encode($encargados); ?>;
    
    if (select.value === 'nuevo') {
        formulario.style.display = 'block';
        // Limpiar el formulario
        document.getElementById('encargado_rut').value = '';
        document.getElementById('enc_nombre').value = '';
        document.getElementById('enc_email').value = '';
        document.getElementById('enc_fono').value = '';
        document.getElementById('enc_celular').value = '';
        document.getElementById('enc_proyecto').value = '';
    } else if (select.value !== '') {
        formulario.style.display = 'block';
        // Asignar los valores al formulario
        var encargado = encargados.find(e => e.id_encargado == select.value);
        document.getElementById('encargado_rut').value = encargado.rut_encargado;
        document.getElementById('enc_nombre').value = encargado.nombre_encargado;
        document.getElementById('enc_email').value = encargado.email_encargado;
        document.getElementById('enc_fono').value = encargado.fono_encargado;
        document.getElementById('enc_celular').value = encargado.celular_encargado;
        document.getElementById('enc_proyecto').value = encargado.proyecto_asignado;
    } else {
        formulario.style.display = 'none';
    }
}
</script>

<script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/detalle_encargado.js"></script> 

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    // Recibir datos del formulario encargado
    $enc_rut = isset($_POST['encargado_rut']) ? trim($_POST['encargado_rut']) : null;
    $enc_nombre = isset($_POST['enc_nombre']) ? trim($_POST['enc_nombre']) : null;
    $enc_email = isset($_POST['enc_email']) ? trim($_POST['enc_email']) : null;
    $enc_fono = isset($_POST['enc_fono']) ? trim($_POST['enc_fono']) : null;
    $enc_celular = isset($_POST['enc_celular']) ? trim($_POST['enc_celular']) : null;
    $enc_proyecto = isset($_POST['enc_proyecto']) ? trim($_POST['enc_proyecto']) : null;

    // Verificación básica para campos requeridos
    if ($enc_rut && $enc_nombre) {
        // Insertar o actualizar el encargado
        $sql = "INSERT INTO C_Encargados (rut_encargado, nombre_encargado, email_encargado, fono_encargado, celular_encargado, proyecto_asignado)
                VALUES (?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    nombre_encargado = VALUES(nombre_encargado), 
                    email_encargado = VALUES(email_encargado), 
                    fono_encargado = VALUES(fono_encargado), 
                    celular_encargado = VALUES(celular_encargado),
                    proyecto_asignado = VALUES(proyecto_asignado)";
        $stmt = $mysqli->prepare($sql);
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }
        $stmt->bind_param("ssssss", 
            $enc_rut, 
            $enc_nombre, 
            $enc_email, 
            $enc_fono, 
            $enc_celular,
            $enc_proyecto
        );

        if (!$stmt->execute()) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        // Obtener el ID del encargado después de la inserción/actualización
        $id_encargado = $stmt->insert_id;

        // Si no hay un nuevo ID, obtener el ID del encargado existente
        if ($id_encargado === 0) {
            $result = $mysqli->query("SELECT id_encargado FROM C_Encargados WHERE rut_encargado = '$enc_rut'");
            $row = $result->fetch_assoc();
            $id_encargado = $row['id_encargado'];
        }
        
        echo "Encargado insertado/actualizado. ID: $id_encargado<br>";
    } else {
        echo "El RUT y el nombre del encargado son obligatorios.";
    }
}
?>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Detalle encargado.PHP ----------------------------------------
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