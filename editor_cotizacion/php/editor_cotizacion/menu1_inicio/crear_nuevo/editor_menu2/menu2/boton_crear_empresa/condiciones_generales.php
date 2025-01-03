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
    ------------------------------------- INICIO ITred Spa Condiciones Generales.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/condiciones_generales.css"> <!-- Enlaza una hoja de estilo externa que se encuentra en la ruta especificada para estilizar el contenido de la página -->

<!-- TÍTULO: SECCIÓN DE CONDICIONES GENERALES -->
    <!-- Conidiciones generales -->
    <h2>Condiciones Generales</h2>

<!-- TÍTULO: CONTENEDOR DINÁMICO DE CONDICIONES -->

    <div id="contenedor-condiciones">
        <!-- Aquí se agregarán dinámicamente las filas de condiciones -->
    </div>

<!-- TÍTULO: BOTONES DE ACCIONES PARA AGREGAR Y ELIMINAR CONDICIONES -->

    <div style="margin-top: 10px;">

        <!-- TÍTULO: BOTÓN PARA AGREGAR NUEVA CONDICIÓN -->
            <!-- Botón para agregar nueva condición -->
            <button id="boton-agregar-condicion" type="button">Agregar nueva condición</button>

        <!-- TÍTULO: BOTÓN PARA ELIMINAR LA ÚLTIMA CONDICIÓN -->
            <!-- Botón para eliminar condición -->
            <button id="boton-eliminar-condicion" type="button">Eliminar última condición</button>
    </div>

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/condiciones_generales.js"></script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'empresa') {

    // Se verifica si el formulario ha sido enviado

    // Se obtiene el string de condiciones del formulario
    $condicionesString = $_POST['condiciones']; 
    
    // Se divide el string en un array utilizando el delimitador '|'
    $condicionesArray = explode('|', $condicionesString); 
    if (!empty($condicionesArray)) {
        // Preparar la consulta para insertar las condiciones en la base de datos
        $stmt = $mysqli->prepare("INSERT INTO Em_Condiciones_Generales (id_empresa, descripcion_condiciones) VALUES (?, ?)");

        if (!$stmt) {
            // Manejo de errores al preparar la consulta
            die("Error al preparar la consulta: " . $mysqli->error);
        }

        foreach ($condicionesArray as $condicion) {
            // Vincula los parámetros de la consulta y ejecuta la inserción
            $stmt->bind_param("is", $id_empresa, $condicion);
            if (!$stmt->execute()) {
                // Manejo de errores al insertar condición
                echo "Error al insertar condición: " . $stmt->error;
            }
        }
        $stmt->close(); // Cierra la declaración preparada
    } else {
        // Mensaje si no hay condiciones para insertar
        echo "No hay condiciones para insertar.";
    }
}
?>


<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Condiciones Generales .PHP ----------------------------------------
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