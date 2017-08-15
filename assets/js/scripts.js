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
    })
    .on( 'sticky-end', function() {
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
    var fw_containers = $( '.fw-containers' );
    var NavBar = $( '.uk-navbar-left > ul.uk-navbar-nav' );
    var Title = $( '.uk-navbar-left > ul.uk-navbar-nav .navbar-title' );
    var TitleContainerNavbarHeight = NavBar.height();
    var DefaultTitleHeight = Title.height();

    if (fw_bg_container.length != 0 ) {
      var LastContainersClass = null;
      var CurrentContainersClass = null;
      var firstContainer = fw_bg_container[ 0 ];
      var ConfigContainer = $( firstContainer ).data( 'container' );
      var _constBoxWidth = parseFloat( ConfigContainer.w );
      var _constBoxHeight = ConfigContainer.h;
      var currentWidth = 0;
      var windowWidth = null;
      var LimiteRangeWidth = 0;
      var indentWidth = 0;
      var countBoxsIn= 1;
      var BoxsCount = fw_bg_container.length;
      var $height = (_constBoxHeight === 'auto' ) ?  _constBoxWidth : parseFloat( _constBoxHeight );

      calcBoxsRangeWidth(function( $newWidth, $inbox ) {
        setPositionTitle();
        animateContainer( $newWidth, $inbox );
      });
      /*
      ** On window resize event binding
      ** @return : void
      */
      $( window ).resize(function(  ) {
        calcBoxsRangeWidth(function( $newWidth, $inbox ) {
          setPositionTitle();
          animateContainer( $newWidth, $inbox );
          console.warn('Resize On');
        });
      });

    } else {
      setPositionTitle();
      $( window ).resize(function() {
        /*
        ** Initialize variable title height
        */
        TitleContainerNavbarHeight = NavBar.height();
        DefaultTitleHeight = Title.height();
        setPositionTitle();
      });
    }

    /*
    ** @Function animate box container
    ** @return: void
    */

    function animateContainer( $newWidth, $inbox ){
      var currentWidth = 0;
      var translateX = 0;
      var translateY = 0;
      var translateZ = 0;
      var nbrline = 1;
      var width = ($newWidth * $inbox) + 0.1;
      $height = (_constBoxHeight === 'auto' ) ?  $newWidth : parseFloat( _constBoxHeight );

      fw_bg_container
      .css('visibility', 'hidden')
      .each(function( $index ){
        if (currentWidth < windowWidth && parseInt(currentWidth + 0.1) != parseInt( width )){
          translateX = currentWidth;
        } else {
          translateX = currentWidth = 0;
          translateY = $newWidth * nbrline;
          nbrline += 1;
        }
        currentWidth +=$newWidth;
        $( this ).css({
          visibility : 'visible',
          width : $newWidth + 'px',
          height : $height + 'px',
          position : 'absolute',
          transition : 'transform 1s',
          transform : "translate3d( " + translateX + "px, " + translateY + "px, " + translateZ + "px"
        }).on('transitionend', function(){
          
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
      LimiteRangeWidth = 0;
      indentWidth = 0;
      countBoxsIn= 0;
      var ElemContainers = document.getElementById( "fw-containers" );
      var theWidthCSSprop = window.getComputedStyle(ElemContainers, null).getPropertyValue( "width" );
      windowWidth = parseFloat( theWidthCSSprop ); //parseFloat( $( '.fw-containers' ).innerWidth() );
      var newWidth = 0;
      var rest = null;
      while ( countBoxsIn <  BoxsCount ) {
        var TestValue = LimiteRangeWidth + _constBoxWidth;
        if (TestValue > windowWidth) break;
        if (LimiteRangeWidth < windowWidth){
          LimiteRangeWidth += _constBoxWidth; 
          countBoxsIn += 1;
          continue;
        } else break;
      }
      if (BoxsCount == 2 && LimiteRangeWidth > windowWidth){
        rest = LimiteRangeWidth - windowWidth;
        newWidth = _constBoxWidth - ( parseInt( rest / BoxsCount) );
      }
      countBoxsIn = (countBoxsIn > BoxsCount) ? BoxsCount : countBoxsIn;
      if (LimiteRangeWidth < windowWidth){
        rest = windowWidth - LimiteRangeWidth;
        indentWidth = parseFloat(rest / countBoxsIn);
        newWidth = parseFloat(_constBoxWidth + parseFloat(indentWidth.toFixed(2)));
      } 
      if (rest == null) { newWidth = _constBoxWidth; }
      console.log(windowWidth, LimiteRangeWidth, _constBoxWidth, rest,  parseFloat(indentWidth.toFixed(2)), newWidth, countBoxsIn, BoxsCount);
      /*
      ** Initialize variable title height
      */
      TitleContainerNavbarHeight = NavBar.height();
      DefaultTitleHeight = Title.height();

      /*
      ** Send from callback function
      */
      callback( parseFloat(newWidth.toFixed(2)), countBoxsIn );
    }

    function setPositionTitle(){
      Title.css({
        top : function() {
          var TitlePositionY = TitleContainerNavbarHeight - DefaultTitleHeight;
          return TitlePositionY + 1;
        }
      });
    }
    
  });
})(jQuery);