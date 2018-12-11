<?php   
require('../../cnnbd.php');
require('.../fpdf/fpdf.php');


  if (isset($_REQUEST['user']) AND isset($_REQUEST['ddf']) AND isset($_REQUEST['ddh']) AND isset($_REQUEST['peso'])) {
    $intID = $_REQUEST['user'];
    $ddf = $_REQUEST['peso'];
    $ddf = $_REQUEST['ddf'];
    $ddh = $_REQUEST['ddh'];
        $fecha = "$ddf AND $ddh ";



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
        "SELECT int_Guia,int_peso,int_Ciudad,var_fecha,int_Activo,int_Usuario FROM tbl_IngresoBodega WHERE   int_Usuario=$intID AND date_FechaEnvio BETWEEN $fecha "
      
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
		//global $title;
		$this->SetFont('Arial','B',22);
		//$this->Cell(2,10,$title,0,0);
	}


 function tablareporte($ddf,$ddh){



 $this->Cell(40,10,"REPORTE DE CARGA DE BODEGAS",0,1);
  $this->Cell(40,10,strtoupper ("usuario"),0,1);
 $date = new DateTime(substr($ddf,1,10));
 $date2 = new DateTime(substr($ddh,1,10));
 $this->Cell(40,10,"fecha Desde: ".$date->format('m/d/Y')." Fecha Hasta: ".$date2->format('m/d/Y'),0,1);
 $this->Ln(10);

$this->Cell(40,10,"Total Peso: ",0,1);


$this->Ln();

 $this->Cell(14,15,"#E",1,0,'C');
 $this->Cell(100,15,"#Factura",1,0,'C');
 $this->Cell(45,15,"Destinatario",1,0,'C');
 $this->Cell(40,15,"Peso ",1,0,'C');
 $this->Cell(40,15,"Peso ",1,0,'C');
 $this->Cell(40,15,"Peso ",1,0,'C');

 $this->Ln();
$this->SetFont('Arial','',22);
$conta = 1 ;
foreach ($listItems as $list) {

$pdf->Cell(14,12,$conta,1,0,'C');
 $this->Cell(100,15,$list[0],1,0,'C');
 $this->Cell(45,15,listDat("var_NombreDest","tbl_Guia","int_Guia=".$list[0]),1,0,'C');
 $this->Cell(40,15,$list[1],1,0,'C');
 $this->Cell(40,15,"Peso #2",1,0,'C');
 $this->Cell(40,15,"Peso #3",1,0,'C');

$conta = $conta + 1 ;
}
 

 }
}










$pdf=new PDF('P','mm',array(808,1008));
         

$pdf->AliasNbPages();

//Primera página
//$pdf->Setmargins(10,10,10); 

$pdf->AddPage('P',array(808,1008));
$pdf->tablareporte($ddf,$ddh);



//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('reporte.pdf','I');

?>