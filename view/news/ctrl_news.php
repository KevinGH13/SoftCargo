<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Titulo, txt_Novedad, int_Agencias, bol_Publicada,var_tipo",
			"tbl_Novedades",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}

	function selAgente($conditions){
		$listInfo = listData(
			"int_ID,var_Agente","tbl_Agentes","where 1=1 and $conditions");
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
			"tbl_Novedades",
			"var_Titulo, txt_Novedad, int_Agencias, bol_Publicada, int_Activo,var_tipo,int_visible",
			"'$vrcTex1', '$vrcTex2', $vrcTex3, '$vrcTex4', 1,'$vrcTex5','$vrcTex4'");
			
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
			$vrcTex5 = $_REQUEST['txtCampo5'];
		$updInfo =updateData(
			"tbl_Novedades",
			"var_Titulo='$vrcTex1', txt_Novedad='$vrcTex2', int_Agencias=$vrcTex3, int_visible='$vrcTex4',var_tipo='$vrcTex5'",
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