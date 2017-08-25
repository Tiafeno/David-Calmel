(function($){
  $( document ).ready(function(){
    // anchorage
    $( '.ancre-containers' ).each(function( index ){
      $( '.ancre-containers')
      .clone()
      .prependTo('.cover-container')
      .live(function(){
        alert('load');
      });
      $( this ).remove();
    });

    $( 'span.scroll' )
    .css('cursor','pointer')
    .click(function() {
      var Hook = $( this ).data('href');
      $('html, body').stop().animate({
        scrollTop: $( Hook ).offset().top 
      }, 1000);
    });



  });
})(jQuery);