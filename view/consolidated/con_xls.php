<?php
require('../../cnnbd.php');
require_once '../phpExcel/Classes/PHPExcel.php';

$Id_con = $_REQUEST['ncons'];

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
        "SELECT int_Guia,var_NombreRemit,var_TelefonoRemit,int_ciudadRemitente,var_DireccionRemit,
      var_NombreDest,var_DireccionDest,int_CiudadDestinatario,int_CodZipDest,var_TelefonoDest,var_EmailDest,decimal_PesoCobrado,int_ValorDeclaradoManual,int_ValorSeguroManual,var_DescripcionContenido,int_Servicio
      FROM  tbl_Guia  INNER JOIN tbl_EmpaquesConsolidadoU   ON tbl_Guia.int_NEmpaque = tbl_EmpaquesConsolidadoU.int_IDEmpaque    WHERE tbl_EmpaquesConsolidadoU.int_IDConsolidado  = $Id_con AND tbl_Guia.int_Activo = '1' AND tbl_EmpaquesConsolidadoU.int_Activo = 1  "
        
      );
      

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
		->setCreator("TEDnologia.com")
		->setLastModifiedBy("TEDnologia.com")
		->setTitle("Exportar Excel con PHP")
		->setSubject("Documento de prueba")
		->setDescription("Documento generado con PHPExcel")
		->setKeywords("usuarios phpexcel")
		->setCategory("reportes");



//PROPIEDADES DE LA CELDA
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C2');


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1'," Consolidado #:".$Id_con)
            
            ->setCellValue('A4', '# FACTURA')
            ->setCellValue('B4', 'Remitente')
            ->setCellValue('C4', 'rem-Telefono')
           

            ->setCellValue('D4', 'Destinatario')
            ->setCellValue('E4', 'des-Direccion')
            ->setCellValue('F4', 'des-Pais')
            ->setCellValue('G4', 'des-Estado')
            ->setCellValue('H4', 'des-Ciudad')
            ->setCellValue('I4', 'des-Telefono')
            ->setCellValue('J4', 'des-E-mail')
            ->setCellValue('K4', 'Servicio')

            ->setCellValue('L4', 'Peso')
            ->setCellValue('M4', 'Declarado')
            ->setCellValue('N4', 'Asegurado')
            ->setCellValue('O4', 'Descripcion')
            ->setCellValue('P4', '# de Aduana');
$d=5;
$weight=0;
$declr =0; 
$insured= 0;
$str = "".listDat("var_Servicio","tbl_ConsolidadoGuia"," int_ID=".$Id_con); 
$arrServ = split ("\,", $str); 
$Serv = " ";
foreach ($arrServ as $key ) { 
$Serv .= "".listDat("var_Servicio","tbl_Servicios"," int_ID=".$key); 
}

foreach ($listItems as $key ) { 
$weight= $key[11] + $weight ;
$declr =$key[12] + $declr ; 
$insured= $key[13] + $insured ;

	   $d = $d +1 ;
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".$d, $key[0]." ")
            ->setCellValue("B".$d, $key[1])
            ->setCellValue("C".$d, "'".$key[2]."'")
           

            ->setCellValue("D".$d, $key[5])
            ->setCellValue("E".$d, $key[6])
            ->setCellValue("F".$d, "".listDat("var_Pais","tbl_Ciudades_iata"," int_ID=".$key[7]) )
            ->setCellValue("G".$d, "".listDat("var_Estado","tbl_Ciudades_iata"," int_ID=".$key[7]) )
            ->setCellValue("H".$d, "".listDat("var_Ciudad","tbl_Ciudades_iata"," int_ID=".$key[7]) )
            ->setCellValue("I".$d, "'".$key[9]."'")
            ->setCellValue("J".$d, $key[10])
            ->setCellValue("K".$d, "".listDat("var_Servicio","tbl_Servicios"," int_ID=".$key[15]))

            ->setCellValue("L".$d, $key[11])
            ->setCellValue("M".$d, $key[12])
            ->setCellValue("N".$d, $key[13])
            ->setCellValue("O".$d, $key[14])
            ->setCellValue("P".$d, "9807200000");
          
}
	$objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue("L".($d+1), $weight)
            ->setCellValue("M".($d+1), $declr)
            ->setCellValue("N".($d+1), $insured);
           



$objPHPExcel->getActiveSheet()->setTitle('Usuarios');
$objPHPExcel->setActiveSheetIndex(0);


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ReporteConsolidado.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;