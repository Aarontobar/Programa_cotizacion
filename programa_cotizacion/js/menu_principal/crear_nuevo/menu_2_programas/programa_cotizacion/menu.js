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

// TÍTULO: FUNCIÓN PARA CARGAR ESTILOS CSS
function cargarEstilos(html) {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
    const links = doc.querySelectorAll('link[rel="stylesheet"]');

    links.forEach(link => {
        const href = link.getAttribute('href');
        if (href && !document.querySelector(`link[href="${href}"]`)) {
            const newLink = document.createElement('link');
            newLink.rel = 'stylesheet';
            newLink.href = href;
            document.head.appendChild(newLink);
        }
    });
}

// TÍTULO: FUNCIÓN PARA CARGAR SCRIPTS JS
function cargarScripts(html) {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
    const scripts = doc.querySelectorAll('script');

    scripts.forEach(oldScript => {
        const newScript = document.createElement('script');
        Array.from(oldScript.attributes).forEach(attr => {
            newScript.setAttribute(attr.name, attr.value);
        });
        newScript.appendChild(document.createTextNode(oldScript.innerHTML));
        document.body.appendChild(newScript);
    });
}

// TÍTULO: FUNCIÓN PARA MOSTRAR CONTENIDO
function mostrarContenido(tipo) {
    const contenedor = document.getElementById('contenido-dinamico');
    const empresa_id = document.querySelector('[name="empresa"]')?.value || '';
    let archivo = '';

    switch (tipo) {
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
        contenedor.innerHTML = '<div class="loading">Cargando...</div>';

        fetch(`crear_nuevo/menu_2_programas/${archivo}?id=${empresa_id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.text();
            })
            .then(html => {
                contenedor.innerHTML = html;
                cargarEstilos(html);
                cargarScripts(html);
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