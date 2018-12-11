<?php require('../../modelo.php'); ?>
 
<?php if(isset($_REQUEST['t'])){ $tipo = $_REQUEST['t'];} ?>
<?php if ($tipo == 1) {	$tipoAg = "Carga";} else{ $tipoAg = "Aduana";} ?>
<?php
	
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Agente, var_Direccion, var_Ciudad, var_Estado, var_Pais, int_CodZip, var_Telefono, var_Fax, var_Email,
				 int_TipoAgente, int_IdEmpresa",
			"tbl_Agentes",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
?>

<?php 
	//LISTAR LAS EMPRESAS
	function sel2($conditions){
		$listInfo2  = listData(
			"int_ID,var_Empresa",
			"tbl_Empresa",
			"WHERE int_Activo = '1' ",
			""
			);
		return $listInfo2;
	}
?>
<?php 
	//INFORMACION DE EMPRESA
	function sel3($conditions){
		$listInfo3  = listData(
			"int_ID,var_Empresa",
			"tbl_Empresa",
			"WHERE int_Activo = '1' and int_ID  = $conditions",
			""
			);
		return $listInfo3;
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
				$vrcTex5 = $_POST['txtCampo5'];
				$vrcTex6 = $_POST['txtCampo6'];
				$vrcTex7 = $_POST['txtCampo7'];
				$vrcTex8 = $_POST['txtCampo8'];
				$vrcTex9 = $_POST['txtCampo9'];										
				$vrcTex10 = $_POST['txtCampo10'];
				$vrcTex11 = $_POST['txtCampo11'];
				$vrcTex12 = $_POST['txtCampo12'];
				
		$addInfo =insertData(
			"tbl_Agentes",
			"var_Agente, var_Direccion, var_Ciudad, var_Estado, var_Pais, int_CodZip, var_Telefono, var_Fax, var_Email,
				int_TipoAgente, int_Activo,int_IdEmpresa",
			"'$vrcTex1', '$vrcTex3', '$vrcTex4', '$vrcTex5', '$vrcTex6',$vrcTex7,'$vrcTex8','$vrcTex9',
			'$vrcTex10',$vrcTex12, 1,$vrcTex2");
			echo "<script> window.open('index.php?t=$vrcTex12','_self');</script>";
			
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
			$vrcTex10 = $_REQUEST['txtCampo10'];
			$vrcTex12 = $_REQUEST['txtCampo12'];
			
		$updInfo =updateData(
			"tbl_Agentes",
			"var_Agente='$vrcTex1', var_Direccion='$vrcTex3', var_Ciudad='$vrcTex4',
			 var_Estado='$vrcTex5', var_Pais='$vrcTex6', int_CodZip='$vrcTex7', var_Telefono='$vrcTex8', var_Fax='$vrcTex9',
			 var_Email='$vrcTex10', int_TipoAgente=$vrcTex12",
			$vrcID);
			
				echo "<script> window.open('index.php?t=$vrcTex12','_self');</script>";	
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Agentes",
				$vrcID);
		}
	}
?>
