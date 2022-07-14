

function cambiar_contenedores(id_platillos) {
  $("#contenedor_ligas").load("paginas/variedad.php?id_categoria=" + id_platillos);
}

function actualizarTiposComidas(id, nombre, act_descripcion) {
  $("#act_id").val(id);
  $("#act_nom_categoria").val(nombre);
  $("#act_descripcion").val(act_descripcion);
}


// ===============================================================
const nombreTipoComida = document.getElementById("nom_categoria");

const formTiposComidas = document.getElementById("formTiposComidas");


formTiposComidas.addEventListener("submit", e => {
  e.preventDefault();
  var guardar = false;
  if (nombreTipoComida.value == "") {
    guardar = true;
  }
  if (!guardar) {
    var formDataligas = new FormData($('#formTiposComidas')[0]);
    $.ajax({
      url: "../ajax/platillos.ajax.php",
      method: "POST",
      data: formDataligas,
      cache: false,
      contentType: false,
      processData: false,
      success: function (r) {
        console.log(r);
        if (r == '"Listo"') {
          Swal.fire({

            type: "success",
            icon: 'success',
            title: "¡Tipos de comida registrada con exito!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function (result) {
            if (result.value) {
              window.location = "../platillos";
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


const formActualizarTiposComidas = document.getElementById("ActualizarTiposComidas");
formActualizarTiposComidas.addEventListener("submit", e => {
  e.preventDefault();
  var formDataligas = new FormData($('#ActualizarTiposComidas')[0]);
  $.ajax({
    url: "../ajax/platillos.ajax.php",
    method: "POST",
    data: formDataligas,
    cache: false,
    contentType: false,
    processData: false,
    success: function (r) {
      console.log(r);
      if (r == '"Listo"') {
        Swal.fire({

          type: "success",
          icon: 'success',
          title: "¡Tipos de comida registrada con exito!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar"

        }).then(function (result) {
          if (result.value) {
            window.location = "../platillos";
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


})

function eliminarTipoComida(id_platillo, TipoPlatillo) {
  Swal.fire({
    title: '¿Desea eliminar ' + TipoPlatillo + '?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'aceptar!'
  }).then((result) => {
    if (result.isConfirmed) {
      let url_pag = "../ajax/platillos.ajax.php";
      let mensaje = "¡Se eliminó correctamente!";

      let datos_liga = new FormData();
      datos_liga.append("EliminarPlatillos", "Yess");
      datos_liga.append("id_platillo", id_platillo);
      console.log(id_platillo);
      let url_cargar = "../platillos";
      //LigaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar)
      JornadaaAjax(url_pag, datos_liga, mensaje, "", "pagina", url_cargar);
    }
  })
}


function JornadaaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar) {
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