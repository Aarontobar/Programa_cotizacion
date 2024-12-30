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
    -------------------------------------- INICIO ITred Spa crear_empresa_pr .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */
    
// TÍTULO: FORMATEAR RUT EN EL CAMPO DE ENTRADA
    /* Aplica el formato correcto a un RUT chileno al ingresar datos */
    function formatoRut(input) {
        let rut = input.value.replace(/\D/g, '');
        if (rut.length > 9) {
            rut = rut.slice(0, 9);
        }
        if (rut.length > 1) {
            rut = rut.slice(0, -1).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + '-' + rut.slice(-1);
        }
        input.value = rut;
        if (input.value.length > 12) {
            input.value = input.value.slice(0, 12);
        }
    }

// TÍTULO: CONFIGURAR BOTONES DE AGREGAR REQUISITOS, OBLIGACIONES Y CONDICIONES
    /* Asigna eventos de clic a los botones para agregar requisitos, obligaciones y condiciones */
    document.getElementById('boton-agregar-requisito').addEventListener('click', AgregarRequisito);
    document.getElementById('boton-agregar-obligacion').addEventListener('click', AgregarObligacion);
    document.getElementById('boton-agregar-condicion').addEventListener('click', AgregarCondicion);

// TÍTULO: ENVIAR FORMULARIO DE COTIZACIÓN
    /* Al enviar, crea cadenas de datos de condiciones, requisitos, obligaciones, y cuentas bancarias para ser procesadas */
    document.getElementById('formulario-cotizacion').addEventListener('submit', function(event) {
        event.preventDefault();

        let StringCondiciones = '';
        document.querySelectorAll('#contenedor-condiciones .fila-condiciones').forEach((DivCondiciones, index) => {
            const CampoInput = DivCondiciones.querySelector('input');
            if (CampoInput) {
                StringCondiciones += (index > 0 ? '|' : '') + CampoInput.value;
            }
        });

        let requisitosString = '';
        document.querySelectorAll('#contenedor-requistos .fila-requisitos').forEach((requisitoDiv, index) => {
            const CampoInput = requisitoDiv.querySelector('input');
            if (CampoInput) {
                requisitosString += (index > 0 ? '|' : '') + CampoInput.value;
            }
        });

        let obligacionesString = '';
        document.querySelectorAll('#obligaciones-contenedor .fila-obligaciones').forEach((obligacionesDiv, index) => {
            const CampoInput = obligacionesDiv.querySelector('input');
            if (CampoInput) {
                obligacionesString += (index > 0 ? '|' : '') + CampoInput.value;
            }
        });

        if (cuentas.length === 0) {
            alert('Debe agregar al menos una cuenta bancaria antes de enviar el formulario.');
            return;
        }

        let cuentasString = '';
        cuentas.forEach((account, index) => {
            cuentasString += (index > 0 ? '|' : '') +
                `${account.nombre},${account.rut},${account.celular},${account.email},${account.banco},${account.tipoCuenta},${account.numeroCuenta}`;
        });

        const InputsOcultosCuentas = document.createElement('input');
        InputsOcultosCuentas.type = 'hidden';
        InputsOcultosCuentas.InputsOcultosCuentas.name = 'cuentas_bancarias';
        InputsOcultosCuentas.value = cuentasString;
        this.appendChild(InputsOcultosCuentas);

        const InputsOcultosCondiciones = document.createElement('input');
        InputsOcultosCondiciones.type = 'hidden';
        InputsOcultosCondiciones.name = 'condiciones';
        InputsOcultosCondiciones.value = StringCondiciones;
        this.appendChild(InputsOcultosCondiciones);

        const InputsOcultosRequisitos = document.createElement('input');
        InputsOcultosRequisitos.type = 'hidden';
        InputsOcultosRequisitos.name = 'requisitos';
        InputsOcultosRequisitos.value = requisitosString;
        this.appendChild(InputsOcultosRequisitos);

        const InputsOcultosObligaciones = document.createElement('input');
        InputsOcultosObligaciones.type = 'hidden';
        InputsOcultosObligaciones.name = 'obligaciones';
        InputsOcultosObligaciones.value = obligacionesString;
        this.appendChild(InputsOcultosObligaciones);

        this.submit();
    });

// TÍTULO: VERIFICAR SELECCIÓN DE FIRMA
    /* Verifica si se ha seleccionado una firma y habilita o deshabilita el botón de subir */
    function VerificarSeleccionFirma() {
        const OpcionFirma = document.querySelectorAll('input[name="opcion-firma"]');
        const HayAlgoSeleccionado = Array.from(OpcionFirma).some(option => option.checked);
        document.getElementById('boton-subir').disabled = !HayAlgoSeleccionado || cuentas.length === 0;
    }

// TÍTULO: LISTENER DE CAMBIO EN LA SELECCIÓN DE FIRMA
    /* Escucha los cambios en la selección de firma y actualiza el estado del botón */
    const OpcionFirma = document.querySelectorAll('input[name="opcion-firma"]');
    OpcionFirma.forEach(option => {
        option.addEventListener('change', VerificarSeleccionFirma);
    });

// TÍTULO: VERIFICAR ESTADO DE FIRMA AL CARGAR LA PÁGINA
    /* Comprueba el estado de selección de la firma al cargar la página */
    VerificarSeleccionFirma();

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa crear_empresa_pr .JS ---------------------------------------
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

