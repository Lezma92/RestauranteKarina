<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Reservaciones en espera</h1>
          <p>
            Panel de reservaciones, aqui puede aceptar o cancelar las reservaciones
          </p>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a>Inicio</a></li>
            <li class="breadcrumb-item">Reservaciones</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <!------------------------------------------------------------------------------------->
      <div class="card card-warning">



        <div class="card-body pad table-responsive">
          <table id="example1" class="table table-bordered table-striped tablas">
            <thead class="table-danger">
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>No. Personas</th>
                <th>Reservación</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>

              <?php

              $reservaciones = ControladorReservaciones::verReservacionesEspera();
              foreach ($reservaciones as $key => $value) {
                echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                          <td>' . $value["nomCompleto"] . '</td>
                          <td>' . $value["correo"] . '</td>';
                echo '<td>' . $value["n_telefono"] . '</td>';
                echo '<td>' . $value["usr_temp"] . '</td>';
                echo '<td>' . $value["pws_temp"] . '</td>';
                echo '<td>' . $value["c_personas"] . '</td>';
                echo '<td>' . $value["dia_entrada"] . ' ' . $value["dia_mes"] . ' a las ' . $value["hora"] . '</td>';
                echo ('<td><div class="btn-group">');
                echo ' <button class="btn btn-success btn-xs btnActivarReservacion" f_r = "'.$value["fecha_entrada"].'" c_p = "'.$value["c_personas"].'" nomC = "'.$value["nomCompleto"].'"  idReservacion="' . $value["idReservacion"] . '" estadoUsuario="Espera"  data-toggle="modal" data-target="#modalAceptarReservaciones"><i class="fa fa-calendar-check"></i></button>';
                echo ('<button class="btn btn-warning btnEditarReservacion" onclick="estoyEnModalEditar(2)" id_reservacion="' . $value["idReservacion"] . '" data-toggle="modal" data-target="#modalEditarReservaciones"><i class="fas fa-edit"></i></button>');

                echo ('<button class="btn btn-danger btnEliminarReservacion" onclick="eliminarRervacion(' . $value["idReservacion"] . ',2)"; ><i class="fa fa-times"></i></button>');


                echo ('</div> </td></tr>');
              }


              ?>

            </tbody>

          </table>

        </div><?php

              include "modales/modal_reservaciones.php";
              include "modales/modal_aceptar_reservacion.php";
              ?>
      </div>
      <!-- ------------------------------------------------------------------------------- -->
    </div>
  </section>
</div>


<script src="js/reservaciones.js"></script>
<script>
  $(function() {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
    });
  });
</script>