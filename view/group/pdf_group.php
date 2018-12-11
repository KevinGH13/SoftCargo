<?php
require('../../cnnbd.php');
require('fpdf/fpdf.php');
require('phpbarcode/php-barcode.php');
$id_group = $_REQUEST['id_group'];

 $link=Conectarse();
    $resultList = mysqli_query
      ($link,
        "SELECT int_ID,date_Fecha,var_destino,int_ID,var_desaduanador FROM  tbl_GrupoconsolidadoGuia WHERE int_ID = 151101001000004 "
      
      );
      

  //Ejecuto la consulta
    $listItems = array();
    while($rowList = mysqli_fetch_array($resultList)){
      $listItems[] = $rowList;
    }

  //Cerramos la conexión
    mysqli_close($link);

 $fontSize = 10;
  $marge    = 0.2;   // between barcode and hri in pixel
  $x        = 500;  // barcode center
  $y        = 50;  // barcode center
  $height   = 35;   // barcode height in 1D ; module size in 2D
  $width    = 0.5;  // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees
  
  $code     = $id_group;     // barcode (CP852 encoding for Polish and other Central European languages)
  $type     = 'code128';
  $black    = '000000'; // color in hex

$pdf=new FPDF('P','pt','Legal');
$pdf->AddPage('P','Legal');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,17,'EasyCargoPro','',1);

$pdf->Cell(40,17,'Direccion: 79 katz Ave, Paterson, NJ, 07502','',2);
$pdf->Cell(40,17,'Telefono: 973 890 0987'.$listItems[0][0],'',3);
$data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
$pdf->SetDrawColor(154, 154, 154);
$pdf->Line(0, 100, 1500, 100);
$pdf->Cell(40,25, '','',4);
$pdf->Cell(40,17, $listItems[0][1],'',5);

$pdf->Cell(200,10,"REMITENTE",'',6);
$pdf->Cell(40,10,"DESTINATARIO");
$pdf->Cell(200,10,"REMITENTE",'',7);
$pdf->Cell(40,10,"DESTINATARIO");

$pdf->Output();
?>