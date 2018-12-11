<?php session_start(); ?>

<?php require('../../modelo.php'); ?>



<?php
	//listar Awb
	function sel2($conditions){
		$listInfo =listData(
			"var_awbn,var_toawb,var_nombrerem, var_aeropartida,var_fechaCreacion,int_ID",
			"tbl_Awb",
			"WHERE int_tipo = 0 AND int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
	function sel($conditions){
		$listInfo =listData(
			"int_IDawb,dec_peso,var_Articulo,dec_PesoCobrado,dec_tarifa,dec_Total,var_Contenido",
			"tbl_pieces",
			"WHERE  ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
		function selco($conditions){
		$listInfo =listData(
			"dec_Pesocobrado,int_IDawb ,dec_totalOtrosAge,dec_totalOtrosTrans, 
			dec_total, dec_vlrAd ",
			"tbl_CobrosAwb",
			"WHERE  ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
	//consultar las ciudades
		function selc($conditions){
		$listInfo =listData(
			"int_ID, var_Ciudad",
			"tbl_Ciudades_iata",
			"WHERE int_Activo = '1' AND var_Pais = 'COLOMBIA' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}


		//consulto La Emp
	function seluser($conditions){
		$listInfo =listData(
			"int_ID,int_emp",
			"tbl_Usuarios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"");
		return $listInfo;

	}
	function sel1($conditions){
		$listInfo =listData(
			"int_ID,var_Nombre",
			"tbl_Transportador",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
		function sel8($conditions){

		$listInfo8 =listData(

			"DISTINCT var_Pais,int_Pais",

			"tbl_Ciudades_iata",

			"WHERE int_Activo = '1' AND ".$conditions,

			"ORDER BY var_Pais");

		return $listInfo8;

	}
		function sel7($conditions){

		$listInfo7 = listData(

			"max(int_ID)",

			"tbl_Awb",

			" WHERE 1=1 ",

			"");

		return $listInfo7;

	}
?>



<?php

	//AÑADIR DATOS

	if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="add"){

$vrctextid = $_REQUEST['txtCamp1'];

//remitente 
$vrcTexR0 = $_REQUEST['txtCamp2'];
$vrcTexR1 = $_REQUEST['txtCamp3'];
$vrcTexR2 = $_REQUEST['txtCamp4'];
$vrcTexR3 = $_REQUEST['txtCamp53'];

//Destinatario
$vrcTexD0 = $_REQUEST['txtCamp5'];
$vrcTexD1 = $_REQUEST['txtCamp6'];
$vrcTexD2 = $_REQUEST['txtCamp7'];
$vrcTexD3 = $_REQUEST['txtCamp8'];


//AGENTE
$vrcAge1 = $_REQUEST['txtCampp1'];
$vrcAge2 = $_REQUEST['txtCampp2'];
$vrcAge3 = $_REQUEST['txtCampp3'];

//agente iata code
$vrcAgiataCod = $_REQUEST['txtCamp10'];
$vrcAccount = $_REQUEST['txtCamp11'];
$vrcInfoAcc = $_REQUEST['txtCamp24'];

//By first Cairrier
$vrcFirstCa = $_REQUEST['txtCamp13'];
$vrcto1 = $_REQUEST['txtCamp14'];
$vrcby1 = $_REQUEST['txtCamp15'];
$vrcto2 = $_REQUEST['txtCamp16'];
$vrcby2 = $_REQUEST['txtCamp17'];
$vrcMoned = $_REQUEST['txtCamp28'];

//optional shipping
$vrcRefnumber = $_REQUEST['txtCamp25'];
$vrcShipp1 = $_REQUEST['txtCamp26'];
$vrcShipp2 = $_REQUEST['txtCamp27'];

//Aeropuerto

$Aeropuertosalid = $_REQUEST['txtCamp12'];
$Aeropuertolleg = $_REQUEST['txtCamp18'];
$Aeropuertofecha1 = $_REQUEST['txtCamp19'];
$Aeropuertofecha2 = $_REQUEST['txtCamp20'];
$fechaCreacion = $_REQUEST['txtCamp51'];
//$AeropuertollegCiud = $_REQUEST['txtCamp'];

//$terminopag = $_REQUEST['txtCamp'];

//Transporte
$vrcTrans1 = $_REQUEST['txtCamp21'];
$vrcTrans2 = $_REQUEST['txtCamp22'];
$vrcTrans3 = $_REQUEST['txtCamp23'];


//declarado
$cargadeclarado = $_REQUEST['txtCamp34'];
$declraduana = $_REQUEST['txtCamp35'];
$valoraseg = $_REQUEST['txtCamp36'];
$vrcHadding = $_REQUEST['txtCamp37'];
//terminos de pago

$otherCharges =$_REQUEST['txtCamp50'];
$terminpago;
$terminpagother;
$vrcToAWB = $_REQUEST['txtCampto'];
$vrcPrefawb = $_REQUEST['txtCamppref'];
//Cobros

//Prepaid
$vrcppd1 = $_REQUEST['txtCamp38'];
$vrcppd2 = $_REQUEST['txtCamp40'];
$vrcppd3 = $_REQUEST['txtCamp42'];
$vrcppd4 = $_REQUEST['txtCamp44'];
$vrcppd5 = $_REQUEST['txtCamp46'];
$vrcppd6 = $_REQUEST['txtTotalp'];
//collet
$vrccod1 = $_REQUEST['txtCamp39'];
$vrccod2 = $_REQUEST['txtCamp41'];
$vrccod3 = $_REQUEST['txtCamp43'];
$vrccod4 = $_REQUEST['txtCamp45'];
$vrccod5 = $_REQUEST['txtCamp47'];
$vrccod6 = $_REQUEST['txtTotalc'];
//other
$vrcshipperA = $_REQUEST['txtCampsig'];
$terminpagother = "1";$terminpago = "1";
$idAwb;
$vrcEmp = $_REQUEST['txtemp'];
$vrcint = sel7("Final Int");
if($vrcint[0][0] != NULL && $vrcint[0][0] != ""){
$idAwb =$vrcint[0][0] +1;
}else{
$idAwb=1;
}
if($_REQUEST['txtCamp30']== 'on' and $_REQUEST['txtCamp31'] != 'on'){
$terminpago = "1";
}else if($_REQUEST['txtCamp31']== 'on' and $_REQUEST['txtCamp30'] != 'on'){$terminpago = "0"; }

if($_REQUEST['txtCamp32']== 'on' and $_REQUEST['txtCamp33'] != 'on'){
$terminpagother = "1";
}else if($_REQUEST['txtCamp33']== 'on' and $_REQUEST['txtCamp32'] != 'on'){$terminpagother = "0"; }


//echo "<script language='javascript'>alert('".$vrcEmp."');</script>";
	$addInfo =insertData(

			"tbl_Awb",


	"var_awbn,var_nombrerem,var_estadorem,var_paisrem,var_ziprem,
var_nombredes,var_ciudaddes,var_paisdes,var_zipdes,
var_transportador,var_tranciudad,var_tranpaiscode,
var_fechavuelo,var_aeropartida,var_aerollegada,
var_iatacode,var_termpago,var_tipomoneda,var_vlrcDeclr,var_vlrADecl,var_Aseg,
var_cuenta,var_infocuenta,var_handing,var_fechaCreacion,
int_Empres,var_agen1,var_agen2,var_agen3,var_refNumb,var_ShippInf1,var_ShippInf2,
var_to1,var_by1,var_to2,var_by2,var_termpagoOther,var_fechavuelo2,var_firstcarrie,var_toawb,var_shipperA,var_othCharg,var_prefawb",

			"'$vrctextid', '$vrcTexR0', '$vrcTexR1', '$vrcTexR2' ,'$vrcTexR3',
			 '$vrcTexD0' ,'$vrcTexD1', '$vrcTexD2','$vrcTexD3',
			 '$vrcTrans1', '$vrcTrans2', '$vrcTrans3',
			 '$Aeropuertofecha1','$Aeropuertosalid','$Aeropuertolleg',
			 '$vrcAgiataCod','$terminpago','$vrcMoned','$cargadeclarado','$declraduana','$valoraseg',
			 '$vrcAccount','$vrcInfoAcc','$vrcHadding', '$fechaCreacion',
			 '$vrcEmp','$vrcAge1','$vrcAge2','$vrcAge3','$vrcRefnumber', '$vrcShipp1', '$vrcShipp2',
			 '$vrcto1','$vrcby1','$vrcto2','$vrcby2','$terminpagother','$Aeropuertofecha2','$vrcFirstCa','$vrcToAWB','$vrcshipperA',
			 '$otherCharges','$vrcPrefawb'");

for ($i=0; $i <4 ; $i++){

$vrcTex0 = $_REQUEST['txtCamponP'.$i];
$vrcTex1 = $_REQUEST['txtCampoGross'.$i];
$vrcTex2 = $_REQUEST['txtCampoParcticle'.$i];
$vrcTex3 = $_REQUEST['txtCampoPWeight'.$i];
$vrcTex4 = $_REQUEST['txtCampoPrate'.$i];
$vrcTex5 = $_REQUEST['txtCampoPtotal'.$i];
$vrcTex6 = $_REQUEST['txtCampoPContent'.$i];
if ($vrcTex0 != NULL and $vrcTex5 != "" ) {
	$addInfo =insertData(

			"tbl_pieces",
			"int_IDawb,int_Piezas,dec_peso,var_Articulo,dec_PesoCobrado,dec_tarifa,dec_Total,var_Contenido",
			"$idAwb,'$vrcTex0','$vrcTex1','$vrcTex2','$vrcTex3','$vrcTex4','$vrcTex5','$vrcTex6'"
			
			);

	}else{

	
		
	}
}

		$addInfo =insertData(

			"tbl_CobrosAwb",
			"dec_Pesocobrado,dec_CargoMinimo,dec_tax,dec_totalOtrosAge,dec_totalOtrosTrans,dec_total,
			int_IDawb,dec_cPesocobrado,dec_cCargoMinimo,dec_ctax,dec_ctotalOtrosAge,dec_ctotalOtrosTrans,tbl_ctotal",

			"'$vrcppd1','$vrcppd2','$vrcppd3','$vrcppd4','$vrcppd5','$vrcppd6',
			$idAwb,'$vrccod1','$vrccod2','$vrccod3','$vrccod4','$vrccod5','$vrccod6'");
		

echo "<script language=Javascript> window.open('awb.php?awbid=".$idAwb."','_blank')</script>"; 
		}

	}

?>



<?php

	//ACTUALIZAR DATOS

	if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="upd"){







		$updInfo =updateData(

			"tbl_Guias",

			"var_Guia='$vrcTex1', var_Direccion='$vrcTex3', var_Ciudad='$vrcTex4',

			 var_Estado='$vrcTex5', var_Pais='$vrcTex6', int_CodZip=$vrcTex7, var_Telefono='$vrcTex8', var_Fax='$vrcTex9',

			 var_Email='$vrcTex10', int_Identificacion='$vrcTex11', int_PesoMax=$vrcTex12",

			$vrcID);



			echo "<script language='javascript'>reloaded('agents');</script>";

		}

	}

?>



<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
		
			$vrcID = $_REQUEST['di'];	
			$delInfo =deleteData(
				"tbl_Awb",
				$vrcID);
		}
	}
?>

<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="pais"){
			$int_Pais = $_REQUEST['p'];
			$listDatas = listData(
				"int_ID,concat(var_Ciudad,',',var_Estado,',',var_Pais)",
				"tbl_Ciudades_iata"
				,"where int_Pais = $int_Pais and int_Activo = 1 "
				);
			echo json_encode($listDatas);
		}
	}
?>










