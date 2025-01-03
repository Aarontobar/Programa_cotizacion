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
    ------------------------------------- INICIO ITred Spa pago.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: ARCHIVO CSS -->

    <!-- llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/pago.css">
    
<!-- TÍTULO: SECCIÓN DE INFORMACIÓN DE PAGO -->

<fieldset id="payment-section">
    <legend>Información de pago</legend>

<!-- TÍTULO: BOTÓN PARA AGREGAR PAGO -->

    <button type="button" onclick="AgregarPago()">Agregar Pago</button>

<!-- TÍTULO: TABLA DE PAGOS -->

    <!-- Inicialmente oculto -->
    <table id="payment-table" style="display: none;">
        <thead>
            <tr>
                <th>N° Pago</th>
                <th>Descripción de Pago</th>
                <th>Forma de Pago</th>
                <th>% De Pago</th>
                <th>Monto de Pago</th>
                <th>Fecha de Pago</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="payments-contenedor">
        <!-- TÍTULO: CONTENEDOR PARA PAGOS DINÁMICOS -->
             
        <!-- Aquí se agregarán dinámicamente los pagos -->
             
        </tbody>
    </table>
</fieldset>

<!-- TITULO: ARCHIVO JS -->
    
    <!-- llama al archivo js -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_nueva_cotizacion/pago.js"></script> 

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    
    // Asegúrate de que los datos sean arrays y no estén vacíos
    
    $numero_pago_array = isset($_POST['numero_pago']) ? $_POST['numero_pago'] : [];
    $pago_descripcion_array = isset($_POST['descripcion_pago']) ? $_POST['descripcion_pago'] : [];
    $porcentaje_pago_array = isset($_POST['porcentaje_pago']) ? $_POST['porcentaje_pago'] : [];
    $monto_pago_array = isset($_POST['monto_pago']) ? $_POST['monto_pago'] : [];
    $fecha_pago_array = isset($_POST['fecha_pago']) ? $_POST['fecha_pago'] : [];
    $forma_pago = isset($_POST['forma_pago']) ? $_POST['forma_pago'] : [];
    

    // Asegúrate de que haya datos en los arreglos
    
    if (empty($numero_pago_array) || empty($pago_descripcion_array) || empty($porcentaje_pago_array) || empty($monto_pago_array) || empty($fecha_pago_array)) {
        die("Faltan datos  de pago obligatorios.");
    }


    // Iterar sobre los datos del formulario

    foreach ($numero_pago_array as $index => $numero_pago) {

        // Recuperar los datos para esta iteración

        $pago_descripcion = isset($pago_descripcion_array[$index]) && is_string($pago_descripcion_array[$index]) ? trim($pago_descripcion_array[$index]) : null;
        $porcentaje_pago = isset($porcentaje_pago_array[$index]) ? floatval($porcentaje_pago_array[$index]) : null;
        $monto_pago = isset($monto_pago_array[$index]) ? floatval($monto_pago_array[$index]) : null;
        $fecha_pago = isset($fecha_pago_array[$index]) && is_string($fecha_pago_array[$index]) ? trim($fecha_pago_array[$index]) : null;
        $forma_pago = isset($forma_pago[$index]) && is_string($forma_pago[$index]) ? trim($forma_pago[$index]) : null;


        // Validar datos obligatorios para esta iteración

        if (is_null($numero_pago) || is_null($porcentaje_pago) || is_null($monto_pago) || is_null($fecha_pago)) {
            die("Faltan datos obligatorios en una de las entradas.");
        }


        // Insertar datos en la tabla pago

        $sql = "INSERT INTO C_pago (
        id_cotizacion,
         numero_pago,
          descripcion,
           porcentaje_pago,
            monto_pago,
             fecha_pago,
             id_forma_pago)
                VALUES (
                ?,
                 ?,
                  ?,
                   ?,
                    ?,
                     ?,
                     ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }


        // Asignar los parámetros de forma correcta

        $stmt->bind_param("iisdisi",
         $id_cotizacion,
          $numero_pago,
           $pago_descripcion,
            $porcentaje_pago,
             $monto_pago,
              $fecha_pago,
                $forma_pago);



        // Ejecutar la consulta y manejar posibles errores

        if ($stmt->execute()) {
            echo "Pago insertado correctamente. ID: " . $stmt->insert_id . "<br>";
        } else {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }
    }

    $stmt->close();
}

?>



     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa pago.PHP ----------------------------------------
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
