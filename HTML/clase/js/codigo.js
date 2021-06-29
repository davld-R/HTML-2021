$(document).ready(function(){
    $('input').tooltipster({ //find more options on the tooltipster page
        trigger: 'custom', // default is 'hover' which is no good here
        position: 'right',
        animation: 'grow',
        theme: 'tooltipster-borderless'
    });
    $("#frmCliente").validate({
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
            txtCedula: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 12
            },
            txtNombre: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            txtEdad: {
                required: true,
                digits: true,
                min: 18,
                max: 99
            },
            txtEmail: {
                required: true,
                email: true
            },
            txtFecha: {
                required: true,
                date: true
            }
        },
        messages:{
            txtCedula:{
                required: "Por favor ingrese su cedula",
                digits: "Por favor ingrese unicamente valores numericos",
                minlength: "La cedula debe tener por lo menos 6 digitos",
                maxlength: "La cedula debe tener maximo 12 digitos"
            },
            txtNombre:{
                required: "Por favor ingrese su nombre",
                minlength: "El nombre debe ser de minimo 3 caracteres",
                maxlength: "El nombre debe tener maximo 20 caracteres"
            },
            txtEdad:{
                required: "Por favor ingrese su edad",
                digits: "La edad debe ser un valor numerico",
                min: "Debe ser mayor de edad para registrarse en nuestro sitio web",
                max: "El valor ingresado no debe ser superior a 99"
            },
            txtFecha:{
                required: "Pro favor ingrese su fecha de nacimiento",
                date: "Ingrese una fecha valida"
            },
            txtEmail:{
                required: "Por favor ingrese su correo electronico",
                email: "Ingrese un correo electronico valido"
            }
        }
    });
    $("#btnRegistrar").click(function(){
        if($("#frmCliente").valid()==false) return;
        $.ajax({
            data: $("#frmCliente").serialize(),
            url: "registrar.php",
            type: "post",
            beforeSend: function(){
                $("#respuesta").html("Procesando...");
            },
            success: function(resp){
                $("#respuesta").html(resp+"<br><input type='button' value='cerrar' id='close'>");
                $("#respuesta").show(1000);
                $("#close").click(function(){
                    $("#respuesta").hide(1000);
                });
            }
        });
    });
});