function verJugadores(id_jornadas) {
  let url = "paginas/tabla_jugadores.php?id_jornada=" + id_jornadas;
  $(".contenerJugando").load(url);
}

function listarQuinielas(id_jornadas, id_usu) {
  let url = "paginas/historial_jugadores.php?id_jornada=" + id_jornadas + "&idUsuario=" + id_usu + "&status=EPA";
  $(".contenerJugando").load(url);
}

function selector(sele, id_jornada, id_user) {
  console.log("Mi bebe Eva");

  let tipo_status = $(sele).val();
  console.log(tipo_status);


  let url = "paginas/historial_jugadores.php?id_jornada=" + id_jornada + "&idUsuario=" + id_user + "&status=" + tipo_status;
  $(".contenerJugando").load(url);

}
// $(".form_status").on("change", "select.opc_status", function () {

// })


$(".tablaHistorial").on("click", ".eliminarQuiniela", function () {
  var datos = new FormData();
  // datos.append("id_quiniela", idUsuario);
  var id_user = $(this).attr("idUsu");
  var id_quiniela = $(this).attr("idQ");
  var id_liga = $(this).attr("idLi");
  var id_jornada = $(this).attr("idJ");
  datos.append("eliminarQuiniela", "SI");
  datos.append("id_quiniela", id_quiniela);
  datos.append("id_liga", id_liga);
  datos.append("id_jornada", id_jornada);
  Swal.fire({
    title: '¿Está seguro de eliminar la quiniela seleccionada?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../ajax/quinielas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log(respuesta);

          if (respuesta == "Listo") {
            let url = "paginas/historial_jugadores.php?id_jornada=" + id_jornada + "&idUsuario=" + id_user;
            $(".contenerJugando").load(url);
            Swal.fire({

              type: "success",
              icon: 'success',
              title: "Quiniela Eliminada correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function (result) {

              if (result.value) {

              }
            });
          }

        }
      });
    }
  })

})

$(".tablaHistorial").on("click", ".actStatus", function () {
  let datos = new FormData();
  let id_quiniela = $(this).attr("idQ");
  let tipStatus = $(this).attr("statusQ");
  
  datos.append("tipStatus", tipStatus);

  if (tipStatus == "Pagado") {
    tipStatus = "EPA";
  } else if (tipStatus == "En Espera") {
    tipStatus = "PGD";
  }
  var id_user = $(this).attr("idUsu");

  var id_jornada = $(this).attr("idJ");
  datos.append("actStatus", "Yes");
  datos.append("id_quiniela", id_quiniela);


  Swal.fire({
    title: 'Al dar click en aceptar el estatado de la quiniela se actualizará a pagado',
    text: "desea continuar?",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Aceptar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../ajax/quinielas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log(respuesta);

          if (respuesta == "Listo") {
            let url = "paginas/historial_jugadores.php?id_jornada=" + id_jornada + "&idUsuario=" + id_user + "&status=" + tipStatus;
            $(".contenerJugando").load(url);
            Swal.fire({

              type: "success",
              icon: 'success',
              title: "Actualización aplicada correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function (result) {

              if (result.value) {

              }
            });
          }

        }
      });
    }
  })

})