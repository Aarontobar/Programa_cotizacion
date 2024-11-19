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
    
<!-- TITULO IMPORT ARCHIVO CSS -->

    <!-- Enlaza el archivo CSS para estilizar el cuadro de cotización -->
    <link rel="stylesheet" href="../../../../../css/menu_principal/crear_nuevo/menu_2_programas/boton1_nueva_cotizacion/cuadro_rojo_cotizacion.css">

<!-- Ejecuta la función calcularFechaValidez al cargar la página -->
<body onload="calcularFechaValidez();"> 



<!-- TÍTULO: CAJA PARA INGRESAR DATOS -->

<!-- Crea una caja para ingresar datos, ocupando otras 6 columnas. Se aplica una clase adicional para estilo -->

<fieldset class="box-6 cuadro-datos cuadro-datos-rojo"> 

<!-- TÍTULO: ENCABEZADO DE DETALLE DE COTIZACIÓN -->

    <legend>Detalle Cotización</legend> <!-- TÍTULO DEL CAMPO DE DATOS -->

<!-- TÍTULO: CAMPO PARA EL RUT DE LA EMPRESA -->

    <!-- Etiqueta para el campo de entrada del RUT de la empresa -->
    <label for="empresa_rut">RUT de la Empresa:</label> 


<!-- TÍTULO: CAMPO PARA INGRESAR EL RUT DE LA EMPRESA -->

    <!-- Campo de texto para ingresar el RUT de la empresa. El atributo "required" hace que el campo sea obligatorio -->
    <input type="text" id="empresa_rut" name="empresa_rut" 
    minlength="7" maxlength="12" 
    title="El RUT debe contener entre 7 y 12 caracteres numéricos o 'K'." 
    required oninput="FormatearRut(this)" 
    value="<?php echo htmlspecialchars($row['EmpresaRUT']); ?>"> 

<!-- TÍTULO: CAMPO PARA EL NÚMERO DE COTIZACIÓN -->

    <!-- Etiqueta para el campo de entrada del número de cotización -->
    <label for="numero_cotizacion">Número de Cotización:</label> 

<!-- TÍTULO: CAMPO PARA INGRESAR EL NÚMERO DE COTIZACIÓN -->

    <!-- Campo de texto para ingresar el número de cotización. También es obligatorio -->

    <input type="number" id="numero-cotizacion" name="numero_cotizacion" required min="1" placeholder="30" value="<?php echo htmlspecialchars($numero_cotizacion); ?>"> 
    

<!-- TÍTULO: CAMPO PARA LOS DÍAS DE VALIDEZ -->

    <!-- Etiqueta para el campo de entrada de la validez de la cotización -->

    <label for="dias_validez">Días de Validez:</label> 

<!-- TÍTULO: CAMPO PARA INGRESAR DÍAS DE VALIDEZ -->

    <!-- Campo para ingresar los días de validez de la cotización. Solo lectura -->

    <input type="number" id="dias_validez" name="dias_validez" required min="1" placeholder="30" value="<?php echo htmlspecialchars($dias_validez); ?>" readonly> 

<!-- TÍTULO: CAMPO PARA LA FECHA DE VALIDEZ -->

    <!-- Etiqueta para el campo de entrada de la fecha de validez -->

    <label for="fecha_validez">Fecha de Validez:</label> 

<!-- TÍTULO: CAMPO PARA SELECCIONAR LA FECHA DE VALIDEZ -->

    <!-- Campo para seleccionar la fecha de validez de la cotización. Solo lectura -->

    <input type="date" id="fecha_validez" name="fecha_validez" readonly> 


</fieldset>   
</body>

 <!-- TÍTULO: AQUÍ SE CARGA EL JS DEL ARCHIVO -->

    <!-- llama al archivo JS -->
    <script src="../../../../../js/menu_principal/crear_nuevo/menu_2_programas/boton1_nueva_cotizacion/cuadro_rojo_cotizacion.js"></script> 


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
