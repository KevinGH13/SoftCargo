<?php   
require('../../cnnbd.php');
require('../fpdf/fpdf.php');
 $awb_id=$_GET['awbid'];

function listDat($fields, $table, $conditions=null, $ordering=null){

	//Abrimos la conexión
		$link=Conectarse();

	//Preparo la consulta para listar datos
		$resultList = mysqli_query
			($link,
				"SELECT ".$fields." FROM ".$table." where ".$conditions
			);
			
		
	//Ejecuto la consulta
		
		$rowList = mysqli_fetch_array($resultList,MYSQLI_NUM);
			$listItems = $rowList[0];
		

	//Cerramos la conexión
		mysqli_close($link);
		
		return $listItems;
}


  //Abrimos la conexión
  $link=Conectarse();
    $resultList = mysqli_query
      ($link,
        "SELECT int_ID,var_nombrerem,var_estadorem,var_paisrem,var_nombredes,var_ciudaddes,var_paisdes,var_zipdes,var_transportador,var_tranciudad,var_tranpaiscode,var_fechavuelo,var_aeropartida,var_aerollegada,var_iatacode,var_termpago,var_tipomoneda,var_vlrcDeclr,var_vlrADecl,var_Aseg,var_cuenta,var_infocuenta,var_handing,var_fechaCreacion,int_Empres,var_agen1,var_agen2,var_agen3,var_refNumb,var_ShippInf1,var_ShippInf2,var_to1,var_by1,var_to2,var_by2,var_termpagoOther,var_fechavuelo2,var_firstcarrie,var_toawb,var_awbn,var_shipperA,var_othCharg,var_prefawb,var_ziprem
           FROM  tbl_Awb where int_ID = $awb_id "
      
      );
        $resultList2 = mysqli_query
      ($link,
        "SELECT  int_IDawb,int_Piezas,dec_peso,var_Articulo,dec_PesoCobrado,dec_tarifa,dec_Total,var_Contenido FROM  tbl_pieces where int_IDawb = $awb_id "
      
      );
      

  //Ejecuto la consulta
    $listItems = array();
    while($rowList = mysqli_fetch_array($resultList)){
      $listItems[] = $rowList;
    }
  //Ejecuto la consulta
    $listItems2 = array();
    while($rowListt = mysqli_fetch_array($resultList2)){
      $listItems2[] = $rowListt;
    }

  //Cerramos la conexión
    mysqli_close($link);





class PDF extends FPDF
{
}

$pdf=new PDF('P','mm',array(808,1008));
         

$pdf->AliasNbPages();

//Primera página
$pdf->Setmargins(1,1,1); 


//numeros de guias
$pdf->setY(10);
for ($i=0; $i < 8; $i++) { 
$pdf->AddPage('P',array(808,1008));
foreach ($listItems as $list) {
$y1 = $pdf->GetY();
$x1 = $pdf->GetX();
$pdf->Image('bg.png' , $x1, $y1 , 800 , 995,'PNG');

$pdf->SetFont('Arial','B',39);
$pdf->Ln(15);
$pdf->Cell(15);
$y2 = $pdf->GetY();
$x2 = $pdf->GetX();
$pdf->Cell(30,20,substr($list[39],0,3),0,0);
$pdf->Cell(42,20,$list[42],0,0);
$pdf->Cell(450,20,substr($list[39],3),0,0);
$pdf->Cell(50,20,substr($list[39],0,3)."  ".substr($list[39],3),0,1);
$pdf->SetFont('Arial','',21);
$pdf->setXY($x2+4,$y2+13);
$margX = $pdf->GetX();
$pdf->Cell(220,20,iconv('UTF-8', 'ISO-8859-2',"Shipper's Name and Address " ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2',"Shipper's Account Number  " ),0,0);
$pdf->Cell(50,20,iconv('UTF-8', 'ISO-8859-2'," Not Negotiable " ),0,1);
$pdf->setXY($x2+393,$y2+28);
$pdf->SetFont('Arial','B',35);
$pdf->Cell(50,20,"Air Waybill ",0,1);
$pdf->setXY($x2+393,$y2+40);
$pdf->SetFont('Arial','',21);
$pdf->Cell(50,20,"issued by",0,1);
$dv2y = $pdf->GetY();
$dv2x = $pdf->GetX();
$pdf->setXY($x2+10,$y2+42);
//Remitente y Transporte
$pdf->SetFont('Arial','',35);
$pdf->Cell(450,10,utf8_decode($list[1]),0,0);
 $pdf->Cell(14,15,utf8_decode($list[8]),0,1);
 $pdf->setX($x2+10);
 $pdf->Cell(450,10,utf8_decode($list[2]),0,0);
 $pdf->Cell(14,15,$list[9],0,1);
  $pdf->setX($x2+10);
 $pdf->Cell(450,10,utf8_decode($list[3]),0,0);
 $pdf->Cell(14,15,strtoupper($list[10]),0,1);
  $pdf->setX($x2+10);
 $pdf->Cell(450,10,utf8_decode($list[43]),0,0);

 $pdf->Ln(32);
 //Destinatario

    $pdf->SetFont('Arial','',31);

 $pdf->setX($x2+10);
 $pdf->Cell(14,15,utf8_decode($list[4]),0,1);
  $pdf->setX($x2+10);
 $pdf->Cell(100,15,utf8_decode($list[5]),0,1);

  $pdf->setX($x2+10);
 $pdf->Cell(27,15,utf8_decode($list[6]),0,1);
 $pdf->setX($x2+10);
 $pdf->Cell(45,15,utf8_decode($list[7]),0,1);
$pdf->Ln(35);
$pdf->SetFont('Arial','',35);
$pdf->setX($x2+27);
//Agente 
 $pdf->Cell(27,15,utf8_decode($list[25]),0,1);
 $pdf->setX($x2+27);
 $pdf->Cell(27,15,$list[26],0,1);
 $pdf->setX($x2+27);
 $pdf->Cell(27,15,$list[27],0,1);

 //airport of departure
$pdf->Ln(39);
$pdf->setX($x2+27);
 $pdf->Cell(365,15,($list[12]),0,0);
 $pdf->Cell(130,15,($list[28]),0,0);
  $pdf->Cell(120,15,($list[29]),0,0);
   $pdf->Cell(150,15,($list[30]),0,1);
 //TO 
 $pdf->Ln(17);
 $pdf->setX($x2+27);
 $pdf->Cell(45,15,strtoupper($list[38]),0,0);
 //BY FIRST CARRIER
 $pdf->Cell(160,15,strtoupper($list[37]),0,0);
 $pdf->Cell(40,15,strtoupper($list[31]),0,0);
 $pdf->Cell(40,15,strtoupper($list[32]),0,0);
 $pdf->Cell(40,15,strtoupper($list[33]),0,0);
 $pdf->Cell(40,15,strtoupper($list[34]),0,0);
 $pdf->Cell(40,15,strtoupper($list[16]),0,0);
 $pdf->Cell(25,15,"1",0,0);
 $ppd = ""; $cod = "";  $ppdo = ""; $codo = ""; 
//variables COD
 $codCobro =""; $codToAge =""; $codToCarr =""; $codTotal ="";
 //variables prepagos
 $ppdCobro  ="" ; $ppdToAge  ="" ; $ppdToCarr  ="" ; $ppdTotal="" ;
 if(($list[15]) == 1){
  $ppd = "X";  

}else if(($list[15]) == 0) {
  $cod = "X"; 

}
 if(($list[35]) == 1){
  $ppdo = "X";  

}else if(($list[35]) == 0) {
  $codo = "X"; 

}
 $pdf->Cell(25,15,$ppd,0,0);
 $pdf->Cell(25,15,$cod,0,0);
 $pdf->Cell(28,15,$ppdo,0,0);
  $pdf->Cell(20,15,$codo,0,0);
  //declarados
 $pdf->Cell(105,15,$list[17],0,0);
 $pdf->Cell(100,15,$list[18],0,1 );
 //AIRPORT OF DESTINATION
  $pdf->Ln(16);
 $pdf->setX($x2+27);
 $pdf->Cell(150,15,strtoupper($list[13]),0,0);
 $pdf->Cell(120,15,$list[11],0,0);
 $pdf->Cell(100,15,$list[36],0,0);
 $pdf->Cell(100,15,$list[19],0,0);


$pdf->setXY($x2+4,$y2+105);
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,20,iconv('UTF-8', 'ISO-8859-2',"Consignee's Name and Address " ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2',"Consignee's Account Number " ),0,0);
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
$pdf->SetFont('Arial','',27 );
$pdf->MultiCell(320,12,utf8_decode($list[21]),0,1);
$pdf->Ln();
$pdf->setXY($x2+390,$y2+90);
$pdf->Cell(220,20,"Copies 1,2 and 3 of this Air Waybill are originals and have the same validity.
 ",0,1);
$pdf->setXY($x2+4,$y2+257);
$pdf->SetFont('Arial','',20);
$pdf->Cell(220,20,iconv('UTF-8', 'ISO-8859-2'," Agent's IATA Code " ),0,0);
$pdf->Cell(168,20,iconv('UTF-8', 'ISO-8859-2',"Account No." ),0,1);
$pdf->Ln();
$pdf->setXY($x2+27,$y2+270);

$pdf->SetFont('Arial','',35);
 $pdf->Cell(200,15,$list[14],0,0);
 $pdf->Cell(130,15,$list[20],0,1);
$pdf->SetFont('Arial','',20);

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


$pdf->setXY($x2+4,$y2+340.5);
$pdf->Cell(249,20,"Airport of Destination" ,0,0);
$pdf->Cell(132,20,iconv('UTF-8', 'ISO-8859-2',"Requested FLIGHT /Date" ),0,0);

$pdf->Cell(130,20,iconv('UTF-8', 'ISO-8859-2',"Amount of Insurance" ),0,0);
$pdf->MultiCell(550,8,iconv('UTF-8', 'ISO-8859-2',"
INSURANCE: If Carrier offers insurance and such insurance is
requested in accordance with the conditions therect, indicate amount to
be insured in figures is box marked *Amount of Insurance*" ),0,1);

$pdf->setXY($x2+4,$y2+372);
$pdf->Cell(258,20,"Handing Information" ,0,1);
$pdf->setXY($x2+27,$y2+390);

$pdf->SetFont('Arial','',30);
 $pdf->MultiCell(550,15,utf8_decode($list[22]),0,1);

$pdf->SetFont('Arial','',20);
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

$conteichon = 0 ; $ps= 0; $st =0 ;
foreach ($listItems2 as $lis) {
	$pdf->SetFont('Arial','',30);
$pdf->Cell(25);
$pdf->Cell(40,30,$lis[1],0,0);
$pdf->Cell(75,30,$lis[2],0,0);
$pdf->Cell(120,30,"Kg" ,0,0);
$pdf->Cell(100,30,$lis[4]."kg" ,0,0);
$pdf->Cell(95,30,$lis[5],0,0);
$pdf->Cell(136,30,"$".$lis[6] ,0,0);
$pdf->SetFont('Arial','',25);
$pdf->MultiCell(190,10,utf8_decode($lis[7]),0,"L");
$pdf->Ln();
$pdf->Cell(65);
$pdf->SetFont('Arial','',28);
$pdf->Cell(75,10,"",0,0);
$pdf->Cell(40,10,"" ,0,1); 
$conteichon =$lis[1]+ $conteichon  ;
$ps = $ps+ $lis[2];
$st = $st + $lis[6];
}

$pdf->setXY($x2+5,$y2+658);
$pdf->SetFont('Arial','',40);
$pdf->Cell(40,30,$conteichon ,0,0);
$pdf->Cell(80,30,$ps,0,0);
$pdf->Cell(340,30,"Kg",0,0);
$pdf->Cell(143,30,"$".$st ,0,1);

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+33,$y2+676);
$pdf->Cell(100,20,"Prepaid " ,0,0);
$pdf->Cell(110,20,"Weight Charge " ,0,0);
$pdf->Cell(76,20,"Collect " ,0,0);
$pdf->Cell(100,20,"Other Charges" ,0,1);
$pdf->Cell(15);
$pdf->SetFont('Arial','',40);
$pdf->Cell(157,8,number_format(listDat("dec_Pesocobrado", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');
$pdf->Cell(158,8,number_format(listDat("dec_cPesocobrado", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');
$pdf->MultiCell(450,8," " ,0,'L');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+113,$y2+704);
$pdf->Cell(100,20,"Valuation Charge " ,0,1);
$pdf->SetFont('Arial','',40);
$pdf->Cell(15);
$pdf->Cell(157,8,number_format(listDat("dec_CargoMinimo", "tbl_CobrosAwb","int_IDawb=".$awb_id),2) ,0,0,'C');
$pdf->Cell(158,8,number_format(listDat("dec_cCargoMinimo", "tbl_CobrosAwb","int_IDawb=".$awb_id),2) ,0,0,'C');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+148,$y2+734);
$pdf->Cell(100,20,"Tax" ,0,1);
$pdf->SetFont('Arial','',40);
$pdf->Cell(15);
$pdf->Cell(157,8,number_format(listDat("dec_tax", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');
$pdf->Cell(158,8,number_format(listDat("dec_ctax", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+97,$y2+764);
$pdf->Cell(100,20,"Total Other Charges Due Agent" ,0,1);
$pdf->SetFont('Arial','',40);
$pdf->Cell(15);
$pdf->Cell(157,20,number_format(listDat("dec_totalOtrosAge", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');
$pdf->Cell(158,8,number_format(listDat("dec_ctotalOtrosAge", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->setXY($x2+319,$y2+770);
$pdf->MultiCell(450,8,"Shipper certifies that the particulars on the face here of are correct and that insofar as any part of the consignment
contains dangeorous goods, such part is properly described by name and is in proper condition for carriage by air
according to the applicable Dangerous Goods Regulations " ,0,'L');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+97,$y2+795);
$pdf->Cell(100,20,"Total Other Charges Due Carrier" ,0,1);
$pdf->SetFont('Arial','',40);
$pdf->Cell(15);
$pdf->Cell(157,8,number_format(listDat("dec_totalOtrosTrans", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');
$pdf->Cell(158,8,number_format(listDat("dec_ctotalOtrosTrans", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');

$pdf->SetFont('Arial','',28);
$pdf->setXY($x2+32,$y2+856);
$pdf->Cell(180,20,"Total Prepaid" ,0,0);
$pdf->Cell(100,20,"Total Collect" ,0,1);
$pdf->SetFont('Arial','',40);
$pdf->Cell(15);
$pdf->Cell(157,10,number_format(listDat("(dec_total)", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');
$pdf->Cell(158,10,number_format(listDat("(tbl_ctotal)", "tbl_CobrosAwb","int_IDawb=".$awb_id),2),0,0,'C');

$pdf->SetFont('Arial','',23);
$pdf->setXY($x2+22,$y2+884);
$pdf->Cell(160,20,"Currency Conversion Rates" ,0,0);
$pdf->Cell(180,20,"CC Charges in Dest. Currency" ,0,0);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(158,20,$list[23],0,1);

$pdf->Cell(15);
//moneda USD
$pdf->Cell(157,10,strtoupper($list[16]) ,0,0,'C');
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
$pdf->Cell(180,10,substr($list[39],0,3)."  ".substr($list[39],3) ,0,1);

$pdf->setXY($x2+250,$y2+958);
switch ($i) {
  case 0:
   $pdf->Cell(180,10,"ORIGINAL 3 (FOR SHIPPER)" ,0,1);
    break;
      case 1:
   $pdf->Cell(180,10,"ORIGINAL 1 (FOR ISSUING CARRIER)" ,0,1);
    break;
      case 2:
   $pdf->Cell(180,10,"ORIGINAL 2 (FOR CONSIGNEE)" ,0,1);
    break;
      case 3:
   $pdf->Cell(180,10,"COPY 4 (DELIVERY RECEIPT)" ,0,1);
    break;
      case 4:
   $pdf->Cell(180,10,"COPY 5 (EXTRA COPY)" ,0,1);
    break;
      case 5:
   $pdf->Cell(180,10,"COPY 6 (EXTRA COPY)" ,0,1);
    break;
      case 6:
   $pdf->Cell(180,10,"COPY 7 (EXTRA COPY)" ,0,1);
    break;
      case 7:
   $pdf->Cell(180,10,"COPY 8  (FOR AGENT)" ,0,1);
    break;
 
  default:
    $pdf->Cell(180,10,"ORIGINAL 3 (FOR SHIPPER)" ,0,1);
    break;
}

$pdf->setXY($x2+550,$y2+870);
$pdf->SetFont('Arial','B',30);
//EMPRESA
$pdf->Cell(180,10," " ,0,1);
$pdf->setXY($x2+550,$y2+880);
$pdf->Cell(180,10, " ",0,1);
$pdf->setXY($x2+550,$y2+890);
$pdf->Cell(180,10," " ,0,1);
$pdf->SetFont('Arial','',25);
$pdf->setXY($x2+450,$y2+850);
$pdf->Cell(180,10,"Signature of Shipper or his Agent",0,1);
$pdf->SetFont('Arial','',30);
// other, y firma
$pdf->setXY($x2+319,$y2+690);
$pdf->MultiCell(400,10,utf8_decode($list[41]),0,"L");
$pdf->Ln();
$pdf->setXY($x2+319,$y2+800);
$pdf->MultiCell(400,10,utf8_decode($list[40]),0,"L");
$pdf->Ln();
// lineas colores
//$pdf->SetFillColor(0,255,0);
//$pdf->Rect(157.5, 456, 6, 238, 'F');
$pdf->AddPage('P',array(808,1008));
$y1 = $pdf->GetY();
$x1 = $pdf->GetX();
$pdf->Image('iat.png' , $x1, $y1 , 808 , 1008,'PNG');
$pdf->Ln(90);

}
}

//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('awb.pdf','I');

?>