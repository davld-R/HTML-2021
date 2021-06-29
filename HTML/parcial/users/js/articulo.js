$(document).ready(function(){
    $("#btnSend").click(function(){
        $.ajax({
            data: $("#frmComment").serialize(),
            method: "POST",
            url: "addComment.php",
            success: function(resp){
                let r=parseInt(resp);
                if(r>0){
                    $.ajax({
                        url: "articulo.php?id="+$("#txtId").attr("value"),
                        success: function(resp){
                            $("#articulo").html(resp);
                        }
                    });
                }
            }
        });
    });
});