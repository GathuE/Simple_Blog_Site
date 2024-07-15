$(function() {
    
    "use strict";
    
    //===== Preloader
    
    $(window).on('load', function(event) {
        $('.preloader').delay(1000).fadeOut(1000);
    });

    // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });
    

});



