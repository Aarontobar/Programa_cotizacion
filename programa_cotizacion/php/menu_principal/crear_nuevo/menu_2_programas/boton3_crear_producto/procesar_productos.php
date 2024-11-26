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

// Obtener el ID de la empresa desde el formulario
$id_empresa = isset($_POST['id_empresa']) ? intval($_POST['id_empresa']) : 0;

// Verificar si el ID de la empresa existe en la tabla e_empresa
$check_query = $conn->prepare("SELECT id_empresa FROM e_empresa WHERE id_empresa = ?");
$check_query->bind_param("i", $id_empresa);
$check_query->execute();
$check_query->store_result();

// Si no se encuentra el ID de la empresa, mostrar un error y detener la ejecución
if ($check_query->num_rows === 0) {
    die("El ID de la empresa no existe en la base de datos.");
}

// Cierra la consulta de verificación
$check_query->close();

// Preparar la consulta de inserción para los productos
$stmt = $conn->prepare("INSERT INTO productos (nombre_producto, descripcion, precio, ruta_foto, tipo_producto) VALUES (?, ?, ?, ?, ?)");

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Procesar cada producto del formulario
foreach ($_POST['nombre_producto'] as $index => $nombre_producto) {
    // Obtener los datos del producto del formulario
    $descripcion_producto = $_POST['descripcion_producto'][$index];
    $precio_producto = $_POST['precio_producto'][$index];
    $id_tipo_producto = $_POST['id_tipo_producto'][$index];

    // Verificar si se ha subido una imagen
    $ruta_foto = null; // Inicializa la variable para la ruta de la foto
    if (isset($_FILES['foto_producto']['error'][$index]) && $_FILES['foto_producto']['error'][$index] == UPLOAD_ERR_OK) {
        $upload_dir = '../../imagenes/menu_principal/crear_nuevo/crear_producto/'; // Ruta relativa para subir imágenes
        $tmp_name = $_FILES['foto_producto']['tmp_name'][$index]; // Ruta temporal del archivo subido
        $name = basename($_FILES['foto_producto']['name'][$index]); // Nombre del archivo

        // Validar el tipo de archivo de imagen
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['foto_producto']['type'][$index], $allowed_types)) {
            die("Error: Tipo de archivo no permitido.");
        }

        $upload_file = $upload_dir . $name; // Ruta completa donde se guardará la imagen

        // Mover el archivo cargado al directorio de destino
        if (move_uploaded_file($tmp_name, $upload_file)) {
            echo "Imagen subida correctamente.";
            $ruta_foto = $upload_file; // Asigna la ruta de la foto
        } else {
            die("Error al subir la imagen.");
        }
    }

    // Insertar el producto con la posible imagen (ruta_foto)
    $stmt->bind_param("ssdsi", $nombre_producto, $descripcion_producto, $precio_producto, $ruta_foto, $id_tipo_producto);

    // Ejecutar la inserción del producto
    if (!$stmt->execute()) {
        echo "Error al insertar producto: " . $stmt->error;
    }
}

// Cerrar la consulta de inserción de productos
$stmt->close();

// Cerrar la conexión a la base de datos
$conn->close();

// Mensaje de éxito al guardar los productos
echo "Productos guardados correctamente.";
?>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
<link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/menu_2_programas/boton3_crear_producto/procesar_productos.css">

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