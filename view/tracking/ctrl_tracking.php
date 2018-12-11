<?php session_start(); ?>
<?php require('../../modelo.php'); ?>
<?php require('../../config/Default_data.php'); ?>

<?php
$int_tp = $_SESSION['int_tp'];	
	//LISTAR DATOS
	function sel($conditions,$lim,$conditions2){

		$listInfo =listData(

			"int_ID,int_Guia,var_NombreRemit,var_DireccionRemit,var_CiudadRemit,var_EstadoRemit,var_PaisRemit,int_CodZipRemit,var_TelefonoRemit,var_EmailRemit,

			var_NombreDest,var_DireccionDest,var_CiudadDest,var_EstadoDest,var_PaisDest,int_CodZipDest,var_TelefonoDest,var_EmailDest,

			var_TipoPago,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,decimal_PesoCobrado,

			int_ValorDeclarado,int_ValorDeclaradoManual,int_ValorSeguro,int_ValorSeguroManual,int_CargosEmpresa,int_CargosAgente,int_Descuentos,int_TotalPagar,var_DescripcionContenido,int_factura,var_Agente,date_FechaEnvio,int_CiudadDestinatario,int_ciudadRemitente,int_IDuser,int_CCEmpresa,
	int_CCAgente, int_TarEmpresa,int_TarAgente,int_SegEmpresa,int_SegAgente,
      int_ImpEmpresa,int_ImpAgente,int_Servicio,int_tracking,int_NEmpaque,int_Pago",

			"tbl_Guia ",

			"WHERE int_Activo = '1' AND ".$conditions2." AND ".$conditions,

			"ORDER BY date_FechaEnvio DESC");

		return $listInfo;

	}
function selindex($conditions,$conditions2){

		$listInfo =listData(

			"int_ID,int_Guia,int_tracking,date_FechaEnvio,decimal_PesoCobrado,var_NombreRemit,var_TelefonoRemit,

			var_NombreDest,var_TelefonoDest,int_CiudadDestinatario,int_Pago",

			"tbl_Guia",

			"WHERE int_Activo = '1' AND ".$conditions2." AND ".$conditions,

			"ORDER BY date_FechaEnvio DESC");

		return $listInfo;

	}



	//LISTAR DATOS AGENCIAS

	function sel2($conditions){

		$listInfo2 =listData(

			"int_ID, var_Agente,var_Direccion,var_Ciudad, var_Estado,int_CodZip",

			"tbl_Agentes",

			"WHERE int_Activo = '1' AND int_TipoAgente = 1 AND ".$conditions,

			"ORDER BY var_Agente");

		return $listInfo2;

	}

		function seliata($conditions){

		$listInfo =listData(

			"int_ID, var_Ciudad,var_Estado,var_Pais,var_IATA",

			"tbl_Ciudades_iata",

			"WHERE int_Activo = '1' AND ".$conditions,

			"");

		return $listInfo;

	}

			function seluser($conditions){
		$listInfo =listData(
			"var_Nombre",
			"tbl_Usuarios",
			"WHERE ".$conditions,
			" ");
		return $listInfo;
	}
		function selser($conditions){
		$listInfo =listData(
			"var_Servicio,int_ID",
			"tbl_Servicios",
			"WHERE ".$conditions,
			" ");
		return $listInfo;
	}
	//LISTAR DATOS SERVICIOS

	function sel3($conditions){

		$listInfo3 =listData(

			"distinct S.var_Servicio,S.int_ID",

			"tbl_Servicios S",

			"INNER JOIN  tbl_Tarifas T on S.int_ID = T.var_servicio AND T.int_Activo = 1 AND S.int_activo = 1 AND ".$conditions,

			"ORDER BY S.var_Servicio");

		return $listInfo3;

	}

	function sel4($conditions){

		$listInfo4 =listData(

			"int_IdEmpresa",

			"tbl_Agentes",

			"WHERE int_Activo = '1' AND ".$conditions,

			"");

		return $listInfo4;

	}

	function sel5(){

		$listInfo5 = listData(

			"int_ID",

			"tbl_Empresa",

			"WHERE int_Principal = 1 ",

			""

		);

		return $listInfo5;

	}

	function sel6($conditions){

		$listInfo6 =listData(

			"int_ID",

			"tbl_Ciudades",

			"WHERE int_Activo = '1' AND var_Ciudad ='$conditions'",

			"");

		return $listInfo6;

	}

	function sel7($conditions){

		$consecutivo = listData( "max(right(int_Guia,9))","tbl_Guia","where date_FechaEnvio >= '2016-04-10' and int_Activo = 1 " );
		return $consecutivo;
		
		

	}	

	function sel8($conditions){

		$listInfo8 =listData(

			"DISTINCT var_Pais,int_Pais",

			"tbl_Ciudades_iata",

			"WHERE int_Activo = '1' AND ".$conditions,

			"ORDER BY var_Pais");

		return $listInfo8;

	}

	function selEstados($conditions){
		$listEstados = listData(
			"var_Fecha,E.var_Estado,GH.var_Comentario,GH.int_ID",
			"tbl_GuiaHistoricoEstados GH",
			"inner join tbl_EstadosCarga E on GH.int_Registro = E.int_ID where GH.int_ID_Guia = $conditions order by GH.var_Fecha DESC"
			);
		return $listEstados;
	}
	function selstatu($conditions){
	$listEstados = listData(
			"E.var_Estado",
			"tbl_GuiaHistoricoEstados GH",
			"inner join tbl_EstadosCarga E on GH.int_Registro = E.int_ID where GH.int_ID_Guia = $conditions AND E.int_Activo = '1'",
			"ORDER BY E.int_ID DESC LIMIT 1"
    );
		return $listEstados;
	}
	function selRegistro($conditions){
		$list = listData(
			"int_ID,var_Estado",
			"tbl_EstadosCarga",
			"where int_Activo = '1' AND $conditions"
			);
		return $list;
	}

	function selcon($con){
		$consolidado = listData("int_IDConsolidado","tbl_EmpaquesConsolidadoU","where int_IDEmpaque = $con ");
		return $consolidado;
	}
	function selComent(){
		$list = listData( "max(int_ID)","tbl_Guia","where 1=1 " );
		return $list;
	}
		function selNovedades($conditions){
		$listInfo =listData(
			"int_ID, var_Titulo, txt_Novedad, int_Agencias, bol_Publicada,var_tipo",
			"tbl_Novedades",
			"WHERE int_Activo = '1'  AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
?>

<?php
//Servicio de correo
function sendmail($to,$user,$guia){
$email = "harleng9@hotmail.com"; 
$asunto = "Creacion Usuario"; 
$pp= "'Open Sans'";
$cuerpo = ' 
<html> 
<head> 
   <title>correo</title> 
</head> 
<body style="font-family:'.$pp. ' , sans-serif; background: #1F2739; color:#DCDCDC;      text-align: center;"> 
<h1><b style="    font-weight: bold; color:#346F9A;">Informacion de su caja</b></h1> 
<div align="left" style="width: 100%;      text-align: center;"> 
<p> 
<b>Apreciado Cliente: '.$user.',con el siguiente numero:</b> <h3 style="color:#D64F4F;"> '.$guia.' </h3><br>
<b> podra consultar informacion detallada del estado de su caja.<br>
puede ingresar dando click en el link de abajo o escribiendolo en su navegador de mayor preferencia.</b><br>
<h3 style="    font-family: verdana, arial, sans-serif; 
   font-size: 13pt; 
   font-weight: bold; 
   padding: 4px; 
   background-color: #D64F4F; 
   margin-right: auto;
   margin-left: auto;
   width: 470px;
   padding: auto;
       text-align: center;
 border-radius: 25px;
    border: 2px solid #000;
   text-decoration: none; "><a href="'.$_SERVER["HTTP_HOST"].'/rastreo.php" style="   color: #DCDCDC; ">'.$_SERVER["HTTP_HOST"].'/rastreo.php </a></h3> 
<b>Gracias por contar con nosotros.</b><br>
</p> 
</div>
</body>  
</html> 
'; 
// Always set content-type when sending HTML email
/*
$headers = "MIME-Version: 1.0 " . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8 " . "\r\n";
$headers .= 'From: Informacion de cajas <Easycargopro@servicio.com>' . "\r\n";
$headers .= 'Return-path: Informacion de cajas <Easycargopro@servicio.com>' . "\r\n";
$headers .= "X-Priority: 1 \r\n";  
$headers .= "X-MSMail-Priority: High \r\n";  
$headers .= "X-Mailer: PHP/".phpversion()." \n";  
 */
// More headers
        $mailheaders = "MIME-Version: 1.0 \r\n";  
    $mailheaders .= "Content-type: text/html; charset=iso-8859-1 \r\n";  
    $mailheaders .= "From: EasycargoPro <no-replay@easycargopro.com> \r\n";  
 
    $mailheaders .= "X-Priority: 1 \r\n";  
    $mailheaders .= "X-MSMail-Priority: High \r\n";  
    $mailheaders .= "X-Mailer: PHP/".phpversion()." \n"; 


 mail("harleng9@hotmail.com","Informacion sobre su caja",$cuerpo,$mailheaders );
}
?>

<?php

	//AÑADIR DATOS

	if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="add"){

$vrcTexdeclarado = $_REQUEST['decl'];

$vrcTexseguro = $_REQUEST['seg'];

$vrcPesoCo = $_REQUEST['peso'];

$vrcTextotal = $_REQUEST["Tot"];

$gananciaAg = $_REQUEST['GAgente'];
$gananciaEm = $_REQUEST['GEmpresa'];

$vrcTextarifa = $_REQUEST['Tar'];

$vrcTarEm = $_REQUEST['int_TaEm'];
$vrcTarAg = $_REQUEST['int_TaAg'];

$vrcImpEm = $_REQUEST['int_ImEm'];
$vrcImpAg = $_REQUEST['int_ImAg'];

$vrcSegEm = $_REQUEST['int_SeEm'];
$vrcSegAg = $_REQUEST['int_SeAg'];

$adEmpre = $_REQUEST['Add1'];
$adAngen = $_REQUEST['Add2'];
$CCEmpresa = $_REQUEST['CC1'];
$CCAgente = $_REQUEST['CC2'];
$vrcTex0 = $_REQUEST['txtCampo0'];

//Remitente

$vrcTex1 = $_REQUEST['txtCampo1'];

$vrcTex3 = $_REQUEST['txtCampo3'];

$vrcTex4 = $_REQUEST['txtCampo4'];

$vrcTex5 = $_REQUEST['txtCampo5'];

$vrcTex6 = $_REQUEST['txtCampo6'];

$vrcTex8 = $_REQUEST['txtCampo8'];

$vrcTex7 = $_REQUEST['txtCampo7'];

$vrcTex10 = $_REQUEST['txtCampo10'];

//destinatario



$vrcTex2 = $_REQUEST['txtCampo2'];

$vrcTex9 = $_REQUEST['txtCampo9'];

$vrcTex11 = $_REQUEST['txtCampo11'];

$vrcTex12 = $_REQUEST['txtCampo12'];

$vrcTex13 = $_REQUEST['txtCampo13'];

$vrcTex14 = $_REQUEST['txtCampo14'];

$vrcTex15 = $_REQUEST['txtCampo15'];

$vrcTex16 = $_REQUEST['txtCampo16'];



//info enviio

$vrcTex33 = $_REQUEST['txtCampo33'];

$vrcTex21 = $_REQUEST['txtCampo21'];

$vrcTex31 = $_REQUEST['txtCampo31'];

$vrcTex32 = $_REQUEST['txtCampo32'];

$vrcTex17 = $_REQUEST['txtCampo17'];

$vrcTex23 = $_REQUEST['txtCampo23'];

$vrcTex18 = $_REQUEST['txtCampo18'];

$vrcTex19 = $_REQUEST['txtCampo19'];

$vrcTex20 = $_REQUEST['txtCampo20'];

$vrcTex22 = $_REQUEST['txtCampo22'];

$vrcTex24 = $_REQUEST['txtCampo24'];

$vrcTex25 = $_REQUEST['txtCampo25'];

$vrcTex27 = $_REQUEST['txtCampo27'];
$vrcTex30 = $_REQUEST['txtCampo30'];

$vrcId_Empresa = $int_Identificador_Empresa_Unico;

$vrcId_EmpresaAgen = sel4("int_ID = $vrcTex0");

$vrcId_Ciudad = sel6("$vrcTex11");

$c1 = $_REQUEST['ciudad1'];
$c2 = $_REQUEST['ciudad2'];


//$vrcFechaCreacion = date("y")."-".date('m')."-".date("d")." ".date("H").":".date("i").":".date("s");
$vrcIDComentario = selComent();
$vrcIDmax = $vrcIDComentario[0][0]+1;
$vrcValoresCadena = date('y').str_pad($vrcId_Empresa, 3 , "0" ,STR_PAD_LEFT).str_pad($vrcId_EmpresaAgen[0][0], 3, "0",STR_PAD_LEFT).str_pad($vrcTex0, 3, "0",STR_PAD_LEFT) ;

$vrcGuiaNumero = sel7($vrcValoresCadena);
$vrcGuiaNumero1 = sel7($vrcValoresCadena);

$aux = $vrcGuiaNumero;

if ($vrcGuiaNumero[0][0] != NULL && $vrcGuiaNumero[0][0] != "" ) {

	$vrcGuiaNumero[0][0] = $vrcValoresCadena.str_pad(($vrcGuiaNumero[0][0]+1),9,"0",STR_PAD_LEFT);

}else{

	$vrcGuiaNumero[0][0] = $vrcValoresCadena.str_pad("1", 9,"0",STR_PAD_LEFT);

}

	session_start();
	$int_ID = $_SESSION['id'];
		

		
		$addInfo =insertData(

			"tbl_Guia",



			"int_Guia,var_NombreRemit,var_DireccionRemit,var_CiudadRemit,var_EstadoRemit,var_PaisRemit,int_CodZipRemit,var_TelefonoRemit,var_EmailRemit,Int_ciudadRemitente,

			var_NombreDest,var_DireccionDest,var_CiudadDest,var_EstadoDest,var_PaisDest,int_CodZipDest,var_TelefonoDest,var_EmailDest,int_ciudadDestinatario,

			var_TipoPago,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,decimal_PesoCobrado,

			int_ValorDeclarado,int_ValorDeclaradoManual,int_ValorSeguro,int_ValorSeguroManual,int_CargosEmpresa,int_CargosAgente,int_Descuentos,int_TotalPagar,
			var_DescripcionContenido,int_Activo,var_Agente,int_factura,date_FechaEnvio,int_gananciaAgente,int_IDuser,int_Servicio,int_gananciaEmpresa,int_CCEmpresa,int_CCAgente,
			int_TarEmpresa,int_TarAgente,int_SegEmpresa,int_SegAgente,int_ImpEmpresa,int_ImpAgente,int_tracking",

			//DATA
// 22,23,25,30,34
			"".$vrcGuiaNumero[0][0].",'$vrcTex1','$vrcTex3','$vrcTex4','$vrcTex5','$vrcTex6','$vrcTex7','$vrcTex8','$vrcTex10',$c1,
			'$vrcTex2','$vrcTex9','$vrcTex11','$vrcTex12','$vrcTex13','$vrcTex15','$vrcTex14','$vrcTex16',$c2,
		    '$vrcTex27',$vrcTex17,$vrcTex31,$vrcTex32,$vrcTex21,$vrcPesoCo,
			$vrcTexdeclarado,$vrcTex19,$vrcTexseguro,$vrcTex20,$adEmpre,$adAngen,$vrcTex25,$vrcTextotal,'$vrcTex23',1,'$vrcTex0',$vrcTextarifa,now(),$gananciaAg,$int_ID,$vrcTex33,$gananciaEm,$CCEmpresa,$CCAgente,
			$vrcTarEm,$vrcTarAg,$vrcSegEm,$vrcSegAg,$vrcImpEm,$vrcImpAg,'$vrcTex30' "

			);
			insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Fecha,var_Comentario","".$vrcGuiaNumero[0][0].",1,now(),'Ninguno'");
					//Campos de ventana modal
if(isset($_REQUEST['txtCampoM1'])){
$vrcTexM1 = $_REQUEST['txtCampoM1'];
$vrcTexM2 = $_REQUEST['txtCampoM2'];

insertData(
			"tbl_Novedades",
			"var_Titulo, txt_Novedad, int_Agencias, bol_Publicada, int_Activo,var_tipo,int_visible,int_IDGuia",
			"'$vrcTexM1','$vrcTexM2', '0' ,'0', 1,'warning','0','$vrcIDmax'");
}

				
			//echo $vrcGuiaNumero[0][0];
			echo $vrcGuiaNumero[0][0]." ";
		}

	}

?>



<?php

	//ACTUALIZAR DATOS

	if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="upd"){



$vrcID = $_REQUEST['txtcdd'];

//Remitente
$vrcNombreR = $_POST['txtc2'];

$vrcDrcR = $_POST['txtc4'];
$vrcCityR = $_POST['txtCR'];
$vrcStateR = $_POST['txtSR'];




$vrcZipcR = $_POST['txtc10'];
$vrcTelR = $_POST['txtc12'];
//destinatario



$vrcNombreD = $_POST['txtc3'];

$vrcDrcD = $_POST['txtc5'];







$vrcZipcD = $_POST['txtc11'];
$vrcTelD = $_POST['txtc13'];




//info enviio
$vrcConten = $_POST['txtcCont'];


//altern numero
$vrcalter = $_POST['txtAlter'];
//ciudad
$vrcCiudad = $_POST['cdd1'];
$vrcCiudadd = $_POST['cdd2'];
//email
$vrcEmailr = $_POST['emr'];
$vrcEmaild = $_POST['emd'];
//serv
$vrcserv = $_POST['srv'];



		$updInfo =updateData(

			"tbl_Guia",

			"var_NombreDest='$vrcNombreD', var_DireccionDest='$vrcDrcD', 

			 int_CodZipDest='$vrcZipcD', var_TelefonoDest='$vrcTelD',
			 var_NombreRemit='$vrcNombreR', var_DireccionRemit='$vrcDrcR',var_EmailRemit='$vrcEmailr',
				
			var_EmailDest='$vrcEmaild', int_Servicio='$vrcserv',

			 int_CodZipRemit='$vrcZipcR', var_TelefonoRemit='$vrcTelR', var_DescripcionContenido='$vrcConten', int_tracking='$vrcalter', 
			 int_ciudadDestinatario ='$vrcCiudadd' , int_ciudadRemitente ='$vrcCiudad',
			 var_CiudadRemit= '$vrcCityR', var_EstadoRemit= '$vrcStateR'  ",

			$vrcID);

		}

	}

?>


<?php

	//Alertas DATOS

	if(isset($_REQUEST['txtCampoMwnd'])){

		if($_REQUEST['txtCampoMwnd']=="addwin"){


			$vrcTexM1 = $_REQUEST['txtCampoM1'];
			$vrcTexM2 = $_REQUEST['txtCampoM2'];
			
			$vrcID = $_REQUEST['txtcdd'];

			$delInfo =insertData(
			"tbl_Novedades",
			"var_Titulo, txt_Novedad, int_Agencias, bol_Publicada, int_Activo,var_tipo,int_visible,int_IDGuia",
			"'$vrcTexM1','$vrcTexM2',  '0' ,'0', 1,'warning','0','$vrcID'");

		}

	}

?>
<?php

	//DESACTIVAR DATOS

	if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="del"){



			$vrcID = $_REQUEST['int_Guia'];

			$delInfo =deleteData(

				"tbl_Guia",


				$vrcID);


		}

	}

?>
<?php

	//Ciudad

	if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="addxx"){


			$vrcCiudad = $_REQUEST['ciudad1'];
			$vrcID = $_REQUEST['vrcciudad'];

			$updInfo =updateData(

				"tbl_Guia",
				"int_ciudadDestinatario = ".$vrcCiudad,
				$vrcID);
		}

	}

?>


<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="query_rate"){

			$peso = $_REQUEST['peso'];

			$pais = $_REQUEST['pais'];

			$servicio = $_REQUEST['servicio'];

			$agent = $_REQUEST['agente'];
			$listInfo4  = array('0' => 'NO' );
			$listInfo5  = array('0' => '' );
			$listInfo6  = array('0' => '' );



		$listInfo4 = listData(

			"int_PesoInicial,
			int_PesoDesde,
			int_PesoHasta,
			int_LibraInicialAgente,
			int_LibraInicial,
			int_LibraAdicionalAgente,
			int_LibraAdicional,
			bol_Seguro,
			bol_Declarado,
			int_ValorFijoAgente,
			int_ValorFijoEmpresa,
			int_CCAgente,
			int_CCEmpresa,
			int_ConcCCAgente,
			int_ConcCCEmpresa",

			"tbl_Tarifas",

			"WHERE int_PesoDesde <= $peso and  $peso <=  int_PesoHasta   and int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent ;",

			""

			);
		
		if ($listInfo4[0][7] =="SI") {

			$listInfo6 = listData(

			"MIN(int_ValorMin),MAX(int_ValorMax),int_porcEmpresa,int_porcAgente",

			"tbl_Seguros",

			"WHERE int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent and int_opcional = 0 ;",

			""

			);

			if (count($listInfo6) == 0) {
					$listInfo6  = array('0' => '' );
				}


		}else{
			$listInfo6 = listData(

			"MIN(int_ValorMin),MAX(int_ValorMax),int_porcEmpresa,int_porcAgente",

			"tbl_Seguros",

			"WHERE int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent and int_opcional = 1 ;",

			""

			);

			if (count($listInfo6) == 0) {
					$listInfo6  = array('0' => '' );
				}
		}
		
		if ($listInfo4[0][8] =="SI") {

				$listInfo5 = listData(
	
					"int_ValorDeclaradoMin,int_porcEmpresa,int_porcAgente",
	
					"tbl_Impuestos",
	
					"WHERE int_PesoMin <= $peso and  $peso <=  int_PesoMax   and int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent and int_opcional = 0 ;",
	
					""
	
				);
				if (count($listInfo5) == 0) {
					$listInfo5  = array('0' => '' );
				}

		}else{
				$listInfo5 = listData(
	
					"int_ValorDeclaradoMin,int_porcEmpresa,int_porcAgente",
	
					"tbl_Impuestos",
	
					"WHERE int_PesoMin <= $peso and  $peso <=  int_PesoMax   and int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent and int_opcional = 1 ;",
	
					""
	
				);
				if (count($listInfo5) == 0) {
					$listInfo5  = array('0' => '' );
				}
		}

		
		$resultado = array_merge($listInfo4,$listInfo5,$listInfo6);
		echo json_encode($resultado);
		


		
		




	}

}

?>

<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="query_tax"){

			$peso = $_REQUEST['peso'];

			$pais = $_REQUEST['pais'];

			$servicio = $_REQUEST['servicio'];

			$agent = $_REQUEST['agente'];





		$listInfo4 = listData(

			"int_ValorDeclaradoMin,int_porcEmpresa,int_porcAgente",

			"tbl_Impuestos",

			"WHERE int_PesoMin <= $peso and  $peso <=  int_PesoMax   and int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent;",

			""

			);

			if (empty($listData4)) {

				echo  json_encode($listInfo4);	}

			else{

				echo "<script>alert('No hay impuestos para ese peso');</script>"; }



	}

}

?>



<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="query_insurange"){

			$peso = $_REQUEST['peso'];

			$pais = $_REQUEST['pais'];

			$servicio = $_REQUEST['servicio'];

			$agent = $_REQUEST['agente'];





		$listInfo4 = listData(

			"int_porcAgente,int_porcEmpresa",

			"tbl_Seguros",

			"WHERE int_ValorMin <= $peso and  $peso <=  int_ValorMax   and int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent;",

			""

			);

			if (empty($listData4)) {

				echo  json_encode($listInfo4);	}

			else{

				/*echo json_decode(['0',"NO"])*/ }



	}

}

?>



<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="query_max_and_min_insurange"){

			$peso = $_REQUEST['peso'];

			$pais = $_REQUEST['pais'];

			$servicio = $_REQUEST['servicio'];

			$agent = $_REQUEST['agente'];





		$listInfo4 = listData(

			"MIN(int_ValorMin),MAX(int_ValorMax)",

			"tbl_Seguros",

			"WHERE int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent;",

			""

			);

			if (empty($listData4)) {

				echo  json_encode($listInfo4);	}

			else{

				/*echo json_decode(['0',"NO"])*/ }



	}

}

?>

<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="query"){

			$nfac = $_REQUEST['query'];

	$listInfo10 =listData(

		"int_ID",

		"tbl_Guia",

		"WHERE int_Activo = '1' AND int_Guia = ".$nfac,

		"");

	if (count($listInfo10[0]) > 0) {

		echo 1 ;

	}else {

		echo 0 ;

	}



}}

 ?>

 <?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="reg"){
			$id = $_REQUEST['id'];
			$int_re = $_REQUEST['reg'];
			$comentario = $_REQUEST['comentario'];
		$SI = listdata("1","tbl_GuiaHistoricoEstados","where int_ID_Guia = $id and int_Registro >= $int_re");
 		

 		insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Fecha,var_Comentario","$id,$int_re,now(),'$comentario'");
 			echo "1 $id $int_re $comentario";
 		
		}
	}
?>

<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="pais"){
			$int_Pais = $_REQUEST['p'];
			$listDatas = listData(
				"int_ID,concat(var_Ciudad,',',var_Estado,',',var_Pais,',',var_Zona )",
				"tbl_Ciudades_iata"
				,"where int_Pais = $int_Pais and int_Activo = 1 "
				);
			echo json_encode($listDatas);
		}
	}
?>

<?php

	//ACTUALIZAR DATOS

	if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="cbr"){
$vrcID= $_REQUEST['txtcdd'];
$vrcpeso= $_REQUEST['txtp'];			
			//Tarifa
$vrctemp = $_REQUEST['txtf1'];
$vrctage = $_POST['txtf2'];

$vrcttotal = $vrctemp+ $vrctage;
//Seguro
$vrcSeguro = $_POST['txta0'];
$vrcsemp = $_POST['txta1'];
$vrcsage = $_POST['txta2'];

$vrcstotal = $vrcsemp+$vrcsage;
//Impuesto
$vrcDeclardo = $_POST['txtd0'];
$vrcDemp = $_POST['txtd1'];
$vrcDage = $_POST['txtd2'];

$vrcDtotal = $vrcDemp + $vrcDage;
//otros cargos
$vrcAdage = $_POST['txtaa'];
$vrcAdemp = $_POST['txtae'];
$vrcCca = $_POST['txtca'];
$vrcCce= $_POST['txtcd'];
$vrcDes = $_POST['txtdes'];

//sumatoria
$vrcTotal = ($vrcttotal+$vrcstotal+$vrcDtotal+$vrcAdage+$vrcAdemp+($vrcCca*$_REQUEST['txtp']) + ($vrcCce*$_REQUEST['txtp']))-$vrcDes;

		$updInfo =updateData(

			"tbl_Guia",

			"int_CCEmpresa = $vrcCce, int_CCAgente= $vrcCca,
			int_CargosEmpresa =$vrcAdemp,int_CargosAgente =$vrcAdage,	
			 int_TarEmpresa= $vrctemp,int_TarAgente= $vrctage,int_factura =$vrcttotal,
			 int_SegEmpresa= $vrcsemp,int_SegAgente=$vrcsage ,int_ValorSeguro = $vrcstotal,
      		int_ImpEmpresa=$vrcDemp ,int_ImpAgente=$vrcDage ,int_ValorDeclarado =$vrcDtotal,
      		decimal_PesoCobrado =$vrcpeso,int_ValorSeguroManual=$vrcSeguro,int_ValorDeclaradoManual=$vrcDeclardo, int_Descuentos=$vrcDes,int_TotalPagar=$vrcTotal",

			$vrcID);
	
		//echo "<script> window.open('index.php','_self');</script>"; 
		echo "$vrcttotal
$vrcSeguro
$vrcstotal 
$vrcDeclardo
$vrcDtotal
$vrcAdage
$vrcAdemp
$vrcCca
$vrcCce
$vrcTotal";
		}

	}

?>
<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="rem"){
			$remit;
			if(($_REQUEST['nv']) ==1){$remit = "G.var_TelefonoRemit ='".$_REQUEST['p']."'";}
			elseif (($_REQUEST['nv']) == 2 ) {$remit = "G.var_NombreRemit LIKE '%".$_REQUEST['p']."%'";}
			elseif (($_REQUEST['nv']) != 2 and ($_REQUEST['nv']) != 1 ) {$remit = "G.var_NombreRemit LIKE '%".$_REQUEST['p']."%' AND G.var_TelefonoRemit ='".$_REQUEST['nv']."' ";}
			$agent = $_REQUEST['ag'];
			$listDatas = listData(
				"DISTINCT concat(G.var_NombreDest,',',G.var_DireccionDest,',',G.int_CodZipDest,',',
				G.var_TelefonoDest,',',G.var_EmailDest,',',ia.var_Ciudad,',',ia.var_Estado,',',ia.var_Pais,',',G.int_CiudadDestinatario)",
				"tbl_Guia G"
				,"INNER JOIN tbl_Ciudades_iata ia ON G.int_CiudadDestinatario =  ia.int_ID AND  G.int_Activo = 1 AND G.var_Agente='$agent' AND $remit ORDER BY G.int_ID DESC"
				);
			echo json_encode($listDatas);
		}
	}
?>
<?php
if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="rem2"){
			$remit;
			if(($_REQUEST['nv']) ==1){$remit = "G.var_TelefonoRemit ='".$_REQUEST['p']."'";}
			elseif (($_REQUEST['nv']) == 2 ) {$remit = "G.var_NombreRemit LIKE'%".$_REQUEST['p']."%'";}
			elseif (($_REQUEST['nv']) != 2 and ($_REQUEST['nv']) != 1 ) {$remit = "G.var_NombreRemit LIKE '%".$_REQUEST['p']."%' AND G.var_TelefonoRemit ='".$_REQUEST['nv']."' ";}	
			$agent = $_REQUEST['ag'];
			$listDatas = listData(
				"DISTINCT  concat(  G.var_NombreRemit,',',G.var_DireccionRemit,',',G.int_CodZipRemit,',',
				G.var_TelefonoRemit,',',G.var_EmailRemit,',',ia.var_Ciudad,',',ia.var_Estado,',',ia.var_Pais,',',G.int_ciudadRemitente)",
				"tbl_Guia G"
				,"INNER JOIN tbl_Ciudades_iata ia ON G.int_ciudadRemitente =  ia.int_ID AND G.int_Activo = 1 AND G.var_Agente='$agent' AND $remit"
				);
			echo json_encode($listDatas);
		}
	}
?>

<?php
if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="s_agent"){

			$conditions = $_POST['value'];

			$listInfo3 =listData(

			"distinct S.var_Servicio,S.int_ID",

			"tbl_Servicios S",

			"INNER JOIN  tbl_Tarifas T on S.int_ID = T.var_servicio AND T.int_Activo = 1 AND S.int_activo = 1 AND T.int_IDAgente =".$conditions,

			"ORDER BY S.var_Servicio");

		echo json_encode($listInfo3);
		}
	}
?>

<?php  
if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="edt_R"){
			$id = $_POST['id'];
			$idc =  $_POST['idc'];
			$comc =  $_POST['comc'];
			$fecc =  $_POST['fecc'];

			updateData('tbl_GuiaHistoricoEstados',"var_Fecha = '$fecc',int_Registro=$idc,var_Comentario='$comc'",$id);

			

		}
	}
?>

<?php  
if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="impre"){
			$id = $_REQUEST['dato'];
			$response = listData("var_NombreRemit,var_TelefonoRemit,var_NombreDest,var_TelefonoDest, CI.var_Ciudad,CI.var_Estado,CI.var_Pais,CI.var_IATA,var_DescripcionContenido,decimal_PesoCobrado,G.int_Guia","tbl_Guia G","inner join tbl_Ciudades_iata CI on G.int_ciudadRemitente = CI.int_ID where G.int_Guia = $id");
			echo json_encode($response);
		}
	}
?>
<?php  
if(isset($_REQUEST['act'])){
		$id = $_REQUEST['id'];
		if($_REQUEST['act']=="del_E"){
			execute_query("DELETE  FROM tbl_GuiaHistoricoEstados WHERE int_ID =" . $id );
			/*execute_query("UPDATE  tbl_GuiaHistoricoEstados SET int_Activo=0 where int_ID = " . $id );*/
			echo ("Registro eliminado $id");
		}
	}
?>