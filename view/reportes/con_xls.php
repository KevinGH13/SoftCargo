<?php
require('../../cnnbd.php');
require_once '../phpExcel/Classes/PHPExcel.php';
$ctry = 0 ; $agt = 0; $qr ="";$sv = "";
  if(isset($_REQUEST['sv']) ) {$sv = " AND srv.int_cod = ".$_REQUEST['sv']; }
  if(isset($_REQUEST['q']) ) {$agt = $_REQUEST['q']; }
  if (isset($_REQUEST['p']) AND isset($_REQUEST['ddf']) AND isset($_REQUEST['ddh'])) {
    $ctry = $_REQUEST['p'];
    $ddf = $_REQUEST['ddf'];
    $ddh = $_REQUEST['ddh'];
        $fecha = "$ddf AND $ddh"; }

        if($agt != 0){
          $qr = " AND G.var_Agente = $agt";
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
 $resultList = "";
if($ctry != 0){
                  $resultList = mysqli_query($link,
        "SELECT  G.int_ID,G.int_Guia,G.int_tracking,G.var_Agente,G.date_FechaEnvio,G.var_TipoPago,G.decimal_PesoCobrado,G.int_ValorDeclarado,
			G.int_ValorDeclaradoManual,G.int_ValorSeguro,G.int_ValorSeguroManual,
			G.int_CargosEmpresa,G.int_CargosAgente,G.int_Descuentos,G.int_TotalPagar,G.int_factura,G.int_CiudadDestinatario,G.int_ciudadRemitente,G.int_IDuser,G.int_CCEmpresa,G.int_CCAgente,G.int_TarEmpresa,G.int_TarAgente,G.int_SegEmpresa,G.int_SegAgente,G.int_ImpEmpresa,G.int_ImpAgente,G.int_Servicio,G.int_Pago,G.int_PayDate,ia.var_Pais,ia.int_Pais 
        FROM  tbl_Guia G   inner join tbl_Ciudades_iata ia on G.int_Activo = '1' AND (ia.int_Pais = '".$ctry."' AND G.int_CiudadDestinatario = ia.int_ID) AND 
      G.date_FechaEnvio  BETWEEN $fecha $qr inner join tbl_Servicios srv on G.int_Servicio = srv.int_ID $sv ORDER BY G.date_FechaEnvio DESC"
        
      );
         
}else{
 $resultList = mysqli_query
      ($link,
        "SELECT G.int_ID,G.int_Guia,G.int_tracking,G.var_Agente,G.date_FechaEnvio,G.var_TipoPago,G.decimal_PesoCobrado,G.int_ValorDeclarado,
			G.int_ValorDeclaradoManual,G.int_ValorSeguro,G.int_ValorSeguroManual,
			G.int_CargosEmpresa,G.int_CargosAgente,G.int_Descuentos,G.int_TotalPagar,G.int_factura,G.int_CiudadDestinatario,G.int_ciudadRemitente,G.int_IDuser,G.int_CCEmpresa,G.int_CCAgente,G.int_TarEmpresa,G.int_TarAgente,G.int_SegEmpresa,G.int_SegAgente,G.int_ImpEmpresa,G.int_ImpAgente,G.int_Servicio,G.int_Pago,G.int_PayDate,ia.var_Pais

      FROM  tbl_Guia G inner join tbl_Ciudades_iata ia on G.int_CiudadDestinatario = ia.int_ID inner join tbl_Servicios srv on  G.int_Activo = '1' AND G.date_FechaEnvio BETWEEN $fecha $qr AND G.int_Servicio = srv.int_ID  ORDER BY G.date_FechaEnvio DESC"
        
      );

  }
      

  //Ejecuto la consulta
    $listItems = array();
    while($rowList = mysqli_fetch_array($resultList)){
      $listItems[] = $rowList;
    }

  //Cerramos la conexión
    mysqli_close($link);


$objPHPExcel = new PHPExcel();


$objPHPExcel->
	getProperties()
		->setCreator("EasyCargopro.com")
		->setLastModifiedBy("EasyCargopro.com")
		->setTitle("Exportar Reporte a Excel")
		->setSubject("Documento")
		->setDescription("Documento informacion de facturas")
		->setKeywords("usuarios excel")
		->setCategory("reportes");



//PROPIEDADES DE LA CELDA
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);



// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C2');


$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Numero de guia')
            ->setCellValue('B1', 'Numero Alterno')
            ->setCellValue('C1', 'Agente')
            ->setCellValue('D1', 'fecha Creacion')
            ->setCellValue('E1', 'Peso')
            ->setCellValue('F1', 'Asegurado')
            ->setCellValue('G1', 'Declarado')
            ->setCellValue('H1', 'Cobrados')
            ->setCellValue('I1', 'Pais');
 
$d=1;
foreach ($listItems as $key ) { 
  $respu = "NO";
  if($key[28] == 1){ $respu = "SI";}else{ $respu = "NO";}
	   $d = $d +1 ;
	$objPHPExcel->setActiveSheetIndex(0)
		
            ->setCellValue("A".$d, " ".$key[1]." ")
            ->setCellValue("B".$d, $key[2])
           

            ->setCellValue("C".$d, listDat("var_Agente","tbl_Agentes"," int_ID=".$key[3]))
            ->setCellValue("D".$d, $key[4])
            ->setCellValue("E".$d, $key[6])
            ->setCellValue("F".$d, $key[23] )
            ->setCellValue("G".$d, $key[25] )
            ->setCellValue("H".$d, $respu)
            ->setCellValue("I".$d, $key[30] );

          
}
	$dn = $d+1;
  $objPHPExcel->setActiveSheetIndex(0)
     
            ->setCellValue("A".$dn, "")
            ->setCellValue("B".$dn, "")
           

            ->setCellValue("C".$dn, "")
            ->setCellValue("D".$dn, "TOTAL:")
            ->setCellValue("E".$dn, listDat("sum(decimal_PesoCobrado)","tbl_Guia G"," G.int_Activo = '1' AND G.date_FechaEnvio BETWEEN $fecha $qr "))
            ->setCellValue("F".$dn, listDat("sum(int_SegEmpresa)","tbl_Guia G"," G.int_Activo = '1' AND G.date_FechaEnvio BETWEEN $fecha $qr ") )
            ->setCellValue("G".$dn, listDat("sum(int_ImpEmpresa)","tbl_Guia G"," G.int_Activo = '1' AND G.date_FechaEnvio BETWEEN $fecha $qr ") )
            ->setCellValue("H".$dn, "")
            ->setCellValue("I".$dn, "");

           
           



$objPHPExcel->getActiveSheet()->setTitle('Usuarios');
$objPHPExcel->setActiveSheetIndex(0);


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;