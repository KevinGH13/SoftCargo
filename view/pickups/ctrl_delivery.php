<?php require('../../modelo.php'); ?>


<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			//Data Box Delivery
			$vrcName = $_REQUEST['txtName'];
			$vrcAddress = $_REQUEST['txtAddress'];
			$vrcIdCountry = $_REQUEST['txtCampo6'];
			$vrcCountry = $_REQUEST['CampoPais'];
			$vrcCity = $_REQUEST['txtCampo4'];
			$vrcState = $_REQUEST['txtCampo5'];
			$vrcPostalCode = $_REQUEST['txtPostalCode'];
			$vrcTelephone = $_REQUEST['txtTelephone'];
			$vrcEmail = $_REQUEST['txtEmail'];
			$vrcBoxReceiver = $_REQUEST['txtBoxReceiver'];
			$vrcBoxDispatcher = $_REQUEST['txtBoxDispatcher'];
			$vrcDate = $_REQUEST['txtDate']; //Revisar el envio de la fecha 
			$vrcNotes = $_REQUEST['txtNotes'];

			//Send Data

			$addInfo = insertData(
				"tbl_boxdelivery",
			
				"int_ID, var_Name, var_Address, int_IDCountry, var_Country, var_State, var_PostalCode, var_Telephone, var_Email, 
				var_BoxReceiver, var_BoxDispatcher, var_Date, var_Notes",

				"'null', '$vrcName', '$vrcAddress', '$vrcIdCountry', '$vrcCountry', '$vrcCity', '$vrcState', '$vrcPostalCode', '$vrcTelephone', '$vrcEmail', 
				'$vrcBoxReceiver', '$vrcBoxDispatcher', '$vrcDate', '$vrcNotes'");
		//echo "nfactura=".$vrcGuiaNumero[0][0]."&IDAgente=$vrcTex0";
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
