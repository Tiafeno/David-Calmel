
(function ($) {
  var FavoriteWorks = null;
  var DOMElements = [];
  var selectedFavoriteWorks = [];
  var Effectsplay = [
    'uk-animation-scale-up',
    'uk-animation-slide-top-small',
    'uk-animation-slide-bottom-small',
    'uk-animation-slide-top-medium',
    'uk-animation-slide-bottom-medium',
  ];
  var HoverSelectedContentID = null;
  var HoverSelectedContentNAME = null;
  var HoverSelectedContentPOST = null;
  var Effectreverse = "uk-animation-reverse";

  var Initialize = function Initialize() {
    var ElementsHTML = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var FavoriteContents = arguments[1];

    FavoriteWorks = FavoriteContents;
    DOMElements = ElementsHTML;
    
    window.setTimeout(function(){
      ShowAnimation();

      $( '.fw-background-container' )
      .css('cursor', 'pointer')
      .mouseenter(function(){
        HoverSelectedContentID = $( this ).attr( 'id' );
        HoverSelectedContentNAME = $( this ).data( 'name' );
      })
      .mouseleave(function(){
        HoverSelectedContentID = null;
        HoverSelectedContentNAME = null;
      });
    }, 400);

    window.setInterval(function () {
      window.setTimeout(function(){
        ShowAnimation();
      }, 2000);
    }, 20000);
  };

  var LoadingStatus = function(){
    var element = arguments.length > 0 && arguments[ 0 ] !== undefined ? arguments[ 0 ] : null;
    var status = arguments[ 1 ];
    if (element === null) return;
    $( element )
    .find( '.loading' )
      .css({
        visibility: status
      });
  };

  var xhjq = function xhjq( $key, post, element, fw_background, callback ){
    var key = $key;
    $.ajax({
      url : post.thumbnail_url,
      method : 'GET'
    })
    .done(function(){
      window.setTimeout(function(){
        selectedEffect = Effectsplay[ Math.floor(Math.random() * Effectsplay.length) ];
        $( fw_background )
          .removeClass(Effectsplay.join(' '))
          .addClass(selectedEffect + ' ' + Effectreverse);

        $( '#name_' + key)
          .removeClass(Effectsplay.join(' '))
          .addClass(selectedEffect + ' ' + Effectreverse);

        window.setTimeout(function() {
          selectedEffect = Effectsplay[ Math.floor( Math.random() * Effectsplay.length ) ];
          $( fw_background )
          .css({
            'background-image' : "url(" + post.thumbnail_url + ")"
          })
          .removeClass(Effectsplay.join(' ') + ' ' + Effectreverse)
          .addClass( selectedEffect )
          .css('display', 'block');

          //LoadingStatus(element, "hidden");
          var x = Effectsplay[ Math.floor(Math.random() * Effectsplay.length) ];
          $( '#name_' + key )
            .removeClass(Effectsplay.join(' ') + ' ' + Effectreverse)
            .addClass(x)
            .css('display', 'block')
            .find( 'a' )
              .text( post.title )
              .attr('href', post.link);

          element.data('name', post.name);
          element.data('validate', 1);
          callback( post );
          
        }, 500);
      }, Math.floor(Math.random() * (3000 - 1000 + 1)) + 1000);
    });
  };

  var ShowAnimation = function Animation() {
    var currentSelected = [];
    var pull = _.concat( FavoriteWorks );
    var selected = null;
    var step = 0;
    
    _.forEach(FavoriteWorks, function(){
      _.pullAllWith(pull, currentSelected, _.isEqual);
      selected = pull[ Math.floor(Math.random() * pull.length) ];
      currentSelected = currentSelected.concat( selected );
    });

    _.remove(currentSelected, function( el ){
      return el.name == HoverSelectedContentNAME;
    });
    
    _.forEach(DOMElements, function( $element, $key ){
      var thisElement = $( $element );
      var selectedEffect = '';
      var thisElementID = thisElement.attr( 'id' );
      var currentPostName = thisElement.data( 'name' );
      var keys = step;
      
      if (HoverSelectedContentID != null && currentPostName == HoverSelectedContentNAME) {
        return;
      } 
        
      var post = currentSelected[ keys ];
      var fw_background = thisElement.find( '.fw-background' );
      var validation = parseInt(thisElement.data( 'validate' ));
      if (typeof post == "undefined") return;
      if (post.thumbnail_url != false) {
        if (validation == 0 || thisElementID == HoverSelectedContentID) return;
        thisElement.data('validate', 0);

        xhjq( $key, post, thisElement, fw_background, function( post ){
          
        });
        
      } else {
        thisElement
        .find( '.fw-background' )
          .css({
            'background-image': 'none',
            'background-color': "#ffffff"
          })
        .end()
        .find( '.loading' )
          .css('visibility', 'hidden');
      }

      step += 1;
    });
  };

  $( document ).ready(function () {
    var self = this;
    var Elements = [];
    $( '.fw-background-container' ).each(function () {
      var type = $( this ).data( 'post' );
      Elements = Elements.concat( this );
    });

    Initialize(Elements, FavoriteContents);
  });
})(jQuery);