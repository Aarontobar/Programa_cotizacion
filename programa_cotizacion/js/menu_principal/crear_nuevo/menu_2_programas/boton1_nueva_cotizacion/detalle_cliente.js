
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

// TÍTULO: PARA LA FUNCIÓN DE FORMATEO DE NÚMERO DE TELÉFONO

    // Función para formatear el número de teléfono
    function FormatoNumeroTelefono(input) {
        // Eliminar todo lo que no sea número o espacio
        let value = input.value.replace(/[^\d]/g, '');
        
        // Verificar la longitud del número y formatear
        if (value.length > 10) {
            value = value.replace(/^(\d{2})(\d)(\d{4})(\d{4})$/, '+$1 $2 $3 $4');
        } else if (value.length > 7) {
            value = value.replace(/^(\d{2})(\d)(\d{4})$/, '+$1 $2 $3');
        } else if (value.length > 2) {
            value = value.replace(/^(\d{2})(\d)$/, '+$1 $2');
        } else if (value.length > 1) {
            value = value.replace(/^(\d{2})$/, '+$1');
        }

        input.value = value; // Actualizar el valor del campo de entrada
    }


// TÍTULO: PARA LA FUNCIÓN DE COMPLETAR EMAIL

    // Función para completar el email con un dominio por defecto
    function CompletarEmail(input) {
        // Eliminar comillas simples y dobles
        input.value = input.value.replace(/['"]/g, '');
        
        const PatronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para validar email
        
        // Comprobar si el correo tiene un formato válido
        if (!PatronEmail.test(input.value)) {
            if (!input.value.includes('@')) {
                input.value += '@gmail.com'; // Añadir '@gmail.com' si no se ingresó
            } else {
                alert("Por favor, ingresa un correo electrónico válido."); // Mensaje de error
            }
        }
    }


// TÍTULO: PARA LA FUNCIÓN DE QUITAR CARACTERES INVÁLIDOS

    // Función para quitar caracteres inválidos de un input
    function QuitarCaracteresInvalidos(input) {
        // Eliminar comillas y otros caracteres no deseados
        input.value = input.value.replace(/['"]/g, '');
    }



    document.addEventListener('DOMContentLoaded', () => {
        CargarTipoCliente(); // Llamar a la función para cargar los tipos de cliente
    });

    document.getElementById('countryCode').addEventListener('change', function() {
        const countryCode = this.value;
        const phoneNumberInput = document.getElementById('cliente_fono');
        phoneNumberInput.value = phoneNumberInput.value.replace(/^\+\d+\s*/, '');
    
        // Formatear el número de teléfono
        const phoneNumber = phoneNumberInput.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
        const formattedPhoneNumber = phoneNumber.replace(/(\d{1})(\d{4})(\d{4})/, '$1 $2 $3');
        
        phoneNumberInput.value = countryCode + ' ' + formattedPhoneNumber;
    });
    
    // Formatear el número de teléfono en tiempo real
    document.getElementById('cliente_fono').addEventListener('input', function() {
        const phoneNumberInput = this;
        const countryCode = document.getElementById('countryCode').value;
        let phoneNumber = phoneNumberInput.value.replace(/^\+\d+\s*/, ''); // Eliminar código de país
        phoneNumber = phoneNumber.replace(/\D/g, ''); // Eliminar caracteres no numéricos
    
        // Solo formatear si el número tiene la longitud correcta
        if (phoneNumber.length > 0) {
            const formattedPhoneNumber = phoneNumber.replace(/(\d{1})(\d{4})(\d{4})/, '$1 $2 $3');
            phoneNumberInput.value = countryCode + ' ' + formattedPhoneNumber;
        }
    });
    
    // Set the initial background image for the select element
    document.getElementById('countryCode').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const flag = selectedOption.getAttribute('data-flag');
        this.style.backgroundImage = 'url(../../imagenes/menu_principal/crear_nuevo/nueva_cotizacion/banderas/' + flag + '.png)';
        this.style.backgroundSize = '20px 15px'; // Ajusta el tamaño de la bandera
    });
    
    // Trigger the change event to set the initial background image
    document.getElementById('countryCode').dispatchEvent(new Event('change'));
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