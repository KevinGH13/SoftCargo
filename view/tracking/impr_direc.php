
<html>
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Impre</title>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<script type="text/javascript" src="js/dependencies/rsvp-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/dependencies/sha-256.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="js/qz-tray.js"></script>
	<script> var dato = "<?php echo $_REQUEST['date'] ?>"</script>
    <script>
    var datos;   
    $(function() {
        $.getJSON('ctrl_tracking.php', {dato: dato,act:"impre"}, function(json, textStatus) {
            datos = json;
            imprimir();
        });
    });

    function imprimir(){
        qz.websocket.connect().then(function() { 
            return qz.printers.find("ZDesigner")               // Pass the printer name into the next Promise
        }).then(function(printer) {
         
          
        var config = qz.configs.create(printer,{ 
        colorType: 'blackwhite', units:'in',size: {width: 4, height: 3}, orientation: 'landscape',scaleContent:true});       // Create a default config for the found printer
        
        var peso = datos[0].decimal_PesoCobrado;
        var pesoLB = (peso/2.20462).toFixed(2);
        var iata = datos[0].var_IATA;
        if (iata == null) {iata=datos[0].var_Ciudad}
        var data = [{ type: 'html', format: 'plain', data: '<html width="100%">'+
        ''+
        '<table style="width:100%;" width="100%">'+
            '<tr><td><b><h1>Remitente :</h1></b></td></tr>'+
            '<tr><td><b>'+datos[0].var_NombreRemit+'</b></td></tr>'+
            '<tr><td><b>Telefono : '+datos[0].var_TelefonoRemit+'</b></td></tr>'+
            '<tr><td><b><h1>Destinatario :</h1></b></td></tr>'+
            '<tr><td><b>'+datos[0].var_NombreDest+'</b></td></tr>'+
            '<tr><td><b>Telefono : '+datos[0].var_TelefonoDest+'</b></td></tr>'+
            '<tr><td><b>'+datos[0].var_Ciudad+'- '+datos[0].var_Estado+' - '+datos[0].var_Pais+'</b></td></tr>'+
            '<tr><td><b>CONTENIDO: '+datos[0].var_DescripcionContenido+'</b></td></tr>'+
            '<tr><td><center><b><h1>'+iata+'</h1></b></center></td></tr>'+
            '<tr><td><b>'+peso+'Kg</b></td></tr>'+
            '<tr><td><b>'+pesoLB+'LB</b></td><td><b>06/05/2016</b></td></tr>'+
            '<tr ><td colspan="2"></td></tr>'+
        '</table><center><img src="http://barcode.tec-it.com/barcode.ashx?data='+dato+'&code=Code128&unit=Fit&dpi=96"/></center></html>'}];
            terminar();
            return qz.print(config, data);

              
      

        }).catch(function(e) { alert("NO impresora") });
    }
	
function terminar() {
    window.close();
}

function convertFileToDataURLviaFileReader(url, callback){
    var xhr = new XMLHttpRequest();
    xhr.responseType = 'blob';
    xhr.onload = function() {
        var reader  = new FileReader();
        reader.onloadend = function () {
            callback(reader.result);
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.send();
}


	</script>
</head>
<body>
    
</body>
</html>