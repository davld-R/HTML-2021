var colores=["red","yellow","blue"];
var c=0;
function cambioColor(){
    document.getElementById("color").style.backgroundColor=colores[c];
    c++;
    if(c==3){
        c=0;
    }

}