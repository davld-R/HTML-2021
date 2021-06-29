let opc1=0;
let opc2=0;
let opc3=0;
let opc4=0;
let total=0;
function estadistica(){
    $("#eOpc1").html("Opcion 1: Total respuestas: "+opc1);
    $("#bOpc1").css("width",((opc1/total)*100*5)+"px");
    $("#pOpc1").html(((opc1/total)*100).toFixed(2)+"%");
    $("#eOpc2").html("Opcion 2: Total respuestas: "+opc2);
    $("#bOpc2").css("width",((opc2/total)*100*5)+"px");
    $("#pOpc2").html(((opc2/total)*100).toFixed(2)+"%");
    $("#eOpc3").html("Opcion 3: Total respuestas: "+opc3);
    $("#bOpc3").css("width",((opc3/total)*100*5)+"px");
    $("#pOpc3").html(((opc3/total)*100).toFixed(2)+"%");
    $("#eOpc4").html("Opcion 4: Total respuestas: "+opc4);
    $("#bOpc4").css("width",((opc4/total)*100*5)+"px");
    $("#pOpc4").html(((opc4/total)*100).toFixed(2)+"%");
    $("#total").html("<p>Total respuestas: "+total+"</p>");
}
$(document).ready(function(){
    $("#btnVotar").click(function(){
        $("#pregunta").css("display","none");
        $("#estadisticas").css("display","inline-block");
        total++;
        opcion=$("input[name=opc]:checked").val();
        if(opcion=="a") opc1++;
        if(opcion=="b") opc2++;
        if(opcion=="c") opc3++;
        if(opcion=="d") opc4++;
        estadistica();
    });
    $("#btnBack").click(function(){
        $("#pregunta").css("display","inline-block");
        $("#estadisticas").css("display","none");
    });
});