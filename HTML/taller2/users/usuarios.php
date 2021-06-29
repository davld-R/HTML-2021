<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>
</head>
<body>
<?php
        session_start();
        $username=$_SESSION['user'];
        if($username){
             echo "<a href='modificar.php'>Modificar datos</a><br><br>";
             echo "<p>Bienvenido ".$username." <a href='../close.php'>cerrar sesion</a></p>";
        } 
        else header("Location: ../index.html");
    ?>
</body>
</html>