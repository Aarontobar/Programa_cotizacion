
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

// TÍTULO: PARA EL OBJETO DE BANDERAS 2

    // Objeto que asocia códigos de país de América con imágenes de banderas
    const banderasPais2 = {
        "+1": "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/32px-Flag_of_United_States.svg.png", // USA
        "+52": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/32px-Flag_of_Mexico.svg.png", // Mexico
        "+56": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/32px-Flag_of_Chile.svg.png", // Chile
        "+54": "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/32px-Flag_of_Argentina.svg.png", // Argentina
        "+57": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/32px-Flag_of_Colombia.svg.png", // Colombia
        "+58": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Flag_of_Venezuela.svg/32px-Flag_of_Venezuela.svg.png", // Venezuela
        "+51": "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flag_of_Peru.svg/32px-Flag_of_Peru.svg.png", // Peru
        "+503": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_El_Salvador.svg/32px-Flag_of_El_Salvador.svg.png", // El Salvador
        "+591": "https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Bolivia.svg/32px-Flag_of_Bolivia.svg.png", // Bolivia
        "+507": "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Flag_of_Panama.svg/32px-Flag_of_Panama.svg.png", // Panama
        "+505": "https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Nicaragua.svg/32px-Flag_of_Nicaragua.svg.png", // Nicaragua
        "+502": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Flag_of_Guatemala.svg/32px-Flag_of_Guatemala.svg.png", // Guatemala
        "+504": "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Flag_of_Honduras.svg/32px-Flag_of_Honduras.svg.png", // Honduras
        "+53": "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Flag_of_Cuba.svg/32px-Flag_of_Cuba.svg.png", // Cuba
        "+55": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Flag_of_Brazil.svg/32px-Flag_of_Brazil.svg.png", // Brazil
        "+598": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/32px-Flag_of_Uruguay.svg.png", // Uruguay
        "+509": "https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Haiti.svg/32px-Flag_of_Haiti.svg.png", // Haiti
        "+593": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Flag_of_Ecuador.svg/32px-Flag_of_Ecuador.svg.png", // Ecuador
        "+595": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Paraguay.svg/32px-Flag_of_Paraguay.svg.png" // Paraguay
    };


// TÍTULO: PARA LA BANDERA POR DEFECTO

    // Imagen de bandera por defecto cuando no coincide con ningún código
    const banderaPorDefecto2 = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/World_Flag_%282004%29.svg/640px-World_Flag_%282004%29.svg.png"; // Bandera por defecto


// TÍTULO: PARA LA FUNCIÓN DE DETECCIÓN DE PAÍS

    // Función para detectar el país según el número de teléfono ingresado
    function detectarPais2(input) {
        const numeroTelefono2 = input.value.trim(); // Asegúrate de eliminar espacios
        const imagenBandera2 = document.getElementById("flag_vendedor_telefono"); // Asegúrate de tener la imagen con este ID
        
        // Título para la iteración sobre los códigos de país
        // Itera sobre los códigos de país para detectar el correcto
        for (const codigo in banderasPais2) {
            if (numeroTelefono2.startsWith(codigo)) {
                imagenBandera2.src = banderasPais2[codigo]; // Establece la imagen de la bandera correspondiente
                imagenBandera2.style.display = "inline"; // Mostrar la imagen de la bandera
                return; // Detener la función si se encuentra el país
            }
        }
        // Si no se encuentra un código de país coincidente, muestra la bandera por defecto
        imagenBandera2.src = banderaPorDefecto2; // Establece la imagen de la bandera por defecto
        imagenBandera2.style.display = "inline"; // Mostrar la bandera por defecto
    }


// TÍTULO: PARA LA FUNCIÓN DE ASEGURAR '+' Y DETECTAR PAÍS

    // Función para asegurar que el '+' esté presente y detectar el país
    function asegurarMasYDetectarPais2(input) {
        // Verificar si el valor actual comienza con '+'
        if (!input.value.startsWith('+')) {
            input.value = '+' + input.value.replace(/^\+/, ''); // Agregar '+' al INICIO
        }

        // Permitir solo números después del '+' y mantener el '+'
        const validCharacters = input.value.replace(/[^0-9]/g, ''); // Eliminar caracteres no válidos, excepto '+'
        input.value = input.value[0] + validCharacters; // Mantener el '+' y agregar solo los números

        // Llama a la función de detección de la bandera
        detectarPais2(input); // Llama a la función para detectar la bandera
    }


// TÍTULO: PARA LA INICIALIZACIÓN AL CARGAR LA PÁGINA

    // Asegúrate de que la bandera se actualice al cargar la página
    window.onload = function() {
        const campoTelefono2 = document.getElementById('enc_fono'); // Obtiene el campo de teléfono
        asegurarMasYDetectarPais2(campoTelefono2); // Llama a la función para asegurar "+" y detectar el país
    };


// TÍTULO: PARA EL OBJETO DE BANDERAS 3

    // Objeto que asocia códigos de país de América con imágenes de banderas
    const banderasPais3 = {
        "+1": "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/32px-Flag_of_United_States.svg.png", // USA
        "+52": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/32px-Flag_of_Mexico.svg.png", // Mexico
        "+56": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/32px-Flag_of_Chile.svg.png", // Chile
        "+54": "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/32px-Flag_of_Argentina.svg.png", // Argentina
        "+57": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/32px-Flag_of_Colombia.svg.png", // Colombia
        "+58": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Flag_of_Venezuela.svg/32px-Flag_of_Venezuela.svg.png", // Venezuela
        "+51": "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flag_of_Peru.svg/32px-Flag_of_Peru.svg.png", // Peru
        "+503": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_El_Salvador.svg/32px-Flag_of_El_Salvador.svg.png", // El Salvador
        "+591": "https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Bolivia.svg/32px-Flag_of_Bolivia.svg.png", // Bolivia
        "+507": "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Flag_of_Panama.svg/32px-Flag_of_Panama.svg.png", // Panama
        "+505": "https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Nicaragua.svg/32px-Flag_of_Nicaragua.svg.png", // Nicaragua
        "+502": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Flag_of_Guatemala.svg/32px-Flag_of_Guatemala.svg.png", // Guatemala
        "+504": "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Flag_of_Honduras.svg/32px-Flag_of_Honduras.svg.png", // Honduras
        "+53": "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Flag_of_Cuba.svg/32px-Flag_of_Cuba.svg.png", // Cuba
        "+55": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Flag_of_Brazil.svg/32px-Flag_of_Brazil.svg.png", // Brazil
        "+598": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/32px-Flag_of_Uruguay.svg.png", // Uruguay
        "+509": "https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Haiti.svg/32px-Flag_of_Haiti.svg.png", // Haiti
        "+593": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Flag_of_Ecuador.svg/32px-Flag_of_Ecuador.svg.png", // Ecuador
        "+595": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Paraguay.svg/32px-Flag_of_Paraguay.svg.png" // Paraguay
    };

// TÍTULO: PARA LA BANDERA POR DEFECTO

    // Imagen de bandera por defecto cuando no coincide con ningún código
    const banderaPorDefecto3 = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/World_Flag_%282004%29.svg/640px-World_Flag_%282004%29.svg.png"; // Bandera por defecto


// TÍTULO: PARA LA FUNCIÓN DE DETECCIÓN DE PAÍS

    // Función para detectar el país según el número de teléfono ingresado
    function detectarPais3(input) {
        const campoCelular = input.value.trim(); // Asegúrate de eliminar espacios
        const imagenBandera3 = document.getElementById("flag_vendedor_celular"); // Asegúrate de tener la imagen con este ID
        
        // Título para la iteración sobre los códigos de país
        // Itera sobre los códigos de país para detectar el correcto
        for (const codigo in banderasPais3) {
            if (campoCelular.startsWith(codigo)) {
                imagenBandera3.src = banderasPais3[codigo]; // Establece la imagen de la bandera correspondiente
                imagenBandera3.style.display = "inline"; // Mostrar la imagen de la bandera
                return; // Detener la función si se encuentra el país
            }
        }
        // Si no se encuentra un código de país coincidente, muestra la bandera por defecto
        imagenBandera3.src = banderaPorDefecto3; // Establece la imagen de la bandera por defecto
        imagenBandera3.style.display = "inline"; // Mostrar la bandera por defecto
    }


// TÍTULO: PARA LA FUNCIÓN DE ASEGURAR '+' Y DETECTAR PAÍS

    // Función para asegurar que el '+' esté presente y detectar el país
    function asegurarMasYDetectarPais3(input) {
        // Verificar si el valor actual comienza con '+'
        if (!input.value.startsWith('+')) {
            input.value = '+' + input.value.replace(/^\+/, ''); // Agregar '+' al INICIO
        }

        // Permitir solo números después del '+' y mantener el '+'
        const validCharacters = input.value.replace(/[^0-9]/g, ''); // Eliminar caracteres no válidos, excepto '+'
        input.value = input.value[0] + validCharacters; // Mantener el '+' y agregar solo los números

        // Llama a la función de detección de la bandera
        detectarPais3(input); // Llama a la función para detectar la bandera
    }


// TÍTULO: PARA LA INICIALIZACIÓN AL CARGAR LA PÁGINA

    // Asegúrate de que la bandera se actualice al cargar la página
    window.onload = function() {
        const campoCelular = document.getElementById('enc_celular'); // Obtiene el campo de teléfono
        asegurarMasYDetectarPais3(campoCelular); // Llama a la función para asegurar "+" y detectar el país
    };

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