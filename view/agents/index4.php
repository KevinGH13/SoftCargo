<?php
require '../../modelo.php';
require_once 'Excel/reader.php';

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('agentes.xls');

//execute_query("DELETE from tbl_Agentes where int_ID = 0");

	
//Y mostramos los datos en forma de tabla
echo("<table style='width=95%'>");
$id=4;
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	echo("<tr >");
	$query = "";
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		echo("<td>".$data->sheets[0]['cells'][$i][$j] ." | </td>");
		
	}
	$var0=$data->sheets[0]['cells'][$i][1];
	$var1=$data->sheets[0]['cells'][$i][2];
	$var2=$data->sheets[0]['cells'][$i][3];
	$var3=$data->sheets[0]['cells'][$i][4];
	$var4=$data->sheets[0]['cells'][$i][5];
	$var5=$data->sheets[0]['cells'][$i][6];
	$var6=$data->sheets[0]['cells'][$i][7];
	$var7=$data->sheets[0]['cells'][$i][8];
	$var8=$data->sheets[0]['cells'][$i][9];
	$var9=$data->sheets[0]['cells'][$i][10];

	/*insertData("tbl_Agentes","int_ID,int_IdEmpresa,var_Agente,var_Direccion,var_Ciudad,var_Estado,var_Pais,int_CodZip,var_Telefono,var_Fax,var_Email,int_Activo,int_TipoAgente,int_CodExportacion"
				,"$id,1,'$var1','$var2','$var3','$var4','$var6','$var5','$var7','$var8','$var9',1,1,'$var0'");*/
	$id = $id+1;
	echo("</tr>");

}
echo("</table>");
echo "1,'$var1','$var2','$var3','$var4','$var6','$var5','$var7','$var8','$var9',1,1,'$var0'";
	
?>