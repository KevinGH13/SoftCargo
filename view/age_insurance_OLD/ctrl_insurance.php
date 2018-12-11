<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, int_Agente, int_SubAgente, int_Pais, int_Producto, int_porcEmpresa, int_porcAgente, int_porcSubAgente, int_ValorMinimo, int_ValorMaximo",
			"tbl_Seguros",
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
				$vrcTex6 = $_REQUEST['txtCampo6'];
				$vrcTex7 = $_REQUEST['txtCampo7'];
				$vrcTex8 = $_REQUEST['txtCampo8'];
				$vrcTex9 = $_REQUEST['txtCampo9'];
		
		$addInfo =insertData(
			"tbl_Seguros",
			"int_Agente, int_SubAgente, int_Pais, int_Producto, int_porcEmpresa, int_porcAgente, int_porcSubAgente, int_ValorMinimo, int_ValorMaximo, int_Activo",
			"$vrcTex1, $vrcTex2, $vrcTex3, $vrcTex4, $vrcTex5, $vrcTex6, $vrcTex7, $vrcTex8, $vrcTex9, 1");
			
			echo "<script language='javascript'>reloaded('insurance');</script>";
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
			"tbl_Seguros",
			"int_Agente=$vrcTex1, int_SubAgente=$vrcTex2, int_Pais=$vrcTex3, int_Producto=$vrcTex4, int_porcEmpresa=$vrcTex5,
				int_porcAgente=$vrcTex6, int_porcSubAgente=$vrcTex7, int_ValorMinimo=$vrcTex8, int_ValorMaximo=$vrcTex9",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('insurance');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Seguros",
				$vrcID);
		}
	}
?>