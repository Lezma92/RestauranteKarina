

// ===============================================================
const form = document.getElementById("formAddPlatillos");
form.addEventListener("submit", e => {
  e.preventDefault();

  var formData1 = new FormData($('#formAddPlatillos')[0]);
  $.ajax({
    url: "../ajax/platillos.ajax.php",
    method: "POST",
    data: formData1,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) {
      console.log(res);
      if (res == '"Listo"') {
        Swal.fire({
          type: "success",
          icon: 'success',
          title: "¡Nuevo platillo agregado correctamente!",
          showConfirmButton: true,
          confirmButtonText: "Listo"
        }).then(function (result) {
          if (result.value) {
            form.reset();
            $("#modalAddPlatillos").modal('hide');//ocultamos el modal
            $("#tabla_jornadas").load("paginas/tabla_jornadas.php");
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


})


function EliminarPlatillo(id_platillo, jornada) {

  Swal.fire({
    title: "¿Está seguro que desea eliminar el platillo " + jornada + "?",
    text: "¡al aceptar se eliminará permanentemente!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'aceptar!'
  }).then((result) => {
    if (result.isConfirmed) {
      let url_pag = "../ajax/platillos.ajax.php";
      let mensaje = "¡El platillo se eliminó correctamente!";
      let desactivar = new FormData();
      desactivar.append("Platilloos", "Yess");
      desactivar.append("id_platillo", id_platillo);
      let div_cambiar = "#tabla_jornadas";
      let url_cargar = "paginas/tabla_jornadas.php";
      //LigaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar)
      DaAjax(url_pag, desactivar, mensaje, div_cambiar, "Div", url_cargar);
    }
  })
}

function DaAjax(url_pag, datos, mensaje, div_cambiar, cambio, url_cargar) {
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


function setIdPlatillo(id) {
  $("#id_categoria_platillo").val(id);
}
