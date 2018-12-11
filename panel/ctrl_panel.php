<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Titulo, txt_Novedad, int_Agencias, bol_Publicada,var_tipo",
			"tbl_Novedades",
			"WHERE int_Activo = '1'  AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
			//LISTAR DATOS
	function seluseer($conditions){
		$listInfo =listData(
			"int_ID, var_Usuario, bol_Instalacion, bol_Courier, bol_Estados, bol_AgeAgentes, bol_AgeTarifas, bol_AgeSeguros, 		
				bol_AgeImpuestos, bol_AgeDivisas, bol_SubAgentes, bol_SubTarifas, bol_SubSeguros, bol_SubImpuestos,
				bol_TraTransportador, bol_TraTarifas, bol_TraSeguros, bol_TraRutas, bol_UsuUsuarios, bol_UsuLogs,
				bol_Reajustes, var_Nombre, var_Contrasena,int_tipo",
			"tbl_Usuarios",
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
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del-N"){
			$vrcID = $_REQUEST['id'];
		 	
		$updInfo =updateData(
			"tbl_Novedades",
			"int_visible = 1",
			$vrcID);
			
			
		}
	}
?>
	<?php
	//ACTUALIZAR DATOS 2
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="udd"){
			$vrcID = $_REQUEST['id'];
		 		$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex2 = $_REQUEST['txtCampo2'];
				$vrcTex3 = $_REQUEST['txtCampo3'];

		$updInfo =updateData(
			"tbl_Usuarios",
			"var_Usuario ='$vrcTex1',var_Contrasena ='$vrcTex2',var_Nombre ='$vrcTex3'",
			$vrcID);
			echo "<script> window.open('index.php','_self');</script>";
			
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