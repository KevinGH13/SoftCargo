<html>
<head>
	<title>Notificaciones</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_panel.php'); ?>
    
</head>
<body>
<?php require('../menu.php'); ?>
  
  <h1> <div class="icon-attention"> Notificaciones</div> </h1>
  
  <table id="listable" class="display" align="left" style="margin-left:20px;" width="74%">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($listInfo=sel("1=1") as $listData): ?>
      <tr>
        <td><?php echo $listData[0] ?></td>
        <td><?php echo $listData[1] ?></td>
        <td><?php echo substr($listData[2],0,130)."..."; ?></td>
        <td><input type="button" class="info" value="Abrir" onClick="abre_upd(<?php echo $listData["0"]?>)" /></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  
  <table width="40%">
  <tr>
  
    <td>
    	<div class="docs">
    		<h1 class="h1panel"><div class="icon-download">Descargas</div> </h1>
    	
            <a class="afile" onClick="javascript:window.open('archivos/ecp.pdf','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Manual_Carga_001_513.pdf</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.pdf','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Dcto_Valores_514.pdf</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.pdf','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Puntos_Afiliados_514.pdf</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.pdf','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Envios_Retenidos_513.pdf</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.pdf','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Ley_100_503.pdf</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.pdf','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Ley_100_506.pdf</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.pdf','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Ley_100_509.pdf</div>
            </a>
  		</div>
    </td>
    
    <td>
    	<div class="images">
            <h1 class="h1panel"><div class="icon-attention-circled">Información</div> </h1>
            
            <a class="afile" onClick="javascript:window.open('archivos/ecp.jpg','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Manual_Carga_001_513.jpg</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.jpg','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Dcto_Valores_514.jpg</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.jpg','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Puntos_Afiliados_514.jpg</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.jpg','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Envios_Retenidos_513.jpg</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.jpg','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Ley_100_503.jpg</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.jpg','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Ley_100_506.jpg</div>
            </a>
            <a class="afile" onClick="javascript:window.open('archivos/ecp.jpg','_blank');">
                <div class="icon-doc-text" style="margin: 0 0 2 16;">Ley_100_509.jpg</div>
            </a>
  		</div>
    </td>

	<td>
        <div class="logohd">
        <img src="../../images/ecp_hd.png" />
        <p class="welcome">
                &laquo; Bienvenid@ <?php echo $vrcNombre; ?> <br>
				&laquo; Fecha <?= date("d-m-Y | H:m") ?> <br>
                &laquo; Manual de usuario <br>
                &laquo; Centro de ayuda
        </p>
       	</div>
    </td>

  </tr>
</table>
    
	<script languaje="javascript">nav();</script>
	<script languaje="javascript">dataViewEsp();</script>
    
    <script language="javascript">
		$().toastmessage('showToast', {	text: '10 paquetes retenidos', sticky: true, type: 'warning' });
		$().toastmessage('showToast', {	text: '536 paquetes entregados', sticky: true, type: 'success' });
		$().toastmessage('showToast', {	text: '1000 casilleros entregados', sticky: true, type: 'success' });
		$().toastmessage('showToast', {	text: '100 vuelos en trayecto', sticky: true, type: 'notice' });
		$().toastmessage('showToast', {	text: '5 paquetes extraviados', sticky: true, type: 'warning' });
		$().toastmessage('showToast', {	text: '1 bodega inundada', sticky: true, type: 'error' });
    </script>
    <?php foreach($listInfo=sel("1=1") as $listData): ?>
    <script language="javascript">
		$().toastmessage('showToast', {
			text     : '<?php echo $listData[1]; ?>',
			sticky   : true,
			type     : 'notice'
		});
    </script>
    <?php endforeach; ?>
</body>
</html>