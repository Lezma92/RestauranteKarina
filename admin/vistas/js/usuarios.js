/*=============================================
ACTIVAR USUARIO
=============================================*/

function estoyEnModal(soy) {
  $("#modal_es").val(soy);
}
function estoyEnModalEditar(soy) {
  $("#modal_es_edi").val(soy);
}


$(".tablas").on("click", ".aceptar", function () {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  console.log(idUsuario);
  console.log(estadoUsuario);
  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  Swal.fire({
    title: 'Está seguro que desea activar este usuario?',
    text: "Si acepta a este usuario podrá tener acceso al sistema",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Continuar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
          location.reload();
        }

      })
    }
  })
})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#input_user").change(function () {
  $(".alert").remove();

  var usuario = $(this).val();
  console.log(usuario);

  var datos = new FormData();
  datos.append("validarUsuario", usuario);
  $.ajax({
    url: "../ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta) {

        $("#input_user").parent().after('<div class="alert alert-warning">El usuario que intenta registrar ya existe</div>');

        $("#input_user").val("");

      }

    }

  })

})

/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function () {

  var idUsuario = $(this).attr("idUsuario");

  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({

    url: "../ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_user_edi").val(respuesta["id"]);
      $("#input_nombre_user_E").val(respuesta["nombre"]);
      $("#input_apps_user_E").val(respuesta["apellidos"]);
      $("#input_tel_e").val(respuesta["telefono"]);
      $("#input_user_E").val(respuesta["alias"]);
      $("#input_perfil_Ed").html(respuesta["t_usuario"]);
      $("#input_perfil_Ed").val(respuesta["t_usuario"]);
    }

  });

})


$("#form_editar_usuario").on("change", "input#input_user_E", function () {


  $(".alert_user_editar").remove();


  var usuario = $(this).val();
  var id_user = $("#id_user").val();


  var datos = new FormData();
  datos.append("ValidarUser", usuario);
  datos.append("id_user", id_user);


  // var parametros = {"ValidarEditar" : placas,
  //                  "id_autoEditar" : id_auto};

  $.ajax({
    url: "../ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {


      if (respuesta) {

        $("#input_user_E").parent().after('<div class="alert alert-warning alert_user_editar">Este usuario ya existe...</div>');

        $("#input_user_E").val("");

      }

    }

  })
})


const formUser = document.getElementById("Form_usurios");
const nombre_user = document.getElementById("input_nombre_user");
const app_user = document.getElementById("input_apps_user");
const pass_user = document.getElementById("input_pass");
const perfil_user = document.getElementById("input_perfil");
const usuario_user = document.getElementById("input_user");



formUser.addEventListener("submit", e => {
  e.preventDefault();
  var guardar = false;
  tipo_user = document.getElementById("input_perfil").selectedIndex;
  pag_actualizar = $("#modal_es").val();


  $(".alert_nombre").remove();
  $(".alert_app").remove();
  $(".alert_user").remove();
  $(".alert_pass").remove();
  $(".alert_perfil").remove();

  if (perfil_user == null || perfil_user == 0) {
    $("#input_perfil").parent().after('<div class="alert alert-danger alert_perfil">Favor de seleccionar una estado</div>');
    guardar = true;
    console.log(3);
  }
  if (!guardar) {
    document.getElementsByTagName("miBoton").disabled = true;
    //document.getElementById("miBoton").disabled = true;

    var formData1 = new FormData($('#Form_usurios')[0]);
    $.ajax({
      url: "../ajax/usuarios.ajax.php",
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
            title: "¡El usuario se ha guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function (result) {

            if (result.value) {
              if (pag_actualizar == "cliente") {
                window.location = "../clientes";
              }
              if (pag_actualizar == "usuarios") {
                window.location = "../usuarios";
              }


            }
            if (pag_actualizar == "cliente") {
              window.location = "../clientes";
            }
            if (pag_actualizar == "usuarios") {
              window.location = "../usuarios";
            }

          });
        }
      }
    });
  }

})

/*=============================================
ELIMINAR USUARIOS
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function () {

  var idUsuario = $(this).attr("idUsuario");
  var estoy = $(this).attr("estoyEn");
  console.log(idUsuario);
  var datos = new FormData();
  datos.append("idUsuarioE", idUsuario);




  Swal.fire({
    title: '¿Desea eliminar este usuario?',
    text: "¡El registro se eliminará permanentemente de la base de datos!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar usuario!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../ajax/usuarios.ajax.php",
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
              title: "¡El usuario ha sido eliminado correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function (result) {

              if (result.value) {

                if (estoy == 1) {
                  window.location = "../usuarios";
                }
                if (estoy == 2) {
                  window.location = "../clientes";
                }

              }
            });
          }

        }
      });
    }
  })
})