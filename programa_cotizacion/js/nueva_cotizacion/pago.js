
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
    -------------------------------------- INICIO ITred Spa Adelanto.JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

// TÍTULO: CARGAR FORMAS DE PAGO

    // funcion que carga las formas de pago que se traen del php para que se muestren 
    function CargarFormaPago(idSelect) {
        // Realiza una solicitud para obtener la lista de formas de pago desde el servidor
        fetch('../../php/nueva_cotizacion/get_forma_pago.php')
            .then(response => response.text())
            .then(data => {
                const select = document.getElementById(idSelect); // Obtener el elemento select por su ID único
                select.innerHTML = data;  // Insertar directamente las opciones generadas en el select
            })
            .catch(error => console.error('Error al cargar formas de pago:', error)); // Manejar errores de la solicitud
    }

    // TÍTULO: AGREGAR Y GESTIONAR PAGOS

    // Función para agregar un nuevo pago a la tabla de pagos
    function AgregarPago() {
        const contenedor = document.getElementById('payments-contenedor');
        const porcentajeInputs = contenedor.querySelectorAll('input[name="porcentaje_pago[]"]');
        let totalPorcentaje = 0;

        // Sumar todos los porcentajes existentes
        porcentajeInputs.forEach(input => {
            totalPorcentaje += parseFloat(input.value) || 0; // Sumar los porcentajes, considerando valor por defecto 0
        });

        // Verificar si el total ya alcanza o supera el 100%
        if (totalPorcentaje >= 100) {
            alert("Ya se ha alcanzado el 100% de los pagos. No se pueden agregar más pagos.");
            return; // Salir de la función si se ha alcanzado el límite
        }

        // Mostrar la tabla si está oculta
        const table = document.getElementById('payment-table');
        if (table.style.display === 'none') {
            table.style.display = 'table'; // Cambiar a modo de visualización de tabla
        }

        // Crear un nuevo bloque de pago
        const LineaPago = document.createElement('tr');

        // Generar un ID único para el nuevo select
        const idUnico = 'forma-pago-' + (contenedor.getElementsByTagName('tr').length + 1);

        // Generar el HTML para un nuevo pago dentro de la tabla
        LineaPago.innerHTML = `
            <td><input type="number" name="numero_pago[]" required oninput="QuitarCaracteresInvalidos(this)"></td>
            <td><textarea name="descripcion_pago[]" placeholder="Descripción del pago" oninput="QuitarCaracteresInvalidos(this)"></textarea></td>
            <td>
                <select id="${idUnico}" name="forma_pago[]" required>
                </select>
            </td>
            <td><input type="number" id="porcentaje-pago" name="porcentaje_pago[]" min="0" max="${100 - totalPorcentaje}" required oninput="calcularPago(this)" oninput="QuitarCaracteresInvalidos(this)"></td>
            <td><input type="number" id="monto-pago" name="monto_pago[]" min="0" required readonly oninput="QuitarCaracteresInvalidos(this)"></td>
            <td><input type="date" name="fecha_pago[]" required oninput="QuitarCaracteresInvalidos(this)"></td>
            <td><button type="button" onclick="EliminarPago(this)">Eliminar</button></td>
        `;

        // Agregar la nueva fila de pago al cuerpo de la tabla
        contenedor.appendChild(LineaPago);

        // Cargar las formas de pago en el nuevo select usando el ID único
        CargarFormaPago(idUnico);
    }

    // Ejecutar la función al cargar la página
    AgregarPago();


// TÍTULO: ELIMINAR PAGO

    // Función para eliminar un pago de la tabla
    function EliminarPago(button) {
        // Eliminar la fila correspondiente
        const row = button.closest('tr');
        row.remove();

        // Ocultar la tabla si no quedan filas
        const contenedor = document.getElementById('payments-contenedor');
        if (contenedor.children.length === 0) {
            document.getElementById('payment-table').style.display = 'none'; // Ocultar tabla si no hay filas
        }
    }


// TÍTULO: CALCULAR MONTO DEL PAGO

    // Función para calcular el monto del pago basado en el porcentaje ingresado
    function calcularPago(input) {
        const row = input.closest('tr'); // Obtener la fila actual
        const montoPagoInput = row.querySelector('#monto-pago'); // Obtener el input de monto
        const totalFinalInput = document.getElementById('total_final'); // Obtener el total final

        const porcentajeAdelanto = parseFloat(input.value) || 0; // Obtener porcentaje del input
        const totalFinal = parseFloat(totalFinalInput.value) || 0; // Obtener el total final

        const montoAdelanto = (totalFinal * (porcentajeAdelanto / 100)).toFixed(2); // Calcular monto del pago
        montoPagoInput.value = montoAdelanto; // Asignar monto al input correspondiente

        // Verificar si la suma de todos los porcentajes excede el 100%
        verificarTotalPorcentajes(input);
    }


// TÍTULO: VERIFICAR TOTAL DE PORCENTAJES

    // Función para verificar que la suma de los porcentajes no exceda el 100%
    function verificarTotalPorcentajes(input) {
        const contenedor = document.getElementById('payments-contenedor');
        const porcentajeInputs = contenedor.querySelectorAll('input[name="porcentaje_pago[]"]');
        let totalPorcentaje = 0;

        // Sumar todos los porcentajes existentes
        porcentajeInputs.forEach(porcentajeInput => {
            totalPorcentaje += parseFloat(porcentajeInput.value) || 0; // Sumar porcentajes
        });

        // Si el total supera el 100%, restablecer el último valor y mostrar alerta
        if (totalPorcentaje > 100) {
            // Restablecer el valor del campo actual para no exceder el 100%
            const porcentajeActual = parseFloat(input.value);
            const maxValorPermitido = 100 - (totalPorcentaje - porcentajeActual); // Calcular el máximo permitido
            input.value = Math.max(0, maxValorPermitido);  // Limitar el valor al máximo permitido

            alert("La suma de los porcentajes no puede exceder el 100%. Por favor, ajusta los pagos existentes.");
        }
    }

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Adelanto.JS ---------------------------------------
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