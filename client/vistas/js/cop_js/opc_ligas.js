function cambiar_contenedores(id_ligas){
  $("#contenedor_ligas").load("paginas/jornadas.php?id_liga="+id_ligas);
}

function cambiarDatosModalJornada(id_liga){
  $("#id_liga").val(id_liga);
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

function remove_alert() {

	$(".alert_titulo").remove();
  
  }
  
  $("#form_ligas").on("change", "input#input_nombre_liga", function () {
	$(".alert_titulo").remove();
  });
  