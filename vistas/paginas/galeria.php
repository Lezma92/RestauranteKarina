<body>
    <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center" style="margin-top: 35px;">
            <h1 class="display-4 fw-normal">Galería de los platillos más consumidos</h1>
            <p class="fs-5 text-muted">Restaurante Karina agradece su preferencia</p>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php
                $platillos_precios  = ControladorReservaciones::PlatillosPrecios(1);
                foreach ($platillos_precios as $llave => $platillo) {
                ?>
                    <div class="col">
                        <div class="card shadow-sm m-2">
                            <img width="100%" height="100%" src="<?php echo ("../img_platillos/" . $platillo["url_img"]); ?>" alt="<?php echo ($platillo["nombrePlatillo"]); ?>" srcset="">
                            <div class="card-body">
                                <p class="card-text"><?php echo ($platillo["descripcion"]); ?></p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <p class="btn btn-sm btn-outline-danger"><?php echo ("$" . $platillo["precio_unitario"] . " MXM"); ?>
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </main>

</body>