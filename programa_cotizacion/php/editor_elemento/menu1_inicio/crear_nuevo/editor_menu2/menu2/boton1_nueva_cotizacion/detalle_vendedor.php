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
    ------------------------------------- INICIO ITred Spa Detalle vendedor.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
<!-- TITULO: ARCHIVO CSS -->

<!-- llama archivo css -->
<link rel="stylesheet" href="../../../css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton1_nueva_cotizacion/detalle_vendedor.css">

<?php
// Obtener todos los datos de los vendedores
$sql = "SELECT * FROM Em_Vendedores";
$result = $mysqli->query($sql);

$vendedores = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $vendedores[] = $row;
    }
}
?>

<!-- Select para mostrar u ocultar el formulario -->
<div class="form-group">
    <label for="formulario_opcion_ven">Seleccione un vendedor</label>
    <select id="formulario_opcion_ven" name="formulario_opcion_ven" onchange="toggleFormulario_ven()">
        <option value="" disabled selected>Seleccione una opción</option>
        <option value="nuevo">Nuevo</option>
        <?php foreach ($vendedores as $vendedor): ?>
            <option value="<?php echo $vendedor['id_vendedor']; ?>"><?php echo $vendedor['nombre_vendedor']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Contenedor del formulario -->
<div id="formulario_vendedor" style="display: none;">
    <fieldset class="row"> 
        <legend>Datos vendedor</legend>
        <div class="box-6 cuadro-datos"> 
            <div class="form-group-inline">
                <div class="form-group">
                    <label for="vendedor_rut">RUT: </label> 
                    <input type="text" id="vendedor_rut" name="vendedor_rut" 
                        minlength="7" maxlength="12" 
                        placeholder="Ej: 12.345.678-9"
                        oninput="FormatearRut(this)"
                        oninput="QuitarCaracteresInvalidos(this)"
                        required> 
                </div>
                <div class="form-group">
                    <label for="vendedor_nombre">Nombre:</label>
                    <input type="text" id="vendedor_nombre" name="vendedor_nombre" 
                        placeholder="Ej: María López" 
                        required 
                        minlength="3" 
                        maxlength="50" 
                        pattern="^[a-zA-ZÀ-ÿ\s]+$" 
                        oninput="QuitarCaracteresInvalidos(this)"
                        title="Ingresa un nombre válido (Ej: María López). Solo se permiten letras y espacios."> 
                </div>
            </div>
            <div class="form-group">
                <label for="vendedor_email">Email:</label> 
                <input type="email" id="vendedor_email" name="vendedor_email"
                    placeholder="ejemplo@gmail.com" 
                    maxlength="255" 
                    required 
                    title="Ingresa un correo electrónico válido, como ejemplo@empresa.com" 
                    oninput="QuitarCaracteresInvalidos(this)"
                    onblur="CompletarEmail(this)"> 
            </div>
        </div>
        <div class="box-6 cuadro-datos cuadro-datos-left"> 
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="vendedor_telefono" style="margin-right: 0; height: 68%;">Teléfono:</label> 
                <div class="custom-select2-wrapper">
                    <select id="countryCode2" name="countryCode2" class="custom-select2">
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
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <input type="text" id="vendedor_telefono" name="vendedor_telefono"
                    placeholder="+56 9 1234 1234" 
                    maxlength="16" 
                    required 
                    title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"> 
            </div>
            <div class="form-group" style="display: flex; align-items: center;">
                <label for="vendedor_celular" style="margin-right: 0; height: 68%;">Celular:</label> 
                <div class="custom-select2-wrapper">
                    <select id="countryCode3" name="countryCode3" class="custom-select2">
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
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <input type="text" id="vendedor_celular" name="vendedor_celular"
                    placeholder="+56 9 1234 1234" 
                    maxlength="16" 
                    required 
                    title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"> 
            </div>
        </div>
    </fieldset>
</div>

<script>
function toggleFormulario_ven() {
    var select = document.getElementById('formulario_opcion_ven');
    var formulario = document.getElementById('formulario_vendedor');
    var vendedores = <?php echo json_encode($vendedores); ?>;
    
    if (select.value === 'nuevo') {
        formulario.style.display = 'block';
        // Limpiar el formulario
        document.getElementById('vendedor_rut').value = '';
        document.getElementById('vendedor_nombre').value = '';
        document.getElementById('vendedor_email').value = '';
        document.getElementById('vendedor_telefono').value = '';
        document.getElementById('vendedor_celular').value = '';
    } else if (select.value !== '') {
        formulario.style.display = 'block';
        // Asignar los valores al formulario
        var vendedor = vendedores.find(e => e.id_vendedor == select.value);
        document.getElementById('vendedor_rut').value = vendedor.rut_vendedor;
        document.getElementById('vendedor_nombre').value = vendedor.nombre_vendedor;
        document.getElementById('vendedor_email').value = vendedor.email_vendedor;
        document.getElementById('vendedor_telefono').value = vendedor.fono_vendedor;
        document.getElementById('vendedor_celular').value = vendedor.celular_vendedor;
    } else {
        formulario.style.display = 'none';
    }
}
</script>

<script src="../../../js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton1_nueva_cotizacion/detalle_vendedor.js"></script> 

<?php
// Verifica si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    // Recibir datos del formulario vendedor

    $vendedor_rut = isset($_POST['vendedor_rut']) ? trim($_POST['vendedor_rut']) : null;
    $vendedor_nombre = isset($_POST['vendedor_nombre']) ? trim($_POST['vendedor_nombre']) : null;
    $vendedor_email = isset($_POST['vendedor_email']) ? trim($_POST['vendedor_email']) : null;
    $vendedor_fono = isset($_POST['vendedor_telefono']) ? trim($_POST['vendedor_telefono']) : null;
    $vendedor_celular = isset($_POST['vendedor_celular']) ? trim($_POST['vendedor_celular']) : null;


    // Verificación básica para campos requeridos

    if ($vendedor_rut && $vendedor_nombre) {

        // Insertar o actualizar el vendedor

        $sql = "INSERT INTO Em_Vendedores (rut_vendedor, nombre_vendedor, email_vendedor, fono_vendedor, celular_vendedor)
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    nombre_vendedor = VALUES(nombre_vendedor), 
                    email_vendedor = VALUES(email_vendedor), 
                    fono_vendedor = VALUES(fono_vendedor), 
                    celular_vendedor = VALUES(celular_vendedor)";
        $stmt = $mysqli->prepare($sql);
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }
        $stmt->bind_param("sssss", 
            $vendedor_rut, 
            $vendedor_nombre, 
            $vendedor_email, 
            $vendedor_fono, 
            $vendedor_celular
        );

        if (!$stmt->execute()) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }


        // Obtener el ID del vendedor después de la inserción/actualización

        $id_vendedor = $stmt->insert_id;


        // Si no hay un nuevo ID, obtener el ID del vendedor existente

        if ($id_vendedor === 0) {
            $result = $mysqli->query("SELECT id_vendedor FROM Em_Vendedores WHERE rut_vendedor = '$vendedor_rut'");
            $row = $result->fetch_assoc();
            $id_vendedor = $row['id_vendedor'];
        }

        echo "Vendedor insertado/actualizado. ID: $id_vendedor<br>";
    } else {
        echo "El RUT y el nombre del vendedor son obligatorios.";
    }
}

?>


     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Detalle vendedor.PHP ----------------------------------------
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