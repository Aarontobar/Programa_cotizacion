
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

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('formulario-seleccionar-empresa').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(html => {
                document.querySelector('.programa_cotizacion').innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        // Event delegation for dynamic content
        document.body.addEventListener('click', function(event) {
            if (event.target.matches('.menu a')) {
                event.preventDefault();
                var pagina = event.target.getAttribute('data-pagina');
                cargarContenido(pagina);
            }
        });

        function cargarContenido(pagina) {
            fetch('programa_cotizacion.php?pagina=' + pagina)
            .then(response => response.text())
            .then(html => {
                document.getElementById('contenido-dinamico').innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
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