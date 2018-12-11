<?php
  require_once 'Classes/PHPExcel.php';
  
   $objPHPExcel = new PHPExcel();
    
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("ingenieroweb.com.co")
        ->setLastModifiedBy("ingenieroweb.com.co")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Ejemplo 1")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("ingenieroweb.com.co  con  phpexcel")
        ->setCategory("ciudades");    
 
 $objPHPExcel->setActiveSheetIndex(0)

  			->setCellValue('A1', 'Hello')
  			->setCellValue('A2', 'gola')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');
            
            

$objPHPExcel->getActiveSheet()->setTitle('HArlen');
   

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ejemplo1.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');

?>