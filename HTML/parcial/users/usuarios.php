<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>
    <script src="js/jquery-3.5.0.js" type="text/javascript"></script>
    <script src="js/usuarios.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/usuarios.css" type="text/css">
</head>
<body>
<hr>
    <h1>Articulos De la Contaminación del Planeta</h1>
    <div id="main">
        <nav id="menu">
            <?php
                include "../conexion.php";
                if($con){
                    $sql="select id,title,date from articulos";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<input type='button' value='".$row["title"]." / ".$row["date"]."' id='".$row["id"]."' class='btnArticulo'><br>";
                        }
                    }
                    $connection->close();
                }
                else echo "<p>Error de comunicacion</p>";
            ?>
        </nav>
        <section id="articulo">
        </section>
    </div>
    <h3>Actualización De Informacion</h3>
<?php
        session_start();
        $username=$_SESSION['user'];
        if($username){
             echo "<p><a href='modificar.php'>Modificar datos</a><br><br></p>";
             echo "<p>Bienvenido ".$username." <a href='../close.php'>cerrar sesion</a></p>";
        } 
        else header("Location: ../index.html");
    ?>
    
</body>
</html>