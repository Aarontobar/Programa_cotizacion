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

// TITULO POPUP NOTIFICACION

    // Manejo de la notificación
    document.addEventListener('DOMContentLoaded', function() {
        // Manejo de la notificación
        const notificacion = document.getElementById('notificacion');
        if (notificacion) {
            setTimeout(() => {
                notificacion.style.display = 'none';
            }, 5000);
        }

        // Si hay un mensaje de éxito, hacer scroll a la lista de clientes
        <?php if ($mostrarLista): ?>
        document.querySelector('.lista-clientes').scrollIntoView({ behavior: 'smooth' });
        <?php endif; ?>
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