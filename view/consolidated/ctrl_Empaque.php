<?php require('../../modelo.php'); ?>
<?php
  function sel($conditions){
    $listInfo =listData(
      "int_ID,var_Empresa, var_Transportador, var_EmpresaDestino, var_PaisDest, var_Servicio,
      var_DestinatarioDuplicado, int_MaximoPRemitente, int_MaxDeclaradoRemitente",
      "tbl_ConsolidadoGuia",
      "WHERE int_Activo = '1' AND ".$conditions,
      "ORDER BY int_ID");
    return $listInfo;

  }
  function sel8($conditions,$lim){

    $listInfo =listData(
      "int_ID,int_Guia,var_NombreRemit,
      var_NombreDest,
      decimal_PesoCobrado,
      int_ValorDeclaradoManual,int_ValorSeguro,var_Agente,date_FechaEnvio,int_ValorDeclarado,int_NConsolidado",
      "tbl_Guia",
      "WHERE int_Activo = '1' AND ".$conditions,
      "ORDER BY int_ID ");
    return $listInfo;
  }

    function selTipo(){
	    	$listInfo = listData(
	    		"int_ID,var_Empaque",
          "tbl_Empaques",
	    		"WHERE int_Activo = '1'",
	    		"");
	    	return $listInfo;
	}
?>
<?php
  function selEmp($conditions){
    $listInfo = listData(
    "int_ID,int_IDConsolidado,int_IDEmpaque,int_Tipo",
    "tbl_EmpaquesConsolidadoU",
    "WHERE int_Activo = 1 AND int_IDConsolidado = $conditions "
  );
  return $listInfo;
  }
 ?>

<?php 
  function selEmp2($conditions){
    $listInfo = listData(
      "int_IDConsolidado,int_IDEmpaque,int_Tipo",
      "tbl_EmpaquesConsolidadoU",
      "WHERE int_Activo = 1 AND int_IDConsolidado != $conditions"
      );
    return $listInfo;
  }
 ?>
<?php function Rep_Emp($conditions){
    $listInfo = listData(
      "right(int_NEmpaque,4),int_Guia,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,var_NombreDest,",
      "tbl_Guia G",
      "inner join ECP_database_master.tbl_EmpaquesConsolidadoU EC on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = 15120010001"
      );
    return $listInfo;

  } ?>
<?php
if (isset($_REQUEST['atc'])) {
  if ($_REQUEST['atc'] == "C_Empa") {
     $id = $_REQUEST['Id'];
     $Tipo = $_REQUEST['Tipo'];
     $numero = $_REQUEST['numero'];
     $NEmpaque = $id.str_pad($Tipo,2,'0',STR_PAD_LEFT).str_pad($numero,4,'0',STR_PAD_LEFT);
     insertData(
     "tbl_EmpaquesConsolidadoU",
     "int_IDConsolidado,int_IDEmpaque,int_Tipo",
     "$id,$NEmpaque,$Tipo"
   );

  }
}
 ?>

<?php 
	if (isset($_REQUEST['atc'])) {
  	 if ($_REQUEST['atc'] == "Q_Empa") {
  	 	$int_IDEmpaque = $_REQUEST['id'];
  	 	$listInfo = listData(
  	 		"int_Guia,var_PaisDest",
  	 		"tbl_Guia",
  	 		"WHERE int_NEmpaque = ".$int_IDEmpaque,
  	 		""
  	 		);
  	 	echo json_encode($listInfo);
  	 }
  	}
 ?>
 <?php 
if (isset($_REQUEST['atc'])) {
   if ($_REQUEST['atc'] == 'aEmp') {
      $empaque = $_REQUEST['empaque'];
      $id_factura = $_REQUEST['id_factura'];
      updateDataValue(
        "tbl_Guia",
        "int_NEmpaque = $empaque ","$id_factura","int_Guia"
        );
      echo "YES";
   }
}
  ?>

 <?php 
if (isset($_REQUEST['atc'])) {
   if ($_REQUEST['atc'] == 'delEmp') {
      $id = $_REQUEST['id'];
      updateDataValue(
        "tbl_Guia",
        "int_NEmpaque = 0","$id","int_NEmpaque"
        );
      deleteDataV(
        "tbl_EmpaquesConsolidadoU",
        "$id","int_IDEmpaque"
        );
   }
}
  ?>
  <?php 
if (isset($_REQUEST['atc'])) {
   if ($_REQUEST['atc'] == 'delEmp2') {
      $id = $_REQUEST['id'];
      $ids = $_REQUEST['ids'];
      updateDataValue(
        "tbl_Guia",
        "int_NEmpaque = $ids","$id","int_NEmpaque"
        );
      deleteDataV(
        "tbl_EmpaquesConsolidadoU",
        "$id","int_IDEmpaque"
        );
      
   }
}
  ?>