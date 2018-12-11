<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Moneda, var_Abreviatura, var_Simbolo",
			"tbl_Monedas",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
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
		
		$addInfo =insertData(
			"tbl_Monedas",
			"var_Moneda, var_Abreviatura, var_Simbolo, int_Activo",
			"'$vrcTex1', '$vrcTex2', '$vrcTex3', 1");
			
			echo "<script language='javascript'>reloaded('currency');</script>";
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

		$updInfo =updateData(
			"tbl_Monedas",
			"var_Moneda='$vrcTex1', var_Abreviatura='$vrcTex2', var_Simbolo='$vrcTex3'",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('currency');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Monedas",
				$vrcID);
		}
	}
?>