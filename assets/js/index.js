(function() {
	'use strict';

	window.addEventListener('scroll', function() {
		var sticky = document.querySelector('.header');
		var scroll = window.scrollY || window.pageYOffset;
		if (scroll >= 100) {
			sticky.classList.add('sticky-header');
		} else {
			sticky.classList.remove('sticky-header');
		}
	});

	var offset = 100;
	var speed = 500;
	var duration = 900;

	window.addEventListener('scroll', function() {
		var scrollToTop = document.querySelector('.scroll-to-top');
		if ((window.scrollY || window.pageYOffset) < offset) {
			scrollToTop.style.transition = `opacity ${duration}ms`;
			scrollToTop.style.opacity = 0;
		} else {
			scrollToTop.style.transition = `opacity ${duration}ms`;
			scrollToTop.style.opacity = 1;
		}
	});

	document.querySelector('.scroll-to-top').addEventListener('click', function(event) {
		event.preventDefault();
		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		});
	});

	document.querySelectorAll('.trigger').forEach(function(trigger) {
		trigger.style.cursor = 'pointer';
		trigger.nextElementSibling.style.display = 'none';

		trigger.addEventListener('click', function() {
			var content = trigger.nextElementSibling;
			if (content.style.display === 'none') {
				content.style.display = 'block';
				content.style.transition = 'height 0.2s ease-in-out';
				content.style.height = 'auto';
			} else {
				content.style.display = 'none';
				content.style.transition = 'height 0.2s ease-in-out';
				content.style.height = '0';
			}
		});
	});
})();