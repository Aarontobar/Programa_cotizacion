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
    ------------------------------------- INICIO ITred Spa Formulario Empresa.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

<!-- Llama al archivo CSS -->
<link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/formulario_empresa.css">

<!-- Crea una fila para organizar los elementos en una disposición horizontal -->
<div class="row">

    <!-- TÍTULO: CREA UNA CAJA PARA INGRESAR DATOS, OCUPANDO LAS 12 COLUMNAS DISPONIBLES EN EL DISEÑO. ESTA CAJA CONTIENE VARIOS CAMPOS DE ENTRADA DE DATOS -->

    <!-- Se define el campo de los datos de la empresa-->
    <fieldset class="box-12 data-box">
        <legend>Datos empresa</legend>

        <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL NOMBRE DE LA EMPRESA -->

        <!-- Define el nombre de la empresa -->
        <div class="form-group">
            <label for="empresa_nombre">Nombre de la Empresa:</label>
            <input type="text" id="empresa_nombre" name="empresa_nombre" required minlength="3" maxlength="100"
                pattern="^[A-Za-zÀ-ÿ0-9\s&.-]+$"
                title="Por favor, ingrese solo letras, números y caracteres como &,-."
                placeholder="Ejemplo: Mi Empresa S.A.">
        </div>

        <div class="form-group-inline">
            <div class="form-group">

                <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE SELECCIÓN DEL ÁREA DE LA EMPRESA -->
                <!-- Define el área de la empresa -->
                <label for="empresa_area">Área de la Empresa:</label>
                <select id="empresa_area" name="empresa_area" required>
                    <option value="">Seleccione un área</option>
                    <?php foreach ($areas as $area): ?>
                        <option value="<?php echo $area['id_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">

                <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE SELECCIÓN DEL PAÍS -->
                <!-- Define el país de la empresa -->
                <label for="empresa_pais">País:</label>
                <select id="empresa_pais" name="empresa_pais">
                    <option value="Chile">Chile</option>
                </select>
            </div>

            <div class="form-group">

                <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE SELECCIÓN DE LA CIUDAD -->
                <!-- Define la ciudad de la empresa -->
                <label for="empresa_ciudad">Ciudad:</label>
                <select id="empresa_ciudad" name="empresa_ciudad">
                    <option value="Santiago">Santiago</option>
                    <option value="Valparaíso">Valparaíso</option>
                    <option value="Concepción">Concepción</option>
                    <option value="La Serena">La Serena</option>
                    <option value="Antofagasta">Antofagasta</option>
                </select>
            </div>
        </div>


        <div class="form-group">

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA DIRECCIÓN DE LA EMPRESA -->

            <!-- Define el país de la empresa -->
            <label for="empresa_direccion">Dirección de la Empresa:</label>
            <input type="text" id="empresa_direccion" name="empresa_direccion"
                minlength="5" maxlength="100"
                pattern="^[A-Za-z0-9À-ÿ\s#,-.]*$"
                title="Por favor, ingrese una dirección válida. Se permiten letras, números, espacios y los caracteres #, -, , y .."
                placeholder="Ejemplo: Av. Siempre Viva 742">
        </div>

        <div class="form-group-inline">
            <div class="form-group">
                <!-- Etiqueta PARA el campo de entrada del teléfono del cliente -->
                <label for="empresa_telefono" style="margin-right: 0; height: 68%;">Teléfono:</label>
                <div style="display: flex; align-items: center;">
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
                    <!-- TÍTULO: CAMPO DE ENTRADA PARA EL TELÉFONO DE LA EMPRESA -->

                    <!-- Define el país de la empresa -->
                    <input type="text" id="empresa_telefono" name="empresa_telefono"
                        placeholder="+56 9 1234 1234"
                        maxlength="11"
                        required
                        title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)">
                </div>
            </div>
            <div class="form-group">

                <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL EMAIL DE LA EMPRESA -->

                <!-- Etiqueta "label" email -->
                <label for="empresa_email">Email de la Empresa:</label>

                <!-- TÍTULO: CAMPO DE CORREO ELECTRÓNICO PARA INGRESAR EL EMAIL DE LA EMPRESA. EL TIPO "EMAIL" VALIDA QUE EL TEXTO INGRESADO SEA UNA DIRECCIÓN DE CORREO ELECTRÓNICO -->

                <!-- Input del "label" email para la empresa Email -->
                <input type="email" id="empresa_email" name="empresa_email"
                    placeholder="ejemplo@empresa.com"
                    maxlength="255"
                    required
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    title="Ingresa un correo electrónico válido, como ejemplo@empresa.com"
                    onblur="CompletarEmail(this)">
            </div>

            <div class="form-group">

                <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA FECHA DE CREACIÓN DE LA EMPRESA -->

                <!-- Etiqueta "label" de la fecha de creación de la empresa -->
                <label for="fecha_creacion">Fecha de Creacion de empresa:</label>

                <!-- TÍTULO: CAMPO DE FECHA PARA SELECCIONAR LA FECHA DE EMISIÓN. ES OBLIGATORIO -->

                <!-- Etiqueta "label" de la fecha de emisión de la empresa -->
                <input type="date" id="fecha_creacion" name="fecha_creacion" required>
            </div>
        </div>

        <div class="form-group">

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA WEB DE LA EMPRESA -->

            <!-- Etiqueta "label" de la empresa web -->
            <label for="empresa_web">Web de la Empresa:</label>

            <!-- TÍTULO: CAMPO DE ENTRADA PARA LA URL DE LA EMPRESA -->

            <!-- Etiqueta "label" de la entrada de la url de la empresa -->
            <input type="url" id="empresa_web" name="empresa_web"
                pattern="https?://[^'\" ]+"
                title="Por favor, ingrese una URL válida que comience con http:// o https://"
                placeholder="Ejemplo: https://www.miempresa.com"
                oninput="QuitarCaracteresInvalidos(this)">
        </div>
    </fieldset>
</div>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

<!-- Llama al archivo JS -->
<script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/formulario_empresa.js"></script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'empresa') {
    $mensaje = ""; // Inicializa el mensaje

    // Obtener el tipo de firma seleccionado
    $tipo_firma = isset($_POST['opcion-firma']) ? $_POST['opcion-firma'] : null;
    //-----------------------------------------------------------------------------//

    if (isset($_POST['empresa_nombre'])) {
        // Obtener datos del formulario de empresa
        $rut_empresa = isset($_POST['empresa_rut']) ? trim($_POST['empresa_rut']) : null;
        $nombre_empresa = isset($_POST['empresa_nombre']) ? trim($_POST['empresa_nombre']) : null;
        $area_empresa = isset($_POST['empresa_area']) ? trim($_POST['empresa_area']) : null;
        $direccion_empresa = isset($_POST['empresa_direccion']) ? trim($_POST['empresa_direccion']) : null;
        $telefono_empresa = isset($_POST['empresa_telefono']) ? trim($_POST['empresa_telefono']) : null;
        $email_empresa = isset($_POST['empresa_email']) ? trim($_POST['empresa_email']) : null;
        $fecha_creacion = isset($_POST['fecha_creacion']) ? trim($_POST['fecha_creacion']) : null;
        $empresa_pais = isset($_POST['empresa_pais']) ? trim($_POST['empresa_pais']) : null;
        $empresa_ciudad = isset($_POST['empresa_ciudad']) ? trim($_POST['empresa_ciudad']) : null;
        $empresa_web = isset($_POST['empresa_web']) ? trim($_POST['empresa_web']) : null;
        $dias_validez = isset($_POST['validez_cotizacion']) ? (int)$_POST['validez_cotizacion'] : null;
        //-----------------------------------------------------------------------------//

        // Obtener el id del tipo de firma basado en la opción seleccionada
        $id_tipo_firma = null;
        switch ($tipo_firma) {
            case 'automatic':
                $id_tipo_firma = 1; // Asigna el ID correspondiente a la firma automática
                break;
            case 'manual':
                $id_tipo_firma = 2; // Asigna el ID correspondiente a la firma manual
                break;
            case 'image':
                $id_tipo_firma = 3; // Asigna el ID correspondiente a la firma por imagen
                break;
            case 'digital':
                $id_tipo_firma = 4; // Asigna el ID correspondiente a la firma digital
                break;
            default:
                $mensaje = "Por favor seleccione un tipo de firma.";
                break;
        }
        //-----------------------------------------------------------------------------//

        // Verificar que la fecha está bien formada antes de intentar insertarla
        if ($fecha_creacion && preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha_creacion)) {
            // Inserta la empresa incluyendo el id del tipo de firma y nuevos campos
            $sql_empresa = "INSERT INTO E_Empresa (id_foto, rut_empresa, nombre_empresa, id_area_empresa, direccion_empresa, telefono_empresa, email_empresa, fecha_creacion, pais_empresa, ciudad_empresa, web_empresa, dias_validez, id_tipo_firma)
                            VALUES ('$id_foto', '$rut_empresa', '$nombre_empresa', '$area_empresa', '$direccion_empresa', '$telefono_empresa', '$email_empresa', '$fecha_creacion', '$empresa_pais', '$empresa_ciudad', '$empresa_web', $dias_validez, $id_tipo_firma)";

            if ($mysqli->query($sql_empresa) === TRUE) {
                // Obtener el ID de la empresa recién insertada
                $id_empresa = $mysqli->insert_id;

                // Ahora, procesar la cotización si se han proporcionado los datos
                if (isset($_POST['numero_cotizacion']) && isset($_POST['validez_cotizacion'])) {
                    $numero_cotizacion = $_POST['numero_cotizacion'];
                    $validez_cotizacion = (int)$_POST['validez_cotizacion'];

                    // Insertar la cotización
                    $sql_cotizacion = "INSERT INTO c_cotizaciones (numero_cotizacion, fecha_emision, fecha_validez, id_empresa)
                                       VALUES ('$numero_cotizacion', CURDATE(), DATE_ADD(CURDATE(), INTERVAL $validez_cotizacion DAY), $id_empresa)";

                    if ($mysqli->query($sql_cotizacion) === TRUE) {
                        $mensaje = "Empresa creada correctamente, se redirige al home.";
                    } else {
                        $mensaje = "Error al insertar la cotización: " . $mysqli->error;
                    }
                } else {
                    $mensaje = "Empresa creada correctamente, pero no se proporcionó la cotización.";
                }
            } else {
                $mensaje = "Error al insertar la empresa: " . $mysqli->error;
            }
        } else {
            $mensaje = "Error: Fecha de creación no válida o no se recibió correctamente.";
        }
    } else {
        $mensaje = "Error: No se envió el nombre de la empresa.";
    }
    //-----------------------------------------------------------------------------//

    // Mostrar el mensaje y redirigir
    echo "<script>
            alert('$mensaje');
            window.location.href='../../programa_cotizacion.php';
          </script>";
}
?>



<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Formulario Empresa .PHP ----------------------------------------
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