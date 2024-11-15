
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

// TÍTULO: FUNCIONES DE MANEJO DE PAGOS

let contadorPagos = 0;

// TÍTULO: FUNCIÓN PARA AGREGAR UN NUEVO PAGO
function AgregarPago() {
    const tabla = document.getElementById('payment-table');
    const contenedor = document.getElementById('payments-contenedor');
    
    // Mostrar la tabla si está oculta
    tabla.style.display = 'table';
    
    contadorPagos++;
    
    // TÍTULO: CREAR NUEVA FILA DE PAGO
    const nuevaFila = document.createElement('tr');
    nuevaFila.innerHTML = `
        <td>
            <input type="number" name="numero_pago[]" value="${contadorPagos}" readonly class="numero-pago">
        </td>
        <td>
            <textarea name="descripcion_pago[]" required></textarea>
        </td>
        <td>
            <select name="forma_pago[]" required>
                <option value="">Seleccione forma de pago</option>
                <option value="1">Efectivo</option>
                <option value="2">Transferencia</option>
                <option value="3">Cheque</option>
            </select>
        </td>
        <td>
            <input type="number" name="porcentaje_pago[]" required min="0" max="100" 
                   onchange="calcularMontoPago(this)">
        </td>
        <td>
            <input type="number" name="monto_pago[]" required readonly>
        </td>
        <td>
            <input type="date" name="fecha_pago[]" required>
        </td>
        <td>
            <button type="button" onclick="eliminarPago(this)" class="eliminar-pago">Eliminar</button>
        </td>
    `;
    
    contenedor.appendChild(nuevaFila);
    actualizarNumerosPago();
}

// TÍTULO: FUNCIÓN PARA ELIMINAR UN PAGO
function eliminarPago(boton) {
    const fila = boton.closest('tr');
    if (fila) {
        fila.remove();
        actualizarNumerosPago();
        
        // Ocultar la tabla si no hay pagos
        const contenedor = document.getElementById('payments-contenedor');
        if (contenedor.children.length === 0) {
            document.getElementById('payment-table').style.display = 'none';
        }
    }
}

// TÍTULO: FUNCIÓN PARA ACTUALIZAR NÚMEROS DE PAGO
function actualizarNumerosPago() {
    const filas = document.querySelectorAll('#payments-contenedor tr');
    filas.forEach((fila, index) => {
        const numeroInput = fila.querySelector('.numero-pago');
        if (numeroInput) {
            numeroInput.value = index + 1;
        }
    });
    contadorPagos = filas.length;
}

// TÍTULO: FUNCIÓN PARA CALCULAR MONTO DE PAGO
function calcularMontoPago(input) {
    const porcentaje = parseFloat(input.value) || 0;
    const montoTotal = obtenerMontoTotal(); // Implementa esta función según tu lógica
    const montoPago = (porcentaje / 100) * montoTotal;
    
    const fila = input.closest('tr');
    if (fila) {
        const montoInput = fila.querySelector('input[name="monto_pago[]"]');
        if (montoInput) {
            montoInput.value = Math.round(montoPago);
        }
    }
}

// TÍTULO: FUNCIÓN PARA OBTENER MONTO TOTAL
function obtenerMontoTotal() {
    // Implementa esta función para obtener el monto total de la cotización
    // Por ahora retornamos un valor de ejemplo
    return 1000000;
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