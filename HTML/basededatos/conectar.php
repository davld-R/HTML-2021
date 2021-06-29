<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectar</title>
</head>
<body>
    <?php
        /*$address="localhost";
        $user="root";
        $password="";
        $database="programacion";
        $connection=new mysqli($address,$user,$password,$database);
        if($connection->connect_errno){
            echo "Se presento un error de conexion";
        }*/
        include "conexion.php";
        if($con){
            $sql="select * from estudiantes";
            if($resultado=$connection->query($sql)){
                while($row=$resultado->fetch_assoc()){
                    echo "Codigo: ".$row["codigo"]." --- Nombre: ".$row["nombre"]." --- Edad: ".$row["edad"]." --- Ciudad: ".$row["ciudad"]."<br>";
                }
            }
            //$sql="update estudiante set nombre='Mauricio'";
            //if($connection->query($sql)){
            //    echo "Filas actualizadas".$connection->affected_rows."<br><br>";
            //}
            $sql="delete from estudiantes  where codigo='123456'";
            if($connection->query($sql)){
                echo "Filas eliminadas: ".$connection->affected_rows."<br><br>";
            }
            $sql="select * from estudiantes";
            if($resultado=$connection->query($sql)){
                while($row=$resultado->fetch_assoc()){
                    echo "Codigo: ".$row["codigo"]." --- Nombre: ".$row["nombre"]." --- Edad: ".$row["edad"]." --- Ciudad: ".$row["ciudad"]."<br>";
                }
            }
            $connection->close();
        }
    ?>
</body>
</html>