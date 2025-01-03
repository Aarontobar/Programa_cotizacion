
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
    -------------------------------------- INICIO ITred Spa Ver .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */


// TÍTULO: FUNCIÓN PARA IMPRIMIR CONTENIDO ESPECÍFICO DE LA PÁGINA

    // Detalle: Imprime el contenido de un contenedor específico, ocultando elementos no deseados y ajustando el formato de impresión.
    function imprimir() {
        // Obtener el contenido de la clase "contenedor"
        const contenedor = document.querySelector('.contenedor'); 
        
        // Clonar el contenido del contenedor para no alterar el original
        const contenidoClonado = contenedor.cloneNode(true);
        
        // Crear una nueva ventana para la impresión
        const ventanaImpresion = window.open('', '', 'width=850,height=1300'); // Ajusta el tamaño para hoja oficio
        
        // Escribir el contenido HTML para la nueva ventana
        ventanaImpresion.document.write(`
            <html>
            <head>
                <link rel="stylesheet" href="css/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton_ver_cotizacion/ver.css"> <!-- Vincular la hoja de estilos -->
                <title>Imprimir</title>
                <style>
                    @media print {
                        .ver {
                            font-family: Arial, sans-serif; /* Establecer fuente */
                            margin: 0; /* Sin márgenes */
                            padding: 0; /* Sin relleno */
                        }
                        .contenedor {
                            width: 100%; 
                            height: auto; 
                            page-break-after: always; /* Saltar página después de cada contenedor */
                        }
                        button { display: none; } /* Oculta el botón al imprimir */
                        label, input[type="radio"], span { display: none; } /* Oculta los elementos específicos */
                        @page {
                            size: legal; /* Tamaño oficio (legal) */
                            margin: 0; /* Sin márgenes */
                        }
                    }
                </style>
            </head>
            <body>
                <div class="ver">
                    <div class="contenedor">${contenidoClonado.innerHTML}</div> <!-- Incluir el contenido a imprimir -->
                </div>
                <script>
                    window.onload = function() {
                        window.print(); // Imprimir cuando la ventana se carga
                        window.close(); // Cerrar la ventana después de imprimir
                    };
                </script>
            </body>
            </html>
        `);
        
        ventanaImpresion.document.close(); // Cerrar el documento para que se renderice
    }

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Ver .JS ---------------------------------------
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