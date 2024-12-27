/* 
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ 
*/


/* --------------------------------------------------------------------------------------------------------------
    -------------------------------------- INICIO ITred Spa Formulario encargado  .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */


// TÍTULO PARA CARGAR CARGO DEL ENCARGADO

    // Función para cargar los tipo de cargo
    function CargarCargoEncargadO(idSelect) {
        // Realiza una solicitud para obtener la lista de cargos desde el servidor
        fetch('../../../php/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_crear_empresa/get_cargo_encargado.php')
            .then(response => response.text())
            .then(data => {
                const select = document.getElementById(idSelect); // Obtener el elemento select por su ID único
                select.innerHTML = data;  // Insertar directamente las opciones generadas en el select
            })
            .catch(error => console.error('Error al cargar cargos del encargado:', error)); // Manejar errores de la solicitud
    }


// TÍTULO: AGREGAR NUEVA FILA

    // Función para agregar una nueva fila al formulario
    function agregarNuevaFila() {
        var tabla = document.getElementById('formulario-contenedor'); // Obtiene la tabla
        var nuevaFila = document.createElement('tr'); // Crea una nueva fila
        
        // Genera un ID único para el nuevo select
        var idUnico = 'cargo-encargado-' + (tabla.getElementsByTagName('tr').length + 1);

        // Contenido de la nueva fila
        nuevaFila.innerHTML = `
            <td>
                <input type="text" name="encargado_rut[]" required minlength="3" maxlength="20" 
                    pattern="^[0-9]+[-kK0-9]{1}$" placeholder="Ejemplo: 12345678-9" oninput="formatoRut(this)">
            </td>
            <td>
                <input type="text" name="encargado_nombre[]" required minlength="3" maxlength="255" 
                    pattern="^[A-Za-zÀ-ÿ\s.-]+$" placeholder="Ejemplo: Juan Pérez" oninput="QuitarCaracteresInvalidos(this)">
            </td>
            <td>
                <select id="${idUnico}" name="cargo_encargado[]" required>
                </select>
            </td>
            <td>
                <input type="email" name="encargado_email[]" placeholder="ejemplo@empresa.com" maxlength="255" required>
            </td>
            <td>
                <input type="text" name="encargado_fono[]" placeholder="+56 9 1234 1234" maxlength="11" required>
            </td>
            <td>
                <input type="text" name="encargado_celular[]" placeholder="+56 9 1234 1234" maxlength="11" required>
            </td>
            <td>
                <button type="button" class="eliminar-fila" onclick="eliminarFila(this)">Eliminar</button>
            </td>
        `;
        
        tabla.appendChild(nuevaFila); // Agrega la nueva fila a la tabla

        // Cargar los cargos en el nuevo select usando el ID único
        CargarCargoEncargadO(idUnico);
    }


// TÍTULO: ELIMINAR FILA

    // Función para eliminar una fila del formulario
    function eliminarFila(boton) {
        // Encuentra la fila que contiene el botón y la elimina
        var fila = boton.closest('tr'); // Encuentra la fila más cercana
        fila.remove(); // Elimina la fila
    }


// TÍTULO: ACTUALIZAR BANDERA AL CARGAR LA PÁGINA
    // Asegúrate de que la bandera se actualice al cargar la página
    window.onload = function() {
        const campoTelefono4 = document.getElementById('encargado_fono'); // Obtén el campo de entrada del teléfono
    };

    document.addEventListener('DOMContentLoaded', function() {
        CargarCargoEncargadO('cargo-encargado');
    });
    
/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Formulario encargado  .JS ---------------------------------------
    ------------------------------------------------------------------------------------------------------------- */


/*
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
*/