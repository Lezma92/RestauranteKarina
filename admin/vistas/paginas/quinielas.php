<?php

if ($_SESSION["perfil"] == "Vendedor") {
    echo '<script>
    window.location = "../inicio";
  </script>';

    return;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quinielas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a>Inicio</a></li>
                        <li class="breadcrumb-item active">Quinielas</li>
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
                    <div class="row">
                        <div class="col-sm-2 border-bottom-1">
                            <button type="button" class="btn btn-block btn-primary" id="color_ofi" data-toggle="modal"
                                data-target="#modalAgregarPropiedad">Nueva Jornada</button>
                        </div>
                        <div class="col-sm-2 border-bottom-1">
                            <button type="button" class="btn btn-block" id="color_ofi" data-toggle="modal"
                                data-target="#modalAgregarPropiedad">Nueva Jornada</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pad table-responsive">
                    <?php

                    include("partes/tabla_jornadas.php");
                    ?>

                </div>
            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>
</div>

<?php

include "modales/modal_subir.php";
?>