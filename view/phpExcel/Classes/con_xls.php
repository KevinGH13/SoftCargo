<?php

require_once 'PHPExcel.php';

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
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
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

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C2');


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Consolidado #:111000            	Empresa :')
            
            ->setCellValue('A4', '# FACTURA')
            ->setCellValue('B4', 'Remitente')
            ->setCellValue('C4', 'rem-Direccion')
           

            ->setCellValue('D4', 'Destinatario')
            ->setCellValue('E4', 'des-Direccion')
            ->setCellValue('F4', 'des-Pais')
            ->setCellValue('G4', 'des-Estado')
            ->setCellValue('H4', 'des-Ciudad')
            ->setCellValue('I4', 'des-Telefono')
            ->setCellValue('J4', 'des-ZipCode')
            ->setCellValue('K4', 'des-E-mail')

            ->setCellValue('L4', 'Peso')
            ->setCellValue('M4', 'Declarado')
            ->setCellValue('N4', 'Asegurado');
$d=5;
for ($i=0; $i  < 3; $i++) { 
	   $d = $d +1 ;
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".$d,"a")
            ->setCellValue("B".$d,"a")
            ->setCellValue("C".$d,"a")
           

            ->setCellValue("D".$d,"a")
            ->setCellValue("E".$d,"a")
            ->setCellValue("F".$d,"a")
            ->setCellValue("G".$d,"a")
            ->setCellValue("H".$d,"a")
            ->setCellValue("I".$d,"a")
            ->setCellValue("J".$d,"a")
            ->setCellValue("K".$d,"a")

            ->setCellValue("L".$d,"a")
            ->setCellValue("M".$d,"a")
            ->setCellValue("N".$d,"a");
          
}
	

           



$objPHPExcel->getActiveSheet()->setTitle('Usuarios');
$objPHPExcel->setActiveSheetIndex(0);


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;