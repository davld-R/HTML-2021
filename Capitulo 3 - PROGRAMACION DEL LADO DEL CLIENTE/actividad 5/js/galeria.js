let array=new Array();
class Imagen{
    constructor(i,d){
        this.img=i;
        this.des=d;
    }
}
$(document).ready(function(){
    let img=new Imagen("img/0.jpg","KISS");
    array.push(img);
    img=new Imagen("img/1.jpg","IRON MAIDEN");
    array.push(img);
    img=new Imagen("img/2.jpg","BOSTON");
    array.push(img);
    img=new Imagen("img/3.jpg","AC/DC");
    array.push(img);
    img=new Imagen("img/4.jpg","JOURNEY");
    array.push(img);
    img=new Imagen("img/5.jpg","QUEEN");
    array.push(img);
    img=new Imagen("img/6.jpg","IRON MAIDEN");
    array.push(img);
    img=new Imagen("img/7.jpg","DEF LEPARD");
    array.push(img);
    img=new Imagen("img/8.jpg","AC/DC");
    array.push(img);
    img=new Imagen("img/9.jpg","NIRVANA");
    array.push(img);
    $("#imgIzquierda").html("<img src='"+array[9].img+"'>");
    $("#imgCentro").html("<img src='"+array[0].img+"'>");
    $("#imgDerecha").html("<img src='"+array[1].img+"'>");
    $("#contenido").html(array[0].des);
    let aux=0;
    $("#btnDer").click(function(){
        if(aux==9)aux=0;
        else aux++;
        if(aux==0)$("#imgIzquierda").html("<img src='"+array[9].img+"'>");
        else $("#imgIzquierda").html("<img src='"+array[aux-1].img+"'>");
        $("#imgCentro").html("<img src='"+array[aux].img+"'>");
        if(aux==9)$("#imgDerecha").html("<img src='"+array[0].img+"'>");
        else $("#imgDerecha").html("<img src='"+array[aux+1].img+"'>");
        $("#contenido").html(array[aux].des);
    });
    $("#btnIzq").click(function(){
        if(aux==0)aux=9;
        else aux--;
        if(aux==0)$("#imgIzquierda").html("<img src='"+array[9].img+"'>");
        else $("#imgIzquierda").html("<img src='"+array[aux-1].img+"'>");
        $("#imgCentro").html("<img src='"+array[aux].img+"'>");
        if(aux==9)$("#imgDerecha").html("<img src='"+array[0].img+"'>");
        else $("#imgDerecha").html("<img src='"+array[aux+1].img+"'>");
        $("#contenido").html(array[aux].des);
    });
});