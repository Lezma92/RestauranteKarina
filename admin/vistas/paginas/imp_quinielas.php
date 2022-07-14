<?php

require_once "../../controlador/jornadas.controlador.php";
require_once "../../controlador/encuentros.controlador.php";

require_once "../../modelos/jornadas.modelo.php";
require_once "../../modelos/encuentros.modelo.php";
require_once "../../modelos/plantilla_reporte.php";
if (isset($_POST["id_jornada"])) {
    $JORNADA = $_POST["titulo"];
    $id_jornada = $_POST["id_jornada"];
    $vistaEncuentros = ControladorEncuentros::ctrVerEncuentros($id_jornada);
    $datos_liga = ControladorJornadas::ctrVerLiga($id_jornada);
    
    $fechaCierre = ControladorEncuentros::crtGetFechaCierre($id_jornada);


    $row_title = 66;
    $row_header = 24;

    $row_casillas = 6;

    $size_font_title = 8;

    $pdf = new PDF();

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetTextColor(19, 15, 14);

    $img_titulo = 'data://text/plain;base64,' . base64_encode($datos_liga['src_img']);

    $pdf->SetFillColor(232, 232, 232);
    for ($i = 0; $i < 4; $i++) {
        for ($titulos = 0; $titulos < 2; $titulos++) {
            $pdf->SetFont('Arial', 'B', $size_font_title);
            $pdf->Cell($row_title, 3, utf8_decode("Quinielas Radilla") . " " . $pdf->Image($img_titulo, ($pdf->GetX() + 4), ($pdf->GetY() + 1), 6, 5, "png") . "" . $pdf->Image("../../img_reporte/logoSport.png", ($pdf->GetX() + 55), ($pdf->GetY() + 1), 9, 5), "LRT", 0, 'C');



            if ($titulos == 1) {
                //$titulos = 0;
                $pdf->Cell($row_title, 3.5, utf8_decode("Quinielas Radilla") . " " . $pdf->Image($img_titulo, ($pdf->GetX() + 4), ($pdf->GetY() + 1), 6, 5, "jpeg") . "" . $pdf->Image("../../img_reporte/logoSport.png", ($pdf->GetX() + 55), ($pdf->GetY() + 1), 9, 5), "LRT", 1, 'C');

                for ($nomLiga = 0; $nomLiga < 2; $nomLiga++) {
                    $pdf->Cell($row_title, 3, $JORNADA, "LR", 0, 'C');

                    if ($nomLiga == 1) {
                        $pdf->Cell($row_title, 3, $JORNADA, "LR", 1, 'C');
                        for ($header = 0; $header < 2; $header++) {
                            $pdf->Cell($row_header, 5, 'Local', 1, 0, 'C', 1);
                            $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                            $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                            $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                            $pdf->Cell($row_header, 5, 'Visitante', 1, 0, 'C', 1);

                            if ($header == "1") {
                                //$header = 0;
                                $pdf->Cell($row_header, 5, 'Local', 1, 0, 'C', 1);
                                $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                                $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                                $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                                $pdf->Cell($row_header, 5, 'Visitante', 1, 1, 'C', 1);
                                $pdf->SetFont('Arial', '', $size_font_title);
                                foreach ($vistaEncuentros as $key => $value) {

                                    $img_eq_local = 'data://text/plain;base64,' . base64_encode($value["url_img_local"]);
                                    $img_eq_visit = 'data://text/plain;base64,' . base64_encode($value["url_img_visi"]);

                                    for ($encuentros = 0; $encuentros < 2; $encuentros++) {
                                        $eq_local = $value['equipo_local'];
                                        if (strlen($value['equipo_local']) > 10) {
                                            $eq_local = explode(" ", $eq_local);
                                            if (sizeof($eq_local) > 2) {
                                                $eq_local = substr($eq_local[0], 0, 8) . " " . $eq_local[1] . " " . $eq_local[2];
                                            } else {
                                                $eq_local = substr($eq_local[0], 0, 10) . " " . $eq_local[1];
                                            }
                                        }
                                        $eq_visi = $value['equipo_visitante'];
                                        if (strlen($value['equipo_visitante']) > 10) {
                                            $eq_visi = explode(" ", $eq_visi);
                                            if (sizeof($eq_visi) > 2) {
                                                $eq_visi = substr($eq_visi[0], 0, 8) . " " . $eq_visi[1] . " " . $eq_visi[2];
                                            } else {
                                                $eq_visi = substr($eq_visi[0], 0, 10) . " " . $eq_visi[1];
                                            }
                                        }
                                        $pdf->Cell($row_header, 5, utf8_decode($eq_local) . " " . $pdf->Image($img_eq_local, ($pdf->GetX() + 20), ($pdf->GetY() + 1), 3, 3, "png"), 1, 0, 'L');
                                        $pdf->Cell($row_casillas, 5, "L", 1, 0, 'C');
                                        $pdf->Cell($row_casillas, 5, "E", 1, 0, 'C');
                                        $pdf->Cell($row_casillas, 5, "V", 1, 0, 'C');
                                        $pdf->Cell($row_header, 5, $pdf->Image($img_eq_visit, $pdf->GetX(), ($pdf->GetY() + 1), 3, 3, "png") . utf8_decode($eq_visi), 1, 0, 'R');

                                        if ($encuentros == 1) {
                                            $pdf->Cell($row_header, 5, utf8_decode($eq_local) . " " . $pdf->Image($img_eq_local, ($pdf->GetX() + 20), ($pdf->GetY() + 1), 3, 3, "png"), 1, 0, 'L');
                                            $pdf->Cell($row_casillas, 5, "L", 1, 0, 'C');
                                            $pdf->Cell($row_casillas, 5, "E", 1, 0, 'C');
                                            $pdf->Cell($row_casillas, 5, "V", 1, 0, 'C');
                                            $pdf->Cell($row_header, 5, $pdf->Image($img_eq_visit, $pdf->GetX(), ($pdf->GetY() + 1), 3, 3, "png") . utf8_decode($eq_visi), 1, 1, 'R');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $pdf->SetFont('Arial', 'B', 7);
        for ($titulos = 0; $titulos < 2; $titulos++) {
            $pdf->Cell(38, 4, 'Nombre:________________', "L", 0, 'L');
            $pdf->Cell(28, 4, 'Tel.: ____________', "R", 0, 'L');
            if ($titulos == "1") {
                $pdf->Cell(38, 4, 'Nombre:_________________', "L", 0, 'L');
                $pdf->Cell(28, 4, 'Tel.: ____________', "R", 1, 'L');
                for ($tel = 0; $tel < 2; $tel++) {
                    $pdf->SetTextColor(251, 56, 14);
                    $pdf->Cell(46, 3.5, utf8_decode($fechaCierre[0][3]." ".$fechaCierre[0]["hora_cierre"]), "LB", 0, 'L');
                    $pdf->Cell(20, 3.5, '7421107368', "RB", 0, 'R');

                    ////
                    if ($tel == "1") {
                        $pdf->Cell(46, 3.5, utf8_decode($fechaCierre[0][3]." ".$fechaCierre[0]["hora_cierre"]), "LB", 0, 'L');
                        $pdf->Cell(20, 3.5, '7421107368', "RB", 1, 'R');
                        $pdf->SetTextColor(19, 15, 14);
                    }
                }
            }
        }
    }

    $pdf->Output($JORNADA . ".pdf", "D");
}
