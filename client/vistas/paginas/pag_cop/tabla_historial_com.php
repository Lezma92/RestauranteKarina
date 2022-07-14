<?php

$id_jornada = $_GET["id_jornada"];
$id_liga = $_GET["id_liga"];
session_start();
if (isset($_SESSION["id"])) {
    $id_usuario = $_SESSION["id"];
}

?>

<div class="card-body pad table-responsive">
    <table id="example1" class="table table-bordered table-striped tablas">
        <thead>
            <tr>
                <th>#</th>
                <th>Quiniela</th>
                <th>Jornada</th>
                <th>Combinaciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include("../../controlador/resultados.controlador.php");
            include("../../modelos/resultados.modelo.php");
            $id_usuario = $_SESSION["id"];
            $quinielas = ControladorResultados::ctrVerMisQuinielas($id_usuario, $id_jornada);
            foreach ($quinielas as $key => $value) {
                $combinacion = ControladorResultados::crtVerJuego($value["idQuinielas"]);
                echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                          <td>' . $value["nomQuiniela"] . '</td>';
                echo '<td>' . $value["nomJornada"] . '</td>';
                echo '<td>' . $combinacion["jugada"] . '</td>
                                </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(function() {
        $("#example1").DataTable();
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