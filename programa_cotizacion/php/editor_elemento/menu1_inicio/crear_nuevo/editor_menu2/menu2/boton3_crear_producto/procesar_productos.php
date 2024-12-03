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
    ------------------------------------- INICIO ITred Spa Procesar productos .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa
$conn = new mysqli('localhost', 'root', '', 'ITredSpa_bd');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// TÍTULO: CONFIGURACIÓN DE DIRECTORIOS
// Define la ruta base para las imágenes
$base_upload_dir = dirname(dirname(dirname(dirname(__DIR__)))) . '/imagenes/menu_principal/crear_nuevo/crear_producto/';

// Crear el directorio si no existe
if (!file_exists($base_upload_dir)) {
    mkdir($base_upload_dir, 0777, true);
}

// TÍTULO: VERIFICACIÓN DE PERMISOS
// Verificar permisos de escritura
if (!is_writable($base_upload_dir)) {
    chmod($base_upload_dir, 0777);
}

// TÍTULO: PROCESAMIENTO DE PRODUCTOS
// Obtener el ID de la empresa desde el formulario
$id_empresa = isset($_POST['id_empresa']) ? intval($_POST['id_empresa']) : 0;

// Verificar si el ID de la empresa existe
$check_query = $conn->prepare("SELECT id_empresa FROM e_empresa WHERE id_empresa = ?");
$check_query->bind_param("i", $id_empresa);
$check_query->execute();
$check_query->store_result();

if ($check_query->num_rows === 0) {
    die("Error: ID de empresa inválido.");
}
$check_query->close();

// TÍTULO: PREPARACIÓN DE LA CONSULTA
// Preparar la consulta de inserción
$stmt = $conn->prepare("INSERT INTO productos (nombre_producto, descripcion, precio, ruta_foto, tipo_producto) VALUES (?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// TÍTULO: PROCESAMIENTO DE CADA PRODUCTO
foreach ($_POST['nombre_producto'] as $index => $nombre_producto) {
    $descripcion_producto = $_POST['descripcion_producto'][$index];
    $precio_producto = $_POST['precio_producto'][$index];
    $id_tipo_producto = $_POST['id_tipo_producto'][$index];
    $ruta_foto = null;

    // TÍTULO: PROCESAMIENTO DE IMAGEN
    if (isset($_FILES['foto_producto']['error'][$index]) && $_FILES['foto_producto']['error'][$index] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['foto_producto']['tmp_name'][$index];
        $original_name = $_FILES['foto_producto']['name'][$index];
        
        // Generar nombre único para el archivo
        $file_extension = pathinfo($original_name, PATHINFO_EXTENSION);
        $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
        $upload_file = $base_upload_dir . $new_filename;

        // Validar tipo de archivo
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $tmp_name);
        finfo_close($finfo);

        if (!in_array($mime_type, $allowed_types)) {
            continue; // Salta este archivo si no es una imagen válida
        }

        // Mover el archivo
        if (move_uploaded_file($tmp_name, $upload_file)) {
            $ruta_foto = 'imagenes/menu_principal/crear_nuevo/crear_producto/' . $new_filename;
        } else {
            error_log("Error al mover el archivo: " . error_get_last()['message']);
            continue;
        }
    }

    // TÍTULO: INSERCIÓN EN LA BASE DE DATOS
    $stmt->bind_param("ssdsi", $nombre_producto, $descripcion_producto, $precio_producto, $ruta_foto, $id_tipo_producto);
    
    if (!$stmt->execute()) {
        error_log("Error al insertar producto: " . $stmt->error);
    }
}

// Cerrar la consulta de inserción de productos
$stmt->close();

// Cerrar la conexión a la base de datos
$conn->close();

// Mensaje de éxito al guardar los productos
echo "Productos guardados correctamente.";

// TÍTULO: REDIRECCIÓN
header("Location: crear_producto_principal.php?success=1");
exit()
?>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
<link rel="stylesheet" href="../../../css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton3_crear_producto/procesar_productos.css">

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
<script src="../../js/menu_principal/crear_nuevo/crear_producto/get_tipo_productos.js"></script>
<!-- ------------------------------------------------------------------------------------------------------------
-------------------------------------- FIN ITred Spa Procesar Creacion producto .PHP -----------------------------------
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