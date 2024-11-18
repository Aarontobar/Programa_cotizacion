
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
    -------------------------------------- INICIO ITred Spa Detalle encargado.JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

document.getElementById('countryCode1').addEventListener('change', function() {
    const countryCode1 = this.value;
    const phoneNumberInput = document.getElementById('enc_celular');
    phoneNumberInput.value = phoneNumberInput.value.replace(/^\+\d+\s*/, '');

    // Formatear el número de teléfono
    const phoneNumber = phoneNumberInput.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
    const formattedPhoneNumber = phoneNumber.replace(/(\d{1})(\d{4})(\d{4})/, '$1 $2 $3');
    
    phoneNumberInput.value = countryCode1 + ' ' + formattedPhoneNumber;
});

// Formatear el número de teléfono en tiempo real
document.getElementById('enc_celular').addEventListener('input', function() {
    const phoneNumberInput = this;
    const countryCode1 = document.getElementById('countryCode1').value;
    let phoneNumber = phoneNumberInput.value.replace(/^\+\d+\s*/, ''); // Eliminar código de país
    phoneNumber = phoneNumber.replace(/\D/g, ''); // Eliminar caracteres no numéricos

    // Solo formatear si el número tiene la longitud correcta
    if (phoneNumber.length > 0) {
        const formattedPhoneNumber = phoneNumber.replace(/(\d{1})(\d{4})(\d{4})/, '$1 $2 $3');
        phoneNumberInput.value = countryCode1 + ' ' + formattedPhoneNumber;
    }
});

// Set the initial background image for the select element
document.getElementById('countryCode1').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const flag = selectedOption.getAttribute('data-flag');
    this.style.backgroundImage = 'url(../../../../imagenes/menu_principal/crear_nuevo/nueva_cotizacion/banderas/' + flag + '.png)';
    this.style.backgroundSize = '20px 15px'; // Ajusta el tamaño de la bandera
});

// Trigger the change event to set the initial background image
document.getElementById('countryCode1').dispatchEvent(new Event('change'));
/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Detalle encargado.JS ---------------------------------------
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