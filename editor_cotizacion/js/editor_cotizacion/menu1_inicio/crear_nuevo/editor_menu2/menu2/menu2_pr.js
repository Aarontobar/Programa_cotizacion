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
    -------------------------------------- INICIO ITred Spa Menu2_pr.JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

// TÍTULO: COMPROBACIÓN DE LA CONSOLA FUNCIÓN JS
    // Esta función se ejecuta para verificar bien su carga al php
    console.log("Archivo menu2_pr.js cargado correctamente");

// TÍTULO: INICIALIZACIÓN DEL DOCUMENTO
    // Esta función se ejecuta cuando el documento está completamente cargado
    document.addEventListener('DOMContentLoaded', function() {
        initializeFormHandling();
        initializeMenuButtons();
    });
    
// TÍTULO: MANEJO DEL FORMULARIO DE EMPRESA
    // Inicializa el manejo del formulario y sus eventos
    function initializeFormHandling() {
        const form = document.getElementById('formulario-seleccionar-empresa');
        const resetButton = document.getElementById('reset-empresa');
    
        if (form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                
                fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(() => {
                    enableMenuButtons();
                    updateSelectedCompany(formData.get('empresa'));
                })
                .catch(error => console.error('Error:', error));
            });
        }
    
        if (resetButton) {
            resetButton.addEventListener('click', handleReset);
        }
    }
    
// TÍTULO: HABILITAR BOTONES DEL MENÚ
    // Habilita todos los botones del menú excepto el de crear empresa
    function enableMenuButtons() {
        const buttons = document.querySelectorAll('.menu a:not([data-pagina="crear_empresa"])');
        buttons.forEach(button => {
            button.classList.remove('disabled');
        });
    }
    
// TÍTULO: DESHABILITAR BOTONES DEL MENÚ
    // Deshabilita todos los botones del menú excepto el de crear empresa
    function disableMenuButtons() {
        const buttons = document.querySelectorAll('.menu a:not([data-pagina="crear_empresa"])');
        buttons.forEach(button => {
            button.classList.add('disabled');
        });
    }
    
// TÍTULO: ACTUALIZAR EMPRESA SELECCIONADA
    // Actualiza el valor de la empresa seleccionada en el campo oculto
    function updateSelectedCompany(empresaId) {
        const hiddenInput = document.getElementById('selected-empresa');
        if (hiddenInput) {
            hiddenInput.value = empresaId;
        }
    }
    
// TÍTULO: MANEJO DEL REINICIO
    // Maneja el reinicio de la selección de empresa
    function handleReset() {
        const selectedOption = document.querySelector('.selected-option');
        const hiddenInput = document.getElementById('selected-empresa');
        
        if (selectedOption) selectedOption.textContent = 'Seleccione una empresa';
        if (hiddenInput) hiddenInput.value = '';
        
        disableMenuButtons();
        clearContent();
    }
    
// TÍTULO: LIMPIAR CONTENIDO
    // Limpia el contenido del contenedor dinámico
    function clearContent() {
        const container = document.getElementById('contenido-dinamico');
        if (container) {
            container.innerHTML = '';
        }
    }
    
// TÍTULO: INICIALIZACIÓN DE BOTONES DEL MENÚ
    // Inicializa los eventos de los botones del menú
    function initializeMenuButtons() {
        document.querySelectorAll('.menu a').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                if (this.classList.contains('disabled')) {
                    return;
                }
    
                const pagina = this.getAttribute('data-pagina');
                loadContent(pagina);
            });
        });
    }
    
// TÍTULO: CARGAR CONTENIDO
    // Carga el contenido dinámico según la página seleccionada
    function loadContent(pagina) {
        const empresaId = document.getElementById('selected-empresa').value;
        const container = document.getElementById('contenido-dinamico');
        
        if (!container) return;
    
        const basePath = '../programa_cotizacion/php/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/';
        const url = `${basePath}boton_${pagina}/${pagina}_pr.php?id_empresa=${empresaId}`;
    
        fetch(url)
            .then(response => response.text())
            .then(html => {
                container.innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error);
                container.innerHTML = '<p>Error al cargar el contenido</p>';
            });
    }

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Menu2_pr.JS ---------------------------------------
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

