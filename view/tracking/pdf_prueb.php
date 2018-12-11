<?php 
require('../../cnnbd.php');
require('fpdf/fpdf.php');
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
        "SELECT int_Guia,var_NombreRemit,var_DireccionRemit,var_CiudadRemit,var_EstadoRemit,var_PaisRemit,int_CodZipRemit,var_TelefonoRemit,var_EmailRemit,
      var_NombreDest,var_DireccionDest,var_CiudadDest,var_EstadoDest,var_PaisDest,int_CodZipDest,var_TelefonoDest,var_EmailDest,
      var_TipoPago,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,decimal_PesoCobrado, 
      int_ValorDeclarado,int_ValorDeclaradoManual,int_ValorSeguro,int_ValorSeguroManual,int_CargosEmpresa,int_CargosAgente,int_Descuentos,int_TotalPagar,var_DescripcionContenido,int_Activo,var_Agente,int_factura,date_FechaEnvio,int_gananciaAgente FROM  tbl_Guia WHERE int_Activo = '1' AND int_Guia=$vrcNFac "
      
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
     //Arial bold 10
    $this->SetFont('Arial','',10);
    //agente
foreach ($listItems as $key) {

      $this->Cell(300,10,listDat("var_Agente","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[33]),0);
      //Codigo y numero
      $this->ln();
      
      $this->Cell(650,10,listDat("var_Direccion","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[33])." - ".listDat("var_Ciudad","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[33]),0);
      $this->SetFont('Arial','B',16);
      $this->Cell(50,8,'Unidades 1/1',0,'C');
      $this->SetFont('Arial','',10);
      $this->Ln();
      $this->Cell(50,10,"TELEFONO".listDat("var_Telefono","tbl_Agentes","int_Activo = '1' AND int_ID=".$key[33]),0);
      $this->ln();
      $this->Cell(50,10,$key[35],0);
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
      $this->Cell(300,10,$key[9],0);
      $this->Ln();
       $this->SetFont('Arial','',10);
      $this->Cell(300,10,$key[2],0);
      $this->Cell(300,10,$key[10],0);
      $this->Ln();
      $this->Cell(300,10,$key[3].". -".$key[4],0);
      $this->Cell(200,10,$key[14],0);
      $this->Ln();
     $this->Cell(300,10,$key[7],0);
      $this->Cell(200,10,$key[11]."-".$key[12]."-".$key[13],0);
      $this->Ln(10);
         # code...
   }
 }

   function tbl_seg ($concepto,$listItems){
    $this->Ln();
    $this->Cell(200);
    $this->SetFont('Arial','B',9);
    foreach ($listItems as $key) {
      

    $this->Cell(46,7,"SERVICIO:",0);
    $this->Cell(60,7,"COURIER",0);
    $this->SetFont('Arial','',8);
    $this->Cell(55,7,"Tipo de Pago :",0);
     $this->SetFont('Arial','B',9);
    $this->Cell(140,7,$key[17],0);
    $this->Cell(160,7,"Cobros",0);
    $this->Cell(70,7,"Detallados",0);
    $this->Cell(0,7,"Totales",0);
        
    $this->SetFont('Arial','',7);
        $ro2= "";
        $con = 0 ;
        $this->Ln(30);
      $this->Cell(500);
  $this->Cell(50,7,"FLETE",0);
 $this->Cell(30,7,$key[19],0);
  $this->Cell(30,7,$key[21],0);
   $this->Cell(40,7,$key[20],0);
    $this->Cell(49,7,intval($key[19]),0);
    $this->Cell(30,7,intval($key[22]),0);
     $this->Ln();
      $this->Cell(500);
     $this->Cell(189,7,"SEGURO",0);
     $this->Cell(50,7,"$".$key[26],0);
     $this->Ln();
      $this->Cell(500);
     
     $this->Cell(120,7,"IMPUESTO",0);
      $this->SetFont('Arial','B',7);
     $this->Cell(68,7,"V. DECLARADO",0);
      $this->SetFont('Arial','',7);
      $this->Cell(50,7,"$".$key[24],0,1);
    }
    $this->Cell(500);
     $this->Cell(160,7,"Ad Empresa",0,1);
     $this->Cell(500);
     $this->Cell(160,7,"Ad Agente",0,1);
     $this->Cell(500);
     $this->Cell(160,7,"Descuento",0,1);
     $this->Cell(500);
     $this->Cell(160,7,"P.A : ",0,1);
    
   

 $this->SetFont('Arial','',6.5);
$this->MultiCell(550,8,"LA POLIZA DE SEGURO NO CUBRE PERDIDA O DANO PARCIAL DE SU ENVIO, ARTICULOS NO DECLARADOS, O SIN EMPAQUE APROPIADO. FENIX CARGO & LOGISTICS
NO ASUME RESPONSABILIDAD POR PERDIDA, DANO O DEMORA DEL ENVIO QUE PUEDA SURGIR COMO RESULTADO DE UNA INSPECCION DE SEGURIDAD REALIZADA 
POR ALGUNA AGENCIA LOCAL,ESTATAL O FEDERAL. TODA LA CARGA ESTA SUJETA A INSPECCION SEGUN LAS REGULACIONES FEDERALES." ,0);
  $this->Ln(10);
  $this->SetFont('Arial','',9);
  $this->Cell(150,25,"ID# :",1);
   $this->Cell(200,25,"Firma Remitente :",1);
    $this->Cell(270,25,"Nombre Remitente :",1);
     $this->Cell(0,25,"Operador de caja: Harlen Giraldo",1);
   $this->Ln(90);

   }

   /*
 
    
            
        
    }*/
     //Pie de página
     function tbl_style($listItems){
 


      $this->Rect(9, 8, 790, 240);
      $this->Image("http://www.easycargopro.com/wp-content/uploads/2015/04/Logo1.png" , 200 , 10, 165 , 30 , "PNG" ,"http://www.easycargopro.com/");
     foreach ($listItems as $key ) {  
      $this->Image("http://cdnqrcgde.s3-eu-west-1.amazonaws.com/wp-content/uploads/2013/11/jpeg.jpg" , 50 , 120, 50 , 50 , "JPG");

        $this->SetXY(150,120);
    $this->SetFont('Arial','B',12 );
    
    $this->Cell(0,25,$key[13],0);
    $this->Ln();
    $this->SetFont('Arial','B',30);
    $this->Cell(140);
    $this->Cell(50,7,"MDE",0);
    $this->Ln(10);
    $this->Cell(300);
        $this->SetFont('Arial','B',10);
         $this->Cell(70,7, iconv('UTF-8', 'ISO-8859-2',"Descripción : "),0);
         $this->SetFont('Arial','',7);
         $this->Cell(0,7,$key[31],0); 
           
        
          $this->SetXY(558,130);
          $this->SetFillColor(166, 166, 166);
          $this->Cell(25,7,"Altura",0,0,'L',TRUE);
          $this->Cell(25,7,"Largo",0,0,'L',TRUE);
          
          $this->Cell(30,7,"Anchura",0,0,'L',TRUE);
         
          $this->Cell(34,7,"Volumen",0,0,'L',TRUE);
          
           $this->SetXY(745,140);
            //flete
             $this->Cell(160,7,"$".$key[34],0,0);
           $this->SetXY(745,147);
            $this->Cell(160,7,"$".$key[25],0,0);
           $this->SetXY(745,154);
            $this->Cell(160,7,"$".$key[23],0,0);
           $this->SetXY(745,161);
            $this->Cell(160,7,"$".$key[27],0,0);
              $this->SetXY(745,168);
            $this->Cell(160,7,"$".$key[28],0,0);
              $this->SetXY(745,175);
            $this->Cell(160,7,"$".$key[29],0,0);
            $this->SetXY(745,182);
            //ni idea q es
            $this->Cell(160,7,"",0,0);
           $this->Ln(20);
    
            
            $this->Cell(580);
            $this->SetFont('Arial','',7);
        $this->Cell(100,7,"MONEDA US DOLLAR",0); 
        $this->Ln(10);
         $this->Cell(700);
         $this->SetFont('Arial','B',12);
        $this->Cell(30,7,"Total",0); 
          $this->SetFont('Arial','',12);
         $this->Cell(0,7,"$".$key[30],0); 
    
           }
     // 2 div 
      $this->Rect(9, 310, 790, 240);
       $this->Image("http://www.easycargopro.com/wp-content/uploads/2015/04/Logo1.png" , 200 , 315, 165 , 30 , "PNG" ,"http://www.easycargopro.com/");
       foreach ($listItems as $key ) {  
       $this->Image("http://cdnqrcgde.s3-eu-west-1.amazonaws.com/wp-content/uploads/2013/11/jpeg.jpg" , 50 , 424, 50 , 50 , "JPG");
    $this->SetXY(150,424);
    $this->SetFont('Arial','B',12 );
    $this->Cell(0,25,$key[13],0);
    $this->Ln();
    $this->SetFont('Arial','B',30);
    $this->Cell(140);
    $this->Cell(50,7,"MDE",0);
    $this->Ln(10);
    $this->Cell(300);
    $this->SetFont('Arial','B',10);
    $this->Cell(70,7, iconv('UTF-8', 'ISO-8859-2',"Descripción : "),0);
    $this->SetFont('Arial','',7);
    $this->Cell(0,7,$key[31],0); 
 
  
          $this->SetXY(558,434);
          $this->SetFillColor(166, 166, 166);
          $this->Cell(25,7,"Altura",0,0,'L',TRUE);
          $this->Cell(25,7,"Largo",0,0,'L',TRUE);
          
          $this->Cell(30,7,"Anchura",0,0,'L',TRUE);
         
          $this->Cell(34,7,"Volumen",0,0,'L',TRUE);
          
           $this->SetXY(745,440);
            //flete
             $this->Cell(160,7,$key[34],0,0);
           $this->SetXY(745,447);
            $this->Cell(160,7,"$".$key[25],0,0);
           $this->SetXY(745,454);
            $this->Cell(160,7,"$".$key[23],0,0);
           $this->SetXY(745,461);
            $this->Cell(160,7,"$".$key[27],0,0);
              $this->SetXY(745,468);
            $this->Cell(160,7,"$".$key[28],0,0);
              $this->SetXY(745,475);
            $this->Cell(160,7,"$".$key[29],0,0);
            $this->SetXY(745,482);
            $this->Cell(160,7,"$0.00",0,0);
           $this->Ln(20);
    
            $this->Cell(580);
            $this->SetFont('Arial','',7);
        $this->Cell(100,7,"MONEDA US DOLLAR",0); 
        $this->Ln(10);
         $this->Cell(700);
         $this->SetFont('Arial','B',12);
        $this->Cell(30,7,"Total",0); 
          $this->SetFont('Arial','',12);
         $this->Cell(0,7,"$".$key[30],0); 
           }


   }
   function tbl_BarImpr($listItems){
    $this->Ln(150);
    foreach ($listItems as $key ) {

      $this->Cell(350);
      $this->SetFont('Arial','B',14);
       $this->Cell(180,17,$key[13],0);
       $this->Ln();
       $this->Cell(350);
       $this->SetFont('Arial','B',18);
        $this->Cell(180,10,"MDE",0);
         $this->Image("https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=".$key[0]."&.png" , 490 , 710, 70 , 70 , "PNG");
    
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
  $y2        = 750;  // barcode center
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