<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Titulo, txt_Novedad, int_Agencias, bol_Publicada",
			"tbl_Novedades",
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
		
		$addInfo =insertData(
			"tbl_Novedades",
			"var_Titulo, txt_Novedad, int_Agencias, bol_Publicada, int_Activo",
			"'$vrcTex1', '$vrcTex2', $vrcTex3, '$vrcTex4', 1");
			
			echo "<script language='javascript'>reloaded('news');</script>";
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

		$updInfo =updateData(
			"tbl_Novedades",
			"var_Titulo='$vrcTex1', txt_Novedad='$vrcTex2', int_Agencias=$vrcTex3, bol_Publicada='$vrcTex4'",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('news');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Novedades",
				$vrcID);
		}
	}
?>