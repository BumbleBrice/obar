// Anim buton navbar
 $(".button-fill").hover(function() {
   $(this).children(".button-inside").addClass('full');
 }, function() {
   $(this).children(".button-inside").removeClass('full');
 });

// Smooth scroll
$(function() {
    $('.nav a').bind('click',function(event){
        var $anchor = $(this);
        /*
        if you want to use one of the easing effects:
        $('html, body').stop().animate({
            scrollLeft: $($anchor.attr('href')).offset().left
        }, 1500,'easeInOutExpo');
         */
        $('html, body').stop().animate({
            scrollLeft: $($anchor.attr('href')).offset().left
        }, 1000);
        event.preventDefault();
    });
});

// Input page addBar
$(":file").filestyle({badge: false});
