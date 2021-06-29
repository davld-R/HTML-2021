var num=0;
var pun=0;
var operacion;

function cero(){
    document.getElementById("display").value=document.getElementById("display").value+"0";
}
function uno(){
    document.getElementById("display").value=document.getElementById("display").value+"1";
}
function dos(){
    document.getElementById("display").value=document.getElementById("display").value+"2";
}

function tres(){
    document.getElementById("display").value=document.getElementById("display").value+"3";
}

function cuatro(){
    document.getElementById("display").value=document.getElementById("display").value+"4";
}

function cinco(){
    document.getElementById("display").value=document.getElementById("display").value+"5";
}

function seis(){
    document.getElementById("display").value=document.getElementById("display").value+"6";
}

function siete(){
    document.getElementById("display").value=document.getElementById("display").value+"7";
}

function ocho(){
    document.getElementById("display").value=document.getElementById("display").value+"8";
}

function nueve(){
    document.getElementById("display").value=document.getElementById("display").value+"9";
}

function punto(){
    if(pun==0 && document.getElementById("display").value!=""){
        document.getElementById("display").value=document.getElementById("display").value+".";
        pun=1;
    }    
}
function suma(){
    operacion="+";
    num=parseFloat(document.getElementById("display").value);
    document.getElementById("display").value="";
}
function resta(){
    operacion="-";
    num=parseFloat(document.getElementById("display").value);
    document.getElementById("display").value="";
}
function multiplicacion(){
    operacion="*";
    num=parseFloat(document.getElementById("display").value);
    document.getElementById("display").value="";
}
function division(){
    operacion="/";
    num=parseFloat(document.getElementById("display").value);
    document.getElementById("display").value="";
}

function exponenciacion(){
    operacion="^";
    num=parseFloat(document.getElementById("display").value);   
    document.getElementById("display").value=""; 
}

function raiz(){
    operacion="√";
    num=parseFloat(document.getElementById("display").value);      
    document.getElementById("display").value="√"+num;   
}

function factorial(){
    operacion="!";
    num=parseFloat(document.getElementById("display").value);   
    document.getElementById("display").value=num+"!"; 
}

function sen(){
    operacion="sen";
    num=parseFloat(document.getElementById("display").value);   
    document.getElementById("display").value="sen("+num+")";  
}

function cos(){
    operacion="cos";
    num=parseFloat(document.getElementById("display").value);   
    document.getElementById("display").value="cos("+num+")"; 
}

function tan(){
    operacion="tan";
    num=parseFloat(document.getElementById("display").value);   
    document.getElementById("display").value="tan("+num+")"; 
   
}

function limpiar(){
    var anterior = document.getElementById("display").value
    var nuevovalor = anterior.substring(0, anterior.length -1);
    document.getElementById("display").value = nuevovalor;
}

function borrar(){   
   document.getElementById("display").value="";  
}

function igual(){
    if(document.getElementById("display").value!=""){
    switch(operacion){
        case "+":
            document.getElementById("display").value=(num+parseFloat(document.getElementById("display").value));
            break;               
            case "^":
                document.getElementById("display").value=(Math.pow(num,parseFloat(document.getElementById("display").value)));             
                break;
                case "√":
                    //document.getElementById("display").value=(Math.pow(num,1/2));
                    document.getElementById("display").value=(Math.sqrt(num));
                    break;  
                    case "!":
                        var cont = 1;
                        for(i=2;i<=num;i++){
                            cont=cont*i;                                                       
                        }
                        document.getElementById("display").value=(cont);
                        break;  
                        case "-":
                            document.getElementById("display").value=(num-parseFloat(document.getElementById("display").value));
                            break;
                            case "*":
                                document.getElementById("display").value=(num*parseFloat(document.getElementById("display").value));
                                break;
                                case "sen":
                                    document.getElementById("display").value=(Math.sin(num));
                                    break;
                                    case "cos":
                                        document.getElementById("display").value=(Math.cos(num));
                                        break; 
                                        case "tan":
                                            document.getElementById("display").value=(Math.tan(num));
                                            break;          
                                            case "/":
                                                if(parseFloat(document.getElementById("display").value)==0){
                                                alert("Error: Division etre cero");
                                                document.getElementById("display").value="";
                                                pun=0;
                                                }
                                                else{
                                                document.getElementById("display").value=(num/parseFloat(document.getElementById("display").value));
                                                }
                                                break;                    
        }
    }
}
