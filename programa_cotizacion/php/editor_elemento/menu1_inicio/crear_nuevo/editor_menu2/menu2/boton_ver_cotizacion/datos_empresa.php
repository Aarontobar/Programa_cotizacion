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
    ------------------------------------- INICIO ITred Spa Datos empresa.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/datos_empresa.css">

    
<!-- TÍTULO: CREA UNA FILA PARA ORGANIZAR LOS ELEMENTOS EN UNA DISPOSICIÓN HORIZONTAL -->
 
    <!-- Etiqueta de fila -->
    <div class="row"> 

<!-- TÍTULO: CAJA PARA INGRESAR DATOS DE LA EMPRESA -->

    <!-- Etiqueta del campo de datos de la empresa -->
    <fieldset class="box-12 cuadro-datos"> 
    
<!-- TÍTULO: TÍTULO DEL CAMPO DE DATOS -->

    <!-- Etiqueta legend -->
    <legend>Mi Empresa</legend> 

<!-- TÍTULO: CAMPO DE ENTRADA OCULTO PARA EL ID DE LA EMPRESA -->

    <!-- Ingreso de id de la empresa -->
    <input type="text" id="empresa-id" name="empresa_id" value="<?php echo htmlspecialchars($id); ?>" hidden> 
    
    <!-- Formulario de los datos de la empresa -->
    <div class="form-group">

<!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL NOMBRE DE LA EMPRESA -->

        <!-- etiqueta del nombre de la empresa -->
        <label for="empresa_nombre">Nombre</label> 

<!-- TÍTULO: CAMPO DE ENTRADA PARA EL NOMBRE DE LA EMPRESA -->

        <!-- Campo de texto para ingresar el nombre de la empresa. El atributo "required" hace que el campo sea obligatorio -->
        <input type="text" id="empresa_nombre" name="empresa_nombre" value="<?php echo htmlspecialchars($items['EmpresaNombre']); ?>" oninput="QuitarCaracteresInvalidos(this)"> 
    </div>

    <div class="form-group">

<!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL ÁREA DE LA EMPRESA -->

        <!-- Etiqueta del nombre de la empresa -->
        <label for="empresa_area">Área</label> 

<!-- TÍTULO: CAMPO DE ENTRADA PARA EL ÁREA DE LA EMPRESA -->

        <!-- Campo de texto para ingresar el área de la empresa. Este campo no es obligatorio -->
        <input type="text" id="empresa_area" name="empresa_area" value="<?php echo htmlspecialchars($items['EmpresaArea']); ?>" oninput="QuitarCaracteresInvalidos(this)"> 
    </div>

    <div class="form-group">

<!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DE LA DIRECCIÓN DE LA EMPRESA -->

        <!-- Etiqueta de la empresa dirección -->
        <label for="empresa_direccion">Dirección</label> 

<!-- TÍTULO: CAMPO DE ENTRADA PARA LA DIRECCIÓN DE LA EMPRESA -->

        <!-- Campo de texto para ingresar la dirección de la empresa. Este campo no es obligatorio -->
        <input type="text" id="empresa_direccion" name="empresa_direccion" value="<?php echo htmlspecialchars($items['EmpresaDireccion']); ?>" oninput="QuitarCaracteresInvalidos(this)"> 
    </div>
            
    <div class="form-group" style="display: flex; align-items: center;">

<!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL TELÉFONO DE LA EMPRESA -->

        <!--  -->
        <label for="empresa_telefono" style="margin-right: 10px;">Teléfono</label>

<!-- TÍTULO: IMAGEN DE LA BANDERA -->
    
    <!-- Imagen de la bandera en blanco -->
        <img id="flag" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Flag_of_None.svg/32px-Flag_of_None.svg.png" 
            alt="Bandera" style="display: none; margin-right: 10px;" width="32" height="20">

<!-- TÍTULO: CAMPO DE ENTRADA PARA EL TELÉFONO DE LA EMPRESA -->

        <!-- Campo de entrada de texto para el teléfono de la empresa -->
        <input type="text" id="empresa_telefono" name="empresa_telefono" 
            value="<?php echo htmlspecialchars($items['EmpresaTelefono']); ?>"
            placeholder="+56 9 1234 1234" 
            maxlength="13" 
            required 
            title="Formato válido: +56 9 1234 1234 (código de país, seguido de número)"
            oninput="AgregarMasYDetectarPais(this)"> 
    </div>

    <div class="form-group">

<!-- TÍTULO: ETIQUETA PARA EL CAMPO DE ENTRADA DEL EMAIL DE LA EMPRESA -->
        
        <!-- Etiqueta del email de la empresa -->
        <label for="empresa_email">Email</label> 

<!-- TÍTULO: CAMPO DE ENTRADA PARA EL EMAIL DE LA EMPRESA -->

        <!-- Campo de correo electrónico para ingresar el email de la empresa. El tipo "email" valida que el texto ingresado sea una dirección de correo electrónico -->
        <input type="email" id="empresa_email" name="empresa_email" value="<?php echo htmlspecialchars($items['EmpresaEmail']); ?>" oninput="QuitarCaracteresInvalidos(this)"> 
    </div>
</fieldset> 
</div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/datos_empresa.js"></script>

<?php
// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los valores del formulario
    $empresa_id = isset($_POST['empresa_id']) ? $_POST['empresa_id'] : null; 
    $empresa_rut = isset($_POST['empresa_rut']) ? $_POST['empresa_rut'] : null; 
    $empresa_nombre = isset($_POST['empresa_nombre']) ? trim($_POST['empresa_nombre']) : null; 
    $empresa_area = isset($_POST['empresa_area']) ? $_POST['empresa_area'] : null; 
    $empresa_direccion = isset($_POST['empresa_direccion']) ? $_POST['empresa_direccion'] : null; 
    $empresa_telefono = isset($_POST['empresa_telefono']) ? $_POST['empresa_telefono'] : null; 
    $empresa_email = isset($_POST['empresa_email']) ? $_POST['empresa_email'] : null; 

    //-----------------------------------------------------------------------------//

    // Verifica que el nombre y el RUT de la empresa estén presentes
    if ($empresa_nombre && $empresa_rut) {

        // Consulta para insertar o actualizar la empresa
        $sql = "INSERT INTO E_Empresa (rut_empresa, id_foto, nombre_empresa, area_empresa, direccion_empresa, telefono_empresa, email_empresa)
                VALUES (?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE nombre_empresa=VALUES(nombre_empresa), area_empresa=VALUES(area_empresa), direccion_empresa=VALUES(direccion_empresa), telefono_empresa=VALUES(telefono_empresa), email_empresa=VALUES(email_empresa)";
        $stmt = $mysqli->prepare($sql);

        //-----------------------------------------------------------------------------//

        // Verifica si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }
        $empresa_id_foto = null; // O el valor correspondiente si tienes la foto

        //-----------------------------------------------------------------------------//

        // Vincula los parámetros a la consulta
        $stmt->bind_param("sisssss", $empresa_rut, $empresa_id_foto, $empresa_nombre, $empresa_area, $empresa_direccion, $empresa_telefono, $empresa_email);
        $stmt->execute();

        //-----------------------------------------------------------------------------//

        // Verifica si hubo errores en la ejecución de la consulta
        if ($stmt->error) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        //-----------------------------------------------------------------------------//

        // Obtiene el ID de la empresa insertada/actualizada
        $id_empresa = $mysqli->insert_id;
        echo "Empresa insertada/actualizada. ID: $id_empresa<br>";

        //-----------------------------------------------------------------------------//

    } else {
        echo "Nombre y RUT de la empresa son obligatorios."; // Mensaje de error si faltan campos obligatorios
    }
}
//-----------------------------------------------------------------------------//
?>

<!------------------------------------------------------------------------------------->


     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Datos empresa.PHP ----------------------------------------
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
