<?php
session_destroy();
session_start();
?>

<header>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center" style="margin-top: 55px;">
        <h1 class="display-4 fw-normal">Rerserva tu mesa</h1>
        <p class="fs-5 text-danger">* Nota: Verifica que tus datos sean correctos, por medio de ello nos contataremos contigo</p>
    </div>
</header>
<main class="container">
    <div >
        <!-- //(`id`, `nombre`, `a_paterno`, `a_materno`, `n_telefono`, `correo`, `fecha_hora`, `c_personas`) -->
        <form method="POST" class="was-validated p-3" autocomplete="off">
            <div class="row">
                <div class="col-md-4">
                    <label for="nom_1" class="form-label">Nombre(s)</label>
                    <input name="nombre" type="text" class="form-control" id="nom_1" placeholder="Campo obligatorio*" minlength="3" maxlength="30" required>
                </div>
                <div class="col-md-4">
                    <label for="app1" class="form-label">Apellido Paterno</label>
                    <input name="a_paterno" type="text" class="form-control" id="app1" placeholder="Campo obligatorio*" minlength="3" maxlength="30" required>
                </div>
                <div class="col-md-4">
                    <label for="apm2" class="form-label">Apellido Materno</label>
                    <input name="a_materno" type="text" class="form-control" id="apm2" placeholder="Campo obligatorio*" minlength="3" maxlength="30" required>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="n_telefono" class="form-label">Número de telefono:</label>
                    <input name="n_telefono" id="n_telefono" type="number" class="form-control" placeholder="Campo obligatorio*" minlength="3" maxlength="30" required>
                </div>
                <div class="form-group col-md-6 col-lg-6">
                    <label for="correo" class="form-label">Correo electronico:</label>
                    <input name="correo" id="correo" type="email" class="form-control" placeholder="Campo obligatorio*" minlength="3" maxlength="30" required>
                </div>
                <div class="form-group col-md-4 col-lg-6">
                    <label for="fecha_hora" class="form-label">Fecha de Entrada</label>
                    <input class="form-control" type="datetime-local" id="fecha_hora" name="fecha_hora" min="<?php echo (date("ymd")); ?>" max="2018-12-">

                </div>
                <div class="col-md-6 col-lg-6">
                    <label for="validationServer04" class="form-label">Personas</label>
                    <select name="c_personas" class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        <option selected disabled value="">Cantidad de Personas</option>
                        <option value="1">1 Persona</option>
                        <option value="2">2 Personas</option>
                        <option value="3">3 Personas</option>
                        <option value="4">4 Personas</option>
                        <option value="5">5 Personas</option>
                        <option value="6">6 Personas</option>
                    </select>

                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-8 mt-4">
                </div>

            </div>

            <div class="col-md-12 col-lg-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-danger btn-lg text-white">
                    <strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                        </svg> Enviar
                    </strong>
                </button>
            </div>


        </form>
    </div>

    <?php
    $GuardarReservacion = ControladorReservaciones::CrearReservacion();
    if ($GuardarReservacion == "ok") {
        echo ("<script>window.location ='http://localhost/playa/estado';</script>");
    }

    ?>
</main>