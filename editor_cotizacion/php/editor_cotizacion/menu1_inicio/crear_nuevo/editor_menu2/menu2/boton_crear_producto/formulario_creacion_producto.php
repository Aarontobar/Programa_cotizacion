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
    ------------------------------------- INICIO ITred Spa Formulario Creacion Porductos .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     <?php
// Establece la conexión a la base de datos de ITred Spa

$conn = new mysqli('localhost', 'root', '', 'editor_cotizacion_bd');
?>
<!-- ---------------------
     -- FIN CONEXION BD --
     --------------------- -->

<?php
// Obtener el ID de la empresa desde la URL

$id_empresa = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar los tipos de productos disponibles en la base de datos

$sql = "SELECT id_tipo_producto, tipo_producto, titulo FROM p_tipo_producto ORDER BY titulo, tipo_producto";
$result = $conn->query($sql);

// Preparar opciones para el select de tipos de productos
$options = "";
$currentTitulo = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($currentTitulo != $row["titulo"]) {
            if ($currentTitulo != "") {
                $options .= "</optgroup>";
            }
            $currentTitulo = $row["titulo"];
            $options .= "<optgroup label=\"" . htmlspecialchars($currentTitulo) . "\">";
        }
        $options .= "<option value=\"" . $row["id_tipo_producto"] . "\">" . htmlspecialchars($row["tipo_producto"]) . "</option>";
    }
    if ($currentTitulo != "") {
        $options .= "</optgroup>";
    }
} else {
    $options = "<option value=\"\">No hay tipos de productos disponibles</option>";
}

// Cierra la conexión a la base de datos después de obtener los tipos de productos

$conn->close();
?>
<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->
    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_producto/formulario_creacion_producto.css">

    <!-- Tag de subtitulo de crear producto -->
    <h2>Crear Productos</h2>

<!-- TITULO: FORMULARIO -->
    <!-- Formulario de los productos a crear -->
<form id="productos-form" action="php\editor_cotizacion\menu1_inicio\crear_nuevo\editor_menu2\menu2\boton_crear_producto\procesar_productos.php" method="post" enctype="multipart/form-data">
    <fieldset>

        <!-- TÍTULO PARA LOS DETALLES DEL PRODUCTO -->

            <!-- Tag de disposición -->
            <legend>Detalles del Producto</legend>
        
        <!-- Obtiene los datos de la tabla del formulario creación producto -->
        <table id="productos-table">
            <thead>
                <tr>
                    <!-- Columna para cada elemento -->
                    <th>Nombre del Producto</th> 
                    <th>Descripción</th> 
                    <th>Precio</th> 
                    <th>Foto</th> 
                    <th>Tipo de Producto</th> 
                    <th>Acción</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <!-- TÍTULO PARA EL CAMPO DE NOMBRE DEL PRODUCTO -->

                        <!-- Campo para el nombre del producto -->
                        <td>
                            <label for="nombre_producto">Nombre del Producto:</label>
                            <input type="text" name="nombre_producto[]" required>
                        </td>
                    
                    <!-- TÍTULO PARA EL CAMPO DE DESCRIPCIÓN DEL PRODUCTO -->

                        <!-- Campo para la descripción del producto -->
                        <td>
                            <label for="descripcion_producto">Descripción:</label>
                            <textarea name="descripcion_producto[]" rows="4"></textarea>
                        </td>

                    <!-- TÍTULO PARA EL CAMPO DE PRECIO DEL PRODUCTO -->

                        <!-- Campo para el precio del producto -->
                        <td>
                            <label for="precio_producto">Precio:</label>
                            <input type="number" step="0.01" name="precio_producto[]" required>
                        </td>
                    
                    <!-- TÍTULO PARA EL CAMPO DE FOTO DEL PRODUCTO -->

                        <!-- Campo para subir la foto del producto -->
                        <td>
                            <label for="foto_producto">Foto:</label>
                            <input type="file" name="foto_producto[]" accept="image/*">
                        </td>
                    
                    <!-- TÍTULO PARA EL SELECT DE TIPO DE PRODUCTO -->

                        <!-- Select para elegir el tipo de producto -->
                        <td>
                            <label for="id_tipo_producto">Tipo de Producto:</label>
                            <select name="id_tipo_producto[]" required>
                                <?php echo $options; ?> <!-- Opciones generadas desde la consulta a la base de datos -->
                            </select>
                        </td>
                    
                    <!-- TÍTULO PARA EL BOTÓN DE ELIMINAR FILA -->

                        <!-- Botón para eliminar la fila actual -->
                        <td>
                            <button type="button" onclick="removeRow(this)">Eliminar</button>
                        </td>

                </tr>
            </tbody>
        </table>
        
        <!-- Campo oculto para el ID de la empresa, que se enviará con el formulario -->

        <input type="hidden" name="id_empresa" value="<?php echo htmlspecialchars($id_empresa); ?>">
        
        <div class="form-group">

            <!-- TÍTULO PARA EL BOTÓN DE AGREGAR UN NUEVO PRODUCTO -->

                <!-- Select para elegir el tipo de producto -->
                <button type="button" class="btn-nuevo" onclick="addRow()">Nuevo Producto</button>
            
            <!-- TÍTULO PARA EL BOTÓN DE ENVIAR EL FORMULARIO Y GUARDAR LOS PRODUCTOS -->

                <!-- Select para guardar el botón -->
                <button type="submit" class="btn-guardar">Guardar Productos</button>

        </div>
    </fieldset>
</form>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_producto/formulario_creacion_producto.js"></script>


<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Formulario creacion producto .PHP ----------------------------------------
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