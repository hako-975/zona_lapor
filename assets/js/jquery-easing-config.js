// Smooth scrolling using jQuery easing
$(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
});

// Scroll to top button appear
$(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
});

$(document).ready(function() {
  $('.page-scroll').on('click', function(e) {
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top - 75
    }, 1200, 'easeInOutExpo');
    e.preventDefault();
  });
});
