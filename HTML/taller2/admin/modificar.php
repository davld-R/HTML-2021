<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <h1>Modificar Usuario</h1>
    <form action="modificar_usuario.php" method="POST">
        <table>
            <?php
                include "../conexion.php";
                if($con){
                    $sql="select * from usuarios";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<tr>";
                            echo "<td><input type='radio' name='id' value='".$row["id"]."'></td>";
                            echo "<td><p>".$row["id"]."</p></td>";
                            echo "<td><p>".$row["user"]."</p></td>";
                            echo "</tr>";
                        }
                    }
                    $connection->close();
                }
            ?>
        </table>
        <input type="submit" value="Modificar"><br><br>
        <a href="panel.php">volver</a>
    </form>
</body>
</html>