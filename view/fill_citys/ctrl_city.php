
<?php require('../../modelo.php'); ?>

<?php
	
if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="all"){
$Emp = array("globoenvios", "sentcargo");
				$vrcTex1 = trim($_REQUEST['txtCampo1']);
				$vrcTex2 = trim($_REQUEST['txtCampo2']);
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = trim($_REQUEST['txtCampo4']);
				$vrcTex5 = trim($_REQUEST['txtCampo5']);
				$vrcNumpais = trim($_REQUEST['NombrPais']);
			
	insertData(
			"tbl_Ciudades_iata",
			"var_Ciudad, var_Estado, var_Pais, var_Zona, var_IATA,int_Activo,int_Pais",
			"'$vrcTex1', '$vrcTex2', '$vrcNumpais', '$vrcTex4','$vrcTex5',1,'$vrcTex3'");
			

for ($i=0; $i <  count($Emp); $i++) { 
	// abrimos la sesión cURL
$ch = curl_init();
 	// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"http://".$Emp[$i].".easycargopro.com/view/city/ctrl_city.php");
// definimos el número de campos o parámetros que enviamos mediante POST
curl_setopt($ch, CURLOPT_POST, 1);
// definimos cada uno de los parámetros
curl_setopt($ch, CURLOPT_POSTFIELDS, "act=add&txtCampo1=".$vrcTex1."&txtCampo2=".$vrcTex2."&txtCampo3=".$vrcTex3."&txtCampo4=".$vrcTex4."&txtCampo5=".$vrcTex5."&var_pais=".$vrcNumpais);
 
// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
echo $Emp[$i];
// cerramos la sesión cURL
curl_close ($ch);
 }


}
}

?>
<?php
	
	//LISTAR DATOS
	function sel8($conditions){

		$listInfo8 =listData(

			"DISTINCT var_Pais,int_Pais",

			"tbl_Ciudades_iata",

			"WHERE int_Activo = '1' AND ".$conditions,

			"ORDER BY var_Pais");

		return $listInfo8;

	}
?>
<?php

	//AÑADIR DATOS
	if(isset($_REQUEST['act'])){
		if($_REQUEST['act']=="add"){
			$vrcValoresCadena =
				$vrcTex1 = $_REQUEST['txtCampo1'];
				$vrcTex2 = $_REQUEST['txtCampo2'];
				$vrcTex3 = $_REQUEST['txtCampo3'];
				$vrcTex4 = $_REQUEST['txtCampo4'];
				$vrcTex5 = $_REQUEST['txtCampo5'];
				$vrcTex5 = $_REQUEST['txtCampo6'];
		$addInfo =insertData(
			"tbl_Ciudades",
			"var_Ciudad, var_Estado, var_Pais, var_Zona, var_Dane, int_Activo",
			"$vrcTex1, '$vrcTex2', '$vrcTex3', '$vrcTex4', '$vrcTex5', 1");
			
			echo "<script language='javascript'>reloaded('city');</script>";
		}
	}
?>	

<?php

if(isset($_REQUEST['act'])){

		if($_REQUEST['act']=="src"){
		
				$listDatas = listData(
				"DISTINCT int_Pais, concat(var_Pais)",
				"tbl_Ciudades_iata"
				,"int_Activo = 1 "
				);
			echo json_encode($listDatas);
		}
	}
?>


