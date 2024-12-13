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

    document.addEventListener('DOMContentLoaded', function() {
        // Función para verificar si hay una empresa seleccionada
        function verificarEmpresaSeleccionada() {
            return document.getElementById('selected-empresa').value !== '';
        }
    
        // Función para obtener el ID de empresa de la sesión
        function obtenerIdEmpresa() {
            return document.getElementById('selected-empresa').value;
        }
    
        // Función para cargar contenido
        function cargarContenido(tipo) {
            if (!verificarEmpresaSeleccionada() && tipo !== 'crear_empresa') {
                alert('Por favor, seleccione una empresa primero.');
                return false;
            }
    
            const id_empresa = obtenerIdEmpresa();
            const baseUrl = 'php/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/';
            let url = '';
    
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
    
            // Agregar el ID de empresa como parámetro
            url += `?id_empresa=${id_empresa}`;
    
            // Realizar la petición AJAX
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.text();
                })
                .then(html => {
                    document.getElementById('contenido-dinamico').innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al cargar el contenido. Por favor, intente nuevamente.');
                });
        }
    
        // Event listeners para los enlaces del menú
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const tipo = this.getAttribute('data-pagina');
                if (tipo) {
                    cargarContenido(tipo);
                }
            });
        });
    
        // Manejar el cambio de empresa
        document.getElementById('empresa').addEventListener('change', function() {
            const formData = new FormData();
            formData.append('empresa', this.value);
            
            fetch('seleccionar_empresa.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(() => {
                // Recargar la página para actualizar el estado
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
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