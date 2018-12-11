 <?php require('../../modelo.php'); ?>
 <?php if(isset($_GET['id'])){$intID=$_GET['id']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
    <?php if(isset($_GET['id_Age'])){$intID_Agente=$_GET['id_Age']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?> 
 
<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Pais, var_Servicio, var_Zona, int_PesoDesde, int_PesoHasta, int_PesoInicial,
				int_LibraInicialAgente, int_LibraInicial, int_LibraAdicionalAgente, int_LibraAdicional,
					int_ValorFijoAgente, int_ValorFijoEmpresa, int_ValorFijo, bol_Seguro, bol_Declarado, var_Moneda, var_Medida, int_IDAgente,
					int_CCAgente,int_CCEmpresa,int_ConcCCAgente,int_ConcCCEmpresa",
			"tbl_Tarifas",
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
				$vrcTex10 = $_REQUEST['txtCampo10'];
				$vrcTex11 = $_REQUEST['txtCampo11'];
				$vrcTex12 = $_REQUEST['txtCampo12'];
				$vrcTex13 = $_REQUEST['txtCampo13'];
				$vrcTex14 = $_REQUEST['txtCampo14'];
				$vrcTex15 = $_REQUEST['txtCampo15'];
				$vrcTex16 = $_REQUEST['txtCampo16'];
				$vrcTex17 = $_REQUEST['txtCampo17']; if($vrcTex17=='on'){$vrcTex17='SI';}else{$vrcTex17='NO';}
				$vrcTex18 = $_REQUEST['txtCampo18']; if($vrcTex18=='on'){$vrcTex18='SI';}else{$vrcTex18='NO';}
				$vrcTex19 = $_REQUEST['txtCampo19'];
				$vrcTex20 = $_REQUEST['txtCampo20'];
				$vrcTex21 = $_REQUEST['txtCampo21'];
				$vrcTex22 = $_REQUEST['txtCampo22'];
				$vrcTex23 = $_REQUEST['checkCC']; if($vrcTex23=='on'){$vrcTex23='SI';}else{$vrcTex23='NO';}


		
		$addInfo =insertData(
			"tbl_Tarifas",
			"int_IDAgente, var_Servicio, var_Pais, var_Zona, var_Moneda, var_Medida, int_PesoInicial, int_PesoDesde, int_PesoHasta,
				int_LibraInicialAgente, int_LibraInicial, int_LibraAdicionalAgente, int_LibraAdicional,
					int_ValorFijoAgente, int_ValorFijoEmpresa, bol_Seguro, bol_Declarado, int_Activo,
					int_CCAgente,int_CCEmpresa,int_ConcCCAgente,int_ConcCCEmpresa,int_CC",
			"$vrcTex1, '$vrcTex2', '$vrcTex3', '$vrcTex4', '$vrcTex5', '$vrcTex6', $vrcTex7, $vrcTex8, $vrcTex9, $vrcTex10,
				$vrcTex11, $vrcTex12, $vrcTex13, $vrcTex14, $vrcTex15,'$vrcTex17', '$vrcTex18', 1,
				$vrcTex19,$vrcTex20,'$vrcTex21','$vrcTex22',1");
			
			echo "<script language='javascript'>alert($vrcTex23);</script>";
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
			$vrcTex11 = $_REQUEST['txtCampo11'];
			$vrcTex12 = $_REQUEST['txtCampo12'];
			$vrcTex13 = $_REQUEST['txtCampo13'];
			$vrcTex14 = $_REQUEST['txtCampo14'];
			$vrcTex15 = $_REQUEST['txtCampo15'];
			$vrcTex16 = $_REQUEST['txtCampo16'];
			$vrcTex17 = $_REQUEST['txtCampo17']; if($vrcTex17=='on'){$vrcTex17='SI';}else{$vrcTex17='NO';}
			$vrcTex18 = $_REQUEST['txtCampo18']; if($vrcTex18=='on'){$vrcTex18='SI';}else{$vrcTex18='NO';}
			$vrcTex19 = $_REQUEST['txtCampo19'];
			$vrcTex20 = $_REQUEST['txtCampo20'];
			$vrcTex21 = $_REQUEST['txtCampo21'];
			$vrcTex22 = $_REQUEST['txtCampo22'];
			$vrcTex23 = $_REQUEST['checkCC']; if($vrcTex23=='on'){$vrcTex23='SI';}else{$vrcTex23='NO';}

		$updInfo =updateData(
			"tbl_Tarifas",
			"var_Servicio='$vrcTex2', var_Pais='$vrcTex3', var_Zona='$vrcTex4', var_Moneda='$vrcTex5', var_Medida='$vrcTex6',
			int_PesoInicial=$vrcTex7, int_PesoDesde=$vrcTex8, int_PesoHasta=$vrcTex9, int_LibraInicialAgente=$vrcTex10,
			int_LibraInicial=$vrcTex11, int_LibraAdicionalAgente=$vrcTex12, int_LibraAdicional=$vrcTex13, int_ValorFijoAgente=$vrcTex14, 	
			int_ValorFijoEmpresa=$vrcTex15,bol_Seguro='$vrcTex17', bol_Declarado='$vrcTex18',
			int_CCAgente=$vrcTex19,int_CCEmpresa=$vrcTex20,int_ConcCCAgente='$vrcTex21',int_ConcCCEmpresa='$vrcTex22'",
			$vrcID);
			
			//echo "<script language='javascript'>reloaded('age_rate');</script>";
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
			$strQue = execute_query("UPDATE tbl_Tarifas SET $cam = $val WHERE int_ID = $vrcID ;");
			}
		}
	
 ?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Tarifas",
				$vrcID);
		}
	}
?>