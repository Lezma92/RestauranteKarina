<?php

require_once "../../controlador/resultados.controlador.php";
require_once "../../controlador/jornadas.controlador.php";

require_once "../../modelos/resultados.modelo.php";
require_once "../../modelos/jornadas.modelo.php";

require_once "../../modelos/plantillaParticipantes.php";

if (isset($_POST["idLiga"])) {
    $idLiga = $_POST["idLiga"];
    $idJornada = $_POST["idJornada"];

    $DatosJornadas = ControladorJornadas::ctrSelectNombreJornada($idJornada);
    $premios = ModeloResultados::mdlVerPremios($idJornada);
    $encuentros = ControladorResultados::crtListarEncuentros($idJornada);

    $TAM_FILA_NOMBRE = 26;
    $TAM_FILA_RESULT = 7;
    $ANCHO_COLUMNAS = 5;


    $pdf = new PDF();


    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Image('../../img_reporte/titulo.jpg', 0, 0, 218, 30);
    $pdf->Image('../../img_reporte/IconosSq.png', 10, 0, 30, 30);
    $pdf->SetFont('Times', 'B', 35);
    $pdf->SetTextColor(2, 27, 25);
    $pdf->Cell(30);
    $pdf->Cell(130, 10, 'QUINIELAS RADILLA', 0, 1, 'C');

    $pdf->SetTextColor(140, 18, 146);
    $pdf->Cell(35);
    $pdf->SetFont('Times', 'B', 20);
    $pdf->Cell(120, 10, 'LISTA DE POSICIONES', 0, 1, 'C');


    $pdf->SetTextColor(19, 15, 14);

    $pdf->SetMargins(1, 15, 8);
    $pdf->Cell(240, 1, utf8_decode(""), 0, 1, 'C', 1);


    // $pdf->Cell(10);
    $pdf->SetFillColor(151, 248, 210);
    $pdf->SetFont('Times', 'B', 20);
    $pdf->Cell(220, 10, utf8_decode("Premios"), 0, 1, 'C', 1);

    $cant_premios = sizeof($premios);
    $pdf->SetFillColor(230, 27, 13);
    $pdf->SetFont('Times', 'B', 25);

    foreach ($premios as $key => $premio) {
        if ($cant_premios  == 2) {
            $pdf->Cell(60, 16, utf8_decode("$" . $premio["premio"]), 0, 0, 'C', 1);
        } elseif ($cant_premios  == 3) {
            $pdf->Cell(70, 16, utf8_decode("$" . $premio["premio"]), 0, 0, 'C', 1);
        } elseif ($cant_premios == 1) {
            $pdf->Cell(220, 16, utf8_decode($premio["lugar"] . ": $" . $premio["premio"]), 0, 0, 'C', 1);
        }
    }
    $pdf->SetFillColor(224, 241, 155);
    if ($cant_premios == 0 || $cant_premios == "") {
        $pdf->SetFillColor(224, 241, 155);
        $pdf->Cell(220, 16, utf8_decode("Aun no se han registrado premios"), 0, 0, 'C', 1);
    }
    $pdf->Ln(14);
    $pdf->SetFillColor(224, 241, 155);

    $pdf->SetMargins(5, 15, 8);
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(220, 10, utf8_decode($DatosJornadas["nombre"]), 0, 1, 'C', 1);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(220, 10, utf8_decode("Horarios de los próximos encuentros "), 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);
    $cont_e = 1;
    $filaCambio = 65;
    $total_encuentros = 0;
    $num_vueltas = 0;
    foreach ($encuentros as $key => $listaEncuentros) {

        if ($cont_e == 3) {
            $pdf->Cell(60, 8, utf8_decode($listaEncuentros["eq_local"]) . " vs " . utf8_decode($listaEncuentros["eq_visi"]), 0, 0, 'C', 0);
            $pdf->Ln(4);
            $cont_e = 0;
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetTextColor(251, 56, 14);
            for ($i = $num_vueltas; $i < ($num_vueltas + 3); $i++) {
                $pdf->Cell(60, 8, utf8_decode($encuentros[$i][5]) . " " . utf8_decode($encuentros[$i][6]) . ", a las " . utf8_decode($encuentros[$i][7]), 0, 0, 'C', 0);
            }
            $pdf->SetTextColor(19, 15, 14);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Ln(10);
            $num_vueltas += 3;

            $total_encuentros = $total_encuentros;
        } else {
            $pdf->Cell(60, 8, utf8_decode($listaEncuentros["eq_local"]) . " vs " . utf8_decode($listaEncuentros["eq_visi"]), 0, 0, 'C', 0);
        }
        $cont_e++;
        $total_encuentros++;
    }


    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetFillColor(120, 249, 159);
    $pdf->SetDrawColor(20, 54, 51);

    $pdf->Cell($TAM_FILA_NOMBRE, 6, utf8_decode("Participantes"), 1, 0, 'L', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 1, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 2, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 3, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 4, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 5, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 6, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 7, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 8, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 9, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, utf8_decode("P"), 1, 0, 'C', 1);

    $pdf->Cell(2, 6, "", 1, 0, 'C', 0);

    $pdf->Cell($TAM_FILA_NOMBRE, 6, utf8_decode("Participantes"), 1, 0, 'L', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 1, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 2, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 3, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 4, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 5, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 6, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 7, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 8, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, 9, 1, 0, 'C', 1);
    $pdf->Cell($TAM_FILA_RESULT, 6, utf8_decode("P"), 1, 1, 'C', 1);
    $pdf->SetFont('Arial', '', 7);


    $resultados = ControladorResultados::ctrVerResultados($idLiga, $idJornada);
    $dat_aux = 0;
    $tb_resultados = [];
    $contN = 0;
    $contAux = 0;
    $contEncuentros = 0;
    foreach ($resultados as $key => $dat_result) {
        if ($dat_result["id_quiniela"] == $dat_aux) {
            if ($dat_result["colorColumna"] == "Verde") {
                $tb_resultados[$contAux][$contEncuentros] = "Verde";
                $tb_resultados[$contAux][$contEncuentros + 1] = $dat_result["voto_a"];
            } elseif ($dat_result["colorColumna"] == "Naranja") {
                $tb_resultados[$contAux][$contEncuentros] = "Naranja";
                $tb_resultados[$contAux][$contEncuentros + 1] = $dat_result["voto_a"];
            } else {
                $tb_resultados[$contAux][$contEncuentros] = "Blanco";
                $tb_resultados[$contAux][$contEncuentros + 1] = $dat_result["voto_a"];
            }

            $contEncuentros += 2;
        } else {
            if ($dat_result["colorColumna"] == "Verde") {
                $tb_resultados[$contN][1] = "Verde";
                $tb_resultados[$contN][2] = $dat_result["voto_a"];
            } elseif (($dat_result["colorColumna"] == "Naranja")) {
                $tb_resultados[$contN][1] = "Naranja";
                $tb_resultados[$contN][2] = $dat_result["voto_a"];
            } else {
                $tb_resultados[$contN][1] = "Blanco";
                $tb_resultados[$contN][2] = $dat_result["voto_a"];
            }
            $tb_resultados[$contN][0] = $dat_result["nombre_quiniela"];

            $tb_resultados[$contN][19] = $dat_result["totalPuntos"];
            $contAux = $contN;
            $contN++;
            $contEncuentros = 3;
        }
        $dat_aux = $dat_result["id_quiniela"];
    }
    $tam_tab =  sizeof($tb_resultados);

    $id_vueltas = 0;
    for ($i = 0; $i < $tam_tab; $i++) {
        $id_vueltas++;
        $tam_filas = sizeof($tb_resultados[$i]);
        for ($j = 0; $j < ($tam_filas); $j++) {
            if ($j == 0) {
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->Cell($TAM_FILA_NOMBRE, $ANCHO_COLUMNAS, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'L');
            } else {
                $pdf->SetFont('Arial', '', 7);

                if ($tb_resultados[$i][$j] == "Verde") {
                    $j += 1;
                    $pdf->SetFillColor(88, 214, 141);
                    $pdf->Cell($TAM_FILA_RESULT, $ANCHO_COLUMNAS, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'C', 1);
                } elseif ($tb_resultados[$i][$j] == "Naranja") {
                    $j += 1;
                    $pdf->SetFillColor(247, 157, 49);
                    $pdf->Cell($TAM_FILA_RESULT, $ANCHO_COLUMNAS, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'C', 1);
                } elseif ($tb_resultados[$i][$j] == "Blanco") {
                    $j += 1;
                    $pdf->Cell($TAM_FILA_RESULT, $ANCHO_COLUMNAS, utf8_decode($tb_resultados[$i][$j]), 1, 0, 'C');
                }
                if ($j == 19) {
                    $pdf->SetFont('Arial', 'B', 7);
                    $pdf->SetFillColor(14, 226, 236);
                    $pdf->Cell($TAM_FILA_RESULT, $ANCHO_COLUMNAS, utf8_decode($tb_resultados[$i][19]), 1, 0, 'C', 1);
                    if ($id_vueltas == 1) {
                        $pdf->Cell(2, $ANCHO_COLUMNAS, "", 1, 0, 'C', 0);
                    }
                }
                $pdf->SetFont('Arial', '', 7);
            }

            //                echo ($tb_resultados[$i][$j]);
        }
        if ($id_vueltas == 2) {
            $pdf->Ln();
            $id_vueltas = 0;
        }
    }


    $pdf->Output("Lista.pdf", "D");
}
