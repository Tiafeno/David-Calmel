/**
 * @Author Tiafeno Finel
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

(function($){
  $(document).ready(function(){

    //--------- Start Sticky ---------------
    $( ".sticky-menu" ).sticky({ topSpacing: 0, zIndex: 999 });
    var StickyWrapperHeight = $('.sticky-wrapper').css('height');
    $( ".sticky-menu" ).on('sticky-start', function(){
      $( ".onStickyStartHide" ).hide('fadein', function(){
        // Start animation
      });
    });

    $( ".sticky-menu" ).on('sticky-end', function(){
      $( ".onStickyStartHide" ).show("fast", function(){
        $('#sticky-wrapper').animate({
          height : StickyWrapperHeight
        }, 200, function(){
          // End animation

        });
        
      });
    });
    //--------- End Sticky ---------------

  });
   
})(jQuery);