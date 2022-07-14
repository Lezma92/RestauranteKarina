

// ===============================================================
const nombre = document.getElementById("input_nombre_jornada");

const form = document.getElementById("form_jornadas");


form.addEventListener("submit", e => {
  e.preventDefault();
  var guardar = false;
  remove_alert();


  if (nombre.value == "") {
    $("#input_nombre_jornada").parent().after('<div class="alert alert-danger alert_titulo">Favor de ingresar el nombre</div>');
    guardar = true;
  }
  if (!guardar) {
    var formData1 = new FormData($('#form_jornadas')[0]);
    $.ajax({
      url: "../ajax/jornadas.ajax.php",
      method: "POST",
      data: formData1,
      cache: false,
      contentType: false,
      processData: false,
      success: function (res) {
        console.log(res);
        if (res == '"ok"') {
          Swal.fire({

            type: "success",
            icon: 'success',
            title: "¡La propiedad se ha guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function (result) {
            if (result.value) {
            //  $("#tabla_jornadas").load("tabla_jornada.php");
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

})

function remove_alert() {

	$(".alert_titulo").remove();
  
  }
  
  $("#form_propiedad").on("change", "input#input_nombre_propi", function () {
	$(".alert_titulo").remove();
  });
  