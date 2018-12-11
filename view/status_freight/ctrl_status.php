	<?php require('../../modelo.php'); ?>

<?php
	
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Estado, int_Agencia, bol_Agente, bol_Web, bol_SedePrincipal, bol_Notificacion,var_Comentario",
			"tbl_EstadosCarga",
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
				
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
			
				$vrcTex6 = $_REQUEST['txtCampo6'];
				$vrcTex7 = $_REQUEST['txtCampo7'];
				
		$addInfo =insertData(
			"tbl_EstadosCarga",
			"var_Estado,bol_Agente, bol_Web,bol_Notificacion,var_Comentario,int_Activo",
			"'$vrcTex1','$vrcTex3', '$vrcTex4','$vrcTex6','$vrcTex7',1");
			
			echo "<script language='javascript'>reloaded('status_freight');</script>";
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


		$updInfo =updateData(
			"tbl_EstadosCarga",
			"var_Estado='$vrcTex1', bol_Agente='$vrcTex3', bol_Web='$vrcTex4',
				bol_Notificacion='$vrcTex6',var_Comentario='$vrcTex7'",
			$vrcID);
			
			echo "<script language='javascript'>reloaded('status_freight');</script>";
		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_EstadosCarga",
				$vrcID);
		}
	}
?>