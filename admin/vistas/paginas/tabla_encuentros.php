<?php
require_once "../../controlador/encuentros.controlador.php";
require_once "../../modelos/encuentros.modelo.php";
if (!isset($_SESSION["id_jornada"])) {
    session_start();
}
$vistaEncuentros = ControladorEncuentros::ctrVerEncuentros($_SESSION["id_jornada"]);
$premios = ControladorEncuentros::crtMostrarPremios($_SESSION["id_jornada"]);
$Npremios = sizeof($premios);
$stats = false;
if (isset($vistaEncuentros[0]["stats_encuentros"])) {
    if ($vistaEncuentros[0]["stats_encuentros"] == "Abierto") {
        $stats = true;
    }
}
$fila = 1;
?>
<div class="container-fluid">
    <div class="row">
        <?php foreach ($premios as $key => $premio) { ?>
            <div class="col-md">
                <p class="text-primary text-center font-weight-bold" style="font-size: 15px;">
                    <?php echo ($premio["lugar"] . ": " . $premio["premio"]); ?>
            </div>
        <?php } ?>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover tabla_encuentros">
            <thead>
                <tr class="text-center">
                    <th style="width: 15px;">No.</th>
                    <th>Local</th>
                    <th>Visitante</th>
                    <th>Fecha/Hora</th>
                    <?php if ($stats) { ?>
                        <th>Resultado</th>
                    <?php } ?>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($vistaEncuentros as $key => $value) {
                ?>
                    <tr class="text-center text-left">
                        <td class="text-bold" style="width: 15px;">
                            <?php echo ($key + 1); ?>
                        </td>
                        <td class="">
                            <span class="mr-0 mr-md-2 mr-sm">
                                <img height="34px" width="32px" src="data:image/png;base64, <?php echo (base64_encode($value["url_img_local"])); ?>" alt="Card image cap">
                            </span>
                            <label class="form-check-label">
                                <?php echo ($value["equipo_local"]); ?>
                            </label>
                        </td>
                        <td>
                            <span class="mr-0 mr-md-2 mr-sm">
                                <img height="34px" width="32px" src="data:image/png;base64, <?php echo (base64_encode($value["url_img_visi"])); ?>" alt="Card image cap">
                            </span>
                            <label class="form-check-label">
                                <?php echo ($value["equipo_visitante"]); ?>
                            </label>
                        </td>
                        <td>
                            <label class="form-check-label">
                                <?php echo ($value["dia_partido"]." ".$value["hora_partido"]); ?>
                            </label>
                        </td>
                        <?php if ($value["stats_encuentros"] == "Abierto") { ?>
                            <td>
                                <label class="form-check-label">
                                    <?php echo ($value["resultado"]); ?>
                                </label>
                            </td>
                        <?php } ?>

                        <td>

                            <div class="btn-group">
                                <?php if ($value["stats_encuentros"] == "Abierto") { ?>
                                    <button type="button" data-toggle="modal" data-target="#modal_add_puntos" class="btn btn-warning agregar_puntos" onclick="cambiarDatosPuntos(<?php echo ($value["id_encuentro"]); ?>,'<?php echo ($value["equipo_local"]); ?>','<?php echo ($value["equipo_visitante"]); ?>','<?php echo (base64_encode($value["url_img_local"])); ?>','<?php echo (base64_encode($value["url_img_visi"])); ?>')"><i class="fas fa-edit">Punto</i>
                                    </button>
                                <?php } else { ?>

                                    <button class="btn btn-danger btn_eliminar_encuentro" id_encuentro="<?php echo ($value["id_encuentro"]) ?>" usuario=""><i class="fas fa-trash-alt"></i>
                                    <?php } ?>
                                    </button>
                            </div>

                        </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
</div>
<?php
include "modales/modal_add_puntos.php";
?>
<script src="js/eliminar_encuentros.js"></script>