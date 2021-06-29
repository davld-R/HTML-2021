<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registrar</h1>
    <?php
        $name=$_POST["txtName"];
        $code=$_POST["txtCode"];
        $age=$_POST["txtAge"];
        $city=$_POST["txtCity"];
        $valName=false;
        $valCode=false;
        $valAge=false;
        $valCity=false;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$name)) $valName=true;
        if(preg_match("/^I[0-9]{6}$/",$code)) $valCode=true;
        if(intval($age)>10 && intval($age)<80) $valAge=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$city)) $valCity=true;
        if($valName && $valCode && $valAge && $valCity){
            include "conexion.php";
            if($con){
                $sql="insert into estudiantes values('".$code."','".$name."',".$age.",'".$city."')";
                if($connection->query($sql)){
                    echo "<p>Registro exitoso <a href='index.html'>volver</a></p>";
                }
                else{
                    echo "<p>Error en la consulta <a href='registro.html'>volver</a></p>";
                }
                $connection->close();
            }
            else{
                echo "<p>Error de conexion <a href='registro.html'>volver</a></p>";
            }
        }
        else{
            echo "<p>Error en los datos ingresados <a href='registro.html'>volver</a></p>";
        }
    ?>
</body>
</html>