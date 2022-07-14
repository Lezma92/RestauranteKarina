$(".tabla_encuentros").on("click", ".btn_eliminar_encuentro", function () {

    var id_encuentro = $(this).attr("id_encuentro");
    console.log("Estoy aqui ptm");
    var opc_encuentros = new FormData();
    opc_encuentros.append("accion", "EliminarEncuentros");
    opc_encuentros.append("id_encuentro", id_encuentro);

    Swal.fire({
      title: '¿Está seguro que desea eliminar el encuentro seleccionado?',
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'aceptar!'
    }).then((result) => {
      if (result.isConfirmed) {
        let url_pag = "../ajax/encuentros.ajax.php";
        let mensaje = "¡Encuentro eliminado correctamente!";
        let div_cambiar = "#tabla_encuentros";
        let url_cargar = "paginas/tabla_encuentros.php";
        
          cambiosAjax(url_pag, opc_encuentros, mensaje, div_cambiar, url_cargar);
        

        //resultado
      }
    })
  })
