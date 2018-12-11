<?php   
require('../fpdf/fpdf.php');
class PDF extends FPDF
{
}

$pdf=new PDF('P','mm',array(808,1008));
         

$pdf->AliasNbPages();

//Primera página
$pdf->Setmargins(1,1,1); 

$array = array("foo", "bar", "hello", "world");
//numeros de guias
$pdf->setY(10);
for ($i=0; $i < 8; $i++) { 
$pdf->AddPage('P',array(808,1008));
$y1 = $pdf->GetY();
$x1 = $pdf->GetX();
$pdf->Image('bg.png' , $x1, $y1 , 800 , 995,'PNG');

$pdf->SetFont('Arial','B',40);
$pdf->Ln(15);
$pdf->Cell(15);
$y2 = $pdf->GetY();
$x2 = $pdf->GetX();
$pdf->Cell(60,20,"765",0,0);
$pdf->Cell(450,20,"908765",0,0);
$pdf->Cell(50,20,"765908765 ",0,1);
$pdf->SetFont('Arial','',20);
$pdf->setXY($x2+4,$y2+13);
$margX = $pdf->GetX();
$pdf->Cell(220,20,iconv('UTF-8', 'ISO-8859-2',"Shipper's Name and Address " ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2',"Shipper's Account Number  " ),0,0);
$pdf->Cell(50,20,iconv('UTF-8', 'ISO-8859-2'," Not Negotiable " ),0,1);
$dv2y = $pdf->GetY();
$dv2x = $pdf->GetX();
$pdf->setXY($x2+27,$y2+42);
$pdf->SetFont('Times','',35);
$pdf->Cell(420,10,"J Y S CARGO",0,0);
 $pdf->Cell(14,15,"AVIANCA",0,1);
 $pdf->setX($x2+27);
 $pdf->Cell(420,10,"NEW YORK ",0,0);
 $pdf->Cell(14,15,"CLL 26",0,1);
  $pdf->setX($x2+27);
 $pdf->Cell(420,10,"NEW YORK USA",0,0);
 $pdf->Cell(14,15,"BOGOTA BOG",0,1);
 $pdf->Ln(32);
 $pdf->setX($x2+27);
 $pdf->Cell(14,15,"G.E.C",0,1);
  $pdf->setX($x2+27);
 $pdf->Cell(100,15,"bogota ",0,1);
  $pdf->setX($x2+27);
 $pdf->Cell(45,15,"BOGOTA COLOMBIA",0,1);
  $pdf->setX($x2+27);
 $pdf->Cell(27,15,"1231312123",0,1);
$pdf->Ln(35);
$pdf->setX($x2+27);
 $pdf->Cell(27,15,"GLOBO ENVIOS CARGO",0,1);
 $pdf->setX($x2+27);
 $pdf->Cell(27,15,"72 EST AVE",0,1);
 $pdf->setX($x2+27);
 $pdf->Cell(27,15,"Norwalk, Connecticut 06854",0,1);

 //airport of departure
$pdf->Ln(39);
$pdf->setX($x2+27);
 $pdf->Cell(27,15,"BOGOTA",0,1);

 //TO 
 $pdf->Ln(17);
 $pdf->setX($x2+27);
 $pdf->Cell(45,15,"BOG",0,0);
 //BY FIRST CARRIER
 $pdf->Cell(320,15,"AVIANCA ",0,0);
 $pdf->Cell(40,15,"USD ",0,0);
 $pdf->Cell(25,15,"1 ",0,0);
 $pdf->Cell(25,15,"X ",0,0);
 $pdf->Cell(25,15,"X ",0,0);
 $pdf->Cell(28,15,"X ",0,0);
  $pdf->Cell(20,15,"X ",0,0);
 $pdf->Cell(105,15,"NDV ",0,0);
 $pdf->Cell(100,15,"NDV ",0,1 );
 //AIRPORT OF DESTINATION
  $pdf->Ln(16);
 $pdf->setX($x2+27);
 $pdf->Cell(150,15,"BOGOTA",0,0);
 $pdf->Cell(120,15,"FECHA 1 ",0,0);
 $pdf->Cell(100,15,"FECHA 2 ",0,0);
 $pdf->Cell(100,15,"NDV ",0,0);

$pdf->setXY($x2+4,$y2+105);
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,20,iconv('UTF-8', 'ISO-8859-2',"Consignee's Name and Address " ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2',"Consignee's Account Numbe " ),0,0);
$pdf->SetFont('Arial','',21);
$pdf->MultiCell(550,8,iconv('UTF-8', 'ISO-8859-2'," 

It is agreed that the goods described herein are accepted in apparent good order and condition (except as noted)
for carriage SUBJECT TO THE CONDITIONS OF CONTRACT ON THE REVERSE HEREOF. ALL GOODS MAY
BE CARRIED BY ANY OTHER MEANS INCLUDING ROAD OR ANY OTHER CARRIER UNLESS SPECIFIC
CONTRARY ISNTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND SHIPPER AGREES THAT THE
SHIPMENT MAY BE CARRIED VIA INTERMEDIADTE STOPPING PLACES WHICH THE CARRIER DEEMS
APPROPRIATE. THE SHIPPER'S ATTENTION IS DRAWN TO THE NOTICE CONCERNING CARRIER'S
LIMITATION OF LIABILITY. Shipper may increase such limitation on liability by declaring a higher value for
carriage and paying a supplemental charge if required" ),0,1);
$pdf->setXY($x2+4,$y2+192);
$pdf->Cell(390,20,iconv('UTF-8', 'ISO-8859-2',"Issuing Carrier's Agent Name and City  " ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2',"Accounting Information " ),0,1);
$pdf->Cell(420);
$pdf->SetFont('Arial','B',35);
$pdf->Cell(100,15,"- prepaid ",0,1);
$pdf->setXY($x2+4,$y2+257);
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,20,iconv('UTF-8', 'ISO-8859-2'," Agent's IATA Code " ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2',"Account No." ),0,1);
$pdf->setXY($x2+4,$y2+282);
$pdf->Cell(385,20,iconv('UTF-8', 'ISO-8859-2'," Airport of Departure (Addr of First Carrier and Requested Routing " ),0,0);
$pdf->Cell(135,20,iconv('UTF-8', 'ISO-8859-2'," Reference Number" ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2'," Optional Shipping Information" ),0,1);
$pdf->setXY($x2+4,$y2+310.5);
$pdf->Cell(55,20,iconv('UTF-8', 'ISO-8859-2',"To" ),0,0);
$pdf->Cell(98,20,iconv('UTF-8', 'ISO-8859-2',"By first Carrie" ),0,0);
$pdf->SetFont('Arial','',15);
$pdf->Cell(75,20,iconv('UTF-8', 'ISO-8859-2',"Routing and Destination" ),0,0);
$pdf->SetFont('Arial','',20);
$pdf->Cell(38,20,iconv('UTF-8', 'ISO-8859-2',"To" ),0,0);
$pdf->Cell(38,20,iconv('UTF-8', 'ISO-8859-2',"By" ),0,0);
$pdf->Cell(38,20,iconv('UTF-8', 'ISO-8859-2',"To" ),0,0);
$pdf->Cell(40,20,iconv('UTF-8', 'ISO-8859-2',"By" ),0,0);
$pdf->Cell(40,20,iconv('UTF-8', 'ISO-8859-2',"Currency" ),0,0);
$pdf->Cell(40,20,iconv('UTF-8', 'ISO-8859-2',"CHGS" ),0,0);
$pdf->Cell(45,20,iconv('UTF-8', 'ISO-8859-2',"WT/VAL" ),0,0);
$pdf->Cell(40,20,iconv('UTF-8', 'ISO-8859-2',"Other" ),0,0);
$pdf->Cell(110,20,iconv('UTF-8', 'ISO-8859-2',"Declared Value for Carriage" ),0,0);
$pdf->Cell(40,20,iconv('UTF-8', 'ISO-8859-2',"Declared Value for Customs" ),0,1);

$pdf->setXY($x2+428,$y2+318);
$pdf->Cell(25,20,iconv('UTF-8', 'ISO-8859-2',"Code" ),0,0);
$pdf->Cell(25,20,iconv('UTF-8', 'ISO-8859-2',"PPD" ),0,0);
$pdf->Cell(25,20,iconv('UTF-8', 'ISO-8859-2',"COLL" ),0,0);
$pdf->Cell(25,20,iconv('UTF-8', 'ISO-8859-2',"PPD" ),0,0);
$pdf->Cell(40,20,iconv('UTF-8', 'ISO-8859-2',"COLL" ),0,1);


$pdf->setXY($x2+4,$y2+340);
$pdf->Cell(256,20,"Airport of Destination" ,0,0);
$pdf->Cell(125,20,iconv('UTF-8', 'ISO-8859-2',"Requested FLIGHT /Date" ),0,0);

$pdf->Cell(130,20,iconv('UTF-8', 'ISO-8859-2',"Amount of Insurance" ),0,0);
$pdf->MultiCell(550,8,iconv('UTF-8', 'ISO-8859-2',"
INSURANCE: If Carrier offers insurance and such insurance is
requested in accordance with the conditions therect, indicate amount to
be insured in figures is box marked *Amount of Insurance*" ),0,1);
$pdf->SetFont('Arial','',20);
$pdf->setXY($x2+4,$y2+372);
$pdf->Cell(258,20,"Handing Information" ,0,1);
$pdf->setXY($x2+680,$y2+420);
$pdf->Cell(258,20,"SCI" ,0,0);
$pdf->setXY($x2+4,$y2+425);
$pdf->MultiCell(258,7,"These commodities technology or software were exported from the United States
in accordance with the export Administation Regulation. Ultimate destination" ,0,0);
$pdf->setXY($x2+400,$y2+426);
$pdf->MultiCell(258,7,"Diversion contrary to U.S. law
prohibited" ,0,1);
$pdf->setX($x2+5);
$pdf->Cell(60,8,"No. of" ,0,0);
$pdf->Cell(60,8,"Gross" ,0,0);
$pdf->Cell(30,8,"Kg" ,0,0);
$pdf->Cell(100,8,"Rate Class" ,0,0);
$pdf->Cell(100,8,"Chargeable" ,0,0);
$pdf->Cell(100,8,"Rate" ,0,1);
$pdf->setX($x2+5);
$pdf->Cell(158,8,"Pieces" ,0,0);
$pdf->Cell(320,8,"Comodity" ,0,0);
$pdf->Cell(150,8,"Total" ,0,0);
$pdf->Cell(100,8,"Nature and Quantity of Good" ,0,1);
$pdf->setX($x2+5);
$pdf->Cell(60,8,"RCP" ,0,0);
$pdf->Cell(60,8,"Weight" ,0,0);
$pdf->Cell(40,8,"Lb" ,0,0);
$pdf->Cell(100,8,"Item No" ,0,0);
$pdf->Cell(120,8,"Weight" ,0,0);
$pdf->Cell(250,8,"Charge" ,0,0);
$pdf->Cell(100,8,"(incl. Dimensions or Volume)" ,0,1);
$pdf->Cell(25);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(40,30,"1" ,0,0);
$pdf->Cell(75,30,"91" ,0,0);
$pdf->Cell(120,30,"K" ,0,0);
$pdf->Cell(100,30,"91 k" ,0,0);
$pdf->Cell(95,30," 2 " ,0,0);
$pdf->Cell(136,30,"$1302.000" ,0,0);
$pdf->SetFont('Arial','B',28);
$pdf->MultiCell(190,10,"Contiene: XXXXXXXXXXXXXXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" ,0,1);
$pdf->Cell(65);
$pdf->SetFont('Arial','B',35);
$pdf->Cell(78,10,"206.25" ,0,0);
$pdf->Cell(40,10,"L" ,0,1); 


$pdf->setXY($x2+5,$y2+658);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(40,30,"1" ,0,0);
$pdf->Cell(420,30,"91" ,0,0);

$pdf->Cell(143,30,"$1302.000" ,0,1);
$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+33,$y2+675);
$pdf->Cell(100,20,"Prepaid " ,0,0);
$pdf->Cell(110,20,"Weight Charge " ,0,0);
$pdf->Cell(76,20,"Collect " ,0,0);
$pdf->Cell(100,20,"Other Charges" ,0,1);
$pdf->Cell(15);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(157,8,"$1302.000" ,0,0,'C');
$pdf->Cell(158,8," " ,0,0,'C');
$pdf->MultiCell(450,8," " ,0,'L');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+113,$y2+704);
$pdf->Cell(100,20,"Valuation Charge " ,0,1);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(15);
$pdf->Cell(157,8,"$1302.000" ,0,0,'C');
$pdf->Cell(158,8," " ,0,0,'C');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+148,$y2+734);
$pdf->Cell(100,20,"Tax" ,0,1);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(15);
$pdf->Cell(157,8,"$1302.000" ,0,0,'C');
$pdf->Cell(158,8," " ,0,0,'C');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+97,$y2+764);
$pdf->Cell(100,20,"Total Other Charges Due Agent" ,0,1);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(15);
$pdf->Cell(157,20,"$1302.000" ,0,0,'C');
$pdf->Cell(158,8," " ,0,0,'C');
$pdf->SetFont('Arial','',20);
$pdf->setXY($x2+319,$y2+794);
$pdf->MultiCell(450,8,"Shipper certifies that the particulars on the face here of are correct and that insofar as any part of the consignment
contains dangeorous goods, such part is properly described by name and is in proper condition for carriage by air
according to the applicable Dangerous Goods Regulations " ,0,'L');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+97,$y2+795);
$pdf->Cell(100,20,"Total Other Charges Due Carrier" ,0,1);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(15);
$pdf->Cell(157,8,"$1302.000" ,0,0,'C');
$pdf->Cell(158,8," " ,0,0,'C');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+32,$y2+856);
$pdf->Cell(180,20,"Total Prepaid" ,0,0);
$pdf->Cell(100,20,"Total Collect" ,0,1);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(15);
$pdf->Cell(157,10,"$1302.000" ,0,0,'C');
$pdf->Cell(158,10," " ,0,0,'C');

$pdf->SetFont('Arial','',23);
$pdf->setXY($x2+22,$y2+884);
$pdf->Cell(160,20,"Currency Conversion Rates" ,0,0);
$pdf->Cell(180,20,"CC Charges in Dest. Currency" ,0,0);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(158,20,"Thu May 23 15:06:08 EDT 2013 " ,0,1);

$pdf->Cell(15);
$pdf->Cell(157,10,"USD" ,0,0,'C');
$pdf->Cell(158,10," " ,0,1,'C');


$pdf->SetFont('Arial','',23);
$pdf->setXY($x2+189,$y2+921);
$pdf->Cell(160,10,"Charges at Destination" ,0,0);
$pdf->Cell(180,10,"Total Collect Charges" ,0,1);
$pdf->Cell(35);
$pdf->MultiCell(200,10,"For Carrier's Use only
at Destination" ,0);
$pdf->setXY($x2+500,$y2+940);
$pdf->SetFont('Arial','B',40);
$pdf->Cell(180,10,"765 908765" ,0,1);

$pdf->setXY($x2+250,$y2+958);

$pdf->Cell(180,10,"ORIGINAL 3 (FOR SHIPPER)" ,0,1);

$pdf->setXY($x2+550,$y2+870);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(180,10,"Globo Envios Cargo" ,0,1);
$pdf->setXY($x2+550,$y2+880);
$pdf->Cell(180,10,"72 West ave " ,0,1);
$pdf->setXY($x2+550,$y2+890);
$pdf->Cell(180,10,"Norwalk, Connecticut ESTADOS UNIDO" ,0,1);
$pdf->SetFont('Arial','',25);
$pdf->setXY($x2+450,$y2+850);
$pdf->Cell(180,10,"Norwalk, Connecticut ESTADOS UNIDO" ,0,1);

$pdf->AddPage('P',array(808,1008));
$y1 = $pdf->GetY();
$x1 = $pdf->GetX();
$pdf->Image('iat.png' , $x1, $y1 , 808 , 1008,'PNG');
$pdf->Ln(90);


}

//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('termico.pdf','I');

?>