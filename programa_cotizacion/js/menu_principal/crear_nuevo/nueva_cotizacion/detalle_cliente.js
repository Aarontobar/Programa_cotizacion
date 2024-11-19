
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


// TÍTULO PARA CARGAR lugares clientes

    // Función para cargar los lugares de los clientes
    function CargarLugarCliente() {
        // Realiza una solicitud para obtener la lista de lugares clientes desde el servidor
        fetch('../../../../../php/menu_principal/crear_nuevo/nueva_cotizacion/get_lugar_cliente.php')
            .then(response => response.text())
            .then(data => {
                const select = document.getElementById('cliente_lugar'); // Obtener el elemento select por su ID
                select.innerHTML = data;  // Insertar directamente las opciones generadas en el select
            })
            .catch(error => console.error('Error al cargar lugares clientes:', error)); // Manejar errores de la solicitud
    }

    CargarLugarCliente();

    document.addEventListener('DOMContentLoaded', () => {
        CargarLugarCliente(); // Llamar a la función para cargar las áreas de empresa
    });

// TÍTULO PARA CARGAR cargos clientes

    // Función para cargar los cargos de los clientes
    function CargarCargoCliente() {
        // Realiza una solicitud para obtener la lista de cargos clientes desde el servidor
        fetch('../../../../../php/menu_principal/crear_nuevo/nueva_cotizacion/get_cargo_cliente.php')
            .then(response => response.text())
            .then(data => {
                const select = document.getElementById('cliente_cargo'); // Obtener el elemento select por su ID
                select.innerHTML = data;  // Insertar directamente las opciones generadas en el select
            })
            .catch(error => console.error('Error al cargar cargos clientes:', error)); // Manejar errores de la solicitud
    }

    CargarCargoCliente();

    document.addEventListener('DOMContentLoaded', () => {
        CargarCargoCliente(); // Llamar a la función para cargar los cargos de cliente
    });

// TÍTULO PARA CARGAR giros clientes

    // Función para cargar los giros de los clientes
    function CargarGiroCliente() {
        // Realiza una solicitud para obtener la lista de giros clientes desde el servidor
        fetch('../../../../../php/menu_principal/crear_nuevo/nueva_cotizacion/get_giro_cliente.php')
            .then(response => response.text())
            .then(data => {
                const select = document.getElementById('cliente_giro'); // Obtener el elemento select por su ID
                select.innerHTML = data;  // Insertar directamente las opciones generadas en el select
            })
            .catch(error => console.error('Error al cargar giros clientes:', error)); // Manejar errores de la solicitud
    }

    CargarGiroCliente();

    document.addEventListener('DOMContentLoaded', () => {
        CargarGiroCliente(); // Llamar a la función para cargar los giros de cliente
    });
    
// TÍTULO PARA CARGAR tipos de clientes

    // Función para cargar los tipos de clientes
    function CargarTipoCliente() {
        // Realiza una solicitud para obtener la lista de tipos de clientes desde el servidor
        fetch('../../../../../php/menu_principal/crear_nuevo/nueva_cotizacion/get_tipo_cliente.php')
            .then(response => response.text())
            .then(data => {
                const select = document.getElementById('cliente_tipo'); // Obtener el elemento select por su ID
                select.innerHTML = data;  // Insertar directamente las opciones generadas en el select
            })
            .catch(error => console.error('Error al cargar tipos de clientes:', error)); // Manejar errores de la solicitud
    }

    CargarTipoCliente();

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
        this.style.backgroundImage = 'url(../../../../../imagenes/menu_principal/crear_nuevo/nueva_cotizacion/banderas/' + flag + '.png)';
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