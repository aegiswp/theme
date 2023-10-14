'use strict';

window.addEventListener('scroll', function() {
    var sticky = document.querySelector('.header');
    var scroll = window.scrollY;
    if (scroll >= 100) sticky.classList.add('sticky-header');
    else sticky.classList.remove('sticky-header');
});

var offset = 100;
var speed = 500;
var duration = 900;
window.addEventListener('scroll', function() {
    if (window.scrollY < offset) {
        document.querySelector('.scroll-to-top').style.display = 'none';
    } else {
        document.querySelector('.scroll-to-top').style.display = 'block';
    }
});

document.querySelector('.scroll-to-top').addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    return false;
});

var triggers = document.querySelectorAll('.trigger');
triggers.forEach(function(trigger) {
    trigger.style.cursor = 'pointer';
    trigger.nextElementSibling.style.display = 'none';
    trigger.addEventListener('click', function() {
        this.nextElementSibling.style.display = this.nextElementSibling.style.display === 'none' ? 'block' : 'none';
    });
});