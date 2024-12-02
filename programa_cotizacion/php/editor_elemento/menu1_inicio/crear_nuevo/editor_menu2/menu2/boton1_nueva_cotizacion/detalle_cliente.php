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
    ------------------------------------- INICIO ITred Spa Detalle cliente.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->


<!-- TÍTULO: Archivo CSS -->

<!-- llama al css -->

<link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/editor_menu2/menu2/boton1_nueva_cotizacion/detalle_cliente.css">

<?php
// Obtener todos los datos de las empresas
$sql = "SELECT * FROM C_Clientes";
$result = $mysqli->query($sql);

$empresas = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $empresas[] = $row;
    }
}
?>

<!-- Select para mostrar u ocultar el formulario -->
<!-- Select para mostrar u ocultar el formulario -->
<div class="form-group">
    <label for="formulario_opcion">ASeleccione empresa de cliente</label>
    <select id="formulario_opcion" name="formulario_opcion" onchange="toggleFormulario()">
        <option value="" disabled selected>Seleccione una opción</option>
        <option value="nuevo">Nuevo</option>
        <?php foreach ($empresas as $empresa): ?>
            <option value="<?php echo $empresa['id_cliente']; ?>"><?php echo $empresa['nombre_empresa_cliente']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Contenedor del formulario -->
<div id="formulario_cliente" style="display: none;">
    <fieldset class="row"> 
        <!-- TÍTULO: DATOS EMPRESA CLIENTE -->
        <legend>Datos empresa cliente </legend>
        <!-- Crea una caja PARA ingresar datos, ocupando 6 de las 12 columnas disponibles en el diseño -->
        <div class="box-6 cuadro-datos">
            <div class="form-group-inline">
                <div class="form-group">
                    <!-- TÍTULO: CAMPO PARA EL RUT DE LA EMPRESA -->
                    <!-- Etiqueta PARA el campo de entrada del RUT del cliente -->
                    <label for="cliente_rut">RUT Empresa: </label> 
                    <!-- TÍTULO: CAMPO PARA INGRESAR EL RUT DEL CLIENTE -->
                    <!-- datos del cliente -->
                    <input type="text" id="cliente_rut" name="cliente_rut" 
                        minlength="7" maxlength="12" 
                        placeholder="Ej: 12.345.678-9"
                        oninput="FormatearRut(this)"
                        oninput="QuitarCaracteresInvalidos(this)"
                        required> 
                        <!-- Campo de texto PARA ingresar el RUT del cliente. También es obligatorio -->
                </div>
                <div class="form-group">
                    <!-- TÍTULO: CAMPO PARA EL NOMBRE DEL REPRESENTANTE -->
                    <!-- Etiqueta PARA el campo de entrada del nombre del cliente -->
                    <label for="cliente_nombre">Nombre representante:</label>
                    <!-- TÍTULO: CAMPO PARA INGRESAR EL NOMBRE DEL CLIENTE -->
                    <!-- campo para colocar el nombre del cliente -->
                    <input type="text" id="cliente_nombre" name="cliente_nombre" required
                        pattern="^[A-Za-zÀ-ÿ0-9\s&.-]+$" 
                        title="Por favor, ingrese solo letras, números y caracteres como &,-."
                        oninput="QuitarCaracteresInvalidos(this)"
                        placeholder="Ejemplo: Pedro Perez"> 
                        <!-- Campo de texto PARA ingresar el nombre del cliente. El atributo "required" hace que el campo sea obligatorio -->
                </div>
            </div>
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA LA EMPRESA DEL CLIENTE -->
                <!-- Etiqueta PARA el campo de entrada de la empresa del cliente -->
                <label for="cliente_empresa">Empresa:</label> 
                <!-- TÍTULO: CAMPO PARA INGRESAR EL NOMBRE DE LA EMPRESA DEL CLIENTE -->
                <!-- datos del campo empresa -->
                <input type="text" id="cliente_empresa" name="cliente_empresa" required minlength="3" maxlength="100"
                    pattern="^[A-Za-zÀ-ÿ0-9\s&.-]+$" 
                    title="Por favor, ingrese solo letras, números y caracteres como &,-."
                    oninput="QuitarCaracteresInvalidos(this)"
                    placeholder="Ejemplo: Mi Empresa S.A."> 
                    <!-- Campo de texto PARA ingresar el nombre de la empresa del cliente. Este campo no es obligatorio -->
            </div>
            <div class="form-group-inline">
                <div class="form-group">
                    <!-- TÍTULO: CAMPO PARA LA DIRECCIÓN DEL CLIENTE -->
                    <!-- Etiqueta PARA el campo de entrada de la dirección del cliente -->
                    <label for="cliente_direccion">Dirección:</label> 
                    <!-- TÍTULO: CAMPO PARA INGRESAR LA DIRECCIÓN DEL CLIENTE -->
                    <!-- datos cliente direccion -->
                    <input type="text" id="cliente_direccion" name="cliente_direccion"
                        minlength="5" maxlength="100" 
                        pattern="^[A-Za-z0-9À-ÿ\s#,-.]*$" 
                        oninput="QuitarCaracteresInvalidos(this)"
                        title="Por favor, ingrese una dirección válida. Se permiten letras, números, espacios y los caracteres #, -, , y .."
                        placeholder="Ejemplo: Av. Siempre Viva 742"> <!-- Campo de texto PARA ingresar la dirección del cliente. No es obligatorio -->
                </div>
                <div class="form-group">
                    <!-- TÍTULO: CAMPO PARA EL LUGAR DEL CLIENTE -->
                    <!-- Etiqueta PARA el campo de selección del lugar del cliente -->
                    <label for="cliente_lugar">Lugar:</label> 
                    <!-- TÍTULO: CAMPO PARA SELECCIONAR EL LUGAR DEL CLIENTE -->
                    <!-- Campo de selección PARA el lugar del cliente. Este campo es obligatorio -->
                    <select id="cliente_lugar" name="cliente_lugar" required> 
                        <option value="" disabled selected>Selecciona un lugar</option>
                        <?php
                            $sql_tp_lugar = "SELECT id, nombre_lugar FROM tp_lugar";
                            $result_tp_lugar = $mysqli->query($sql_tp_lugar);
                            if ($result_tp_lugar === false) {
                                die("Error en la consulta: " . $mysqli->error);
                            }
                            while ($row_tp_lugar = $result_tp_lugar->fetch_assoc()) {
                                echo '<option value="' . $row_tp_lugar['id'] . '">' . htmlspecialchars($row_tp_lugar['nombre_lugar']) . '</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group" style="display: flex; align-items: center;">
                <!-- Etiqueta PARA el campo de entrada del teléfono del cliente -->
                <label for="cliente_fono" style="margin-right: 0; height: 68%;">Teléfono:</label> 
                <!-- Select para el código de país -->
                <div class="custom-select-wrapper">
                    <select id="countryCode" name="countryCode" class="custom-select">
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
                <!-- Campo de entrada de texto para el número de teléfono -->
                <input type="text" id="cliente_fono" name="cliente_fono"
                    placeholder="9 1234 1234" 
                    maxlength="14" 
                    required 
                    title="Formato válido: 9 1234 1234 (número sin código de país)" >
            </div>
        </div>
        <!-- Crea otra caja PARA ingresar datos, ocupando las otras 6 columnas. Se aplica una clase adicional "cuadro-datos-left" PARA estilo -->
        <div class="box-6 cuadro-datos cuadro-datos-left"> 
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA EL RUT DEL ENCARGADO -->
                <!-- Etiqueta PARA el campo de entrada del RUT del cliente -->
                <label for="rut_encargado_cliente">RUT Encargado: </label> 
                <!-- Título: Campo PARA Ingresar el RUT del Encargado -->
                <!-- datos empresa -->
                <input type="text" id="rut_encargado_cliente" name="rut_encargado_cliente" 
                    minlength="7" maxlength="12" 
                    placeholder="Ej: 12.345.678-9"
                    oninput="FormatearRut(this)"
                    oninput="QuitarCaracteresInvalidos(this)"
                    required> 
                    <!-- Campo de texto PARA ingresar el RUT del cliente. También es obligatorio -->
            </div>
            <div class="form-group">
                <!-- Título: Campo PARA el Email del Cliente -->
                <!-- Etiqueta PARA el campo de entrada del email del cliente -->
                <label for="cliente_email">Email:</label> 
                <!-- Título: Campo PARA Ingresar el Email del Cliente -->
                <input type="email" id="cliente_email" name="cliente_email"
                    placeholder="ejemplo@gmail.com" 
                    maxlength="255" 
                    required 
                    title="Ingresa un correo electrónico válido, como ejemplo@empresa.com" 
                    oninput="QuitarCaracteresInvalidos(this)"
                    onblur="CompletarEmail(this)"> 
                    <!-- Campo de correo electrónico PARA ingresar el email del cliente. El tipo "email" valida que el texto ingresado sea una dirección de correo electrónico -->
            </div>
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA EL CARGO DEL CLIENTE -->
                <!-- Etiqueta PARA el campo de selección del cargo del cliente -->
                <label for="cliente_cargo">Cargo:</label>
                <!-- TÍTULO: CAMPO PARA SELECCIONAR EL CARGO DEL CLIENTE -->
                <!-- Campo de selección PARA el cargo del cliente. Este campo es obligatorio -->
                <select id="cliente_cargo" name="cliente_cargo" required>
                    <option value="" disabled selected>Selecciona un cargo</option>
                    <?php
                        $sql_tp_cargo = "SELECT id_tp_cargo, nombre_cargo FROM tp_cargo";
                        $result_tp_cargo = $mysqli->query($sql_tp_cargo);
                        if ($result_tp_cargo === false) {
                            die("Error en la consulta: " . $mysqli->error);
                        }
                        while ($row_tp_cargo = $result_tp_cargo->fetch_assoc()) {
                            echo '<option value="' . $row_tp_cargo['id_tp_cargo'] . '">' . htmlspecialchars($row_tp_cargo['nombre_cargo']) . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA EL GIRO DEL CLIENTE -->
                <!-- Etiqueta PARA el campo de selección del giro del cliente -->
                <label for="cliente_giro">Giro:</label> 
                <!-- TÍTULO: CAMPO PARA SELECCIONAR EL GIRO DEL CLIENTE -->
                <!-- Campo de selección PARA el giro del cliente. Este campo es obligatorio -->
                <select id="cliente_giro" name="cliente_giro" required> 
                    <option value="" disabled selected>Selecciona un giro</option>
                    <?php
                        $sql_tp_giro = "SELECT id, tipo FROM tp_giro";
                        $result_tp_giro = $mysqli->query($sql_tp_giro);
                        if ($result_tp_giro === false) {
                            die("Error en la consulta: " . $mysqli->error);
                        }
                        while ($row_tp_giro = $result_tp_giro->fetch_assoc()) {
                            echo '<option value="' . $row_tp_giro['id'] . '">' . htmlspecialchars($row_tp_giro['tipo']) . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group-inline">
                <div class="form-group">
                    <!-- TÍTULO: CAMPO PARA EL PAÍS DEL CLIENTE -->
                    <!-- Etiqueta PARA el campo de selección del país del cliente -->
                    <label for="cliente_pais">País:</label> 
                    <!-- TÍTULO: CAMPO PARA SELECCIONAR EL PAÍS DEL CLIENTE -->
                    <!-- Campo de selección PARA el país del cliente. Este campo es obligatorio -->
                    <select id="cliente_pais" name="cliente_pais" required onchange="actualizarCiudades()">
                        <option value="" disabled selected>Selecciona un país</option>
                        <?php
                            $sql_pais = "SELECT id_pais, nombre_pais FROM pais";
                            $result_pais = $mysqli->query($sql_pais);
                            if ($result_pais === false) {
                                die("Error en la consulta: " . $mysqli->error);
                            }
                            while ($row_pais = $result_pais->fetch_assoc()) {
                                echo '<option value="' . $row_pais['id_pais'] . '">' . htmlspecialchars($row_pais['nombre_pais']) . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <!-- TÍTULO: CAMPO PARA LA CIUDAD DEL CLIENTE -->
                    <!-- Etiqueta PARA el campo de entrada de la ciudad del cliente -->
                    <label for="cliente_ciudad">Ciudad:</label> 
                    <!-- TÍTULO: CAMPO PARA SELECCIONAR LA CIUDAD DEL CLIENTE -->
                    <!-- Campo de selección PARA la ciudad del cliente. Este campo es obligatorio -->
                    <select id="cliente_ciudad" name="cliente_ciudad" required onchange="actualizarComunas()">
                        <option value="" disabled selected>Selecciona una ciudad</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- TÍTULO: CAMPO PARA LA COMUNA DEL CLIENTE -->
                    <!-- Etiqueta PARA el campo de entrada de la comuna del cliente -->
                    <label for="cliente_comuna">Comuna:</label> 
                    <!-- TÍTULO: CAMPO PARA SELECCIONAR LA COMUNA DEL CLIENTE -->
                    <!-- Campo de selección PARA la comuna del cliente. Este campo es obligatorio -->
                    <select id="cliente_comuna" name="cliente_comuna" required>
                        <option value="" disabled selected>Selecciona una comuna</option>
                    </select>
                </div>
            </div>
        </div>
    </fieldset>
</div>

<script>
function toggleFormulario() {
    var select = document.getElementById('formulario_opcion');
    var formulario = document.getElementById('formulario_cliente');
    var empresas = <?php echo json_encode($empresas); ?>;
    
    if (select.value === 'nuevo') {
        formulario.style.display = 'block';
        // Limpiar el formulario
        document.getElementById('cliente_rut').value = '';
        document.getElementById('cliente_nombre').value = '';
        document.getElementById('cliente_empresa').value = '';
        document.getElementById('cliente_direccion').value = '';
        document.getElementById('cliente_lugar').value = '';
        document.getElementById('cliente_fono').value = '';
        document.getElementById('cliente_email').value = '';
        document.getElementById('cliente_giro').value = '';
        document.getElementById('cliente_comuna').value = '';
        document.getElementById('cliente_ciudad').value = '';
        document.getElementById('cliente_tipo').value = '';
        document.getElementById('cliente_cargo').value = '';
        document.getElementById('rut_encargado_cliente').value = '';
    } else if (select.value !== '') {
        formulario.style.display = 'block';
        // Asignar los valores al formulario
        var empresa = empresas.find(e => e.id_cliente == select.value);
        document.getElementById('cliente_rut').value = empresa.rut_empresa_cliente;
        document.getElementById('cliente_nombre').value = empresa.nombre_encargado_cliente;
        document.getElementById('cliente_empresa').value = empresa.nombre_empresa_cliente;
        document.getElementById('cliente_direccion').value = empresa.direccion_empresa_cliente;
        document.getElementById('cliente_lugar').value = empresa.id_lugar;
        document.getElementById('cliente_fono').value = empresa.telefono_empresa_cliente;
        document.getElementById('cliente_email').value = empresa.email_empresa_cliente;
        document.getElementById('cliente_giro').value = empresa.id_giro;
        document.getElementById('cliente_comuna').value = empresa.comuna_empresa_cliente;
        document.getElementById('cliente_ciudad').value = empresa.ciudad_empresa_cliente;
        document.getElementById('cliente_tipo').value = empresa.id_tipo_empresa;
        document.getElementById('cliente_cargo').value = empresa.id_cargo;
        document.getElementById('rut_encargado_cliente').value = empresa.rut_encargado_cliente;
    } else {
        formulario.style.display = 'none';
    }
}
</script>

<!-- TÍTULO: ARCHIVO JS -->

    <!-- llamado detalle_cliente.JS -->
    <script src="../../js/menu_principal/crear_nuevo/editor_menu2/menu2/boton1_nueva_cotizacion/detalle_cliente.js"></script> 

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    // datos de la empresa 
    $rut_empresa_cliente = isset($_POST['cliente_rut']) ? $_POST['cliente_rut'] : null;
    $nombre_empresa_cliente = isset($_POST['cliente_empresa']) ? $_POST['cliente_empresa'] : null;
    $direccion_empresa_cliente = isset($_POST['cliente_direccion']) ? $_POST['cliente_direccion'] : null;
    $lugar_empresa_cliente = isset($_POST['cliente_lugar']) ? $_POST['cliente_lugar'] : null;
    $telefono_empresa_cliente = isset($_POST['cliente_fono']) ? $_POST['cliente_fono'] : null;
    $email_empresa_cliente = isset($_POST['cliente_email']) ? $_POST['cliente_email'] : null;
    $giro_empresa_cliente = isset($_POST['cliente_giro']) ? $_POST['cliente_giro'] : null;
    $comuna_empresa_cliente = isset($_POST['cliente_comuna']) ? $_POST['cliente_comuna'] : null;
    $ciudad_empresa_cliente = isset($_POST['cliente_ciudad']) ? $_POST['cliente_ciudad'] : null;
    $tipo_empresa_cliente = isset($_POST['cliente_tipo']) ? $_POST['cliente_tipo'] : null;
    //datos del encargado
    $rut_encargado_cliente = isset($_POST['rut_encargado_cliente']) ? $_POST['rut_encargado_cliente'] : null;
    $nombre_encargado_cliente = isset($_POST['cliente_nombre']) ? trim($_POST['cliente_nombre']) : null;
    $cargo_encargado_cliente = isset($_POST['cliente_cargo']) ? $_POST['cliente_cargo'] : null;
 
    

    // Campos no recibidos en el formulario que se dejarán en null
    $observacion = null;
    $direccion_encargado_cliente = null;
    $telefono_encargado_cliente = null;
    $comuna_encargado_cliente = null;
    $ciudad_encargado_cliente = null;

    if ($nombre_encargado_cliente && $rut_encargado_cliente) {
        // Insertar o actualizar el cliente
        $sql = "INSERT INTO C_Clientes (
            id_empresa_creadora, 
            rut_empresa_cliente, 
            nombre_empresa_cliente, 
            telefono_empresa_cliente, 
            email_empresa_cliente, 
            id_giro, 
            id_tipo_empresa, 
            id_lugar, 
            ciudad_empresa_cliente, 
            comuna_empresa_cliente, 
            direccion_empresa_cliente, 
            observacion, 
            rut_encargado_cliente, 
            nombre_encargado_cliente, 
            direccion_encargado_cliente, 
            telefono_encargado_cliente, 
            email_encargado_cliente, 
            id_cargo, 
            comuna_encargado_cliente, 
            ciudad_encargado_cliente
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
   
   $stmt = $mysqli->prepare($sql);
   $stmt->bind_param(
       'issssiisissssssssiss',
       $id, 
       $rut_empresa_cliente, 
       $nombre_empresa_cliente, 
       $telefono_empresa_cliente, 
       $email_empresa_cliente, 
       $giro_empresa_cliente, 
       $tipo_empresa_cliente, 
       $lugar_empresa_cliente, 
       $ciudad_empresa_cliente, 
       $comuna_empresa_cliente, 
       $direccion_empresa_cliente, 
       $observacion, 
       $rut_encargado_cliente, 
       $nombre_encargado_cliente, 
       $direccion_encargado_cliente, 
       $telefono_encargado_cliente, 
       $email_encargado_cliente, 
       $cargo_encargado_cliente, 
       $comuna_encargado_cliente, 
       $ciudad_encargado_cliente
   );
   
   if ($stmt->execute()) {
       echo "Cliente creado exitosamente.";

       // Obtiene el ID de la empresa insertada/actualizada
       
        $id_cliente = $mysqli->insert_id;
        echo "Cliente insertada/actualizada. ID: $id_cliente<br>";
   } else {
       echo "Error al crear el cliente: " . $stmt->error;
   }
    }};   
?>





     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Detalle cliente.PHP ----------------------------------------
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
