<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->

<!-- ------------------------------------------------------------------------------------------------------------
    ------------------------------------- INICIO ITred Spa mostrar cliente.PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!-- TITULO: AQUÍ INICIA EL HTML -->

    <!-- INICIO HTML -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Clientes</title>

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../../css/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton2_crear_cliente/mostrar_clientes.css">
    <!-- Cierra el elemento de cabecera -->
</head>
<body>

<!-- TÍTULO PARA EL CONTENEDOR PRINCIPAL DE LA LISTA DE CLIENTES -->

    <!-- Brindando el contenedor principal de la lista de clientes -->
    <div class="contenedor">
        <h1>Listado de Clientes</h1>

        <!-- TÍTULO PARA EL CONTENEDOR DE LA TABLA DE CLIENTES -->

            <!-- Lista de tablas de empresas del clientes -->
            <div class="tabla-contenedor-lista">
                <table>

                    <!-- TÍTULO PARA EL ENCABEZADO DE LA TABLA -->

                        <!-- Lista de tablas de empresas del clientes -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RUT Empresa</th>
                                <th>Nombre Empresa</th>
                                <th>Email</th>
                                <th>Giro</th>
                                <th>Comuna</th>
                                <th>Dirección</th>
                                <th>RUT Encargado</th>
                                <th>Nombre Encargado</th>
                                <th>Cargo Encargado</th>
                                <th>Teléfono Encargado</th>
                                <th>Email Encargado</th>
                                <th>Estado Encargado</th>
                                <th>Estado Empresa</th>
                            </tr>
                        </thead>

                    <!-- TÍTULO PARA EL CUERPO DE LA TABLA DONDE SE MUESTRAN LOS DATOS -->

                        <!-- Lista de tablas de empresas del clientes (apartado de los datos) -->
                        <tbody>
                            <?php

                            // TÍTULO: CONSULTA PARA OBTENER LOS DATOS DE LOS CLIENTES DESDE LA BASE DE DATOS //
                                
                                /* Llamado con un select desde la base de datos */
                                $resultado = $mysqli->query("SELECT * FROM C_Clientes");

                            // TÍTULO: VERIFICAR SI LA CONSULTA RETORNA ALGÚN RESULTADO //
                                
                                /* Uso de IF para contar los datos de la empresa del cliente en una fila */
                                if ($resultado->num_rows > 0) {

                                    // TÍTULO: ITERAR SOBRE CADA CLIENTE Y GENERAR UNA FILA EN LA TABLA //
                                        /* Mientras se carga el IF, se utiliza while para captar los resultados de los datos de empresa */
                                        while ($cliente = $resultado->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$cliente['id_cliente']}</td>
                                                    <td>{$cliente['rut_empresa_cliente']}</td>
                                                    <td>{$cliente['nombre_empresa_cliente']}</td>
                                                    <td>{$cliente['email_empresa_cliente']}</td>
                                                    <td>{$cliente['id_giro']}</td>
                                                    <td>{$cliente['comuna_empresa_cliente']}</td>
                                                    <td>{$cliente['direccion_empresa_cliente']}</td>
                                                    <td>{$cliente['rut_encargado_cliente']}</td>
                                                    <td>{$cliente['nombre_encargado_cliente']}</td>
                                                    <td>{$cliente['id_cargo']}</td>
                                                    <td>{$cliente['telefono_encargado_cliente']}</td>
                                                    <td>{$cliente['email_encargado_cliente']}</td>
                                                    <td>{$cliente['estado_encargado_cliente']}</td>
                                                    <td>{$cliente['estado_empresa_cliente']}</td>
                                                </tr>";
                                        }
                                } else {
                            // TÍTULO: CASO EN QUE NO HAY CLIENTES REGISTRADOS //

                                /* Avisa en el caso que no encuentre clientes registrados */
                                    echo "<tr><td colspan='17'>No hay clientes registrados.</td></tr>";
                            }
                            ?>
                        </tbody>
                </table>
            </div>
    </div>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="../../../js/editor_elemento/menu1_inicio/crear_nuevo/editor_menu2/menu2/boton2_crear_cliente/mostrar_clientes.js"></script>
</body>






<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa mostrar cliente .PHP ----------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->

<!--
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
-->