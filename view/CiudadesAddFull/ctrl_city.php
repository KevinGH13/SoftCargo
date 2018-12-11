<?php require('modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Ciudad, var_Estado, var_Pais, var_IATA,var_Zona",
			"tbl_Ciudades_iata",
			"WHERE int_Activo = '1' AND var_Pais = 'COLOMBIA' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
?>
<?php 
	function selPais(){
		$listInfo2 = listData(
			"distinct var_Pais,int_Pais",
			"tbl_Ciudades_iata",
			"where 1=1"
			);
		return $listInfo2;
	}
 ?>

<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			$basesdatosCiudades = array
			('0' => 'ECP_database_master',
			 '1' => 'ECP_Sent_Cargo',
			 '2' => 'ECP_Globo_Envios');
			$vrcValoresCadena =
				$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex2 = $_REQUEST['txtCampo2'];
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_REQUEST['txtCampo5'];
				$vrcTex5 = $_REQUEST['txtCampo6'];
		foreach ($basesdatosCiudades as $value) {
			$addInfo =insertData(
			"tbl_Ciudades",
			"var_Ciudad, var_Estado, var_Pais, var_Zona, var_Dane, int_Activo",
			"$vrcTex1, '$vrcTex2', '$vrcTex3', '$vrcTex4', '$vrcTex5', 1");
			
			
			}
		echo "<script language='javascript'>Alert('OKAY');</script>";
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