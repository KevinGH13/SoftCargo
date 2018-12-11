<?php require('../../modelo.php'); ?>
<?php function sel($condition){
		$listInfo= listData(
			'int_ID_Grupo,date_Fecha,var_destino',
			'tbl_GrupoconsolidadoGuia',
			'Where int_Activo = "1" ',''
			);
		return $listInfo;
	} ?>

<?php function selEmpresa(){
		$listInfo2 = listData(
			'int_ID',
			'tbl_Empresa',
			'where int_Principal = 1',
			''
			);
		return $listInfo2;
	} ?>
<?php 
	function sel7($conditions){
		$listInfo7 = listData(
			"max(right(int_IDGrupo,6))",
			"tbl_GrupoconsolidadoGuia",
			" WHERE left(int_IDGrupo,9) = $conditions",
			"");
		return $listInfo7;
	}
	
 ?>
<?php 
	if (isset($_REQUEST['atc'])) {
		if ($_REQUEST['atc']=="verificar") {
			$valor = $_REQUEST['valor'];
				$veriInfo = listData(
				"1",
				"tbl_ConsolidadoGuia",
				"Where int_IDConsolidado = $valor"
				,'');
			if ($veriInfo[0][0] == 1) {
			    echo 1;
			}else{
				echo 0;
			}

	    }
	}
 ?>
 <?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=='add') {
 		$fecha = date('y')+''+date('m');
 		$Id_Empresa = selEmpresa();
 		$Tipo = '01';
 		$PreContinuo = $fecha+$Tipo;
 		$PreContinuo.str_pad($Id_Empresa[0][0],3,'0',STR_PAD_LEFT);
 		$Continuo = sel7($PreContinuo);
 		return $PreContinuo+ '  ' + $Continuo[0][0];

 	}
 }
  ?>