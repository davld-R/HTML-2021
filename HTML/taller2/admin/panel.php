<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
</head>
<body>
    <?php
        session_start();
        $username=$_SESSION['user'];
        if($username){
            include "../conexion.php";
            echo "<a href='registro.html'>Registrar Usuario</a><br><br>";
            echo "<a href='modificar.php'>Modificar Usuario</a><br><br>";
            echo "<a href='eliminar.php'>Eliminar Usuario</a><br>";         
                       
            if($con){
                $sql="select * from usuarios where user='".$username."'";
                if($resultado=$connection->query($sql)){
                    if($row=$resultado->fetch_assoc()){
                        if($row["type"]=='a')echo "<p>Bienvenido ".$username." <a href='../close.php'>cerrar sesion</a></p>";
                            
                        else echo "<p>No tiene autorizacion</p>";
                    }
                }
                $connection->close();
            }
        } 
        else header("Location: ../index.html")
    ?>
</body>
</html>