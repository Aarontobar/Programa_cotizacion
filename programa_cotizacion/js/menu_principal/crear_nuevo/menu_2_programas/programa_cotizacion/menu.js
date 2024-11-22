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
        const contenedor = document.getElementById('contenido-dinamico');
        const empresa_id = document.querySelector('[name="empresa"]')?.value || '';
        let archivo = '';
    
        // Mapeo de tipos a archivos
        switch(tipo) {
            case 'nueva_cotizacion':
                archivo = 'boton1_nueva_cotizacion/nueva_cotizacion_principal.php';
                break;
            case 'crear_cliente':
                archivo = 'boton2_crear_cliente/crear_cliente_principal.php';
                break;
            case 'crear_producto':
                archivo = 'boton3_crear_producto/crear_producto_principal.php';
                break;
            case 'crear_proveedor':
                archivo = 'boton4_crear_proveedor/crear_proveedor_principal.php';
                break;
            case 'ver_cotizacion':
                archivo = 'boton5_ver_cotizacion/ver_cotizacion_principal.php';
                break;
            case 'crear_empresa':
                archivo = 'boton6_crear_empresa/crear_empresa_principal.php';
                break;
        }
    
        if (archivo) {
            // Mostrar indicador de carga
            contenedor.innerHTML = '<div class="loading">Cargando...</div>';
    
            // Realizar la petición AJAX
            fetch(`crear_nuevo/menu_2_programas/${archivo}?id=${empresa_id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.text();
                })
                .then(html => {
                    contenedor.innerHTML = html;
                    // Ejecutar scripts si los hay
                    Array.from(contenedor.getElementsByTagName('script')).forEach(oldScript => {
                        const newScript = document.createElement('script');
                        Array.from(oldScript.attributes).forEach(attr => {
                            newScript.setAttribute(attr.name, attr.value);
                        });
                        newScript.appendChild(document.createTextNode(oldScript.innerHTML));
                        oldScript.parentNode.replaceChild(newScript, oldScript);
                    });
                })
                .catch(error => {
                    contenedor.innerHTML = `<div class="error">Error al cargar el contenido: ${error}</div>`;
                    console.error('Error:', error);
                });
        }
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