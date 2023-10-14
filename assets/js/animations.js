(function() {
  'use strict';

  // Calculate clients viewport
  var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0];

  var x = w.innerWidth || e.clientWidth || g.clientWidth; // Viewport Width
  var y = w.innerHeight || e.clientHeight || g.clientHeight; // Viewport Height

  // Global vars
  var htmlEl = document.documentElement;
  var body = document.body;

  document.addEventListener('DOMContentLoaded', function() {
    // On scroll
    var fnOnScroll = function() {
      var animateBlock = document.querySelectorAll('.image-animation-from-bottom, .image-animation-from-top, .image-animation-from-left, .image-animation-from-right, .animate-from-top, .animate-from-bottom, .animate-from-left, .animate-from-right');

      animateBlock.forEach(function(el) {
        el.classList.remove('is-loading');

        var animateBlockOffsetTop = el.offsetTop;
        var activationOffset;

        if (el.dataset.offset) {
          activationOffset = el.dataset.offset;
        } else if (el.classList.contains('image-animation-from-bottom')) {
          activationOffset = 1.2;
        } else {
          activationOffset = 1.1;
        }

        if ((window.pageYOffset > animateBlockOffsetTop - y / activationOffset)) {
          el.classList.add('scrolled-to');
        }
      });
    };

    fnOnScroll();

    window.addEventListener('scroll', function() {
      setTimeout(function() {
        fnOnScroll();
      }, 300);
    });
  });
})();