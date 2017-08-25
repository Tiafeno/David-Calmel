
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
  var AnimationInterval = null;

  /*
  ** Initialize animation 
  ** first call to animate block
  */

  var Initialize = function Initialize() {
    var ElementsHTML = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var FavoriteContents = arguments[1];

    FavoriteWorks = FavoriteContents;
    DOMElements = ElementsHTML;
    /*
    ** Animate the DOM element content 
    ** after time out 400 ms  
    */
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
      })
      .find('.uk-label')
      .fadeOut('fast');

    }, 400);

    /*
    ** Animate the DOM element content to infinie
    ** after 20 000 ms  
    */
    AnimationInterval = window.setInterval(function () {
      ShowAnimation();
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

  /*
  ** Request thumbnail url (img or gif) with AJAX
  ** @params: 
     - $key : DOM element index (int)
     - post : Post selected (object)
     - element : current DOM element for this post (DOMElement)
     - fw_background : DOM element class fw_background for this element (DOMElement)
     - callback : function callback
  ** @function: xhjq
  ** @return: callback( [post] )
  */
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

  /*
  ** Animate content in block 
  ** @function ShowAnimation
  ** @params void
  ** @return void
  */
  var ShowAnimation = function Animation() {
    var currentSelected = [];
    var pull = _.concat( FavoriteWorks );
    var selected = null;
    var step = 0;
    
    /*
    ** Select post in random mode at currentSelected variable
    */
    _.forEach(pull, function(){
      _.pullAllWith(pull, currentSelected, _.isEqual);
      selected = pull[ Math.floor(Math.random() * pull.length) ];
      currentSelected = currentSelected.concat( selected );
    });

    /*
    ** Remove post content if a hover DOM element 
    */
    _.remove(currentSelected, function( el ){
      return el.name == HoverSelectedContentNAME;
    });

    /*
    ** Loop DOM element and check if is validate for new post
    ** remove the post content in currentSelected if DOM elements validate equal 0, name post equal DOM element name
    */
    _.forEach(DOMElements, function( el ){
      var V = parseInt($( el ).data( 'validate' ));
      var Name = $( el ).data( 'name' );
      if (V == 0) {
        _.remove(currentSelected, function( element ){
          return element.name == Name;
        });
        return;
      }
    });

    /*
    ** Loop DOM elements for set new post content
    ** xhjq, Ajax function to load img or gif
    */
    
    _.forEach(DOMElements, function( $element, $key ){
      var thisElement = $( $element );
      var selectedEffect = '';
      var thisElementID = thisElement.attr( 'id' );
      var currentPostName = thisElement.data( 'name' );
      var keys = step;
      var fw_background = thisElement.find( '.fw-background' );
      var validation = parseInt(thisElement.data( 'validate' ));
      if (validation == 0) {
        step += 1;
        return;
      }
      if ((HoverSelectedContentID != null && currentPostName == HoverSelectedContentNAME) || 
        thisElementID == HoverSelectedContentID) {
        return;
      } 
      var post = currentSelected[ keys ];
      if (typeof post == "undefined") return;
      if (post.thumbnail_url != false) {
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