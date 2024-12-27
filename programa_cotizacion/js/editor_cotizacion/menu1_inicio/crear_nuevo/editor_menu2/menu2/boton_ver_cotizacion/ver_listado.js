
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
    -------------------------------------- INICIO ITred Spa Ver Listado .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

    console.log("Archivo ver_listado.js cargado correctamente");

// TÍTULO: ORDENAR FILAS DE LA TABLA AL HACER CLIC EN LOS ENCABEZADOS

    // Detalle: Permite ordenar las filas de la tabla según el encabezado seleccionado, alternando entre orden ascendente y descendente.
    document.addEventListener('DOMContentLoaded', () => {
        const table = document.getElementById('tabla-cotizaciones'); // Obtener la tabla de cotizaciones
        const headers = table.querySelectorAll('th.sortable'); // Seleccionar todos los encabezados que son ordenables
        let sortOrder = 1; // 1 para ascendente, -1 para descendente
        let currentColumn = null; // Variable para rastrear la columna actualmente ordenada

        // Agregar evento de clic a cada encabezado
        headers.forEach(header => {
            header.addEventListener('click', function() {
                const type = this.getAttribute('data-type'); // Obtener el tipo de dato del encabezado
                const index = Array.prototype.indexOf.call(headers, this); // Obtener el índice del encabezado seleccionado
                
                // Alternar orden si es la misma columna
                if (currentColumn === index) {
                    sortOrder *= -1; // Alternar entre ascendente y descendente
                } else {
                    // Nueva columna seleccionada, ordenar ascendentemente por defecto
                    sortOrder = 1;
                }

                currentColumn = index; // Actualizar la columna actual

                // Obtener todas las filas del tbody
                const rowsArray = Array.from(table.querySelectorAll('tbody tr')); // Convertir filas a un array
                
                // Ordenar las filas según el tipo de dato
                rowsArray.sort((rowA, rowB) => {
                    const cellA = rowA.cells[index].textContent.trim(); // Obtener contenido de la celda A
                    const cellB = rowB.cells[index].textContent.trim(); // Obtener contenido de la celda B

                    // Comparar según el tipo de dato
                    if (type === 'number') {
                        return sortOrder * (parseFloat(cellA) - parseFloat(cellB));
                    } else if (type === 'date') {
                        return sortOrder * (new Date(cellA) - new Date(cellB));
                    } else {
                        return sortOrder * cellA.localeCompare(cellB);
                    }
                });

                // Eliminar las filas actuales y agregar las ordenadas
                const tbody = table.querySelector('tbody'); // Seleccionar el tbody de la tabla
                tbody.innerHTML = ''; // Limpiar el tbody
                rowsArray.forEach(row => tbody.appendChild(row)); // Agregar filas ordenadas al tbody

                // Actualizar las flechas en los encabezados
                headers.forEach(header => {
                    header.querySelector('.arrow').textContent = ''; // Limpiar todas las flechas
                });

                // Mostrar flecha correcta en el encabezado actual
                this.querySelector('.arrow').textContent = sortOrder === 1 ? '▲' : '▼'; 
            });
        });
    });

    function eliminarCotizacion(id_cotizacion) {
        if (confirm('¿Está seguro de que desea eliminar esta cotización?')) {
            // Crear el objeto FormData
            const formData = new FormData();
            formData.append('id', id_cotizacion);
    
            // Realizar la petición fetch
            fetch('/php/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/eliminar_cotizacion.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Si la eliminación fue exitosa, eliminar la fila de la tabla
                    const row = document.querySelector(`tr[data-cotizacion-id="${id_cotizacion}"]`);
                    if (row) {
                        row.remove();
                    }
                    alert(data.message);
                } else {
                    // Si hubo un error, mostrar el mensaje de error
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar la cotización');
            });
        }
    }

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Ver Listado .JS ---------------------------------------
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