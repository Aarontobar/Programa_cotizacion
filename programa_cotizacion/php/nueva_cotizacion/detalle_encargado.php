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
<link rel="stylesheet" href="../../css/nueva_cotizacion/detalle_encargado.css">

<!-- Crea una fila para organizar los elementos en una disposición horizontal -->
<fieldset class="row"> 
    <legend>Datos encargado</legend>

    <!-- Crea una caja para ingresar datos, ocupando 6 de las 12 columnas disponibles en el diseño -->
    <div class="box-6 cuadro-datos"> 
        <div class="form-group-inline">
            <div class="form-group">

            <!-- TÍTULO: CAMPO PARA EL RUT DEL ENCARGADO -->

                <!-- Etiqueta para el campo de entrada del RUT del cliente -->
                <label for="encargado_rut">RUT: </label> 

            <!-- TÍTULO: CAMPO PARA INGRESAR EL RUT DEL ENCARGADO -->

                <!-- datos del encargado -->
                <input type="text" id="encargado-rut" name="encargado_rut" 
                    minlength="7" maxlength="12" 
                    placeholder="Ej: 12.345.678-9"
                    oninput="FormatearRut(this)"
                    oninput="QuitarCaracteresInvalidos(this)"
                    required> 
                    <!-- Campo de texto para ingresar el RUT del cliente. También es obligatorio -->


                
            </div>
            <div class="form-group">
            <!-- TÍTULO: CAMPO PARA EL NOMBRE DEL ENCARGADO -->

                <!-- Etiqueta para el campo de entrada del nombre del encargado -->
                <label for="enc_nombre">Nombre:</label>

            <!-- TÍTULO: CAMPO PARA INGRESAR EL NOMBRE DEL ENCARGADO -->

                <!-- datos de encargado -->
                <input type="text" id="enc-nombre" name="enc_nombre" 
                    placeholder="Ej: Juan Pérez" 
                    required 
                    minlength="3" 
                    maxlength="50" 
                    pattern="^[a-zA-ZÀ-ÿ\s]+$" 
                    oninput="QuitarCaracteresInvalidos(this)"
                    title="Ingresa un nombre válido (Ej: Juan Pérez). Solo se permiten letras y espacios."> 
                    <!-- Campo de texto para ingresar el nombre del encargado. Este campo no es obligatorio -->

    
            </div>
        </div>
    
        <div class="form-group">

        <!-- TÍTULO: CAMPO PARA EL EMAIL DEL ENCARGADO -->

            <!-- Etiqueta para el campo de entrada del email del encargado -->
            <label for="enc_email">Email:</label> 

        <!-- TÍTULO: CAMPO PARA INGRESAR EL EMAIL DEL ENCARGADO -->

            <!-- datos de email -->
            <input type="email" id="enc-email" name="enc_email"
                placeholder="ejemplo@gmail.com" 
                maxlength="255" 
                required 
                title="Ingresa un correo electrónico válido, como ejemplo@empresa.com" 
                oninput="QuitarCaracteresInvalidos(this)"
                onblur="CompletarEmail(this)"> <!-- Campo de correo electrónico para ingresar el email del encargado. El tipo "email" valida que el texto ingresado sea una dirección de correo electrónico -->
  

        </div>
        <div class="form-group">

        <!-- TÍTULO: CAMPO PARA EL TELÉFONO DEL ENCARGADO -->

            <!-- Etiqueta para el campo de entrada del teléfono del encargado -->
            <label for="enc_fono">Teléfono:</label>

            <!-- Imagen de la bandera -->
            <img id="flag_encargado" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Flag_of_None.svg/32px-Flag_of_None.svg.png" 
                alt="Bandera" style="display: none; margin-right: 10px;" width="32" height="20">



        <!-- TÍTULO: CAMPO PARA INGRESAR EL TELÉFONO DEL ENCARGADO -->

            <!-- datos del telefono -->
            <input type="text" id="enc-fono" name="enc_fono" 
                placeholder="+56 9 1234 1234" 
                maxlength="16" 
                required 
                title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"
                oninput="asegurarMasYDetectarPais(this)"> <!-- Campo de texto para ingresar el teléfono del encargado -->


        </div>

    </div>

    <!-- Crea otra caja para ingresar datos, ocupando las otras 6 columnas. Se aplica una clase adicional "cuadro-datos-left" para estilo -->
    <div class="box-6 cuadro-datos cuadro-datos-left"> 
        <div class="form-group" style="display: flex; align-items: center;">
                <!-- Etiqueta PARA el campo de entrada del teléfono del cliente -->
                <label for="enc_celular" style="margin-right: 0; height: 68%;">Teléfono:</label> 

                <!-- Select para el código de país -->
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
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
            <!-- TÍTULO: CAMPO PARA INGRESAR EL CELULAR DEL ENCARGADO -->

                <!-- datos del celulcar encargado -->
                <input type="text" id="enc_celular" name="enc_celular"
                    placeholder="+56 9 1234 1234" 
                    maxlength="15" 
                    required 
                    title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"> <!-- Campo de texto para ingresar el número de celular del encargado -->
            </div>

        <div class="form-group">
        <!-- TÍTULO: CAMPO PARA EL PROYECTO ASIGNADO AL ENCARGADO -->

            <!-- Etiqueta para el campo de entrada del proyecto asignado al encargado -->
            <label for="enc_proyecto">Proyecto Asignado:</label> 

        <!-- TÍTULO: CAMPO PARA INGRESAR EL PROYECTO ASIGNADO AL ENCARGADO -->

            <!-- datos proyecto -->
            <input type="text" id="enc-proyecto" name="enc_proyecto" 
                placeholder="Ej: Proyecto XYZ" 
                minlength="3" 
                maxlength="100" 
                pattern="^[a-zA-ZÀ-ÿ0-9\s\-]+$" 
                oninput="QuitarCaracteresInvalidos(this)"
                title="Ingresa un nombre de proyecto válido (Ej: Proyecto XYZ). Solo se permiten letras, números, espacios y guiones."> <!-- Campo de texto para ingresar el nombre del proyecto asignado al encargado. No es obligatorio -->


        </div>
    </div>

<!-- Cierra la fila -->

</fieldset> 

<script src="../../js/nueva_cotizacion/detalle_encargado.js"></script> 

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        $sql = "INSERT INTO C_Encargados (rut_encargado, nombre_encargado, email_encargado, fono_encargado, celular_encargado)
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    nombre_encargado = VALUES(nombre_encargado), 
                    email_encargado = VALUES(email_encargado), 
                    fono_encargado = VALUES(fono_encargado), 
                    celular_encargado = VALUES(celular_encargado)";
        $stmt = $mysqli->prepare($sql);
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }
        $stmt->bind_param("sssss", 
            $enc_rut, 
            $enc_nombre, 
            $enc_email, 
            $enc_fono, 
            $enc_celular
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
