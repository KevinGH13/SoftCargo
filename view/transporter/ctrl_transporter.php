<?php session_start(); ?>
<?php require('../../modelo.php'); ?>


<?php
$intID = $_SESSION['id'];
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID,var_Nombre, var_Direccion, var_Ciudad, var_Estado, var_Pais, var_Zip, var_Telefono, var_Email, var_PersonaContacto",
			"tbl_Transportador",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
		function sel2($conditions){
		$listInfo =listData(
			"int_emp",
			"tbl_Usuarios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"");
		return $listInfo;
	}
?>
<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			$vrcValoresCadena =
				$vrcTex0 = $_REQUEST['txtCampo0'];
				$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex2 = $_REQUEST['txtCampo2'];
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_REQUEST['txtCampo5'];
				$vrcTex6 = $_REQUEST['txtCampo6'];
				$vrcTex7 = $_REQUEST['txtCampo7'];
				$vrcTex8 = $_REQUEST['txtCampo8'];
				$vrcTex9 = $_REQUEST['txtCampo9'];
				
		$addInfo =insertData(
			"tbl_Transportador",
			"int_ID_Empresa,var_Nombre,var_Direccion,var_Ciudad,var_Estado,var_Pais,var_Zip,var_Telefono,var_Email,var_PersonaContacto,int_Activo",
			"$vrcTex0,'$vrcTex1','$vrcTex2','$vrcTex3','$vrcTex4','$vrcTex5','$vrcTex6','$vrcTex8','$vrcTex9','$vrcTex7','1'");
			
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
						
																																	
		$updInfo =updateData(
			"tbl_Transportador",
			"var_Nombre='$vrcTex1', var_Direccion='$vrcTex2', var_Ciudad='$vrcTex3', var_Estado='$vrcTex4', var_Pais='$vrcTex5', var_Zip='$vrcTex6', var_Telefono='$vrcTex7', var_Email='$vrcTex8', var_PersonaContacto='$vrcTex9'",
			$vrcID);
			
			
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Transportador",
				$vrcID);
		}
	}
?>