import Headroom from 'headroom.js';

$(function() {
    $('.menu-toggler').on('click',function(){
        $('.header__nav').toggleClass('is-mobile');
        $('.header__logo-link').toggleClass('is-mobile');
        $(this).toggleClass('is-active');
        $('body').toggleClass('menu-open');
    }); 


var myElement = document.querySelector(".header");
//console.log(myElement); // is this null?
//var headroom  = new Headroom(myElement);
///headroom.init();

var headrooms = new Headroom(myElement, {
    offset: 205,
    tolerance: 10,
    classes: {
        initial: "slide",
        pinned: "slide--reset",
        unpinned: "slide--up"
    }
  });
headrooms.init();

});
// construct an instance of Headroom, passing the element



