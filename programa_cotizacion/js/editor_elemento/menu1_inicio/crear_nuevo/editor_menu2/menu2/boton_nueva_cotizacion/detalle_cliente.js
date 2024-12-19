
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
    -------------------------------------- INICIO ITred Spa Detalle cliente.JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */


// TÍTULO: FUNCIONES DE MANEJO DE FORMULARIO

document.addEventListener('DOMContentLoaded', function() {
    // Initialize form handlers
    initializeFormHandlers();
    
    // Initialize country/city/comuna selectors if they exist
    if (document.getElementById('cliente_pais')) {
        initializeLocationSelectors();
    }
});

function initializeFormHandlers() {
    // Add event listeners for phone formatting
    const phoneInput = document.getElementById('cliente_fono');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            FormatoNumeroTelefono(this);
        });
    }

    // Add event listeners for email completion
    const emailInput = document.getElementById('cliente_email');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            CompletarEmail(this);
        });
    }
}

function initializeLocationSelectors() {
    // Add event listeners for location selectors
    document.getElementById('cliente_pais').addEventListener('change', actualizarCiudades);
    document.getElementById('cliente_ciudad').addEventListener('change', actualizarComunas);
}

// TÍTULO: FORMATEO DE TELÉFONO
function FormatoNumeroTelefono(input) {
    let value = input.value.replace(/\D/g, '');
    
    if (value.length > 9) {
        value = value.substring(0, 9);
    }
    
    if (value.length > 4) {
        value = value.substring(0, 1) + ' ' + value.substring(1, 5) + ' ' + value.substring(5);
    } else if (value.length > 1) {
        value = value.substring(0, 1) + ' ' + value.substring(1);
    }
    
    input.value = value;
}

// TÍTULO: COMPLETAR EMAIL
function CompletarEmail(input) {
    let value = input.value.trim();
    if (value && !value.includes('@')) {
        input.value = value + '@gmail.com';
    }
}

// TÍTULO: ACTUALIZAR CIUDADES
function actualizarCiudades() {
    const paisId = document.getElementById('cliente_pais').value;
    const ciudadSelect = document.getElementById('cliente_ciudad');
    
    // Clear current options
    ciudadSelect.innerHTML = '<option value="" disabled selected>Selecciona una ciudad</option>';
    
    if (paisId) {
        fetch(`obtener_ciudades.php?id_pais=${paisId}`)
            .then(response => response.json())
            .then(ciudades => {
                ciudades.forEach(ciudad => {
                    const option = document.createElement('option');
                    option.value = ciudad.id_ciudad;
                    option.textContent = ciudad.nombre_ciudad;
                    ciudadSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    }
}

// TÍTULO: ACTUALIZAR COMUNAS
function actualizarComunas() {
    const ciudadId = document.getElementById('cliente_ciudad').value;
    const comunaSelect = document.getElementById('cliente_comuna');
    
    // Clear current options
    comunaSelect.innerHTML = '<option value="" disabled selected>Selecciona una comuna</option>';
    
    if (ciudadId) {
        fetch(`obtener_comunas.php?id_ciudad=${ciudadId}`)
            .then(response => response.json())
            .then(comunas => {
                comunas.forEach(comuna => {
                    const option = document.createElement('option');
                    option.value = comuna.id_comuna;
                    option.textContent = comuna.nombre_comuna;
                    comunaSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    }
}

// TÍTULO: QUITAR CARACTERES INVÁLIDOS
function QuitarCaracteresInvalidos(input) {
    input.value = input.value.replace(/['"]/g, '');
}

function toggleFormulario(select) {
    const formulario = document.getElementById('formulario_cliente');
    
    // Always show the form first
    formulario.style.display = 'block';
    
    if (select.value === 'nuevo') {
        // Clear all form fields
        document.getElementById('cliente_rut').value = '';
        document.getElementById('cliente_nombre').value = '';
        document.getElementById('cliente_empresa').value = '';
        document.getElementById('cliente_direccion').value = '';
        document.getElementById('cliente_lugar').value = '';
        document.getElementById('cliente_fono').value = '';
        document.getElementById('cliente_email').value = '';
        document.getElementById('cliente_giro').value = '';
        document.getElementById('cliente_comuna').value = '';
        document.getElementById('cliente_ciudad').value = '';
        document.getElementById('cliente_cargo').value = '';
        document.getElementById('rut_encargado_cliente').value = '';
        
        // Enable all fields
        enableFormFields(true);
    } else if (select.value !== '') {
        // Get selected option
        const selectedOption = select.options[select.selectedIndex];
        
        // Fill form with data from data attributes
        document.getElementById('cliente_rut').value = selectedOption.dataset.rut || '';
        document.getElementById('cliente_nombre').value = selectedOption.dataset.nombre || '';
        document.getElementById('cliente_empresa').value = selectedOption.dataset.empresa || '';
        document.getElementById('cliente_direccion').value = selectedOption.dataset.direccion || '';
        document.getElementById('cliente_lugar').value = selectedOption.dataset.lugar || '';
        document.getElementById('cliente_fono').value = selectedOption.dataset.telefono || '';
        document.getElementById('cliente_email').value = selectedOption.dataset.email || '';
        document.getElementById('cliente_giro').value = selectedOption.dataset.giro || '';
        document.getElementById('cliente_comuna').value = selectedOption.dataset.comuna || '';
        document.getElementById('cliente_ciudad').value = selectedOption.dataset.ciudad || '';
        document.getElementById('cliente_cargo').value = selectedOption.dataset.cargo || '';
        document.getElementById('rut_encargado_cliente').value = selectedOption.dataset.rutEncargado || '';
        
        // Disable fields when viewing existing client
        enableFormFields(false);
        
        // Trigger city and comuna updates
        if (document.getElementById('cliente_pais')) {
            document.getElementById('cliente_pais').dispatchEvent(new Event('change'));
        }
    } else {
        formulario.style.display = 'none';
    }
}

function enableFormFields(enabled) {
    const fields = document.querySelectorAll('#formulario_cliente input, #formulario_cliente select');
    fields.forEach(field => {
        field.disabled = !enabled;
    });
}

// Initialize form state on page load
document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('formulario_opcion');
    if (select) {
        toggleFormulario(select);
    }
});

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Detalle cliente.JS ---------------------------------------
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