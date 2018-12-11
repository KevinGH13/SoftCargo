<?php session_start(); ?>
<?php require('../../modelo.php'); ?>

<?php
$int_tp = $_SESSION['int_tp'];
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID, var_Usuario, bol_Instalacion, bol_Courier, bol_Estados, bol_AgeAgentes, bol_AgeTarifas, bol_AgeSeguros, 		
				bol_AgeImpuestos, bol_AgeDivisas, bol_SubAgentes, bol_SubTarifas, bol_SubSeguros, bol_SubImpuestos,
				bol_TraTransportador, bol_TraTarifas, bol_TraSeguros, bol_TraRutas, bol_UsuUsuarios, bol_UsuLogs,
				bol_Reajustes, var_Nombre, var_Contrasena,int_tipo",
			"tbl_Usuarios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}

	//LISTAR Empresa
	function sel2($conditions){
		$listInfo =listData(
			"int_ID, var_Empresa",
			"tbl_Empresa",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
		function sel3($conditions){
		$listInfo =listData(
			"int_ID, var_Agente ",
			"tbl_Agentes",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
		function selval($conditions){
		$listInfo =listData(
			"var_Usuario",
			"tbl_Usuarios",
			"WHERE   ".$conditions,
			"");
		return $listInfo;
	};
?>


<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){

			$vrcValoresCadena =
				$vrcTex1 =  trim($_REQUEST['txtCampo1']);
				$vrcTex2 = $_REQUEST['txtCampo2'];
				$vrcTex3 = $_REQUEST['txtCampo3'];
				
				//Instalacion
				if($_REQUEST['txtCampo4'] =='on'){$vrcTex4='S';}else{$vrcTex4='N';}
				//Consultar liquidaciones
				if($_REQUEST['txtCampo5']=='on'){$vrcTex5='S';}else{$vrcTex5='N';}
				//ususario
				if($_REQUEST['txtCampo6']=='on'){$vrcTex6='S';}else{$vrcTex6='N';}
				//Crear Agente
				if($_REQUEST['txtCampo8']=='on'){$vrcTex8='S';}else{$vrcTex8='N';}
				//Transporte
				if($_REQUEST['txtCampo13']=='on'){$vrcTex13='S';}else{$vrcTex13='N';}
				if($_REQUEST['txtCampo7']=='on'){$vrcTex7='S';}else{$vrcTex7='N';}
				
				if($_REQUEST['txtCampo9']=='on'){$vrcTex9='S';}else{$vrcTex9='N';}
				if($_REQUEST['txtCampo10']=='on'){$vrcTex10='S';}else{$vrcTex10='N';}
				if($_REQUEST['txtCampo11']=='on'){$vrcTex11='S';}else{$vrcTex11='N';}
				if($_REQUEST['txtCampo12']=='on'){$vrcTex12='S';}else{$vrcTex12='N';}
				
				if($_REQUEST['txtCampo14']=='on'){$vrcTex14='S';}else{$vrcTex14='N';}
				if($_REQUEST['txtCampo15']=='on'){$vrcTex15='S';}else{$vrcTex15='N';}
				if($_REQUEST['txtCampo16']=='on'){$vrcTex16='S';}else{$vrcTex16='N';}
				if($_REQUEST['txtCampo17']=='on'){$vrcTex17='S';}else{$vrcTex17='N';}
				if($_REQUEST['txtCampo18']=='on'){$vrcTex18='S';}else{$vrcTex18='N';}
				if($_REQUEST['txtCampo19']=='on'){$vrcTex19='S';}else{$vrcTex19='N';}
				if($_REQUEST['txtCampo20']=='on'){$vrcTex20='S';}else{$vrcTex20='N';}
				
				$vrcTexExt4 = $_REQUEST['txtCampoExt4'];
				//consultar todas las facturas
				if( $_REQUEST['txtCampoExt1']=='on'){$vrcTexExt1 = 'S';}else{$vrcTexExt1 ='N';}
				//Consolidadios & grpCon
				if( $_REQUEST['txtCampoExt2']=='on'){$vrcTexExt2 = 'S';}else{$vrcTexExt2 ='N';}
				//Factura
				if( $_REQUEST['txtCampoExt3']=='on'){$vrcTexExt3 = 'S'; }else{$vrcTexExt3 ='N';}
				//Estados De carga
				if($_REQUEST['txtCampo22']=='on'){$vrcTex22='S';}else{$vrcTex22='N';}
				$vrcGuia= 'N';
				if($_REQUEST['txtCampoExt1']=='on' or $_REQUEST['txtCampoExt3']=='on' ){ $vrcGuia= 'S';}else{$vrcGuia= 'N';}
				$vrcTex24 = $_REQUEST['txtCampo24'];
				$vrcTex25 = $_REQUEST['txtCampo25'];
				
			
				
		$addInfo =insertData(
			"tbl_Usuarios",
			"var_Usuario,var_Contrasena,var_Nombre, 
				bol_Instalacion, bol_Reajustes,  bol_UsuUsuarios, bol_UsuLogs,
				bol_AgeAgentes, bol_AgeTarifas,bol_AgeSeguros, bol_AgeImpuestos,  bol_AgeDivisas,
				bol_TraTransportador,bol_TraTarifas, bol_TraSeguros, bol_TraRutas, 
				bol_SubAgentes, bol_SubTarifas, bol_SubSeguros, bol_SubImpuestos,
				 bol_Estados, int_Activo,int_tipo,int_emp,int_IDagente,
				 bol_Consultarfacturas,bol_ConGrp,bol_Guiacrear,bol_Courier",
			"'$vrcTex1', '$vrcTex2', '$vrcTex3', 
				'$vrcTex4','$vrcTex5','$vrcTex6', '$vrcTex7',
				'$vrcTex8','$vrcTex9', '$vrcTex10','$vrcTex11','$vrcTex12',
				'$vrcTex13','$vrcTex14', '$vrcTex15','$vrcTex16',
				'$vrcTex17','$vrcTex18', '$vrcTex19','$vrcTex20',
				'$vrcTex22', 1 ,  '$vrcTex24','$vrcTex25','$vrcTexExt4',
				'$vrcTexExt1','$vrcTexExt2','$vrcTexExt3','$vrcGuia' ");
	
			//echo "<script> window.open('index.php','_self');</script>";
			
			

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

		$updInfo =updateData(
			"tbl_Usuarios",
			"var_Usuario ='$vrcTex1',var_Contrasena ='$vrcTex2',var_Nombre ='$vrcTex3'",
			$vrcID);
			echo "<script> window.open('index.php','_self');</script>";
			
		}
	}
?>

<?php
	//verificar DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="verif"){
			$vrCuser = trim($_REQUEST['user']);
		 		
		$consulta =	selval("var_Usuario='$vrCuser'");
		if($consulta[0][0] != null and $consulta[0][0] != ""){
			echo"1";
		}else{
			echo "0";
		}


		}
	}
?>
			
<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){
			
			$vrcID = $_REQUEST['id'];	
			$delInfo =deleteData(
				"tbl_Usuarios",
				$vrcID);
		}
	}
?>