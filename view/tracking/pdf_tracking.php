<?php 
require('../../cnnbd.php');
require('../fpdf/fpdf.php');
require('phpbarcode/php-barcode.php');


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
      var_TipoPago,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,decimal_PesoCobrado, 
      int_ValorDeclarado,int_ValorDeclaradoManual,int_ValorSeguro,int_ValorSeguroManual,int_CargosEmpresa,int_CargosAgente,int_Descuentos,int_TotalPagar,var_DescripcionContenido,int_Activo,var_Agente,int_factura,date_FechaEnvio,int_Servicio,int_CCEmpresa,int_CCAgente,int_IDuser FROM  tbl_Guia WHERE int_Activo = '1' AND int_Guia=$vrcNFac "
      
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
//Cabecera de página


   function Header()
   {
 
   
   
      
   }  
  function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle+=90+$txt_angle;
        $txt_angle*=M_PI/180;
        $font_angle*=M_PI/180;
    
        $txt_dx=cos($txt_angle);
        $txt_dy=sin($txt_angle);
        $font_dx=cos($font_angle);
        $font_dy=sin($font_angle);
    
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if ($this->ColorFlag)
            $s='q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }
  
   //Tabla simple
function TablaSimple($header,$listItems){

    $this->SetFont('Arial','',10);
    //agente
      foreach ($listItems as $key) {

      $this->Cell(300,10,listDat("var_Agente","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[29]),0);
      //Codigo y numero
      $this->ln();
      
      $this->Cell(650,10,utf8_decode(listDat("var_Direccion","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[29])." - ".listDat("var_Ciudad","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[29])),0);
      $this->SetFont('Arial','B',16);
      $this->Cell(50,8,'Unidades 1/1',0,'C');
      $this->SetFont('Arial','',10);
      $this->Ln();
      $this->Cell(50,10,"TELEFONO".listDat("var_Telefono","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[29]),0);
      $this->ln();
      $date = new DateTime($key[31]);
 
      $this->Cell(50,10,$date->format('m/d/Y H:i:s'),0);
    }
    //Movernos a la derecha
    //Cabecera
   // $this->Cell(100,5,'',1);
        $this->Ln();
        $this->SetFont('Arial','B',10);
    $this->SetFillColor(166, 166, 166);
    $b= 0 ;
    foreach($header as $col){
    if($b == 0 ){
    $this->Cell(300,11,$col, 1, 0, 'L', True);
    $b = 1;
    }
    else{
       $this->Cell(0,11,$col, 1, 0, 'L', True);
    $b = 0;
    }
   }
   foreach ($listItems as $key) {

    $this->Ln();
      $this->Cell(300,10,$key[1],0);
      $this->Cell(300,10,$key[7],0);
      $this->Ln();
       $this->SetFont('Arial','',10);
      $this->Cell(300,10,utf8_decode($key[2]),0);
      $this->Cell(300,10,utf8_decode($key[8]),0);
      $this->Ln();
      $this->Cell(300,10,iconv('UTF-8', 'ISO-8859-2',listDat("var_CiudadRemit","tbl_Guia","int_Guia=".$key[0])."-".listDat("var_EstadoRemit","tbl_Guia","int_Guia=".$key[0])."-".$key[4]),0);
      $this->Cell(200,10,"Tel:".$key[11]." / ".$key[10],0);
      $this->Ln();
     $this->Cell(300,10,$key[5],0);
      $this->Cell(200,10,iconv('UTF-8', 'ISO-8859-2',listDat("var_Ciudad","tbl_Ciudades_iata","int_ID=".$key[9])."-".listDat("var_Estado","tbl_Ciudades_iata","int_ID=".$key[9])."-".listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$key[9])),0);
      $this->Ln(10);
         # code...
   }
 }

function tbl_seg ($concepto,$listItems){
    $this->Ln();
    $this->Cell(160);
    $this->SetFont('Arial','B',9);
    foreach ($listItems as $key) {
      

    $this->Cell(46,7,"SERVICIO:",0);
    $this->Cell(100,7,utf8_decode(listDat("var_Servicio","tbl_Servicios","int_ID=".$key[32])),0);
    $this->SetFont('Arial','',8);
    $this->Cell(55,7,"Tipo de Pago :",0);
     $this->SetFont('Arial','B',9);
    $this->Cell(140,7,utf8_decode($key[13]),0);
    $this->Cell(160,7,"Cobros",0);
    $this->Cell(70,7,"Detallados",0);
    $this->Cell(0,7,"Totales",0);
        
    $this->SetFont('Arial','',7);
        $ro2= "";
        $con = 0 ;
        $this->Ln(30);
      $this->Cell(500);
    $this->Cell(50,7,"FLETE",0);
    $this->Cell(30,7,$key[15],0);
      $this->Cell(30,7,$key[17],0);
   $this->Cell(35,7,$key[16],0);
    $this->Cell(44,7,$key[14],0);
    $this->Cell(30,7,$key[18]."Lb",0);
     $this->Ln();
      $this->Cell(500);
     $this->Cell(189,7,"SEGURO",0);
     $this->Cell(50,7,"$".$key[22],0);
     $this->Ln();
      $this->Cell(500);
     
     $this->Cell(120,7,"IMPUESTO",0);
      $this->SetFont('Arial','B',7);
     $this->Cell(68,7,"V. DECLARADO",0);
      $this->SetFont('Arial','',7);
      $this->Cell(50,7,"$".$key[20],0,1);
   
    $this->Cell(500);
     $this->Cell(160,7,"Ad Empresa",0,1);
     $this->Cell(500);
     $this->Cell(160,7,"Ad Agente",0,1);
     $this->Cell(500);
     $this->Cell(160,7,"Descuento",0,1);
     $this->Cell(500);
     //P.A
    $this->Cell(160,7,"  ",0,1);
    
   

      $this->SetFont('Arial','',6.5);
      $this->MultiCell(550,8,"LA POLIZA DE SEGURO NO CUBRE PERDIDA O DANO PARCIAL DE SU ENVIO, ARTICULOS NO DECLARADOS, O SIN EMPAQUE APROPIADO. ".utf8_decode(listDat("var_Empresa","tbl_Empresa"," int_ID=".substr($key[0],2,3)))."
NO ASUME RESPONSABILIDAD POR PERDIDA, DANO O DEMORA DEL ENVIO QUE PUEDA SURGIR COMO RESULTADO DE UNA INSPECCION DE SEGURIDAD REALIZADA 
POR ALGUNA AGENCIA LOCAL,ESTATAL O FEDERAL. TODA LA CARGA ESTA SUJETA A INSPECCION SEGUN LAS REGULACIONES FEDERALES." ,0);
        $this->Ln(10);
        $this->SetFont('Arial','',9);

        $this->Cell(150,25,"ID# :",1);
        $this->Cell(200,25,"Firma Remitente :",1);
          $this->Cell(270,25,"Nombre Remitente :",1);


   $this->Ln(90);
 }
}


     //Pie de página
function tbl_style($listItems){
 
      

    $this->Rect(9, 8, 790, 240);
    //$this->Image("globo_mini.jpg" , 200 , 10, 115 , 30 , "JPG");
    foreach ($listItems as $key ) {  
    $this->Image("http://cdnqrcgde.s3-eu-west-1.amazonaws.com/wp-content/uploads/2013/11/jpeg.jpg" , 50 , 120, 50 , 50 , "JPG");

        $this->SetXY(140,120);
    $this->SetFont('Arial','B',12 );
    
    $this->Cell(0,30,listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$key[9]),0); 
    $this->Ln();
    $this->SetFont('Arial','B',30);
    $this->Cell(130);
    $this->Cell(50,7,listDat("var_IATA","tbl_Ciudades_iata","int_ID=".$key[9]),0);
    $this->Ln(10);
    $this->Cell(200);
        $this->SetFont('Arial','B',10);
         $this->Cell(70,7,utf8_decode("Descripción : "),0);
         $this->SetFont('Arial','',7); 
         $this->SetXY(280,153);
         $this->MultiCell(230,8,utf8_decode($key[27]),0,'L'); 
           
        
          $this->SetXY(558,130);
          $this->SetFillColor(166, 166, 166);
          $this->Cell(30,7,"Altura",0,0,'L',TRUE);
          $this->Cell(30,7,"Largo",0,0,'L',TRUE);
          
          $this->Cell(30,7,"Anchura",0,0,'L',TRUE);
         
          $this->Cell(34,7,"Volumen",0,0,'L',TRUE);
          
           $this->SetXY(745,140);
            //flete
             $this->Cell(160,7,"$".$key[30],0,0);
           $this->SetXY(745,147);
           //seguro
            $this->Cell(160,7,"$".$key[21],0,0);
           $this->SetXY(745,154);
           //impuesto
            $this->Cell(160,7,"$".$key[19],0,0);
           $this->SetXY(745,161);
           //ad empresa
            $this->Cell(160,7,"$".$key[23],0,0);
              $this->SetXY(745,168);
              //ad agente
            $this->Cell(160,7,"$".$key[24],0,0);
              $this->SetXY(745,175);
              //descuento
            $this->Cell(160,7,"$".$key[25],0,1);
          $this->Rect(630, 222, 169, 25.5);
          //CC Empresa
          $this->SetXY(610,189);
          $this->Cell(160,7,utf8_decode(listDat("int_ConcCCEmpresa","tbl_Tarifas","var_Servicio=".$key[32])),0,1);
          
          //precio de CC
          $this->SetXY(745,189);
          $this->Cell(160,7,"$".number_format(($key[18]*$key[33]),2, ",", "."),0,1);

          $this->SetXY(610,196);
          $this->Cell(160,7,utf8_decode(listDat("int_ConcCCAgente","tbl_Tarifas","var_Servicio=".$key[32])),0,1);
          //precio del CC agente
          $this->SetXY(745,196);
          $this->Cell(160,7,"$".number_format(($key[18]*$key[34]),2, ",", "."),0,1);

         $this->SetXY(629,225);
         $this->SetFont('Arial','',9);
         $this->MultiCell(170,8,"Operador de caja: ".listDat("var_Nombre","tbl_Usuarios"," int_ID=".$key[35]),0);
            $this->SetXY(745,182);
           $this->SetFont('Arial','',7);
           //P.A
         // $this->Cell(160,7,"$0.00",0,0);
           
           $this->Ln(20);

            
            $this->Cell(580);
            $this->SetFont('Arial','',7);
        $this->Cell(100,7,"MONEDA US DOLLAR",0); 
        $this->Ln(10);
         $this->Cell(700);
         $this->SetFont('Arial','B',12);
        $this->Cell(30,7,"Total",0); 
          $this->SetFont('Arial','',12);
         $this->Cell(0,7,"$".$key[26],0); 


           }
     // 2 div 
      $this->Rect(9, 310, 790, 240);
      // $this->Image("globo_mini.jpg" , 200 , 313 , 115 , 30 , "JPG");

       foreach ($listItems as $key ) {  
    $this->Image("http://cdnqrcgde.s3-eu-west-1.amazonaws.com/wp-content/uploads/2013/11/jpeg.jpg" , 50 , 424, 50 , 50 , "JPG");
    $this->SetXY(140,424);
    $this->SetFont('Arial','B',12 );
    $this->Cell(0,30,listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$key[9]),0);
    $this->Ln();
    $this->SetFont('Arial','B',30);
    $this->Cell(130);
    $this->Cell(50,7,listDat("var_IATA","tbl_Ciudades_iata","int_ID=".$key[9]) ,0);
    $this->Ln(10);
    $this->Cell(200);
        $this->SetFont('Arial','B',10);
         $this->Cell(70,7, utf8_decode("Descripción : "),0);
         $this->SetFont('Arial','',7); 
         $this->SetXY(280,458);
         $this->MultiCell(230,8,utf8_decode($key[27]),0,'L'); 
 
  
          $this->SetXY(558,434);
          $this->SetFillColor(166, 166, 166);
          $this->Cell(30,7,"Altura",0,0,'L',TRUE);
          $this->Cell(30,7,"Largo",0,0,'L',TRUE);
          
          $this->Cell(30,7,"Anchura",0,0,'L',TRUE);
         
          $this->Cell(34,7,"Volumen",0,0,'L',TRUE);
          
           $this->SetXY(745,440);
            //flete
             $this->Cell(160,7,"$".$key[30],0,0);
           $this->SetXY(745,447);
            $this->Cell(160,7,"$".$key[21],0,0);
           $this->SetXY(745,454);
            $this->Cell(160,7,"$".$key[19],0,0);
           $this->SetXY(745,461);
            $this->Cell(160,7,"$".$key[23],0,0);
              $this->SetXY(745,468);
            $this->Cell(160,7,"$".$key[24],0,0);
              $this->SetXY(745,475);
            $this->Cell(160,7,"$".$key[25],0,1);
            $this->Rect(630, 524, 169, 25.5); 

            //CC Empresa
          $this->SetXY(610,489);
          $this->Cell(160,7,utf8_decode(listDat("int_ConcCCEmpresa","tbl_Tarifas","var_Servicio=".$key[32])),0,1);
          
          //precio de CC
          $this->SetXY(745,489);
          $this->Cell(160,7,"$".number_format(($key[18]*$key[33]),2, ",", "."),0,1);

          $this->SetXY(610,496);
          $this->Cell(160,7,utf8_decode(listDat("int_ConcCCAgente","tbl_Tarifas","var_Servicio=".$key[32])),0,1);
          //precio del CC agente
          $this->SetXY(745,496);
          $this->Cell(160,7,"$".number_format(($key[18]*$key[34]),2, ",", "."),0,1);

                $this->SetXY(629,526);
                $this->SetFont('Arial','',9);
              $this->MultiCell(170,8,"Operador de caja: ".utf8_decode(listDat("var_Nombre","tbl_Usuarios"," int_ID=".$key[35])),0);
            $this->SetXY(745,482);
             $this->SetFont('Arial','',7);
          // P.A $this->Cell(160,7,"$0.00",0,0);
              
           $this->Ln(20);
    
            $this->Cell(580);
            $this->SetFont('Arial','',7);
        $this->Cell(100,7,"MONEDA US DOLLAR",0); 
        $this->Ln(10);
         $this->Cell(700);
         $this->SetFont('Arial','B',12);
        $this->Cell(30,7,"Total",0); 
          $this->SetFont('Arial','',12);
         $this->Cell(0,7,"$".$key[26],0);

 
           }


}

function tbl_BarImpr($listItems){
    $this->Ln(80);
    foreach ($listItems as $key ) {
   // $this->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$vrcNFac.'&.png',490,610 ,80,80,"PNG");
    $this->SetFont('Arial','B',17);
    $this->Cell(280);
    $this->Cell(2,10,"",0,1);
    

         $this->SetFont('Arial','B',14);
        $this->Cell(290);
        $this->Cell(4,14,'Remitente : ',0,1);
         $this->SetFont('Arial','',11);
         $this->Cell(290);
        $this->Cell(4,14,utf8_decode($key[1]),0,1);
        $this->Cell(290);
        $this->Cell(4,14,'Telefono : '.$key[5],0,1);
        $this->Cell(290);
        $this->SetFont('Arial','B',14);
        $this->Cell(4,14,'Destinatario : ',0,1);
        
         $this->SetFont('Arial','',11);
         $this->Cell(290);
          $this->Cell(4,14,utf8_decode($key[7]),0,1);
          $this->Cell(290);
          $this->MultiCell(240,14,utf8_decode($key[8]),0,1);
            
            $this->Cell(290);
           $this->Cell(240,10,utf8_decode(listDat("var_Ciudad","tbl_Ciudades_iata","int_ID=".$key[9])."-".listDat("var_Estado","tbl_Ciudades_iata","int_ID=".$key[9])."-".listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$key[9])),0);



         $this->Ln(8);
 
          $this->Cell(290);
          $this->SetFont('Arial','B',11);
           $this->Cell(25,10,'Contenido :',0,1);
            $this->Cell(290);
            $this->SetFont('Arial','',9);
          $this->MultiCell(240,12,utf8_decode($key[27]),0);
          $this->SetFont('Arial','',11);
          $this->Ln(10);
          $this->SetFont('Arial','B',25);
        $this->Cell(0,15,listDat("var_IATA","tbl_Ciudades_iata","int_ID=".$key[9]),0,1,'C');
             $this->setXY(320,700);
         
          $this->SetFont('Arial','',12);
          /*$this->setXY(70,35);
          $this->Cell(10,10,'FOB:',0);
          $this->Cell(25,10,$list[15],0,1);
          $this->setXY(320,673  );
           $this->MultiCell(230,12,utf8_decode($key[8]),0);*/
          $this->setXY(300,792  );
          $this->Cell(25,10,$key[18] ."Lb",0,1);
          $this->setXY(300,803);
          $this->Cell(25,10,substr($key[18] / 2.20462262, 0,4)."Kg",0,1);
          $this->setXY(435,803);
          $date = new DateTime(substr($key[31],0,10));
          $this->Cell(25,10,$date->format('m/d/Y '),0,1);
 
    $this->setXY(350,777);
   




   /*   
      $this->SetFont('Arial','B',14);
       $this->Cell(180,17,listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$key[9]),0);
       $this->Ln();
       $this->Cell(350);
       $this->SetFont('Arial','B',18);
        $this->Cell(180,10,listDat("var_IATA","tbl_Ciudades_iata","int_ID=".$key[9]),0);
         $this->Image("https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=".$key[0]."&.png" , 490 , 710, 70 , 70 , "PNG");*/
    
        }

   }
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
 
    

   
   
}
// -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //
  
  $fontSize = 10;
  $marge    = 1;   // between barcode and hri in pixel
  $x        = 500;  // barcode center
  $y        = 25;  // barcode center

  $x1        = 500;  // barcode center1
  $y1        = 326;  // barcode center1

  $height   = 20;   // barcode height in 1D ; module size in 2D
  $width    = 0.8;    // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees

  $fontSize2 = 10;
  $x2        = 390;  // barcode center
  $y2        = 850;  // barcode center
  $height2   = 70;   // barcode height in 1D ; module size in 2D
  $width2    = 1;    // barcode height in 1D ; not use in 2D
  
  $code     = $vrcNFac; // barcode, of course ;)
  $type     = 'code128';
  $black    = '000000'; // color in hexa


$pdf=new PDF('P','pt',array(808,1008));
//Títulos de las columnas
$header=array('REMITENTE','DESTINATARIO ');
$valores =  array('' ,'','','0','17');
$miCabecera = array('CONCEPTO', 'UNIDAD', 'TOTAL');


$Datos_Unidad = array('$1','$100');
$Datos_concepto= array('Ad Empresa', 'Ad Agente', 'Descuento', 'P.A : ');           
        
//Primera página    
        
$pdf->AliasNbPages();

$pdf->Setmargins(10,10,10); 

$pdf->AddPage('P',array(808,1008));
  // -------------------------------------------------- //
  //                      BARCODE
  // -------------------------------------------------- //
  
  $data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
  $data1 = Barcode::fpdf($pdf, $black, $x1, $y1, $angle, $type, array('code'=>$code), $width, $height);
   $data2 = Barcode::fpdf($pdf, $black, $x2, $y2, $angle, $type, array('code'=>$code), $width2, $height2);
      // -------------------------------------------------- //
  //                      HRI
  // -------------------------------------------------- //

  $pdf->SetFont('Arial','B',$fontSize);
  $pdf->SetTextColor(0, 0, 0);
  $len = $pdf->GetStringWidth($data['hri']);
  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
  $pdf->TextWithRotation($x + $xt, $y + $yt, $data['hri'], $angle);

  Barcode::rotate(-$len / 2, ($data1['height'] / 2) + $fontSize + $marge, $angle, $xt1, $yt1);
  $pdf->TextWithRotation($x1 + $xt1, $y1 + $yt1, $data1['hri'], $angle);

$pdf->SetFont('Arial','B',$fontSize2);
  Barcode::rotate(-$len / 2, ($data2['height'] / 2) + $fontSize2 + $marge, $angle, $xt2, $yt2);
  $pdf->TextWithRotation($x2 + $xt2, $y2 + $yt2, $data2['hri'], $angle);
  //----------------------------------------------------//


$pdf->TablaSimple($header,$listItems);

$pdf->tbl_seg($Datos_concepto,$listItems);

$pdf->TablaSimple($header,$listItems);
$pdf->tbl_seg($Datos_concepto,$listItems);
$pdf->tbl_style($listItems);
$pdf->tbl_BarImpr($listItems);


//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('Guia.pdf','I');
?>