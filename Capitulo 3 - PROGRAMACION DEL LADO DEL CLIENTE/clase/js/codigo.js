$(document).ready(function(){
    $('input').tooltipster({/*Crea un tooltip en cada uno de los input*/
        trigger: 'custom',
        position: 'right',
        animation: 'grow',
        theme: 'tooltipster-borderless'
    });
    $("#frmCliente").validate({
        errorPlacement: function (error, element) {
            var ele = $(element),
                err = $(error),
                msg = err.text();
            if (msg != null && msg !== "") {
                ele.tooltipster('content', msg);
                ele.tooltipster('open');
            }    
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass).tooltipster('close');        
        },
        rules:{
            txtCedula: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 12
            }
        },
        messages:{
            txtCedula:{
                required: "Por favor ingrese una cedula",
                digits: "Por favor ingrese unicamente valores numericos",
                minlength: "La cedula debe tener por lo menos 6 digitos",
                maxlength: "La cedula debe tener maximo 12 digitos"
            }
        }
    });
    $("#btnRegistrar").click(function(){
        if($("#frmCliente").valid()==false) return;
        alert("Registro exitoso");
        location.href="formulario.html";
    });
});