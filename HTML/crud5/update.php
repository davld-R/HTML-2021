<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <h1>Actualizar</h1>
    <?php
        $oldCode=$_POST["txtOldCode"];
        $code=$_POST["txtCode"];
        $name=$_POST["txtName"];
        $age=$_POST["txtAge"];
        $city=$_POST["txtCity"];
        $valOldCode=false;
        $valCode=false;
        $valName=false;
        $valAge=false;
        $valCity=false;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$name)) $valName=true;
        if(preg_match("/^I[0-9]{6}$/",$code)) $valCode=true;
        if(preg_match("/^I[0-9]{6}$/",$oldCode)) $valOldCode=true;
        if(intval($age)>10 && intval($age)<80) $valAge=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$city)) $valCity=true;
        if($valAge && $valCity && $valCode && $valName && $valOldCode){
            include "conexion.php";
            if($con){
                $sql="update estudiantes set codigo='".$code."',nombre='".$name."',edad=".$age.",ciudad='".$city."' where codigo='".$oldCode."'";
                if($connection->query($sql)){
                    echo "<p>Datos actualizados correctamente</p>";
                }
                else{
                    echo "<p>Error en la consulta</p>";
                }
                echo "<a href='modificar.php'>volver</a>";
                $connection->close();
            }
        }
    ?>
</body>
</html>