<?php session_start();  ?>
<?php
	if(isset($_SESSION['id'])){	$int_ID = $_SESSION['id']; $tp_user = $_SESSION['int_tp'];}else{echo "<script>window.open('../../index.php','_self');</script>";}
	$vrcCondition = "int_ID = ".$int_ID;

	//OPCIONES DE MENU
	$vrc_Instalacion = '';
	$vrc_Courier = '';
	$vrc_Pickups = '';
	$vrc_Estados = '';
	$vrc_Reajustes = '';
	$vrc_P_vuelo ='';
	$vrc_IngresoBodega = '';

	//Agentes
	$vrc_Agentes = '';
	$vrcAgentes = '';
	$vrcTarifas = '';
	$vrcSeguros = '';
	$vrcImpuestos = '';
	$vrcDivisas = '';

	//SubAgentes
	$vrc_SubAgentes = '';
	$vrcSubAgentes = '';
	$vrcSubTarifas = '';
	$vrcSubSeguros = '';
	$vrcSubImpuestos = '';

	//Transporte
	$vrc_Transporte = '';
	$vrcTransportador = '';
	$vrcTraTarifas = '';
	$vrcTraSeguros = '';
	$vrcTraRutas = '';

	//Usuarios
	$vrc_Usuarios = '';
	$vrcUsuarios = '';
	$vrcUsuLogs = '';

	//Nombre
	$vrcNombre = '';

	//Bodega
	$vrc_IngresoBodegaTRa = '';

	//ICONOS
	$vrcIcoInstalacion = '';
	$vrcIcoCourier = '';
	$vrcIcoPickups = '';
	$vrcIcoEstados = '';
	$vrcIcoAgentes = '';
	$vrcIcoSubAgentes = '';
	$vrcIcoTransporte = '';
	$vrcIcoUsuarios = '';
	$vrcIcoReajustes = '';
	$vrcIcoBodega ='';

	foreach($listInfoMen=selMen($vrcCondition) as $listDataMen):

		if($listDataMen[0] == 'S' and $tp_user == 1){$vrc_Instalacion = 'Instalación'; $vrcIcoInstalacion = 'icon-magic';}
		if(($listDataMen[1] == 'S' and $tp_user == 1) or $tp_user ==2){$vrc_Courier = 'Courier'; $vrcIcoCourier = 'icon-paper-plane-empty';}
		if($listDataMen[2] == 'S' and $tp_user == 1){$vrc_Estados = 'Registro de Carga'; $vrcIcoEstados = 'icon-tag';}

		//Agentes
		if($listDataMen[3] == 'S' and $tp_user == 1 ){$vrcAgentes = '&rsaquo; Agentes'; $vrc_Agentes = 'Agentes'; $vrcIcoAgentes = 'icon-cube';}
		if($listDataMen[4] == 'S' and $tp_user == 1 ){$vrcTarifas = '&rsaquo; Tarifas'; $vrc_Agentes = 'Agentes'; $vrcIcoAgentes = 'icon-cube';}
		if($listDataMen[5] == 'S' and $tp_user == 1 ){$vrcSeguros = '&rsaquo; Seguros'; $vrc_Agentes = 'Agentes'; $vrcIcoAgentes = 'icon-cube';}
		if($listDataMen[6] == 'S' and $tp_user == 1 ){$vrcImpuestos = '&rsaquo; Impuestos'; $vrc_Agentes = 'Agentes'; $vrcIcoAgentes = 'icon-cube';}
		if($listDataMen[7] == 'S' and $tp_user == 1 ){$vrcDivisas = '&rsaquo; Divisas'; $vrc_Agentes = 'Agentes'; $vrcIcoAgentes = 'icon-cube';}

		//SubAgentes
		if($listDataMen[8] == 'S' and $tp_user == 1 ){$vrcSubAgentes = '&rsaquo; Sub Agentes'; $vrc_SubAgentes = 'Sub Agentes'; $vrcIcoSubAgentes = 'icon-cubes';}
		if($listDataMen[9] == 'S' and $tp_user == 1 ){$vrcSubTarifas = '&rsaquo; Tarifas'; $vrc_SubAgentes = 'Sub Agentes'; $vrcIcoSubAgentes = 'icon-cubes';}
		if($listDataMen[10] == 'S' and $tp_user == 1 ){$vrcSubSeguros = '&rsaquo; Seguros'; $vrc_SubAgentes = 'Sub Agentes'; $vrcIcoSubAgentes = 'icon-cubes';}
		if($listDataMen[11] == 'S' and $tp_user == 1 ){$vrcSubImpuestos = '&rsaquo; Impuestos'; $vrc_SubAgentes = 'Sub Agentes'; $vrcIcoSubAgentes = 'icon-cubes';}

		//Transporte
		if($listDataMen[12] == 'S' and ($tp_user == 1)){$vrcTransportador = '&rsaquo; Transportador'; $vrc_Transporte = 'Transporte'; $vrcIcoTransporte = 'icon-truck';}
		if($listDataMen[13] == 'S' and $tp_user == 1){$vrcTraTarifas = '&rsaquo; Tarifas'; $vrc_Transporte = 'Transporte'; $vrcIcoTransporte = 'icon-truck';}
		if($listDataMen[14] == 'S' and $tp_user == 1){$vrcTraSeguros = '&rsaquo; Seguros'; $vrc_Transporte = 'Transporte'; $vrcIcoTransporte = 'icon-truck';}
		/*if($listDataMen[15] == 'S' and $tp_user == 1){$vrcTraRutas = '&rsaquo; Rutas'; $vrc_Transporte = 'Transporte'; $vrcIcoTransporte = 'icon-truck';}*/

		//Usuarios
		if($listDataMen[16] == 'S' and $tp_user == 1){$vrcUsuarios = '&rsaquo; Usuarios'; $vrc_Usuarios = 'Usuarios'; $vrcIcoUsuarios = 'icon-user';}
		if($listDataMen[17] == 'S' and $tp_user == 1){$vrcUsuLogs = '&rsaquo; Logs'; $vrc_Usuarios = 'Usuarios'; $vrcIcoUsuarios = 'icon-user';}

		//Reajustes
		if($listDataMen[18] == 'S' || $tp_user == 2 ){$vrcReajustes = '&rsaquo; Reajustes'; $vrc_Reajustes = 'Facturacion'; $vrcIcoReajustes = 'icon-history';}

		//Ingreso A bodega
		if ($listDataMen[12] == 'S' and ($tp_user == 3 or $tp_user == 1)) {$vrc_IngresoBodega = 'Bodega';$vrc_IngresoBodegaTRa = 'Ingresar Carga Bodega';$vrcIcoBodega='icon-history';}

		//Nombre
		$vrcNombre = $listDataMen[19];

		//Plan de Vuelo
		if ($listDataMen[20] == 'S'){$vrc_P_vuelo = 'Proceso de Vuelo';$vrcIcoP_vuelo = 'icon-paper-plane';}
		$int_IDagente = $listDataMen[21];

   	endforeach;

?>

<?php
	//LISTAR DATOS
	function selMen($conditions){
		$listInfoMen =listData(
			"bol_Instalacion, bol_Courier, bol_Estados, bol_AgeAgentes, bol_AgeTarifas, bol_AgeSeguros,
				bol_AgeImpuestos, bol_AgeDivisas, bol_SubAgentes, bol_SubTarifas, bol_SubSeguros, bol_SubImpuestos,
				bol_TraTransportador, bol_TraTarifas, bol_TraSeguros, bol_TraRutas, bol_UsuUsuarios, bol_UsuLogs,
				bol_Reajustes, var_Nombre,bol_ConGrp,int_IDagente",
			"tbl_Usuarios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"ORDER BY int_ID");
		return $listInfoMen;
	}
?>
