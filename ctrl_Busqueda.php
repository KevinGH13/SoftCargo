<?php require("modelo.php"); ?>
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
 	if ($_REQUEST['atc']=="estados") {
 	$id = $_REQUEST['id'];
 	$listStatus  = array('0' => '' );
	$listStatusT = array('0' => '' );
	$listStatus = listdata(
		"distinct var_Estado,var_Fecha,GH.var_Comentario,var_Resivido","tbl_GuiaHistoricoEstados GH","INNER JOIN
    tbl_EstadosCarga EC
    ON GH.int_Registro = EC.int_ID where GH.int_ID_Guia = $id and EC.bol_Web='SI'","ORDER BY var_Fecha ASC"
		);
	

	$resultado = array_merge($listStatus);
	echo json_encode($resultado);
}
} ?>

<?php
if (isset($_REQUEST['atc'])) {
 	if ($_REQUEST['atc']=="search") {
 	$id = $_REQUEST['value'];
 	$listStatus  = array('0' => '' );
	$listStatusT = array('0' => '' );
	$listStatus = listdata(
		" distinct var_Estado,var_Fecha,GH.var_Comentario,var_Resivido","tbl_GuiaHistoricoEstados GH","INNER JOIN
    tbl_EstadosCarga EC ON GH.int_Registro = EC.int_ID
        INNER JOIN
    tbl_Guia G ON G.int_Guia = GH.int_ID_Guia
WHERE
    G.int_Tracking = '$id'
        AND EC.bol_Web = 'SI'
ORDER BY var_Fecha ASC"
		);
	

	$resultado = array_merge($listStatus);
	echo json_encode($resultado);
}
} ?>