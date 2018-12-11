  var TotalPeso;
  var array = [];
  var numero;
  var idGru;
  var nombresRepetidos = [];
  var IdCambios  = [];
  var listRep = [];
   $(document).ready(function() {
      $('#LB').keyup(function(event) {
         var valor = $(this).val();
         $('#KG').val((valor*0.453592).toFixed(2));
      });

           
       $('#KG').keyup(function(event) {
         var valor = $(this).val();
         $('#LB').val((valor/0.453592).toFixed(2));
      });






      $("input[type='text']").attr('disabled','disabled');
        $(".visi").css('visibility','hidden');

      $(".ed").change(function(event) {
         var id = $(this).attr('id');
         id = id.substring(0,2);
         var a = [];
         for(var s = 0 ; s<6;s++){
          if (s == 0) {
             a.push($('#'+id+s).text());
          }else{
           a.push($('#'+id+s).val());
           }
           if (s==5) {
             var f = verificar(a[0]);
             if (f == -1) {
                array.push(a);
                autosuma();
             }else{
                 for(var s = 0 ; s<6;s++){
                   array[f][s]=a[s]
                   autosuma();
                 }
             }
            
            
           }
         }
      });
    });
  function imprimir(val){
    var lb = $('#LB').val();
    var kg = $('#KG').val();
    $.post('ctrl_group.php', {atc: 'upd_imp',LB:lb,KG:kg,id:val}, function(data, textStatus, xhr) {
       window.print();
    });
   
  }
  function change2(i){

         var valor = $('#e'+i+'5').val();
         $('#e'+i+'6').val((valor*0.453592).toFixed(2));
      
  }
  function change3(i){
       var valor = $('#e'+i+'6').val();
         $('#e'+i+'5').val((valor/0.453592).toFixed(2));
         autosuma();
  }
  function change(){
      $("input[type='text']").removeAttr('disabled');
      $("#ocultar").css('visibility','hidden');
      $(".visi").css('visibility','visible');
      $("#PV").text(TotalPeso);
      jQuery.getJSON('ctrl_group.php', {atc: 'listX',id:idGru}, function(json, textStatus) {
         json.forEach( function(element, index) {
            for(var a = 0; a<numero;a++){
              if ($('#e'+a+'0').text()==element[0]) {
                  $('#e'+a+'1').val(element[1]);
                  $('#e'+a+'2').val(element[2]);
                  $('#e'+a+'3').val(element[5]);
                  $('#e'+a+'4').val(element[3]);
                  $('#e'+a+'5').val(element[4]);
              }
            }
         });
         autosuma();
      });
      
  }

  function imprimirHijas(id){
    window.open('fac_con.php?id_group='+id,'_self');
  }

  function verificar (id){
    var a = -1;
    array.forEach( function(element, index) { 
      if(id == element[0]){
        a = index;
        return false;
      }
    });
    return a ;
  }
  function autosuma(){
    numero
    var suma = 0;
    for(var s = 0 ; s<numero;s++){
        var item = parseFloat($('#e'+s+'5').val());
        suma+=item;
    } 
    $('#LB').val(suma);
    $('#KG').val((suma*0.453592).toFixed(2));
  }
  function guardar(){
    var send =  JSON.stringify(array);
    jQuery.getJSON('ctrl_group.php', {atc: 'add_X',data:send}, function(json, textStatus) {
       alert(json);
    });
    
  }
  function sel_rep(){
    var bandera = 0;
    IdCambios = [];
    nombresRepetidos = [];
    for (var i = 0 ; i < numero ; i++) {
        nombresRepetidos.forEach( function(element, index) {
          nombre = $('#e'+i+'1').val();
          nombre = nombre.toUpperCase();
          dir = $('#e'+i+'2').val();
          dir = dir.toUpperCase();
          if( $.trim(nombre) == $.trim(element[0]) && $.trim(dir) == $.trim(element[1]) ){
              listRep.push([$.trim(nombre)]);
              IdCambios.push([['#e'+i+'1'],['#e'+i+'2']]);
              $('#e'+i+'1').css('backgroundColor', '#FFCE44');
              $('#e'+i+'2').css('backgroundColor', '#FFCE44');
              bandera = 1;
          }
        });
        if (bandera == 0) {
          nombresRepetidos.push([[$('#e'+i+'1').val().toUpperCase()],[ $('#e'+i+'2').val().toUpperCase()]]);
        }
           
     }
  }

  function changeX () {
    $.post('ctrl_group.php', {atc: 'changeX',array:listRep}, function(data, textStatus, xhr) {
         var resp =  $.parseJSON(data);
         IdCambios.forEach( function(element, index) {
            $(""+element[0]).val(resp[index][0]);
            $(""+element[1]).val(resp[index][1]);
         });
     }); 
  }

  function busquedaNombre(Nombre,Direccion){

  }