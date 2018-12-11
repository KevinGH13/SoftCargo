<?php
require '../../modelo.php';
require_once 'Excel/reader.php';

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('guias.xls');

//execute_query("DELETE from tbl_Guia where int_Guia = 16001001002000000001");

$numero = 0001;
$conse = "1600100100200000".str_pad($numero, 4,"0",STR_PAD_LEFT);
//Y mostramos los datos en forma de tabla
echo("<table>");
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	echo("<tr>");
	$query = "";
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		echo("<td>".$data->sheets[0]['cells'][$i][$j] ."</td>");
		
	}
	$var1=$data->sheets[0]['cells'][$i][1];
	$var2=$data->sheets[0]['cells'][$i][2];
	$var3=$data->sheets[0]['cells'][$i][3];
	$var4=$data->sheets[0]['cells'][$i][4];
	$var5=$data->sheets[0]['cells'][$i][5];
	$var6=$data->sheets[0]['cells'][$i][6];
	$var7=$data->sheets[0]['cells'][$i][7];
	$var8=$data->sheets[0]['cells'][$i][8];
	$var9=$data->sheets[0]['cells'][$i][9];
	$var10=$data->sheets[0]['cells'][$i][10];
	$var11=$data->sheets[0]['cells'][$i][11];
	$var12=$data->sheets[0]['cells'][$i][12];
	$var13=$data->sheets[0]['cells'][$i][13];
	$var14=$data->sheets[0]['cells'][$i][14];
	$var15=$data->sheets[0]['cells'][$i][15];
	$var16=$data->sheets[0]['cells'][$i][16];
	/*insertData("tbl_Guia","
		
int_Guia,
var_NombreRemit,
var_DireccionRemit,
var_CiudadRemit,
var_EstadoRemit,
var_PaisRemit,
int_CodZipRemit,
var_TelefonoRemit,
var_EmailRemit,
var_NombreDest,
var_DireccionDest,
var_CiudadDest,
var_EstadoDest,
var_PaisDest,
int_CodZipDest,
var_TelefonoDest,
var_EmailDest,
date_FechaEnvio,
date_FechaRecibido,
var_TipoPago,
var_TipoMedidaPeso,
decimal_PesoManual,
decimal_DimAltoManual,
decimal_DimAnchoManual,
decimal_DimLargoManual,
var_TipoMedidaDim,
decimal_PesoBascula,
decimal_PesoCobrado,
int_ValorDeclarado,
int_ValorDeclaradoManual,
int_ValorSeguro,
int_IdDest,
int_CargosEmpresa,
int_CargosAgente,
int_Descuentos,
int_TotalPagar,
var_DescripcionContenido,
var_Agente,
var_SubAgente,
int_Activo,
var_conceptoEmp,
var_conceptoAge,
int_ValorSeguroManual,
int_factura,
int_gananciaEmpresa,
int_gananciaAgente,
int_NConsolidado,
int_NEmpaque,
int_IDuser,
int_ciudadDestinatario,
Int_ciudadRemitente,
int_Servicio,
int_CCAgente,
int_CCEmpresa,
int_TarEmpresa,
int_TarAgente,
int_SegEmpresa,
int_SegAgente,
int_ImpEmpresa,
int_ImpAgente,
int_Compartida,
int_Tracking"
				,
"
00000,
'$var6',
'$var7',
'$var8',
'$var9',
'USA',
'$var10',
'$var11',
'',
'$var12',
'$var13',
'$var14',
'No ingresado',
'COLOMBIA',
'0',
'$var15',
'no ingresado',
'now()',
'',
'No ingresado',
'no ingresado',
0,
0,
0,
0,
'no ingresado',
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
'no ingresado',
(SELECT 
    int_ID
FROM
    tbl_Agentes
WHERE
    SUBSTRING('$var1',4,4) = int_CodExportacion ),
'0',
1,
'no ingresado',
'no ingresado',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'$var1'");*/
	$numero++;
	echo("</tr>");
	
}
echo("</table>");

?>