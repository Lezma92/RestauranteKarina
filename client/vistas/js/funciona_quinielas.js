
$(document).ready(function () {
    console.log("Leyendo las Quinielas");

    $('#btnRegisQuinielas').click(function () {
        var datos_quiniela = new FormData($('#form_quinielas')[0]);
        url_pag = "../ajax/quinielas.ajax.php",
            mensaje = "Quiniela registrada con exito!";
        cambiosAjax(url_pag, datos_quiniela, mensaje, "", false, "");



    });
});


function cambiosAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar) {
    $.ajax({
        url: url_pag,
        dataType: "json",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.fire({
                type: "success",
                icon: 'success',
                title: mensaje,
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function (result) {
                if (result.value) {
                    if (cambio == true) {
                        $(div_cambiar).load(url_cargar);
                    }

                }
            });
            console.log(res);
            if (res == 'Listo') {


            } else if (res == "1062") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href>Why do I have this issue?</a>'
                })

            }
        }
    });

}