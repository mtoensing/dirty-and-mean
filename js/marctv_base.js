(function($) {
  $(document).ready(function($) {
    $("p > img").parent().addClass('childIMG');
    $("p > .jqvideo").parent().addClass('childIMG');
    $("#nav > ul").addClass("hamburger");
    $('<a class="hamburger-icon"></a>').prependTo('#nav').click(
            function() {
              $('#nav .hamburger').fadeToggle('fast');
            }
    );

    function is_touch_device() {
      return 'ontouchstart' in window // works on most browsers 
              || 'onmsgesturechange' in window; // works on ie10
    }
    ;

    if (is_touch_device()) {
      $('body').addClass('is_touch');
    }
    
    $(".header .innerheader").sticky({
      topSpacing:0,
      redocked_callback: redocked,
      undocked_callback: undocked
    });

    function undocked(el) {
      console.debug(el);
      el.css('background',$('body').css('background-color')).css('box-shadow', '0 2px 6px #333');
    }
    
    function redocked(el) {
      console.debug(el);
      el.css('background','transparent').css('box-shadow', 'none');
    }
    
  });
})(jQuery); 