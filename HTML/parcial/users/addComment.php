    <?php
        session_start();
        $username=$_SESSION['user'];
        if(!$username) header("Location: ../index.html");
        $id=$_POST["txtId"];
        $comment=$_POST["txtComment"];
        if(intval($id)>0){
            if(preg_match("/^[a-zA-Z0-9\ñ\Ñ\-\.\, ]+$/",$comment)){
                include "../conexion.php";
                $sql="insert into comentarios5 (articulo,comment,user,date) values (".$id.",'".$comment."','".$username."',CURDATE())";
                if($connection->query($sql)){
                    echo "1";
                }
                else echo "Error de conexion";
            }
            else echo "Datos no validos";
        }
    ?>