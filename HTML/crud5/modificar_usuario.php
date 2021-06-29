<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
<h1>Actualizacion</h1>
    <form action="update.php" method="POST">
        <?php
            $code=$_POST["id"];
            if(preg_match("/^I[0-9]{6}$/",$code)){
                include "conexion.php";
                if($con){
                    $sql="select * from estudiantes where codigo='".$code."'";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<input type='text' name='txtOldCode' id='txtOldCode' value='".$row["codigo"]."' required hidden><br>";
                            echo "<p>Codigo: </p><input type='text' name='txtCode' id='txtCode' value='".$row["codigo"]."' required><br>";
                            echo "<p>Nombre: </p><input type='text' name='txtName' id='txtName' value='".$row["nombre"]."' required><br>";
                            echo "<p>Edad: </p><input type='number' name='txtAge' id='txtAge' value='".$row["edad"]."' required><br>";
                            echo "<p>Ciudad: </p><input type='text' name='txtCity' id='txtCity' value='".$row["ciudad"]."' required><br>";
                        }
                    }
                }
            }
        ?>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>