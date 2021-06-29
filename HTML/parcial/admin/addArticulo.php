<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Articulo</title>
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
                $title=$_POST["txtTitle"];
                $text=$_POST["txtText"];
                $valTitle=false;
                $valText=false;
                if(preg_match("/^[a-zA-Z0-9\ñ\Ñ\-\.\, ]{5,50}$/",$title)) $valTitle=true;
                if(preg_match("/^[a-zA-Z0-9\ñ\Ñ\-\.\, ]+$/",$text)) $valText=true;
                if($valText && $valTitle){
                    if($_FILES["fileUpload"]["size"]<5242880){
                        if($_FILES["fileUpload"]["type"]=="image/png" || $_FILES["fileUpload"]["type"]=="image/jpeg"){
                            if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"../uploads/".basename($_FILES["fileUpload"]["name"]))){
                                $sql="insert into articulos(title,text,image,user,date) values ('".$title."','".$text."','".basename($_FILES["fileUpload"]["name"])."','".$username."',CURDATE())";
                                if($connection->query($sql)){
                                    //echo "<p>El articulo se agrego de forma correcta <a href='panel.php'>volver</a></p>";
                                    header("Location: panel.php");
                                }
                                else echo "<p>Error de comunicacion <a href='nuevoArticulo.php'>volver</a></p>";
                            }
                            else echo "<p>Error de carga <a href='nuevoArticulo.php'>volver</a></p>";
                        }
                        else echo "<p>Formato de archivo no permitido <a href='nuevoArticulo.php'>volver</a></p>";
                    }
                    else echo "<p>El archivo supera el limite de tamaño <a href='nuevoArticulo.php'>volver</a></p>";
                }
                else echo "<p>Datos enviados no validos <a href='nuevoArticulo.php'>volver</a></p>";
                $connection->close();
            
            }
        } 
        else header("Location: ../index.html")
    ?>
</body>
</html>