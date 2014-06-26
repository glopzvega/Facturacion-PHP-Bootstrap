<?php
require ('lib/fpdf17/fpdf.php');
class PDF extends FPDF {
	// Cabecera de p�gina
	function Header() {
		// Logo
		$this->Image ( 'logo.png', 175, 10, 20 );
		// Arial bold 15
		$this->SetFont ( 'Arial', 'B', 15 );
		// Movernos a la derecha
		$this->Cell ( 70 );
		// T�tulo
		$this->Cell ( 50, 10, 'Factura de Venta', 0, 0, 'C' );
		// Salto de l�nea
		$this->Ln ( 20 );
		
		$this->Cell ( 50, 10, 'Datos del Cliente', 0, 0, '' );		
		$this->Cell ( 85 );		
		$this->Cell ( 50, 10, 'Datos del Proveedor', 0, 0, '' );
				
		$this->Ln ( 10 );
		$this->SetFont ( 'Arial', '', 10 );		
		
		$this->Cell ( 50, 10, 'Gerardo A Lopez Vega', 0, 0, '' );
		$this->Cell ( 85 );
		$this->Cell ( 50, 10, 'Gerardo A Lopez Vega', 0, 0, '' );
		
		$this->Ln (5);
		
		$this->Cell ( 50, 10, 'Lopez y Asociados', 0, 0, '' );
		$this->Cell ( 85 );
		$this->Cell ( 50, 10, 'Lopez y Asociados', 0, 0, '' );
				
		$this->Ln (5);		
		
		$this->Cell ( 50, 10, 'LOVG880408E79', 0, 0, '' );
		$this->Cell ( 85 );
		$this->Cell ( 50, 10, 'LOVG880408E79', 0, 0, '' );
				
		$this->Ln (5);
		
		$this->Cell ( 50, 10, 'Fracc Arboledas C. Sauces #36', 0, 0, '' );
		$this->Cell ( 85 );
		$this->Cell ( 50, 10, 'Fracc Arboledas C. Sauces #36', 0, 0, '' );
		
		$this->Ln (5);
		
		$this->Cell ( 50, 10, 'Acapulco, Gro.', 0, 0, '' );
		$this->Cell ( 85 );
		$this->Cell ( 50, 10, 'Acapulco, Gro.', 0, 0, '' );
			
		$this->Ln ( 20 );
	}
	
	// Pie de p�gina
	function Footer() {
		// Posici�n: a 1,5 cm del final
		$this->SetY ( - 15 );
		// Arial italic 8
		$this->SetFont ( 'Arial', 'I', 8 );
		// N�mero de p�gina
		$this->Cell ( 0, 10, 'Page ' . $this->PageNo () . '/{nb}', 0, 0, 'C' );
	}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF ();
$pdf->AliasNbPages ();
$pdf->AddPage ();
$pdf->SetFont ( 'Times', '', 12 );
$pdf->SetY(100);
$pdf->SetX(15);

for($i = 1; $i <= 4	; $i ++){
	//$pdf->Cell ( 0, 10, 'Imprimiendo l�nea n�mero ' . $i, 0, 1 );
	$pdf->Cell(40,7,"header",1);
}
	
$pdf->Output();


?>

