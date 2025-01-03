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
    ------------------------------------- INICIO ITred Spa Firma .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Establece la codificación de caracteres como UTF-8 para asegurar la correcta visualización de caracteres especiales -->

    <meta charset="UTF-8">

    <!-- Configura la vista en dispositivos móviles para que la página se ajuste al ancho de la pantalla del dispositivo -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlaza una hoja de estilo externa para estilizar el contenido de la firma -->

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/firma.css">

    <!-- Define el título de la página que se muestra en la pestaña del navegador -->
    <title>Firma</title>
</head>
<body>

    <!-- Contenedor principal para la sección de firmas -->

    <div class="contenedor-firma">

        <!-- TÍTULO PRINCIPAL DE LA SECCIÓN -->
            <!-- Selección de firma -->
            <h1>Selecciona una opción de firma</h1>

            <!-- Subtítulo que indica las opciones disponibles para crear una firma -->
            <h3>¡Crea una firma automática, manual o sube tu propia firma digital!</h3>

            <!-- Opción de Firma Automática -->
            <div class="option">

                <!-- TÍTULO: SELECCIONAR FIRMA AUTOMÁTICA -->

                    <h4>Seleccionar Firma Automática</h4>
                    
                    <!-- Botón de opción para seleccionar firma automática -->
                    
                    <input type="radio" id="auto-signature" name="opcion-firma" value="automatic">
                    <label for="auto-signature">Firma Automática</label>
                    
                    <!-- Contenedor para desplegar la firma automática, inicialmente oculto -->
                    
                    <div id="auto-desplegar-firma" class="desplegar-firma" style="display: none;"></div>
            
                </div>

        <!-- Opción de Firma Manual -->
        <div class="option">

            <!-- TÍTULO: SELECCIONAR FIRMA MANUAL -->

                <h4>Seleccionar Firma Manual</h4>

                <!-- Botón de opción para seleccionar firma manual -->

                <input type="radio" id="manual-signature" name="opcion-firma" value="manual">
                <label for="manual-signature">Firma Manual</label>

            <!-- Contenedor para los campos de entrada de la firma manual, inicialmente oculto -->

            <div id="firma-manual" class="desplegar-firma" style="display: none;">
                <div class="signature-row">

                    <!-- TÍTULO: CAMPO PARA EL TÍTULO DE LA FIRMA -->
                        <!-- Campo para el título de firma -->
                        <h5>Campo para el Título de la Firma</h5>
                        <div class="form-group">
                            <label for="titulo_firma">Título de la Firma:</label>
                            <input type="text" name="titulo_firma" placeholder="título de la firma" oninput="QuitarCaracteresInvalidos(this)">
                        </div>

                    <!-- TÍTULO: CAMPO PARA EL NOMBRE DEL ENCARGADO -->
                        <!-- Campo para el nombre encargado -->
                        <h5>Campo para el Nombre del Encargado</h5>
                        <div class="form-group-inline">
                            <div class="form-group">
                                <label for="nombre_encargado_firma">Nombre del Encargado:</label>
                                <input type="text" name="nombre_encargado_firma" placeholder="Nombre del Encargado" oninput="QuitarCaracteresInvalidos(this)">
                            </div>

                    <!-- TÍTULO: CAMPO PARA EL CARGO DEL ENCARGADO -->
                        <!-- Enviar los datos de cargo del encargado -->
                            <h5>Campo para el Cargo del Encargado</h5>
                            <div class="form-group">
                                <label for="cargo_encargado_firma">Cargo del Encargado:</label>
                                <input type="text" name="cargo_encargado_firma" placeholder="Cargo del Encargado" oninput="QuitarCaracteresInvalidos(this)">
                            </div>
   
                    <!-- TÍTULO: CAMPO PARA EL TELÉFONO DEL ENCARGADO -->
                        <!-- Enviar los datos para teléfono del encargado -->
                            <h5>Campo para el Teléfono del Encargado</h5>
                            <div class="form-group">
                                <label for="telefono_encargado_firma">Teléfono del Encargado:</label>
                                <input type="text" name="telefono_encargado_firma" placeholder="Teléfono del Encargado" oninput="QuitarCaracteresInvalidos(this)">
                            </div>
                        </div>

                    <!-- TÍTULO: CAMPO PARA EL NOMBRE DE LA EMPRESA -->
                        <!-- Enviar los datos para nombre de la empresa -->
                        <h5>Campo para el Nombre de la Empresa</h5>
                        <div class="form-group-inline">
                            <div class="form-group">
                                <label for="nombre_empresa_firma">Nombre de la Empresa:</label>
                                <input type="text" name="nombre_empresa_firma" placeholder="Nombre de la Empresa" oninput="QuitarCaracteresInvalidos(this)">
                            </div>
        
                    <!-- TÍTULO: CAMPO PARA EL ÁREA DE LA EMPRESA -->
                        <!-- Enviar los datos para el Área de la empresa -->
                            <h5>Campo para el Área de la Empresa</h5>
                            <div class="form-group">
                                <label for="area_empresa_firma">Área de la Empresa:</label>
                                <input type="text" name="area_empresa_firma" placeholder="Área de la Empresa" oninput="QuitarCaracteresInvalidos(this)">
                            </div>
                        </div>

                    <!-- TÍTULO: CAMPO PARA EL TELÉFONO DE LA EMPRESA -->
                        <!-- Enviar los datos para teléfono -->
                        <h5>Campo para el Teléfono de la Empresa</h5>
                        <div class="form-group-inline">
                            <div class="form-group">
                                <label for="telefono_empresa_firma">Teléfono de la Empresa:</label>
                                <input type="text" name="telefono_empresa_firma" placeholder="Teléfono de la Empresa" oninput="QuitarCaracteresInvalidos(this)">
                            </div>
       
                        <!-- TÍTULO: CAMPO PARA EL CORREO ELECTRÓNICO -->
                            <!-- Enviar los datos para correo -->
                            <h5>Campo para el Correo Electrónico</h5>
                            <div class="form-group">
                                <label for="email_firma">Email:</label>
                                <input type="email" name="email_firma" placeholder="Email" onblur="CompletarEmail(this)">
                            </div>
                        </div>

                    <!-- TÍTULO: CAMPO PARA LA DIRECCIÓN -->
                        <!-- Enviar los datos para dirección -->
                        <h5>Campo para la Dirección</h5>
                        <div class="form-group">
                            <label for="direccion_firma">Dirección:</label>
                            <input type="text" name="direccion_firma" placeholder="Dirección" oninput="QuitarCaracteresInvalidos(this)">
                        </div>
    
                    <!-- TÍTULO: CAMPO PARA EL RUT -->
                        <!-- Campo para el RUT -->
                        <h5>Campo para el RUT</h5>
                        <div class="form-group">
                            <label for="rut_firma">RUT:</label>
                            <input type="text" name="rut_firma" placeholder="RUT" minlength="3" maxlength="20"           
                                pattern="^[0-9]+[-kK0-9]{1}$" 
                                title="Por favor, ingrese un RUT válido."
                                placeholder="Ejemplo: 12345678-9"
                                oninput="formatoRut(this)"
                                oninput="QuitarCaracteresInvalidos(this)">
                        </div>
                    </div>
             
                <!-- TÍTULO: BOTÓN PARA AGREGAR FIRMA -->
                    <!-- Botón para agregar -->
                    <h5>Botón para Agregar Firma</h5>
                    <button type="button" class="BotonAgregarFirma" id="BotonAgregarFirma" style="background-color: green; color: white; border: none; cursor: pointer; padding: 5px 10px;">Agregar Firma</button>
                </div>
            </div>
                
        <!-- Opción de Firma Digital (Subida de Imagen) -->
        <div class="option">

            <!-- TÍTULO: SELECCIONAR FIRMA IMAGEN -->

                <!-- Enviar los datos para correo -->
                <h4>Seleccionar Firma Imagen</h4>

                <!-- Botón de opción para seleccionar firma por imagen -->
                <input type="radio" id="image-signature" name="opcion-firma" value="image">
                <label for="image-signature">Firma Imagen</label>

            <!-- TÍTULO: CAMPO PARA SUBIR IMAGEN -->

                <h5>Campo para Subir Imagen de Firma:</h5>
                <input type="file" id="firma-imagen" name="firma-imagen" accept="image/png">

                <!-- Previsualización de la imagen de la firma, inicialmente oculta -->
                <img id="previsualizacion-firma" src="" alt="Previsualización de firma" style="display: none;">
        </div>
        <!------------------------------------------------------------------------------------------->

        <!-- Opción de Firma Digital -->
        <div class="option">

            <!-- TÍTULO: SELECCIONAR FIRMA DIGITAL -->

            <h4>Seleccionar Firma Digital</h4>

            <!-- Botón de opción para seleccionar firma digital -->
            <input type="radio" id="digital-signature" name="opcion-firma" value="digital">
            <label for="digital-signature">Firma Digital</label>

            <!-- TÍTULO: CAMPO PARA SUBIR IMAGEN -->

            <h5>Campo para Subir Imagen de Firma:</h5>
            <input type="file" id="firma-digital" name="firma-digital" accept="image/png">

            <!-- Previsualización de la imagen de la firma, inicialmente oculta -->
            <img id="previsualizacion-firma-digital" src="" alt="Previsualización de firma" style="display: none;">
        </div>
    </div>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/firma.js"></script>

</body>
</html>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formulario']) && $_POST['formulario'] === 'empresa') {
    // Procesar campos de la empresa
    $empresa_nombre = $_POST['empresa_nombre'];
    $empresa_area = $_POST['empresa_area'];
    $empresa_telefono = $_POST['empresa_telefono'];
    $empresa_email = $_POST['empresa_email'];
    $empresa_direccion = $_POST['empresa_direccion'];
    $empresa_rut = $_POST['empresa_rut'];

    // Subir archivo de firma digital (si existe)
    if (isset($_FILES['firma_digital']) && $_FILES['firma_digital']['error'] === UPLOAD_ERR_OK) {
        $firma_digital = file_get_contents($_FILES['firma_digital']['tmp_name']);
    } else {
        $firma_digital = null;
    }

    // Verificar qué opción de firma se seleccionó
    $firma_opcion = $_POST['opcion-firma'];

    //--------------------------------------------

    if ($firma_opcion === 'automatic') {
        // Insertar firma automática con datos predefinidos
        $titulo_firma = "SIN OTRO PARTICULAR, Y ESPERANDO QUE LA PRESENTE OFERTA SEA DE SU INTERÉS, SE DESPIDE ATENTAMENTE:";
        $nombre_encargado = ""; // Dejar vacío si no hay encargado
        $cargo_encargado = "";  // Dejar vacío si no hay cargo
        $telefono_encargado_firma = "999999999";
        $firma_digital = "";
        $stmt = $mysqli->prepare("INSERT INTO em_firmas (
          id_empresa,
          titulo_firma,
          nombre_encargado_firma,
          cargo_encargado_firma, 
          telefono_encargado_firma, 
          nombre_empresa_firma, 
          area_empresa_firma, 
          telefono_empresa_firma, 
          firma_digital, 
          email_firma, 
          direccion_firma, 
          rut_firma) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }

        //--------------------------------------------------------

        $stmt->bind_param("isssssssssss", 
        $id_empresa, 
        $titulo_firma, 
        $nombre_encargado, 
        $cargo_encargado, 
        $telefono_encargado_firma, 
        $empresa_nombre, 
        $empresa_area, 
        $empresa_telefono, 
        $firma_digital, 
        $empresa_email, 
        $empresa_direccion, 
        $empresa_rut);
        $stmt->execute();
        
    } elseif ($firma_opcion === 'manual') {
        // Insertar firma manual con datos del formulario
        $titulo_firma = $_POST['titulo_firma'];
        $nombre_encargado = $_POST['nombre_encargado_firma'];
        $cargo_encargado = $_POST['cargo_encargado_firma'];
        $telefono_encargado_firma = $_POST['telefono_encargado_firma'];
        $nombre_empresa = $_POST['nombre_empresa_firma'];
        $area_empresa = $_POST['area_empresa_firma'];
        $telefono_empresa = $_POST['telefono_empresa_firma'];
        $email_firma = $_POST['email_firma'];
        $direccion_firma = $_POST['direccion_firma'];
        $rut_firma = $_POST['rut_firma'];
        $firma_digital = "";

        $stmt = $mysqli->prepare("INSERT INTO em_firmas (
        id_empresa,
        titulo_firma, 
        nombre_encargado_firma,
        cargo_encargado_firma, 
        telefono_encargado_firma, 
        nombre_empresa_firma, 
        area_empresa_firma, 
        telefono_empresa_firma, 
        firma_digital, 
        email_firma,
        direccion_firma, 
        rut_firma) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }

        //----------------------------------------------------------------

        $stmt->bind_param("isssssssssss", 
        $id_empresa,
        $titulo_firma,
        $nombre_encargado,
        $cargo_encargado,
        $telefono_encargado_firma,
        $nombre_empresa,
        $area_empresa, 
        $telefono_empresa, 
        $firma_digital,
        $email_firma,
        $direccion_firma, 
        $rut_firma);
        $stmt->execute();

    } elseif ($firma_opcion === 'image') {

             // Firma digital (subida de imagen)
             
             if (isset($_FILES['firma-imagen']) && $_FILES['firma-imagen']['error'] === UPLOAD_ERR_OK) {
                $target_dir = "../../imagenes/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/crear_empresa/firma/";
                $target_file = $target_dir . basename($_FILES["firma-imagen"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                //-------------------------------

                // Comprobar si es una imagen válida

                $check = getimagesize($_FILES["firma-imagen"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "El archivo no es una imagen.";
                    $uploadOk = 0;
                }

                //-------------------------------

                // Limitar los formatos de imagen
                if ($imageFileType != "png") {
                    echo "Solo se permiten archivos PNG.";
                    $uploadOk = 0;
                }
    
                // Subir el archivo si todo está bien

                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["firma-imagen"]["tmp_name"], $target_file)) {
                        $firma_ruta = $target_file;
    
                        // Aquí todos los demás campos se insertan como NULL, excepto id_firma e id_empresa

                        $stmt = $mysqli->prepare("INSERT INTO em_firmas (
                            id_empresa, 
                            titulo_firma, 
                            nombre_encargado_firma, 
                            cargo_encargado_firma, 
                            telefono_encargado_firma, 
                            nombre_empresa_firma, 
                            area_empresa_firma, 
                            telefono_empresa_firma, 
                            firma_digital, 
                            email_firma, 
                            direccion_firma, 
                            rut_firma) VALUES (?, 'null', NULL, NULL, NULL, NULL, NULL, NULL, ?, NULL, NULL, NULL)");
                        
                        if ($stmt === false) {
                            die("Error en la preparación de la consulta: " . $mysqli->error);
                        }
                        //--------------------------------------------------------------------------------

                        // Insertar con los campos `id_empresa` y `firma_ruta`

                        $stmt->bind_param("is", $id_empresa, $firma_ruta);
                        $stmt->execute();
                        
                        //---------------------------------------------------
                        echo "Firma digital guardada con éxito.";
                    } else {
                        echo "Hubo un error al subir la imagen.";
                    }
                }
            } else {
                echo "No se ha seleccionado ninguna imagen.";
            }
        }
      
    }
?>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Firma  .PHP ----------------------------------------
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