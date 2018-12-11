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
      var_NombreDest,var_DireccionDest,int_CiudadDestinatario,int_CodZipDest,var_TelefonoDest,
      var_TipoPago,decimal_PesoCobrado,
      int_ValorSeguro,int_ValorDeclarado,int_ValorDeclaradoManual,int_ValorSeguroManual,int_TotalPagar,var_DescripcionContenido,int_factura,date_FechaEnvio,var_Agente FROM  tbl_Guia WHERE int_Activo = '1' AND int_Guia= ".$vrcNFac
      
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
  
	function Header(){

	
	

	}
 

 function TablaSimple($listItems){

  foreach ($listItems as $list) {
   // $this->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$vrcNFac.'&.png',65,10,30,30,"PNG");
  $this->SetFont('Arial','B',17);
 
$this->Cell(2,10,"",0);
	$this->Ln();

  $this->SetFont('Arial','B',14);
 $this->Cell(5);
 $this->Cell(4,5,'Remitente : ',0,1);
  $this->SetFont('Arial','',11);
  $this->Cell(5);
 $this->Cell(4,5,utf8_decode($list[1]),0,1);
 $this->Cell(5);
 $this->Cell(4,5,'Telefono : '.$list[5],0,1);
 $this->Cell(5);
 $this->SetFont('Arial','B',14);
 $this->Cell(4,5,'Destinatario : ',0,1);
 
  $this->SetFont('Arial','',11);
  $this->Cell(5);
     $this->Cell(4,5,$list[7],0,1);
     $this->Cell(5);
     $this->SetFont('Arial','',11);
     $this->MultiCell(100,5,utf8_decode($list[8]),0,1);
     $this->SetFont('Arial','',11);
     $this->Cell(5);
     $ciudade= utf8_decode(listDat("var_Ciudad","tbl_Ciudades_iata","int_ID=".$list[9]))."- ".utf8_decode(listDat("var_Estado","tbl_Ciudades_iata","int_ID=".$list[9]))."- ".utf8_decode(listDat("var_Pais","tbl_Ciudades_iata","int_ID=".$list[9]));
  $this->MultiCell(80,5,utf8_decode($ciudade),0,'L');
     



  $this->Ln(-.2);

$this->SetFont('Arial','',11);
$this->Cell(5);
$this->MultiCell(90,4,utf8_decode("CONTENIDO: ".$list[19]),0);
$this->Ln();

$this->SetFont('Arial','B',20);
 $this->Cell(0,10,listDat("var_IATA","tbl_Ciudades_iata","int_ID=".$list[9]),0,0,'C');
 $this->Ln();

$this->SetFont('Arial','',12);
/*$this->setXY(70,35);
$this->Cell(10,10,'FOB:',0);
$this->Cell(25,10,$list[15],0,1);*/
$this->setXY(10,81  );
$this->Cell(25,10,$list[13] ."Lb",0,1);
$this->setXY(10,76);
$this->Cell(25,10,substr($list[13] / 2.20462262, 0,4)."Kg",0,1);
$this->setXY(70,81);
$date = new DateTime(substr($list[21],0,10));
$this->Cell(25,10,$date->format('m/d/Y '),0,1);
 }
 }
}

 // -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //
  
  $fontSize = 10;
  $marge    = -5;   // between barcode and hri in pixel
  $x        = 50;  // barcode center
  $y        = 100;  // barcode center
  $height   = 20;   // barcode height in 1D ; module size in 2D
  $width    = 0.5;  // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees
  
  $code     = $vrcNFac;     // barcode (CP852 encoding for Polish and other Central European languages)
  $type     = 'code128';
  $black    = '000000'; // color in hex
  









$pdf=new PDF('P','mm',array(101,127));

$pdf->AliasNbPages();

//Primera página
$pdf->Setmargins(2,2,2); 

$pdf->AddPage('P',array(101,127));
// -------------------------------------------------- //
  //                      BARCODE
  // -------------------------------------------------- //
  
  $data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
       // -------------------------------------------------- //
  //                      HRI
  // -------------------------------------------------- //

  $pdf->SetFont('Arial','B',$fontSize);
  $pdf->SetTextColor(0, 0, 0);
  $len = $pdf->GetStringWidth($data['hri']);
  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
  $pdf->TextWithRotation($x + $xt, $y + $yt, $data['hri'], $angle);

//$pdf->AddPage();

$pdf->TablaSimple($listItems);

//Segunda página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->TablaColores($header);
$pdf->Output('termico.pdf','I');

?>