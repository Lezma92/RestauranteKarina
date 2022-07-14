
$(document).ready(function(){
    console.log("leyyendo");

	$('#guardar_jornadas').click(function(){
        nombre_jornada = $('#input_nombre_jornada').val();
        // fecha_hora_ini = $('#fecha_ini').val();
        // fecha_hora_cierre = $('#fecha_cierre').val();
        // console.log(fecha_hora_ini);
        // console.log(fecha_hora_cierre);
        id_liga = $('#id_liga').val();
        
        var datos = new FormData();
        datos.append("input_nombre_jornada",nombre_jornada);
        datos.append("id_liga",id_liga);

        $.ajax({
            url: "../ajax/jornadas.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
              console.log(res);
              if (res == '"ok"') {
                Swal.fire({
      
                  type: "success",
                  icon: 'success',
                  title: "¡La Jornada se ha guardado correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
      
                }).then(function (result) {
                  if (result.value) {
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
		


	});
});