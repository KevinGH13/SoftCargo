<?php require('../../modelo.php'); ?>
<?php require('../../config/Default_data.php'); ?>

<?php $id_group = $_REQUEST['id_g']; ?>

<?php function sel($condition){

		$listInfo= listData(

			'int_ID,date_Fecha,var_destino,int_ID,var_desaduanador,int_PD,int_pesoLB,int_pesoKG',

			'tbl_GrupoconsolidadoGuia',

			'Where int_Activo = 1 AND '.$condition,'ORDER BY date_Fecha DESC'

			);

		return $listInfo;

	} ?>



<?php function selEmpresa(){

		$listInfo2 = listData(

			'int_ID,var_Empresa,var_Direccion,var_Ciudad,var_Estado,var_Pais,var_Telefono',

			'tbl_Empresa',

			'where int_Principal = 1',

			''

			);

		return $listInfo2;

	} ?>

<?php

	function sel7($conditions){

		$listInfo7 = listData(

			"max(right(int_ID,4))",

			"tbl_GrupoconsolidadoGuia",

			" WHERE left(int_ID,9) = $conditions",

			"");

		return $listInfo7;

	}



 ?>

<?php function sel4($conditions){

	$listInfo5 = listData(

		"var_Agente,int_ID,var_Direccion,var_Ciudad,var_Pais",

		"tbl_Agentes",

		"WHERE int_Activo = 1 AND int_TipoAgente = 2 AND ".$conditions

		);

	return $listInfo5;

	} ?>





  <?php

  	function sel3($conditions){

 			$listInfo3 = listData(

  				'int_ID',

  				'tbl_ConsolidadoGuia',

  				"where int_IdGrupo = $conditions AND int_Activo = 1 ",

  				''

  			);

  			return $listInfo3;



  	}

   ?>

<?php

	 function selimpre($condition){

		 $listInfoS = listData(

		 "int_Guia,date_FechaEnvio,

		  var_NombreRemit,var_DireccionRemit,var_TelefonoRemit,var_CiudadRemit,var_EstadoRemit,int_CodZipRemit,

			var_NombreDest,var_DireccionDest,var_TelefonoDest,var_CiudadDest,var_EstadoDest,int_CodZipDest,

			int_ValorDeclaradoManual,decimal_PesoCobrado,var_DescripcionContenido",

			"tbl_Guia G",

			"inner join tbl_EmpaquesConsolidadoU EC 

			 inner join tbl_ConsolidadoGuia C

			 on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = C.int_ID 

			 and G.int_Activo = 1 and EC.int_Activo = 1 and C.int_IdGrupo = $condition ;",

			''

	 );

	 return $listInfoS;

	 }

	  ?>
<?php 
	function selBolsas($condition){
		$listInfoB = listData(

			"count(distinct(G.int_NEmpaque))","tbl_Guia G","inner join tbl_EmpaquesConsolidadoU EC 

			 inner join tbl_ConsolidadoGuia C

			 on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = C.int_ID 

			 and G.int_Activo = 1 and EC.int_Activo = 1 and C.int_IdGrupo = $condition ;");
			//"count(Emp.int_ID)","tbl_EmpaquesConsolidadoU as Emp","inner join tbl_ConsolidadoGuia CG on Emp.int_IDConsolidado = CG.int_ID where CG.int_IdGrupo = $condition");
		return $listInfoB;
	}
 ?>

<?php function selCons($condition){

			$listInfo = listData(

			"var_Agente",

			"tbl_GrupoconsolidadoGuia GRP",

			"inner join tbl_Agentes A on GRP.var_desaduanador=A.int_ID where GRP.int_ID = $condition ",''

		);

		/* $listAge = listData(

		 "var_Agente",

		 "tbl_Agentes",

		 "where int_ID = $listInfo[0][0]"

	 );

	 return $listAge;*/

	 return $listInfo;



		}

?>







<?php

	if (isset($_REQUEST['atc'])) {

		if ($_REQUEST['atc']=="verificar") {

			$valor = $_REQUEST['valor'];



				$veriInfo = listData(

				"1",

				"tbl_ConsolidadoGuia",

				"Where int_ID = $valor AND int_Activo = 1"

				,'');

			if ($veriInfo[0][0] == 1) {

			   $veriInfo2 = listData(

				"1",

				"tbl_ConsolidadoGuia",

				"Where int_ID = $valor and int_IdGrupo != 0 AND int_Activo = 1 "

				,'');

			   if ($veriInfo2[0][0]== 1) {

			   	echo 2;



			   }else{

			   	echo 1;

			   }

			}else{

				echo 0;

			}



	    }

	}

 ?>

 <?php

 if (isset($_REQUEST['atc'])) {

 	if ($_REQUEST['atc']=='add') {

 		$fecha = date('y').date('m');

 		$Id_Empresa = $int_Identificador_Empresa_Unico;

 		$Tipo = '01';

 		$PreContinuo = $fecha.$Tipo.str_pad($Id_Empresa,3,'0',STR_PAD_LEFT);

 		$IDGrupoFinal = '';

 		$Continuo = sel7($PreContinuo);

 		if ($Continuo[0][0] != NULL && $Continuo[0][0] != "" ) {


 		$IDGrupoFinal = $PreContinuo.str_pad(($Continuo[0][0]+1),4,'0',STR_PAD_LEFT) ;

 		}else{

 		$IDGrupoFinal = $PreContinuo.str_pad(1,4,'0',STR_PAD_LEFT);

 		}

 		$addGroup = insertData(

 			'tbl_GrupoconsolidadoGuia',

 			'date_Fecha,int_Activo,int_ID',

 			"noW(),1,$IDGrupoFinal"

 		);

 		$idsConso = $_REQUEST['ids'];

 		foreach ($idsConso as $value) {
 			updateDataValue(
 				"tbl_ConsolidadoGuia",
 				"int_IdGrupo = $IDGrupoFinal",
 				$value,"int_ID"
 				);

 			/*$addCG = insertData(

 				'tbl_ConsolidadoGrupoU',

 				'int_idConsolidado,int_idGrupo,int_Activo',

 				"$value,$IDGrupoFinal,1"

 				);*/

 		}

 		echo $IDGrupoFinal;

 	}

 }

  ?>



  <?php

  	if (isset($_REQUEST['atc'])) {

  		if ($_REQUEST['atc']=='busca') {



  			$id = $_REQUEST['Id'];

  			$listInfo3 = listData(

  				'int_ID',

  				'tbl_ConsolidadoGuia',

  				"where int_IdGrupo = $id AND int_Activo = 1 ",

  				''

  			);

  			echo json_encode($listInfo3);

  		}

  	}

   ?>



<?php

	if(isset($_REQUEST['atc'])){

		if ($_REQUEST['atc']=="upd") {

			$vec = $_REQUEST['vecupd'];

			$id = $_REQUEST['id_group'];

			$fecha = $_REQUEST['f'];

			$destino = $_REQUEST['d'];

			$agente = $_REQUEST['a'];



			$listInfo4 = listData(

				"int_ID",

				'tbl_ConsolidadoGrupoU',

				"Where int_idGrupo = $id And int_Activo = 1",""

				);

			$i=0;

			foreach ($listInfo4 as $ids) {

				updateData(

					"tbl_ConsolidadoGrupoU",

					"int_idConsolidado = $vec[$i]",

					$ids[0]

					);

				$i++;

			}

			updateData(

					"tbl_GrupoconsolidadoGuia",

					"var_destino='$destino',var_desaduanador='$agente'",

					$id

					);



		}

	}

 ?>

 <?php

if(isset($_REQUEST['atc'])){

		if ($_REQUEST['atc']=="add2") {

			$value = $_REQUEST['idConso'];

			$IDGrupoFinal = $_REQUEST['idG'];

			updateData(
				"tbl_ConsolidadoGuia","int_IdGrupo = $IDGrupoFinal",$value2
				);

			
		}}

  ?>

 <?php

if(isset($_REQUEST['atc'])){

		if ($_REQUEST['atc']=="delC") {

			$value = $_REQUEST['id'];

			updateDataValue("tbl_ConsolidadoGuia","int_IdGrupo = 0",$value,"int_ID");

		}}

  ?>
 <?php

if(isset($_REQUEST['atc'])){

		if ($_REQUEST['atc']=="delall") {

			$value = $_REQUEST['vr'];

			updateDataValue("tbl_ConsolidadoGuia","int_IdGrupo = 0",$value,"int_ID");
			$delInfo =deleteData(
				"tbl_GrupoconsolidadoGuia",
				$value);

		}}

  ?>

  <?php

  	if(isset($_REQUEST['atc'])){

		if ($_REQUEST['atc']=="query2") {

			$id = $_REQUEST['id'];



			$idsConso=listData(

				"int_idConsolidado",

				"tbl_ConsolidadoGrupoU",

				"WHRE int_idGrupo = $id AND int_Activo=1"

				);

			$prequery = '1=1';

			foreach ($idsConso as $value) {

				$prequery += ' AND int_NConsolidado = $value[0] ' ;

			}

			$idsGuias = listData(

			"int_Guia","tbl_Guia","WHERE $prequery AND int_Activo = 1 "

			);

			echo json_encode($idsGuias);



		}

	}

   ?>

  <?php 



  	if (isset($_REQUEST['atc'])) {

  	 	if ($_REQUEST['atc']=="AddPC") {

  	 		$agente = $_REQUEST['agen'];

  	 		$destino = $_REQUEST['dest'];

  	 		$id = $_REQUEST['id'];

  	 		updateDataValue(

  	 			"tbl_GrupoconsolidadoGuia",

  	 			"var_destino='$destino' , var_desaduanador = '$agente' ,int_PD = 1",

  	 			$id,"int_ID"

  	 			);
  	 		$listConso = listData(
  	 			"int_ID",
  	 			"tbl_ConsolidadoGuia",
  	 			"where int_Activo = 1 and int_IdGrupo = $id"
  	 		);
  	 		foreach ($listConso as $value) {
  	 			updateDataValue(
  	 				"tbl_ConsolidadoGuia",
  	 				"int_PD = 1",
  	 				$value[0],"int_ID"
  	 				);
  	 		}

   	 	}

  	 } 

  	 ?>

<?php 



  	if (isset($_REQUEST['atc'])) {

  	 	if ($_REQUEST['atc']=="upd_imp") {
  	 		$id = $_REQUEST['id'];
  	 		$pesoL = $_REQUEST['LB'];
  	 		$pesoK = $_REQUEST['KG'];

  	 		updateDataValue(
  	 			"tbl_GrupoconsolidadoGuia",
  	 			"int_pesoLB = $pesoL, int_pesoKG = $pesoK",$id,"int_ID"
  	 			);

  	 	}
  	}

?>

<?php if (isset($_REQUEST['atc'])) {
	if ($_REQUEST['atc']=="add_X") {
		$data = json_decode($_REQUEST['data'],true);
		$listUp = listData("int_Guia","tbl_GRPconX","where int_IDGrupo = ".$data[0]);
		for($i = 1;$i < count($data);$i++){
			$true = 0;
			foreach ($listUp as $value2) {
				if ($value2[0] == $data[1][0]) {
						$true = 1;
						break;
					}
			}
			if ($true == 0) {
			insertData("tbl_GRPconX",
				"int_Guia,var_NombreDestinatario,var_DireccionDestinatario,int_peso,int_declarado,var_TelefonoDestinatario,int_IDGrupo",
				"".$data[$i][0].",'".$data[$i][1]."','".$data[$i][2]."',".$data[$i][4].",".$data[$i][5].",'".$data[$i][3]."',".$data[0]."");
			}else{
			updateDataValue("tbl_GRPconX","var_NombreDestinatario='".$data[$i][1]."',var_DireccionDestinatario='".$data[$i][2]."',
				int_peso=".$data[$i][4].",int_declarado=".$data[$i][5].",var_TelefonoDestinatario='".$data[$i][3]."'",$data[$i][0],"int_Guia");	
			}
		}
		

	}
} ?>

<?php if (isset($_REQUEST['atc'])) {
	if ($_REQUEST['atc']=='listX') {
		$id = $_REQUEST['id'];
		$listInfo = listData(
			"int_Guia,var_NombreDestinatario,var_DireccionDestinatario,int_peso,int_declarado,var_TelefonoDestinatario"
			,"tbl_GRPconX","where int_IDGrupo = $id"
			);

		echo json_encode($listInfo);
	}
} ?>

<?php if (isset($_REQUEST['atc'])) {
	if ($_REQUEST['atc']=='changeX') {
		$id = $_REQUEST['id'];
		$array = $_REQUEST['array'];
		$nombre  ='';
		foreach ($array as  $value) {
			$nombre .= "var_NombreDest != '".$value[0]."' AND";
		}
		$listInfo = listData(
			"var_NombreDest,var_DireccionDest"
			,"tbl_Guia","where $nombre 1=1 limit ".count($array).""
			);
		
		echo json_encode($listInfo);
	}
} ?>