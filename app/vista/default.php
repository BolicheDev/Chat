<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Cargamos los JavaScript -->
    <script src="<?=RUTA?>web/js/jquery-3.4.1.min.js"></script>
    <script src="<?=RUTA?>web/js/principal.js"></script>
    <!-- Cargamos los css -->
    <link rel="stylesheet" href="<?=RUTA?>web/css/principal.css" />
    <title>Chat</title>
</head>

<body>
    <div class="contenedor" id="contenedor">
        <?php imprimir_mensajes()?>
        <!-- AQUÍ COMIENZA LA VISTA-->
        <?php print $HTML_vista;?>
        <!-- AQUÍ TERMINA LA VISTA -->
    </div>
</body>

</html>