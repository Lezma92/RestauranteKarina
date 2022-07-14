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
                        <li class="breadcrumb-item active">Mis quinielas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!------------------------------------------------------------------------------------->
            <div class="card card-info card-outline">
                <div class="card-header">
                
                </div>


                <div class="card-body pad table-responsive">
                    <table id="example1" class="table table-bordered table-striped tablas">
                        <thead>
                            <tr class="text-info bold">
                                <th>#</th>
                                <th>Quiniela</th>
                                <th>Liga</th>
                                <th>Jornada</th>
                                <th>Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $id_usuario = $_SESSION["id"];
                            $quinielas = ControladorResultados::ctrVerMisQuinielas($id_usuario);
                            foreach ($quinielas as $key => $value) {

                                echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                          <td>' . $value["nomQuiniela"] . '</td>
                          <td>' . $value["nomLigas"] . '</td>';


                                echo '<td>' . $value["nomJornada"] . '</td>';
                                echo '<td>' . $value["fecha_registro"] . '</td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>
</div>