<?php
require('../../cnnbd.php');
require('fpdf/fpdf.php');
require('phpbarcode/php-barcode.php');
$Xs = "";
$ID_Group = substr($_REQUEST['id_group'],0,13);

$Xs = substr($_REQUEST['id_group'], 13);

//Abrimos la conexión
  $link=Conectarse();
    $resultList = mysqli_query
      ($link,
        "SELECT 
          int_Guia,
          var_NombreRemit,
          var_DireccionRemit,
          var_CiudadRemit,
          var_EstadoRemit,
          var_TelefonoRemit,
          var_NombreDest,
          var_DireccionDest,
          var_CiudadDest,
          var_EstadoDest,
          G.var_PaisDest,
          int_CodZipDest,
          var_TelefonoDest,
          var_DescripcionContenido,
          int_ValorDeclarado,
          decimal_PesoCobrado,
          date_FechaEnvio,
          int_ValorDeclaradoManual
        FROM
          tbl_Guia G
        INNER JOIN
          tbl_ConsolidadoGuia CG
        on CG.int_ID = left(G.int_NEmpaque,11) where CG.int_IdGrupo = $ID_Group ORDER BY int_Guia ASC   "
       
        
      );
      

  //Ejecuto la consulta
    $listItems = array();
    while($rowList = mysqli_fetch_array($resultList)){
      $listItems[] = $rowList;
    }

   
    $resultList2 = mysqli_query
      ($link,
        "SELECT 
          int_Guia,
          var_NombreDestinatario,
          var_DireccionDestinatario,
          int_peso,
          int_declarado,
          var_TelefonoDestinatario,
          int_IDGrupo
        FROM
          tbl_GRPconX 
        WHERE 
           int_IDGrupo = $ID_Group  ORDER BY int_Guia ASC
        "      
        
      );

       $listItems2 = array();
    while($rowList = mysqli_fetch_array($resultList2)){
      $listItems2[] = $rowList;
    }
    
     
    if ($Xs != "" AND count($listItems2)>0) {
      $cantidad = count($listItems);
      if ($cantidad < 4) {
         
          foreach ($listItems as $value) {
            $contador = 0;
            foreach ($listItems2 as $value2) {
              if($value[0]==$value2[0]){

                $listItems[$contador][6]=$value2[1]; //Nombre 
                $listItems[$contador][7]=$value2[2];  //Direccion
                $listItems[$contador][10]=$value2[5];  //Telefono
                $listItems[$contador][13]=$value2[3]; //Peso
                $listItems[$contador][15]=$value2[4]; //Declarado
                break;
              }
            }
            $contador++;
          }
      }else{ 
        $contador = 0;
          foreach ($listItems as $value) {
            
            $inf  = 0 ;
            $sup  = count($listItems2)-1;
            $bandera =false;
            while ($inf <= $sup ) {

              $centro = intval((($sup - $inf) / 2) + $inf);
             
              if ($value[0] == $listItems2[$centro][0]){
               
                $listItems[$contador][6]=$listItems2[$centro][1]; //Nombre 
                $listItems[$contador][7]=$listItems2[$centro][2];  //Direccion
                $listItems[$contador][10]=$listItems2[$centro][5];  //Telefono
                $listItems[$contador][13]=$listItems2[$centro][3]; //Peso
                $listItems[$contador][15]=$listItems2[$centro][4]; //Declarado
                $inf = $sup+1;
              }else if($listItems2[$centro] < $value[0]){
                  $sup = $centro-1;
              }else{
                  $inf = $centro+1;
              }
            }
            $contador++;
          }
      }
       
    }


  //Cerramos la conexión
    mysqli_close($link);

$y1 ;
      $x1;



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
     function hijas(){

      
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
      $this->Write (5, '');
    }
}

$pdf=new PDF('P','pt',array(808,1008));
//Primera página    
        
$pdf->AliasNbPages();

$pdf->Setmargins(10,10,10); 
$pdf->AddPage('P',array(808,1008));


foreach ($listItems as $key ) {
$pdf->SetFont('Arial','B',15);
//nombre de la empresa 
      $pdf->Cell(450,15,' ',0,0);
      
      //obtengo la posicion
      $y1 = $pdf->GetY()+10;
      $x1 = $pdf->GetX();
      $pdf->ln();
      $pdf->SetFont('Arial','B',9);
      $date = new DateTime($key[16]);
      $pdf->Cell(100,15,"FECHA:".$date->format('m/d/Y H:i:s'),0,1);
      
            

       $pdf->Cell(300,9,'Remitente',0);
       $pdf->Cell(100,9,'Destinatario',0,1);

        $pdf->Cell(300,9,$key[1],0);
   
        $pdf->Cell(300,9,$key[6],0,1);

        $pdf->Cell(300,9,$key[2],0);
        $pdf->Cell(100,9,$key[7],0,1);
        $pdf->Cell(300);
        $pdf->Cell(100,9,$key[12]." ZipCode:".$key[11],0,1);
        $pdf->Cell(300,9,$key[3]."-".$key[4],0);
        $pdf->Cell(300,9,$key[8]."-".$key[9],0,1);

        $pdf->Cell(300,9,$key[5],0);
        $pdf->Cell(100,9,$key[10],0,1);
        $pdf->Cell(20);
         $pdf->SetFont('Arial','B',15);
         $pdf->ln(40);
         $pdf->Cell(50);
        $pdf->Cell(100,17,'Courrier',0);
         $pdf->SetFont('Arial','B',9);
        $pdf->Cell(100,17,' unidades : 1 ',0,1);
        $pdf->ln(-50);
        $pdf->Cell(500);
        $pdf->Cell(100,9,'Observaciones',0,1);
        $pdf->Cell(500);
        $pdf->Cell(100,9,'Contiene : ',0,1);
        $pdf->Cell(500);
        $pdf->Cell(100,12,$key[13],0,1);
        $pdf->Cell(500);
        $pdf->SetFont('Arial','B',9);
        $pdf->Multicell(0,12,iconv('UTF-8', 'ISO-8859-2','REMITENTE: DECLARO NO ESTAR ENVIANDO ARMAS DE FUEGO, QUIMICOS, JOYAS, DROGAS, DINERO NI MERCANCIA COMERCIAL.
ASUMO EL PAGO DE LA DIFERENCIA DE IMPUESTOS EN DIAN. DOY CONSENTIMIENTO PARA QUE MI CARGA SEA INSPECCIONADA.
NO SOMOS RESPONSABLES POR RUPTURAS Y/O ARTÍCULOS NO DELCARADOS. EL CUBRIMIENTO DEL SEGURO
SERÁ HASTA UN 100% Y/O PROPORCIONAL AL FALTANTE. FIRMA _______________________________________'),0,1);
       $pdf->ln(-100);
       $pdf->SetFont('Arial','B',9);
$pdf->Cell(80);
        $pdf->Cell(100,30,'Valor Declarado : '.$key[17],0,1);
     $pdf->Cell(80);
        $pdf->Cell(100,30,'Peso : '.$key[15],0,1);
        
        $pdf->ln();
        $pdf->Cell(100,9,'Recibido',0,1);
        $pdf->Cell(310,35,'POR: _________________________________________________________',0,0);
        $pdf->Cell(340,35,'IDENTIFICACION: ____________________________________________________',0,0);
        $pdf->Cell(50,35,'FECHA: _________________',0,1);
$pdf->ln(40);


// -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //
  
  $fontSize = 10;
  $marge    = 0.2;   // between barcode and hri in pixel
  $x        = $x1;  // barcode center
  $y        = $y1;  // barcode center
  $height   = 35;   // barcode height in 1D ; module size in 2D
  $width    = 1;  // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees
  
  $code     = $key[0];     // barcode (CP852 encoding for Polish and other Central European languages)
  $type     = 'code128';
  $black    = '000000'; // color in hex
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


}



$pdf->Output('example2.pdf','I');
?>

