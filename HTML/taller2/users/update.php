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
        $oldId=$_POST["txtOldId"];
        $id=$_POST["txtId"];
        $name=$_POST["txtName"];
        $password=$_POST["txtPassword"];
        $email=$_POST["txtEmail"];
        $typeusu=$_POST["txtType"];
        $estado=$_POST["txtState"];
        $valOldId=false;
        $valId=false;
        $valName=false;
        $valPassword=false;
        $valEmail=false;
        $valTypeusu=false;
        $valEstado=false;
        if(preg_match("/^I[0-9]{6}$/",$oldId)) $valOldId=true;
        if(preg_match("/^I[0-9]{6}$/",$id)) $valId=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ0-9 ]{3,30}$/",$name)) $valName=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ0-9\-\_\*\+\!\&]{8,15}$/",$password)) $valPassword=true;
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)) $valEmail=true;
        if(preg_match("/^[a\u]{1}$/",$typeusu)) $valTypeusu=true;
        if(preg_match("/^[0-1]{1}$/",$estado)) $valEstado=true;
        if($valId && $valName && $valPassword && $valEmail && $valTypeusu && $valEstado){
            include "../conexion.php";
            if($con){
                $sql="update usuarios set id='".$id."',user='".$name."',password='".$password."',email='".$email."',type='".$typeusu."',state='".$estado."' where id='".$oldId."'";
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