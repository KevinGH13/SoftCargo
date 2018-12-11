<html>
<head>
	<title>Actualizar_Novedad</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_panel.php'); ?>
</head>
<body>
	<h1>Novedades / Visualizar Novedad /</h1>
	<form name='formUpdate' id="formUpdate" method='post' action="#" >
	<table width="40%">
    	<?php $intID=$_GET['id']; ?>
		<?php foreach($listInfo=sel("int_ID=".$intID) as $listData): ?>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td>Título</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required value='<?php echo $listData[1]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Novedad</td>
                <td colspan="2">
                    <textarea name='txtCampo2' id='txtCampo2' ><?php echo $listData[2]; ?></textarea>
                </td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="right">
                    <input type="button" value="Regresar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
        <?php endforeach; ?>
	</table>
    </form>
    <script language="javascript">function upd_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>