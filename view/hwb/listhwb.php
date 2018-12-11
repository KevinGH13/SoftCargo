<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Crear HWB</title>
	<link rel="stylesheet" type="text/css" href="styleawb.css" >
	<?php require('../../librerias.php'); ?>
   	<?php require('ctrl_awb.php'); $contru;?>
	<link rel="stylesheet" type="text/css" href="print.css" media="print">
 
</head >
<body style="position: relative;">
<?php require('../menu.php'); ?>
<?php foreach($listInfo=seluser("1=1 AND int_ID=".$int_ID) as $listSu): $contru=$listSu[1];  endforeach; ?>
<form name='formInsert' id="formInsert" method='post' onSubmit="return add_awb();">

<div style="z-index:1; position:absolute;margin-top: 16px; margin-left: 41px;">
   
    <input id="txtCamp1" name="txtCamp1" type="text" placeholder="Numero de la HWB"style="margin-left: 80px;width: 150px;">
    <input id="txtCamppref" name="txtCamppref" type="text" placeholder="Prefijo Aeropuerto"style="margin-left: 80px;width: 150px;">
</div>
<input  type="submit" value="Guardar" id="column-left"  />
<table  id="table1"     style="    height: 202px;">
            <tr>
                
                <td colspan="2">
                <input id="txtCamp2" name="txtCamp2" type="text" placeholder="Shipper's Name"style="margin-left:  0px;width: 250px;"></td></tr>
                   <tr><td> <input id="txtCamp3" name="txtCamp3" type="text" style="margin-left:  0px;width: 250px;"></td></tr>
                    <tr><td><input id="txtCamp4" name="txtCamp4" type="text" style="margin-left:  0px;width: 250px;"></td>
                    <tr><td><input id="txtCamp53" name="txtCamp53" type="text" style="margin-left:  0px;width: 250px;"></td>

                </td>
                
            </tr>
            <tr>
	<td><input id="txtCamp5" name="txtCamp5" type="text" placeholder="Consignee's Name"style="width: 250px;"></td></tr>
    <tr><td><input id="txtCamp6" name="txtCamp6" type="text"placeholder="Consignee's Camp1" style="margin-left:  0px;width: 250px;"></td></tr>
    <tr><td><input id="txtCamp7" name="txtCamp7" type="text" placeholder="Consignee's Camp2"style="margin-left:  0px;width: 125px;"> 
                  <input id="txtCamp8" name="txtCamp8" type="text" placeholder="Consignee's Camp3"style="margin-left:  0px;width: 125px;">  </td></tr>
                

</table>
<div style="   margin-left:59px; margin-top:266px; z-index:1; position:absolute; opacity: 0.5;">
     <table>
                
                <tr><td><input id="txtCampp1" name="txtCampp1" type="text" style="margin-left:  0px;width: 250px;"></td></tr>
                <tr><td><input id="txtCampp2" name="txtCampp2" type="text" style="margin-left:  0px;width: 250px;"></td></tr>
                <tr><td><input id="txtCampp3" name="txtCampp3" type="text" style="margin-left:  0px;width: 250px;"></td></tr>
                  
                  </table>
</div>
<table width="30%" id="table2" >
            <tr>
                
                <td colspan="2">
                    <input  type="text" id="txtCamp10" name="txtCamp10"  style="height: 22px;width: 170px; " >
                 <input  type="text" id="txtCamp11" name="txtCamp11"  style="height: 22px; width: 170px;"></td>
                 
                
            </tr>
            <tr>
                
                <td colspan="2" >
                <input  type="text "id="txtCamp12" name="txtCamp12" style=" width: 360px; height: 22px;"/>
                </td>
               
            </tr>
            <tr>
                
                <td colspan="2">
                <input type="text"id="txtCampto" name="txtCampto"  style=" width: 28px; height: 22px;"/>
                <input type="text"id="txtCamp13" name="txtCamp13"  style=" width: 199px; height: 22px;"/>
                <input type="text"id="txtCamp14" name="txtCamp14"  style=" width: 37px; height: 22px;"/>
                <input type="text"id="txtCamp15" name="txtCamp15"  style=" width: 29px; height: 22px;"/>
                <input type="text"id="txtCamp16" name="txtCamp16"  style=" width: 37px; height: 22px;"/>
                <input type="text"id="txtCamp17" name="txtCamp17"  style=" width: 29px; height: 22px;"/></td>
            </tr>
            <tr>
                
                <td colspan="2">
                <input  type="text"id="txtCamp18" name="txtCamp18"  style=" width: 189px; height: 22px;"/>
                <input  type="text"id="txtCamp19" name="txtCamp19" style=" width: 92px; height: 22px;"/>
                <input  type="text"id="txtCamp20" name="txtCamp20" style=" width: 89px; height: 22px;"/>
              
              </td>
            </tr>
</table>

<div style="   margin-left:538px; margin-top:50px; z-index:1; position:absolute;">
     <table>
                
                <tr><td><input id="txtCamp21" name="txtCamp21" type="text" style="margin-left:  0px;width: 250px;"></td></tr>
                <tr><td><input id="txtCamp22" name="txtCamp22" type="text" style="margin-left:  0px;width: 250px;"></td></tr>
                <tr><td><input id="txtCamp23" name="txtCamp23" type="text" style="margin-left:  0px;width: 250px;"></td></tr>
                  
                  </table>
</div>

<table id="table4">
    <tr>
        <td><textarea id="txtCamp24" name="txtCamp24"   rows="5" cols="45" style="height: 78px; "></textarea></td>
    </tr>

    <tr>
        <td>
        <input  id="txtCamp25" name="txtCamp25" type="text" style="width: 141px;"/>
        <input  id="txtCamp26" name="txtCamp26" type="text" style="width: 123px;"/>
        <input  id="txtCamp27" name="txtCamp27" type="text" style="width: 121px;"/></td>
    </tr>
    <tr>
    <td>
    <input id="txtCamp28" name="txtCamp28" type="text" style="width: 30px;"/>
    <input id="txtCamp29" name="txtCamp29" type="text" style="width: 15px;"/>
    <input type="checkbox" name="txtCamp30" id="txtCamp30"  style="width: 13px;">
    <input type="checkbox" name="txtCamp31" id="txtCamp31"  style="width: 14px;">
    <input type="checkbox" name="txtCamp32" id="txtCamp32"  style="width: 15px;">
    <input type="checkbox" name="txtCamp33" id="txtCamp33"  style="width: 15px;">

    <input id="txtCamp34" name="txtCamp34" type="text" style="width: 121px;"/>
    <input id="txtCamp35" name="txtCamp35" type="text" style="width: 121px;"/>
        </td>
    </tr>
    <tr>
        <td><input id="txtCamp36" name="txtCamp36" type="text" style="width: 121px;"/></td>
    </tr>
</table>
      <div style="margin-left:59px; margin-top:487px;  z-index:1; position:absolute;">
     
        <textarea id="txtCamp37" name="txtCamp37" rows="3" cols="60" style="height: 47px;"></textarea>
      </div>
<table id="tablepieces" style="color: black;">
<?php for ($i=0; $i <4 ; $i++):?>
    <tr>
        <td><input id="txtCamponP<?php echo $i; ?>" name="txtCamponP<?php echo $i; ?>" type="text" style="width: 32px;"/></td>
        <td><input id="txtCampoGross<?php echo $i; ?>" name="txtCampoGross<?php echo $i; ?>" type="text" style="width: 69px;"/>Kg</td>
        <td><input id="txtCampoParcticle<?php echo $i; ?>" name="txtCampoParcticle<?php echo $i; ?>" type="text" style="width: 67px; margin-left: 19px;"/></td>
        <td><input id="txtCampoPWeight<?php echo $i; ?>" name="txtCampoPWeight<?php echo $i; ?>" type="text" style="width: 62px; margin-left: 10px;"/></td>
        <td><input id="txtCampoPrate<?php echo $i; ?>" name="txtCampoPrate<?php echo $i; ?>" type="text" style="width: 74px; margin-left: 20px;"/></td>
        <td><input id="txtCampoPtotal<?php echo $i; ?>" name="txtCampoPtotal<?php echo $i; ?>" type="text" style="width: 116px; margin-left: 20px;"/></td>
        <td><textarea id="txtCampoPContent<?php echo $i; ?>" name="txtCampoPContent<?php echo $i; ?>" rows="2" cols="30" style="margin-left: 20px; margin-top: 0px;     width: 217px; height: 26px;"></textarea></td>
    </tr>
<?php endfor; ?>
   

</table>

<div style=" margin-left:46px; margin-top:809px; z-index:1; position:absolute; height: 178px;">
   
</div>
<table id="tablcobr">
    <tr>
        <td><input id="txtCamp38" name="txtCamp38" type="text" style="width: 142px;"/></td>
        <td><input id="txtCamp39" name="txtCamp39" type="text" style="width: 142px;"/></td>
    </tr>
    <tr>
        <td><input id="txtCamp40" name="txtCamp40" type="text" style="width: 142px;"/></td>
        <td><input id="txtCamp41" name="txtCamp41" type="text" style="width: 142px;"/></td>
    </tr>
    <tr>
        <td><input id="txtCamp42" name="txtCamp42" type="text" style="width: 142px;"/></td>
        <td><input id="txtCamp43" name="txtCamp43" type="text" style="width: 142px;"/></td>
    </tr>
    <tr>
        <td><input id="txtCamp44" name="txtCamp44" type="text" style="width: 142px;"/></td>
        <td><input id="txtCamp45" name="txtCamp45" type="text" style="width: 142px;"/></td>
    
    </tr>
    <tr>
        <td><input id="txtCamp46" name="txtCamp46" type="text" style="width: 142px;"/></td>
        <td><input id="txtCamp47" name="txtCamp47" type="text" style="width: 142px;"/></td>
    </tr>
    

</table>
<table id="tablcobrtotl">

    <tr>
        <td><input id="txtCamp48" name="txtCamp48" type="text" style="width: 142px;" hidden/></td>
        <td><input id="txtCamp49" name="txtCamp49" type="text" style="width: 142px;"/></td>
    </tr>
<div style="margin-left:359px; margin-top:851px; z-index:1;position:absolute;height: 74px;">
    <textarea id="txtCamp50" name="txtCamp50" cols="60" rows="5" style="height: 80px;"></textarea>
</div>
<div style="margin-left:359px; margin-top:970px; z-index:1;position:absolute;height: 74px;">
    <textarea id="txtCampsig" name="txtCampsig" cols="10" rows="5" style="height: 64px;"></textarea>
</div>
<div style="margin-left:359px; margin-top:1055px; z-index:1; position:absolute;">
    <input id="txtCamp51" name="txtCamp51" type="text" style="width: 188px;" placeholder="Fecha de creacion">
     <textarea  id="txtCamp52" name="txtCamp52" cols="30" rows="3" style=" margin-left: 50px;" hidden></textarea>
     <input type="text" name="txtemp" id="txtemp" value="<?php echo $contru ?>" hidden style="position: absolute;"/>
<input type="text" name="act" id="act" value="add" hidden style="position: absolute;"/>

</div>
<div style="margin-left:40px; margin-top:1065px; z-index:1; position:absolute;">
    <input type="text" id="txtTotalp" name="txtTotalp" style="width: 142px;" />
    <input type="text" id="txtTotalc" name="txtTotalc" style="width: 142px; margin-left: 15px;" />
</div>
</table>
</form>
	<img src="awbf.jpg" />

    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>