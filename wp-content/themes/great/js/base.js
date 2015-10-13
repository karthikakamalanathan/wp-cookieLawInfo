(function($){
	jQuery(document).ready(function($){
		// Main Menu
		$("#site-navigation > div > ul").addClass( "nav-menu" );
		// Main Menu > mobile menu
		$('.nav-menu').mobileMenu( {prependTo:'#site-navigation', switchWidth: 799} );
		
		
		
		/*$("#site-navigation .menu-toggle").click(function(){					   
			var term = $("#site-navigation .menu").css("display");
			if(term == "none"){$("#site-navigation .menu").css("display","block");
			}else{
				$("#site-navigation .menu").removeAttr( "style" );
			}		   
		});*/
		// Main menu underline
		$(".nav-menu > li > ul.children").parent( "li" ).addClass( "main-menu-dd" );
		$(".nav-menu > li > ul.sub-menu").parent( "li" ).addClass( "main-menu-dd" );
		
		$(".nav-menu > li > a").append("<span></span>");
		$(".nav-menu > li > a").mouseover(function(){
			$("span", this).slideDown(100);
		}).mouseout(function() {
			$("span", this).slideUp(100);
     	});
		// Submenus
		$(".nav-menu li li.page_item_has_children > a").append('<i class="fa fa-arrow-right"></i>');
		$(".nav-menu li li.menu-item-has-children > a").append('<i class="fa fa-arrow-right"></i>');
		
		// Back to Top
		jQuery('#back_top').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 'normal');return false;
		});	
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop() !== 0){jQuery('#back_top').fadeIn();}else{jQuery('#back_top').fadeOut();}
		});
		if(jQuery(window).scrollTop() !== 0){jQuery('#back_top').show();}else{jQuery('#back_top').hide();}
	});
})(jQuery);