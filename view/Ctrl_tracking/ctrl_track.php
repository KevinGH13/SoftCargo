<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Guia, var_Direccion, var_Ciudad, var_Estado, var_Pais, int_CodZip, var_Telefono, var_Fax, var_Email,
				int_Identificacion, int_PesoMax",
			"tbl_Guias",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
	
	//LISTAR DATOS AGENCIAS
	function sel2($conditions){
		$listInfo2 =listData(
			"int_ID, var_Agente",
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


?>

<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			$vrcValoresCadena =
				$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_POST['txtCampo5'];
				$vrcTex6 = $_POST['txtCampo6'];
				$vrcTex7 = $_POST['txtCampo7'];
				$vrcTex8 = $_POST['txtCampo8'];
				$vrcTex9 = $_POST['txtCampo9'];										
				$vrcTex10 = $_POST['txtCampo10'];
				$vrcTex11 = $_POST['txtCampo11'];
				$vrcTex12 = $_POST['txtCampo12'];
				
		$addInfo =insertData(
			"tbl_Guias",
			"var_Guia, var_Direccion, var_Ciudad, var_Estado, var_Pais, int_CodZip, var_Telefono, var_Fax, var_Email,
				int_Identificacion, int_PesoMax, int_Activo",
			"'$vrcTex1', '$vrcTex3', '$vrcTex4', '$vrcTex5', '$vrcTex6',$vrcTex7,'$vrcTex8','$vrcTex9',
			'$vrcTex10', $vrcTex11,$vrcTex12, 1");
			
			echo "<script language='javascript'>reloaded('agents');</script>";
		}
	}
?>

<?php
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="upd"){
			$vrcID = $_REQUEST['id'];
		 	$vrcTex1 = $_REQUEST['txtCampo1'];
		   	$vrcTex3 = $_REQUEST['txtCampo3'];
		    $vrcTex4 = $_REQUEST['txtCampo4'];
			$vrcTex5 = $_REQUEST['txtCampo5'];
			$vrcTex6 = $_REQUEST['txtCampo6'];
			$vrcTex7 = $_REQUEST['txtCampo7'];
			$vrcTex8 = $_REQUEST['txtCampo8'];
			$vrcTex9 = $_REQUEST['txtCampo9'];
			$vrcTex10 = $_REQUEST['txtCampo10'];
			$vrcTex11 = $_REQUEST['txtCampo11'];
			$vrcTex12 = $_REQUEST['txtCampo12'];
			
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
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Guias",
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
			"int_ValorFijo,bol_Seguro,bol_Declarado",
			"tbl_Tarifas",
			"WHERE int_PesoDesde <= $peso and  $peso <=  int_PesoHasta   and int_Activo = 1 and var_Servicio='$servicio' and var_Pais = '$pais' and int_IDAgente=$agent;",
			""
			);
			if (empty($listData4)) {
				echo  json_encode($listInfo4);	}
			else{
				echo "<script>alert('No hay tarifas para ese precio');</script>"; }
		
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
			"int_ValorDeclaradoMin",
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
			"int_ValorDeclaradoMin",
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