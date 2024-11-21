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

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/menu_2_programas/boton5_ver_cotizacion/cuadro_rojo_cotizacion.css">

<!-- TÍTULO: EJECUCIÓN DE FUNCIÓN AL CARGAR PÁGINA -->
    <!-- Función de carga fecha validez -->
    <body onload="calcularFechaValidez();"> 
    
<!-- TÍTULO: SECCIÓN DE DATOS DE COTIZACIÓN -->

    <!-- Campos de datos de cotización -->

    <fieldset class="box-6 cuadro-datos cuadro-datos-rojo"> 

    <!-- TÍTULO: TÍTULO DEL CAMPO DE DATOS -->

        <!-- Detalles de cotización del campo -->
        <legend>Detalle Cotización</legend> 

    <!-- TÍTULO: ETIQUETA PARA EL CAMPO RUT DE LA EMPRESA -->
        <!-- Etiqueta del RUT -->
        <label for="empresa_rut">RUT de la Empresa:</label>

    <!-- TÍTULO: CAMPO DE ENTRADA PARA EL RUT DE LA EMPRESA -->

        <!-- Campo de texto para ingresar el RUT de la empresa. El atributo "required" hace que el campo sea obligatorio -->
        <input type="text" id="empresa_rut" name="empresa_rut" 
        minlength="7" maxlength="12" 
        title="El RUT debe contener entre 7 y 12 caracteres numéricos o 'K'." 
        required oninput="FormatearRut(this)" 
        value="<?php echo htmlspecialchars($items['EmpresaRUT']); ?>">
        
    <!-- TÍTULO: ETIQUETA PARA EL CAMPO NÚMERO DE COTIZACIÓN -->
        <!-- Etiqueta del N° de Cotización -->
        <label for="numero_cotizacion">Número de Cotización:</label> 

    <!-- TÍTULO: CAMPO DE ENTRADA PARA EL NÚMERO DE COTIZACIÓN -->

        <!-- Campo de texto para ingresar el número de cotización. También es obligatorio -->
        <input type="number" id="numero-cotizacion" name="numero_cotizacion" required min="1" placeholder="30" value="<?php echo htmlspecialchars($numero_cotizacion); ?>"> 

    <!-- TÍTULO: ETIQUETA PARA EL CAMPO DÍAS DE VALIDEZ -->
        <!-- Etiqueta para el campo de días de Validez -->
        <label for="dias_validez">Días de Validez:</label> 

    <!-- TÍTULO: CAMPO DE ENTRADA PARA DÍAS DE VALIDEZ -->

    <!-- Campo para ingresar los días de validez de la cotización. Solo lectura -->
        <input type="number" id="dias_validez" name="dias_validez" required min="1" placeholder="30" value="<?php echo htmlspecialchars($dias_validez); ?>" readonly> 

    <!-- TÍTULO: ETIQUETA PARA EL CAMPO FECHA DE VALIDEZ -->
        <!-- Etiqueta de la Fecha de Validez -->
        <label for="fecha_validez">Fecha de Validez:</label>

    <!-- TÍTULO: CAMPO DE SELECCIÓN DE FECHA DE VALIDEZ -->

    <!-- Campo para seleccionar la fecha de validez de la cotización. Solo lectura -->
        <input type="date" id="fecha_validez" name="fecha_validez" readonly> 

    </fieldset>   
</body>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="../../js/menu_principal/crear_nuevo/ver_cotizacion/cuadro_rojo_cotizacion.js"></script> 

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
