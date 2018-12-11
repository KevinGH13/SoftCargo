<?php session_start(); ?>

<?php


//Inculimos librerias

	require("cnnbd.php");

	

//****************************************

//****INICIO FUNCIÓN PARA LISTAR DATOS****

//****************************************
	
function listData($fields, $table, $conditions=null, $ordering=null){



	//Abrimos la conexión

		$link=Conectarse();



	//Preparo la consulta para listar datos

		$resultList = mysqli_query

			($link,

				"SELECT ". $fields

				." FROM ". $table

				." ". $conditions

				." " . $ordering

			);



			$mysql = "SELECT ". $fields

				." FROM ". $table

				." ". $conditions

				." " . $ordering;

		//echo $mysql;



	//Ejecuto la consulta

		$listItems = array();

		while($rowList = mysqli_fetch_array($resultList)){

			$listItems[] = $rowList;

		}



	//Cerramos la conexión

		mysqli_close($link);



		return $listItems;

}

//****FIN FUNCIÓN PARA LISTAR DATOS****

//*************************************

?>



<?php



//******************************************

//****INICIO FUNCIÓN PARA INSERTAR DATOS****

//******************************************

function insertData($table, $fields, $values){



	//Abrimos la conexión

		$link=Conectarse();



	//Preparo la consulta para insertar datos

		$resultInsert = mysqli_query

			($link,

				"INSERT INTO ". $table

				."(". $fields

				.") VALUES(". $values

				.")"

			);

		Log_Reg($table,$fields,'', $values,'Crear');

		$mysql = "INSERT INTO ". $table

				."(". $fields

				.") VALUES(". $values

				.")";

		//echo $mysql;



	//Cerramos la conexión

		mysqli_close($link);

}

//****FIN FUNCIÓN PARA INSERTAR DATOS****

//***************************************

?>



<?php



//********************************************

//****INICIO FUNCIÓN PARA ACTUALIZAR DATOS****

//********************************************

function updateData($table, $fields, $conditions){



	//Abrimos la conexión

		$link=Conectarse();



	//Preparo la consulta para actualizar datos

		$resultUpdate = mysqli_query

			($link,

				"UPDATE ". $table

				." SET ". $fields

				." WHERE int_ID = ". $conditions

			);

		Log_Reg($table, $fields, $conditions , '' ,'Actualizar');

		$mysql = "UPDATE ". $table

				." SET ". $fields

				." WHERE int_ID = ". $conditions;

		//echo $mysql;



	//Cerramos la conexión

		mysqli_close($link);

}

//****FIN FUNCIÓN PARA ACTUALIZAR DATOS*****

//******************************************

?>



<?php



//********************************************

//****INICIO FUNCIÓN PARA DESACTIVAR DATOS****

//********************************************

function deleteData($table, $conditions){



	//Abrimos la conexión

		$link=Conectarse();



	//Desactivo datos

		$resultDelete = mysqli_query

			($link,

				"UPDATE ". $table

				." SET int_Activo = 0"

				." WHERE int_ID = ". $conditions

			);


			Log_Reg($table, '', $conditions , '','Eliminar');

	//Cerramos la conexión

		mysqli_close($link);

}

//****FIN FUNCIÓN PARA DESACTIVAR DATOS*****

//******************************************

?>



<?php



function execute_query($valu){

	$link = Conectarse();

	$resultQuery = mysqli_query

		($link,$valu);

	mysql_close($link);

}



?>



<?php



//******************************************************

//****INICIO FUNCIÓN PARA ACTUALIZAR DATOS CON VALOR****

//******************************************************

function updateDataValue($table, $fields, $conditions,$value){



	//Abrimos la conexión

		$link=Conectarse();



	//Preparo la consulta para actualizar datos

		$resultUpdate = mysqli_query

			($link,

				"UPDATE ". $table

				." SET ". $fields

				." WHERE $value = ". $conditions

			);

		Log_Reg($table, $fields, $conditions , $value,'Actualizar');

		$mysql = "UPDATE ". $table

				." SET ". $fields

				." WHERE $value = ". $conditions;

		//echo $mysql;



	//Cerramos la conexión

		mysqli_close($link);

}

//****FIN FUNCIÓN PARA ACTUALIZAR DATOS CON VALOR*****

//****************************************************

?>

<?php



//********************************************

//****INICIO FUNCIÓN PARA DESACTIVAR DATOS****

//********************************************

function deleteDataV($table, $conditions,$value){



	//Abrimos la conexión

		$link=Conectarse();



	//Desactivo datos

		$resultDelete = mysqli_query

			($link,

				"UPDATE ". $table

				." SET int_Activo = 0"

				." WHERE $value = ". $conditions

			);

		Log_Reg($table, '', $conditions , $value,'Eliminar');


	//Cerramos la conexión

		mysqli_close($link);

}

//****FIN FUNCIÓN PARA DESACTIVAR DATOS*****

//******************************************
function Log_Reg($table,$fields,$conditions,$value,$accion){
	 session_start();

$int_ID = $_SESSION['id'];
	$link=Conectarse();
	$resultInsert = mysqli_query

			($link,

				"INSERT INTO ". "tbl_Log"

				."(". "int_user,var_accion,var_fecha,var_tablaAfe"

				.") VALUES("."'$int_ID','$accion',now(),'$table'"

				.")"

			);
	mysqli_close($link);
	}
?>

<?php 
function ObtenerIP()
{
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown"))
$ip = getenv("HTTP_CLIENT_IP");
else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
$ip = getenv("REMOTE_ADDR");
else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
$ip = $_SERVER['REMOTE_ADDR'];
else
$ip = "IP desconocida";
return($ip);
}
//echo ObtenerIP();
 ?>
