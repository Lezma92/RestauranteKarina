
$(document).ready(function () {
    $('#btnRegisQuinielas').click(function () {
        document.getElementById('btnRegisQuinielas').disabled = true;
        let id_liga = $("#id_liga").val();
        let id_jornada = $("#id_jornada").val();

        var datos_quiniela = new FormData($('#form_quinielas')[0]);
        let div_cambiar = ".tab_Historial";
        let url_pag = "../ajax/quinielas.ajax.php";
        let url_cargar = "paginas/tabla_historial_com.php?id_jornada=" + id_jornada + "&id_liga=" + id_liga;
        let mensaje = "Quiniela registrada con exito!";
        cambiosAjax(url_pag, datos_quiniela, mensaje, div_cambiar, "div", url_cargar);
        
    });
    $('#btnLimpiar').click(function () {
        let id_liga = $("#id_liga").val();
        let id_jornada = $("#id_jornada").val();

        $(".cambiarQuinielas").load("paginas/jugar.php?id_jornada=" + id_jornada + "&id_liga=" + id_liga);
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

            console.log(res);
            if (res == 'Listo') {
                Swal.fire({
                    type: "success",
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function (result) {
                    if (result.value) {
                        if (cambio == "pagina") {
                            window.location = url_cargar;
                        } else if (cambio == "div") {

                            limpiar();
                            document.getElementById("mensaje").innerHTML = "";
                            document.getElementById('btnRegisQuinielas').disabled = false;
                            $(div_cambiar).load(url_cargar);

                        }

                    }
                    limpiar();
                    $(div_cambiar).load(url_cargar);
                    document.getElementById("mensaje").innerHTML = "";
                    document.getElementById('btnRegisQuinielas').disabled = false;

                });

            } else {
                document.getElementById('btnRegisQuinielas').disabled = false;

                document.getElementById("mensaje").innerHTML = "*Es necesario completar todo el formulario*";
            }
        }
    });

}

function limpiar() {
    cant = $("#cant_en").val();
    $("#nombre_quiniela").val("");
    for (let i = 0; i <= cant; i++) {
        document.querySelectorAll('[name=opc_sel_' + i + ']').forEach((x) => x.checked = false);
    }
}