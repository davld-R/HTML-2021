<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar sesion</title>
    <link rel="stylesheet" href="css/style3.css" type="text/css">
</head>
<body>
    <?php
        session_start();
        session_destroy();
        echo "<p>Sesion finalizada <a href='index.html'>volver</a></p>";
    ?>
</body>
</html>