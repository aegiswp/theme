// Calculate clients viewport
const w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0];

let x = w.innerWidth || e.clientWidth || g.clientWidth, // Viewport Width
    y = w.innerHeight || e.clientHeight || g.clientHeight; // Viewport Height

// Global vars
const htmlEl = document.documentElement;
const body = document.body;

// On scroll
const fnOnScroll = function() {
  const animateBlock = document.querySelectorAll('.image-animation-from-bottom, .image-animation-from-top, .image-animation-from-left, .image-animation-from-right, .animate-from-top, .animate-from-bottom, .animate-from-left, .animate-from-right');

  animateBlock.forEach(element => {
    element.classList.remove('is-loading');

    const animateBlockOffsetTop = element.offsetTop;
    let activationOffset;

    // Determinate distance to initiate animation relative to viewport height
    if (element.dataset.offset) {
      activationOffset = element.dataset.offset;
    } else if (element.classList.contains('image-animation-from-bottom')) {
      activationOffset = 1.2;
    } else {
      activationOffset = 1.1;
    }

    if (window.pageYOffset > animateBlockOffsetTop - y / activationOffset) {
      element.classList.add('scrolled-to');
    }
  });
};

fnOnScroll();

window.addEventListener('scroll', function() {
  setTimeout(fnOnScroll, 300);
});