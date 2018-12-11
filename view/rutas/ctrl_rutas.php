<?php require('../../modelo.php'); ?>
<?php 

	function direccion(){
	$direccion = listData("CONCAT (var_Direccion,',', var_Ciudad,',', var_Estado,',',var_Pais)","tbl_Empresa","where 1=1");
	return $direccion;
	} 

	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="dir_agent"){
			$list = listData('CONCAT (var_Direccion,",",int_CodZip,",",var_Ciudad,",",var_Estado,",",var_Pais ),var_Agente','tbl_Agentes','where 1=1');
			echo json_encode($list);
		}
	}
		
?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Empresa, var_Direccion, var_Ciudad, var_Estado, var_Pais, var_CodZip, var_Telefono,
			var_Fax, var_Email, txt_Terminos",
			"tbl_Empresa",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
	
	//LISTAR CIUDADES
	function sel2($conditions){
		$listInfo2 =listData(
			"var_Ciudad, var_Estado, var_Pais",
			"tbl_Ciudades",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo2;
	}
?>

<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			$vrcValoresCadena =
				$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex2 = $_REQUEST['txtCampo2'];
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
		
		$addInfo =insertData(
			"tbl_Rutas",
			"var_Rutas, var_Direccion, var_Ciudad, var_Estado, var_Pais, var_CodZip, var_Telefono,
			var_Fax, var_Email, txt_Terminos, int_Activo",
			"'$vrcTex1', '$vrcTex2', '$vrcTex3', '$vrcTex4', '$vrcTex5', '$vrcTex6', '$vrcTex7', '$vrcTex8',
			'$vrcTex9', '$vrcTex10', $vrcTex11, $vrcTex12, 1");
			
			echo "<script language='javascript'>reloaded('company');</script>";
		}
	}
?>

<?php
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="upd"){
			$vrcID = $_REQUEST['id'];
		 	$vrcTex1 = $_REQUEST['txtCampo1'];
			$vrcTex2 = $_REQUEST['txtCampo2'];
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
			"tbl_Rutas",
			"var_Rutas='$vrcTex1', var_Direccion='$vrcTex2', var_Ciudad='$vrcTex3', var_Estado='$vrcTex4',
				var_Pais='$vrcTex5', var_CodZip='$vrcTex6', var_Telefono='$vrcTex7', var_Fax='$vrcTex8',
				var_Email='$vrcTex9', txt_Terminos='$vrcTex10'",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('company');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Rutas",
				$vrcID);
		}
	}
?>