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
    $row_title = 44;
    $row_header = 16;
    $row_casillas = 4;
    $size_font_title = 7;

    $pdf = new PDF();

    $pdf->AliasNbPages();
    $pdf->AddPage();

    $img_titulo = 'data://text/plain;base64,' . base64_encode($datos_liga['src_img']);

    $pdf->SetFillColor(232, 232, 232);
    for ($i = 0; $i < 3; $i++) {
        for ($titulos = 0; $titulos < 3; $titulos++) {
            $pdf->SetFont('Arial', 'B', $size_font_title);
            //$pdf->Cell($row_title, 4, 'Quinielas Radilla'.$datos_liga["id"], "LRT", 0, 'C');
            $pdf->Cell($row_title, 4, utf8_decode("Quinielas Radilla") . " " . $pdf->Image($img_titulo, ($pdf->GetX() + 4), ($pdf->GetY() + 1), 6, 5, "png")."".$pdf->Image("../../img_reporte/logoSport.png", ($pdf->GetX() +34), ($pdf->GetY() + 1), 9,5), "LRT", 0, 'C');

            $pdf->Cell(1, 5, '', 0, 0, 'C', 0);

            if ($titulos == 2) {
                //$titulos = 0;
            $pdf->Cell($row_title, 4, utf8_decode("Quinielas Radilla") . " " . $pdf->Image($img_titulo, ($pdf->GetX() + 4), ($pdf->GetY() + 1), 6,5, "jpeg")."".$pdf->Image("../../img_reporte/logoSport.png", ($pdf->GetX() + 34), ($pdf->GetY() + 1), 9,5), "LRT", 1, 'C');
                //$pdf->Cell($row_title, 4, 'Quinielas Radilla', "LRT", 1, 'C');
                for ($nomLiga = 0; $nomLiga < 3; $nomLiga++) {
                    $pdf->Cell($row_title, 3, $JORNADA, "LR", 0, 'C');
                    $pdf->Cell(1, 5, '', 0, 0, 'C', 0);
                    if ($nomLiga == 2) {
                        $pdf->Cell($row_title, 3, $JORNADA, "LR", 1, 'C');
                        for ($header = 0; $header < 3; $header++) {
                            $pdf->Cell($row_header, 5, 'Local', 1, 0, 'C', 1);
                            $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                            $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                            $pdf->Cell($row_casillas, 5, '', 1, 0, 'C', 1);
                            $pdf->Cell($row_header, 5, 'Visitante', 1, 0, 'C', 1);
                            $pdf->Cell(1, 5, '', 0, 0, 'C', 0);
                            if ($header == "2") {
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

                                    for ($encuentros = 0; $encuentros < 3; $encuentros++) {
                                        $pdf->Cell($row_header, 5, utf8_decode($value['equipo_local']) . " " . $pdf->Image($img_eq_local, ($pdf->GetX() + 13), ($pdf->GetY() + 1), 3, 3, "png"), 1, 0, 'L');
                                        $pdf->Cell($row_casillas, 5, "L", 1, 0, 'C');
                                        $pdf->Cell($row_casillas, 5, "E", 1, 0, 'C');
                                        $pdf->Cell($row_casillas, 5, "V", 1, 0, 'C');
                                        $pdf->Cell($row_header, 5, $pdf->Image($img_eq_visit, $pdf->GetX(), ($pdf->GetY() + 1), 3, 3, "png") . utf8_decode($value['equipo_visitante']), 1, 0, 'R');
                                        $pdf->Cell(1, 5, '', 0, 0, 'C', 0);
                                        if ($encuentros == 2) {
                                            $pdf->Cell($row_header, 5, utf8_decode($value['equipo_local']) . " " . $pdf->Image($img_eq_local, ($pdf->GetX() + 13), ($pdf->GetY() + 1), 3, 3, "png"), 1, 0, 'L');
                                            $pdf->Cell($row_casillas, 5, "L", 1, 0, 'C');
                                            $pdf->Cell($row_casillas, 5, "E", 1, 0, 'C');
                                            $pdf->Cell($row_casillas, 5, "V", 1, 0, 'C');
                                            $pdf->Cell($row_header, 5, $pdf->Image($img_eq_visit, $pdf->GetX(), ($pdf->GetY() + 1), 3, 3, "png") . utf8_decode($value['equipo_visitante']), 1, 1, 'R');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        for ($titulos = 0; $titulos < 3; $titulos++) {
            $pdf->Cell($row_title, 5, 'Nombre: _____________________', 1, 0, 'C');
            $pdf->Cell(1, 5, '', 0, 0, 'C', 0);
            if ($titulos == "2") {
                $pdf->Cell($row_title, 5, 'Nombre: _____________________', 1, 1, 'C');
            }
        }
    }

    $pdf->Output($JORNADA.".pdf", "D");
}