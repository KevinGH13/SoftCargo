function log(){
	var f = $( "form" ).serialize();
	$.post('index.php', {f}, function(data, textStatus, xhr) {
		
	});
}