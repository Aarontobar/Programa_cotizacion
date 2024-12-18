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
    -------------------------------------- INICIO ITred Spa Cuadro Rojo .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

// TÍTULO: VALIDAR CARACTERES PERMITIDOS EN EL NOMBRE DE LA EMPRESA

    // Restringe la entrada a solo letras, números, espacios, '&', '.', y '-' mientras el usuario escribe.
    document.addEventListener('DOMContentLoaded', function() {
        const empresaNombreInput = document.getElementById('empresa_nombre');
        if (empresaNombreInput) {
            empresaNombreInput.addEventListener('input', function () {
                const input = this; // Se refiere al campo de entrada donde el usuario está escribiendo
    
                // Elimina cualquier carácter que no sea letras, números, espacios, '&', '.', o '-'
                input.value = input.value.replace(/[^A-Za-zÀ-ÿ0-9\s&.-]/g, '');
            });
        }
    });
    
/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Cuadro Rojo .JS ---------------------------------------
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