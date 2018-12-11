<?php
session_start();
$int_ID= $_SESSION['id'];
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


