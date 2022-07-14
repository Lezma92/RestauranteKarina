/*=============================================
ACTIVAR USUARIO
=============================================*/

function estoyEnModal(soy) {
  $("#modal_es").val(soy);
}
function estoyEnModalEditar(soy) {
  $("#modal_es_edi").val(soy);
}
$(".tablas").on("click", ".btnActivar", function () {
  var idReservacion = $(this).attr("idReservacion");
  var estadoUsuario = $(this).attr("estadoUsuario");

  console.log(idReservacion);
  console.log(estadoUsuario);
  var datos = new FormData();
  datos.append("idReservacion", idReservacion);
  datos.append("activarUsuario", estadoUsuario);

  Swal.fire({
    title: 'Está seguro que desea activar esta reservación?',
    text: "El estado de esta reservación cambiará a activado",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Continuar!'
  }).then((result) => {
    $.ajax({

      url: "../ajax/reservaciones.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {

      }

    })

  })


})


/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarReservacion", function () {

  var id_reservacion = $(this).attr("id_reservacion");

  var datos = new FormData();
  datos.append("id_reservacion", id_reservacion);

  $.ajax({

    url: "../ajax/reservaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      $("#id_reservacion").val(respuesta["id"]);
      $("#input_nombre_user_E").val(respuesta["nombre"]);
      $("#etq_app").val(respuesta["a_paterno"]);
      $("#etq_apm").val(respuesta["a_materno"]);
      $("#etq_nTel").val(respuesta["n_telefono"]);
      $("#etq_correo").val(respuesta["correo"]);
      $("#fecha_hora").val(respuesta["fecha_hora"]);
    }

  });

})

$(".tablas").on("click", ".btnActivarReservacion", function () {

  var nombreC = $(this).attr("nomC");
  var id_reservacion = $(this).attr("idReservacion");
  var fecha_entrada = $(this).attr("f_r");
  var c_p = $(this).attr("c_p");
  $("#reservacion_id").val(id_reservacion);
  $(".etq_n").text(nombreC);
  $(".f_emtrada").text(fecha_entrada);
  $(".c_personas").text(c_p);
  $("#fecha_reservacion").val(fecha_entrada);
  console.log(nombreC);
})




/*=============================================
ELIMINAR USUARIOS
=============================================*/


function eliminarRervacion(id_reservacion, ventana) {
  var id_reserva = id_reservacion;
  var estoy = ventana;
  var datos = new FormData();
  datos.append("eliminarReservacion", "ok");
  datos.append("id_reservacion_eliminar", id_reserva);

  Swal.fire({
    title: '¿Está seguro que desea eliminar esta reservación?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar usuario!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../ajax/reservaciones.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == "ok") {
            Swal.fire({
              type: "success",
              icon: 'success',
              title: "¡La reservación ha sido eliminado correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function (result) {

              if (result.value) {

                if (estoy == 1) {
                  window.location = "../usuarios";
                }
                if (estoy == 2) {
                  window.location = "../inicio";
                }

              }
            });
          }

        }
      });
    }
  })
}