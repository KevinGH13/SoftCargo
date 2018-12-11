<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Empaque, int_Peso",
			"tbl_Empaques",
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
			"tbl_Empaques",
			"var_Empaque, int_Peso, int_Activo",
			"'$vrcTex1', $vrcTex2, 1");
			
			echo "<script language='javascript'>reloaded('packing');</script>";
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
			"tbl_Empaques",
			"var_Empaque='$vrcTex1', int_Peso=$vrcTex2",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('packing');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Empaques",
				$vrcID);
		}
	}
?>