<?php
$id_jornada = $_GET["id_jornada"];
$id_liga = $_GET["id_liga"];
session_start();
if (isset($_SESSION["id"])) {
    $id_usuario = $_SESSION["id"];
}



include("../../controlador/quinielas.controlador.php");
include("../../modelos/quinielas.modelo.php");

$datos = ControladorQuinielas::crtMsotrarQuinielas($id_jornada);

?>
<div class="container-fluid">
    <div class="card card-warning card-outline">
        <div class="row">
            <div class="col-md-5 border">
                <form method="POST" id="form_quinielas" action="" name="form_quinielas" class="form_quinielas">
                    <div class="card-header">
                        <div class="form-group">
                            <label for="nom_reg">Nombre de la quiniela</label>
                            <input id="nombre_quiniela" name="nombre_quiniela" type="text" class="form-control" id="nom_reg" placeholder="nombre de la quiniela" required="">
                            <input name="id_usuario" id="id_usuario" type="hidden" value="<?php echo ($id_usuario); ?>">
                            <input name="id_liga" id="id_liga" type="hidden" value="<?php echo ($id_liga); ?>">
                            <input name="id_jornada" id="id_jornada" type="hidden" value="<?php echo ($id_jornada); ?>">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card card-warning card-outline">
                            <?php
                            $cont = 1;
                            $tam = sizeof($datos);
                            foreach ($datos as $key => $value) {
                            ?>
                                <input name="id_encuentro_<?php echo ($cont); ?>" type="hidden" value="<?php echo ($value["id_encuentro"]); ?>">

                                <div class="row">
                                    <input name="cant_encuentros" type="hidden" value="<?php echo ($tam); ?>" required>

                                    <!-- <div class="col text-right"> -->

                                    <div class="col-5 text-right">
                                        <div class="form-check form-check-inline">
                                            <span>
                                                <img src="data:image/png;base64, <?php echo (base64_encode($value["url_img_local"])); ?>" width="30" height="30">
                                            </span>
                                            <label class="form-check-label" for="opc_sel_local_<?php echo ($value["id_encuentro"]); ?>">
                                                <?php echo ($value["equipo_local"]); ?>
                                            </label>

                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <div class="col-2 text-center d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <a></a><input name="opc_sel_<?php echo ($cont); ?>" class="text-center form-check-input" type="radio" id="opc_sel_local_<?php echo ($value["id_encuentro"]); ?>" value="L" required>

                                            <a></a><input name="opc_sel_<?php echo ($cont); ?>" class="form-check-input" type="radio" id="opc_sel_emp_<?php echo ($value["id_encuentro"]); ?>" value="E" required>
                                            <a></a><input name="opc_sel_<?php echo ($cont); ?>" class="form-check-input" type="radio" id="opc_sel_visi_<?php echo ($value["id_encuentro"]); ?>" value="V" required>
                                        </div>
                                    </div>
                                    <div class="col-5 text-left">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="opc_sel_visi_<?php echo ($value["id_encuentro"]); ?>"><?php echo ($value["equipo_visitante"]); ?></label>
                                            <span class="mr-0 mr-md-2">
                                                <img src="data:image/png;base64, <?php echo (base64_encode($value["url_img_visi"])); ?>" width="30" height="30">
                                            </span>
                                        </div>
                                    </div>


                                </div>
                            <?php $cont++;
                            } ?>

                            <p id="mensaje" class="text-danger text-center"></p>

                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-warning" id="btnLimpiar">Limpiar</button>
                                <button type="button" class="btn btn-info" id="btnRegisQuinielas">Guadar Quiniela</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-md-7">
                <div class="card-body pad table-responsive">
                    <table id="example1" class="table table-bordered table-striped tablas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Quiniela</th>
                                <th>Jornada</th>
                                <th>Combinaciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include("../../controlador/resultados.controlador.php");
                            include("../../modelos/resultados.modelo.php");
                            $id_usuario = $_SESSION["id"];
                            $quinielas = ControladorResultados::ctrVerMisQuinielas($id_usuario, $id_jornada);
                            foreach ($quinielas as $key => $value) {
                                $combinacion = ControladorResultados::crtVerJuego($value["idQuinielas"]);
                                echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                          <td>' . $value["nomQuiniela"] . '</td>';
                                echo '<td>' . $value["nomJornada"] . '</td>';
                                echo '<td>' . $combinacion["jugada"] . '</td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ------------------------------------------------------------------------------- -->
    </div>
</div>


<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script src="js/quinielas.js"></script>