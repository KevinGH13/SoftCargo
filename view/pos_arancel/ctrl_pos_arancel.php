<?php require('../../modelo.php'); ?>
<?php if(isset($_GET['id'])){$intID=$_GET['id']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"var_PA,var_CONCEPTO,var_ARANCEL,var_IVA,int_ID",
			"tbl_PosicionArancelaria",
			"WHERE ".$conditions,
			"");
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
			"tbl_PosicionArancelaria",
			"var_PA, var_CONCEPTO,var_ARANCEL,var_IVA",
			"'$vrcTex1','$vrcTex2','$vrcTex3','$vrcTex4'");
			
			
		}
	}
	
?>

<?php
/*
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="upd"){
			$vrcID = $_REQUEST['id'];
		 	$vrcTex1 = $_REQUEST['txtCampo1'];
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
			"tbl_Agentes",
			"var_Agente='$vrcTex1', var_Direccion='$vrcTex3', var_Ciudad='$vrcTex4',
			 var_Estado='$vrcTex5', var_Pais='$vrcTex6', int_CodZip=$vrcTex7, var_Telefono='$vrcTex8', var_Fax='$vrcTex9',
			 var_Email='$vrcTex10', int_Identificacion='$vrcTex11', int_PesoMax=$vrcTex12",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('agents');</script>";
		}
	}
	*/
?>
			
<?php
/*
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Agentes",
				$vrcID);
		}
	}
	*/
?>
