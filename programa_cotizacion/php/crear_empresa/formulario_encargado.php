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
    ------------------------------------- INICIO ITred Spa Formulario encargado .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->
    
<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../css/crear_empresa/formulario_encargado.css">

<!-- TÍTULO: TABLA PARA AGREGAR ENCARGADOS -->
    <fieldset class="box-12 data-box"> 
        <legend>Datos encargado</legend>
        
        <!-- TÍTULO: TABLA QUE CONTIENE LOS DATOS DE LOS ENCARGADOS -->
            <!-- tag de la tabla encargado -->
            <table id="tabla-encargados" class="tabla-estilizada">
                <thead>
                    <tr>
                        <!-- TÍTULO: ENCABEZADO PARA EL RUT DEL ENCARGADO -->
                            <!-- Tag del rut -->
                            <th>RUT del Encargado</th>
                        <!-------------------------------------------------->

                        <!-- TÍTULO: ENCABEZADO PARA EL NOMBRE DEL ENCARGADO -->
                            <!-- Tag del nombre -->
                            <th>Nombre del Encargado</th>
                        <!-------------------------------------------------->

                        <!-- TÍTULO: ENCABEZADO PARA EL CARGO -->
                            <!-- Tag del cargo -->
                            <th>Cargo</th>
                        <!-------------------------------------------------->

                        <!-- TÍTULO: ENCABEZADO PARA EL EMAIL DEL ENCARGADO -->
                            <!-- Tag del Email -->
                            <th>Email del Encargado</th>
                        <!-------------------------------------------------->

                        <!-- TÍTULO: ENCABEZADO PARA EL TELÉFONO DEL ENCARGADO -->
                            <!-- Tag del teléfono -->
                            <th>Teléfono del Encargado</th>
                        <!-------------------------------------------------->

                        <!-- TÍTULO: ENCABEZADO PARA EL CELULAR DEL ENCARGADO -->
                            <!-- Tag del Celular -->
                            <th>Celular del Encargado</th>
                        <!-------------------------------------------------->

                        <!-- TÍTULO: NUEVA COLUMNA PARA ELIMINAR -->
                        <!-- Tag del Acción -->
                            <th>Acción</th>
                        <!-------------------------------------------------->

                    </tr>
                </thead>
                <tbody id="formulario-contenedor">
                    <tr>

                        <!-- TÍTULO: CAMPO DE ENTRADA PARA EL RUT DEL ENCARGADO -->
                            <!-- Tag del Email -->
                            <td><input type="text" name="encargado_rut[]" required minlength="3" maxlength="20" 
                                pattern="^[0-9]+[-kK0-9]{1}$" placeholder="Ejemplo: 12345678-9" oninput="formatoRut(this)"></td>

                        <!-- TÍTULO: CAMPO DE ENTRADA PARA EL NOMBRE DEL ENCARGADO -->
                            <!-- Tag del Email -->
                            <td><input type="text" name="encargado_nombre[]" required minlength="3" maxlength="255" 
                                pattern="^[A-Za-zÀ-ÿ\s.-]+$" placeholder="Ejemplo: Juan Pérez" oninput="QuitarCaracteresInvalidos(this)">
                            </td>
                            
                        <!-- TÍTULO: SELECCIÓN DEL CARGO DEL ENCARGADO -->
                            <!-- Selección de cargo -->
                            <td>
                                <select id="cargo-encargado" name="cargo_encargado[]" required>

                                </select>
                            </td>

                        <!-- TÍTULO: CAMPO DE ENTRADA PARA EL EMAIL DEL ENCARGADO -->
                            <!-- Ingresa el dato de entrada para el celular del encargado  -->
                            <td><input type="email" name="encargado_email[]" placeholder="ejemplo@empresa.com" maxlength="255" required></td>

                        <!-- TÍTULO: CAMPO DE ENTRADA PARA EL TELÉFONO DEL ENCARGADO -->
                            <!-- Ingresa el dato de entrada para el celular del encargado  -->
                            <td><input type="text" name="encargado_fono[]" placeholder="+56 9 1234 1234" maxlength="11" required></td>

                        <!-- TÍTULO: CAMPO DE ENTRADA PARA EL CELULAR DEL ENCARGADO -->
                            <!-- Ingresa el dato de entrada para el celular del encargado  -->
                            <td><input type="text" name="encargado_celular[]" placeholder="+56 9 1234 1234" maxlength="11" required oninput="asegurarMasYDetectarPais4()"></td>

                        <!-- TÍTULO: BOTÓN PARA ELIMINAR LA FILA CORRESPONDIENTE -->
                            <!-- Elimina la fila de todo el formulario -->
                            <td><button type="button" class="eliminar-fila" onclick="eliminarFila(this)">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>

        <!-- TÍTULO: BOTÓN PARA AGREGAR OTRO ENCARGADO -->
            <!-- Botón para agregar todos los datos del otro encargado -->
            <button type="button" onclick="agregarNuevaFila()">Agregar otro encargado</button>
    </fieldset>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->
    <!-- Llama al archivo JS -->
    <script src="../../js/crear_empresa/formulario_encargado.js"></script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $encargados_rut = $_POST['encargado_rut'];
    $encargados_nombre = $_POST['encargado_nombre'];
    $encargados_cargo = $_POST['cargo_encargado'];
    $encargados_email = $_POST['encargado_email'];
    $encargados_fono = $_POST['encargado_fono'];
    $encargados_celular = $_POST['encargado_celular'];

    // Recorre los datos y realiza la inserción en la base de datos

    for ($i = 0; $i < count($encargados_rut); $i++) {
        $rut_encargado = $encargados_rut[$i];
        $nombre_encargado = $encargados_nombre[$i];
        $cargo_encargado = $encargados_cargo[$i];
        $email_encargado = $encargados_email[$i];
        $fono_encargado = $encargados_fono[$i];
        $celular_encargado = $encargados_celular[$i];

    //-----------------------------------------------------------------------------//

        // Inserta cada encargado en la base de datos

        $sql_encargado = "INSERT INTO Em_Encargados (rut_encargado, nombre_encargado, id_tp_cargo, email_encargado, fono_encargado, celular_encargado, id_empresa)
                          VALUES ('$rut_encargado', '$nombre_encargado', '$cargo_encargado', '$email_encargado', '$fono_encargado', '$celular_encargado', $id_empresa)";
        $mysqli->query($sql_encargado);
    }
        //-----------------------------------------------------------------------------//

    echo "Encargados creados correctamente.";
}
?>
<!-- ----------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Formulario encargado  .PHP ----------------------------------------
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
