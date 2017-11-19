(function($){
  'use strict'
  var FavoriteWorks = [];
  var DOMElements = [];
  var selectedFavoriteWorks = [];
  var HoverSelectedContentID = null;
  var HoverSelectedContentNAME = null;
  var HoverSelectedContentPOST = null;
  var AnimationInterval = null;

  var items = DOMElements.length;

  var getThumbnail = function( post ) {
    var _post = post;
    return new Promise(function(resolve, reject) {
      if (_post.thumbnail_url == false) {
        _post.thumbnail_url = DefaultCover;
        resolve( _post );
      }

      $.ajax({
        url : _post.thumbnail_url,
        method : 'GET'
      })
      .done(function(){
        resolve( _post );
      });
    })
  }
  /*
  ** Initialize animation 
  ** first call to animate block
  */
  var Initialize = function Initialize() {
    var ElementsHTML = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var FavoriteContents = arguments[1];

    _.forEach(FavoriteContents, function( contentPost ) {
      /**
     * Ajouter le contenue dans le tableau `FavoriteWorks` quand le chargement
     * de l'image est terminer.
     */
      getThumbnail( contentPost ).then(function successCallback( result ) {
        FavoriteWorks.push( result );
        if (items < FavoriteContents.length)
          ShowAnimation();
      });
    });
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
          HoverSelectedContentID = HoverSelectedContentNAME =  null;
        })
    }, 400);

    /*
    ** Animate the DOM element content to infinie
    ** after 10 000 ms  
    */
    window.setInterval(function () {
      ShowAnimation();
    }, 10000);
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

    var keyInjectable = null;
    
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
    
    /**
     * Ajouter les contenues dans le DOM elements
     */
    _.forEach(DOMElements, function( $element, $key ){
      var thisElement = $( $element );
      var thisElementID = thisElement.attr( 'id' );
      var currentPostName = thisElement.data( 'name' );
      var fw_background = thisElement.find( '.fw-background' );
      /**
       * Filtre l'element courant si la souris est présent.
       * Si oui, on passe a l'element suivant 
       */
      if ((HoverSelectedContentID != null && currentPostName == HoverSelectedContentNAME) 
      || thisElementID == HoverSelectedContentID) {
        keyInjectable = $key;
        return;
      } 
      var post = currentSelected[ $key ];
      /**
       * On ajoute un contenue avec la clé injectable, si la souris est sur une des boxs
       */
      if (typeof post == "undefined") {
        post = currentSelected[ keyInjectable ];
      }

      fw_background
        .css({
          'background-image' : "url(" + post.thumbnail_url + ")"
        });

      thisElement
        .data('name', post.name)
        .find( 'a' )
          .text( post.title )
          .attr('href', post.link);
    });

  };

  $( document ).ready(function () {
    var Elements = [];
    $( '.fw-background-container' ).each(function () {
      Elements = Elements.concat( this );
    });
    if (typeof FavoriteContents === "undefined") {
      console.warn('variable: undefined variable Favorite Contents in this document');
      return;
    }
    /**
     * Initialiser l'annimation avec la liste des elements DOM 
     * et les contenues Favotire Works
     */
    Initialize(Elements, FavoriteContents);
  });
})(jQuery);