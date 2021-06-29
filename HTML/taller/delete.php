<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="css/style3.css" type="text/css">
</head>
<body>
    <h1>Eliminar Usuario</h1>
    <?php
        $id=$_POST["id"];
        if(preg_match("/^[0-9]{7,11}$/",$id)){
            include "conexion.php";
            if($con){
                $sql="delete from clientes where id='".$id."'";
                if($connection->query($sql)){
                    echo "<p>El usuario fue eliminado</p>";
                }
                else{
                    echo "<p>Error en la consulta</p>";
                }
                echo "<a href='eliminar.php'>volver</a>";
                $connection->close();
            }
        }
    ?>
</body>
</html>