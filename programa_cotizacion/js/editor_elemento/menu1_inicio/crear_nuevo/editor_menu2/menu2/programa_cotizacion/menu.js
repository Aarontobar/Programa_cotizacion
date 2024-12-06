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

    function mostrarContenido(tipo) {
        // Obtener el ID de empresa del campo oculto
        const empresa_id = document.getElementById('selected-empresa').value;
        
        // Verificar si hay una empresa seleccionada
        if (!empresa_id && tipo !== 'crear_empresa') {
            alert('Por favor, seleccione una empresa primero.');
            return;
        }
    
        // Definir la ruta base para los archivos PHP
        const baseUrl = 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/';
        
        // Construir la URL completa según el tipo de contenido
        let url;
        switch(tipo) {
            case 'nueva_cotizacion':
                url = `${baseUrl}boton_nueva_cotizacion/nueva_cotizacion_pr.php`;
                break;
            case 'crear_cliente':
                url = `${baseUrl}boton_crear_cliente/crear_cliente_pr.php`;
                break;
            case 'crear_producto':
                url = `${baseUrl}boton_crear_producto/crear_producto_pr.php`;
                break;
            case 'crear_proveedor':
                url = `${baseUrl}boton_crear_proveedor/crear_proveedor_pr.php`;
                break;
            case 'ver_cotizacion':
                url = `${baseUrl}boton_ver_cotizacion/ver_cotizacion_pr.php`;
                break;
            case 'crear_empresa':
                url = `${baseUrl}boton_crear_empresa/crear_empresa_pr.php`;
                break;
            default:
                console.error('Tipo de contenido no válido');
                return;
        }
        
        // Agregar el ID de empresa como parámetro si existe
        if (empresa_id) {
            url += `?empresa_id=${empresa_id}`;
        }
        
        // Realizar la petición AJAX
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.text();
            })
            .then(html => {
                // Actualizar el contenido del div
                const contenedor = document.getElementById('contenido-dinamico');
                contenedor.innerHTML = html;
                
                // Hacer scroll al contenido nuevo
                contenedor.scrollIntoView({ behavior: 'smooth' });
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al cargar el contenido. Por favor, intente nuevamente.');
            });
    }
    
    // Agregar event listeners cuando el DOM esté cargado
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar clics en los enlaces del menú
        const menuLinks = document.querySelectorAll('.menu a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const tipo = this.getAttribute('data-pagina');
                if (tipo) {
                    mostrarContenido(tipo);
                }
            });
        });
    });

        // Verificar si los enlaces están deshabilitados
        document.querySelectorAll('.menu-link.disabled').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                alert('Por favor, seleccione una empresa primero.');
            });
        });
    
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