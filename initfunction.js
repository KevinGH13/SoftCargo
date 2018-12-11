//setInterval(function(){location.reload()},60000);

function dataView(){
	$(document).ready(function(){
		$('#listable').dataTable({
			"columnDefs": [{ "orderable": false, "targets": [ -1 ] }],
			ordering: true,
			"orderClasses": false,
			"autoWidth": true,
			"lengthChange": false,
			"lengthMenu": [ 40 ],
			 
       		 "ordering": false,
        	 "info":     false,
			"language": {
				"search": "",
				searchPlaceholder: "Digite el dato que desea buscar...",
				"info": "Pagina _PAGE_ de _PAGES_ - _MAX_ registros",
				"emptyTable": "No se encontraron datos",
				"infoEmpty": "No se encontraron datos",
				"infoFiltered": " - (Filtro aplicado)",
				"paginate": {"previous": "Anterior", "next": "Siguiente"}
			}
		});
	});
}

function dataView2(){
	$(document).ready(function(){
		$('#listable').dataTable({
			"columnDefs": [{ "orderable": false, "targets": [ -1 ] }],
			ordering: false,
			"orderClasses": false,
			"autoWidth": true,
			"lengthChange": false,
			"lengthMenu": [ 40 ],
			 
        "ordering": false,
        "info":     false,
			"language": {
				"search": "",
				searchPlaceholder: "Digite el dato que desea buscar...",
				"info": "Pagina _PAGE_ de _PAGES_ - _MAX_ registros",
				"emptyTable": "No se encontraron datos",
				"infoEmpty": "No se encontraron datos",
				"infoFiltered": " - (Filtro aplicado)",
				"paginate": {"previous": "Anterior", "next": "Siguiente"}
			}
		});
	});
}

function dataViewEsp(){
	$(document).ready(function(){
		$('#listable').dataTable({
			"columnDefs": [{ "orderable": false, "targets": [ -1 ] }],
			ordering: false,
			"searching": false,
			"orderClasses": false,
			"autoWidth": true,
			"lengthChange": false,
			"lengthMenu": [ 4 ],
			"language": {
				"search": "",
				searchPlaceholder: "Digite el valor que desea buscar...",
				"info": "",
				"emptyTable": "No se encontraron datos",
				"infoEmpty": "No se encontraron datos",
				"infoFiltered": " - (Filtro aplicado)",
				"paginate": {"previous": "Anterior", "next": "Siguiente"}
			}
		});
	});
}

function reloaded(varView,int_ID,locatt){
	if (locatt== "undefined" || locatt==null) {locatt='index';};
	varVentana = "../"+varView+"/"+locatt+".php";
	window.open(varVentana,"_self");
}

function nav(){
document.write("<script type='text/javascript' language='javascript' src='../../lib/navigation/js/code.js'></script>");
}

function cargar_An(estado){
	var ancho = $(document).width();
	var alto = $(document).height();
	 imgCentro = "<center><div ><img style='margin: auto;left: 0px;top: 0px;bottom: 0px; right: 0px;position: absolute;z-index:2;' src='/images/ECP_Anima.gif'></div></center>";
	if (estado) {
		var ancho = $(document).width();
	var alto = $(document).height();
	 div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);
     input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text";
 
          //asignamos el div que bloquea
        $("#WindowLoad").append(input);
 
          //asignamos el foco y ocultamos el input text
        $("#focusInput").focus();
        $("#focusInput").hide();
 
          //centramos el div del texto
        $("#WindowLoad").html(imgCentro);
	}else{
		$("#WindowLoad").remove();
	}
	
}
var opciones = {hour:'numeric',minute:'numeric'};
function change_date () {
	$('input[class="date"]').each(function(index, el) {
		var datechange = new Date($(this).val());	
		$(this).val(datechange.toLocaleDateString("en-US",opciones));
	});

}

function change_date2 () {
	$('.date').each(function(index, el) {
		var datechange = new Date($(this).text());	
		$(this).text(datechange.toLocaleDateString("en-US",opciones));
	});
		
}
	




$(function() {
	change_date();
	change_date2();
});