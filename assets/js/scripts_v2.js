/**
 * @Author Tiafeno Finel
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

(function($) { 
  /*
  ** When document DOM is ready
  **
  */
  $( document ).ready(function() {
    var fw_bg_container = $( '.fw-background-container' );
    var _constBoxWidth = 300;
    var _constBoxHeight = 300;
    var windowWidth = null;
    var BoxsRangeIncWidth = 0;
    var indentWidth = 0;
    var countBoxsIn= 0;

    calcBoxsRangeWidth(function( $newWidth ) {
      fw_bg_container.animate({
        width : $newWidth + 'px',
        height : $newWidth + 'px'
      }, 620, function() {
        console.log($newWidth);
      });
    });

    /*
    ** On window resize event binding
    ** @return : void
    */
    $( window ).resize(function(  ) {
      calcBoxsRangeWidth(function( $newWidth ) {
        fw_bg_container.animate({
          width : $newWidth + 'px',
          height : $newWidth + 'px'
        }, 620, function() {
          console.log($newWidth);
        });
      });
    });

    /*
    ** Calcule responsive content on resize window and callback 
    ** @return : indent value for width (float)
    */
  
    function calcBoxsRangeWidth( callback ){
      /*
      ** Initialize variable 
      */
      BoxsRangeIncWidth = 0;
      indentWidth = 0;
      countBoxsIn= 0;

      windowWidth = parseFloat( $( '.fw-containers' ).width() );
      var isUp = 0;
      while ( BoxsRangeIncWidth <  windowWidth ) {
        isUp = BoxsRangeIncWidth + _constBoxWidth;
        if (isUp < windowWidth ){
          countBoxsIn += 1;
          BoxsRangeIncWidth += _constBoxWidth;
        } else break;
      }

      if (BoxsRangeIncWidth !== windowWidth && BoxsRangeIncWidth < windowWidth){
        var rest = windowWidth - BoxsRangeIncWidth;
        if (countBoxsIn == null) console.error('Variable invalide');
        indentWidth = parseFloat(rest / countBoxsIn);
      }
      var newWidth = _constBoxWidth + indentWidth;
      
      /*
      ** Send from callback function
      */
      if (newWidth != Infinity){
        callback( newWidth );
      } else calcBoxsRangeWidth( callback );
        
    }

    /*
    ** Start Sticky menu 
    */
    $( ".sticky-menu" ).sticky({ topSpacing: 0, zIndex: 999 });
    $( ".sticky-menu" )
    .on( 'sticky-update', function() { console.log( "Update" ); })
    .on( 'sticky-start', function() {
      $( 'h1.navbar-title').hide('fadeout', function() { });
    })
    .on( 'sticky-end', function() {
      $( 'h1.navbar-title').show('fadein', function() { });
    });
 
    if (typeof PAGE != 'undefined'){
      $( '#menu-primary-menu li' ).each(function( index ){
        if ($.trim($(this).text()).toUpperCase() == 'PORTFOLIO'){
          $(this).addClass('uk-active');
        }
      });
    }
  });
})(jQuery);