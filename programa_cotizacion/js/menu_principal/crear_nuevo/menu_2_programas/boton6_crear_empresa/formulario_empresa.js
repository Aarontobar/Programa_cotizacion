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
    -------------------------------------- INICIO ITred Spa Formulario Empresa .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

// TÍTULO PARA DOCUMENT.ADD_EVENT_LISTENER('DOMCONTENTLOADED')

    // Función que se ejecuta cuando el contenido del DOM ha sido completamente cargado
    document.addEventListener('DOMContentLoaded', () => {
        // Establece el valor del campo 'fecha_creacion' a la fecha actual en formato ISO (YYYY-MM-DD)
        document.getElementById('fecha_creacion').value = new Date().toISOString().split('T')[0];
    });


// TÍTULO PARA VALIDAR EL NOMBRE DE LA EMPRESA

    // Evento para validar el nombre de la empresa al introducir texto
    document.getElementById('empresa_nombre').addEventListener('input', function () {
        const input = this;
        // Elimina caracteres no válidos (solo permite letras, números y algunos caracteres especiales)
        input.value = input.value.replace(/[^A-Za-zÀ-ÿ0-9\s&.-]/g, '');
    });


// TÍTULO PARA VALIDAR LA DIRECCIÓN DE LA EMPRESA

    // Evento para validar la dirección de la empresa al introducir texto
    document.getElementById('empresa_direccion').addEventListener('input', function () {
        const input = this;
        // Elimina caracteres no válidos (solo permite letras, números y algunos caracteres especiales)
        input.value = input.value.replace(/[^A-Za-z0-9À-ÿ\s#,-.]/g, '');
    });


// TÍTULO PARA COMPLETAR EMAIL

    // Función para completar el correo electrónico automáticamente
    function CompletarEmail(input) {
        // Eliminar comillas simples y dobles de la entrada
        input.value = input.value.replace(/['"]/g, '');

        // Patrón de expresión regular para validar el correo electrónico
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
        
        // Verifica si el correo electrónico tiene un formato válido
        if (!emailPattern.test(input.value)) {
            // Comprueba si el valor no contiene '@'
            if (!input.value.includes('@')) {
                // Añadir '@gmail.com' si no se ingresó un dominio
                input.value += '@gmail.com'; 
            } else {
                alert("Por favor, ingresa un correo electrónico válido."); // Mensaje de error si no es válido
            }
        }
    }


// TÍTULO PARA QUITAR CARACTERES INVALIDOS

    // Función para quitar caracteres inválidos de la entrada
    function QuitarCaracteresInvalidos(input) {
        // Eliminar comillas simples, dobles y cualquier otro carácter no deseado
        input.value = input.value.replace(/['"]/g, '');
    }


// TÍTULO PARA CARGAR ÁREAS DE EMPRESA

    // Función para cargar las áreas de la empresa
    function CargarAreasEmpresa() {
        // Realiza una solicitud para obtener la lista de áreas de empresa desde el servidor
        fetch('../../../../../php/menu_principal/crear_nuevo/crear_empresa/get_area_empresa.php')
            .then(response => response.text())
            .then(data => {
                const select = document.getElementById('empresa_area'); // Obtener el elemento select por su ID
                select.innerHTML = data;  // Insertar directamente las opciones generadas en el select
            })
            .catch(error => console.error('Error al cargar áreas de empresa:', error)); // Manejar errores de la solicitud
    }

    CargarAreasEmpresa();

    // Cargar áreas de empresa al cargar la página
    document.addEventListener('DOMContentLoaded', () => {
        CargarAreasEmpresa(); // Llamar a la función para cargar las áreas de empresa
    });

    document.getElementById('countryCode').addEventListener('change', function() {
        const countryCode = this.value;
        const phoneNumberInput = document.getElementById('empresa_telefono');
        phoneNumberInput.value = phoneNumberInput.value.replace(/^\+\d+\s*/, '');
    
        // Formatear el número de teléfono
        const phoneNumber = phoneNumberInput.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
        const formattedPhoneNumber = phoneNumber.replace(/(\d{1})(\d{4})(\d{4})/, '$1 $2 $3');
        
        phoneNumberInput.value = countryCode + ' ' + formattedPhoneNumber;
    });
    
    // Formatear el número de teléfono en tiempo real
    document.getElementById('empresa_telefono').addEventListener('input', function() {
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
    ---------------------------------------- FIN ITred Spa Formulario Empresa .JS ---------------------------------------
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