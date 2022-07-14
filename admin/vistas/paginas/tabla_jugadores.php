<?php
$id_jornada = $_GET["id_jornada"];
session_start();

include("../../controlador/jornadas.controlador.php");
include("../../modelos/jornadas.modelo.php");

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jugares con quinielas registradas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a>Inicio</a></li>
                        <li class="breadcrumb-item active">Jugando</li>
                        <li class="breadcrumb-item">Lista Jugadores</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!------------------------------------------------------------------------------------->
            <div class="card card-danger card-outline">

                <div class="card-body pad table-responsive" id="tabla_jornada_activas">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-danger">
                                <th>#</th>
                                <th>Nombre Cliente</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vistaJornadas = ControladorJornadas::crtListarJugadores($id_jornada);

                            foreach ($vistaJornadas as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo ($key + 1); ?></td>
                                    <td><?php echo ($value["nombreJugador"]); ?></td>
                                    <td><?php echo ($value["totalQuinielas"]); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" onclick="listarQuinielas(<?php echo ($value["idJornada"]); ?>,<?php echo ($value["idAcceso"]); ?>)" class="btn btn-success btn-lg font-weight-bold"><i class="far fa-eye">Ver Quinielas</i></button>

                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>


                    </table>




                </div>

            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>
    <script src=" js/verJugando.js"></script>
</div>

<script>
    $(function() {
        $(" #example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>