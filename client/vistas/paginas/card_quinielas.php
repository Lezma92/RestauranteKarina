<div class="row">
    <?php
    $usuario = $_SESSION["usuario"];
    if ($usuario == "Joshe1") {
        $quinielas = ControladorQuinielas::ctrQuinielasActivasFueraHra();
    } else {
        $quinielas = ControladorQuinielas::ctrQuinielasActivas();
    }


    foreach ($quinielas as $key => $value) {
        # code
    ?>
        <div class="col-md-3 col-sm-4">
            <div class="card card_ligas text-dark bg-light mb-3  border border-danger" style="max-width: 19rem;">
                <div class="card-header">
                    <p class="font-weight-bold text-center" style="font-size: 17px;"><?php echo ($value["nombre_liga"]); ?></p>
                    <img class="card-img-top" height="140px" width="100%" src="data:image/png;base64, <?php echo (base64_encode($value["img_liga"])); ?>" alt="Card image cap">
                </div>

                <div class="card-body  text-center">
                    <h5 class="card-title text-primary font-weight-bold">Quinielas Radilla</h5>
                    <input type="hidden" value="<?php echo ($value["nombre_jornada"]); ?>" id="nomJornada">
                    <p class="card-text"><text class="font-weight-bold"><?php echo ($value["nombre_jornada"]); ?></text></p>
                    <p class="card-text"><text class="text-success"><?php echo ($value["dia_cierre"] . $value["hora_cierre"]); ?></text></p>
                    <button type="button" onclick="cargarQuinielas(<?php echo ($value["id_jornada"]); ?>,<?php echo ($value["id_ligas"]); ?>);" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Jugar</button>
                    <!-- <button id="btn_eliminar" class="btn btn-danger"><i class="fa fa-times"></i></button> -->
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<style>
    .card_ligas:hover {
        transform: scale(1.01);
    }
</style>

<script src="js/mostrarQuinielas.js"></script>