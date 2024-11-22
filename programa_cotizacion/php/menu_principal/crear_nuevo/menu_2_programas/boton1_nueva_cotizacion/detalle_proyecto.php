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
    ------------------------------------- INICIO ITred Spa Detalle proyecto.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->


    <?php
    // Consulta para obtener los proyectos
    $sql = "SELECT id_proyecto, nombre_proyecto, codigo_proyecto, id_tp_trabajo, id_area, id_tp_riesgo, descripcion_riesgo, dias_compra, dias_trabajo, trabajadores, horario, colacion, entrega FROM C_Proyectos";
    $result = $mysqli->query($sql);

    if ($result === false) {
        die("Error en la consulta: " . $mysqli->error);
    }

    $proyectos = [];
    while ($row = $result->fetch_assoc()) {
        $proyectos[] = $row;
    }
?>

<!-- TITULO: ARCHIVO CSS -->

    <!-- llama al archivo css -->
    <link rel="stylesheet" href="../../css/menu_principal/crear_nuevo/menu_2_programas/boton1_nueva_cotizacion/detalle_proyecto.css">



<!-- Crea una caja para ingresar datos, ocupando 6 de las 12 columnas disponibles en el diseño -->
<fieldset class="box-6 cuadro-datos">
    <legend>Datos proyecto</legend>

    <!-- Barra de búsqueda para filtrar proyectos -->
    <div class="form-group">
        <label for="buscar_proyecto">Buscar Proyecto:</label>
        <input type="text" id="buscar_proyecto" oninput="filtrarProyectos()" placeholder="Ingresa el nombre del proyecto">
    </div>


    <!-- Select para elegir la opción "Nuevo" o un proyecto existente -->
    <div class="form-group">
        <label for="opcion_formulario">Selecciona una opción</label>
        <select id="opcion_formulario" onchange="mostrarFormulario()">
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="nuevo">Nuevo</option>
            <?php foreach ($proyectos as $proyecto): ?>
                <option value="<?php echo $proyecto['id_proyecto']; ?>"><?php echo htmlspecialchars($proyecto['nombre_proyecto']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <script>
    function filtrarProyectos() {
        var input = document.getElementById('buscar_proyecto');
        var filter = input.value.toLowerCase();
        var select = document.getElementById('opcion_formulario');
        var options = select.getElementsByTagName('option');

        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            var text = option.textContent || option.innerText;
            if (text.toLowerCase().indexOf(filter) > -1 || option.value === "") {
                option.style.display = "";
            } else {
                option.style.display = "none";
            }
        }
    }
    </script>
    <!-- Div que contiene el formulario, inicialmente oculto -->
    <div id="formulario_proyecto" style="display: none;">
        <div class="form-group-inline">
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA EL NOMBRE DEL PROYECTO -->
                <label for="proyecto_nombre">Nombre</label>
                <input type="text" id="proyecto_nombre" name="proyecto_nombre" required 
                    pattern="^[A-Za-zÀ-ÿ0-9\s&.-]+$" 
                    title="Por favor, ingrese solo letras, números y caracteres como &,-."
                    oninput="QuitarCaracteresInvalidos(this)"
                    placeholder="Ejemplo: Mi Proyecto 1">
            </div>
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA EL CÓDIGO DEL PROYECTO -->
                <label for="proyecto_codigo">Código</label>
                <input type="text" id="proyecto_codigo" name="proyecto_codigo" 
                    placeholder="Introduce un código único" 
                    required 
                    maxlength="10" 
                    pattern="^[a-zA-Z0-9-_]{1,10}$" 
                    oninput="QuitarCaracteresInvalidos(this)"
                    title="Ingresa un código de hasta 10 caracteres (letras, números, guiones y guiones bajos).">
            </div>
        </div>
        <div class="form-group-inline">
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA EL ÁREA DE TRABAJO -->
                <label for="area_trabajo">Área de Trabajo:</label>
                <select id="area_trabajo" name="area_trabajo" required>
                <option value="" disabled selected>Selecciona un área</option>
                    <?php
                    $sql_tp_trabajo = "SELECT id_area, nombre_area FROM tp_area";
                    $result_tp_trabajo = $mysqli->query($sql_tp_trabajo);
                    if ($result_tp_trabajo === false) {
                        die("Error en la consulta: " . $mysqli->error);
                    }
                    while ($row_tp_trabajo = $result_tp_trabajo->fetch_assoc()) {
                        echo '<option value="' . $row_tp_trabajo['id_area'] . '">' . htmlspecialchars($row_tp_trabajo['nombre_area']) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <!-- TÍTULO: CAMPO PARA EL TIPO DE TRABAJO -->
                <label for="tipo_trabajo">Tipo de Trabajo:</label>
                <select id="tipo_trabajo" name="tipo_trabajo" required>
                    <option value="" disabled selected>Selecciona un tipo de trabajo</option>
                    <?php
                    $sql_tp_trabajo = "SELECT id_tp_trabajo, nombre_trabajo FROM tp_trabajo";
                    $result_tp_trabajo = $mysqli->query($sql_tp_trabajo);
                    if ($result_tp_trabajo === false) {
                        die("Error en la consulta: " . $mysqli->error);
                    }
                    while ($row_tp_trabajo = $result_tp_trabajo->fetch_assoc()) {
                        echo '<option value="' . $row_tp_trabajo['id_tp_trabajo'] . '">' . htmlspecialchars($row_tp_trabajo['nombre_trabajo']) . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <!-- TÍTULO: CAMPO PARA EL RIESGO -->
            <label for="riesgo">Riesgo:</label>
            <select id="riesgo" name="riesgo" required>
                <option value="" disabled selected>Selecciona un riesgo</option>
                <?php
                    $sql_tp_riesgo = "SELECT id_tp_riesgo, nombre_riesgo FROM tp_riesgo";
                    $result_tp_riesgo = $mysqli->query($sql_tp_riesgo);
                    if ($result_tp_riesgo === false) {
                        die("Error en la consulta: " . $mysqli->error);
                    }
                    while ($row_tp_riesgo = $result_tp_riesgo->fetch_assoc()) {
                        echo '<option value="' . $row_tp_riesgo['id_tp_riesgo'] . '">' . htmlspecialchars($row_tp_riesgo['nombre_riesgo']) . '</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <!-- TÍTULO: CAMPO PARA LA DESCRIPCIÓN DEL RIESGO -->
            <label for="riesgo_descripcion">Descripción de riesgo</label>
            <input type="text" id="riesgo_descripcion" name="riesgo_descripcion" required 
                pattern="^[A-Za-zÀ-ÿ0-9\s&.-]+$" 
                title="Por favor, ingrese solo letras, números y caracteres como &,-."
                oninput="QuitarCaracteresInvalidos(this)"
                placeholder="Ejemplo: Riesgo de retraso en la entrega">
        </div>
    </div>
</fieldset>

<!-- Crea otra caja para ingresar datos, ocupando las otras 6 columnas. Se aplica una clase adicional "cuadro-datos-left" para estilo -->
<fieldset class="box-6 cuadro-datos cuadro-datos-left">
    <legend>-</legend>
    <div class="form-group-inline">
        <div class="form-group">
            <!-- TÍTULO: CAMPO PARA LOS DÍAS DE COMPRA -->
            <label for="dias_compra">Días de Compra:</label>
            <input type="number" id="dias_compra" name="dias_compra" placeholder="ingrese N° de dias" oninput="QuitarCaracteresInvalidos(this)">
        </div>
        <div class="form-group">
            <!-- TÍTULO: CAMPO PARA LOS DÍAS DE TRABAJO -->
            <label for="dias_trabajo">Días de Trabajo:</label>
            <input type="number" id="dias_trabajo" name="dias_trabajo" placeholder="ingrese N° de dias" oninput="QuitarCaracteresInvalidos(this)">
        </div>
    </div>
    <div class="form-group">
        <!-- TÍTULO: CAMPO PARA EL NÚMERO DE TRABAJADORES -->
        <label for="trabajadores">Número de Trabajadores:</label>
        <input type="number" id="trabajadores" name="trabajadores" placeholder="N° trabajadores" oninput="QuitarCaracteresInvalidos(this)">
    </div>
    <div class="form-group-inline">
        <div class="form-group">
            <!-- TÍTULO: CAMPO PARA EL HORARIO -->
            <label for="horario">Horario:</label>
            <input type="text" id="horario" name="horario" 
                placeholder="Ej: 08:00 a 18:00" 
                pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9] a ([01]?[0-9]|2[0-3]):[0-5][0-9]$" 
                oninput="QuitarCaracteresInvalidos(this)"
                title="Ingresa un horario válido (Ej: 08:00 a 18:00).">
        </div>
        <div class="form-group">
            <!-- TÍTULO: CAMPO PARA LA COLACIÓN -->
            <label for="colacion">Colación:</label>
            <input type="text" id="colacion" name="colacion" 
                placeholder="Ej: Sí o No" 
                pattern="^[a-zA-Z0-9-_]{1,10}$" 
                oninput="QuitarCaracteresInvalidos(this)"
                title="Ingresa 'Sí' o 'No'.">
        </div>
    </div>
    <div class="form-group">
        <!-- TÍTULO: CAMPO PARA LA ENTREGA -->
        <label for="entrega">Entrega:</label>
        <input type="text" id="entrega" name="entrega" 
            placeholder="Ej: Lunes, Martes" 
            required 
            pattern="^[a-zA-Z0-9-_]{1,10}$" 
            oninput="QuitarCaracteresInvalidos(this)"
            title="Ingresa un día de la semana (Ej: Lunes, Martes, etc.). Solo se permiten nombres de días.">
    </div>
</fieldset>

<script>
function mostrarFormulario() {
    var select = document.getElementById('opcion_formulario');
    var formulario = document.getElementById('formulario_proyecto');
    if (select.value === 'nuevo') {
        formulario.style.display = 'block';
        document.getElementById('proyecto_nombre').value = '';
        document.getElementById('proyecto_codigo').value = '';
        document.getElementById('area_trabajo').value = '';
        document.getElementById('tipo_trabajo').value = '';
        document.getElementById('riesgo').value = '';
        document.getElementById('riesgo_descripcion').value = '';
        document.getElementById('dias_compra').value = '';
        document.getElementById('dias_trabajo').value = '';
        document.getElementById('trabajadores').value = '';
        document.getElementById('horario').value = '';
        document.getElementById('colacion').value = '';
        document.getElementById('entrega').value = '';
    } else {
        var proyecto = null;
        <?php foreach ($proyectos as $proyecto): ?>
            if (select.value == '<?php echo $proyecto['id_proyecto']; ?>') {
                proyecto = {
                    nombre_proyecto: '<?php echo addslashes($proyecto['nombre_proyecto']); ?>',
                    codigo_proyecto: '<?php echo addslashes($proyecto['codigo_proyecto']); ?>',
                    id_area: '<?php echo $proyecto['id_area']; ?>',
                    id_tp_trabajo: '<?php echo $proyecto['id_tp_trabajo']; ?>',
                    id_tp_riesgo: '<?php echo $proyecto['id_tp_riesgo']; ?>',
                    descripcion_riesgo: '<?php echo addslashes($proyecto['descripcion_riesgo']); ?>',
                    dias_compra: '<?php echo $proyecto['dias_compra']; ?>',
                    dias_trabajo: '<?php echo $proyecto['dias_trabajo']; ?>',
                    trabajadores: '<?php echo $proyecto['trabajadores']; ?>',
                    horario: '<?php echo addslashes($proyecto['horario']); ?>',
                    colacion: '<?php echo addslashes($proyecto['colacion']); ?>',
                    entrega: '<?php echo addslashes($proyecto['entrega']); ?>'
                };
            }
        <?php endforeach; ?>
        
        if (proyecto) {
            document.getElementById('proyecto_nombre').value = proyecto.nombre_proyecto;
            document.getElementById('proyecto_codigo').value = proyecto.codigo_proyecto;
            document.getElementById('area_trabajo').value = proyecto.id_area;
            document.getElementById('tipo_trabajo').value = proyecto.id_tp_trabajo;
            document.getElementById('riesgo').value = proyecto.id_tp_riesgo;
            document.getElementById('riesgo_descripcion').value = proyecto.descripcion_riesgo;
            document.getElementById('dias_compra').value = proyecto.dias_compra;
            document.getElementById('dias_trabajo').value = proyecto.dias_trabajo;
            document.getElementById('trabajadores').value = proyecto.trabajadores;
            document.getElementById('horario').value = proyecto.horario;
            document.getElementById('colacion').value = proyecto.colacion;
            document.getElementById('entrega').value = proyecto.entrega;
            formulario.style.display = 'block';
        }
    }
}
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibir datos del formulario para C_Proyectos

    $proyecto_nombre = isset($_POST['proyecto_nombre']) ? trim($_POST['proyecto_nombre']) : null;
    $proyecto_codigo = isset($_POST['proyecto_codigo']) ? trim($_POST['proyecto_codigo']) : null;
    $tipo_trabajo = 1;
    $area_trabajo = 1;
    $riesgo = 1;
    $riesgo_descripcion = isset($_POST['riesgo_descripcion']) ? trim($_POST['riesgo_descripcion']) : null; // Nueva variable
    $dias_compra = isset($_POST['dias_compra']) ? $_POST['dias_compra'] : null;
    $dias_trabajo = isset($_POST['dias_trabajo']) ? $_POST['dias_trabajo'] : null;
    $trabajadores = isset($_POST['trabajadores']) ? $_POST['trabajadores'] : null;
    $horario = isset($_POST['horario']) ? $_POST['horario'] : null;
    $colacion = isset($_POST['colacion']) ? $_POST['colacion'] : null;
    $entrega = isset($_POST['entrega']) ? $_POST['entrega'] : null;

    if ($proyecto_nombre && $proyecto_codigo) {

        // Insertar o actualizar el proyecto

        $sql = "INSERT INTO C_Proyectos (nombre_proyecto, codigo_proyecto, id_tp_trabajo, id_area, id_tp_riesgo, descripcion_riesgo, dias_compra, dias_trabajo, trabajadores, horario, colacion, entrega)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    nombre_proyecto=VALUES(nombre_proyecto), 
                    codigo_proyecto=VALUES(codigo_proyecto), 
                    id_tp_trabajo=VALUES(id_tp_trabajo), 
                    id_area=VALUES(id_area), 
                    id_tp_riesgo=VALUES(id_tp_riesgo),
                    descripcion_riesgo=VALUES(descripcion_riesgo),
                    dias_compra=VALUES(dias_compra),
                    dias_trabajo=VALUES(dias_trabajo),
                    trabajadores=VALUES(trabajadores),
                    horario=VALUES(horario),
                    colacion=VALUES(colacion),
                    entrega=VALUES(entrega)";
    
        $stmt = $mysqli->prepare($sql);
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $mysqli->error);
        }
        $stmt->bind_param("ssssssiiisss", 
            $proyecto_nombre, 
            $proyecto_codigo, 
            $tipo_trabajo, 
            $area_trabajo, 
            $riesgo, 
            $riesgo_descripcion, // Nueva variable para descripción de riesgo
            $dias_compra, 
            $dias_trabajo, 
            $trabajadores, 
            $horario, 
            $colacion, 
            $entrega
        );
        $stmt->execute();
        if ($stmt->error) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }
        
        $id_proyecto = $mysqli->insert_id;
        echo "Proyecto insertado/actualizado. ID: $id_proyecto<br>";
    } else {
        echo "El nombre y el código del proyecto son obligatorios.";
    }
}
?>

     <!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Detalle proyecto.PHP ----------------------------------------
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