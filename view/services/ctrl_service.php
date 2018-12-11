<?php require('../../modelo.php'); ?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Servicio, bol_Lunes, bol_Martes, bol_Miercoles, 		
				bol_Jueves, bol_Viernes, bol_Sabado, bol_Domingo, date_FechaDesde, date_FechaHasta,int_cod",
			"tbl_Servicios",
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
				$vrcTexc = $_REQUEST['txtCampoc'];
				$vrcTex10 = $_REQUEST['txtCampo10'];
				
		$addInfo =insertData(
			"tbl_Servicios",
			"var_Servicio, bol_Lunes, bol_Martes, bol_Miercoles, bol_Jueves, bol_Viernes, bol_Sabado, bol_Domingo,
				date_FechaDesde, date_FechaHasta,int_cod, int_Activo",
			"'$vrcTex1', '$vrcTex2', '$vrcTex3', '$vrcTex4', '$vrcTex5', '$vrcTex6', '$vrcTex7', '$vrcTex8', 
				'$vrcTex9', '$vrcTex10','$vrcTexc', 1");
			
			echo "<script> window.open('index.php','_self');</script>";
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
			$vrcTexc = $_REQUEST['txtCampoc'];
			$vrcTex10 = $_REQUEST['txtCampo10'];

		$updInfo =updateData(
			"tbl_Servicios",
			"var_Servicio='$vrcTex1', bol_Lunes='$vrcTex2', bol_Martes='$vrcTex3', bol_Miercoles='$vrcTex4',
					bol_Jueves='$vrcTex5', bol_Viernes='$vrcTex6', bol_Sabado='$vrcTex7', bol_Domingo='$vrcTex8',
						date_FechaDesde='$vrcTex9', date_FechaHasta='$vrcTex10',int_cod='$vrcTexc'",
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
				"tbl_Servicios",
				$vrcID);
		}
	}
?>