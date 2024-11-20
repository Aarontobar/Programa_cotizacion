<?php
// Establece la conexión a la base de datos de ITred Spa
$mysqli = new mysqli('localhost', 'root', '', 'ITredSpa_bd');
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Cotización ITred Spa</title>
    <link rel="stylesheet" href="css/programa_cotizacion.css">
</head>
<body>
    <h1>Menú Principal - Cotización ITred Spa</h1>

    <!-- Formulario para seleccionar la Empresa -->
    <div class="empresa-selector">
        <?php include 'seleccionar_empresa.php'; ?>
    </div>

    <!-- Menú de navegación -->
    <nav class="menu-principal">
        <button onclick="cargarContenido('nueva_cotizacion')" class="menu-btn">Nueva Cotización</button>
        <button onclick="cargarContenido('crear_cliente')" class="menu-btn">Crear Cliente</button>
        <button onclick="cargarContenido('crear_producto')" class="menu-btn">Crear Producto</button>
        <button onclick="cargarContenido('crear_proveedor')" class="menu-btn">Crear Proveedor</button>
        <button onclick="cargarContenido('ver_listado')" class="menu-btn">Ver listado Cotización</button>
        <button onclick="cargarContenido('crear_empresa')" class="menu-btn">Crear nueva empresa</button>
    </nav>

    <!-- Contenedor para el contenido dinámico -->
    <div id="contenido-dinamico" class="contenido-dinamico">
        <!-- Aquí se cargará el contenido de forma dinámica -->
    </div>

    <script>
    // TÍTULO: FUNCIÓN PARA CARGAR CONTENIDO DINÁMICAMENTE
    function cargarContenido(seccion) {
        const contenedor = document.getElementById('contenido-dinamico');
        const empresa_id = document.querySelector('[name="empresa"]').value;

        // Mostrar indicador de carga
        contenedor.innerHTML = '<div class="loading">Cargando...</div>';

        // Mapeo de secciones a archivos PHP
        const archivos = {
            'nueva_cotizacion': 'nueva_cotizacion.php',
            'crear_cliente': 'crear_cliente.php',
            'crear_producto': 'crear_producto.php',
            'crear_proveedor': 'crear_proveedor.php',
            'ver_listado': 'ver_listado.php',
            'crear_empresa': 'crear_empresa.php'
        };

        // Realizar la petición AJAX
        fetch(`${archivos[seccion]}?id=${empresa_id}`)
            .then(response => response.text())
            .then(html => {
                contenedor.innerHTML = html;
                // Ejecutar scripts si los hay en el contenido cargado
                Array.from(contenedor.getElementsByTagName('script')).forEach(script => {
                    eval(script.innerHTML);
                });
            })
            .catch(error => {
                contenedor.innerHTML = `<div class="error">Error al cargar el contenido: ${error}</div>`;
            });
    }

    // TÍTULO: INICIALIZACIÓN
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar el envío del formulario de selección de empresa
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const empresa_id = document.querySelector('[name="empresa"]').value;
                if (empresa_id) {
                    // Habilitar botones del menú
                    document.querySelectorAll('.menu-btn').forEach(btn => {
                        btn.disabled = false;
                    });
                }
            });
        }

        // Deshabilitar botones inicialmente
        document.querySelectorAll('.menu-btn').forEach(btn => {
            btn.disabled = !document.querySelector('[name="empresa"]').value;
        });
    });
    </script>
</body>
</html>

<?php
$mysqli->close();
?>