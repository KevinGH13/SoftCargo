<?php require('../../modelo.php'); ?>

<?php 
 if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc']=="verificar2") {
    $value = $_REQUEST['value'];
    $listInfo = listdata(
      "1","tbl_ConsolidadoGuia","where int_ID = $value and int_Activo = 1"
      );
    if ($listInfo[0][0]=='1') {
      echo "0";
    }else{
      echo "1";
    }
  }
 }
  ?>

<?php 
 if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc']=="add_Fac") {
    $value = $_REQUEST['con'];
    $listInfo = listdata(
      "distinct int_Guia",
      "tbl_Guia",
      "where left(int_NEmpaque,11) = ".$value 
      );
    echo json_encode($listInfo);
  }
 }
  ?>

  <?php 
 if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc']=="add_share") {
    $value = $_REQUEST['Nconso'];
    $Si = listdata('1','tbl_ConsolidadosCompartidos','where int_Cosolidado = '.$value.' ');
    if ($Si[0][0] == "1") {
      echo 0;
    }else{
      $codigo = Codigo(15);
      insertData('tbl_ConsolidadosCompartidos','int_Cosolidado,int_Dias,var_fecha,int_Activo,var_codigoSeg',"".$value.",7,now(),1,'$codigo'");
      echo $codigo;
    }
  }
 }
   ?>

<?php 
  if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc']=="cap") {
    $value = $_REQUEST['cod'];
    $empresa = $_REQUEST['emp'];

    // abrimos la sesión cURL
$ch = curl_init();
 
// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"http://".$empresa.".easycargopro.com/view/shareFac/ctrl_share.php");
// definimos el número de campos o parámetros que enviamos mediante POST
curl_setopt($ch, CURLOPT_POST, 1);
// definimos cada uno de los parámetros
curl_setopt($ch, CURLOPT_POSTFIELDS, "atc=cap_s&cod='".$value."'");
 
// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
 
// cerramos la sesión cURL
curl_close ($ch);

$respuesta = json_decode($remote_server_output);
 
foreach ($respuesta as  $value) {
    insertData(

			"tbl_Guia",



			"int_Guia,
			var_NombreRemit,
      var_DireccionRemit,
      var_CiudadRemit,
      var_EstadoRemit,
      var_PaisRemit,
      int_CodZipRemit,
      var_TelefonoRemit,
      var_EmailRemit,
      Int_ciudadRemitente,
		
	  var_NombreDest,
      var_DireccionDest,
      var_CiudadDest,
      var_EstadoDest,
      var_PaisDest,
      int_CodZipDest,
      var_TelefonoDest,
      var_EmailDest,
      int_ciudadDestinatario,	

      var_TipoPago,
      decimal_PesoManual,
      decimal_DimAltoManual,
      decimal_DimAnchoManual,
      decimal_DimLargoManual,

      decimal_PesoCobrado,
      int_Activo,
      int_Servicio,
      int_ValorDeclaradoManual,
      var_DescripcionContenido

      ",
		"".$value -> int_Guia.",
			'".$value -> var_NombreRemit."',
			'".$value -> var_DireccionRemit."',
			'".$value -> var_CiudadRemit."',
			'".$value -> var_EstadoRemit."',
			'".$value -> var_PaisRemit."',
			".$value -> int_CodZipRemit.",
			'".$value -> var_TelefonoRemit."',
			'".$value -> var_EmailRemit."',
			".$value -> Int_ciudadRemitente.",

			'".$value ->  var_NombreDest."',
			'".$value ->  var_DireccionDest."',
			'".$value ->  var_CiudadDest."',
			'".$value ->  var_EstadoDest."',
			'".$value ->  var_PaisDest."',
			".$value ->  int_CodZipDest.",
			'".$value -> var_TelefonoDest ."',
			'".$value -> var_EmailDest ."',
			".$value -> int_ciudadDestinatario.",

			'NO',
			0,
			0,
			0,
			0,
			
			".$value -> decimal_PesoCobrado.",
			1,
			0,
			".$value -> int_ValorDeclaradoManual.",
			'".$value -> var_DescripcionContenido."'"



		);
}

 
echo $remote_server_output;

    }
  }
 ?>

<?php 
  if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc']=="cap_s") {
    $cod = $_REQUEST['cod'];
    $Compartido = listdata('var_fecha,int_Dias,int_ID','tbl_ConsolidadosCompartidos',"where var_codigoSeg = '$cod' and int_Activo = 1 ");
    $fechaActual = date("Y-m-d H:i:s"); 
    $fechaInicio = date("Y-m-d H:i:s",$Compartido[0][0]);
    $Dias = $Compartido[0][1];
    $interval = date_diff($fechaActual,$fechaInicio);
    
    if ($interval < $Dias) {
      $res = listdata(
      "CC.int_ID,
      G.int_Guia,

      G.var_NombreRemit,
      G.var_DireccionRemit,
      G.var_CiudadRemit,
      G.var_EstadoRemit,
      G.var_PaisRemit,
      G.int_CodZipRemit,
      G.var_TelefonoRemit,
      G.var_EmailRemit,
      G.Int_ciudadRemitente,

      G.var_NombreDest,
      G.var_DireccionDest,
      G.var_CiudadDest,
      G.var_EstadoDest,
      G.var_PaisDest,
      G.int_CodZipDest,
      G.var_TelefonoDest,
      G.var_EmailDest,
      G.int_ciudadDestinatario,

      G.int_ValorDeclaradoManual,
      G.decimal_PesoCobrado,
      G.var_DescripcionContenido

      ","tbl_Guia G","inner join tbl_ConsolidadosCompartidos CC on CC.int_Cosolidado = left(G.int_NEmpaque,11) where CC.int_Activo = 1 and CC.var_codigoSeg=$cod and G.int_Activo = 1"
      );
    updateDataValue('tbl_ConsolidadosCompartidos','int_Activo = 0',$res[0][0],'int_ID');
    echo json_encode($res);
     } else{
       updateDataValue('tbl_ConsolidadosCompartidos','int_Activo = 0',$Compartido[0][2],'int_ID');
       $respuesta = array('0' => 0,'1' => $Compartido[0][0] );
       echo json_encode($respuesta);
     }
    
  }
 }
 ?>
<?php  
     function Codigo($longitud){

     $key = '';
  $pattern = '1234*56+78?90abcdefghijKLMnopqrsTuVwXyz';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
  return $key;
   }
   ?>