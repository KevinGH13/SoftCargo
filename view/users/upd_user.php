<html>
<head>
	<title>Actualizar_Usuario</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_user.php'); ?>
</head>
       
<body >
<?php require('../menu.php'); ?>
	<h1>Usuarios / Actualizar Usuario /</h1>
	<form name='formUpdate' id="formUpdate" method='post' onSubmit="return exe_upd()" >
	<table width="40%">
 <?php $intID=$_GET['id']; ?>
        <?php foreach($listInfo=sel("int_ID=".$intID) as $listData): ?>
             
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="">
                    <input class="ID" name='id' type='text' id='id' size='50' hidden readonly value='<?php echo $listData[0]; ?>' />
                    <input type="hidden" name="act" id="act" value="upd">
 
                </td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td colspan="">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' onchange="verif(this.value,'1');" required value='<?php echo $listData[1];?>' />
                     <input type="hidden" name="txtnombre" id="txtnombre" value='<?php echo $listData[1];?>'>
                </td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td colspan="">
                    <input name='txtCampo2' type='password' id='txtCampo2' size='50' required value='<?php echo $listData[22];?>' />
                </td>
                <td colspan="2">
                    <input name='txtCampo23' type='password' id='txtCampo23' placeholder="Escriba de nuevo la Contraseña" size='50'   />
                </td>
            </tr>
            <tr>
                <td>Nombre Completo</td>
                <td colspan="">
                    <input name='txtCampo3' type='text' id='txtCampo3' size='50' required value='<?php echo $listData[21]; ?>' />
                </td>
            </tr>
               
              
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<br>
                	<input type="submit" value="Actualizar" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
        <?php endforeach; ?>
	</table>
    </form>
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function  add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>