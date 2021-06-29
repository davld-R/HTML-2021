<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <link rel="stylesheet" href="css/style5.css" type="text/css">
</head>
<body>
<h1>Actualizar Datos</h1>
    <form action="update.php" method="POST">
        <?php
            $id=$_POST["id"];
            if(preg_match("/^I[0-9]{6}$/",$id)){
                include "../conexion.php";
                if($con){
                    $sql="select * from usuarios where id='".$id."'";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            //echo "<input type='text' name='txtOldId' id='txtOldId' value='".$row["id"]."' required hidden><br>";
                            //echo "<p>ID: </p><input type='text' name='txtId' id='txtId' value='".$row["id"]."' required><br>";
                           // echo "<p>Nombre: </p><input type='text' name='txtName' id='txtName' value='".$row["user"]."' required><br>";
                            echo "<p>Contraseña: </p><input type='password' name='txtPassword' id='txtPassword' value='".$row["password"]."' required><br>";
                            echo "<p>Gmail: </p><input type='text' name='txtEmail' id='txtEmail' value='".$row["email"]."' required><br>";
                           // echo "<p>Tipo de Usuario: </p><input type='text' name='txtType' id='txtType' value='".$row["type"]."' required><br>";
                          //  echo "<p>Estado: </p><input type='text' name='txtState' id='txtState' value='".$row["state"]."' required><br><br>";
                        }
                    }
                }
            }
        ?>
        <input type="submit" value="Actualizar"><br><br>
        <a href="modificar.php">volver</a>
    </form>
</body>
</html>