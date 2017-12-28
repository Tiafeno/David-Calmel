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
  
      var validateUrl = new RegExp('^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  
      var header_nav_top = $('.header-nav-top').height();
      var header_category_offcanvas = $('.header-category-nav-offcanvas').height();
      var header_category = $('.header-category-nav').height();
      var scrollStatus = false;
      var meta = $("meta[name='page:type']");
      var primaryContent = $('#primary-content');

      /** Liens d'ancrage pour les elements pour class 'span.goup' */
      $( 'span.goup' )
        .hide()
        .on('click', function(){
          $('html, body').stop().animate({
            scrollTop: $( 'html, body' ).offset().top 
          }, 1000);
        });
  
      /**
       * Ajouter un lien LinkeInd sur les elements pour class 'join-ln'
       */
      $( '.join-ln' )
        .css( 'cursor', 'pointer' )
        .on('click', function() {
          window.location.href = "http://linkedin.com/in/david-alexandre-calmel-5b637815";
        });
      
      /**
       * When the window resizes
       */
      $( window ).resize(function(){
        header_nav_top = $( '.header.header-nav-top' ).height();
        header_category_offcanvas = $( '.header-category-nav-offcanvas' ).height();
        header_category = $( '.header-category-nav' ).height();
        header_category_offcanvas = (header_category_offcanvas != null) ? header_category_offcanvas : 0;
        header_category = (header_category != null) ? header_category : 0;
      });
      
      /**
       * Activer le boutton `scroll up` quand on scroll.
       */
      $( window ).scroll(function( event ){
        var LimiteTop = header_nav_top + header_category_offcanvas + header_category;
        var win = $( window );
        var Top = $( win ).scrollTop();
        scrollStatus =  (Top > LimiteTop) ? true : false;
        if (scrollStatus){
          $( 'span.goup' ).fadeIn('slow', function(){});
        } else { $( 'span.goup' ).fadeOut('slow', function(){}); }
      });
      
      var isMobile = false;
      /** Detecter l'appareil de navigation si c'est un mobile  */
      if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
          || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) 
        isMobile = true;
  
      var navbarTitle = $( 'h1.navbar-title' );
      var currentTitlePosTop = navbarTitle.css( 'top' );
      if (isMobile){
        
      }

      /**
       * Diminuer la taille de l'image ( si #primary-content < 750px), 
       * in single page       
       * */
      function resizeFirstImage() {
        var pC = primaryContent.width();
        var primaryContentWidth = parseFloat( pC );
        var imgElement = $('img.vc_single_image-img');
        if (primaryContentWidth < 750) {
          imgElement.first().removeClass( "resize-single-img" ).addClass( "resize-single-img" );
        } else imgElement.first().removeClass( "resize-single-img" );
      }

      function resizeImageonMobile() {

      }

      
      var metaContent = meta.attr("content").trim();
      if (metaContent === "single")
        resizeFirstImage();
      $( window ).resize(function(  ) {
        if (metaContent === "single")
          resizeFirstImage();
      });
      /**
       * Ajouter une class 'uk-active' pour le lien 'PORTFOLIO'.
       */
      var navbarTitleValue = navbarTitle.text().trim();
      if (/^portfolio/.test( navbarTitleValue.toLowerCase() )){
        $( '#menu-primary-menu li' ).each(function( index ){
          if ($.trim( $( this ).text() ).toUpperCase() == 'PORTFOLIO'){
            $( this ).addClass( 'uk-active' );
          }
        });
      }
      /** Les elements container des boxs */
      var fw_bg_container = $( '.fw-background-container' );
      var fw_containers = $( '.fw-containers' );

      /** Verifie si c'est une page normal ou une page avec les elements (box) */
      if (fw_bg_container.length != 0 ) {
        var configContainer = $( fw_bg_container[ 0 ] ).data( 'container' );
        var _constBoxWidth = parseFloat( configContainer.w );
        var _constBoxHeight = configContainer.h;
  
        /** 
         * Ajoute un liens au elements;
         * Le liens s'ouvre quand on clique sur les elements ou le titre.
         */
        $( '.fw-background-container' )
          .css( 'cursor', 'pointer')
          .on( 'click', function() {
            var Self = this;
            var elementLink = $( Self ).find( 'a' );
            var Link = elementLink.attr( 'href' );
            if (validateUrl.test( Link ))
              window.location.href = Link;
          });

        initTranslation();
        
        /**
         * On window resize event binding
         */
        $( window ).resize(function(  ) {
          positionBoxs().then(function ( results ) {
            console.log(results);
            var boxPosition = results;
            translateBoxs( boxPosition ).then(function ( res ){
              
            });
          })
        });
  
      } 

      /**
       * Initialiser la position des elements
       * @param {void}
       * @return {void}
       */
      function initTranslation() {
        positionBoxs().then(function ( results ) {
          var boxPosition = results;
          translateBoxs( boxPosition ).then(function ( res ) {
            coloredBox();
            var wWidth = res;
            var ElemContainers = document.getElementById( "fw-containers" );
            var widthContainers = window.getComputedStyle(ElemContainers, null).getPropertyValue( "width" );
            var currentWindowWidth = parseFloat(widthContainers);
            if (wWidth > currentWindowWidth || wWidth < currentWindowWidth){
              /**
               * Recommencer la calcule si la longueur du navigateur actuelle 
               * est superieux à l'ancienne
               */
              initTranslation();
            }
          });
        })
      }

      /**
       * Cette fonction colore les elements (box) disponible.
       * @param {void}
       * @return {void}
       */
      function coloredBox() {
        var color = [ '#E5007D', '#008EBC', '#4D3761', '#AF7C00', '#005428', '#D25015',
                      '#951B81', '#A39800', '313289'];
        var step = 0;
        fw_bg_container
          .each(function( index ) {
            step = (typeof color[ step ] == undefined) ? 0 : step;
            $( this ).css({ 'background-color': color[ step ]});
            step++;
          });
      }

      /**
       * Positionner les blocs en translation.
       * @param {object} boxPosition 
       * @returns {Promise}
       */
      function translateBoxs( boxPosition ) {
        return new Promise(function(resolve, reject) {
          var translateX = 0;
          var translateY = 0;
          var n = 0;
          var k = 0;
          var containerWidth = (boxPosition.realWidth * boxPosition.boxinlength) + 0.01;
  
          fw_bg_container
            .css('visibility', 'hidden')
            .each(function( index ){
              if ((boxPosition.boxinlength - 1) >= n) {
              } else {
                k += 1;
                n = 0;
              }
              translateX = boxPosition.realWidth * n;
              translateY = boxPosition.realWidth * k;
              n += 1;
              var data = { 'translateX': translateX, 'translateY': translateY };
              /** Positionner l'element */
              $( this ).css({
                visibility : 'visible',
                width : boxPosition.realWidth + 'px',
                height : boxPosition.realWidth + 'px',
                position : 'absolute',
      
                'transition' : 'transform 1s',
                '-webkit-transition' : 'transform 1s',
      
                '-webkit-transform' : "translate(" + data.translateX + "px, " + data.translateY + "px) ",
                '-moz-transform' : "translate(" + data.translateX + "px, " + data.translateY + "px) ",
                '-o-transform' : "translate(" + data.translateX + "px, " + data.translateY + "px) ",
                '-ms-transform' : "translate(" + data.translateX + "px, " + data.translateY + "px) ",
                'transform' : "translate(" + data.translateX + "px, " + data.translateY + "px) "
              }).on('transitionend', function(){
      
              });
            });

          /**
           * Positionner le footer
           */
          window.setTimeout(function(){
            fw_containers.css({
              height : boxPosition.realWidth * (k + 1)
            });
            /** Resoudre la fonction et envoyer la largeur de la fenetre */
            resolve( boxPosition.windowWidth );
          }, 400);
        });
      }

      /**
       * Calculer la largeur de la fenetre et positionner les boxs
       * @param {void}
       * @return {Promise} Information necessaire pour la translation (annimation)
       */
      function positionBoxs(){
        var countBoxIn = NaN;
        return new Promise(function(resolve, reject) {
          var initRangerWidth = NaN;
          var indentWidth = NaN;
          var reelWidth = NaN;
          var boxWidth = parseInt(_constBoxWidth);
          var ElemContainers = document.getElementById( "fw-containers" );
          var theWidthContainers = window.getComputedStyle(ElemContainers, null).getPropertyValue( "width" );
          var windowWidth = parseFloat( theWidthContainers ); 
          var boxInLength = isNaN( countBoxIn) ? (windowWidth / boxWidth) : countBoxIn;

          boxInLength = parseInt( boxInLength );
          initRangerWidth = boxInLength * boxWidth;
          if (initRangerWidth < windowWidth) {
            var spaceWidth = windowWidth - initRangerWidth;

            indentWidth = windowWidth / initRangerWidth;
            indentWidth = spaceWidth / boxInLength;
            indentWidth = parseFloat( indentWidth.toFixed(2) );

            reelWidth = boxWidth + indentWidth;
            resolve({
              'realWidth': reelWidth, 
              'boxinlength': boxInLength, 
              'indent': indentWidth,
              'windowWidth': windowWidth,
              'initRangerWidth': initRangerWidth
            });

          } else if (initRangerWidth == windowWidth) {
            reelWidth = boxWidth;
            resolve({
              'realWidth': reelWidth, 
              'boxinlength': boxInLength, 
              'indent': indentWidth,
              'windowWidth': windowWidth,
              'initRangerWidth': initRangerWidth
            });

          } else {
            boxInLength -= 1;
            initRangerWidth = boxWidth * boxInLength;
            var spaceWidth = windowWidth - initRangerWidth;
            
            indentWidth = windowWidth / initRangerWidth;
            indentWidth = spaceWidth / boxInLength;
            indentWidth = parseFloat( indentWidth.toFixed(2) );

            reelWidth = boxWidth + indentWidth;
            resolve({
              'realWidth': reelWidth, 
              'boxinlength': boxInLength, 
              'indent': indentWidth,
              'windowWidth': windowWidth,
              'initRangerWidth': initRangerWidth
            });

          }
        });
      }
      
    });
  })(jQuery);