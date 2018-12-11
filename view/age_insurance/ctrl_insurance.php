<?php require('../../modelo.php'); ?>
 <?php  if(isset($_REQUEST['id'])){$intID=$_REQUEST['id']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
   <?php  if(isset($_REQUEST['id_Age'])){$intID_Agente=$_REQUEST['id_Age']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; } ?> 
 
<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Pais, var_Servicio, int_porcEmpresa, int_porcAgente, int_ValorMin, int_ValorMax, int_IDAgente,int_opcional",
			"tbl_Seguros",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
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
			"tbl_Ciudades_iata",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Pais");
		return $listInfo3;
	}
	
	//LISTAR DATOS ZONAS
	function sel4($conditions){
		$listInfo4 =listData(
			"DISTINCT var_Zona",
			"tbl_Ciudades_iata",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Zona");
		return $listInfo4;
	}
		//listar agencia
	function sel5($conditions){
		$listInfo5 =listData(
			"int_ID, var_Agente, var_Direccion, var_Ciudad, var_Estado, var_Pais, int_CodZip, var_Telefono, var_Fax, var_Email,
				int_Identificacion, int_PesoMax, var_Empresa",
			"tbl_Agentes",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo5;
	}
		//LISTAR EL  NOMBRE DE AGENTE
	function sel6($conditions){
		$listInfo6 =listData(
			"var_Agente",
			"tbl_Agentes",
			"WHERE int_ID =".$conditions,
			"");
		return $listInfo6;
	}
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
				$vrcTex8 = $_REQUEST['txtCampo8'];if ($vrcTex8 == "on"){$vrcTex8 = 1;}else{$vrcTex8=0;}
		
		$addInfo =insertData(
			"tbl_Seguros",
			"int_IDAgente, var_Servicio, var_Pais, int_porcEmpresa, int_porcAgente, int_ValorMin, int_ValorMax, int_Activo,int_opcional",
			"$vrcTex1, '$vrcTex2', '$vrcTex3', $vrcTex4, $vrcTex5, $vrcTex6, $vrcTex7, 1,$vrcTex8");
			
			
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
			$vrcTex8 = $_REQUEST['txtCampo8'];if ($vrcTex8 == "on"){$vrcTex8 = 1;}else{$vrcTex8=0;}
		$updInfo =updateData(
			"tbl_Seguros",
			"int_IDAgente=$vrcTex1, var_Servicio='$vrcTex2', var_Pais='$vrcTex3', int_porcEmpresa=$vrcTex4,	int_porcAgente=$vrcTex5,
				int_ValorMin=$vrcTex6, int_ValorMax=$vrcTex7,int_opcional = $vrcTex8",
			$vrcID);
			
			
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
			$strQue = execute_query("UPDATE tbl_Seguros SET $cam = $val WHERE int_ID = $vrcID ;");
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