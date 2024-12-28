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
    -------------------------------------- INICIO ITred Spa Nueva_Cotizacion .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

// TÍTULO: ESTABLECER FECHA DE EMISIÓN
    
function validateForm() {
    let isValid = true;
    const form = document.getElementById('formulario-cotizacion');
    const requiredFields = form.querySelectorAll('[required]');
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            showError(field, 'Este campo es obligatorio');
        } else {
            clearError(field);
        }
    });

    // Validación RUT
    const rutField = form.querySelector('#rut_empresa');
    if (rutField && !validateRut(rutField.value)) {
        isValid = false;
        showError(rutField, 'RUT inválido');
    }

    // Validación Email
    const emailFields = form.querySelectorAll('input[type="email"]');
    emailFields.forEach(field => {
        if (field.value && !validateEmail(field.value)) {
            isValid = false;
            showError(field, 'Email inválido');
        }
    });

    // Validación del número de teléfono
    const phoneFields = form.querySelectorAll('input[type="tel"]');
    phoneFields.forEach(field => {
        if (field.value && !validatePhone(field.value)) {
            isValid = false;
            showError(field, 'Número de teléfono inválido');
        }
    });

    return isValid;
}

function showError(field, message) {
    const errorElement = field.nextElementSibling;
    if (errorElement && errorElement.classList.contains('error-message')) {
        errorElement.textContent = message;
    } else {
        const error = document.createElement('div');
        error.className = 'error-message';
        error.textContent = message;
        field.parentNode.insertBefore(error, field.nextSibling);
    }
    field.classList.add('error');
}

function clearError(field) {
    const errorElement = field.nextElementSibling;
    if (errorElement && errorElement.classList.contains('error-message')) {
        errorElement.remove();
    }
    field.classList.remove('error');
}

function validateRut(rut) {
    const rutRegex = /^[0-9]+-[0-9kK]{1}$/;
    return rutRegex.test(rut);
}

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePhone(phone) {
    const phoneRegex = /^\+?[0-9]{8,15}$/;
    return phoneRegex.test(phone);
}

// TÍTULO: FORMATEAR RUT
function FormatearRut(input) {
    let rut = input.value.replace(/\D/g, '');
    if (rut.length > 1) {
        rut = rut.slice(0, -1).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + '-' + rut.slice(-1);
    }
    input.value = rut;
}

// TÍTULO: MOSTRAR INFORMACIÓN DE PAGO
function MostrarInformacionDePago(checkbox) {
    const table = checkbox.closest('table');
    const ContenedorDePago = table.querySelector('.payment-info');
    const CabeceraPago = table.querySelector('.payment-header');

    if (checkbox.checked) {
        ContenedorDePago.style.display = 'table-row-group';
        CabeceraPago.style.display = 'table-row';
    } else {
        ContenedorDePago.style.display = 'none';
        CabeceraPago.style.display = 'none';
    }
}

// TÍTULO: INICIALIZACIÓN DEL FORMULARIO
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formulario-cotizacion');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateForm()) {
                const formData = new FormData(this);
                fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    alert(result);
                    if (result.includes('exitosamente')) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al procesar el formulario');
                });
            }
        });
    }
});

    // Add this to ensure empresa data is available in JavaScript
    const empresaData = <?php echo json_encode($empresa_data); ?>;
    
    document.addEventListener('DOMContentLoaded', function() {
        if (empresaData) {
            document.getElementById('empresa_nombre').value = empresaData.nombre_empresa || '';
            document.getElementById('empresa_area').value = empresaData.id_area_empresa || '';
            document.getElementById('empresa_direccion').value = empresaData.direccion_empresa || '';
            document.getElementById('empresa_telefono').value = empresaData.telefono_empresa || '';
            document.getElementById('empresa_email').value = empresaData.email_empresa || '';
            document.getElementById('empresa_rut').value = empresaData.rut_empresa || '';
            
            // Update logo if available
            if (empresaData.ruta_foto) {
                const logoPreview = document.getElementById('Previsualizar-logo');
                if (logoPreview) {
                    logoPreview.src = empresaData.ruta_foto;
                    logoPreview.style.display = 'block';
                }
            }
        }
    });

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Nueva_Cotizacion .JS ---------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

/*
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Agui Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
*/

