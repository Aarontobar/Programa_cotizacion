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
    ------------------------------------- INICIO ITred Spa nuevo cliente.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!DOCTYPE html>
<html lang="es">
    <!-- Abre el elemento de cabecera que contiene metadatos y enlaces a recursos externos -->
<head> 
    <!-- Define la codificación de caracteres como UTF-8 para asegurar la correcta visualización de caracteres especiales y diversos idiomas -->
    <meta charset="UTF-8"> 
    <!-- Configura la vista en dispositivos móviles. width=device-width asegura que el ancho de la página se ajuste al ancho de la pantalla del dispositivo, y initial-scale=1.0 establece el nivel de zoom inicial -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Define el título de la página que se muestra en la pestaña del navegador -->
    <title> Agregar Cliente</title> 
    
<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../css/menu_principal/crear_nuevo/menu_2_programas/boton2_crear_cliente/nuevo_cliente.css"> 
    
    <!-- Cierra el elemento de cabecera -->
</head> 


<!-- Contenedor principal que puede ayudar a centrar y organizar el contenido en la página -->
    <div class="contenedor"> 
            
        <!-- TÍTULO: FORMULARIO PARA AGREGAR UN NUEVO CLIENTE -->

            <!-- Formulario para añadir cliente -->
            <form id="formulario-cliente" method="POST" action="" enctype="multipart/form-data">
                <h1>Título: Rellena el formulario para agregar un nuevo cliente</h1>

                <!-- TÍTULO: CONTENEDOR SECUNDARIO QUE ORGANIZA LOS FORMULARIOS -->

                    <!-- Contenedor -->
                    <div class="contenedor">

                        <!-- TÍTULO: INFORMACIÓN DEL NEGOCIO / EMPRESA -->
                        
                            <!-- Información del negocio -->
                            <div class="formulario-empresa">
                                <h3>Título: Información del Negocio / Empresa</h3>

                        <!-- TÍTULO: FORMULARIO DE EMPRESA DEL CLIENTE -->
                            <!-- Importación del formulario del cliente -->
                                <?php include 'formulario_empresa_cliente.php'; ?> 
                            </div>

                        <!-- TÍTULO: INFORMACIÓN DEL ENCARGADO / CLIENTE -->
                            <!-- Información del Encargado -->
                            <div class="formulario-encargado">
                                <h3>Título: Información del Encargado / Cliente</h3>

                            <!-- TÍTULO: FORMULARIO DEL ENCARGADO DE LA EMPRESA -->
                                <!-- Importación del formulario del encargado -->
                                <?php include 'formulario_encargado.php'; ?>
                            </div>
                    </div>

                <!-- TÍTULO: SECCIÓN DE NOTIFICACIONES -->
                    <!-- Notificaciónes -->
                    <?php if (!empty($mensaje)): ?>
                        <div class="notificacion" id="notificacion">
                            <p>Título: Notificación / Mensaje</p>
                            <?php echo $mensaje; ?>
                        </div>
                    <?php endif; ?>

                <!-- TÍTULO: BOTÓN PARA CREAR CLIENTE -->
                        <!-- Botón para subir la información del cliente -->
                    <button type="submit" class="submit">Título: Crear Cliente</button> 
            </form> 
    </div>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="../js/menu_principal/crear_nuevo/menu_2_programas/boton2_crear_cliente/nuevo_cliente.js"></script> 

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa nuevo cliente .PHP ----------------------------------------
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