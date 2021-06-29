<?php
    $con=true;
    $database="programacion";
    $user="root";
    $password="";
    $address="localhost";
    $connection = new mysqli($address,$user,$password,$database);
    if ($connection->connect_errno) {
        $con=false;
        echo "Fallo al conectar a MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
    }
?>