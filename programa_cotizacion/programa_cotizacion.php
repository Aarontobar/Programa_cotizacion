<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Banners</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #000;
        }
        .navbar {
            display: flex;
            justify-content: center;
            background-color: #f0f0f0;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        .navbar a {
            text-decoration: none;
            color: #000;
            padding: 10px 20px;
            border: 1px solid #000;
            margin: 0;
            background-color: #e0e0e0;
        }
        .navbar a:hover {
            background-color: #d0d0d0;
        }
        .navbar a.active {
            background-color: #c0c0c0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#" class="active">BANNERS PREDISEÑADOS</a>
        <a href="#">CREAR NUEVO BANNER</a>
        <a href="#">MODIFICAR BANNER</a>
        <a href="#">ELIMINAR BANNER</a>
        <!-- New link to the internal programa_cotizacion.php -->
        <a href="php/editor_elemento/menu1_inicio/programa_cotizacion.php">IR A COTIZACIONES</a>
    </div>
</body>
</html>