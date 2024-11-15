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
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<?php
// Obtener el ID de la empresa desde el formulario
$id_empresa = isset($_POST['id_empresa']) ? intval($_POST['id_empresa']) : 0;

//--------------------------------------------------------------------//

// Verificar si el ID de la empresa existe en la tabla e_empresa
$check_query = $conn->prepare("SELECT id_empresa FROM e_empresa WHERE id_empresa = ?");
$check_query->bind_param("i", $id_empresa);
$check_query->execute();
$check_query->store_result();

//--------------------------------------------------------------------//

// Si no se encuentra el ID de la empresa, mostrar un error y detener la ejecución
if ($check_query->num_rows === 0) {
    die("El ID de la empresa no existe en la base de datos.");
}

//--------------------------------------------------------------------//

// Cierra la consulta de verificación
$check_query->close();

//--------------------------------------------------------------------//

// Preparar la consulta de inserción para los productos
$stmt = $conn->prepare("INSERT INTO P_Productos (nombre_producto, descripcion_producto, precio_producto, id_foto, id_tipo_producto, id_empresa) VALUES (?, ?, ?, ?, ?, ?)");

//--------------------------------------------------------------------//

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

//--------------------------------------------------------------------//

// Procesar cada producto del formulario

foreach ($_POST['nombre_producto'] as $index => $nombre_producto) {

    // Obtener los datos del producto del formulario

    $descripcion_producto = $_POST['descripcion_producto'][$index];
    $precio_producto = $_POST['precio_producto'][$index];
    $id_tipo_producto = $_POST['id_tipo_producto'][$index];

    //--------------------------------------------------------------------//

    // Verificar si se ha subido una imagen

    $empresa_id_foto = null; // Inicializa la variable para el ID de la foto
    if (isset($_FILES['foto_producto']['error'][$index]) && $_FILES['foto_producto']['error'][$index] == UPLOAD_ERR_OK) {
        $upload_dir = '../../imagenes/programa_cotizacion/'; // Ruta relativa para subir imágenes
        $tmp_name = $_FILES['foto_producto']['tmp_name'][$index]; // Ruta temporal del archivo subido
        $name = basename($_FILES['foto_producto']['name'][$index]); // Nombre del archivo

        // Validar el tipo de archivo de imagen

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['foto_producto']['type'][$index], $allowed_types)) {
            die("Error: Tipo de archivo no permitido.");
        }

        //--------------------------------------------------------------------//

        $upload_file = $upload_dir . $name; // Ruta completa donde se guardará la imagen

        //--------------------------------------------------------------------//

        // Mover el archivo cargado al directorio de destino

        if (move_uploaded_file($tmp_name, $upload_file)) {
            echo "Imagen subida correctamente.";

            // Insertar la ruta de la foto en la tabla e_fotosPerfil

            $sql_foto = "INSERT INTO e_fotosPerfil (ruta_foto) VALUES (?)";
            $stmt_foto = $conn->prepare($sql_foto);
            $stmt_foto->bind_param("s", $upload_file);
            
            //--------------------------------------------------------------------//

            // Ejecutar la inserción de la foto

            if ($stmt_foto->execute()) {
                echo "Foto del perfil insertada correctamente.";

                // Obtener el ID de la foto recién insertada

                $empresa_id_foto = $conn->insert_id;

                //--------------------------------------------------------------------//

            } else {
                die("Error al insertar la foto del perfil: " . $stmt_foto->error);
            }
            $stmt_foto->close();
        } else {
            die("Error al subir la imagen.");
        }
    }

    // Insertar el producto con la posible imagen (id_foto)

    $stmt->bind_param("ssiiii", $nombre_producto, $descripcion_producto, $precio_producto, $empresa_id_foto, $id_tipo_producto, $id_empresa);
    
    //--------------------------------------------------------------------//

    // Ejecutar la inserción del producto

    if (!$stmt->execute()) {
        echo "Error al insertar producto: " . $stmt->error;
    }

    //--------------------------------------------------------------------//

}

//--------------------------------------------------------------------//

// Cerrar la consulta de inserción de productos

$stmt->close();

//--------------------------------------------------------------------//

// Cerrar la conexión a la base de datos

$conn->close();

//--------------------------------------------------------------------//

// Mensaje de éxito al guardar los productos
echo "Productos guardados correctamente.";
?>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../css/crear_producto/procesar_productos.css">

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="../../js/crear_producto/get_tipo_productos.js"></script>

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