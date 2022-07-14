function verificarPasswords() {


    // Ontenemos los valores de los campos de contraseñas 
    pass1 = document.getElementById('input_pass_1');
    pass2 = document.getElementById('input_pass_2');

    console.log(pass1.value);
    console.log(pass2.value);
    // Verificamos si las constraseñas no coinciden 
    if (pass1.value != pass2.value) {

        // Si las constraseñas no coinciden mostramos un mensaje 
        document.getElementById("error").classList.add("mostrar");

        return false;
    } else {

        // Si las contraseñas coinciden ocultamos el mensaje de error
        document.getElementById("error").classList.remove("mostrar");

        // Mostramos un mensaje mencionando que las Contraseñas coinciden 
        document.getElementById("ok").classList.remove("ocultar");

        // // Desabilitamos el botón de login 
        document.getElementById("login").disabled = true;

        // Refrescamos la página (Simulación de envío del formulario) 
        setTimeout(function () {
            var formData1 = new FormData($('#form_solicitud')[0]);
            $.ajax({
                url: "../ajax/usuarios.ajax.php",
                method: "POST",
                data: formData1,
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    console.log(res);


                    if (res == '"ok"') {
                        Swal.fire({
                            title: 'Solicitud enviada correctamente',
                            text: "Su solicitud será respondida en un lapso no mayor a 24hrs.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                                return true;
                            }
                            location.reload();
                            return true;
                        })

                    }

                }
            });


        }, 3000);


    }
}
function verificarUser() {
    $(".aa").remove();
    var usuario = $("#input_user").val();
    console.log(usuario);
   
    var datos = new FormData();
    datos.append("validarUsuario", usuario);
    $.ajax({
        url: "../ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta) {
                $("#input_user").parent().after('<div class="aa alert-warning">El usuario que intenta registrar ya existe</div>');
                $("#input_user").val("");
            }

        }

    })
}

