$(window).load(function() {
  var $body, $pins, $window, pinOffset;
 
  $window = $(window);
  $pins = $('.pin');
  $body = $('body');
  pinOffset = 0;
  
  $pins.each(function(i, el) {
    var $el, height;
    $el = $(el);
    height = $el.outerHeight();
    $el.css({
      marginBottom: "-=" + height,
      top: pinOffset
    }).data({
      offset: $el.offset().top - pinOffset,
      top: pinOffset
    });
    $el.after($('<div/>').css({
      height: height,
      marginTop: "+=" + height,
      width: $el.outerWidth()
    }));
    return pinOffset += height;
  });
  
  $window.scroll(function() {
    var scrollTop;
    scrollTop = $window.scrollTop();
    return $pins.each(function(i, el) {
      var $el;
      $el = $(el);
      if (scrollTop > $el.data().offset) {
        return $el.addClass('pinned');
      } else {
        return $el.removeClass('pinned');
      }
    });
  });
});