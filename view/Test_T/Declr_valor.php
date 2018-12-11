<?php   
require('fpdf/fpdf.php');

	
class PDF extends FPDF
{
	function Header(){
		
		$this->SetFont('Arial','B',50);
		$this->Cell(0,30,"COMMERCIAL INVOICE",0,1,'C');
		$this->SetFont('Arial','B',30);
		$this->Cell(0,22,"COMMERCIAL VALUE/ DECLARACION DE VALORES",0,0,'C');
		$this->Ln();
	}


 function TablaSimple(){
 	$this->SetFont('Arial','',25);
 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Shipment Date / Fecha de envio: 9/30/2015 1:51:14 PM"),0);
 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"INVOICE No./HAWB: ARM0074100096"),0,1);

 $this->Cell(400,15, iconv('UTF-8', 'ISO-8859-2',"Remt./Sender: JENNY KATERINE CUELLAR  :"),0);
 $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-2',"Recip/Dest: LUISA FERNANDA CUELLAR PELAEZ"),0,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Add/direcc.: 64 PARK AVE "),0);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Add/direcc: MNZ O #16 BARRIO BEITICINCO DE MAYO"),0,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"City/Ciudad: DOVER "),0);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"City/Ciudad: ARMENIA"),0,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Country/Pais: DOVER ­ 07801 "),0);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Country/Pais: COLOMBIA"),0,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Phone/Telf: 9735456097 "),0);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Phone/Telf: 3217196551"),0,1);
 
 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Depart/Ori gen: NEW JERSEY "),0);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Arriv/Destino: ARMENIA ­ QUINDIO ­"),0,1);

 $this->SetFont('Arial','B',25);
 $this->Cell(600,20,iconv('UTF-8', 'ISO-8859-2',"DESCRIPTION/ DESCRIPCION"),0,0,'C');
 $this->Cell(0,20, iconv('UTF-8', 'ISO-8859-2',"TOTAL VALUE/VALOR TOTAL"),0,1,'C');
 $this->SetFont('Arial','',25);
 $this->Cell(600,30,iconv('UTF-8', 'ISO-8859-2',"ROPA USADA ACOLCHADA USADOS ZAPATOS"),0);
 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"$20.00"),0,1,'R');

 $this->Cell(520,40,iconv('UTF-8', 'ISO-8859-2',""),0);
 $this->SetFont('Arial','B',25);
 $this->Cell(80,30,iconv('UTF-8', 'ISO-8859-2',"TOTAL USD FOB"),0);
$this->SetFont('Arial','',25);



 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"$20.00"),0,1,'R');
$this->Multicell(0,10,iconv('UTF-8', 'ISO-8859-2','DECLARATION  OF  COMMERCIAL  VALUE  REPLACES  THE  ORIGINAL  INVOICE.

DECLARO QUE LO EXPUESTO EN ESTE  DOCUMENTO ES VERDADERO  Y  QUE NO ESTOY ENVIANDO DINERO, EXPLOSIVOS, DROGAS, ARMAS, QUIMICOS PELIGROSOS, 
JOYAS NI  MERCANCIA CON FINES COMERCIALES. DE IGUAL FORMA DECLARO  QUE NO ENVIO MAS DE 6 ARTICULOS DE LA MISMA CLASE Y QUE EL CONTENIDO DEL 
ENVIO ESTA DECLARADO EN  SU TOTALIDAD, SEGUN EL ART. 2 Y 3  DE LA RESOLUCION 994 DEL 04/ 02/ 2011 EN CONCORDANCI A CON EL ART. 123 Y SIGUIENTES DEL DECRETO  2685/ 99.
THIS INVOICE IS ONLY FOR CUSTOMS USE BETWEEN UNITED STATES AND COUNTRY  OF DESTINATION.  THIS INVOICE IS NOT FOR TRADE. THE SHIPPER DECLARES ALL THE
INFORMATI ON IS TRUE AND CORRECT. THESE COMMODITIES, TECHNOLOGY OR SOFTWARE WERE EXPORTED FROM THE UNITED STATES IN ACCORDANCE WITH THE EXPORT ADMI NI STRATI ON  REGULATIONS. DI VERSION CONTRARY TO U.S LAWW  IS  PROHIBITED.'),0,1);
$this->Ln();
$this->Cell(100);
 $this->Cell(200,30,iconv('UTF-8', 'ISO-8859-2',"SIGNATURE / FIRMA "),0,0,'C');
 $this->Cell(200,30,iconv('UTF-8', 'ISO-8859-2'," ID # /No. IDENTICACION"),0,0,'C');
 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"DATE / FECHA"),1,1,'C');


 }
 function setRects(){
 	//margen
 	$this->Rect(9.5,10, 789 , 390);
 	$this->Rect(10,10, 788 , 28);
 	$this->Rect(10,38, 788 , 24);
 	
 	//asda
 	$this->Rect(410,62, 388 , 30);
 	//lineas chiquisi
 	$this->Rect(10,62, 400 , 15);
 	$c=92;
	$c1=92;
 	for ($i=0; $i < 6; $i++) { 
 		$this->Rect(10,$c, 400 , 15);
 		$c=15+$c;
 	}
 		for ($i=0; $i < 6; $i++) { 
 		$this->Rect(410,$c1, 388 , 15);
 		$c1=15+$c1;
 	}
 	//total
 	$this->Rect(10,183, 600 , 18);
 	$this->Rect(610,183, 188 , 18);
 	$this->Rect(10,200, 600 , 32);
 	$this->Rect(610,200, 188 , 32);
 	$this->Rect(10,232, 600 , 28);
 	$this->Rect(610,232, 188 , 28);
 	$this->Rect(10,260, 788 , 105);
 	$this->Rect(10,365, 788 , 35);

 	
 }
}











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