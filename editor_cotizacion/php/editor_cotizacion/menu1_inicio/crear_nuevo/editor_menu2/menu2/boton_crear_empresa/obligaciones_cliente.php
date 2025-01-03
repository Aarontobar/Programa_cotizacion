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

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/obligaciones_clientes.css"> 

<!-- TÍTULO DE LA SECCIÓN DE OBLIGACIONES DEL CLIENTE -->
    <!-- Tag de la sección de obligaciones del cliente -->
    <h2>Obligaciones cliente</h2> 

<!-- TÍTULO: CONTENEDOR DONDE SE AGREGARÁN DINÁMICAMENTE LAS FILAS DE CONDICIONES -->

    <!-- Contenedor donde se agregarán dinámicamente las filas de condiciones -->
    <div id="obligaciones-contenedor">
    
        <!-- TÍTULO: AQUÍ SE AGREGARÁN DINÁMICAMENTE LAS FILAS DE CONDICIONES -->

            <!-- Aquí se agregarán dinámicamente las filas de condiciones -->
    </div>

     
<!-- TÍTULO: CONTENEDOR PARA LOS BOTONES DE AGREGAR Y ELIMINAR OBLIGACIONES -->

    <!-- Contenedor para los botones de agregar y eliminar obligaciones -->

    <div STYLE="margin-top: 10px;">

        <!-- TÍTULO: BOTÓN PARA AGREGAR UNA NUEVA OBLIGACIÓN -->

            <!-- Botón para agregar una nueva obligación -->
            <button id="boton-agregar-obligacion" type="button">Agregar nueva obligacion</button>

        <!-- TÍTULO: BOTÓN PARA ELIMINAR LA ÚLTIMA OBLIGACIÓN. ESTE BOTÓN ESTÁ OCULTO POR DEFECTO -->

            <!-- Botón para eliminar la última obligación. Este botón está oculto por defecto -->
            <button id="boton-eliminar-obligacion" type="button" style="display: none;">Eliminar última obligacion</button>

    </div>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/obligaciones_cliente.js"></script>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'empresa') {
    $obligacionesString = $_POST['obligaciones'];
    
    $obligacionesArray = explode('|', $obligacionesString);
    if (!empty($obligacionesArray)) {
        $stmt = $mysqli->prepare("INSERT INTO Em_obligaciones_cliente (indice, descripcion, id_empresa) VALUES (?, ?, ?)");

        if (!$stmt) {
            die("Error al preparar la consulta: " . $mysqli->error);
        }

        foreach ($obligacionesArray as $index => $obligacion) {
            $indice = $index + 1;
            $stmt->bind_param("isi", $indice, $obligacion, $id_empresa);
            if (!$stmt->execute()) {
                echo "Error al insertar obligación: " . $stmt->error;
            }
        }
        $stmt->close();
    } else {
        echo "No hay obligaciones para insertar.";
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
