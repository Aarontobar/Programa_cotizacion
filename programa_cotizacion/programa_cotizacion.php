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
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'banners_predisenados';
    ?>
    <div class="navbar">
        <a href="?page=banners_predisenados" class="<?php echo $page == 'banners_predisenados' ? 'active' : ''; ?>">PREDISEÑADOS</a>
        <a href="?page=crear_nuevo_banner" class="<?php echo $page == 'crear_nuevo_banner' ? 'active' : ''; ?>">CREAR NUEVO</a>
        <a href="?page=modificar_banner" class="<?php echo $page == 'modificar_banner' ? 'active' : ''; ?>">MODIFICAR</a>
        <a href="?page=eliminar_banner" class="<?php echo $page == 'eliminar_banner' ? 'active' : ''; ?>">ELIMINAR</a>
    </div>

    <div class="content">
        <?php
        switch ($page) {
            case 'banners_predisenados':
                if (file_exists('banners_predisenados.php')) {
                    include 'banners_predisenados.php';
                } else {
                    echo '<p>La página de banners prediseñados aún no está disponible.</p>';
                }
                break;
            case 'crear_nuevo_banner':
                include 'php/editor_elemento/menu1_inicio/programa_cotizacion.php';
                break;
            case 'modificar_banner':
                if (file_exists('modificar_banner.php')) {
                    include 'modificar_banner.php';
                } else {
                    echo '<p>La página de modificar aún no está disponible.</p>';
                }
                break;
            case 'eliminar_banner':
                if (file_exists('eliminar_banners.php')) {
                    include 'eliminar_banners.php';
                } else {
                    echo '<p>La página de eliminar banners aún no está disponible.</p>';
                }
                break;
            default:
                include 'banners_predisenados.php';
                break;
        }
        ?>
    </div>
</body>
</html>