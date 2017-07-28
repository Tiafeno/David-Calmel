/**
 * @Author Tiafeno Finel
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

(function($){
  $(document).ready(function(){
    var _ConstContentHeight = 700;
    var MainContentHeight = null;
    var StickyWrapperHeight = null;
    var HeaderSloganHeight = null;
    $( ".sticky-menu" ).sticky({ topSpacing: 0, zIndex: 999 });
    onSticky(function(){
      //--------- Start Sticky ---------------
      $( ".sticky-menu" ).on('sticky-start', function(){
        // Check main content height
        if (MainContentHeight >= _ConstContentHeight){
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

    function onSticky(callback){
      MainContentHeight = parseFloat( $( '#main-content' ).css( 'height' ) );
      StickyWrapperHeight = $( '.sticky-wrapper' ).css( 'height' );
      HeaderSloganHeight = $( '.HeaderSlogan' ).css( 'height' );

      callback();
      console.log('Content: ' + MainContentHeight);
      console.log('Sticky-Menu: ' + StickyWrapperHeight);
    }


    $( window ).resize(function(){
      // onSticky(function(){

      // });
    });

    if (typeof PAGE != 'undefined'){
      $( '#menu-primary-menu li' ).each(function( index ){
        if ($.trim($(this).text()).toUpperCase() == 'PORTFOLIO'){
          $(this).addClass('uk-active');
        }
      });
    }

    $('#offcanvas').on('show', function () {
        // do something
    });
      
  });
   
})(jQuery);