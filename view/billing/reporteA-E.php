<?php   
require('../../cnnbd.php');
require('../fpdf/fpdf.php');


  if (isset($_REQUEST['age']) AND isset($_REQUEST['ddf']) AND isset($_REQUEST['ddh'])) {
    $intID = [];
    $ddf = $_REQUEST['ddf'];
    $ddh = $_REQUEST['ddh'];
        $fecha = "$ddf AND $ddh";
    if($_REQUEST['age'] == 0){
    	$as = listAgent("int_ID","tbl_Agentes","where int_Activo = '1' and int_TipoAgente = 1  "); 
    	$allAgentData = listAgent2("int_ID, var_Agente ","tbl_Agentes","where int_Activo = '1' and int_TipoAgente = 1  "); 
    	$cambie = implode(",",$as);
    }else{
      $as = [$_REQUEST['age']];
    	$allAgentData = listAgent2("int_ID, var_Agente ","tbl_Agentes","where int_Activo = '1' and int_TipoAgente = 1  and int_ID = ".$_REQUEST['age']); 
      $cambie = implode(",",$as);
    }


  }else{
		echo "<script language='javascript'>  window.location.href = 'http://globoenvios.easycargopro.com' ;</script>"; 
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

function listAgent($fields, $table, $conditions=null){

  //Abrimos la conexión
    $link=Conectarse();

  //Preparo la consulta para listar datos
    $resultList = mysqli_query
      ($link,
        "SELECT ". $fields
        ." FROM ". $table
        ." ". $conditions
      );

  //Ejecuto la consulta
    $listItems = array();
    while($rowList = mysqli_fetch_array($resultList)){
      $listItems[] = $rowList[0];
    }

  //Cerramos la conexión
    mysqli_close($link);

    return $listItems;
}
function listAgent2($fields, $table, $conditions=null){

  //Abrimos la conexión
    $link=Conectarse();

  //Preparo la consulta para listar datos
    $resultList = mysqli_query
      ($link,
        "SELECT ". $fields
        ." FROM ". $table
        ." ". $conditions
      );

  //Ejecuto la consulta
    $listItems = array();
    while($rowList = mysqli_fetch_array($resultList)){
      $listItems[] = $rowList;
    }

  //Cerramos la conexión
    mysqli_close($link);

    return $listItems;
}
  //Abrimos la conexión
  $link=Conectarse();
    $resultList = mysqli_query
      ($link,
        "SELECT int_Guia,var_TipoPago,decimal_PesoCobrado,int_ValorSeguroManual,int_ValorDeclaradoManual,int_factura,
      int_TarEmpresa,int_TarAgente,int_SegEmpresa,int_SegAgente,
      int_ImpEmpresa,int_ImpAgente,int_CargosEmpresa,int_CargosAgente,
      int_CCEmpresa,int_CCAgente,int_CiudadDestinatario, int_Descuentos,int_TotalPagar,date_FechaEnvio, var_Agente FROM tbl_Guia WHERE int_Activo = '1'  AND date_FechaEnvio BETWEEN $fecha AND var_Agente IN ($cambie) "
      
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


 function tablareporte(){



 $this->Ln(20);
 $this->Cell(370.5);
 $this->Cell(80,15,"FLETE",1,0,'C');
 $this->Cell(80,15,"SEGURO",1,0,'C');
 $this->Cell(80,15,"IMPUESTO",1,0,'C');
 $this->Cell(90,15,"COBROS ADICIONALES",1,0,'C');
$this->Ln();

 $this->Cell(14,15,"#E",1,0,'C');
 $this->Cell(100,15,"#FACTURA",1,0,'C');
 $this->Cell(45,15,"FECHA",1,0,'C');
 $this->Cell(40,15,"PAIS",1,0,'C');
 
 $this->Cell(40,15,"PESO",1,0,'C');
 $this->Cell(40,15,"FLETE",1,0,'C');
 $this->Cell(40,15,"SEGURO",1,0,'C');
 $this->Cell(52,15,"DECLARADO",1,0,'C');

 $this->Cell(40,15,"EMPRESA",1,0,'C');
 $this->Cell(40,15,"AGENTE",1,0,'C');
 $this->Cell(40,15,"EMPRESA",1,0,'C');
 $this->Cell(40,15,"AGENTE",1,0,'C');
 $this->Cell(40,15,"EMPRESA",1,0,'C');
 $this->Cell(40,15,"AGENTE",1,0,'C');
 $this->Cell(44.5,15,"V AD EMP",1,0,'C');
 $this->Cell(44.5,15,"V AD AGE",1,0,'C');
 $this->Cell(40,15,"CC EMP",1,0,'C');
 $this->Cell(40,15,"CC AGE",1,0,'C');
  $this->Cell(80,15,"DESCUENTOS",1,0,'C');
 $this->Cell(52,15,"BALANCE",1,0,'C');


 $this->Ln();
$this->SetFont('Arial','',22);

 }
}




$pdf=new PDF('L','mm',array(808,1008));
         

$pdf->AliasNbPages();

//Primera página
//$pdf->Setmargins(10,10,10); 

$pdf->AddPage('L',array(808,1008));
foreach ($allAgentData as $list) {
 $pdf->Cell(40,10,strtoupper($list[1]),0,1);
}


$ccTotalEmp=0; $ccTotalAge=0;

foreach ($listItems as $list) {
$ccTotalEmp = ($list[14]*$list[2])+ $ccTotalEmp;
$ccTotalAge = ($list[15]*$list[2])+ $ccTotalAge;
}
 $pdf->Cell(40,10,"REPORTE DE LIQUIDACION",0,1);
 $date = new DateTime(substr($ddf,1,10));
 $date2 = new DateTime(substr($ddh,1,10));
 $pdf->Cell(40,10,"fecha Desde: ".$date->format('m/d/Y')." Fecha Hasta: ".$date2->format('m/d/Y'),0,1);
 $pdf->Ln(10);
 $TaxEmp = 0;
 $segEmp = 0;
 $flEmp = 0;
 $ccEmp = 0;
 $ademp = 0;
 $TarAge = 0;
 $SegAge = 0;
 $ImpAge = 0;
 $adAge = 0;
 $ccAge = 0;
 $pesoCobr= 0;
 $totalConta = 0;
 foreach ($allAgentData as $list) {
//empresa
$TaxEmp = $TaxEmp + listDat("sum(int_ImpEmpresa)","tbl_Guia","  var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$segEmp = $segEmp + listDat("sum(int_SegEmpresa)","tbl_Guia","  var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$flEmp = $flEmp + listDat("sum(int_TarEmpresa)","tbl_Guia","  var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$ccEmp = $ccEmp + listDat("sum(int_CCEmpresa)","tbl_Guia","  var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$ademp = $ademp + listDat("sum(int_CargosEmpresa)","tbl_Guia"," var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
//AGentes
$TarAge = $TarAge + listDat("sum(int_TarAgente)","tbl_Guia"," var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$SegAge = $SegAge + listDat("sum(int_SegAgente)","tbl_Guia"," var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$ImpAge = $ImpAge + listDat("sum(int_ImpAgente)","tbl_Guia"," var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$adAge = $adAge + listDat("sum(int_CargosAgente)","tbl_Guia","  var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$ccAge = $ccAge + listDat("sum(int_CCAgente)","tbl_Guia","  var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$Descuento = $Descuento + listDat("sum(int_Descuentos)","tbl_Guia","  var_Agente =".$list." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");


$pesoCobr = $pesoCobr + listDat("sum(decimal_PesoCobrado)","tbl_Guia"," var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
$totalConta = $totalConta + listDat("COUNT(decimal_PesoCobrado)","tbl_Guia","var_Agente =".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
}

$pdf->Cell(40,10,"FLETE: $".number_format($flEmp,2,",","."),0,1);
$pdf->Cell(40,10,"IMPUESTO: $".number_format($TaxEmp,2,",","."),0,1);
$pdf->Cell(40,10,"SEGURO : $".number_format($segEmp,2,",","."),0,1);
$pdf->Cell(40,10,"Convenio de carga Emp : $".number_format($ccTotalEmp,2,",","."),0,1);
$pdf->Cell(40,10,"VAL ADICIONALES: $".number_format($ademp,2,",","."),0,1);

$pdf->Cell(40,10,"Total Peso: ".number_format($pesoCobr,2,",","."),0,1);
$pdf->Cell(40,10,"Total Unidades: ".$totalConta,0,1);

$pdf->Cell(40,10,"comision Agente : $".number_format(($TarAge + $SegAge + $ImpAge+ $ccTotalAge+$adAge-$Descuento),2,",","."),0,1);
$pdf->Cell(200);
$pdf->SetFont('Arial','B',30);

$pdf->Cell(40,10,"Pago A ".listDat("var_Empresa","tbl_Empresa"," int_ID=1" )." : $".number_format(($flEmp + $segEmp + $TaxEmp+ $ccTotalEmp+$ademp),2,",","."),0,1);
$pdf->SetFont('Arial','',22);
//titulo de columnas
$pdf->tablareporte();

//los reportes
$conta = 1 ; 
foreach ($listItems as $list) {
	$pdf->Cell(14,12,$conta,1,0,'C');
$pdf->Cell(100,12,$list[0],1,0,'C');
 $date3 = new DateTime(substr($list[19],0,10));
$pdf->Cell(45,12,$date3->format('m/d/Y'),1,0,'C');
$pdf->Cell(40,12,substr(listDat("var_Pais","tbl_Ciudades_iata"," int_ID=".$list[16]), 0, 3),1,0,'C');

$pdf->Cell(40,12,$list[2],1,0,'C');
$pdf->Cell(40,12,"$".$list[5],1,0,'C');
$pdf->Cell(40,12,"$".$list[3],1,0,'C');
$pdf->Cell(52,12,"$".$list[4],1,0,'C');
$pdf->Cell(40,12,"$".number_format($list[6],2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($list[7],2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($list[8],2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($list[9],2),1,0,'C');

$pdf->Cell(40,12,"$".number_format($list[10],2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($list[11],2),1,0,'C');
$pdf->Cell(44.5,12,"$".number_format($list[12],2),1,0,'C');
$pdf->Cell(44.5,12,"$".number_format($list[13],2),1,0,'C');
$pdf->Cell(40,12,"$".number_format(($list[14]*$list[2]),2),1,0,'C');
$pdf->Cell(40,12,"$".number_format(($list[15]*$list[2]),2),1,0,'C');
$pdf->Cell(80,12,"$".number_format($list[17],2),1,0,'C');
$pdf->Cell(52,12,"$".number_format($list[18],2),1,0,'C');

$pdf->Ln();

$conta = $conta + 1 ;
}
$pdf->Ln(10);
$pdf->Cell(199,12,"TOTAL",1,0,'C');

$pdf->Cell(40,12,"".number_format($pesoCobr,2),1,0,'C');
$totalFlete = 0;
$totalSeguro = 0;
$totalDeclarado = 0;
$totalBalance = 0;
 foreach ($allAgentData as $list) {
  $totalFlete = $totalFlete + listDat("sum(int_factura)","tbl_Guia"," var_Agente=".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha") ;
  $totalSeguro = $totalSeguro + listDat("sum(int_ValorSeguroManual)","tbl_Guia","var_Agente=".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
  $totalDeclarado =  $totalDeclarado + listDat("sum(int_ValorDeclaradoManual)","tbl_Guia"," var_Agente=".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
  $totalBalance = $totalBalance + listDat("sum(int_TotalPagar)","tbl_Guia","  var_Agente=".$list[0]." AND int_Activo = '1' AND date_FechaEnvio BETWEEN $fecha");
}

$pdf->Cell(40,12,"$".number_format($totalFlete,2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($totalSeguro,2),1,0,'C');
$pdf->Cell(52,12,"$".number_format($totalDeclarado,2),1,0,'C');

$pdf->Cell(40,12,"$".number_format($flEmp,2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($TarAge,2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($segEmp,2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($SegAge,2) ,1,0,'C');
$pdf->Cell(40,12,"$".number_format($TaxEmp,2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($ImpAge, 2)  ,1,0,'C');
$pdf->Cell(44.5,12,"$".number_format($ademp, 2),1,0,'C');
$pdf->Cell(44.5,12,"$".number_format($adAge, 2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($ccTotalEmp,2),1,0,'C');
$pdf->Cell(40,12,"$".number_format($ccTotalAge,2),1,0,'C');
$pdf->Cell(80,12,"$".number_format($Descuento,2),1,0,'C');
$pdf->Cell(52,12,"$".number_format($totalBalance,2),1,1,'C');



//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('termico.pdf','I');

?>