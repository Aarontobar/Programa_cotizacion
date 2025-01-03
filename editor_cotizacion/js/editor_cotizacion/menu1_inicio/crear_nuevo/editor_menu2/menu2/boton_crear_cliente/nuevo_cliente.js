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
    -------------------------------------- INICIO ITred Spa Crear Clientes .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

/* TÍTULO: NOTIFICACIÓN EN EL DOM* /

    /* Muestra y oculta una notificación en la página */
    document.addEventListener("DOMContentLoaded", function() {
        const notificacion = document.getElementById('notificacion');
        if (notificacion) {
            notificacion.style.display = 'block'; // Muestra el mensaje
            setTimeout(() => {
                notificacion.style.display = 'none'; // Oculta el mensaje después de 5 segundos
            }, 5000);
        }
    });

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Crear Clientes .JS ---------------------------------------
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