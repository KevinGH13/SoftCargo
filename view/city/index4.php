<?php
require '../../modelo.php';
require_once 'Excel/reader.php';

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('Venezuela.xls');


		
//Y mostramos los datos en forma de tabla
echo("<table>");
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	echo("<tr>");
	$query = "";
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		echo("<td>".$data->sheets[0]['cells'][$i][$j] ."</td>");
		
	}
	$var8=$data->sheets[0]['cells'][$i][8];
	$var2=$data->sheets[0]['cells'][$i][2];
	$var3=$data->sheets[0]['cells'][$i][3];
	$var4=$data->sheets[0]['cells'][$i][4];
	$var5=$data->sheets[0]['cells'][$i][5];
	$var6=$data->sheets[0]['cells'][$i][6];
	$var7=$data->sheets[0]['cells'][$i][7];

	insertData("tbl_Ciudades_iata","var_Ciudad,var_Estado,var_Pais,var_IATA,var_Zona,int_Activo,int_Pais"
				,"'$var2','$var3','$var4','$var5','$var6','$var7','5'");
	echo("</tr>");
	
}
echo("</table>");

?>