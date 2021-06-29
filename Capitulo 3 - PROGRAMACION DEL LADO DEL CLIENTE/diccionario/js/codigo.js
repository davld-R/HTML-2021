var diccionario=new Array();
class Palabra{
    constructor (e, i){
        this.espanol=e;
        this.ingles=i;
    }
}
diccionario.push(new Palabra('carro','car'));
diccionario.push(new Palabra('azul','blue'));
function traducir(){
    if(document.getElementById("palabra").value!=""){
        var palabra=document.getElementById("palabra").value;
        var ban=0;
        for(i=0;i<diccionario.length;i++){
            if(palabra==diccionario[i].espanol){
                document.getElementById("traduccion").innerHTML=diccionario[i].ingles;
                ban=1;
                break;
            }
            if(palabra==diccionario[i].ingles){
                document.getElementById("traduccion").innerHTML=diccionario[i].espanol;
                ban=1;
                break;
            }
        }
        if(ban==0){
            alert("Palabra no fue encontrada");
            document.getElementById("palabra").value="";
        }
    }
    else{
        alert("Ingrese una palabra");
    }
}
function addPalabra(){
    if(document.getElementById("espanol").value!="" && document.getElementById("ingles").value!=""){
        var espanol=document.getElementById("espanol").value;
        var ingles=document.getElementById("ingles").value;
        var ban=0;
        for(i=0;i<diccionario.length;i++){
            if(diccionario[i].espanol==espanol || diccionario[i].ingles==ingles){
                alert("La palabra ya existe");
                ban=1;
                break
            }
        }
        if(ban==0){
            diccionario.push(new Palabra(espanol,ingles));
            document.getElementById("espanol").value="";
            document.getElementById("ingles").value="";
            alert("La palabra se agrego con exito!");
        }
    }
    else{
        alert("Se requiere la palabra en español e ingles");
    }
}
function traducirTexto(){
    if(document.getElementById("texto").value!=""){
        var res="";
        var texto=document.getElementById("texto").value;
        var palabras=texto.split(" ");
        for(i=0;i<palabras.length;i++){
            for(j=0;j<diccionario.length;j++){
                if(palabras[i]==diccionario[j].espanol){
                    res+=diccionario[j].ingles;
                    res+=" ";
                    ban=1;
                    break;
                }
                if(palabras[i]==diccionario[j].ingles){
                    res+=diccionario[j].espanol;
                    ban=1;
                    res+=" ";
                    break;
                }
            }
        }
        document.getElementById("traduccionTexto").innerHTML=res;
    }
    else{
        alert("Se requiere que ingrese texto");
    }
}