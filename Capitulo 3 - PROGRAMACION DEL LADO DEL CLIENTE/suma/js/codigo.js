let ban=false;
function validar(){
    if($("#txtResultado").val()==""){
        alert("Debe ingresar un resultado de la suma");
        return false;
    }
    if(isNaN(parseInt($("#txtResultado").val()))){
        alert("El resultado debe ser numero entero");
        return false;   
    }
    if(parseInt($("#txtResultado").val())<2 || parseInt($("#txtResultado").val())>12){
        alert("El valor esperado debe estar entre 2 y 12");
        return false;
    }
    if(!ban){
        alert("Primero debe generar los numeros");
        return false;
    }
    else{
        return true;
    }
}
$(document).ready(function(){
    let num1=0;
    let num2=0;
    let intentos=0;
    let aciertos=0
    let errores=0;
    $("#txtResultado").val("");
    $("#btnClear").click(function(){
        intentos=0;
        aciertos=0;
        errores=0;
        $("#txtResultado").val("");
        $("#resultado").html("Intentos: "+intentos+" // Aciertos: "+aciertos+" // Errores: "+errores);
    });
    $("#btnGenerar").click(function(){
        ban=true;           
        num1=Math.random()*(6-1)+1;
        num2=Math.random()*(6-1)+1;
        num1=num1.toFixed(0);
        num2=num2.toFixed(0);
        let i=0;
        let c="";
        for(i=0;i<num1;i++){
            c+="<img src='img/estrella.png' class='estrella'>";
        }
        $("#num1").html(c);
        c="";
        for(i=0;i<num2;i++){
            c+="<img src='img/estrella.png' class='estrella'>";
        }
        $("#num2").html(c);
    });
    $("#btnValidar").click(function(){
        if(validar()){
            intentos++;
            let res=parseInt(num1)+parseInt(num2);
            let c="";
            if(parseInt($("#txtResultado").val())==res){
                aciertos++;
                c+="<h1>ACERTO!!!</h1>";
                c+="<img src='img/correcto.png' class='cara'><br>"
                c+="<input type='button' value='cerrar' id='close'>"                
                $("#msg").html(c);
                $("#bkg").show(1000);
                $("#msg").show(1000);
            }            
            else{
                errores++;
                c+="<h1>SIGUE INTENTADO!!!</h1>";
                c+="<img src='img/error.png' class='cara'><br>"
                c+="<input type='button' value='cerrar' id='close'>"                
                $("#msg").html(c);
                $("#bkg").show(1000);
                $("#msg").show(1000);
            }
            $("#resultado").html("Intentos: "+intentos+" // Aciertos: "+aciertos+" // Errores: "+errores);
            $("#txtResultado").val("");
            $("#close").click(function(){
                $("#bkg").hide(1000);
                $("#msg").hide(1000);               
            });
        }        
    })
});