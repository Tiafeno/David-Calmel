
(function ($) {
  var FavoriteWorks = null;
  var DOMElements = [];
  var selectedFavoriteWorks = [];


  var Initialize = function Initialize() {
    var ElementsHTML = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var FavoriteContents = arguments[1];

    FavoriteWorks = FavoriteContents;
    DOMElements = ElementsHTML;

    window.setInterval(function () {
      Animation();
    }, 4000);
  };
  var Animation = function Animation() {
    var currentSelected = [],
        pull = _.concat(FavoriteWorks),
        selected = null;
    
    _.forEach(FavoriteWorks, function(){
      _.pullAllWith(pull, currentSelected, _.isEqual);
      selected = pull[ Math.floor(Math.random() * pull.length) ];
      currentSelected = currentSelected.concat( selected );
    });
    _.forEach(DOMElements, function( element, key ){
      var post = currentSelected[ key ];
      if (typeof post == "undefined") return;
      if (post.thumbnail_url != false) {
        $( element )
        .css({
          visibility : function(){
            return 'hidden';
          },
          "background-image" : function(){
            $( element ).children( '.loading' ).css({
              visibility: "visible"
            });
            return "url(" + post.thumbnail_url + ")";
          }
        })
        .imagesLoaded(
          { 
            background: true 
          }, function( imgload ) {
            $( imgload.elements[ 0 ] )
              .css('visibility', 'visible')
              .children('.loading')
              .css('visibility', 'hidden');
        });
      } else {
        $( element )
        .css({
          'background-image': 'none',
          'background-color': "#ffffff"
        })
        .children('.loading')
        .css('visibility', 'hidden');
      }

      $( '#name_' + key )
      .text( post.title ).attr('href', post.link)
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