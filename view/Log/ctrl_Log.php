
<?php require('../../modelo.php'); ?>

<?php function sel($condition){

		$listInfo= listData(

			'int_ID,var_accion,var_tablaAfe,var_fecha,int_user',

			'tbl_Log',

			'Where int_user="'.$condition.'"','ORDER BY var_fecha Desc '

			);

		return $listInfo;

	} ?>