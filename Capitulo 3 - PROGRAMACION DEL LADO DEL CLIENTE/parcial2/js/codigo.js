$(document).ready(function(){
    $('input').tooltipster({ //find more options on the tooltipster page
        trigger: 'custom', // default is 'hover' which is no good here
        position: 'right',
        animation: 'grow',
        theme: 'tooltipster-borderless'         
    });    
    $("#Cliente").validate({
        errorPlacement: function (error, element) {
            var ele = $(element),
                err = $(error),
                msg = err.text();
            if (msg != null && msg !== '') {
                ele.tooltipster('content', msg);
                ele.tooltipster('open');
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        },
        rules:{
            txtNombre: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            txtEmail: {
                required: true,
                email: true
            },
            txtContraseña: {
                required: true,
                minlength: 5,
                maxlength: 10
            },
            txtContraseña2: {
                required: true,
                equalTo: txtContraseña                
            }             
        },
        messages:{
            txtNombre:{
                required: "Por favor ingrese su nombre",
                minlength: "El nombre debe ser de minimo 3 caracteres",
                maxlength: "El nombre debe tener maximo 20 caracteres"
            },
            txtEmail:{
                required: "Por favor ingrese su correo electronico",
                email: "Ingrese un correo electronico valido"
            },
            txtContraseña:{
                required: "Digite una contraseña",
                minlength: "La contraseña debe ser minimo de 5 caracteres",
                maxlength: "La contraseña debe tener un maximo de 10 caracteres"
            },
            txtContraseña2:{
                required: "Validar contraseña",
                equalTo: "Digite la misma contraseña"                
            }
        }
    });
        var diccionario=new Array();
        class Palabra{
        constructor (n, e,){
        this.nombre=n;
        this.email=e;        
       }
    }

    var tabla = [
        { nombre: "", email: ""}
    ];

    window.onload = cargar;
    function cargar(){
        document.getElementById("Cliente").addEventListener("submit", nuevo, false)
    }

    $("#btnVer").click(function(){ 
        event.preventDefault();       
        
       var cuerpoTabla = document.getElementById("cuerpo");
       var tablaLlena = "";

       for(var i = 0; i<tabla.length; i++){

       /* tablaLlena = "<tr><td>" + tabla[i].nombre +"</td><td>" + tabla[i].email + "</td></tr>";*/
        tablaLlena = "<tr><td>" + tabla[i].nombre +"</td></tr>";
     }
        cuerpoTabla.innerHTML = tablaLlena; 
          
     });

     $("#boton").click(function(){        
       var cuerpoTabla = document.getElementById("cuerpo");
       var tablaLlena = "";

       alert(tabla[1].email)

        cuerpoTabla.innerHTML = tablaLlena;                  
        
     });   


    $("#btnRegistrar").click(function(){ 
        event.preventDefault();   
        var nombre1 = document.getElementById("txtNombre").value;
        var email1 = document.getElementById("txtEmail").value;
        
        var nuevo = {nombre: nombre1, email: email1 }
        tabla.push(nuevo);
        
        
    if($("#Cliente").valid()==true){             
                   
        if(document.getElementById("txtNombre").value!="" && document.getElementById("txtEmail").value!=""){
            var nombre=document.getElementById("txtNombre").value;
            var email=document.getElementById("txtEmail").value;
            var ban=0;
            for(i=0;i<diccionario.length;i++){
                if(diccionario[i].nombre==nombre || diccionario[i].email==email){
                    alert("Este usuario o Correo electronico ya esta registrado");
                ban=1;
                break
                }
            }               
            if(ban==0){
                diccionario.push(new Palabra(nombre,email));
                document.getElementById("txtNombre").value="";
                document.getElementById("txtEmail").value="";
                document.getElementById("txtContraseña").value=""; 
                document.getElementById("txtContraseña2").value=""; 
                alert("Usuario Registrado Correctamente");                
            }
        }
        else{
               alert("Ingrese los datos");
        }       
       } 
    });

});