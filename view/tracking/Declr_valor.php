<?php   
require('../../cnnbd.php');
require('../fpdf/fpdf.php');


  if (isset($_REQUEST['nfactura'])) {
    $vrcNFac = $_REQUEST['nfactura'];
  }else{

  }
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
        "SELECT int_Guia,var_NombreRemit,var_DireccionRemit,int_ciudadRemitente,int_CodZipRemit,var_TelefonoRemit,var_EmailRemit,
      var_NombreDest,var_DireccionDest,int_CiudadDestinatario,int_CodZipDest,var_TelefonoDest,var_EmailDest,
      
      int_ValorDeclarado,int_ValorDeclaradoManual,var_DescripcionContenido,int_Activo,var_Agente,date_FechaEnvio,var_CiudadRemit, var_EstadoRemit FROM  tbl_Guia WHERE int_Activo = '1' AND int_Guia=$vrcNFac "
      
      );
      

	//Ejecuto la consulta
		$listItems = array();
		while($rowList = mysqli_fetch_array($resultList)){
			$listItems[] = $rowList;
		}

	//Cerramos la conexión
		mysqli_close($link);


	


class PDF extends FPDF
{		
	function Header(){
	
	
		
	}
	

	

 function TablaSimple($listItems){

		$this->SetFont('Arial','B',50);
 		$this->Cell(0,30,"COMMERCIAL INVOICE",1,1,'C');
		$this->SetFont('Arial','B',30);
		$this->Cell(0,22,"COMMERCIAL VALUE/ DECLARACION DE VALOR",1,0,'C');
		$this->Ln();
 	foreach ($listItems as $key ) {
 	$this->SetFont('Arial','',25); $date = new DateTime($key[18]);
 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Shipment Date / Fecha de envio: ".$date->format('m/d/Y H:i:s')),1);
 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"INVOICE No./HAWB: ".$key[0]),0,1);


 
 $this->Cell(400,15, iconv('UTF-8', 'ISO-8859-2',"Remt./Sender: ".$key[1]),1);

 $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-2',"Recip/Dest: ".$key[7]),1,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Add/direcc.: ".$key[2]),1);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Add/direcc: ".$key[8]),1,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"City/Ciudad: ".$key[19]),1);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"City/Ciudad: ".listDat("var_Ciudad","tbl_Ciudades_iata","int_ID=".$key[9])),1,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Country/Pais: ".listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$key[3])),1);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Country/Pais: ".listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$key[9])),1,1);

 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Phone/Telf: ".$key[5]),1);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Phone/Telf: ".$key[11]),1,1);
 
 $this->Cell(400,15,iconv('UTF-8', 'ISO-8859-2',"Depart/Ori gen: ".$key[20]),1);
 $this->Cell(0,15, iconv('UTF-8', 'ISO-8859-2',"Arriv/Destino: ".listDat("var_Estado","tbl_Ciudades_iata","int_ID=".$key[9])),1,1);

 $this->SetFont('Arial','B',25);
 $this->Cell(600,20,iconv('UTF-8', 'ISO-8859-2',"DESCRIPTION/ DESCRIPCION"),1,0,'C');
 $this->Cell(0,20, iconv('UTF-8', 'ISO-8859-2',"TOTAL VALUE/VALOR TOTAL"),1,1,'C');
 $this->SetFont('Arial','',25);
 $this->Cell(600,30,iconv('UTF-8', 'ISO-8859-2',$key[15]),1);
 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"$".$key[14]),1,1,'R');

 $this->Cell(520,30,iconv('UTF-8', 'ISO-8859-2',""),1);
 $this->SetFont('Arial','B',25);
 $this->Cell(80,30,iconv('UTF-8', 'ISO-8859-2',"TOTAL USD FOB"),1);
$this->SetFont('Arial','',25);



 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"$".$key[14]),1,1,'R');
$this->Multicell(0,10,iconv('UTF-8', 'ISO-8859-2','DECLARATION  OF  COMMERCIAL  VALUE  REPLACES  THE  ORIGINAL  INVOICE.

DECLARO QUE LO EXPUESTO EN ESTE  DOCUMENTO ES VERDADERO  Y  QUE NO ESTOY ENVIANDO DINERO, EXPLOSIVOS, DROGAS, ARMAS, QUIMICOS PELIGROSOS, 
JOYAS NI  MERCANCIA CON FINES COMERCIALES. DE IGUAL FORMA DECLARO  QUE NO ENVIO MAS DE 6 ARTICULOS DE LA MISMA CLASE Y QUE EL CONTENIDO DEL 
ENVIO ESTA DECLARADO EN  SU TOTALIDAD, SEGUN EL ART. 2 Y 3  DE LA RESOLUCION 994 DEL 04/ 02/ 2011 EN CONCORDANCI A CON EL ART. 123 Y SIGUIENTES DEL DECRETO  2685/ 99.
THIS INVOICE IS ONLY FOR CUSTOMS USE BETWEEN UNITED STATES AND COUNTRY OF DESTINATION.  THIS INVOICE IS NOT FOR TRADE. THE SHIPPER DECLARES ALL THE
INFORMATI ON IS TRUE AND CORRECT. THESE COMMODITIES, TECHNOLOGY OR SOFTWARE WERE EXPORTED FROM THE UNITED STATES IN ACCORDANCE WITH THE EXPORT ADMINISTRATION REGULATIONS. DI VERSION CONTRARY TO U.S LAWW  IS  PROHIBITED.'),1,1);
$this->Ln();
$this->Cell(100);
 $this->Cell(200,30,iconv('UTF-8', 'ISO-8859-2',"SIGNATURE / FIRMA "),0,0,'C');
 $this->Cell(200,30,iconv('UTF-8', 'ISO-8859-2'," ID # /No. IDENTICACION"),0,0,'C');
 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"DATE / FECHA"),0,1,'C');

}
 }
 function setRects(){

 	foreach ($listItems as $key) {
 		 $this->SetFont('Arial','B',20);
 		$this->SetXY(350,820);
 		 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',$key[13]),0,1,'R');
 		$this->SetXY(350,840);
 		  $this->SetFont('Arial','B',25);
 		 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"MDE"),0,1,'R');
 	}
 	//margen
 	$this->Rect(9.5,10, 789 , 390);
 	$this->Rect(9.5,482, 789 , 390);
 	/*$this->Rect(10,10, 788 , 28);
 	$this->Rect(10,38, 788 , 24);
 	
 	//asda
 	*/$this->Rect(410,62, 388 , 30);
 	$this->Rect(410,534, 388 , 30);

 	/*
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
		*/
 	
 }
 /*function iata($listItems)
 {
 		foreach ($listItems as $key) {
 		 $this->SetFont('Arial','B',20);
 		$this->SetXY(100,820);
 		 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',$key[13]),0,1,'R');
 		$this->SetXY(100,840);
 		  $this->SetFont('Arial','B',25);
 		 $this->Cell(0,30, iconv('UTF-8', 'ISO-8859-2',"MDE"),0,1,'R');
 	}
 }*/
}



$pdf=new PDF('P','mm',array(808,1008));
    

$pdf->AliasNbPages();

//Primera página
//$pdf->Setmargins(10,10,10); 

$pdf->Setmargins(10,10,10); 
$pdf->AddPage('P',array(808,1008));

//$pdf->AddPage();


$pdf->TablaSimple($listItems );

$pdf->Ln(80);
$pdf->TablaSimple($listItems );
$pdf->Ln(40);
//$pdf->iata($listItems);
$pdf->setRects();

//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('dclr_valor.pdf','I');










?>