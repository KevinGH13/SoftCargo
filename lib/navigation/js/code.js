(function() {
  var $body = document.body, $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

  if ( typeof $menu_trigger !== 'undefined' ) {
    $menu_trigger.addEventListener('click', function() {
      $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
    });
  }
	$( ".agente" ).click(function() {
        $( ".menuEm" ).toggle('300');
		$( ".menuPv" ).hide('300');
		$( ".menuIn" ).hide('300');
		$( ".menuCo" ).hide('300');
		$( ".menuEs" ).hide('300');
		$( ".menuSu" ).hide('300');
		$( ".menuTr" ).hide('300');
		$( ".menuUs" ).hide('300');
		$( ".menuRe" ).hide('300');
		$( ".menuBo" ).hide('300');
		$( ".menuPi" ).hide('300');
    });
	$( ".subagente" ).click(function() {
        $( ".menuSu" ).toggle('300');
		  $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });        
    $( ".instalacion" ).click(function() {
        $( ".menuIn" ).toggle('300');
		  $( ".menuPv" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
    $( ".transporte" ).click(function() {
        $( ".menuTr" ).toggle('300');
		   $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
	$( ".usuario" ).click(function() {
        $( ".menuUs" ).toggle('300');
		   $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
	$( ".courier" ).click(function() {
        $( ".menuCo" ).toggle('300');
		 $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
    $( ".estado" ).click(function() {
        $( ".menuEs" ).toggle('300');
		   $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
    $( ".Reajustes" ).click(function() {
        $( ".menuRe" ).toggle('300');
		  $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
    $(".P_vuelo").click(function() {
    	 $( ".menuPv" ).toggle('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
    $(".bodega").click(function() {
    	 $( ".menuBo" ).toggle('300');
    	  $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuPi" ).hide('300');
    });
    $(".pickups").click(function() {
    	 $( ".menuPi" ).toggle('300');
    	  $( ".menuPv" ).hide('300');
		  $( ".menuIn" ).hide('300');
		  $( ".menuCo" ).hide('300');
		  $( ".menuEs" ).hide('300');
		  $( ".menuEm" ).hide('300');
		  $( ".menuSu" ).hide('300');
		  $( ".menuTr" ).hide('300');
		  $( ".menuUs" ).hide('300');
		  $( ".menuRe" ).hide('300');
		  $( ".menuBo" ).hide('300');
    });
}).call(this);