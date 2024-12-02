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
    ------------------------------------- INICIO ITred Spa Nueva cotizacion .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
     <?php

// Redirigir a la página de visualización de la cotización usando un formulario oculto

// TÍTULO: PROCESAMIENTO DEL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'cotizacion') {
    try {
        // TÍTULO: VALIDACIÓN Y PROCESAMIENTO DE DATOS
        // Aquí va tu código existente para procesar los datos del formulario
        // y crear la cotización en la base de datos
        
        // TÍTULO: VERIFICACIÓN DE CREACIÓN EXITOSA
        if (isset($id_cotizacion) && $id_cotizacion > 0) {
            $response = array(
                'success' => true,
                'message' => 'Cotización creada exitosamente',
                'cotizacion_id' => $id_cotizacion
            );
        } else {
            throw new Exception('Error al crear la cotización: ID no generado');
        }
        
    } catch (Exception $e) {
        // TÍTULO: MANEJO DE ERRORES
        $response = array(
            'success' => false,
            'message' => $e->getMessage()
        );
    }
    
    // TÍTULO: ENVÍO DE RESPUESTA
    echo json_encode($response);
    exit;
}

//-------------------------------------------------------------------------------------
    
?>

<!DOCTYPE html>
<html lang="es">

<head> <!-- Abre el elemento de cabecera que contiene metadatos y enlaces a recursos externos -->

    <meta charset="UTF-8"> <!-- Define la codificación de caracteres como UTF-8 para asegurar la correcta visualización de caracteres especiales y diversos idiomas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista en dispositivos móviles. width=device-width asegura que el ancho de la página se ajuste al ancho de la pantalla del dispositivo, y initial-scale=1.0 establece el nivel de zoom inicial -->
    <title>Formulario de Cotización</title> <!-- Define el título de la página que se muestra en la pestaña del navegador -->
    
    <!-- TITULO: ARCHIVO CSS -->

        <!-- llama al archivo CSS -->
        <link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/editor_menu2/menu2/boton1_nueva_cotizacion/nueva_cotizacion.css"> <!-- Enlaza una hoja de estilo externa que se encuentra en la ruta especificada para estilizar el contenido de la página -->

</head>


<body> 

    <!-- Abre el elemento del cuerpo de la página donde se coloca el contenido visible -->

    <div class="nueva-cotizacion"> 
        <!-- Contenedor principal que puede ayudar a centrar y organizar el contenido en la página -->
        <form id="formulario-cotizacion" method="POST" action="" enctype="multipart/form-data">

            <input type="hidden" name="formulario" value="cotizacion">
            <!-- Fila 1 -->
            <div class="row"> <!-- Crea una fila para organizar los elementos en una disposición horizontal -->

            <!-- TÍTULO: LOGO DE LA EMPRESA -->

                <!-- llama al cargar_logo_empresa.php -->
                <?php include 'cargar_logo_empresa.php'; ?>

            <!-- TÍTULO: CUADRO ROJO DE COTIZACIÓN -->

                <!-- llama al cuadro_rojo_cotizacion.php -->
                <?php include 'cuadro_rojo_cotizacion.php'; ?>


            <!-- TÍTULO: SECCIÓN DE DATOS -->

                <!-- Caja de la inserción de la fecha de emisión -->
                <fieldset class="box-6 cuadro-datos"> 
                    <label for="fecha_emision">Fecha de Emisión:</label> <!-- Etiqueta para el campo de entrada de la fecha de emisión -->
                    <input type="date" id="fecha_emision" name="fecha_emision" required> <!-- Campo de fecha para seleccionar la fecha de emisión. Es obligatorio --> 
                </fieldset>


            </div>

            <!-- Fila 2 -->

        <!-- TÍTULO: DATOS DE LA EMPRESA -->

            <!-- llama al datos_empresa.php -->
            <?php include 'datos_empresa.php'; ?>


            <!-- Fila 3 -->
             
            <!-- TÍTULO: DETALLE DEL CLIENTE -->

                <!-- llama al detalle del cliente.php -->
                <?php include 'detalle_cliente.php'; ?>

                <!-- Crea una fila para organizar los elementos en una disposición horizontal -->
                <div class="row"> 
                


            <!-- Fila 4 -->

            <!-- TÍTULO: DETALLE DEL PROYECTO -->

                    <!-- llama al detalle del proyecto.php -->
                    <?php include 'detalle_proyecto.php'; ?> 


                </div>

            <!-- Fila 5 -->

        <!-- TÍTULO: DETALLE DEL ENCARGADO -->

            <!-- llama al detalle del proyecto.php -->
            <?php include 'detalle_encargado.php'; ?>


            <!-- Fila 6 -->

        <!-- TÍTULO: DETALLE DEL VENDEDOR -->

            <!-- llama al detalle_vendedor.php -->
            <?php include 'detalle_vendedor.php'; ?>


        <!-- TÍTULO: DETALLE DE COTIZACIÓN -->

            <!-- llama al detalle_cotizacion.php -->
            <?php include 'detalle_cotizacion.php'; ?>
            
        <!-- TÍTULO: DETALLE GENERAL -->

            <!-- llama al detalle_general.php -->
            <?php include 'detalle.php'; ?>


        <!-- TÍTULO: CÁLCULOS FINALES -->

            <!-- llama al detalle_total.php -->
            <?php include 'detalle_total.php'; ?>


        <!-- TÍTULO: OBSERVACIONES -->

            <!-- llama a las observaciones -->
            <?php include 'observaciones.php'; ?>

            
        <!-- TÍTULO: SECCIÓN PARA LOS PAGOS -->

            <br>
            <!-- llama al sección para los pagos -->
            <?php include 'pago.php'; ?>
            
            <br>
            

        <!-- TÍTULO: CONDICIONES -->
            
            <!-- llama a las condiciones-->
            <?php include 'traer_condiciones.php'; ?>


        <!-- TÍTULO: REQUISITOS -->
            
            <!-- llama a los requisitos -->
            <?php include 'traer_requisitos.php'; ?>


        <!-- TÍTULO: OBLIGACIONES DEL CLIENTE -->
            
            <!-- llama al obligaciones del cliente -->
            <?php include 'obligaciones_cliente.php'; ?>

            
            <!-- Botón para enviar el formulario y generar la cotización -->

        <!-- TÍTULO: MENSAJE DE DESPEDIDA -->            
            
            <!-- trae el mensaje de despedida -->
            <div>
                <?php include 'mensaje_despedida.php'; ?>            
            </div>


        <!-- TÍTULO: DATOS BANCARIOS -->
            <!-- trae los datos bancarios-->
            <?php include 'traer_datos_bancarios.php'; ?>


        <!-- TÍTULO: FIRMA -->
            <!-- trae la firma -->
            <?php include 'firma.php'; ?>

            
        <!-- TÍTULO: ENLAZA NUEVAMENTE EL ARCHIVO JAVASCRIPT PARA MANEJAR LA LÓGICA DEL FORMULARIO DE COTIZACIÓN -->  

            <!-- llama al archivo nueva_cotizacion.sj -->
            <script src="../../js/menu_principal/crear_nuevo/editor_menu2/menu2/boton1_nueva_cotizacion/nueva_cotizacion_principal.js"></script> 
             <!-- llama al archivo cuadro_rojo_cotizacion.sj -->
            <script src="../../js/menu_principal/crear_nuevo/editor_menu2/menu2/boton1_nueva_cotizacion/cuadro_rojo_cotizacion.js"></script> 

            <button type="submit" class="submit">Guardar cotizacion</button> 

        <!-- Título: Botón para Guardar Cotización -->

        </form> <!-- Cierra el formulario -->
    </div> <!-- Cierra el contenedor principal -->

</body>

<!-- TÍTULO: SCRIPT DE PROCESAMIENTO DEL FORMULARIO -->
<script>

</script>
</html>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa nueva cotizacion .PHP -----------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITredSpa.
BPPJ
-->