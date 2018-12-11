<?php

require('fpdf/fpdf.php');


class PDF extends FPDF
{
  function Header()
    {
      
      $this->SetFont('Arial','B',20);
      $this->SetXY(50, 10);
      $this->Cell(250);
      $this->Cell(250,10,'Easycargo pro',0,0,'C');
      $this->Cell(170,10,'Consolodidao de CArga',0,1,'C');
      $this->SetFont('Arial','B',10);
      $this->Cell(700,20,'Origen',0);
      $this->Cell(100,20,'Fecha',0,1);
      $this->Cell(700,20,'Empresa  : direccion, ciudad,estado, zipcode',0,1);
      $this->Cell(100,20,'Destino',0,1);
      $this->Cell(100,20,'Empresa D: direccion, ciudad,estado,pais',0,1);
      
     }
     //mis guias hijas
     function hijas(){
     	$this->SetFont('Arial','B',9);
     	$this->Cell(200);
     	 $this->Cell(200,20,'Remitentes',0);
     	  $this->Cell(150,20,'Destinatarios',0);
     	  $this->Cell(100,20,'Declarado',0);
     	  $this->Cell(100,20,'peso/Volumetrico',0);
     	  $this->Cell(100,20,'Unidades',0,1);

     	  $this->Cell(200);
     	  $this->Cell(200,30,'Nombre',0);
     	  $this->Cell(150,30,'Nombre D',0);
     	  $this->Cell(100,30,'Valor',0);
     	  $this->Cell(100,30,'peso ln / kl',0);
     	  $this->Cell(100,30,'1',0,1);

     	  $this->Cell(200);
     	  $this->Cell(200,20,'Direccion',0);
     	  $this->Cell(150,20,'Direccion ',0);
     	  $this->Cell(100,20,'numero de contacto ',0);
     	  $this->Cell(100,20,'numero  contacto, ciudad',0,1);
     	  
     	  $this->Cell(200,20,'Contenido',0,1);
     	  $this->Cell(100,20,'fecha de creacion de la factura',0,1);	






     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
      $this->Write (5, 'This is a footer');
    }
}

$pdf=new PDF('P','pt',array(808,1008));
//Primera página    
        
$pdf->AliasNbPages();

$pdf->Setmargins(10,10,10); 
$pdf->AddPage('P',array(808,1008));
$pdf->ln(20);
$pdf->hijas();
$pdf->Output('example2.pdf','I');
?>