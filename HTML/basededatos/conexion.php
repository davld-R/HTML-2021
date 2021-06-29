<?php
    $con=true;
    $address="localhost";
    $user="root";
    $password="";
    $database="programacion";
    $connection=new mysqli($address,$user,$password,$database);
    if($connection->connect_errno){
        $con=false;
        echo "Se presento un error de conexion";
    }
?>