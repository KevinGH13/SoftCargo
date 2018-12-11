<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Medida, var_Simbolo",
			"tbl_Medidas",
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
		
		$addInfo =insertData(
			"tbl_Medidas",
			"var_Medida, var_Simbolo, int_Activo",
			"'$vrcTex1', '$vrcTex2', 1");
			
			echo "<script language='javascript'>reloaded('measure');</script>";
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

		$updInfo =updateData(
			"tbl_Medidas",
			"var_Medida='$vrcTex1', var_Simbolo='$vrcTex2'",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('measure');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Medidas",
				$vrcID);
		}
	}
?>