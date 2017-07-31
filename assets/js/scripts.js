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
    var HeaderMenuHeight = null;
    $( ".sticky-menu" ).sticky({ topSpacing: 0, zIndex: 999 });

    /*
    ** Calcule responsive content on resize window
    **
    */
    function calcResponsive(callback){
      MainContentHeight = parseFloat( $( '#main-content' ).css( 'height' ) );
      HeaderSloganHeight = $( '.HeaderSlogan' ).css( 'height' );
      HeaderMenuHeight = $( '.HeaderMenu' ).css( 'height' );
      StickyWrapperHeight = (parseFloat(HeaderMenuHeight) + parseFloat(HeaderSloganHeight)) + 10 + 'px';
      callback();
    }

    onSticky(function(){
      HeaderSloganHeight = $( '.HeaderSlogan' ).css( 'height' );
      //--------- Start Sticky ---------------
      $('.sticky-menu').on('sticky-update', function() { console.log("Update"); });

      $( ".sticky-menu" ).on('sticky-start', function(){
        // Check main content height
        calcResponsive(function() {
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
      });

      $( ".sticky-menu" ).on('sticky-end', function(){
        $( ".onStickyStartHide" ).show("fast", function(){
          calcResponsive(function() {
            HeaderSloganHeight = $( '.HeaderSlogan' ).css( 'height' );
            $( '#sticky-wrapper' ).animate({
              height : StickyWrapperHeight
            }, 200, function(){
              // End animation

            });
          });
        });
      });
      //--------- End Sticky ---------------
    });
    
    function onSticky(callback){
      setTimeout(function() {
        calcResponsive(function() {
          //$( '.sticky-wrapper' ).css( 'height' );
          callback();
        });
      }, 200);
    }

    $( window ).resize(function(){
      onSticky(function(){

      });
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