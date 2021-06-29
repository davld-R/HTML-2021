<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="css/style3.css" type="text/css">
</head>
<body>
    <h1>Actualizar</h1>
    <?php
        $oldId=$_POST["txtOldId"];
        $id=$_POST["txtId"];
        $name=$_POST["txtName"];
        $apellido=$_POST["txtApellido"];
        $direccion=$_POST["txtDireccion"];
        $telefono=$_POST["txtTelefono"];
        $fecha=$_POST["txtFecha"];
        $valOldId=false;
        $valId=false;
        $valName=false;
        $valApellido=false;
        $valDireccion=false;
        $valTelefono=false;
        $valFecha=false;
        if(preg_match("/^[0-9]{7,11}$/",$id)) $valId=true;
        if(preg_match("/^[0-9]{7,11}$/",$oldId)) $valOldId=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$name)) $valName=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$apellido)) $valApellido=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ0-9\-\# ]{3,30}$/",$direccion)) $valDireccion=true;
        if(preg_match("/^[0-9]{10}$/",$telefono)) $valTelefono=true;
        if(preg_match("/^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/",$fecha)) $valFecha=true;
        if($valId && $valOldId && $valName && $valApellido && $valDireccion && $valTelefono && $valFecha){
            include "conexion.php";
            if($con){
                $sql="update clientes set id='".$id."',nombre='".$name."',apellido='".$apellido."',direccion='".$direccion."',telefono='".$telefono."',fecha_nacimiento='".$fecha."' where id='".$oldId."'";
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