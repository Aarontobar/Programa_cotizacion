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
    ------------------------------------- INICIO ITred Spa Marca de agua .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
    <?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_cotizacion = (int) $_GET['id'];
} else {
    die("Error: ID de cotización no válida.");
}

//-------------------------------------------------------------------------//

// Consulta para obtener los datos de la empresa, cliente y detalles de la cotización
$query = "
    SELECT 
        cot.id_empresa,
        cot.numero_cotizacion,
        e.nombre_empresa,
        e.id_area_empresa,
        e.direccion_empresa,
        e.telefono_empresa,
        e.email_empresa,
        e.web_empresa,
        e.rut_empresa,
        e.id_foto,
        c.nombre_empresa_cliente,
        c.rut_empresa_cliente,
        c.direccion_empresa_cliente,
        c.id_giro,
        c.comuna_empresa_cliente,
        c.ciudad_empresa_cliente,
        c.telefono_empresa_cliente,
        cot.fecha_emision,
        cot.fecha_validez,
        enc.nombre_encargado,
        enc.rut_encargado,
        enc.email_encargado,
        enc.fono_encargado,
        enc.celular_encargado,
        ven.nombre_vendedor,
        ven.rut_vendedor,
        ven.email_vendedor,
        ven.fono_vendedor,
        ven.celular_vendedor
    FROM C_Cotizaciones cot
    JOIN C_Clientes c ON cot.id_cliente = c.id_cliente
    JOIN E_Empresa e ON cot.id_empresa = e.id_empresa
    JOIN C_Encargados enc ON cot.id_encargado = enc.id_encargado 
    JOIN Em_Vendedores ven ON cot.id_vendedor = ven.id_vendedor 
    WHERE cot.id_cotizacion = ?
";

//-------------------------------------------------------------------------//

// Preparar la consulta

$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_cotizacion);

//-------------------------------------------------------------------------//

// Ejecutar la consulta

$stmt->execute();

//-------------------------------------------------------------------------//

// Obtener los resultados

$result = $stmt->get_result();

//-------------------------------------------------------------------------//

// Verificar si hay resultados

if ($result->num_rows > 0) {
    $items = $result->fetch_all(MYSQLI_ASSOC);
    $id_empresa = $items[0]['id_empresa']; // Guardar id_empresa para la siguiente consulta
    $id_foto = $items[0]['id_foto']; // Guardar id_foto para cargar la imagen

    //-------------------------------------------------------------------------//

    $query_foto = "SELECT ruta_foto FROM fp_fotosperfil WHERE id_foto = ?";
    $stmt_foto = $mysqli->prepare($query_foto);
    $stmt_foto->bind_param("i", $id_foto);

    //-------------------------------------------------------------------------//
    
    // Ejecutar la consulta para la foto

    $stmt_foto->execute();
    $result_foto = $stmt_foto->get_result();

    //-------------------------------------------------------------------------//
    
    // Verificar si se encontró la foto

    if ($result_foto->num_rows > 0) {
        $foto = $result_foto->fetch_assoc();
        $ruta_foto = $foto['ruta_foto']; // Obtener la ruta de la foto
    } else {
        $ruta_foto = null; // No se encontró la foto
    }
} else {
    echo "No se encontró la cotización o la empresa relacionada.";
}
//-------------------------------------------------------------------------//
?>
    
<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/marca_de_agua.css">

<!-- Clase por defecto -->
<div class="marca_de_agua"></div> 

<!-- Div para texto personalizado -->
<div id="textoPersonalizado" class="texto-personalizado"></div> 

<!-- TÍTULO: FORMULARIO PARA CAMBIAR LA MARCA DE AGUA -->

    <!-- Formulario para cambiar la marca de agua -->
<form id="form-marca-agua" method="POST" action="" enctype="multipart/form-data">

<!-- TÍTULO: SELECCIONAR MARCA DE AGUA -->
        
    <!-- Seleccionar marca de agua -->
    <label for="marca_agua">Seleccionar marca de agua:</label><br>
    
<!-- TÍTULO: OPCIÓN DE NOMBRE DE EMPRESA -->
    
    <!-- Seleccionar el nombre de la empresa -->
    <input type="radio" id="nombre_empresa" name="marca_agua" value="nombre_empresa" onchange="actualizarMarcaAgua()" checked>
    <label for="nombre_empresa">Nombre de la empresa</label><br>

<!-- TÍTULO: OPCIÓN DE FOTO DE EMPRESA -->

    <!-- Seleccionar opciones de la foto de la empresa -->
    <input type="radio" id="foto_empresa" name="marca_agua" value="foto_empresa" onchange="actualizarMarcaAgua()">
    <label for="foto_empresa">Foto de la empresa</label><br>

<!-- TÍTULO: OPCIÓN DE IMAGEN PERSONALIZADA -->

    <!-- Seleccionar opciones de imagen personalizada -->
    <input type="radio" id="imagen_personalizada" name="marca_agua" value="imagen_personalizada" onchange="subirImagen()">
    <label for="imagen_personalizada">Imagen Personalizada:</label>
    <input type="file" id="input_imagen_personalizada" name="imagen_personalizada" accept="image/*" style="display:none;">
    
<!-- TÍTULO: OPCIÓN DE TEXTO PERSONALIZADO -->

    <!-- Seleccionar opción de texto personalizado -->
    <input type="radio" id="texto_personalizado" name="marca_agua" value="texto_personalizado" onchange="activarTextoPersonalizado()">
    <label for="texto_personalizado">Texto Personalizado:</label>
    <input type="text" id="input_texto_personalizado" name="texto_personalizado" placeholder="Ingresa tu texto aquí" oninput="actualizarTexto()" style="display:none;">

    <br><br>
    
<!-- TÍTULO: DISPOSICIÓN DE LA MARCA DE AGUA -->

    <!-- Seleccionar disposiciones de la marca de agua -->
    <label for="disposicion">Disposición de la marca de agua:</label>
    <select name="disposicion" id="disposicion" onchange="actualizarMarcaAgua()">
        <option value="patron" selected>Patrón</option>
        <option value="centro">Centrado</option>
    </select>

<!-- TÍTULO: ÁNGULO DE ROTACIÓN -->

    <!-- Seleccionar ángulo de rotación -->
    <label for="angulo_rotacion">Ángulo de Rotación (grados):</label>
    <input type="range" name="angulo_rotacion" id="angulo_rotacion" value="0" min="-180" max="180" oninput="actualizarRotacion(this.value)">
    <span id="anguloValor">0</span> grados

<!-- TÍTULO: TAMAÑO DE LA MARCA DE AGUA -->

    <!-- Seleccionar tamaño de la marca de la agua -->
    <label for="tamano">Tamaño de la marca de agua (en píxeles):</label>
    <input type="range" name="tamano" id="tamano" value="30" min="10" max="1000" oninput="actualizarTamano(this.value)">
    <span id="tamanoValor">30</span> px
</form>

<script>
    function activarTextoPersonalizado() {
        document.getElementById('input_texto_personalizado').style.display = 'inline';
        document.getElementById('input_imagen_personalizada').style.display = 'none'; // Asegúrate de ocultar la carga de imagen
    }

    //-------------------------------------------------------------------------//

    let imagenSubida = null; // Variable global para almacenar la imagen personalizada

    //-------------------------------------------------------------------------//

    function actualizarMarcaAgua() {
        const marcaAguaSeleccionada = document.querySelector('input[name="marca_agua"]:checked').value;
        const disposicionSeleccionada = document.getElementById('disposicion').value;
        const anguloRotacion = document.getElementById('angulo_rotacion').value; // Obtener el ángulo de rotación

        const marca_de_agua = document.querySelector('.marca_de_agua');
        const textoPersonalizadoDiv = document.getElementById('textoPersonalizado');

        // Obtener el contenedor principal
        const contenedor = document.querySelector('.ver');

        // Ajustar el tamaño de la marca de agua al tamaño del contenedor
        marca_de_agua.style.width = contenedor.offsetWidth + 'px';
        marca_de_agua.style.height = contenedor.offsetHeight + 'px';

        // Ocultar todas las marcas de agua
        marca_de_agua.style.display = 'none'; 
        textoPersonalizadoDiv.style.display = 'none'; // Ocultar texto personalizado inicialmente

        // Limpiar el fondo de la marca de agua, excepto si es imagen personalizada
        if (marcaAguaSeleccionada !== 'imagen_personalizada') {
            marca_de_agua.style.backgroundImage = 'none';
            imagenSubida = null; // Reiniciar la variable si se cambia a otra opción
        }

        textoPersonalizadoDiv.innerHTML = ''; // Limpiar texto personalizado

        // Establecer la marca de agua según la opción seleccionada
        if (marcaAguaSeleccionada === 'nombre_empresa') {
            textoPersonalizadoDiv.innerHTML = '<?php echo $items[0]["nombre_empresa"]; ?>';
            textoPersonalizadoDiv.style.display = 'block'; // Mostrar texto
        } else if (marcaAguaSeleccionada === 'foto_empresa') {
            marca_de_agua.style.backgroundImage = 'url(<?php echo $ruta_foto; ?>)';
            marca_de_agua.style.backgroundSize = 'cover'; // Asegurarse de que la imagen cubra todo el espacio
        } else if (marcaAguaSeleccionada === 'texto_personalizado') {
            textoPersonalizadoDiv.innerHTML = document.getElementById('input_texto_personalizado').value;
            textoPersonalizadoDiv.style.display = 'block'; // Mostrar texto
        } else if (marcaAguaSeleccionada === 'imagen_personalizada' && imagenSubida) {
            marca_de_agua.style.backgroundImage = 'url(' + imagenSubida + ')';
            marca_de_agua.style.backgroundSize = 'cover'; // Asegurarse de que la imagen cubra todo el espacio
            marca_de_agua.style.display = 'block'; // Mostrar la marca de agua con la imagen personalizada
        }

        // Aplicar disposición
        if (disposicionSeleccionada === 'patron') {
            marca_de_agua.style.backgroundRepeat = 'repeat'; // Repetir el fondo
        } else if (disposicionSeleccionada === 'centro') {
            marca_de_agua.classList.add('centrado-marca_de_agua');
            marca_de_agua.style.backgroundRepeat = 'no-repeat'; // No repetir la imagen
        }

        // Aplicar rotación y centrado
        marca_de_agua.style.transform = 'rotate(' + anguloRotacion + 'deg)'; // Aplicar la rotación
        textoPersonalizadoDiv.style.transform = 'translate(-50%, -50%) rotate(' + anguloRotacion + 'deg)'; // Centrar y rotar el texto

        // Mostrar la marca de agua
        marca_de_agua.style.display = 'block';
        actualizarTamano(document.getElementById('tamano').value); // Aplicar tamaño
    }

    function subirImagen() {
        const inputImagen = document.getElementById('input_imagen_personalizada');
        inputImagen.click(); // Abrir el diálogo de carga de imagen
        inputImagen.onchange = function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenSubida = e.target.result; // Guardar la imagen subida en la variable global
                    const marca_de_agua = document.querySelector('.marca_de_agua');
                    marca_de_agua.style.backgroundImage = 'url(' + imagenSubida + ')';
                    marca_de_agua.style.display = 'block'; // Mostrar la marca de agua
                }
                reader.readAsDataURL(file);
            }
        }
    }

    //-------------------------------------------------------------------------//

    function actualizarTamano(tamano) {
        const marca_de_agua = document.querySelector('.marca_de_agua');
        marca_de_agua.style.backgroundSize = tamano + 'px'; // Ajustar el tamaño
        document.getElementById('tamanoValor').textContent = tamano; // Actualizar el valor mostrado

        // Ajustar el tamaño del texto

        const textoPersonalizadoDiv = document.getElementById('textoPersonalizado');
        textoPersonalizadoDiv.style.fontSize = tamano + 'px'; // Actualiza el tamaño del texto
    }

    //-------------------------------------------------------------------------//

    function actualizarRotacion(angulo) {
        const anguloValor = document.getElementById('anguloValor');
        anguloValor.textContent = angulo; // Actualiza el texto que muestra el ángulo
        actualizarMarcaAgua(); // Actualiza la marca de agua con el nuevo ángulo
    }

    //-------------------------------------------------------------------------//

    function actualizarTexto() {
        const textoPersonalizadoDiv = document.getElementById('textoPersonalizado');
        textoPersonalizadoDiv.innerHTML = document.getElementById('input_texto_personalizado').value;
    }

    //-------------------------------------------------------------------------//

    // Inicializar la marca de agua al cargar

    window.onload = function() {
        actualizarMarcaAgua();
    };
</script>

<!-------------------------------------------------------------------------->

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="js/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/marca_de_agua.js"></script>


<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa  Marca de agua .PHP -----------------------------------
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
