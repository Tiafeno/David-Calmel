/**
 * @Author Tiafeno Finel
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

(function($){
  /*
  ** When document DOM is ready
  **
  */
  $( document ).ready(function() {
    var _ConstContentHeight = 700;
    var MainContentHeight = null;
    var StickyWrapperHeight = null;
    var HeaderSloganHeight = null;
    var HeaderMenuHeight = null;
    $( ".sticky-menu" ).sticky({ topSpacing: 0, zIndex: 999 });

    /*
    ** Calcule responsive content on resize window and callback 
    ** @return : void
    */
    function calcResponsive(callback){
      MainContentHeight = parseFloat( $( '#main-content' ).css( 'height' ) );
      HeaderSloganHeight = $( '.HeaderSlogan' ).css( 'height' );
      HeaderMenuHeight = $( '.HeaderMenu' ).css( 'height' );
      StickyWrapperHeight = (parseFloat( HeaderMenuHeight ) + parseFloat( HeaderSloganHeight )) + 10 + 'px';
      callback();
    }

    /*
    ** First execute plugin sticky menu, Start, Update and End event Bind
    ** @return : void
    */

    onSticky(function(){
      HeaderSloganHeight = $( '.HeaderSlogan' ).css( 'height' );
      /*
      ** Start Sticky menu 
      **
      */
      $( ".sticky-menu" )
      .on( 'sticky-update', function() { console.log( "Update" ); })
      .on( 'sticky-start', function() {
        calcResponsive(function() {
          if (MainContentHeight >= _ConstContentHeight) {
            $( ".onStickyStartHide" ).hide('fadein', function() {
              var HeightStickyStart = parseFloat( StickyWrapperHeight ) - parseFloat( HeaderSloganHeight );
              $( '#sticky-wrapper' ).animate({
                height: HeightStickyStart + 'px'
              }, 400, function() { });
            });
          }
        });
      })
      .on( 'sticky-end', function() {
        $( ".onStickyStartHide" ).show("fast", function() {
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
      /**--------- End Sticky --------------- */
    });

    /*
    ** Calcul responsive content and call the callback function in 200ms
    ** @return : void
    */
    function onSticky( callback ) {
      setTimeout(function() {
        calcResponsive(function() {
          callback();
        });
      }, 200);
    }

    /*
    ** On window resize event binding
    ** @return : void
    */
    $( window ).resize(function() {
      onSticky(function() {

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