<body>
    <?php
    $tipos_comidas = ControladorReservaciones::TiposComidas();


    ?>


    <header>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center" style="margin-top: 50px;">
            <h1 class="display-4 fw-normal">Platillos y precios</h1>
            <p class="fs-5 text-muted">Disfruta de nuestra variedad de pescados y mariscos, todo de excelente calidad</p>
        </div>
    </header>


    <main class="container">


        <div class="accordion" id="accordionExample" style="margin-bottom: 100px;">
            <?php
            $cont = 0;
            foreach ($tipos_comidas as $key => $value) {
                $estado = "false";
                $mostrar = "";
                if ($cont == 0) {
                    $estado = "true";
                    $mostrar = "show";
                }
            ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="<?php echo ("heading" . $value["id"]); ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo ("collapse" . $value["id"]); ?>" aria-expanded="<?php echo ($estado) ?>" aria-controls="<?php echo ("collapse" . $value["id"]); ?>">
                            <h5 class="text-secondary"><?php echo ($value["nomTipo"]); ?></h5>
                        </button>

                    </h2>
                    <div id="<?php echo ("collapse" . $value["id"]); ?>" class="accordion-collapse collapse <?php echo ($mostrar); ?>" aria-labelledby="<?php echo ("heading" . $value["id"]); ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="list-group text-center">
                                <?php
                                $platillos_precios  = ControladorReservaciones::PlatillosPrecios($value["id"]);
                                foreach ($platillos_precios as $llave => $platillo) {
                                ?>
                                    <a class="list-group-item list-group-item-action">
                                        <h5><?php echo ($platillo["nombrePlatillo"]); ?></h5>
                                        <img width="120px" height="120px" src="<?php echo ("../img_platillos/".$platillo["url_img"]); ?>" alt="<?php echo ($platillo["nombrePlatillo"]); ?>" srcset="">
                                        <p><?php echo ($platillo["descripcion"]); ?></p>
                                        <h4> <span class="badge bg-primary rounded-pill"><?php echo ("$" . $platillo["precio_unitario"]." MXM"); ?></span></h4>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php $cont++;
            } ?>

        </div>

    </main>

</body>