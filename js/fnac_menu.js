function toggleMenu(){
	(function($) {
		var menu = $(".main-menu");
		menu.toggleClass('active');
	})( jQuery );
}


(function($) {
	$('.main-menu-item.menu-item-has-children > .menu-link').click(function(event){		
		var target = $(event.target);		
		if( target.is("i") ){
			event.preventDefault();			
			var submenu = target.closest('.main-menu-item').children('div.sub-menu-container');
			//submenu.toggle();
			submenu.toggleClass('active');
			return false;
		} else {
			return true;
		}		
	});
})( jQuery );