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
    ------------------------------------- INICIO ITred Spa formulario proveedor.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- INICIO HTML -->

<head> 
    <!-- Define la codificación de caracteres como UTF-8 para asegurar la correcta visualización de caracteres especiales y diversos idiomas -->
    <meta charset="UTF-8"> 

    <!-- Configura la vista en dispositivos móviles. width=device-width asegura que el ancho de la página se ajuste al ancho de la pantalla del dispositivo, y initial-scale=1.0 establece el nivel de zoom inicial -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <!-- Define el título de la página que se muestra en la pestaña del navegador -->
    <title>Formulario Para Agregar Proveedor</title> 

    <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="../../../../css/menu_principal/crear_nuevo/crear_proveedor/formulario_proveedor.css"> 
</head> 

<!-- Crea una fila para organizar los elementos en una disposición horizontal -->
<div class="row"> 

    <!-- TÍTULO: CREA UNA CAJA PARA INGRESAR DATOS, OCUPANDO LAS 12 COLUMNAS DISPONIBLES EN EL DISEÑO. ESTA CAJA CONTIENE VARIOS CAMPOS DE ENTRADA DE DATOS -->
    <fieldset class="box-12 data-box">
        <legend>Datos del Proveedor</legend>

        <div class="form-group-inline">
            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL NOMBRE DEL PROVEEDOR -->
            <div class="form-group">
                <label for="nombre_proveedor">Nombre del Proveedor:</label>
                <input type="text" id="nombre_proveedor" name="nombre_proveedor" required minlength="3" maxlength="100" 
                    pattern="^[A-Za-zÀ-ÿ0-9\s&.-]+$" 
                    title="Por favor, ingrese solo letras, números y caracteres como &,-."
                    placeholder="Ejemplo: Proveedor S.A.">
                <span id="nombre_error" style="color: red; display: none;">El nombre debe comenzar con una mayúscula y solo puede contener letras y espacios.</span>
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL RUT DEL PROVEEDOR -->
            <div class="form-group">
                <label for="rut_proveedor">RUT del Proveedor:</label>
                <input type="text" id="rut_proveedor" name="rut_proveedor" required>
                <span id="rut_error" style="color: red; display: none;">El RUT debe tener hasta 9 números y terminar con un número o la letra 'K'.</span>
            </div>
        </div>

        <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL TELÉFONO DEL PROVEEDOR -->
        <div class="form-group-inline">
            <div class="form-group">
                <label for="telefono_proveedor">Teléfono del Proveedor:</label>
                <input type="tel" id="telefono_proveedor" name="telefono_proveedor" required>
                <span id="telefono_error" style="color: red; display: none;">El teléfono debe contener solo 9 números y no puede incluir letras ni caracteres especiales.</span>
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL EMAIL DEL PROVEEDOR -->
            <div class="form-group">
                <label for="email_proveedor">Email del Proveedor:</label>
                <input type="email" id="email_proveedor" name="email_proveedor" required
                    placeholder="ejemplo@proveedor.com" 
                    maxlength="255" 
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                    title="Ingresa un correo electrónico válido, como ejemplo@proveedor.com">
                <span id="email_error" style="color: red; display: none;">Correo electrónico inválido. Debe contener un '@' y terminar en .cl, .com, u otra extensión válida.</span>
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA DIRECCIÓN DEL PROVEEDOR -->
            <div class="form-group">
                <label for="direccion_proveedor">Dirección del Proveedor:</label>
                <input type="text" id="direccion_proveedor" name="direccion_proveedor" required
                    minlength="5" maxlength="100" 
                    pattern="^[A-Za-z0-9À-ÿ\s#,-.]*$" 
                    title="Por favor, ingrese una dirección válida. Se permiten letras, números, espacios y los caracteres #, -, , y .."
                    placeholder="Ejemplo: Av. Siempre Viva 742">
            </div>
        </div>

        <div class="form-group-inline">
            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL CARGO DEL PROVEEDOR -->
            <div class="form-group">
                <label for="cargo_proveedor">Cargo del Proveedor:</label>
                <input type="text" id="cargo_proveedor" name="cargo_proveedor">
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA COMUNA DEL PROVEEDOR -->
            <div class="form-group">
                <label for="comuna_proveedor">Comuna del Proveedor:</label>
                <input type="text" id="comuna_proveedor" name="comuna_proveedor">
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA CIUDAD DEL PROVEEDOR -->
            <div class="form-group">
                <label for="ciudad_proveedor">Ciudad del Proveedor:</label>
                <input type="text" id="ciudad_proveedor" name="ciudad_proveedor">
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE SELECCIÓN DEL TIPO DE PROVEEDOR -->
            <div class="form-group">
                <label for="tipo_proveedor">Tipo de Proveedor:</label>
                <select id="tipo_proveedor" name="tipo_proveedor">
                    <option value="local">Local</option>
                    <option value="internacional">Internacional</option>
                </select>
            </div>
        </div>
    </fieldset> 
</div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
<!-- llama al archivo JS -->
<script src="../../../../js/menu_principal/crear_nuevo/crear_proveedor/formulario_proveedor.js"></script> 

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa formulario proveedor .PHP ----------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->