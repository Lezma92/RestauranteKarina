<?php
$id_jornada = $_GET["id_jornada"];
$id_liga = $_GET["id_liga"];
session_start();
if (isset($_SESSION["id"])) {
    $id_usuario = $_SESSION["id"];
}

include("../../../controlador/quinielas.controlador.php");
include("../../../modelos/quinielas.modelo.php");

$datos = ControladorQuinielas::crtMsotrarQuinielas($id_jornada);
?>


<p class="font-weight-bold text-center" style="font-size: 15; margin-bottom: 10px;"><?php echo ($datos[0]["jornada"]); ?></p>

<form method="POST" id="form_quinielas" action="" name="form_quinielas" class="form_quinielas">
    <div class="form-group">
        <label for="nom_reg">Nombre de la quiniela</label>
        <input id="nombre_quiniela" name="nombre_quiniela" type="text" class="form-control" id="nom_reg" placeholder="nombre de la quiniela" required="">
        <input name="id_usuario" id="id_usuario" type="hidden" value="<?php echo ($id_usuario); ?>">
        <input name="id_liga" id="id_liga" type="hidden" value="<?php echo ($id_liga); ?>">
        <input name="id_jornada" id="id_jornada" type="hidden" value="<?php echo ($id_jornada); ?>">

    </div>
    <div class="container-fluid">
        <?php


        $cont = 1;
        $tam = sizeof($datos);
        foreach ($datos as $key => $value) {
        ?>
            <input name="id_encuentro_<?php echo ($cont); ?>" type="hidden" value="<?php echo ($value["id_encuentro"]); ?>">
            <table class="table table-striped tablas">
                <tbody>

                    <?php

                    echo ("<tr>"); ?>
                    <td>
                        <div class="form-check form-check-inline">
                            <span class="mr-0 mr-md-2 mr-sm">
                                <img src="data:image/png;base64, <?php echo (base64_encode($value["url_img_local"])); ?>" width="30" height="30">
                            </span>
                            <label class="form-check-label" for="opc_sel_local_<?php echo ($value["id_encuentro"]); ?>">
                                <?php echo ($value["equipo_local"]); ?>
                            </label>


                        </div>
                    </td>
                    <td>
                        <input name="opc_sel_<?php echo ($cont); ?>" class="text-center form-check-input" type="radio" id="opc_sel_local_<?php echo ($value["id_encuentro"]); ?>" value="L" required>
                    </td>
                    <td>
                        <div class="col-xs-2 d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label text-white" for="opc_sel_emp_<?php echo ($value["id_encuentro"]); ?>">
                                    <?php echo ("."); ?>
                                </label>
                                <input name="opc_sel_<?php echo ($cont); ?>" class="form-check-input" type="radio" id="opc_sel_emp_<?php echo ($value["id_encuentro"]); ?>" value="E" required>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input name="opc_sel_<?php echo ($cont); ?>" class="form-check-input" type="radio" id="opc_sel_visi_<?php echo ($value["id_encuentro"]); ?>" value="V" required>
                    </td>
                    <td>
                        <div class=" form-check form-check-inline ">
                            <label class="form-check-label" for="opc_sel_visi_<?php echo ($value["id_encuentro"]); ?>"><?php echo ($value["equipo_visitante"]); ?></label>
                            <span class="mr-0 mr-md-2">
                                <img src="data:image/png;base64, <?php echo (base64_encode($value["url_img_visi"])); ?>" width="30" height="30">
                            </span>
                        </div>
                    </td>
                    <?php
                    echo ("</tr>");

                    ?>



                </tbody>

            </table>



        <?php $cont++;
        } ?>

        <p id="mensaje" class="text-danger text-center"></p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnRegisQuinielas">Registrar quiniela</button>
    </div>

</form>
<?php

?>
