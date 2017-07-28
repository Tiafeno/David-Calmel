/**
 * @Author Tiafeno Finel
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

(function($){
  $(document).ready(function(){
    var MainContentHeight = parseFloat( $( '#main-content' ).css( 'height' ) );
    var _ConstContentHeight = 700;

    //--------- Start Sticky ---------------
    $( ".sticky-menu" ).sticky({ topSpacing: 0, zIndex: 999 });
    var StickyWrapperHeight = $( '.sticky-wrapper' ).css( 'height' );
    var HeaderSloganHeight = $( '.HeaderSlogan' ).css( 'height' );
    $( ".sticky-menu" ).on('sticky-start', function(){
      // Check main content height
      if (MainContentHeight > _ConstContentHeight){
        $( ".onStickyStartHide" ).hide('fadein', function(){
          // Start animation
          var HeightStickyStart = parseFloat( StickyWrapperHeight ) - parseFloat( HeaderSloganHeight );
          $( '#sticky-wrapper' ).animate({
            height: HeightStickyStart + 'px'
          }, 400, function(){ });
        });
      }
    });

    $( ".sticky-menu" ).on('sticky-end', function(){
      $( ".onStickyStartHide" ).show("fast", function(){
        $( '#sticky-wrapper' ).animate({
          height : StickyWrapperHeight
        }, 200, function(){
          // End animation

        });
        
      });
    });
    //--------- End Sticky ---------------

  });
   
})(jQuery);