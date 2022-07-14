<?php
	//require 'fpdf/fpdf.php';
	require '../../fpdf/fpdf.php';
	$titulo = "";
	class PDF extends FPDF{
		
		function Header()
		{
			$this->Image('../../img_reporte/logoSport.png', 25, 10, 30,10);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Quinielas Radilla',0,1,'C');
			$this->Cell(30);
			$this->Cell(120,10, 'Lista de Posiciones',0,0,'C');
			$this->Ln(10);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>