
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
    -------------------------------------- INICIO ITred Spa Programa Cotizacion .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

    console.log("Archivo programa_cotizacion.js cargado correctamente");

    document.getElementById('formulario-seleccionar-empresa').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto
        // Aquí puedes agregar cualquier lógica adicional antes de enviar el formulario
        this.submit(); // Envía el formulario
    });

    // TÍTULO: FUNCIÓN PARA CARGAR EL FORMULARIO DE MODIFICACIÓN
    function cargarModificarCotizacion(id) {
        fetch(`crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/modificar_cotizacion.php?id=${id}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('modificar-cotizacion-container').innerHTML = html;
                document.getElementById('modificar-cotizacion-container').style.display = 'block';
                document.getElementById('modificar-cotizacion-container').scrollIntoView({
                    behavior: 'smooth'
                });
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al cargar el formulario de modificación');
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var resetButton = document.getElementById('reset-empresa');
        var empresaSelect = document.getElementById('empresa');
        var selectedOption = document.querySelector('.selected-option');
        var hiddenInput = document.getElementById('selected-empresa');

        resetButton.addEventListener('click', function() {
            // Reinicia el select
            empresaSelect.selectedIndex = 0;
            
            // Reinicia el texto mostrado en el select personalizado
            selectedOption.textContent = 'Seleccione una empresa';
            
            // Limpia el valor del input oculto
            hiddenInput.value = '';

            // Opcional: deshabilitar los botones del menú
            document.querySelectorAll('.menu-link:not([data-pagina="crear_empresa"])').forEach(function(link) {
                link.classList.add('disabled');
            });

            // Opcional: limpiar el contenido dinámico
            document.getElementById('contenido-dinamico').innerHTML = '';
        });
    });

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Programa Cotizacion .JS ---------------------------------------
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