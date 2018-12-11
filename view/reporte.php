<?php 
require('../modelo.php');
require('tracking/Declr_valor.php');
$data;
$data = listData(
	"int_ID,var_Guia,var_NombreDest","tbl_Guia","",""


	);


	
 
$pdf=new PDF('P','mm',array(808,1008));
    

$pdf->AliasNbPages();

//Primera página
//$pdf->Setmargins(10,10,10); 

$pdf->Setmargins(10,10,10); 
$pdf->AddPage('P',array(808,1008));

//$pdf->AddPage();


$pdf->TablaSimple($data);
$pdf->setRects();
$pdf->Ln(100);
$pdf->TablaSimple($data);

//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('dclr_valor.pdf','I');

?>