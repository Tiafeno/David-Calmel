(function($){
  'use strict'
  var fwContainers = $( 'div#fw-containers' );
  var fwLoading = fwContainers.find( '.fw_loading' );
  var hiddenClass =  "uk-hidden";
  var FavoriteWorks = [];
  var DOMElements = [];
  var selectedFavoriteWorks = [];
  var HoverSelectedContentID = null;
  var HoverSelectedContentNAME = null;
  var HoverSelectedContentPOST = null;
  var AnimationInterval = null;
  var loadingInterval = null;
  var items = 0;

  /**
   * Détecter si le (height et width) de la balise container des blocs a changé
   * S'il y a changer, on change aussi certains propriété style du loading element
   * @librarie jquery.resize.js
   */
  var onContainerResize = function() {
    var heightContainer = fwContainers.height();
      fwLoading
        .css({ height: heightContainer + 'px'});
  };
  fwContainers.resize( onContainerResize );

  /**
   * Convertir les images en encodage base64
   * @param post
   * @returns {*}
   */
  var toDataURL = function( post ) {
    return new Promise(function(resolve, reject) {
      if (false == post.thumbnail_url) post.thumbnail_url = window.DefaultCover;
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
          post.blob = reader.result;
          resolve( post );
        }
        reader.readAsDataURL(xhr.response);
      };
      xhr.open('GET', post.thumbnail_url);
      xhr.responseType = 'blob';
      xhr.send();
    });
  };

  /**
   *
   * @constructor
   */
  var Initialize = function() {
    var ElementsHTML = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var FavoriteContents = arguments[1];
    var itemsCount = 0;
    DOMElements = ElementsHTML;
    items = DOMElements.length

    /**
    * Ajouter le contenue dans le tableau `FavoriteWorks` quand le chargement
    * de l'image est terminer.
    */
    _.forEach(FavoriteContents, function( contentPost ) {
      toDataURL( contentPost ).then(function successCallback( result ) {
        FavoriteWorks.push( result );
      });
    });
    
    loadingInterval = window.setInterval(function() {
      if (FavoriteWorks.length >= items) {
        ShowAnimation();
        fwLoading.addClass(hiddenClass);
      } else {
        if (fwLoading.hasClass(hiddenClass)) {
          fwLoading.removeClass(hiddenClass);
        }
      }
      if (FavoriteContents.length <= items || FavoriteWorks.length >= items)
        clearInterval( loadingInterval );
    }, 200);

    $( '.fw-background-container' )
      .css('cursor', 'pointer')
      .mouseenter(function(){
        var dataName = $( this ).data( 'name' );
        if ( ! dataName) return;
        HoverSelectedContentID = $( this ).attr( 'id' );
        HoverSelectedContentNAME = $( this ).data( 'name' );
      })
      .mouseleave(function(){
        HoverSelectedContentID = HoverSelectedContentNAME =  null;
      });

    /** 
    * Animate the DOM element content to infinie
    * after 10 000 ms  
    */
    window.setInterval(function () {
      ShowAnimation();
    }, 10000);
  };

  /**
   * Afficher l'annimation
   * @constructor ShowAnimation
   */
  var ShowAnimation = function() {
    var currentSelected = [];
    var pull = _.concat( FavoriteWorks );
    var selected = null;
    /*
    ** Liste des type de poste à afficher san titre dans la page favorite works
    */
    var restricted = [ "branding" ];
    /*
    ** Cette variable contient le numéro de la clé de DOM
    *  NB: Position de la souris actuelle
    */
    var keyInjectable = null;
    
    /*
    ** Select post in random mode at currentSelected variable
    */
    _.forEach(pull, function(){
      _.pullAllWith(pull, currentSelected, _.isEqual);
      selected = pull[ Math.floor(Math.random() * pull.length) ];
      currentSelected = currentSelected.concat( selected );
    });

    /** 
    * Remove post content if a hover DOM element 
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
       * On ajoute un contenue avec la clé injectable, 
       * si la souris est sur une des boxs
       */
      if (typeof post == "undefined") { 
        if (null === keyInjectable) return;
        post = currentSelected[ keyInjectable ];
        keyInjectable = null; 
      }
      if (typeof post == "undefined") return;
      fw_background
        .css({
          'background-image' : "url(" + post.blob + ")"
        });

      /** filtrer le contenue */
      var isRestricted =  _.find(restricted, function( postType ) { return postType == post.type; });
      isRestricted = _.isUndefined(isRestricted) ? false : true;
      /** Ajoute une titre et un lien dans le carré */
        thisElement
          .data('name', post.name)
          .find( 'a.dc-title' )
            .text( post.title )
            .attr('href', post.link);
      
      if (isRestricted)
        thisElement
          .find( 'a.dc-title' )
            .text('')

      /** Ajoute le nom de la type de page dans le carré */
      var posttype = _.find(window.PostType, {type: post.type});
      thisElement.find( 'p.dc-post_type' )
        .text( posttype.name )
        .css({color: "#dbdce0"});
    });

  };

  $( document ).ready(function () {
    var Elements = [];
    $( '.fw-background-container' ).each(function () {
      Elements = Elements.concat( this );
    });
    /**
     * On verifie qu'on est réellement dans la page 
     * Favorite Works.
     */
    if (typeof FavoriteContents === "undefined") {
      console.warn('Info: Variable Favorite Contents is missing');
      return;
    }
    /**
     * Initialiser l'annimation avec la liste des elements DOM 
     * et les contenues Favotire Works
     */
    Initialize(Elements, FavoriteContents);
  });
})(jQuery);