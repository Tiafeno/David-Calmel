
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

  var Effectreverse = "uk-animation-reverse";

  var Initialize = function Initialize() {
    var ElementsHTML = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var FavoriteContents = arguments[1];

    FavoriteWorks = FavoriteContents;
    DOMElements = ElementsHTML;

    HideAnimate(function(){
      window.setTimeout(function(){
        ShowAnimation();
      }, 2000);
    });

    window.setInterval(function () {
      HideAnimate(function(){
        window.setTimeout(function(){
          ShowAnimation();
        }, 2000);
      });
    }, 8000);
  };

  var LoadingStatus = function(){
    var element = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var status = arguments[1];
    $( element )
    .find( '.loading' )
      .css({
        visibility: status
      });
  };

  var HideAnimate = function Hidden( callback ){
    _.forEach(DOMElements, function( element, key ){
      var selectedEffect = Effectsplay[ Math.floor(Math.random() * Effectsplay.length) ];
      $( element )
        .find('.fw-background')
        .removeClass(Effectsplay.join(' '))
        .addClass(selectedEffect + ' ' + Effectreverse);
      $( '#name_' + key)
        .removeClass(Effectsplay.join(' '))
        .addClass(selectedEffect + ' ' + Effectreverse);
    });
    callback();
  };

  var ShowAnimation = function Animation() {
    var currentSelected = [],
        pull = _.concat( FavoriteWorks ),
        selected = null;
    
    _.forEach(FavoriteWorks, function(){
      _.pullAllWith(pull, currentSelected, _.isEqual);
      selected = pull[ Math.floor(Math.random() * pull.length) ];
      currentSelected = currentSelected.concat( selected );
    });
    _.forEach(DOMElements, function( element, key ){
      var selectedEffect = '';
      var post = currentSelected[ key ];
      if (typeof post == "undefined") return;
      if (post.thumbnail_url != false) {
        $( element )
        .find('.fw-background')
          .css({
            visibility : function(){
              return 'hidden';
            },
            display: "none",
            "background-image" : function(){
              LoadingStatus(element, 'visible');
              return "url(" + post.thumbnail_url + ")";
            }
          })
          .imagesLoaded(
            { 
              background: true 
            }, function( imgload ) {
              selectedEffect = Effectsplay[ Math.floor( Math.random() * Effectsplay.length ) ];
              $( imgload.elements[ 0 ] )
              .css({
                visibility: 'visible'
              })
              .removeClass(Effectsplay.join(' ') + ' ' + Effectreverse)
              .addClass(selectedEffect)
              .css('display', 'block');

              LoadingStatus(element, "hidden");
          })
        .end();
        

      } else {
        $( element )
        .find('.fw-background')
          .css({
            'background-image': 'none',
            'background-color': "#ffffff"
          })
        .end()
        .find('.loading')
          .css('visibility', 'hidden');
      }

      var x = Effectsplay[ Math.floor(Math.random() * Effectsplay.length) ];
      $( '#name_' + key )
        .removeClass(Effectsplay.join(' ') + ' ' + Effectreverse)
        .addClass(x)
        .css('display', 'block')
        .find( 'a' )
          .text( post.title )
          .attr('href', post.link);
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