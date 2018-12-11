<?php require('../../modelo.php'); ?>
 <?php if(isset($_GET['id'])){$intID=$_GET['id']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
    <?php if(isset($_GET['id_Age'])){$intID_Agente=$_GET['id_Age']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?> 
 

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Pais, var_Servicio, int_porcEmpresa, int_porcAgente, int_PesoMin, int_PesoMax, int_ValorDeclaradoMin,var_Formula,
			 int_IDAgente",
			"tbl_Impuestos",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
	//LISTAR DATOS
	function sel9($conditions){
		$listInfo9 =listData(
			"int_ID, var_Pais, var_Servicio, int_porcEmpresa, int_porcAgente, int_PesoMin, int_PesoMax, int_ValorDeclaradoMin,var_Formula,
			 int_IDAgente",
			"tbl_Impuestos",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID DESC LIMIT 10");
		return $listInfo9;
	}


	//LISTAR DATOS SERVICIOS
	function sel2($conditions){
		$listInfo2 =listData(
			"int_ID, var_Servicio",
			"tbl_Servicios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Servicio");
		return $listInfo2;
	}
	
	//LISTAR DATOS PAISES
	function sel3($conditions){
		$listInfo3 =listData(
			"DISTINCT var_Pais",
			"tbl_Ciudades",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Pais");
		return $listInfo3;
	}
	
	//LISTAR DATOS ZONAS
	function sel4($conditions){
		$listInfo4 =listData(
			"DISTINCT var_Zona",
			"tbl_Ciudades",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Zona");
		return $listInfo4;
	}
	
	//LISTAR DATOS MONEDAS
	function sel5($conditions){
		$listInfo5 =listData(
			"DISTINCT var_Abreviatura",
			"tbl_Monedas",
			"WHERE int_Activo = '1' AND ".$conditions,
			"");
		return $listInfo5;
	}
	
	//LISTAR DATOS MEDIDAS
	function sel6($conditions){
		$listInfo6 =listData(
			"DISTINCT var_Simbolo",
			"tbl_Medidas",
			"WHERE int_Activo = '1' AND ".$conditions,
			"");
		return $listInfo6;
	}
	//LISTAR EL  NOMBRE DE AGENTE
	function sel7($conditions){
		$listInfo7 =listData(
			"var_Agente",
			"tbl_Agentes",
			"WHERE int_ID =".$conditions,
			"");
		return $listInfo7;
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
			"tbl_Impuestos",
			"int_IDAgente, var_Servicio, var_Pais, int_porcEmpresa, int_porcAgente, int_PesoMin, int_PesoMax,
				int_ValorDeclaradoMin, var_Formula, int_Activo",
			"$vrcTex1, '$vrcTex2', '$vrcTex3', $vrcTex4, $vrcTex5, $vrcTex6, $vrcTex7, $vrcTex8, '$vrcTex9', 1");
			
			//echo "<script language='javascript'>reloaded('age_tax');</script>";
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
			"tbl_Impuestos",
			"int_IDAgente=$vrcTex1, var_Servicio='$vrcTex2', var_Pais='$vrcTex3', int_porcEmpresa=$vrcTex4,	int_porcAgente=$vrcTex5,
				int_PesoMin=$vrcTex6, int_PesoMax=$vrcTex7, int_ValorDeclaradoMin=$vrcTex8, var_Formula='$vrcTex9'",
			$vrcID);
			
			//echo "<script language='javascript'>reloaded('age_tax');</script>";
		}
	}
?>

<?php
	$strQue ="";
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="preq"){
			
			$vrcID = $_REQUEST['id'];	
			$cam = $_REQUEST['tab'];	
			$val = $_REQUEST['val'];
			$strQue = execute_query("UPDATE tbl_Impuestos SET $cam = $val WHERE int_ID = $vrcID ;");
			}
		}
	
 ?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Impuestos",
				$vrcID);
		}
	}
?>