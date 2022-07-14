<div class="row">


    <?php
    $vista = ControladorJornadas::ctrSelectLigas();

    foreach ($vista as $key => $value) {
        # code
    ?>
    <div class="col-md-3 col-sm-4">
        <div class="card card_ligas text-dark bg-light mb-3  border border-info" style="max-width: 19rem;">
            <div class="card-header">
                <p class="font-weight-bold text-center" style="font-size: 17px;"><?php echo ($value["nombre"]); ?></p>
                <img class="card-img-top" height="140px" width="100%"
                    src="data:image/png;base64, <?php echo (base64_encode($value["src_img"])); ?>" alt="Card image cap">
            </div>

            <div class="card-body">
                <h5 class="card-title">Quinielas Radilla</h5>

                <p class="card-text">Núm. Jornadas: <text class="font-weight-bold">5</text></p>
                <button onclick="cambiar_contenedores(<?php echo($value["id"]);?>)" id_liga = "<?php echo($value["id"]);?>" class="btn btn-primary"><i class="far fa-eye text-white"> Ver más</i></button>
                <button id="btn_config" class="btn btn-success"><i class="fas fa-cogs"></i></button>
                <button id="btn_eliminar" class="btn btn-danger"><i class="fa fa-times"></i></button>
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