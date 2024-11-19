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
    ------------------------------------- INICIO ITred Spa Filtro Busqueda .PHP --------------------------------------
    ------------------------------------------------------------------------------------------------------------- -->


<!-- ------------------------
     -- INICIO CONEXION BD --
     ------------------------ -->

     
     <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cotizaciones</title>

<!-- TITULO: IMPORTACIÓN DE ARCHIVO .CSS -->

    <!-- Llama al archivo CSS -->
    <link rel="stylesheet" href="../../../../css/menu_principal/crear_nuevo/ver_cotizacion/filtros_busqueda.css">

</head>

<!-- TÍTULO: FORMULARIO DE FILTRO -->
    <!-- Formulario del filtro dentro de la busqueda -->
<form id="filtro-form">

    <!-- Campo oculto para el ID -->
    <input type="text" hidden id="id" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

<!-- TÍTULO: NÚMERO DE COTIZACIÓN -->

    <!-- Ingresar número de cotización -->
    <label for="numero_cotizacion">Número de Cotización:</label>
    <input type="text" id="numero_cotizacion" name="numero_cotizacion">
 
<!-- TÍTULO: ESTADO -->

    <!-- Ingresar estado -->
    <label for="estado">Estado:</label>
    <select id="estado" name="estado">
        <option value="">Todos</option>
        <option value="Pendiente">Pendiente</option>
        <option value="Aprobado">Aprobado</option>
        <option value="Rechazado">Rechazado</option>
    </select>

<!-- TÍTULO: FECHA DE INICIO -->

    <!-- Ingresar fecha de inicio -->
    <label for="fecha_INICIO">Fecha INICIO:</label>
    <input type="date" id="fecha_INICIO" name="fecha_INICIO">

<!-- TÍTULO: FECHA DE FIN -->

    <!-- Ingresar fecha de fin -->
    <label for="fecha_fin">Fecha Fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin">


<!-- TÍTULO: BOTÓN DE BÚSQUEDA -->
    <!-- Botón para buscar -->
    <button type="submit">Buscar</button>

</form>

<!-- TITULO: IMPORTACION DE ARCHIVO .JS -->

    <!-- Llama al archivo JS -->
    <script src="../../../../js/menu_principal/crear_nuevo/ver_cotizacion/filtros_busqueda.js"></script>

<!-- ------------------------------------------------------------------------------------------------------------
    -------------------------------------- FIN ITred Spa Filtro Busqueda .PHP -----------------------------------
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
