function contenedor_encuentros(id_jornadas) {
  let url = "paginas/agregar_encuentros.php?id_jornada=" + id_jornadas;
  $("#contenedor_ligas").load(url);
}
function setIdJornada(id_jornada, estado) {
  $("#id_jornada").val(id_jornada);
  $("#estado").val(estado);
}


function guardarEncuentros(id_jornada, estado) {
  var guardarEncuentro = new FormData();

  guardarEncuentro.append("accion", "GuardarEncuentros");
  guardarEncuentro.append("id_jornada", id_jornada);
  guardarEncuentro.append("estado", estado);
  url_pag = "../ajax/encuentros.ajax.php";
  mensaje = "¡Todos los encuentros se registraron correctamente!";
  div_cambiar = "#contenedor_ligas";
  url_cargar = "paginas/agregar_encuentros.php?id_jornada=" + id_jornada;

  Swal.fire({
    title: "Está seguro?",
    text: "Al presionar Aceptar no será posible capturar más encuentros",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar'
  }).then((result) => {
    if (result.isConfirmed) {
      cambiosAjax(url_pag, guardarEncuentro, mensaje, div_cambiar, url_cargar);
    }
  })
}

$(document).ready(function () {
  
  console.log("Registrando Encuentros");

  $('#guardar_encuentros').click(function () {
    equi_local = $('#equi_local').val();
    equi_visit = $('#equi_visit').val();
    id_jornada = $('#id_jornada').val();
    console.log(equi_local);
    console.log(equi_visit);
    console.log(id_jornada);

    var datosEncuentros = new FormData();
    datosEncuentros.append("equi_local", equi_local);
    datosEncuentros.append("equi_visit", equi_visit);
    datosEncuentros.append("id_jornada", id_jornada);
    if (equi_local != null && equi_visit != null && equi_local != "" && equi_visit != "") {
      $.ajax({
        url: "../ajax/encuentros.ajax.php",
        dataType: "json",
        method: "POST",
        data: datosEncuentros,
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
          console.log(res);
          if (res == 'Listo') {
            Swal.fire({
              type: "success",
              icon: 'success',
              title: "¡Encuentros registrados correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function (result) {
              if (result.value) {
                $("#tabla_encuentros").load("paginas/tabla_encuentros.php");
                $('#equi_local').val("");
                $('#equi_visit').val("");
              }
            });

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





  });
});

function cambiosAjax(url_pag, datos, mensaje, div_cambiar, url_cargar) {
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
            $(div_cambiar).load(url_cargar);
          }
        });

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