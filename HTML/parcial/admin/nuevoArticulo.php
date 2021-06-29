<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo articulo</title>
    <link rel="stylesheet" href="css/style2.css" type="text/css">
</head>
<body>
    <?php
        session_start();
        $username=$_SESSION['user'];
        if($username){
            include "../conexion.php";
            if($con){
                $sql="select * from usuarios where user='".$username."'";
                if($resultado=$connection->query($sql)){
                    if($row=$resultado->fetch_assoc()){
                        if($row["type"]=='a') echo "<p>Bienvenido ".$username." <a href='../close.php'>cerrar sesion</a></p>";
                        else{
                            echo "<p>No tiene autorizacion <a href='../users/usuarios.php'>volver</a></p>";
                            $connection->close();
                            die();
                        }
                    }
                }
                $connection->close();
            }
        } 
        else header("Location: ../index.html")
    ?>
    <h1>Nuevo articulo</h1>
    <form action="addArticulo.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Titulo: </td>
                <td><input type="text" name="txtTitle" id="txtTitle"></td>
            </tr>
            <tr>
                <td>Texto: </td>
                <td><textarea name="txtText" id="txtText" cols="100" rows="20"></textarea></td>
            </tr>
            <tr>
                <td>Imagen: </td>
                <td><input type="file" name="fileUpload" id="fileUpload"  accept="image/png, .jpg, .jpeg"></td>
            </tr>
        </table>
        <input type="submit" value="Crear articulo"><br><br>
        <a href="panel.php">volver</a>
    </form>
</body>
</html>