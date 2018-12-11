<?php require('../../modelo.php'); ?>

<?php
	
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Ciudad, var_Estado, var_Pais, var_IATA,var_Zona",
			"tbl_Ciudades_iata",
			"WHERE int_Activo = '1' AND  ".$conditions,
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
				$vrcNumpais = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_REQUEST['txtCampo5'];
				$vrcTex3 = $_REQUEST['var_pais'];
				
		$addInfo =insertData(
			"tbl_Ciudades_iata",
			"var_Ciudad, var_Estado, var_Pais, var_Zona, var_IATA,int_Activo,int_Pais",
			"'$vrcTex1', '$vrcTex2', '$vrcTex3', '$vrcTex4','$vrcTex5',1,'$vrcNumpais'");
			
	
		}
	}
?>
<?php
	//ACTUALIZAR Csutom 
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="updCustom"){
				$vrcTex1 = trim($_REQUEST['txtCampo1']);
				$vrcTex4 = trim($_REQUEST['txtCampo4']);
				$vrcTex5 = trim($_REQUEST['txtCampo5']);

			
			
			updateDataValue("tbl_Ciudades_iata" ,"var_IATA='$vrcTex5', var_Zona='$vrcTex4'" , "'".$vrcTex1."'", "var_Ciudad");
		}
	}
?>	
<?php
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="upd"){
			$vrcID = $_REQUEST['id'];
		 	$vrcTex1 = strtoupper($_REQUEST['txtCampo1']);
		  	$vrcTex2 = strtoupper($_REQUEST['txtCampo2']);
		   	$vrcTex3 = strtoupper($_REQUEST['txtCampo3']);
		   	$vrcTex4 = strtoupper($_REQUEST['txtCampo4']);
		   	$vrcTex5 = strtoupper($_REQUEST['txtCampo5']);

		$updInfo =updateData(
			"tbl_Ciudades_iata",
			"var_Ciudad='$vrcTex1', var_Estado='$vrcTex2', var_Pais='$vrcTex3',var_IATA='$vrcTex4', var_Zona='$vrcTex5' ",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('city');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Ciudades_iata",
				$vrcID);
		}
	}
?>