<?php require('../../modelo.php'); ?>

<?php 

function selPais($conditions){
	$listInfo8 =listData(
			"DISTINCT var_Pais,int_Pais",
			"tbl_Ciudades_iata",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Pais");

		return $listInfo8;	} ?>

<?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="verificar") {
 		$value = $_REQUEST['value'];
 		$int_ciudad = $_POST['ciudad'];
 		$listInfo = listdata(
 			"1","tbl_Guia","where int_Guia = $value and int_Activo = 1"
 			);
 		if ($listInfo[0][0]=='1') {
 			$listInfo = listdata(
 			"1","tbl_IngresoBodega","where int_Guia = $value and int_Activo = 1 and int_Ciudad = $int_ciudad"
 			);
 			if ($listInfo[0][0]=="1") {
 				echo "2";
 			}else{
 			echo "0";
 			}
 		}else{
 			echo "1";
 		}
 	}
 }
  ?>
  <?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="add") {
 		$error = 0;
 		$value = json_decode($_POST['data']);
 		$ciudad = $_POST['int_ciudad'];
 		$nombreCiudad = listData("var_Ciudad","tbl_Ciudades_iata","where int_ID = $ciudad");
 		session_start();
 		$int_Usuario =  $_SESSION['id'];
 		foreach ($value as  $val) {
 		 	insertData("tbl_IngresoBodega","int_Guia,int_peso,int_Ciudad,var_fecha,int_Activo,int_Usuario","$val[0],$val[1],$ciudad,now(),1,$int_Usuario");
 		 	insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Fecha,var_Comentario","$val[0],2,now(),'Ingresada a bodega de $nombreCiudad[0][0]'");
 			$error = 1;
 		} 		
 		echo "$error";
 	}
 }
  ?>
 <?php
  if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="pais"){
			$int_Pais = $_REQUEST['p'];
			$listDatas = listData(
				"int_ID,concat(var_Ciudad,',',var_Estado,',',var_Pais)",
				"tbl_Ciudades_iata"
				,"where int_Pais = $int_Pais and int_Activo = 1 "
				);
			echo json_encode($listDatas);
		}
	}
?>