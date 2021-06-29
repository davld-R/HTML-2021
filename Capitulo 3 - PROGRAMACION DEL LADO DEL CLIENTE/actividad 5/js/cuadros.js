let area=0.0;
function mensaje(tipo,texto){
    switch(tipo){
        case "a":
            $("#titulo").html("Advertencia");
            $("#icono").attr("src","img/advertencia.png");
            $("#titulo").css("background-color","yellow");
            break;
        case "e":
            $("#titulo").html("Error");
            $("#icono").attr("src","img/error.png");
            $("#titulo").css("background-color","red");
            break;
        case "i":
            $("#titulo").html("Informacion");
            $("#icono").attr("src","img/info.png");
            $("#titulo").css("background-color","blue");
            break;
    }
    $("#mensaje").html(texto);
    $("#msg").show(1000);
}
$(document).ready(function(){
    $("#btnCalcular").click(function(){
        if($("#txtA").val()=="" || $("#txtB").val()=="" || $("#txtC").val()==""){
            mensaje("a","Se requiere de los tres lados para calcular el area");
        }
        else{
            let a=parseInt($("#txtA").val());
            let b=parseInt($("#txtB").val());
            let c=parseInt($("#txtC").val());
            if(isNaN(a) || isNaN(b) || isNaN(c)){
                mensaje("a","Los campos deben ser numericos");
            }
            else{
                let semi=(a+b+c)/2;
                let aux=(semi*(semi-a)*(semi-b)*(semi-c));
                if(aux<0){
                    mensaje("e","Error en el calculo del area");
                }
                else{
                    area=Math.sqrt(aux).toFixed(2);
                    mensaje("i","El area del triangulo es: "+area);
                }
            }
        }
    });
    $("#btnOk").click(function(){
        $("#msg").hide(1000);
    });
})