<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style3.css" type="text/css">
</head>
<body>
    <h1>Registrar</h1>
    <?php
        $id=$_POST["txtId"];
        $name=$_POST["txtName"];
        $apellido=$_POST["txtApellido"];
        $direccion=$_POST["txtDireccion"];
        $telefono=$_POST["txtTelefono"];
        $fecha=$_POST["txtFecha"];
        $valId=false;
        $valName=false;
        $valApellido=false;
        $valDireccion=false;
        $valTelefono=false;
        $valFecha=false;
        if(preg_match("/^[0-9]{7,11}$/",$id)) $valId=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$name)) $valName=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$apellido)) $valApellido=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ0-9\-\# ]{3,30}$/",$direccion)) $valDireccion=true;
        if(preg_match("/^[0-9]{10}$/",$telefono)) $valTelefono=true;
        if(preg_match("/^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/",$fecha)) $valFecha=true;
        if($valId && $valName && $valApellido && $valDireccion && $valTelefono && $valFecha){
            include "conexion.php";
            if($con){
                $sql="insert into clientes values('".$id."','".$name."','".$apellido."','".$direccion."','".$telefono."','".$fecha."')";
                if($connection->query($sql)){
                echo "<p>Registro Exitoso</p> <a href='index.html'>volver</a>";
                }            
                else{
                    echo "<p>Error en al consulta <a href='registro.html'>volver</a></p>";
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