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
    ------------------------------------- INICIO ITred Spa empresa proveedor.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- INICIO HTML -->
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Formulario Para Agregar Empresa Proveedor</title> 

    <!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="../../../css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton4_crear_proveedor/empresa_proveedor.css"> 
</head> 

<!-- Crea una fila para organizar los elementos en una disposición horizontal -->
<div class="row"> 

    <!-- TÍTULO: CREA UNA CAJA PARA INGRESAR DATOS, OCUPANDO LAS 12 COLUMNAS DISPONIBLES EN EL DISEÑO. ESTA CAJA CONTIENE VARIOS CAMPOS DE ENTRADA DE DATOS -->
    <fieldset class="box-12 data-box">
        <legend>Datos de la Empresa del Proveedor</legend>

        <div class="form-group-inline">
            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL NOMBRE DE LA EMPRESA -->
            <div class="form-group">
                <label for="empresa_proveedor">Empresa del proveedor:</label>
                <input type="text" id="empresa_proveedor" name="empresa_proveedor" required>
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL RUT DE LA EMPRESA -->
            <div class="form-group">
                <label for="rut_empresa_proveedor">RUT de la empresa:</label>
                <input type="text" id="rut_empresa_proveedor" name="rut_empresa_proveedor" required>
            </div>
        </div>

        <div class="form-group-inline">
            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA DIRECCIÓN DE LA EMPRESA -->
            <div class="form-group">
                <label for="direccion_empresa_proveedor">Dirección de la empresa:</label>
                <input type="text" id="direccion_empresa_proveedor" name="direccion_empresa_proveedor" required>
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL TELÉFONO DE LA EMPRESA -->
            <div class="form-group">
                <label for="telefono_empresa_proveedor">Teléfono de la empresa:</label>
                <input type="text" id="telefono_empresa_proveedor" name="telefono_empresa_proveedor" required>
            </div>
        </div>

        <div class="form-group-inline">
            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL EMAIL DE LA EMPRESA -->
            <div class="form-group">
                <label for="email_empresa_proveedor">Email de la empresa:</label>
                <input type="email" id="email_empresa_proveedor" name="email_empresa_proveedor" required>
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA COMUNA DE LA EMPRESA -->
            <div class="form-group">
                <label for="comuna_empresa_proveedor">Comuna de la empresa:</label>
                <input type="text" id="comuna_empresa_proveedor" name="comuna_empresa_proveedor" required>
            </div>

            <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA CIUDAD DE LA EMPRESA -->
            <div class="form-group">
                <label for="ciudad_empresa_proveedor">Ciudad de la empresa:</label>
                <input type="text" id="ciudad_empresa_proveedor" name="ciudad_empresa_proveedor" required>
            </div>
        </div>

        <!-- TÍTULO: ETIQUETA PARA EL CAMPO DE SELECCIÓN DEL GIRO DE LA EMPRESA -->
        <div class="form-group">
            <label for="giro_proveedor">Giro de la empresa:</label>
            <select id="giro_proveedor" name="giro_proveedor" required>
                <!-- Añadir opción vacía para evitar selección vacía -->
                <option value="">Seleccione...</option> 
                <option value="comercial">Comercial</option>
                <option value="industrial">Industrial</option>
                <option value="servicios">Servicios</option>
                <option value="construccion">Construcción</option>
                <option value="agropecuario">Agropecuario</option>
                <option value="tecnologia">Tecnología</option>
                <option value="transporte">Transporte</option>
                <option value="turismo">Turismo</option>
                <option value="educacion">Educación</option>
                <option value="financiero">Financiero</option>
            </select>
        </div>
    </fieldset> 
</div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
<!-- llama al archivo JS -->
<script src="../../js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton4_crear_proveedor/empresa_proveedor.js"></script> 

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa empresa proveedor .PHP ----------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->