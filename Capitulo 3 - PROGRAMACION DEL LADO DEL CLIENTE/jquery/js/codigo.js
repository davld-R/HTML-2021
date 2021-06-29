$(document).ready(function(){
    $("#btnCalcular").click(function(){
        if($("#txtCedula").val()=="" || $("#txtNombre").val()=="" || $("#txtHoras").val()==""){
            alert("Debe ingresar los campos");
            return;
        }
        let h=parseInt($("#txtHoras").val());
        let t=$("#txtTipo").val();
        if(isNaN(h)){
            alert("El valor de las horas debe ser un numero entero");
            return;
        }
        if(h<0 || h>40){
            alert("El numero de horas debe estar entre 0 y 40");
            return;
        }
        let costo=0;
        if(t=="TC") costo=50000;
        if(t=="MT") costo=40000;
        if(t=="HC") costo=30000;
        costo=costo*h;
        $("#txtSueldo").val(costo);
    });
    $("#btnAbout").click(function(){
        let c="";
        c+="<h1>Acerca de</h1><p>Made by Mauricio Chaves</p>";
        //c+="<input type='button' value='cerrar' id='btnClose'>"
        c+="<img src='img/close-icon.png' id='btnClose'>";
        $("#msg").html(c);
        $("#msg").show(1000);
        $("#btnClose").click(function(){
            $("#msg").hide(1000);
        });
    });
});