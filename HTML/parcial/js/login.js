$(document).ready(function(){
    $("#btnLogin").click(function(){
        $.ajax({
            data: $("#frmLogin").serialize(),
            url: "validar.php",
            type: "POST",
            beforeSend: function(){
                $("#msg").html("procesando...");
            },
            success: function(resp){
                let r=parseInt(resp);
                switch(r){
                    case 1:
                        window.location.href="admin/panel.php";
                        break;
                    case 2:
                        window.location.href="users/usuarios.php";
                        break;
                    case 3:
                        $("#msg").html("<p>El usuarios esta deshabilitado</p>");
                        break;
                    case 4:
                        $("#msg").html("<p>El usuario o contraseña no coinciden</p>");
                        break;
                    case 5:
                        $("#msg").html("<p>Error de comunicacion</p>");
                        break;
                    case 6:
                        $("#msg").html("<p>Datos enviados no validos</p>");
                        break;
                }
                
            }            
        });
    });
});