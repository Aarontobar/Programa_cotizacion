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
<link rel="stylesheet" href="../../../../../css/menu_principal/crear_nuevo/menu_2_programas/boton1_nueva_cotizacion/detalle_vendedor.css">

<fieldset class="row"> <!-- Crea una fila para organizar los elementos en una disposición horizontal -->
    <legend>Datos vendedor</legend>
    <div class="box-6 cuadro-datos"> <!-- Crea una caja para ingresar datos, ocupando 6 de las 12 columnas disponibles en el diseño -->
        <div class="form-group-inline">
            <div class="form-group">

            <!-- TÍTULO: CAMPO PARA EL RUT DEL VENDEDOR -->

                <!-- Etiqueta para el campo de entrada del RUT del cliente -->
                <label for="vendedor_rut">RUT: </label> 

                

            <!-- TÍTULO: CAMPO PARA INGRESAR EL RUT DEL VENDEDOR -->

                <!-- datos de rut vendedor -->
                <input type="text" id="vendedor_rut" name="vendedor_rut" 
                    minlength="7" maxlength="12" 
                    placeholder="Ej: 12.345.678-9"
                    oninput="FormatearRut(this)"
                    oninput="QuitarCaracteresInvalidos(this)"
                    required> <!-- Campo de texto para ingresar el RUT del cliente. También es obligatorio -->

            </div>
            <div class="form-group">

            <!-- TÍTULO: CAMPO PARA EL NOMBRE DEL VENDEDOR -->

                <!-- Etiqueta para el campo de entrada del nombre del vendedor -->
                <label for="vendedor_nombre">Nombre:</label> 

            <!-- TÍTULO: CAMPO PARA INGRESAR EL NOMBRE DEL VENDEDOR -->

                <input type="text" id="vendedor_nombre" name="vendedor_nombre" 
                    placeholder="Ej: María López" 
                    required 
                    minlength="3" 
                    maxlength="50" 
                    pattern="^[a-zA-ZÀ-ÿ\s]+$" 
                    oninput="QuitarCaracteresInvalidos(this)"
                    title="Ingresa un nombre válido (Ej: María López). Solo se permiten letras y espacios."> <!-- Campo de texto para ingresar el nombre del vendedor. El atributo "required" hace que el campo sea obligatorio -->    

            </div>
        </div>
        
        <div class="form-group">

        <!-- TÍTULO: CAMPO PARA EL EMAIL DEL VENDEDOR -->

            <!-- Etiqueta para el campo de entrada del email del vendedor -->
            <label for="vendedor_email">Email:</label> 

        <!-- TÍTULO: CAMPO PARA INGRESAR EL EMAIL DEL VENDEDOR -->

            <!-- datos email vendedor -->
            <input type="email" id="vendedor_email" name="vendedor_email"
                placeholder="ejemplo@gmail.com" 
                maxlength="255" 
                required 
                title="Ingresa un correo electrónico válido, como ejemplo@empresa.com" 
                oninput="QuitarCaracteresInvalidos(this)"
                onblur="CompletarEmail(this)"> <!-- Campo de correo electrónico para ingresar el email del vendedor. El tipo "email" valida que el texto ingresado sea una dirección de correo electrónico. También es obligatorio -->


        </div>
    </div>
    <div class="box-6 cuadro-datos cuadro-datos-left"> <!-- Crea otra caja para ingresar datos, ocupando las otras 6 columnas. Se aplica una clase adicional "cuadro-datos-left" para estilo -->
        <div class="form-group" style="display: flex; align-items: center;">
            <!-- Etiqueta PARA el campo de entrada del teléfono del cliente -->
            <label for="vendedor_telefono" style="margin-right: 0; height: 68%;">Teléfono:</label> 

            <!-- Select para el código de país -->
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
        <!-- TÍTULO: CAMPO PARA INGRESAR EL TELÉFONO DEL VENDEDOR -->

            <!-- datos telefono vendedor -->
            <input type="text" id="vendedor_telefono" name="vendedor_telefono"
                placeholder="+56 9 1234 1234" 
                maxlength="16" 
                required 
                title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"> <!-- Campo de texto para ingresar el teléfono del vendedor -->
        </div>

        <div class="form-group" style="display: flex; align-items: center;">
            <!-- Etiqueta PARA el campo de entrada del teléfono del cliente -->
            <label for="vendedor_telefono" style="margin-right: 0; height: 68%;">Celular:</label> 

            <!-- Select para el código de país -->
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

        <!-- TÍTULO: CAMPO PARA INGRESAR EL CELULAR DEL VENDEDOR -->

            <!-- datos celular vendedor -->
            <input type="text" id="vendedor_celular" name="vendedor_celular"
                placeholder="+56 9 1234 1234" 
                maxlength="16" 
                required 
                title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"> <!-- Campo de texto para ingresar el número de celular del vendedor -->
        </div>
    </div>
<!-- Cierra la fila -->
</fieldset> 

<script src="../../../../../js/menu_principal/crear_nuevo/menu_2_programas/boton1_nueva_cotizacion/detalle_vendedor.js"></script> 

<?php
// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
