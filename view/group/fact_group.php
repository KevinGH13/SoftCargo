<?php
require('../../cnnbd.php');
require('fpdf/fpdf.php');
require('phpbarcode/php-barcode.php');
$id_group = $_REQUEST['id_group'];
$ids_Co = $_REQUEST['idsCon'];
$vec = explode('-', $ids_Co);
$a = '1=1';
foreach ($vec as  $value) {
   $a = $a . ' OR int_Guia = '.$value ;
}


 //Abrimos la conexión
$link=Conectarse();

    $resultList = mysqli_query
      ($link,
        "SELECT int_Guia,date_FechaEnvio,
                var_NombreRemit,var_DireccionRemit,var_TelefonoRemit,var_CiudadRemit,var_EstadoRemit,int_CodZipRemit,
                var_NombreDest,var_DireccionDest,var_TelefonoDest,var_CiudadDest,var_EstadoDest,int_CodZipDest,
                int_ValorDeclaradoManual,decimal_PesoCobrado,var_DescripcionContenido
         FROM  tbl_Guia WHERE $a  "

      );

    $resultList2 = mysqli_query
      ($link,
        "SELECT var_Empresa,var_Direccion,var_Ciudad,var_Estado,var_Pais
         FROM  tbl_Empresa WHERE int_Principal = 1  "

      );



  //Ejecuto la consulta
    $listItems = array();
    while($rowList = mysqli_fetch_array($resultList)){
      $listItems[] = $rowList;
    }

     $listItems2 = array();
    while($rowList = mysqli_fetch_array($resultList2)){
      $listItems2[] = $rowList;
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
     //mis guias hijas
     function hijas($listItems,$a,$listItems2){
       $i = 1;
 foreach ($listItems as $key ) {
 	$x        = 500;  // barcode center
  $y        = 50;  // barcode center
  $height   = 35;   // barcode height in 1D ; module size in 2D
  $width    = 0.5;  // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees
  $type     = 'code128';
  $black    = '000000'; // color in hex

            $this->SetFont('Arial','',14);
		$code = $key[0];
        $this->Cell(100,25,$listItems2[0][0],0,1);
        $this->Image('http://www.easycargopro.com/ECP/view/group/barcode.php?text=$key[0]&size=60',500,30*$i,90,0,'PNG');
        $this->Cell(100,25,$key[0],0,1);
        $this->Cell(100,25,'Direccion : '.$listItems2[0][1]."  ".$listItems2[0][2].",".$listItems2[0][3].",".$listItems2[0][4],0,1);
        $this->Cell(500,10,'Telefono: ',0,1);
        $this->Ln(10);
        $this->SetFont('Arial','B',15);
//Bloque 2
        $this->Cell(50);
        $this->Cell(100,40,'FECHA : '.$key[1],0,1);
        $this->Ln(10);
        $this->Cell(70);
        $this->Cell(350,18,'REMITENTE',0);
        $this->Cell(100,18,'DESTINATARIO',0,1);
        $this->SetFont('Arial','',15);
        $this->Cell(70);

        $this->Cell(350,15,$key[2],0);
        $this->Cell(350,15,$key[8],0,1);
        $this->Cell(70);

        $this->Cell(350,15,$key[3],0);
        $this->Cell(70,15,$key[9],0,1);

        $this->Cell(70);
        $this->Cell(350,15,$key[4],0);
        $this->Cell(350,15,$key[10],0,1);

        $this->Cell(70);
        $this->Cell(350,15,$key[5].','.$key[6].','.$key[7],0);
        $this->Cell(100,15,$key[11].','.$key[12].','.$key[13],0,1);

        $this->Cell(420);
        //$this->Cell(100,15,'Codigo Postal : ',0,1);
//bloque 3
        $this->Ln(40);
        $this->Cell(500);
        $this->Cell(100,15,'VALOR DECLARADO : '. $key[14],0,1);
        $this->Cell(500);
        $this->Cell(100,15,'PESO REAL : '.$key[15],0,1);
        $this->Cell(500);
        $this->Cell(100,15,'NUMERO DE UNIDADES : 1',0,1);
        $this->Cell(500);
        $this->Cell(100,15,'DESCRIPCION : '.$key[16],0,1);
        $this->Ln(-40);
        $this->Cell(20);
        $this->SetFont('Arial','B',15);
        $this->Cell(100,10,'Desaduanador En Destino ',0,1);

         $this->SetFont('Arial','B',12);
     $this->Ln(70);
     $this->Multicell(0,12,iconv('UTF-8', 'ISO-8859-2','REMITENTE: DECLARO NO ESTAR ENVIANDO ARMAS DE FUEGO, QUIMICOS, JOYAS, DROGAS, DINERO NI MERCANCIA COMERCIAL.
ASUMO EL PAGO DE LA DIFERENCIA DE IMPUESTOS EN DIAN. DOY CONSENTIMIENTO PARA QUE MI CARGA SEA INSPECCIONADA.
GLOBO ENVIOS: NO SOMOS RESPONSABLES POR RUPTURAS Y/O ARTÍCULOS NO DELCARADOS. EL CUBRIMIENTO DEL SEGURO
SERÁ HASTA UN 100% Y/O PROPORCIONAL AL FALTANTE. FIRMA _______________________________________'),0,1);
     }$i++;
//la puta cosa wea larga

 }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
      $this->Write (5, 'This is a footer');
    }
}
 // -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //

$fontSize = 10;
  $marge    = 0.2;   // between barcode and hri in pixel
  $x        = 500;  // barcode center
  $y        = 50;  // barcode center
  $height   = 35;   // barcode height in 1D ; module size in 2D
  $width    = 0.5;  // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees

  $code     = $id_group;     // barcode (CP852 encoding for Polish and other Central European languages)
  $type     = 'code128';
  $black    = '000000'; // color in hex



$pdf=new PDF('P','pt',array(808,1008));
//Primera página

$pdf->AliasNbPages();

$pdf->Setmargins(10,10,10);
$pdf->AddPage('P',array(808,1008));


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

// Tablas
$pdf->ln(10);
$pdf->hijas($listItems,$a,$listItems2);
//linea
$pdf->SetDrawColor(154, 154, 154);
$pdf->Line(0, 95, 1500, 100);
$pdf->Output('example2.pdf','I');
?>
