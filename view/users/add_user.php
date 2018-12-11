<html>
<head>
    <title>Agregar_Usuario</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_user.php'); ?>


<link rel="stylesheet" type="text/css" href="dragcss.css">
 

</head>
<body>
<?php require('../menu.php'); ?>
    <h1>Usuarios / Agregar Usuario /</h1>
    <form name='formInsert' id="formInsert" method='post' onSubmit="return exe_add();" action="index.php">
    <table width="40%">
        
        
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                
                <td colspan="2">
                    
                    <input type="hidden" name="act" id="act" value="add">
                </td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td >
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' onchange="verif(this.value,0);" required value='' />
                </td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td colspan="2">
                    <input name='txtCampo2' type='password' id='txtCampo2' placeholder="Contraseña" size='50' value='contraseña' required  />
                </td>
                <td colspan="2">
                    <input name='txtCampo23' type='password' id='txtCampo23' placeholder="Escriba de nuevo la Contraseña" size='50' required  />
                </td>
            </tr>

            <tr>
                <td>Nombre Completo</td>
                <td colspan="2">
                    <input name='txtCampo3' type='text' id='txtCampo3' size='50' required value='' />
                </td>
            </tr>
            <tr>
                <td>Tipo de Usuario</td>
                <td colspan="2">
                <select style='width:137px;' name='txtCampo24' id='txtCampo24'>
                    <option value="1">Administrativo</option>
                    <option value="2">Agente</option>
                    <option value="3">Transportador</option>
                    
                </select>
                </td>
            </tr>

            <tr>
                <td>Empresa</td>
                <td colspan="2">
                    <select name='txtCampo25' id='txtCampo25' style="width:240px">
                      <?php foreach($listInfo2=sel2("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr id="trAgente">
                <td>Asociar Agente</td>
                <td colspan="2">
                    <select name='txtCampoExt4' id='txtCampoExt4' style="width:240px">
                      <?php foreach($listInfo2=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
             <tr>
                <td colspan="3" align="center">
                    <br>
                    <input type="submit" value="Agregar"  />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
             </table>

<div id="columns" style="display: inline-block;">
<table >
<tr><td><div draggable="true" class="column"><header>Crear Usuario</header>
<div class="count" data-col-moves="txtCampo6"></div></div></td></tr>
  <tr><td><div class="column" draggable="true"><header>Consultar Todas Las facturas</header>
  <div class="count" data-col-moves="txtCampoExt1"></div></div></td></tr>
  <tr><td><div class="column" draggable="true"><header>Crear Agentes</header>
  <div class="count" data-col-moves="txtCampo8"></div></div></td></tr>
  <tr><td><div class="column" draggable="true"><header>Estados De carga</header>
  <div class="count" data-col-moves="txtCampo22"></div></div></td></tr>
  <tr><td><div class="column" draggable="true"><header> Consolidados & GrpCon</header>
  <div class="count" data-col-moves="txtCampoExt2"></div></div></td></tr>
 <tr><td><div class="column" draggable="true"><header> Tranporte</header>
  <div class="count" data-col-moves="txtCampo13"></div></div></td></tr>

   <tr><td><div class="column" draggable="true"><header>Crear Facturas</header>
  <div class="count" data-col-moves="txtCampoExt3"></div></div></td></tr>

   <tr><td><div class="column" draggable="true"><header>Instalacion</header>
  <div class="count" data-col-moves="txtCampo4"></div></div></td></tr>
  
     <tr><td><div class="column" draggable="true"><header>Consultar Liquidaciones</header>
  <div class="count" data-col-moves="txtCampo5"></div></div></td></tr>
  </table>
</div>
<div id="columns" style="display: inline-block;">
<table  ><tr><td>
<div style="height:330px; background: #D3D3D3; color:000;
margin-left: 90px;" class="column" id="soltar"draggable="false"><header style="background: #D3D3D3;" id="cabecera">Accion</header>
  <div class="count" data-col-moves=""  >Arrastre Aquí los Items que desea agregar </div>

  </div></td></tr>


  </table>
</div>

 
    
    </form>
        <script languaje="javascript">nav();</script>
     <script languaje="javascript">dataView();</script>
    
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
    <script language="javascript"  src="dragjs.js"></script>

</body>
</html>