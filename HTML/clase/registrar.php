<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    
    <?php
        $cedula=$_POST["txtCedula"];
        $nombre=$_POST["txtNombre"];
        $edad=$_POST["txtEdad"];
        $fecha=$_POST["txtFecha"];
        $sexo=$_POST["txtSexo"];
        $email=$_POST["txtEmail"];
        //if($cedula!="" || $cedula!=null || $nombre!="" || $nombre!=null || $edad!="" || $edad!=null || $fecha!="" || $fecha!=null || $sexo!="" || $sexo!=null || $email!="" || $email!=null){
        //    if(strlen($cedula)<6 || strlen($cedula)>12){
        //        echo "<p>Error en el registro</p>";
        //        return;
        //    }
        //    echo "<h1>Registro exitoso</h1><br><p>Gracias ".$nombre." por usar nuestos servicios!!!</p>";
        //}
        $valCedula=false;
        $valNombre=false;
        $valEdad=false;
        $valFecha=false;
        $valSexo=false;
        $valEmail=false;
        if(strlen($cedula)>=6 && strlen($cedula)<=12 && is_numeric($cedula)){
            echo "Cedula: Cumple<br>";
            $valCedula=true;
        }
        else{
            echo "Cedula: No cumple<br>";
        }
        if(preg_match("/^[a-zA-Z\ñ\Ñ]{3,20}$/",$nombre)){
            echo "Nombre: Cumple<br>";
            $valNombre=true;
        }
        else{
            echo "Nombre: No Cumple<br>";
        }
        if(intval($edad)>=18 && intval($edad)<=99){
            echo "Edad: Cumple<br>";
            $valEdad=true;
        }
        else{
            echo "Edad: No cumple<br>";
        }
        if(preg_match("/^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/",$fecha)){
            echo "Fecha: Cumple<br>";
            $valFecha=true;
        }
        else{
            echo "Fecha: No cumple<br>";
        }
        if($sexo=="M" || $sexo=="F"){
            echo "Sexo: Cumple<br>";
            $valSexo=true;
        }
        else{
            echo "Sexo: No cumple<br>";
        }
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
            echo "Email: Cumple<br>";
            $valEmail=true;
        }
        else{
            echo "Email: No cumple<br>";
        }
        if($valCedula && $valNombre && $valEdad && $valFecha && $valSexo && $valEmail){
            echo "<h1>Registro exitoso</h1><br><p>Gracias ".$nombre." por usar nuestos servicios!!!</p>";
        }
        else{
            echo "<h1>El registro no se puedo realizar, verifique los datos del formulario</h1>";
        }
    ?>
</body>
</html>