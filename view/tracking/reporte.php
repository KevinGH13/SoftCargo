<?php 

include_once('Declr_valor.php');
require('ctrl_tracking.php');

	
 
$pdf=new PDF('P','mm',array(808,1008));
    

$pdf->AliasNbPages();

//Primera página
//$pdf->Setmargins(10,10,10); 

$pdf->Setmargins(10,10,10); 
$pdf->AddPage('P',array(808,1008));

//$pdf->AddPage();


$pdf->TablaSimple();
$pdf->setRects();
$pdf->Ln(100);
$pdf->TablaSimple();

//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('dclr_valor.pdf','I');

?>