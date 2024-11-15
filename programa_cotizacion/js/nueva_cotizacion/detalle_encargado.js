
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

// TÍTULO: OBJETO DE BANDERAS
const banderasPais = {
    "+1": "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/32px-Flag_of_United_States.svg.png",
    "+52": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/32px-Flag_of_Mexico.svg.png",
    "+56": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/32px-Flag_of_Chile.svg.png",
    "+54": "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/32px-Flag_of_Argentina.svg.png",
    "+57": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/32px-Flag_of_Colombia.svg.png",
    "+58": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Flag_of_Venezuela.svg/32px-Flag_of_Venezuela.svg.png",
    "+51": "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flag_of_Peru.svg/32px-Flag_of_Peru.svg.png",
    "+503": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_El_Salvador.svg/32px-Flag_of_El_Salvador.svg.png",
    "+591": "https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Bolivia.svg/32px-Flag_of_Bolivia.svg.png",
    "+507": "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Flag_of_Panama.svg/32px-Flag_of_Panama.svg.png",
    "+505": "https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Nicaragua.svg/32px-Flag_of_Nicaragua.svg.png",
    "+502": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Flag_of_Guatemala.svg/32px-Flag_of_Guatemala.svg.png",
    "+504": "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Flag_of_Honduras.svg/32px-Flag_of_Honduras.svg.png",
    "+53": "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Flag_of_Cuba.svg/32px-Flag_of_Cuba.svg.png",
    "+55": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Flag_of_Brazil.svg/32px-Flag_of_Brazil.svg.png",
    "+598": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/32px-Flag_of_Uruguay.svg.png",
    "+509": "https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Haiti.svg/32px-Flag_of_Haiti.svg.png",
    "+593": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Flag_of_Ecuador.svg/32px-Flag_of_Ecuador.svg.png",
    "+595": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Paraguay.svg/32px-Flag_of_Paraguay.svg.png"
};

// TÍTULO: BANDERA POR DEFECTO
const banderaPorDefecto = "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/World_Flag_%282004%29.svg/640px-World_Flag_%282004%29.svg.png";

// TÍTULO: FUNCIÓN DE DETECCIÓN DE PAÍS
function detectarPais(input, flagId) {
    const numeroTelefono = input.value.trim();
    const imagenBandera = document.getElementById(flagId);
    
    if (!imagenBandera) return;

    for (const codigo in banderasPais) {
        if (numeroTelefono.startsWith(codigo)) {
            imagenBandera.src = banderasPais[codigo];
            imagenBandera.style.display = "inline";
            return;
        }
    }
    imagenBandera.src = banderaPorDefecto;
    imagenBandera.style.display = "inline";
}

// TÍTULO: FUNCIÓN DE ASEGURAR '+' Y DETECTAR PAÍS
function asegurarMasYDetectarPais(input, flagId) {
    if (!input.value.startsWith('+')) {
        input.value = '+' + input.value.replace(/^\+/, '');
    }
    
    const validCharacters = input.value.replace(/[^0-9+]/g, '');
    input.value = validCharacters.startsWith('+') ? validCharacters : '+' + validCharacters;

    detectarPais(input, flagId);
}

// TÍTULO: INICIALIZACIÓN AL CARGAR LA PÁGINA
document.addEventListener('DOMContentLoaded', function() {
    const campoTelefonoEncargado = document.getElementById('enc-fono');
    const campoTelefonoVendedor = document.getElementById('enc_celular');

    if (campoTelefonoEncargado) {
        campoTelefonoEncargado.addEventListener('input', function() {
            asegurarMasYDetectarPais(this, 'flag_encargado');
        });
        asegurarMasYDetectarPais(campoTelefonoEncargado, 'flag_encargado');
    }

    if (campoTelefonoVendedor) {
        campoTelefonoVendedor.addEventListener('input', function() {
            asegurarMasYDetectarPais(this, 'flag_encargado');
        });
        asegurarMasYDetectarPais(campoTelefonoVendedor, 'flag_encargado');
    }
});
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