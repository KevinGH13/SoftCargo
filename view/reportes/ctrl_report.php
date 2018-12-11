<?php session_start(); ?>
<?php require('../../modelo.php'); ?>


<?php
$intID = $_SESSION['id'];
	//LISTAR DATOS

		function sel2($conditions){
		$listInfo =listData(
			"int_emp",
			"tbl_Usuarios",
			"WHERE int_Activo = '1' AND ".$conditions,
			"");
		return $listInfo;
	}

	function sel($conditions,$ctry,$sv){
		if($ctry !=0 and $ctry != ""){
		$listInfo =listData(

			"G.int_ID,G.int_Guia,G.int_tracking,G.var_Agente,G.date_FechaEnvio,G.var_TipoPago,G.decimal_PesoCobrado,G.int_ValorDeclarado,
			G.int_ValorDeclaradoManual,G.int_ValorSeguro,G.int_ValorSeguroManual,
			G.int_CargosEmpresa,G.int_CargosAgente,G.int_Descuentos,G.int_TotalPagar,G.int_factura,G.int_CiudadDestinatario,G.int_ciudadRemitente,G.int_IDuser,G.int_CCEmpresa,G.int_CCAgente,G. int_TarEmpresa,G.int_TarAgente,G.int_SegEmpresa,G.int_SegAgente,G.int_ImpEmpresa,G.int_ImpAgente,G.int_Servicio,G.int_Pago,G.int_PayDate,ia.var_Pais,ia.int_Pais",

			"tbl_Guia G ",

			"inner join tbl_Ciudades_iata ia on G.int_Activo = '1' AND (ia.int_Pais = '".$ctry."' AND G.int_CiudadDestinatario = ia.int_ID) AND G.date_FechaEnvio BETWEEN ".$conditions." inner join tbl_Servicios srv on G.int_Servicio = srv.int_ID  ".$sv,

			"ORDER BY G.date_FechaEnvio DESC ");
			}
			else{
				$listInfo =listData(

			"G.int_ID,G.int_Guia,G.int_tracking,G.var_Agente,G.date_FechaEnvio,G.var_TipoPago,G.decimal_PesoCobrado,G.int_ValorDeclarado,
			G.int_ValorDeclaradoManual,G.int_ValorSeguro,G.int_ValorSeguroManual,
			G.int_CargosEmpresa,G.int_CargosAgente,G.int_Descuentos,G.int_TotalPagar,G.int_factura,G.int_CiudadDestinatario,G.int_ciudadRemitente,G.int_IDuser,G.int_CCEmpresa,G.int_CCAgente,G. int_TarEmpresa,G.int_TarAgente,G.int_SegEmpresa,G.int_SegAgente,G.int_ImpEmpresa,G.int_ImpAgente,G.int_Servicio,G.int_Pago,G.int_PayDate,ia.var_Pais",

			"tbl_Guia G",

			"inner join tbl_Ciudades_iata ia on G.int_CiudadDestinatario = ia.int_ID inner join tbl_Servicios srv on  G.int_Activo = '1' AND G.date_FechaEnvio BETWEEN ".$conditions."  AND G.int_Servicio = srv.int_ID ".$sv,

			"ORDER BY G.date_FechaEnvio DESC ");
			}

		return $listInfo;

	}

   function selt2($conditions){

		

		return $listInfo;

	}
	
	function seliata($conditions){

		$listInfo =listData(

			" var_Pais,int_Pais ",

			"tbl_Ciudades_iata",

			"WHERE int_Activo = '1' AND ".$conditions,

			"GROUP BY int_Pais ");

		return $listInfo;

	}
	function selcobe($conditions){

		$listInfo =listData(

			"int_ID,(int_ImpEmpresa+int_SegEmpresa+int_TarEmpresa+int_CCEmpresa*decimal_PesoCobrado+int_CargosEmpresa)",

			"tbl_Guia",

			"WHERE int_Activo = '1' AND ".$conditions,

			" ");

		return $listInfo;

	}

	function selcobros($v,$conditions,$ctry,$sv){
	if($ctry !=0 and $ctry != ""){
		$listInfo =listData(

			"SUM(".$v.")",

			"tbl_Guia G",

			"inner join tbl_Ciudades_iata ia on G.int_Activo = '1' AND (ia.int_Pais = '".$ctry."' AND G.int_CiudadDestinatario = ia.int_ID) AND G.date_FechaEnvio BETWEEN ".$conditions." inner join tbl_Servicios srv on G.int_Servicio = srv.int_ID  ".$sv,

			" ");
			}
			else{
			$listInfo =listData(

			"SUM(".$v.")",

			"tbl_Guia G",

			"inner join tbl_Servicios srv on  G.int_Activo = '1' AND G.date_FechaEnvio BETWEEN ".$conditions."  AND G.int_Servicio = srv.int_ID ".$sv,

			" ");
		}
		return $listInfo;

	}
	function selcobet($conditions,$ctry){
		if($ctry !=0 and $ctry != ""){
		$listInfo =listData(

			"G.int_ID,SUM(G.int_ImpEmpresa+G.int_SegEmpresa+G.int_TarEmpresa+G.int_CCEmpresa*G.decimal_PesoCobrado+G.int_CargosEmpresa)",
			"tbl_Guia G ",
			"inner join tbl_Ciudades_iata ia on G.int_Activo = '1' AND (ia.int_Pais = '".$ctry."' AND G.int_CiudadDestinatario = ia.int_ID) AND G.date_FechaEnvio BETWEEN ".$conditions,

			"ORDER BY G.date_FechaEnvio DESC ");
			}
			else{
		$listInfo =listData(

			"G.int_ID,SUM(G.int_ImpEmpresa+G.int_SegEmpresa+G.int_TarEmpresa+G.int_CCEmpresa*G.decimal_PesoCobrado+G.int_CargosEmpresa)",
			"tbl_Guia G",
			"WHERE  G.int_Activo = '1' AND G.date_FechaEnvio BETWEEN ".$conditions,
			"ORDER BY G.date_FechaEnvio DESC ");
			}
		return $listInfo;

	}

	function selagent($conditions){

		$listInfo2 =listData(

			"int_ID, var_Agente,var_Direccion,var_Ciudad, var_Estado,int_CodZip",

			"tbl_Agentes",

			"WHERE int_Activo = '1' AND int_TipoAgente = 1 AND ".$conditions,

			"ORDER BY var_Agente");

		return $listInfo2;

	}
	function selserv($conditions){

		$listInfo2 =listData(

			"var_Servicio, bol_Lunes, bol_Martes, bol_Miercoles, bol_Jueves, bol_Viernes, bol_Sabado, bol_Domingo,
				date_FechaDesde, date_FechaHasta",

			"tbl_Servicios",

			"WHERE int_Activo = '1' AND int_ID=".$conditions,

			" ");

		return $listInfo2;

	}
?>
<?php
	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			$vrcValoresCadena =
				$vrcTex0 = $_REQUEST['txtCampo0'];
				$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex2 = $_REQUEST['txtCampo2'];
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_REQUEST['txtCampo5'];
				$vrcTex6 = $_REQUEST['txtCampo6'];
				$vrcTex7 = $_REQUEST['txtCampo7'];
				$vrcTex8 = $_REQUEST['txtCampo8'];
				$vrcTex9 = $_REQUEST['txtCampo9'];
				
		$addInfo =insertData(
			"tbl_Transportador",
			"int_ID_Empresa,var_Nombre,var_Direccion,var_Ciudad,var_Estado,var_Pais,var_Zip,var_Telefono,var_Email,var_PersonaContacto,int_Activo",
			"$vrcTex0,'$vrcTex1','$vrcTex2','$vrcTex3','$vrcTex4','$vrcTex5','$vrcTex6','$vrcTex8','$vrcTex9','$vrcTex7','1'");
			
		}
	}
?>

<?php
	//ACTUALIZAR PAGOS
	if(isset($_POST['act'])){
		if($_POST['act']=="updP"){

			$vrcID = $_POST['id'];
		 	$status = $_POST["in"];
			
						
																																	
		$updInfo =updateData(
			"tbl_Guia",
			"int_Pago='$status', int_PayDate= now()",
			$vrcID);
	echo "0";		
			
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
						
																																	
		$updInfo =updateData(
			"tbl_Transportador",
			"var_Nombre='$vrcTex1', var_Direccion='$vrcTex2', var_Ciudad='$vrcTex3', var_Estado='$vrcTex4', var_Pais='$vrcTex5', var_Zip='$vrcTex6', var_Telefono='$vrcTex7', var_Email='$vrcTex8', var_PersonaContacto='$vrcTex9'",
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
				"tbl_Transportador",
				$vrcID);
		}
	}
?>