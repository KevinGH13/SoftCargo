<?php require('../../modelo.php'); ?>

<?php


  function sel($conditions){

    $listInfo =listData(

      "int_ID,var_Empresa, var_Transportador, var_EmpresaDestino, var_PaisDest, var_Servicio,

      var_DestinatarioDuplicado, int_MaximoPRemitente, int_MaxDeclaradoRemitente,var_fechaCreacion,int_PD",

      "tbl_ConsolidadoGuia",

      "WHERE int_Activo = '1' AND ".$conditions,

      "order by int_ID Desc");


    return $listInfo;



  }
  function selPD($conditions){
  	$listInfo =listData(

      "int_PD",

      "tbl_ConsolidadoGuia",

      "WHERE int_Activo = '1' AND int_ID = ".$conditions,

      "");

    return $listInfo;
  }

  function sel8($conditions,$lim,$conditions2){

    $infoConsolidado = listData("var_PaisDest,var_Servicio,int_MaximoPRemitente,int_MaxDeclaradoRemitente","tbl_ConsolidadoGuia","where 1=1 and $conditions");

    $vector_ServiciosR = $infoConsolidado[0][1];
    $vector_Servicios = explode(",", $vector_ServiciosR);
    $queryServicios = "";
    for ($i=0; $i < count($vector_Servicios) ; $i++) { 
       if ($i==0 and count($vector_Servicios)>1) {
        $queryServicios .= $vector_Servicios[0]." OR int_Servicio = "; 
       }else if($i==count($vector_Servicios)-1){
          $queryServicios .= $vector_Servicios[$i]; 
       }else{
         $queryServicios .= $vector_Servicios[$i]." OR int_Servicio = ";
       }
    }

    $listInfo =listData(

      "G.int_ID,G.int_Guia,G.var_NombreRemit,G.var_NombreDest,
      G.decimal_PesoCobrado,G.int_ValorDeclaradoManual,G.int_ValorSeguro,G.var_Agente,G.date_FechaEnvio,G.int_ValorDeclarado,G.int_NConsolidado,CIATA.var_IATA,Ag.var_Agente",

      "tbl_Guia G",

      "inner join tbl_Ciudades_iata CIATA on CIATA.int_ID = G.int_ciudadDestinatario inner join tbl_Agentes Ag on Ag.int_ID = G.var_Agente WHERE CIATA.int_Pais = ".$infoConsolidado[0][0]." and 
      decimal_PesoCobrado <= ".$infoConsolidado[0][2]." AND int_ValorDeclaradoManual <= ".$infoConsolidado[0][3]." AND (G.int_Servicio = ".$queryServicios.") AND G.int_NEmpaque = 0 and G.int_Activo = 1 $conditions2"
      );

    return $listInfo;

  }

  function sel_Factura($conditions){

    $listInfo = listData(

      "var_NombreDest,var_DireccionDest,int_ValorDeclaradoManual,decimal_PesoCobrado,int_ciudadDestinatario,int_Servicio",

      "tbl_Guia",

      "where int_Activo = 1 and int_Guia = $conditions "

      );

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
<?php function selEmpresa($conditions){
      $listEmpresa = listData("var_Empresa,var_Ciudad,var_Estado,var_Pais,var_Telefono","tbl_Empresa","where int_ID = $conditions");
      return $listEmpresa;
  } ?>

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

      "right(int_NEmpaque,4),int_Guia,decimal_PesoManual,decimal_DimAltoManual,decimal_DimAnchoManual,decimal_DimLargoManual,var_NombreDest,decimal_PesoCobrado,count(distinct(G.int_NEmpaque))",

      "tbl_Guia G",

      "inner join tbl_EmpaquesConsolidadoU EC on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = $conditions AND G.int_Activo = 1",

      " order by int_IDEmpaque DESC"

      );

    return $listInfo;



  } ?>








<?php function CEmpa($conditions){

    $listInfo = listData(

      "count(int_IDEmpaque)",

      "tbl_EmpaquesConsolidadoU",

      "Where int_IDConsolidado = $conditions AND int_Activo=1"

      );

    return $listInfo;

  } ?>


<?php function VerificarRestricciones($empaque,$id_factura,$id_Consolidado){

    // Consultamos la factura 

      $factura =  sel_Factura($id_factura);

      $nombreDest = $factura[0][0];

      $direccionDest = $factura[0][1];

      $valorDeclaradoFactura = $factura[0][2];

      $pesoFactura = $factura[0][3];

      $pais = listData("int_Pais","tbl_Ciudades_iata","where int_ID = ".$factura[0][4]."");
      $Fac_Servicio = $factura[0][5];


      // Consulta de la restriccion del consolidado

      $infoConsolidado =   sel("int_ID = $id_Consolidado");

      $valorMaxDeclarar = $infoConsolidado[0][8];

      $valPais = $infoConsolidado[0][4];

      $valorPesoMax = $infoConsolidado[0][7];

      $valorDuplicado = $infoConsolidado[0][6];

      $ProcesoCulminado = $infoConsolidado[0][10];

      $consolidado_Servicio = $infoConsolidado[0][5];

      $consolidado_Servicio = explode(",", $consolidado_Servicio);

      // Consulta de la restriccion de Destinatarios duplicados

      $duplicados = listData("count(G.int_Guia),sum(G.decimal_PesoCobrado)","tbl_Guia G","inner join tbl_EmpaquesConsolidadoU 

        EC on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = $id_Consolidado and EC.int_Activo = 1 and 

        (G.var_NombreDest = '$nombreDest' or G.var_DireccionDest='$direccionDest') ");

      //

      if(isset($duplicados[0][1])){

         $pesoS = $duplicados[0][1];

      }else{ $pesoS = $pesoFactura;}

      //Se ingresa el identificador de la Empaque a la guia para hace la union

      if ($duplicados[0][0] <= $valorDuplicado ) {

          if ($valorDeclaradoFactura <= $valorMaxDeclarar) {

              if ($pesoS <= $valorPesoMax) {

                if ($ProcesoCulminado != 1) {
                  if ($valPais == $pais[0][0]) {
                  	$bandera = 0;
                    foreach ($consolidado_Servicio as  $value) {
                       if ($value == $Fac_Servicio) {
                         updateDataValue(
                        "tbl_Guia",
                        "int_NEmpaque = $empaque ","$id_factura","int_Guia");
                         insertData("tbl_GuiaHistoricoEstados","int_ID_Guia,int_Registro,var_Fecha,var_Comentario","$id_factura,3,now(),'Ninguno'");
                        echo 3;
                        $bandera = 1;
                        break;
                       }
                    }
                    if ($bandera == 0 ) {
                    	echo 12;	// Retorna 12 Cuando el factura no cumple el servicio
                    }
                   
                  }else{
                    echo 11;
                  } 
                }else{

                  echo 10;
                }

                   

              }else{

              echo 2; // Retorna 2, si supera el peso maximo del consolidado

            }

          }else{

            echo 1; // Retorna 1, si supera el valor maximo a declarar

          }

      }else{

        echo 0; // Retorna 0 , si supera el maximo de duplicados

      }


  } ?>


<?php function VerificarRestricciones2($empaque,$id_factura,$id_Consolidado){

    // Consultamos la factura 

      $factura =  sel_Factura($id_factura);

      $nombreDest = $factura[0][0];

      $direccionDest = $factura[0][1];

      $valorDeclaradoFactura = $factura[0][2];

      $pesoFactura = $factura[0][3];



      // Consulta de la restriccion del consolidado

      $infoConsolidado =   sel("int_ID = $id_Consolidado");

      $valorMaxDeclarar = $infoConsolidado[0][8];

      $valorPesoMax = $infoConsolidado[0][7];

      $valorDuplicado = $infoConsolidado[0][6];

      // Consulta de la restriccion de Destinatarios duplicados

      $duplicados = listData("count(G.int_Guia),sum(G.decimal_PesoCobrado)","tbl_Guia G","inner join tbl_EmpaquesConsolidadoU 

        EC on G.int_NEmpaque = EC.int_IDEmpaque where EC.int_IDConsolidado = $id_Consolidado and EC.int_Activo = 1 and 

        (G.var_NombreDest = '$nombreDest' or G.var_DireccionDest='$direccionDest') ");

      //

      if(isset($duplicados[0][1])){

         $pesoS = $duplicados[0][1];

      }else{ $pesoS = $pesoFactura;}

      //Se ingresa el identificador de la Empaque a la guia para hace la union

      if ($duplicados[0][0] <= $valorDuplicado ) {

          if ($valorDeclaradoFactura <= $valorMaxDeclarar) {

              if ($pesoS <= $valorPesoMax) {

                    return 3;

              }else{

              echo "2"; // Retorna 2, si supera el peso maximo del consolidado

            }

          }else{

            echo "1"; // Retorna 1, si supera el valor maximo a declarar

          }

      }else{

        echo "0"; // Retorna 0 , si supera el maximo de duplicados

      }


  } ?>

<?php

if (isset($_REQUEST['atc'])) {

  if ($_REQUEST['atc'] == "C_Empa") {

     $id = $_REQUEST['Id'];

     $Tipo = $_REQUEST['Tipo'];

     $numero = $_REQUEST['numero'];

     $NEmpaque = $id.str_pad($Tipo,2,'0',STR_PAD_LEFT).str_pad($numero,4,'0',STR_PAD_LEFT);

     $SI = listData("int_Activo,int_ID","tbl_EmpaquesConsolidadoU","where right(int_IDEmpaque,4) = $numero  and int_IDConsolidado = $id");

     if ($SI[0][0] != '') {
      if ($SI[0][0] == 0) {
        updateDataValue("tbl_EmpaquesConsolidadoU","int_Activo = 1,int_Tipo = ".$Tipo."",$SI[0][1],"int_ID");
        echo "Ac $numero $Tipo ".$SI[0][1]."";
      }else{
        echo 1;
      }
    }else{
      insertData(

     "tbl_EmpaquesConsolidadoU",

     "int_IDConsolidado,int_IDEmpaque,int_Tipo",

     "$id,$NEmpaque,$Tipo"

      );
    }

     



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

  	 		"WHERE int_NEmpaque = ".$int_IDEmpaque." and int_Activo = 1",

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

      $id_Consolidado = $_REQUEST['id_C'];

      VerificarRestricciones($empaque,$id_factura,$id_Consolidado);
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

    if ($_REQUEST['atc']=="verificar3") {

      $valor = $_REQUEST['valor'];

      $listInfo = listData(
        "1",
        "tbl_Guia",
        "where int_Guia = $valor and int_Activo=1");

      if ($listInfo[0][0] == "1") {
        echo "1";
      }else{
        echo "0";
      }

      }


  }

 ?>
 <?php

  if (isset($_REQUEST['atc'])) {

    if ($_REQUEST['atc']=="tras") {

      $Fac = $_REQUEST['Fac'];
      $empaqueDes = $_REQUEST['ids'];


      $consolidadoDes = listData(
      "int_IDConsolidado",
      "tbl_EmpaquesConsolidadoU",
      " where int_IDEmpaque = $empaqueDes and int_Activo=1"
      );

        VerificarRestricciones($empaqueDes,$Fac,$consolidadoDes[0][0]);

  
      }
  }

 ?>


  <?php 

if (isset($_REQUEST['atc'])) {

   if ($_REQUEST['atc'] == 'delEmp2') {

      $id = $_REQUEST['id'];

      $ids = $_REQUEST['ids'];
      $si;

    /////////////////////////////////////////////////////////////////

      $consolidadoDes = listData(
      "int_IDConsolidado",
      "tbl_EmpaquesConsolidadoU",
      " where int_IDEmpaque = $ids and int_Activo=1"
      );


      $listInfo= listData(
        "int_Guia",
        "tbl_Guia",
        "where int_Activo = 1 and int_NEmpaque=$id"
      );
      foreach ($listInfo as $factura) {
          $cumpleres = VerificarRestricciones2('',$factura[0],$consolidadoDes[0][0]);
          if ($cumpleres == '3') {
            $si = '3'  ;    
          }else{
            break;
          }
        }
      if ($si == '3') {
        updateDataValue(
        "tbl_Guia",
        "int_NEmpaque = $ids","$id","int_NEmpaque"
        );

      deleteDataV(
        "tbl_EmpaquesConsolidadoU",
        "$id","int_IDEmpaque"
        );
      }
      echo $si; 
   }

}

  ?>



  <?php

  if (isset($_REQUEST['atc'])) {

    if ($_REQUEST['atc']=="verificar") {

      $valor = $_REQUEST['valor'];

        $veriInfo = listData(

        "1,int_NEmpaque",

        "tbl_Guia",

        "Where int_Guia = $valor AND int_Activo = 1"

        ,'');

        if ($veriInfo[0][0] == 1) {

            if ($veriInfo[0][1] == 0) {

              $empaque = $_REQUEST['emp'];

              $conso = listData("int_IDConsolidado","tbl_EmpaquesConsolidadoU","Where int_IDEmpaque = $empaque and int_Activo = 1");

               VerificarRestricciones($empaque,$valor,$conso[0][0]);
            }

            else{

              echo 4; // Retorna 2 cuando la factura ya pertenece a un consolidado

            }

        }else{

          echo 5; // retorna cuando no pertenece

        }



      }

  }

 ?>



   <?php

  if (isset($_REQUEST['atc'])) {

    if ($_REQUEST['atc']=="verificar2") {

      $valor = $_REQUEST['valor'];



        $veriInfo = listData(

        "1,int_idConsolidado,right(int_IDEmpaque,4)",

        "tbl_Guia G",

        "inner join tbl_EmpaquesConsolidadoU ECU on G.int_NEmpaque = ECU.int_IDEmpaque where ECU.int_Activo = 1 and G.int_Activo=1 and int_Guia=$valor"

        ,'');

        if ($veriInfo[0][0] == 1) {

          echo json_encode($veriInfo);

        }else{

          echo 0;

        }



      }

  }

 ?>
 <?php 
 if (isset($_REQUEST['atc'])) {
    if ($_REQUEST['atc'] == 'delta') {
      $id = $_REQUEST['idTa'];
        updateDataValue(
        "tbl_Guia",
        "int_NEmpaque = 0","$id","int_Guia"
        );
    }
  } ?>

 <?php 
 if (isset($_REQUEST['atc'])) {
    if ($_REQUEST['atc'] == 'act_tabl') {
      $id = $_REQUEST['intIdconsolidad'];
      $data = sel8('int_ID = '.$id);
      echo json_encode($data);
    }
  } ?>
   <?php 
 if (isset($_REQUEST['atc'])) {
    if ($_REQUEST['atc'] == 'act_tabl2') {
      $valor= $_REQUEST['valor'];
      $data = listData('int_Guia,var_PaisDest','tbl_Guia',"where int_Guia = $valor");
      echo json_encode($data);
    }
  } ?>
