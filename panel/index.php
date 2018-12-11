<?php session_start(); ?>

<html>
<head>
	<title>Notificaciones</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_panel.php'); ?>

</head>
<body>
<?php require('../menu.php'); ?>

  <table width="40%">

      <tr>
        <td>
            <div class="logohd"><br>
            <img src="../../images/ecp_hd.png" />
                <p class="welcome">

                	<p><script>var d=new Date(); document.write(d.toUTCString());</script></p><br>
                    <?php //$date_Servidor = date("m-d-Y | H:m") ?>
                    &raquo; <strong>Bienvenid@ <?php echo $vrcNombre; ?></strong>
										<br>&raquo; Manual de usuario <br>
                    &raquo; Centro de ayuda
                </p>
            </div>
        </td>
      </tr>

  </table>

    <br>
    <h1> <div class="icon-attention"> Novedades </div> </h1>
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
           <?php $condition = "int_visible = 0 AND 1=1"; if($tp_user != 1){$condition = "int_visible = 0 AND 1=1 AND int_Agencias = ".$int_IDagente;} ?>
    <?php foreach($listInfo=sel($condition) as $listData): ?>
          <tr>
            <td><?php echo $listData[0] ?></td>
            <td><?php echo $listData[1] ?></td>
            <td><?php echo substr($listData[2],0,130)."..."; ?></td>
            <td><input type="button" class="info" value="Abrir" onClick="abre_upd(<?php echo $listData["0"]?>)" /></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
    <script >
    <?php $condition = "int_visible = 0 AND 1=1"; if($tp_user != 1){$condition = "int_visible = 0 AND 1=1 AND int_Agencias = ".$int_IDagente;} ?>
    <?php foreach($listInfo=sel($condition) as $listData): ?>
   
        $().toastmessage('showToast', {
            text     : '<?php echo $listData[1]; ?>',
            sticky   : true,
            type     : '<?php echo $listData[5]; ?>'
        },1,<?php echo $listData[0]; ?>);
    
    <?php endforeach; ?>
    </script>
	<script languaje="javascript">nav();</script>
	<script languaje="javascript">dataViewEsp();</script>
    <script>var d=new Date();document.getElementById("date_local").innerHTML = d.toDateString();</script>

    <!--<script language="javascript">
        $().toastmessage('showToast', { text: '10 paquetes retenidos', sticky: true, type: 'warning' });
        $().toastmessage('showToast', { text: '536 paquetes entregados', sticky: true, type: 'success' });
        $().toastmessage('showToast', { text: '1000 casilleros entregados', sticky: true, type: 'success' });
        $().toastmessage('showToast', { text: '100 vuelos en trayecto', sticky: true, type: 'notice' });
        $().toastmessage('showToast', { text: '5 paquetes extraviados', sticky: true, type: 'warning' });
        $().toastmessage('showToast', { text: '1 bodega inundada', sticky: true, type: 'error' });
    </script>-->


</body>
</html>
