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
    -------------------------------------- INICIO ITred Spa menu .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

    console.log("Archivo menu.js cargado correctamente");

    // TÍTULO: FUNCIÓN PARA MOSTRAR CONTENIDO
    function mostrarContenido(tipo) {
        const empresa_id = document.getElementById('selected-empresa').value || '';
        let url = `programa_cotizacion.php?page=crear_nuevo_banner&pagina=${tipo}&id=${empresa_id}`;
        window.location.href = url;
    }
    
    /* --------------------------------------------------------------------------------------------------------------
        ---------------------------------------- FIN ITred Spa menu .JS ---------------------------------------
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