<div class="contenedor_ligas" id="contenedor_ligas">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jornadas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a>Inicio</a></li>
                            <li class="breadcrumb-item active">Jornadas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <!------------------------------------------------------------------------------------->
                <div class="card card-warning card-outline">

                    <div class="card-header">

                        <div class="col-sm-2 border-bottom-1">
                            <button type="button" class="btn btn-block" id="color_ofi" data-toggle="modal" data-target="#modalAgregarLigas">Registrar Liga</button>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="row">


                            <?php
                            $vista = ControladorJornadas::ctrSelectLigas("Activo");

                            foreach ($vista as $key => $value) {
                                $jornada = ControladorJornadas::ctrSelectJornadas($value["id"]);
                                $NJornada = sizeof($jornada);
                            ?>
                                <div class="col-md-3 col-sm-4">
                                    <div class="card card_ligas text-dark bg-light mb-3  border border-info" style="max-width: 19rem;">
                                        <div class="card-header">
                                            <p class="font-weight-bold text-center" style="font-size: 17px;">
                                                <?php echo ($value["nombre"]); ?></p>
                                            <img class="card-img-top" height="140px" width="100%" src="data:image/png;base64, <?php echo (base64_encode($value["src_img"])); ?>" alt="Card image cap">
                                        </div>

                                        <div class="card-body text-center">
                                            <h5 class="card-title">Quinielas Radilla</h5>

                                            <p class="card-text">Núm. Jornadas: <text class="font-weight-bold"><?php echo ($NJornada); ?></text></p>
                                            <button onclick="cambiar_contenedores(<?php echo ($value["id"]); ?>)" id_liga="<?php echo ($value["id"]); ?>" class="btn btn-primary"><i class="far fa-eye text-white"> Ver más</i></button>

                                            <?php if ($NJornada > 0) { ?>
                                                <button id="btn_eliminar" class="btn btn-danger" onclick="desactivarLiga(<?php echo ($value["id"]); ?>,'<?php echo ($value["nombre"]); ?>');" data-toggle="tooltip" data-placement="top" title="Desactivar liga"><i class="fas fa-power-off"></i></button>

                                            <?php } else { ?>
                                                <button id="btn_eliminar" class="btn btn-danger" onclick="eliminarLiga(<?php echo ($value["id"]); ?>,'<?php echo ($value["nombre"]); ?>');" data-toggle="tooltip" data-placement="top" title="Eliminar liga"> <i class="fas fa-trash-alt"></i></button>
                                            <?php } ?>

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
                    </div>

                </div>
                <?php

                include "modales/modal_ligas.php";
                ?>
                <!-- ------------------------------------------------------------------------------- -->
            </div>
        </section>
    </div>
</div>