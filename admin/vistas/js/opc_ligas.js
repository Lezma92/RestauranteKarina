function cambiar_contenedores(id_ligas) {
  $("#contenedor_ligas").load("paginas/jornadas.php?id_liga=" + id_ligas);
}

function cambiarDatosModalJornada(id_liga) {
  $("#id_liga").val(id_liga);
}
function desactivarLiga(id_liga, liga) {
  Swal.fire({
    title: '¿Está seguro que desea desactivar' + liga + '?',
    text: "¡al aceptar no será posible reactivarla!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'aceptar!'
  }).then((result) => {
    if (result.isConfirmed) {
      let url_pag = "../ajax/jornadas.ajax.php";
      let mensaje = "¡Status de liga cambiado correctamente!";
      let desactivar = new FormData();
      desactivar.append("Desactivar", "Yess");
      desactivar.append("id_liga", id_liga);
      desactivar.append("estado_liga", "Inactivo");
      let url_cargar = "../ligas";
      //LigaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar)
      LigaAjax(url_pag, desactivar, mensaje, "", "pagina", url_cargar);
    }
  })
}


function eliminarLiga(id_liga, liga) {
  Swal.fire({
    title: '¿Desea eliminar ' + liga + '?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'aceptar!'
  }).then((result) => {
    if (result.isConfirmed) {
      let url_pag = "../ajax/jornadas.ajax.php";
      let mensaje = "¡Se eliminó correctamente!";

      let datos_liga = new FormData();
      datos_liga.append("EliminarLiga", "Yess");
      datos_liga.append("id_liga", id_liga);
      let url_cargar = "../ligas";
      //LigaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar)
      LigaAjax(url_pag, datos_liga, mensaje, "", "pagina", url_cargar);
    }
  })
}
// ===============================================================
const nombreLigas = document.getElementById("input_nombre_liga");

const formLigas = document.getElementById("form_ligas");


formLigas.addEventListener("submit", e => {
  e.preventDefault();
  var guardar = false;
  remove_alert();


  if (nombreLigas.value == "") {
    $("#input_nombre_liga").parent().after('<div class="alert alert-danger alert_titulo">Favor de ingresar el nombre</div>');
    guardar = true;
  }
  if (!guardar) {
    var formDataligas = new FormData($('#form_ligas')[0]);
    $.ajax({
      url: "../ajax/jornadas.ajax.php",
      method: "POST",
      data: formDataligas,
      cache: false,
      contentType: false,
      processData: false,
      success: function (r) {
        console.log(r);
        if (r == 'Resource id #6"Listo"') {
          Swal.fire({

            type: "success",
            icon: 'success',
            title: "¡Nueva liga registrada correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function (result) {
            if (result.value) {
              window.location = "../ligas";
            }
          });

        } else if (r == "1062") {
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

})

function LigaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar) {
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
            if (cambio == "Div") {
              $(div_cambiar).load(url_cargar);
            } if (cambio == "pagina") {
              window.location = url_cargar;
            }

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
function remove_alert() {

  $(".alert_titulo").remove();

}

$("#form_ligas").on("change", "input#input_nombre_liga", function () {
  $(".alert_titulo").remove();
});
