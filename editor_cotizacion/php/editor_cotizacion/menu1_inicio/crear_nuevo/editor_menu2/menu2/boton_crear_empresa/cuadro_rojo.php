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
    ------------------------------------- INICIO ITred Spa Cuadro Rojo.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/cuadro_rojo.css">


<!-- TÍTULO: CAJA DE DATOS DE COTIZACIÓN -->
    
    <!-- Caja de Formulario -->
    <div class="box-6 data-box data-box-red"> 

        <!-- TÍTULO: RUT DE LA EMPRESA -->

            <!-- Etiqueta para el campo de entrada del RUT de la empresa -->
            <label for="empresa_rut">RUT de la Empresa:</label> 
            <!-- Campo de texto para ingresar el RUT de la empresa. El atributo "required" hace que el campo sea obligatorio -->
            <input type="text" id="empresa_rut" name="empresa_rut" placeholder="Ej: 12.345.678-9" required oninput="formatoRut(this)"> 
        
        <!-- TÍTULO: NÚMERO DE COTIZACIÓN -->

            <!-- Etiqueta para el campo de entrada del número de cotización -->
            <label for="numero_cotizacion">Número de Cotización:</label> 
            <!-- Campo de texto para ingresar el número de cotización. También es obligatorio -->
            <input type="number" id="numero_cotizacion" name="numero_cotizacion" min="1" required placeholder="30"> 
        
        <!-- TÍTULO: VALIDEZ DE LA COTIZACIÓN -->

            <!-- Etiqueta para el campo de entrada de la validez de la cotización -->
            <label for="validez_cotizacion">Validez de la Cotización:</label> 
            <!-- Campo de número para ingresar la validez de la cotización en días. El atributo "required" asegura que no se deje vacío -->
            <input type="number" id="validez_cotizacion" name="validez_cotizacion" required min="1" placeholder="30"> 
    </div>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/cuadro_rojo.js"></script> 

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Cuadro Rojo .PHP ----------------------------------------
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
