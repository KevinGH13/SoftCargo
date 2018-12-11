<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Estado, var_Abreviatura, int_Agencia, bol_EnviadoCentral, txt_Detalles",
			"tbl_EstadosRetencion",
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
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_REQUEST['txtCampo5'];
				
		$addInfo =insertData(
			"tbl_EstadosRetencion",
			"var_Estado, var_Abreviatura, int_Agencia, bol_EnviadoCentral, txt_Detalles, int_Activo",
			"'$vrcTex1', '$vrcTex2', $vrcTex3, '$vrcTex4', '$vrcTex5', 1");
			
			echo "<script language='javascript'>reloaded('status_retention');</script>";
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

		$updInfo =updateData(
			"tbl_EstadosRetencion",
			"var_Estado='$vrcTex1', var_Abreviatura='$vrcTex2', int_Agencia=$vrcTex3, bol_EnviadoCentral='$vrcTex4', 	
			txt_Detalles='$vrcTex5'",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('status_retention');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_EstadosRetencion",
				$vrcID);
		}
	}
?>