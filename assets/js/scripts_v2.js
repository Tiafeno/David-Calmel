/**
 * @Author Tiafeno Finel
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

(function($) { 

  /*
  ** When document DOM is ready
  */
  $( document ).ready(function() {
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

    var isMobile = false; //initiate as false
    // device detection
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) 
      isMobile = true;

    var navbarTitle = $( 'h1.navbar-title' );
    var currentTitlePosTop = navbarTitle.css( 'top' );
    if (isMobile){
      var newPosTop = parseFloat( currentTitlePosTop ) + 3;
      $( 'h1.navbar-title').css('top', newPosTop + 'px');
    }
 
    var navbarTitleValue = navbarTitle.text().trim();
    if (/^portfolio/.test( navbarTitleValue.toLowerCase() )){
      $( '#menu-primary-menu li' ).each(function( index ){
        if ($.trim($(this).text()).toUpperCase() == 'PORTFOLIO'){
          $(this).addClass('uk-active');
        }
      });
    }

    var fw_bg_container = $( '.fw-background-container' );
    if (fw_bg_container.length != 0 ) {
      var firstContainer = fw_bg_container[ 0 ];
      var ConfigContainer = $( firstContainer ).data( 'container' );
      var _constBoxWidth = parseFloat( ConfigContainer.w );
      var _constBoxHeight = ConfigContainer.h;
      var windowWidth = null;
      var BoxsRangeIncWidth = 0;
      var indentWidth = 0;
      var countBoxsIn= 0;
      var $height = (_constBoxHeight === 'auto' ) ?  _constBoxWidth : parseFloat( _constBoxHeight );

      calcBoxsRangeWidth(function( $newWidth ) {
        $height = (_constBoxHeight === 'auto' ) ?  $newWidth : parseFloat( _constBoxHeight );
        fw_bg_container.animate({
            width : $newWidth + 'px',
            height : $height + 'px',
          },400, function() {
            
        });
        
      });
      /*
      ** On window resize event binding
      ** @return : void
      */
      $( window ).resize(function(  ) {
        setTimeout(function(){
          calcBoxsRangeWidth(function( $newWidth ) {
            setAnimateContainer( $newWidth );
          });
        }, 66);
      });
    }
    
    /*
    ** @Function animate box container
    ** @return: void
    */

    function setAnimateContainer( $newWidth ){
      $height = (_constBoxHeight === 'auto' ) ?  $newWidth : parseFloat( _constBoxHeight );
      fw_bg_container.each(function( index ){
        $( this ).animate({
          width : $newWidth + 'px',
          height : $height + 'px'
        }, 200, function() {
          
        });
      });
    }

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
      windowWidth = parseFloat( $( window ).innerWidth() );
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
      var newWidth = parseFloat(_constBoxWidth + indentWidth);
      console.log(windowWidth, BoxsRangeIncWidth, _constBoxWidth, rest,  indentWidth, newWidth, countBoxsIn);
      /*
      ** Send from callback function
      */
      callback( newWidth );
    }
    
  });
})(jQuery);