$(document).ready(function(){

  // Anchor arrow click
  // smooth scroll to anchor tag
 $('a[href*="#"]:not([href="#featured"])').click(function() { // Check to see if anchor tag is not carousel's featured link
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          // Smooth scroll to link section
          $('html, body').animate({
            scrollTop: target.offset().top + 50
          }, 900);
          return false;
        }
      }
    });
    
  //highlight navigation
  $(window).scroll(function() {
    var windowpos = $(window).scrollTop();

    if (windowpos >= 800) {
      $('#progress-nav').css('top', '5em');
    } else {
      $('#progress-nav').css('top', '18em');
    }

    $('nav li a').removeClass('active');
    $('.progress-bar--circle').removeClass('active');

    if (windowpos > $('#top').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#top"]').addClass('active');
    } //windowpos

    if (windowpos > $('#time').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#time"]').addClass('active');
      $('a[href$="#time"] .progress-bar--circle').addClass('active');
    } //windowpos

    if (windowpos > $('#info').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#info"]').addClass('active');
      $('a[href$="#info"] .progress-bar--circle').addClass('active');
    } //windowpos

    if (windowpos > $('#payment').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#payment"]').addClass('active');
      $('a[href$="#payment"] .progress-bar--circle').addClass('active');
    } //windowpos

    if (windowpos > $('#complete').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#complete"]').addClass('active');
      $('a[href$="#complete"] .progress-bar--circle').addClass('active');
    } //windowpos

    if (windowpos > $('#bottom').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#bottom"]').addClass('active');
    } //windowpos


    // Scrollbar progression
        // pixels scrolled from top
    var scrollTop = $(window).scrollTop(),
        // document height
        docHeight = $(document).height(),
        // window height
        winHeight = $(window).height(),
        // percent of document scrolled
        scrollPercent = (scrollTop) / (docHeight - winHeight),
        scrollPercentRounded = Math.round(scrollPercent*100);

    // incement progress bar as user scrolls
    $('.progress-bar--increment').css('height', scrollPercentRounded + '%');
  });

}); // on load
