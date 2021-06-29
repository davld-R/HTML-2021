<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <link rel="stylesheet" href="css/style4.css" type="text/css">
</head>
<body>
<h1>Actualizar Datos</h1>
    <form action="update.php" method="POST">
        <?php
            $id=$_POST["id"];
            if(preg_match("/^[0-9]{7,11}$/",$id)){
                include "conexion.php";
                if($con){
                    $sql="select * from clientes where id='".$id."'";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<input type='text' name='txtOldId' id='txtOldId' value='".$row["id"]."' required hidden><br>";
                            echo "<p>ID: </p><input type='text' name='txtId' id='txtId' value='".$row["id"]."' required><br>";
                            echo "<p>Nombre: </p><input type='text' name='txtName' id='txtName' value='".$row["nombre"]."' required><br>";
                            echo "<p>Apellido: </p><input type='text' name='txtApellido' id='txtApellido' value='".$row["apellido"]."' required><br>";
                            echo "<p>Dirección: </p><input type='text' name='txtDireccion' id='txtDireccion' value='".$row["direccion"]."' required><br>";
                            echo "<p>Teléfono: </p><input type='text' name='txtTelefono' id='txtTelefono' value='".$row["telefono"]."' required><br>";
                            echo "<p>Fecha de nacimiento: </p><input type='date' name='txtFecha' id='txtFecha' value='".$row["fecha_nacimiento"]."' required><br><br>";
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