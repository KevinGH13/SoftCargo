<?php session_start(oid); ob_start();?>

<?php require('modelo.php');  ?>
<?php 
	if (isset($_SESSION['id'])) {
		echo '<script language="javascript">window.location="view/panel"</script>;';
	}else { session_destroy();}
?>
<?php
	$vrcMensaje = "";
	if(isset($_REQUEST['txtUsuario'])){
		session_start();
		$vrcUsuario = $_REQUEST['txtUsuario']	;
		$vrcPassword = $_REQUEST['txtPassword'];
		$vrcMensaje = "Usuario o contraseña incorrectas";
		$vrcCondition = "var_Usuario = '".$vrcUsuario."' AND var_Contrasena = '".$vrcPassword."'";

		foreach($listInfo=sel($vrcCondition) as $listData):
    		if ($vrcUsuario == $listData[0] && $vrcPassword == $listData[1]){

				$vrcMensaje = "";
				$_SESSION['id']=$listData[2];
				$_SESSION['int_tp']=$listData[3];
				//echo "<script>window.open('view/panel/','_self')</script>";
				//header("Location: http://easycargopro.com/ECP/view/panel/index.php");
			  echo '<script language="javascript">window.location="view/panel"</script>;';
			  
				//die();
			}
   		endforeach;
	}
?>

<?php
	//LISTAR DATOS
	function sel($conditions){
		$listInfo =listData(
			"var_Usuario, var_Contrasena, int_ID,int_tipo",
			"tbl_Usuarios",
			"WHERE ".$conditions,
			"");
		return $listInfo;
	}
?>
