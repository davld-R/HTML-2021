    <?php
        session_start();
        include "conexion.php";        
        if($con){
            $user=$_POST["txtUser"];
            $pass=$_POST["txtPassword"];
            $valUser=false;
            $valPass=false;
            if(preg_match("/^[a-zA-Z\ñ\Ñ0-9 ]{3,30}$/",$user)) $valUser=true;
            if(preg_match("/^[a-zA-Z\ñ\Ñ0-9\-\_\*\+\!\&]{8,15}$/",$pass)) $valPass=true;
            if($valUser && $valPass){
                $sql="select * from usuarios where user='".$user."' and password=sha2('".$pass."',256)";
                if($resultado=$connection->query($sql)){
                    if($row=$resultado->fetch_assoc()){
                        if($row["state"]==1){
                            if($row["type"]=='a'){
                                $_SESSION['user']=$user; 
                                echo "1";
                            }
                            else{
                                if($row["type"]=='u'){
                                    $_SESSION['user']=$user; 
                                    echo "2";
                                }
                            }
                        }
                        else echo "3";//El usuario esta deshabilitado
                    }
                    else echo "4";//El usuario o contrañe no coinciden
                }
                else echo "5";//Error de comunicacion
            }
            else echo "6";//Datos enviados no validos
            $connection->close();
        }
        else echo "5";//Error de comunicacion 
    ?>
