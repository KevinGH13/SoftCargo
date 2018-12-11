<?php require('../../modelo.php'); ?>
<?php function sel($condition){
	$listInfo = listdata(
			"int_ID_Guia,int_Registro,var_Fecha",
			"tbl_GuiaHistoricoEstados",
			"where $condition and 1=1" // preguntar restricciones
			);
		return $listInfo;
	} ?>
<?php 
	function state($condition){
		$listInfo = listdata(
			"int_ID,var_Estado",
			"tbl_EstadosCarga",
			"where $condition and 1=1 and int_Activo = '1' " // preguntar restricciones
			);
		return $listInfo;
	}
 ?>


 <?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="verificar") {
 		$value = $_REQUEST['value'];
 		$listInfo = listdata(
 			"1","tbl_Guia","where int_Guia = $value and int_Activo = 1"
 			);
 		if ($listInfo[0][0]=='1') {
 			echo "0";
 		}else{
 			echo "1";
 		}
 	}
 }
  ?>

<?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="verificar2") {
 		$value = $_REQUEST['value'];
 		$listInfo = listdata(
 			"1","tbl_ConsolidadoGuia","where int_ID = $value and int_Activo = 1"
 			);
 		if ($listInfo[0][0]=='1') {
 			echo "0";
 		}else{
 			echo "1";
 		}
 	}
 }
  ?>

  <?php 
 if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc']=="verificar3") {
    $value = $_REQUEST['value'];
    $listInfo = listdata(
      "1","tbl_GrupoconsolidadoGuia","where int_ID = $value and int_Activo = 1"
      );
    if ($listInfo[0][0]=='1') {
      echo "0";
    }else{
      echo "1";
    }
  }
 }
  ?>

<?php 
if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="add_single") {
 		$arrayData = array();
 		
 		for ($i=1; $i <= 4 ; $i++) { 
 			$aux = $_REQUEST['txtcampo'.$i];
 			array_push($arrayData, $aux);
 		}
 		insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Fecha,var_Comentario","$arrayData[0],$arrayData[1],'$arrayData[2]','$arrayData[3]'");
 			
 		
 		
 		
 	}
 }
 ?>
 <?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="add_PDE") {
 		$arrayData = array();
 		
 		for ($i=1; $i <= 4 ; $i++) { 
 			$aux = $_REQUEST['txtcampo'.$i];
 			array_push($arrayData, $aux);
 		}
 		
 		insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Resivido,var_Fecha","$arrayData[0],11,'$arrayData[1]','$arrayData[2]'");
 		
 		
 	}
 }
 ?> 
  <?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="add_Consolidado") {
 		$arrayData = array();
 		
 		for ($i=1; $i <= 4 ; $i++) { 
 			$aux = $_REQUEST['txtcampo'.$i];
 			array_push($arrayData, $aux);
 		}
 		
 		$listFacturas = listdata("int_Guia","tbl_Guia G","INNER JOIN tbl_EmpaquesConsolidadoU E ON G.int_NEmpaque = E.int_IDEmpaque WHERE  E.int_IDConsolidado = $arrayData[0] AND G.int_Activo=1 AND E.int_Activo= 1; ");
 		$no = " ";
 		foreach ($listFacturas as $value) {
 			
 			insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Fecha,var_Comentario","$value[0],$arrayData[1],'$arrayData[2]','$arrayData[3]'");
 			
 		}
 		
    echo $no;
 		
 		
 		
 	}
 }
 ?>

<?php 
 if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc']=="add_GRPcon") {
    $arrayData = array();
    
    for ($i=1; $i <= 4 ; $i++) { 
      $aux = $_REQUEST['txtcampo'.$i];
      array_push($arrayData, $aux);
    }
    
    $listFacturas = listdata("int_Guia","tbl_Guia G","inner join tbl_EmpaquesConsolidadoU EC 

       inner join tbl_ConsolidadoGuia C

       on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = C.int_ID 

       and G.int_Activo = 1 and EC.int_Activo = 1 and C.int_IdGrupo = $arrayData[0] ; ");
    $no = " ";
    foreach ($listFacturas as $value) {
      
      insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Fecha,var_Comentario","$value[0],$arrayData[1],'$arrayData[2]','$arrayData[3]'");
      
    }
    
    echo $no;
    
    
    
  }
 }
 ?>
   <?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="exe_report") {
 		$arrayData = array();
 		
 		for ($i=1; $i <= 4 ; $i++) { 
 			$aux = $_REQUEST['txtcampo'.$i];
 			array_push($arrayData, $aux);
 		}
 		
 		$listFacturas = listdata("int_Guia, int_Registro","tbl_Guia G"," INNER JOIN
    tbl_EmpaquesConsolidadoU E ON G.int_NEmpaque = E.int_IDEmpaque
        INNER JOIN
    tbl_GuiaHistoricoEstados H ON H.int_ID_Guia = G.int_Guia
WHERE
    H.var_Fecha BETWEEN '$arrayData[2]' AND '$arrayData[3]'
        AND E.int_IDConsolidado = $arrayData[1]
        AND G.int_Activo = 1
        AND E.int_Activo = 1
        AND H.int_Registro = $arrayData[0]
        AND H.var_Fecha IN (SELECT 
            MAX(var_Fecha)
        FROM
            tbl_GuiaHistoricoEstados
        WHERE
            int_ID_Guia = G.int_Guia); 
       
");
 		echo json_encode($listFacturas);
	
 	}
 }
 ?>
  <?php 
 if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="exe_RAR") {
 		$arrayData = array();
 		$respuesta = array();
 		for ($i=1; $i <= 4 ; $i++) { 
 			$aux = $_REQUEST['txtcampo'.$i];
 			array_push($arrayData, $aux);
 		}
 		
 		$listFacturas = listdata("int_Guia","tbl_Guia G","INNER JOIN tbl_EmpaquesConsolidadoU E ON G.int_NEmpaque = E.int_IDEmpaque WHERE  E.int_IDConsolidado = $arrayData[2] AND G.int_Activo=1 AND E.int_Activo= 1; ");
 		
 		foreach ($listFacturas as $value) {
 			$aux = fechas($value[0],$arrayData[0],$arrayData[1]);
 			array_push($respuesta,$aux);
 		}
 		echo json_encode($respuesta);
	
 	}
 }
 ?>
 <?php 
 function fechas($condition,$int_Registro1,$int_Registro2){
 	$fecha1 = listdata("MIN(var_Fecha),int_ID_Guia","tbl_GuiaHistoricoEstados","where int_ID_Guia=$condition and int_Registro = $int_Registro1");
 	$fecha2 = listdata("MAX(var_Fecha),int_ID_Guia","tbl_GuiaHistoricoEstados","where int_ID_Guia=$condition and int_Registro = $int_Registro2");
 	$f1 = date_create($fecha1[0][0]);
 	$f2 = date_create($fecha2[0][0]);
 	$intervalo = date_diff($f1,$f2);
 	$arrayName = array('0' => $fecha1[0][1] , '1' => $intervalo );
 	return $arrayName;
 } ?>
