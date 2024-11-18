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
    ------------------------------------- INICIO ITred Spa producto .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

    <?php
// Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'ITredSpa_bd');
// Cerrar la conexión
$conn->close();
?>

// ... (existing code)

// Fetch products data
$sql_productos = "SELECT nombre_producto, cantidad, precio_unitario, total 
                  FROM C_Detalles 
                  WHERE id_titulo IN ($titulo_ids_list)";

$stmt_productos = $conn->prepare($sql_productos);
$stmt_productos->execute();
$result_productos = $stmt_productos->get_result();

$productos = [];
while ($row_producto = $result_productos->fetch_assoc()) {
    $productos[] = $row_producto;
}

$stmt_productos->close();
    
<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- llama al archivo css -->
    <link rel="stylesheet" href="../../../../css/menu_principal/crear_nuevo/producto/producto.css">

<!-- TÍTULO: PRODUCTOS -->
<div class="section productos">
    <h3>PRODUCTOS</h3>
    <table id="tabla-productos" class="tabla-productos">
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="productos-body">
            <!-- Products will be inserted here -->
        </tbody>
    </table>
    <button id="agregar-producto">Agregar Producto</button>
</div>

<!-- TÍTULO: TOTALES -->
<div class="resumen-precio">
    <table>
        <tr>
            <td><strong>Subtotal</strong></td>
            <td id="subtotal"><?php echo $subtotal; ?></td>
        </tr>
        <tr>
            <td><strong>IVA</strong></td>
            <td id="iva"><?php echo $iva; ?></td>
        </tr>
        <tr>
            <td><strong>Total</strong></td>
            <td id="total_final"><?php echo $total_final; ?></td>
        </tr>
    </table>
</div>

<!-- TÍTULO: IMPORTACIÓN DE ARCHIVO .JS -->

    <!-- llama al archivo JS -->
    <link rel="stylesheet" href="../../../../js/menu_principal/crear_nuevo/producto/producto.js">

<!-------------------------------------------------------------------------->

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa producto .PHP ----------------------------------------
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
