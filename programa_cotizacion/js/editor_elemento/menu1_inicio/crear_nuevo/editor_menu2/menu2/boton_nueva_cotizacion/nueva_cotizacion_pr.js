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

    // Función para formatear el RUT ingresado en un campo de texto
    function FormatearRut(input) {
        // Elimina cualquier carácter que no sea un dígito
        let rut = input.value.replace(/\D/g, '');
        if (rut.length > 1) {
            // Formatea el RUT agregando puntos cada tres dígitos y un guion antes del último dígito
            rut = rut.slice(0, -1).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + '-' + rut.slice(-1);
        }
        // Asigna el valor formateado de vuelta al campo de entrada
        input.value = rut;
    }

// TÍTULO: MOSTRAR INFORMACIÓN DE PAGO

    // Función para mostrar u ocultar la información de pago según el estado de un checkbox
    function MostrarInformacionDePago(checkbox) {
        // Encuentra la tabla más cercana al checkbox
        const table = checkbox.closest('table');
        // Busca el contenedor de información de pago y la cabecera de pago dentro de la tabla
        const ContenedorDePago = table.querySelector('.payment-info');
        const CabeceraPago = table.querySelector('.payment-header');

        // Muestra u oculta la información de pago según el estado del checkbox
        if (checkbox.checked) {
            ContenedorDePago.style.display = 'table-row-group'; // Muestra el contenedor de pago
            CabeceraPago.style.display = 'table-row'; // Muestra la cabecera de pago
        } else {
            ContenedorDePago.style.display = 'none'; // Oculta el contenedor de pago
            CabeceraPago.style.display = 'none'; // Oculta la cabecera de pago
        }
    }

    document.getElementById('formulario-seleccionar-empresa').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto
        // Aquí puedes agregar cualquier lógica adicional antes de enviar el formulario
        this.submit(); // Envía el formulario
    });

    // TÍTULO: FUNCIÓN PARA CARGAR EL FORMULARIO DE MODIFICACIÓN
    function cargarModificarCotizacion(id) {
        fetch(`crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/modificar_cotizacion.php?id=${id}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('modificar-cotizacion-container').innerHTML = html;
                document.getElementById('modificar-cotizacion-container').style.display = 'block';
                document.getElementById('modificar-cotizacion-container').scrollIntoView({behavior: 'smooth'});
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al cargar el formulario de modificación');
            });
    }

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