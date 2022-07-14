<?php
$Jornadas_ligas = ControladorResultados::ctrVerLigasJornadas();
foreach ($Jornadas_ligas as $key => $LigasJornada) {
    $premios = ControladorEncuentros::crtMostrarPremios($LigasJornada["idJornada"]);
?>

    <section class="content">
        <div class="container-fluid">
            <!------------------------------------------------------------------------------------->
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <p class="text-primary text-center font-weight-bold" style="font-size: 20px;">
                        Tabla de posiciones y resultados <?php echo ($LigasJornada["nombreLiga"]); ?>
                    </p>
                    <p class="text-center font-weight-bold" style="font-size: 17px;">
                        <?php echo ($LigasJornada["nombreJornada"]); ?>
                    </p>
                    <div class="row">
                        <?php foreach ($premios as $key => $premio) { ?>
                            <div class="col-md">
                                <p class="text-danger text-center font-weight-bold" style="font-size: 15px;">
                                    <?php echo ($premio["lugar"] . ": " . $premio["premio"]); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- pad table-responsive -->
                <div class="card-body pad table-responsive">
                    <table id="example1" class="table table-bordered table-striped tablas">
                        <thead class="thead-dark">
                            <tr>
                                <th>Participantes</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>P</th>
                            </tr>
                        </thead>
                        <?php
                        $resultados = ControladorResultados::ctrVerResultados($LigasJornada["idLiga"], $LigasJornada["idJornada"]);
                        $dat_aux = 0;
                        $tb_resultados = [];
                        $contN = 0;
                        $contAux = 0;
                        $contEncuentros = 0;
                        foreach ($resultados as $key => $dat_result) {
                            if ($dat_result["id_quiniela"] == $dat_aux) {
                                if ($dat_result["colorColumna"] == "Verde") {
                                    $tb_resultados[$contAux][$contEncuentros] = "<td class ='bg-success'>" . $dat_result["voto_a"] . "</td>";
                                } elseif ($dat_result["colorColumna"] == "Naranja") {
                                    $tb_resultados[$contAux][$contEncuentros] = "<td class ='bg-warning'>" . $dat_result["voto_a"] . "</td>";
                                } else {
                                    $tb_resultados[$contAux][$contEncuentros] = "<td>" . $dat_result["voto_a"] . "</td>";
                                }

                                $contEncuentros++;
                            } else {
                                if ($dat_result["colorColumna"] == "Verde") {
                                    $tb_resultados[$contN][1] = "<td class = 'bg-success'>" . $dat_result["voto_a"] . "</td>";
                                } elseif (($dat_result["colorColumna"] == "Naranja")) {
                                    $tb_resultados[$contN][1] = "<td class = 'bg-warning'>" . $dat_result["voto_a"] . "</td>";
                                } else {
                                    $tb_resultados[$contN][1] = "<td>" . $dat_result["voto_a"] . "</td>";
                                }
                                $tb_resultados[$contN][0] = "<td>" . $dat_result["nombre_quiniela"] . "</td>";

                                $tb_resultados[$contN][10] = "<td class = 'font-weight-bold bg-info'>" . $dat_result["totalPuntos"] . "</td>";
                                $contAux = $contN;
                                $contN++;
                                $contEncuentros = 2;
                            }
                            $dat_aux = $dat_result["id_quiniela"];
                        }
                        $tam_tab =  sizeof($tb_resultados);
                        ?>

                        <tbody>
                            <?php
                            for ($i = 0; $i < $tam_tab; $i++) {
                                $tam_filas = sizeof($tb_resultados[$i]);
                                echo ("<tr class='text-center'>");
                                for ($j = 0; $j < $tam_filas; $j++) {
                                    echo ($tb_resultados[$i][$j]);
                                }
                                echo ("</tr>");
                            }
                            ?>


                        </tbody>

                    </table>

                </div>
            </div>
            <!-- ------------------------------------------------------------------------------- -->
        </div>
    </section>

    <?php } ?>
<script>
    $(function() {
        $(" #example1").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
        });
    });
</script>