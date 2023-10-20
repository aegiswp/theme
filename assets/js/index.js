( function( $ ) {
	
	'use strict';
	$(window).scroll(function(){
		var sticky = $('.header'),
		scroll = $(window).scrollTop();
		if (scroll >= 100) sticky.addClass('sticky-header');
		else sticky.removeClass('sticky-header');
	});

	var offset = 100;
	var speed = 500;
	var duration = 900;
	$(window).scroll(function(){
		if ($(this).scrollTop() < offset) {
			$('.scroll-to-top') .fadeOut(duration);
		} else {
			$('.scroll-to-top') .fadeIn(duration);
		}
		});
	$('.scroll-to-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
	});

	$(".trigger").css("cursor", "pointer");
	$(".content").hide();
	$(".trigger").click(function(){
		 $(this).next(".content").slideToggle("fast");
  });
	
} )( jQuery );