<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="css/style3.css" type="text/css">
</head>
<body>
    <h1>Eliminar Usuario</h1>
    <form action="delete.php" method="POST">
        <table>
            <?php
                include "conexion.php";
                if($con){
                    $sql="select * from clientes";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<tr>";
                            echo "<td><input type='radio' name='id' value='".$row["id"]."'></td>";
                            echo "<td><p>".$row["id"]."</p></td>";
                            echo "<td><p>".$row["nombre"]."</p></td>";
                            echo "<td><p>".$row["apellido"]."</p></td>";
                            echo "</tr>";
                        }
                    }
                    $connection->close();
                }
            ?>
        </table>
        <input type="submit" value="Eliminar"><br><br>
        <a href="index.html">volver</a>
    </form>
</body>
</html>