/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivar", function () {
  console.log("holi");
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  console.log(idUsuario);
  console.log(estadoUsuario);
  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({

    url: "../ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {

      if (window.matchMedia("(max-width:767px)").matches) {

      }

    }

  })

  if (estadoUsuario == "Inactivo") {

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Desactivado');
    $(this).attr('estadoUsuario', "Activo");

  } else {

    $(this).addClass('btn-success');
    $(this).removeClass('btn-danger');
    $(this).html('Activado');
    $(this).attr('estadoUsuario', "Inactivo");

  }

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

        $("#input_user").parent().after('<div class="alert alert-warning">Este correo ya esta registrado</div>');

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
      $("#id_user").val(respuesta["id"]);
      $("#input_nombre_user_E").val(respuesta["nombre"]);
      $("#input_user_E").val(respuesta["usuario"]);
      $("#input_perfil_Ed").html(respuesta["perfil"]);
      $("#input_perfil_Ed").val(respuesta["perfil"]);




    }

  });

})


/*=============================================
NO REPETIR NÚMERO DE PLACAS EDITAR
=============================================*/
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
const usuario_user = document.getElementById("input_user");



formUser.addEventListener("submit", e => {
  e.preventDefault();
  var guardar = false;
  tipo_user = document.getElementById("input_perfil").selectedIndex;


  $(".alert_nombre").remove();
  $(".alert_user").remove();
  $(".alert_pass").remove();
  $(".alert_tipo").remove();

  if (nombre_user.value == "") {
    $("#input_nombre_user").parent().after('<div class="alert alert-danger alert_nombre">Favor de ingresar el nombre</div>');
    guardar = true;
    console.log(1);
  }

  if (usuario_user.value == "") {
    $("#input_user").parent().after('<div class="alert alert-danger alert_user">Favor de ingresar el e-mail</div>');
    guardar = true;
    console.log(2);
  }




  if (tipo_user == null || tipo_user == 0) {
    $("#input_vendedor").parent().after('<div class="alert alert-danger alert_tipo">Favor de seleccionar una estado</div>');
    guardar = true;
    console.log(3);
  }
  if (!guardar) {
    console.log("Holi");

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
  console.log(idUsuario);
  var datos = new FormData();
  datos.append("idUsuarioE", idUsuario);




  Swal.fire({
    title: '¿Desea eliminar este usuario?',
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

                window.location = "../usuarios";

              }
            });
          }

        }
      });
    }
  })
})