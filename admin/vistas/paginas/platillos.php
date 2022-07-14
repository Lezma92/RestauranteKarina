<div class="contenedor_ligas" id="contenedor_ligas">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menú de categorias</h1>
                        <p>Selecciona 'ver' en cualquiera de las categorias para ver la variedad de platillos</p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a>Inicio</a></li>
                            <li class="breadcrumb-item active">Platillos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <!------------------------------------------------------------------------------------->
                <div class="card card-outline">


                    <hr>
                    <!-- <div class="container mt-5"> -->
                    <div class="card-header">
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-block bg-danger text-white bold" data-toggle="modal" data-target="#modalAgregarTiposComidas">
                                <i class="fas fa-plus"></i>
                                Nueva categoria
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $vista = ControladorJornadas::ctrTiposComidas();
                            foreach ($vista as $key => $value) {
                            ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="card card_platillos text-dark  border" style="max-width: 25rem;">
                                        <div class="card-header">
                                            <p class="font-weight-bold text-center" style="font-size: 17px;">
                                                <?php echo ($value["nomTipo"]); ?>
                                            </p>
                                            <img class="card-img-top" height="140px" width="120%" src="data:image/png;base64, <?php echo (base64_encode($value["img_portada"])); ?>" alt="Imagenes">
                                        </div>

                                        <div class="card-body text-center">
                                            <h5 class="card-title">Restaurante Karina</h5>

                                            <p class="card-text">
                                                <text class="font-weight-bold">
                                                    <i class="mdi mdi-text-to-speech-off:">
                                                        <?php echo ($value["descripcion"]); ?>
                                                    </i>
                                                </text>
                                            </p>
                                            <button onclick="cambiar_contenedores(<?php echo ($value['id']); ?>)" id_liga="<?php echo ($value["id"]); ?>" class="btn btn-primary"><i class="far fa-eye text-white"></i> Ver</button>
                                            <button type="buttom" class="btn btn-success" onclick="actualizarTiposComidas(<?php echo ($value['id']); ?>,'<?php echo ($value['nomTipo']); ?>','<?php echo ($value['descripcion']); ?>')" data-toggle="modal" data-target="#modalActualizarTiposComidas"> <i class="fas fa-edit"></i></button>
                                            <button id="btn_eliminar" class="btn btn-danger" onclick="eliminarTipoComida(<?php echo ($value['id']); ?>,'<?php echo ($value['nomTipo']); ?>');" data-toggle="tooltip" data-placement="top" title="Eliminar"> <i class="fas fa-trash-alt"></i></button>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>


                    </div>

                </div>



            </div>
            <style>
                .card_platillos:hover {
                    transform: scale(1.02);
                }

                .card_platillos {
                    background-color: #E3F2FD;
                    border-style: solid;
                    border-radius: 10px;
                }
            </style>
            <?php
            include "modales/modal_platillos.php";
            ?>
            <!-- ------------------------------------------------------------------------------- -->
    </div>
    </section>
</div>
</div>
<script src="js/platillos.js"></script>