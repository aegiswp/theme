// Add a sticky header
window.addEventListener('scroll', function() {
	const stickyHeader = document.querySelector('.header');
	const scrollTop = window.pageYOffset;
  
	if (scrollTop >= 100) {
	  stickyHeader.classList.add('sticky-header');
	} else {
	  stickyHeader.classList.remove('sticky-header');
	}
  });
  
  // Show/hide the scroll-to-top button
  const scrollToTopButton = document.querySelector('.scroll-to-top');
  const offset = 100;
  const speed = 500;
  const duration = 900;
  
  window.addEventListener('scroll', function() {
	if (window.pageYOffset < offset) {
	  scrollToTopButton.fadeOut(duration);
	} else {
	  scrollToTopButton.fadeIn(duration);
	}
  });
  
  // Scroll to top on click
  scrollToTopButton.addEventListener('click', function() {
	window.scrollTo(0, 0);
  });
  
  // Toggle hidden content
  const triggers = document.querySelectorAll('.trigger');
  const contents = document.querySelectorAll('.content');
  
  triggers.forEach(trigger => {
	trigger.addEventListener('click', function() {
	  const content = trigger.nextElementSibling;
	  content.classList.toggle('hidden');
	});
  }); 