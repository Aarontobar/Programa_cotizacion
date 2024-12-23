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
    -------------------------------------- INICIO ITred Spa formulario encargado .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */


/* TÍTULO: VALIDACIÓN DEL NOMBRE DEL ENCARGADO */

/* Verifica que el campo de nombre solo contenga letras y espacios */
function validarNombre1() {
    let input = document.getElementById("nombre_encargado_cliente");

    // Verificar si el input existe antes de acceder a su valor
    if (input) {
        let nombre = input.value;

        // Expresión regular que solo permite letras y espacios
        let regex = /^[A-Za-z\s]+$/;

        // Verifica si el nombre contiene solo letras y espacios
        if (!regex.test(nombre)) {
            document.getElementById("error_nombre1").style.display = "inline";
            input.value = nombre.replace(/[^A-Za-z\s]/g, '');
        } else {
            document.getElementById("error_nombre1").style.display = "none";
        }
    } else {
        console.error("El campo nombre_encargado_cliente no se encuentra.");
    }
}


/* TÍTULO: FORMATEO DEL RUT */

/* Formatea el RUT ingresado en el campo de entrada */
function formatoRut(input) {
    // Obtiene el valor del campo y elimina cualquier carácter que no sea numérico
    let rut = input.value.replace(/\D/g, '');

    // Si el RUT tiene más de 9 caracteres, se limita a los primeros 9 (incluyendo el dígito verificador)
    if (rut.length > 9) {
        rut = rut.slice(0, 9);
    }

    // Aplica el formato al RUT. Si tiene más de 1 dígito, coloca un punto cada 3 dígitos y un guion antes del último
    if (rut.length > 1) {
        rut = rut.slice(0, -1).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + '-' + rut.slice(-1);
    }

    // Establece el valor del input formateado
    input.value = rut;

    // Limita la longitud total del input, asegurándose de que no exceda el formato esperado (12 caracteres)
    if (input.value.length > 12) {
        input.value = input.value.slice(0, 12);
    }
}


/* TÍTULO: FORMATEO DE DIRECCIÓN */

/* Formatea la dirección ingresada en el campo de entrada */
function formatoDireccion(input) {
    // Obtiene el valor del campo y elimina cualquier carácter que no sea alfanumérico o espacio
    let direccion = input.value.replace(/[^A-Za-z0-9\s]/g, '');

    // Limita la longitud total del input a 100 caracteres (ajusta según lo que necesites)
    if (direccion.length > 100) {
        direccion = direccion.slice(0, 100);
    }

    // Establece el valor del input formateado
    input.value = direccion;

    // Muestra u oculta el mensaje de error
    const errorSpan = document.getElementById('error_direccion');
    if (input.value.length < input.value.replace(/[^A-Za-z0-9\s]/g, '').length) {
        errorSpan.style.display = 'inline'; // Mostrar el mensaje de error
    } else {
        errorSpan.style.display = 'none'; // Ocultar el mensaje de error
    }
}


/* TÍTULO: MAPA DE BANDERAS POR PAÍS */

/* Objeto que asocia códigos de país con imágenes de banderas */
const banderasPais = {
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


/* TÍTULO: BANDERA POR DEFECTO */

/* Imagen de bandera por defecto cuando no coincide con ningún código */
const banderaPorDefecto = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/World_Flag_%282004%29.svg/640px-World_Flag_%282004%29.svg.png"; // Bandera por defecto


/* TÍTULO: DETECCIÓN DE PAÍS POR TELÉFONO */

/* Función para detectar el país según el número de teléfono ingresado */
function detectarPais(input) {
    const numeroTelefono = input.value.trim(); // Asegúrate de eliminar espacios
    const imagenBandera = document.getElementById("flag_encargado_cliente");

    // Itera sobre los códigos de país para detectar el correcto
    for (const codigo in banderasPais) {
        if (numeroTelefono.startsWith(codigo)) {
            imagenBandera.src = banderasPais[codigo];
            imagenBandera.style.display = "inline"; // Mostrar la imagen de la bandera
            return; // Detener la función si se encuentra el país
        }
    }
    // Si no se encuentra un código de país coincidente, muestra la bandera por defecto
    imagenBandera.src = banderaPorDefecto;
    imagenBandera.style.display = "inline";
}


/* TÍTULO: ASEGURAR EL '+' EN EL TELÉFONO */

/* Función para asegurar que el '+' esté presente y detectar el país */
function asegurarMasYDetectarPais(input) {
    // Verificar si el valor actual comienza con '+'
    if (!input.value.startsWith('+')) {
        input.value = '+' + input.value.replace(/^\+/, ''); // Agregar '+' al INICIO
    }

    // Permitir solo números después del '+' y mantener el '+'
    const validCharacters = input.value.replace(/[^0-9]/g, ''); // Eliminar caracteres no válidos, excepto '+'
    input.value = input.value[0] + validCharacters; // Mantener el '+' y agregar solo los números

    // Llamar a la función de detección de la bandera
    detectarPais(input);
}


// Asegúrate de que la bandera se actualice al cargar la página
window.onload = function () {
    const campoTelefono = document.getElementById('telefono_encargado_cliente');
    const campoTelefono1 = document.getElementById('telefono_empresa_cliente');
    asegurarMasYDetectarPais(campoTelefono); // Llama a la función para asegurar "+" y detectar el país
};


/* TÍTULO: VALIDACIÓN DEL EMAIL */

/* Función para validar el email ingresado */
function validarEmail(input) {
    const mensajeError = document.getElementById("mensaje_error_email");
    const caracteresEspeciales = /[\"'?!¡]/; // Caracteres especiales no permitidos

    // Elimina caracteres especiales no permitidos
    input.value = input.value.replace(caracteresEspeciales, '');

    const email = input.value.trim();

    // Expresión regular para validar el formato del email
    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Verifica si el email está vacío
    if (email === "") {
        mensajeError.textContent = "El campo no puede estar vacío.";
        mensajeError.style.display = "block";
        return; // Salir de la función si está vacío
    }

    // Verifica el formato del email
    if (!regexEmail.test(email)) {
        mensajeError.textContent = "Por favor, ingrese un email válido.";
        mensajeError.style.display = "block"; // Mostrar mensaje de error
    } else {
        mensajeError.style.display = "none"; // Ocultar mensaje de error si es válido
    }
}


/* TÍTULO: VALIDACIÓN DEL CARGO */

/* Función para validar el cargo ingresado */
function validarCargoEncargado(input) {
    const mensajeError = document.getElementById("error_cargo_encargado");
    const caracteresNoPermitidos = /[^a-zA-Z0-9\s]/g; // Solo se permiten letras, números y espacios

    // Elimina caracteres no permitidos
    input.value = input.value.replace(caracteresNoPermitidos, '');

    const cargo = input.value.trim();

    // Verifica si el cargo está vacío
    if (cargo === "") {
        mensajeError.style.display = "none"; // Ocultar mensaje de error si está vacío
    } else {
        mensajeError.style.display = "none"; // Ocultar mensaje de error si es válido
    }
}


/* TÍTULO: VALIDACIÓN DE LA CIUDAD */

/* Función para validar la ciudad ingresada */
function validarCiudadEncargado(input) {
    const mensajeError = document.getElementById("error_ciudad_encargado");
    const caracteresNoPermitidos = /[^a-zA-Z\s]/g; // Solo se permiten letras y espacios

    // Elimina caracteres no permitidos
    input.value = input.value.replace(caracteresNoPermitidos, '');

    const ciudad = input.value.trim();

    // Verifica si la ciudad está vacía
    if (ciudad === "") {
        mensajeError.style.display = "none"; // Ocultar mensaje de error si está vacío
    } else {
        mensajeError.style.display = "none"; // Ocultar mensaje de error si es válido
    }
}


/* TÍTULO: VALIDACIÓN DE LA COMUNA */

/* Función para validar la comuna ingresada */
function validarComunaEncargado(input) {
    const mensajeError = document.getElementById("error_comuna_encargado");
    const caracteresNoPermitidos = /[^a-zA-Z\s]/g; // Solo se permiten letras y espacios

    // Elimina caracteres no permitidos
    input.value = input.value.replace(caracteresNoPermitidos, '');

    const comuna = input.value.trim();

    // Verifica si la comuna está vacía
    if (comuna === "") {
        mensajeError.style.display = "none"; // Ocultar mensaje de error si está vacío
    } else {
        mensajeError.style.display = "none"; // Ocultar mensaje de error si es válido
    }
}

// Función para cargar los tipo de cargo
function CargarCargoEncargadO(idSelect) {
    fetch('get_cargo_encargado.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.text();
        })
        .then(data => {
            const select = document.getElementById(idSelect);
            if (select) {
                select.innerHTML = data;
            }
        })
        .catch(error => {
            console.error('Error al cargar cargos del encargado:', error);
            // Mostrar mensaje de error en el select
            const select = document.getElementById(idSelect);
            if (select) {
                select.innerHTML = '<option value="">Error al cargar cargos</option>';
            }
        });
}

// Función para cargar las áreas de empresa
function CargarAreasEmpresa() {
    fetch('get_area_empresa.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.text();
        })
        .then(data => {
            const select = document.getElementById('empresa_area');
            if (select) {
                select.innerHTML = data;
            }
        })
        .catch(error => {
            console.error('Error al cargar áreas de empresa:', error);
            const select = document.getElementById('empresa_area');
            if (select) {
                select.innerHTML = '<option value="">Error al cargar áreas</option>';
            }
        });
}

// Función para agregar una nueva fila
function agregarNuevaFila() {
    var tabla = document.getElementById('formulario-contenedor');
    var nuevaFila = tabla.insertRow();
    var cargosOptions = <?php echo json_encode($cargos); ?>;
    var optionsHtml = '<option value="">Seleccione un cargo</option>';
    cargosOptions.forEach(function(cargo) {
        optionsHtml += '<option value="' + cargo.id_tp_cargo + '">' + cargo.nombre_cargo + '</option>';
    });

    nuevaFila.innerHTML = `
        <td><input type="text" name="encargado_rut[]" required minlength="3" maxlength="20" 
            pattern="^[0-9]+[-kK0-9]{1}$" placeholder="Ejemplo: 12345678-9" oninput="formatoRut(this)"></td>
        <td><input type="text" name="encargado_nombre[]" required minlength="3" maxlength="255" 
            pattern="^[A-Za-zÀ-ÿ\s.-]+$" placeholder="Ejemplo: Juan Pérez" oninput="QuitarCaracteresInvalidos(this)"></td>
        <td>
            <select name="cargo_encargado[]" required>
                ${optionsHtml}
            </select>
        </td>
        <td><input type="email" name="encargado_email[]" placeholder="ejemplo@empresa.com" maxlength="255" required></td>
        <td><input type="text" name="encargado_fono[]" placeholder="+56 9 1234 1234" maxlength="11" required></td>
        <td><input type="text" name="encargado_celular[]" placeholder="+56 9 1234 1234" maxlength="11" required></td>
        <td><button type="button" class="eliminar-fila" onclick="eliminarFila(this)">Eliminar</button></td>
    `;
}

function eliminarFila(boton) {
    var fila = boton.closest('tr');
    if (document.getElementById('formulario-contenedor').rows.length > 1) {
        fila.remove();
    } else {
        alert('No se puede eliminar la última fila.');
    }
}

// Inicializar al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    CargarAreasEmpresa();
    CargarCargoEncargadO('cargo-encargado');
});

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa formulario encargado .JS ---------------------------------------
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