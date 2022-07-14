<?php
if (isset($_SESSION["USR_TEMP"]) && isset($_SESSION["PSW_TEMP"])) {
} else {
    echo ("<script>window.location ='http://localhost/playa';</script>");
}

?>
<main class="container" style="margin-top: 85px;">
    <div class="row text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-white bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Reservacíon</h4>
                    <p class="card-text"></p>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <h5>Felicidades tu registro se realizo con exito!!!</h5>
                        <p>Para poder ver el estado de tu reservación es necesario iniciar sesión con el usuario que te
                            proporcionamos de manera temporal</p>
                        <div class="alert alert-danger" role="alert">
                            <p><strong>Usuario: </strong> <?php echo ($_SESSION["USR_TEMP"]); ?></p>
                            <p><strong>Contraseña: </strong> <?php echo ($_SESSION["PSW_TEMP"]); ?></p>
                            <p><strong>Nota: </strong>Te sugerimos copiar o tomar una captura de pantalla para conservar tu usuario y contraseña</p>

                            <p>
                                Contactanos: <strong>Tel:</strong> 7444155251411 <strong>correo:</strong>
                                soporte_restauranteKarina@soporte.com
                            </p>


                        </div>
                        <p></p>

                    </div>

                    <!-- <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button> -->
                </div>
            </div>
        </div>
    </div>

</main>