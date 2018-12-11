<?php require('../../modelo.php'); ?>
<?php require('../../config/Default_data.php'); ?>	

<?php
	
	
	function seluser($conditions){
		$listInfo =listData(
			"int_ID,int_emp",
			"tbl_Usuarios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"");
		return $listInfo;

	}
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"int_ID,var_Empresa, var_Transportador, var_EmpresaDestino, var_PaisDest, var_Servicio,
			var_DestinatarioDuplicado, int_MaximoPRemitente, int_MaxDeclaradoRemitente,var_fechaCreacion",
			"tbl_ConsolidadoGuia",
			"WHERE int_Activo = 1 AND ".$conditions,
			"ORDER BY var_fechaCreacion DESC");
		return $listInfo;

	}
		function sels($conditions){
		$listInfo =listData(
			"int_ID,var_EmpresaDestino,var_PaisDest,
			int_MaxDeclaradoRemitente,var_fechaCreacion,var_Transportador",
			"tbl_ConsolidadoGuia ",
			"WHERE int_Activo = 1",
			"ORDER BY var_fechaCreacion DESC");
		return $listInfo;

	}
		function seldatos($conditions){
		$listInfo =listData(
			"distinct C.int_ID,C.var_EmpresaDestino,C.var_PaisDest,SUM(G.decimal_PesoCobrado),SUM(G.int_ValorDeclaradoManual),SUM(G.int_ValorSeguroManual),C.var_fechaCreacion",
			"tbl_ConsolidadoGuia C",
			" join tbl_EmpaquesConsolidadoU EC on C.int_ID = EC.int_IDConsolidado  join tbl_Guia G on EC.int_IDEmpaque = G.int_NEmpaque WHERE C.int_Activo = '1' AND G.int_Activo = '1' AND EC.int_Activo = '1' AND ".$conditions,
			"ORDER BY C.var_fechaCreacion DESC");
		return $listInfo;

	}
		//LISTAR DATOS AGENCIAS

	function selagent($conditions){

		$listInfo2 =listData(

			"int_ID, var_Agente,var_Direccion,var_Ciudad, var_Estado,int_CodZip",

			"tbl_Agentes",

			"WHERE int_Activo = '1' AND int_TipoAgente = 1 AND ".$conditions,

			"ORDER BY var_Agente");

		return $listInfo2;

	}
	// Listar Transporte
	function sel2($conditions){
		$listInfo2 =listData(
			"int_ID,var_Nombre, var_Direccion, var_Ciudad, var_Estado, var_Pais, var_Zip, var_Telefono, var_Email, var_PersonaContacto",
			"tbl_Transportador",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo2;
	}

	//listar empresa
		function sel3($conditions){
		$listInfo3 =listData(
			"int_ID, var_Empresa, var_Direccion, var_Ciudad, var_Estado, var_Pais, var_CodZip, var_Telefono,
			var_Fax, var_Email, txt_Terminos",
			"tbl_Empresa",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo3;
	}
	//LISTAR DATOS PAISES
	function sel4($conditions){
		$listInfo4 =listData(
			"DISTINCT var_Pais,int_Pais",
			"tbl_Ciudades_iata",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Pais");
		return $listInfo4;
	}
		//LISTAR DATOS SERVICIOS
	function sel5($conditions){
		$listInfo5 =listData(
			"int_ID, var_Servicio",
			"tbl_Servicios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY var_Servicio");
		return $listInfo5;
	}
	function sel6($conditions){
		$listInfo =listData(
			"int_IDConsolidado",
			"tbl_ConsolidadoGuia",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID_Consolidado");
		return $listInfo;

	}

		function sel7($conditions){
		$listInfo =listData(
			"max(right(int_ID,4))",
			"tbl_ConsolidadoGuia",
			"WHERE left(int_ID,7) = $conditions",
			"");
		return $listInfo;

	}

		function sel8($conditions){

		$listInfo =listData(
			"G.int_ID,int_Guia,var_NombreRemit,
			var_NombreDest,
			decimal_PesoCobrado,
			int_ValorDeclaradoManual,int_ValorSeguro,var_Agente,date_FechaEnvio,int_ValorDeclarado,int_NConsolidado,G.var_Agente, IA.var_IATA",
			"tbl_Guia G ",
			"inner join tbl_EmpaquesConsolidadoU EC on G.int_NEmpaque = EC.int_IDEmpaque
			inner join tbl_Ciudades_iata IA on  G.int_ciudadDestinatario = IA.int_ID where EC.int_IDConsolidado = ".$conditions." and G.int_Activo = 1 and EC.int_Activo = 1",
			"ORDER BY date_FechaEnvio DESC");
		return $listInfo;
	}
				function sellbs($conditions){

		$listInfo =listData(
			"SUM(decimal_PesoCobrado)",
			"tbl_Guia G ",
			"inner join tbl_EmpaquesConsolidadoU EC on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = ".$conditions." and G.int_Activo = 1 and EC.int_Activo = 1",
			"");
		return $listInfo;
	}




		function sel9($conditions){
		$listInfo =listData(
			"int_ID, var_Agente",
			"tbl_Agentes",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfo;
	}
			function sel10($conditions,$lim){
		//contador
		$listInfo =listData(
			"count(G.int_ID),G.int_Guia,
			sum(G.decimal_PesoCobrado),
			count(G.int_NEmpaque),sum(G.int_ValorSeguro)",
			"tbl_Guia G",
			"inner join tbl_EmpaquesConsolidadoU EC on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = ".$conditions." and G.int_Activo = 1 and EC.int_Activo = 1",
			"");
		return $listInfo;
	}



?>

<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			
				$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex2 = "0";
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_REQUEST['txtCampo5'];
				$vrcTex6 = $_REQUEST['txtCampo6'];
				$vrcTex7 = $_REQUEST['txtCampo7'];
				$vrcTex8 = $_REQUEST['txtCampo8'];
				$vrcTex5 = substr($vrcTex5, 1);

				$busq= date('ym').str_pad($int_Identificador_Empresa_Unico, 3 , "0" ,STR_PAD_LEFT);
				$consId = sel7($busq);
				$cpdCon = sel7($busq);
				if($cpdCon[0][0] != NULL && $cpdCon[0][0] != "" ){
					$cpdCon= date('ym').str_pad($int_Identificador_Empresa_Unico, 3 , "0" ,STR_PAD_LEFT).str_pad(($consId[0][0]+1),4,"0",STR_PAD_LEFT);
					
				}else {
					
					$cpdCon = date('ym').str_pad($int_Identificador_Empresa_Unico, 3 , "0" ,STR_PAD_LEFT).str_pad("1",4,"0",STR_PAD_LEFT) ;
				}

		$addInfo =insertData(
		"tbl_ConsolidadoGuia",
			"var_Empresa, var_Transportador, var_EmpresaDestino, var_PaisDest, var_Servicio,
			var_DestinatarioDuplicado, int_MaximoPRemitente, int_MaxDeclaradoRemitente, int_Activo,int_ID,var_fechaCreacion",
			"'$vrcTex1', '$vrcTex2', '$vrcTex3', '$vrcTex4', '$vrcTex5', $vrcTex6, $vrcTex7, $vrcTex8, 1,$cpdCon,now()");
			
			echo $cpdCon;
			
		}
	}
?>
<?php
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="updcon"){
			$vrcID = $_REQUEST['id'];
			$vrcTex3 = $_REQUEST['txtCampo3'] ;
			$vrcTex5 = ltrim($_REQUEST['txtCampo5'], ",");
			$vrcTex6 = $_REQUEST['txtCampo6'];
			$vrcTex7 = $_REQUEST['txtCampo7'];
			$vrcTex8 = $_REQUEST['txtCampo8'];

		$updInfo =updateData(
			"tbl_ConsolidadoGuia",
			" var_Servicio = '$vrcTex5', var_DestinatarioDuplicado='$vrcTex6', int_MaximoPRemitente='$vrcTex7',
			 int_MaxDeclaradoRemitente = '$vrcTex8', var_Transportador = '$vrcTex3'",
			$vrcID);


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

		$updInfo =updateData(
			"tbl_ConsolidadoGuia",
			"var_Servicio='$vrcTex1', bol_Lunes='$vrcTex2', bol_Martes='$vrcTex3', bol_Miercoles='$vrcTex4',
					bol_Jueves='$vrcTex5', bol_Viernes='$vrcTex6', bol_Sabado='$vrcTex7', bol_Domingo='$vrcTex8',
						date_FechaDesde='$vrcTex9', date_FechaHasta='$vrcTex10'",
			$vrcID);


		}
	}
?>
<?php
	//ACTUALIZAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="updf"){
			$vrcID = $_REQUEST['id'];
		 	$vrcTex1 = $_REQUEST['idconso'];


		$updInfo =updateData(
			"tbl_Guia",
			"int_NConsolidado=$vrcTex1",
			$vrcID);


		}
	}
?>

<?php
	//DESACTIVAR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="del"){

			$vrcID = $_REQUEST['id'];
			$delInfo =deleteData(
				"tbl_ConsolidadoGuia",
				$vrcID);
		}
	}
?>
