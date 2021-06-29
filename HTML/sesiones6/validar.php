<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar</title>
</head>
<body>
    <?php
        session_start();
        include "conexion.php";        
        if($con){
            $user=$_POST["txtUser"];
            $pass=$_POST["txtPassword"];
            $valUser=false;
            $valPass=false;
            if(preg_match("/^[a-zA-Z\ñ\Ñ0-9 ]{3,30}$/",$user)) $valUser=true;
            if(preg_match("/^[a-zA-Z\ñ\Ñ0-9\-\_\*\+\!\&]{8,15}$/",$pass)) $valPass=true;
            if($valUser && $valPass){
                $sql="select * from usuarios where user='".$user."' and password=sha2('".$pass."',256)";
                if($resultado=$connection->query($sql)){
                    if($row=$resultado->fetch_assoc()){
                        if($row["state"]==1){
                            if($row["type"]=='a'){
                                $_SESSION['user']=$user; 
                                header("Location:panel.php");
                            }
                            else{
                                if($row["type"]=='u'){
                                    $_SESSION['user']=$user; 
                                    echo "<p>El usuario existe <a href='close.php'>cerrar sesion</a></p>";
                                }
                            }
                        }
                        else echo "<p>El usuario esta deshabilitado <a href='index.html'>volver</a></p>";
                    }
                    else echo "<p>El usuario o contrañe no coinciden <a href='index.html'>volver</a></p>";
                }
                else echo "<p>Error de comunicacion <a href='index.html'>volver</a></p>";
            }
            else echo "<p>Datos enviados no validos <a href='index.html'>volver</a></p>";
            $connection->close();
        }
        else echo "<p>Error de comunicacion <a href='index.html'>volver</a></p>";
    ?>
</body>
</html>