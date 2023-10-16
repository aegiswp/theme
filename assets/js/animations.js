(function() {
    'use strict';

    // ====================
    // Variable Declarations
    // ====================

    // Get client's viewport dimensions
    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;

    // Not used in the current code; can be removed for optimization
    // var htmlEl = document.documentElement;
    // var bodyEl = document.body;

    // ====================
    // Smooth Scrolling
    // ====================

    // Add smooth scrolling behavior for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default action
            var target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // ====================
    // On-scroll Animations
    // ====================

    /**
     * Handle animations when elements come into view using Intersection Observer.
     */
    document.addEventListener('DOMContentLoaded', function() {
        // Select elements for animations
        var animateBlock = document.querySelectorAll('.image-animation-from-bottom, .image-animation-from-top, .image-animation-from-left, .image-animation-from-right, .animate-from-top, .animate-from-bottom, .animate-from-left, .animate-from-right');

        // Callback for Intersection Observer to handle animations
        var handleIntersection = function(entries, observer) {
            entries.forEach(function(entry) {
                var el = entry.target;
                var activationOffset;

                // Get the activation offset: either from data attribute or default values based on class
                if (el.dataset.offset) {
                    activationOffset = el.dataset.offset;
                } else if (el.classList.contains('image-animation-from-bottom')) {
                    activationOffset = 1.2;
                } else {
                    activationOffset = 1.1;
                }

                // Calculate the threshold for triggering the animation
                var threshold = 1 - (y / (y + el.offsetTop) * activationOffset);

                // Add/remove classes based on element's visibility
                if (entry.isIntersecting && entry.intersectionRatio >= threshold) {
                    el.classList.add('scrolled-to');
                    el.classList.remove('is-loading');
                }
            });
        };

        // Initialize the IntersectionObserver
        var observerOptions = {
            root: null,           // Observe intersections with respect to the viewport
            rootMargin: '0px',    // No margins
            threshold: 0.1        // Trigger callback if at least 10% of the target is visible
        };

        var observer = new IntersectionObserver(handleIntersection, observerOptions);
        animateBlock.forEach(function(el) {
            observer.observe(el); // Start observing the target element
        });
    });
})();