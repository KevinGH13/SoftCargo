<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions,$lim){
		if($lim == NULL){
			$lim = 1000;
		}else{
			$lim;
		}

		$listInfo =listData(
			"int_ID,int_Guia,var_NombreRemit,var_DireccionRemit,var_CiudadRemit,var_EstadoRemit,var_PaisRemit,int_CodZipRemit,var_TelefonoRemit,var_EmailRemit,
			var_NombreDest,var_DireccionDest,var_CiudadDest,var_EstadoDest,var_PaisDest,int_CodZipDest,var_TelefonoDest,var_EmailDest,
			var_TipoPago,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,decimal_PesoCobrado,
			int_ValorDeclarado,int_ValorDeclaradoManual,int_ValorSeguro,int_ValorSeguroManual,int_CargosEmpresa,int_CargosAgente,int_Descuentos,int_TotalPagar,var_DescripcionContenido,int_factura,var_Agente,date_FechaEnvio",
			"tbl_Guia",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID  LIMIT 0,".$lim);
		return $listInfo;
	}

	//LISTAR DATOS AGENCIAS
	function sel2($conditions){
		$listInfo2 =listData(
			"int_ID, var_Agente,var_Direccion,var_Ciudad, var_Estado,int_CodZip",
			"tbl_Agentes",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Agente");
		return $listInfo2;
	}

	//LISTAR DATOS SERVICIOS
	function sel3($conditions){
		$listInfo3 =listData(
			"int_ID, var_Servicio",
			"tbl_Servicios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Servicio");
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
		$listInfo7 = listData(
			"max(right(int_Guia,5))",
			"tbl_Guia",
			" WHERE left(int_Guia,15) = $conditions",
			"");
		return $listInfo7;
	}
	function sel8($conditions){
		$listInfo8 =listData(
			"DISTINCT var_Pais",
			"tbl_Ciudades",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Pais");
		return $listInfo8;
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
$vrcId_Empresa = sel5();
$vrcId_EmpresaAgen = sel4("int_ID = $vrcTex0");
$vrcId_Ciudad = sel6("$vrcTex11");
//$vrcFechaCreacion = date("y")."-".date('m')."-".date("d")." ".date("H").":".date("i").":".date("s");
$vrcValoresCadena = date('y').str_pad($vrcId_Empresa[0][0], 3 , "0" ,STR_PAD_LEFT).str_pad($vrcId_EmpresaAgen[0][0], 3, "0",STR_PAD_LEFT).str_pad($vrcTex0, 3, "0",STR_PAD_LEFT).str_pad($vrcId_Ciudad[0][0], 4, "0",STR_PAD_LEFT) ;
$vrcGuiaNumero = sel7($vrcValoresCadena);
$aux = $vrcGuiaNumero;
if ($vrcGuiaNumero[0][0] != NULL && $vrcGuiaNumero[0][0] != "" ) {
	$vrcGuiaNumero[0][0] = $vrcValoresCadena.str_pad(($vrcGuiaNumero[0][0]+1),5,"0",STR_PAD_LEFT);
}else{
	$vrcGuiaNumero[0][0] = $vrcValoresCadena.str_pad("1", 5,"0",STR_PAD_LEFT);
}
//calculos
$vrcTextarifa = $_REQUEST['Tar'];
//Agente


		$addInfo =insertData(
			"tbl_Guia",

			"int_Guia,var_NombreRemit,var_DireccionRemit,var_CiudadRemit,var_EstadoRemit,var_PaisRemit,int_CodZipRemit,var_TelefonoRemit,var_EmailRemit,
			var_NombreDest,var_DireccionDest,var_CiudadDest,var_EstadoDest,var_PaisDest,int_CodZipDest,var_TelefonoDest,var_EmailDest,
			var_TipoPago,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,decimal_PesoCobrado,
			int_ValorDeclarado,int_ValorDeclaradoManual,int_ValorSeguro,int_ValorSeguroManual,int_CargosEmpresa,int_CargosAgente,int_Descuentos,int_TotalPagar,var_DescripcionContenido,int_Activo,var_Agente,int_factura,date_FechaEnvio",
			//DATA
			"".$vrcGuiaNumero[0][0].",'$vrcTex1','$vrcTex3','$vrcTex4','$vrcTex5','$vrcTex6','$vrcTex7','$vrcTex8','$vrcTex10',
			'$vrcTex2','$vrcTex9','$vrcTex11','$vrcTex12','$vrcTex13','$vrcTex15','$vrcTex14','$vrcTex16',
		    '$vrcTex27',$vrcTex17,$vrcTex31,$vrcTex32,$vrcTex21,$vrcPesoCo,
			$vrcTexdeclarado,$vrcTex19,$vrcTexseguro,$vrcTex20,$vrcTex24,$vrcTex22,$vrcTex25,$vrcTextotal,'$vrcTex23',1,'$vrcTex0',$vrcTextarifa,now()"
			);
		echo "nfactura=".$vrcGuiaNumero[0][0]."&IDAgente=$vrcTex0";
		}
	}
?>

<?php
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="upd"){

$vrcTex0 = $_REQUEST['txtCampo0'];
//Remitente
$vrcTex1 = $_REQUEST['txtCampo1'];
$vrcTex3 = $_REQUEST['txtCampo3'];
$vrcTex4 = $_REQUEST['txtCampo4'];
$vrcTex5 = $_POST['txtCampo5'];
$vrcTex6 = $_POST['txtCampo6'];
$vrcTex8 = $_POST['txtCampo8'];
$vrcTex7 = $_POST['txtCampo7'];

$vrcTex10 = $_POST['txtCampo10'];
//destinatario

$vrcTex2 = $_POST['txtCampo2'];
$vrcTex9 = $_POST['txtCampo9'];
$vrcTex11 = $_POST['txtCampo11'];
$vrcTex12 = $_POST['txtCampo12'];
$vrcTex14 = $_POST['txtCampo14'];
$vrcTex15 = $_POST['txtCampo15'];
$vrcTex16 = $_POST['txtCampo16'];

//info enviio
$vrcTex33 = $_POST['txtCampo33'];
$vrcTex21 = $_POST['txtCampo21'];
$vrcTex31 = $_POST['txtCampo31'];
$vrcTex32 = $_POST['txtCampo32'];
$vrcTex17 = $_POST['txtCampo17'];
$vrcTex23 = $_POST['txtCampo23'];
$vrcTex18 = $_POST['txtCampo18'];
$vrcTex19 = $_POST['txtCampo19'];
$vrcTex20 = $_POST['txtCampo20'];
$vrcTex22 = $_POST['txtCampo22'];
$vrcTex24 = $_POST['txtCampo24'];
$vrcTex25 = $_POST['txtCampo25'];
$vrcTex27 = $_POST['txtCampo27'];
//calculos
$vrcTextarifa = $_POST['txtTarifa'];
$vrcTexdeclarado = $_POST['txtDeclarado'];
$vrcTexseguro = $_POST['txtSeguro'];
$vrcTexadage = $_POST['txtAdAgencia'];
$vrcTexadempr = $_POST['txtAdEmpresa'];
$vrcTexdescuento = $_POST['txtDescuento'];

$vrcTextontal = $_POST['txtTotal'];


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

			$vrcID = $_REQUEST['int_Guia'];
			$delInfo =deleteData(
				"tbl_Guia",
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


		$listInfo4 = listData(
			"int_PesoInicial,int_PesoDesde,int_PesoHasta,int_LibraInicialAgente,int_LibraInicial,int_LibraAdicionalAgente,int_LibraAdicional,bol_Seguro,bol_Declarado,int_ValorFijoAgente,int_ValorFijoEmpresa,int_CCAgente,int_CCEmpresa,int_ConcCCAgente,int_ConcCCEmpresa",
			"tbl_Tarifas",
			"WHERE int_PesoDesde <= $peso and  $peso <=  int_PesoHasta   and int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent ;",
			""
			);
			if (empty($listData4)) {
				echo  json_encode($listInfo4);	}
			else{
				$rep  = '{"0":"NODATA"}';
				echo json_decode($rep);	 }

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
