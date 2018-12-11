<html>
<head>
	<title>Agregar_Ciudad</title>
	<?php require('../../librerias.php'); ?>
     <?php require('ctrl_city.php'); ?>
</head>
<body>

	<h1>Ciudades / Agregar Ciudad /</h1>
	<form name='formInsert' id="formInsert" method='post' onSubmit="return exe_add()" >
	<table width="40%">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                  <input type="hidden" name="act" id="act" value="all">                
                </td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                </td>
            </tr>
                <td>Estado</td>
                <td colspan="2">
                    <input name='txtCampo2' type='text' id='txtCampo2' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                <select name="txtCampo3" style="width: 137px;" id="txtCampo3">
                                    <option value="1">COLOMBIA</option>
                                    <option value="2">ECUADOR</option>
                                    <option value="3">MEXICO</option>
                                    <option value="4">USA</option>
                                    <option value="5">VENEZUELA</option>
                                    <option value="6">NICARAGUA</option>
                                    <option value="7">EL SALVADOR</option>
                                    <option value="8">GUATEMALA</option>
                                    <option value="9">ARGENTINA</option>
                                    <option value="12">PERU</option>
                                    
                </select>
                </td>
            </tr>
            <tr>
                <td>Zona</td>
                <td colspan="2">
                    <input name='txtCampo4' type='text' id='txtCampo4' size='50' required />
                </td>
            </tr>
            <tr>
                <td>IATA</td>
                <td colspan="2">
                    <input name='txtCampo5' type='text' id='txtCampo5' size='50' required />
                </td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="submit" value="Agregar" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
	</table>
    </form>

    <script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>