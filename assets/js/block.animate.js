
(function($){
    class Animation{
      constructor(DOMContents = [], FavoriteContents){
        var self = this;
        this.FavoriteWorks = FavoriteContents;
        this.Contents = DOMContents;
        setInterval( function(){
          self.getAnimate();
        }, 4000);
      }
      getAnimate() {
        var ley = Object.keys( this.Contents );
        for (var i = 0; i < ley.length; i++){
          if (Reflect.has(this.FavoriteWorks, ley[ i ])){
            var element = this.Contents[ ley[ i ] ];
            var contents = Reflect.get(this.FavoriteWorks, ley[ i ]); //Array
            if (contents.length <= 0) continue;
            var select = contents[ Math.floor(Math.random() * contents.length) ];
            if (select.thumbnail_url)
              $( element ).css("background-image", "url(" + select.thumbnail_url + ")");
            $( '#name_' + ley[ i ] )
            .text( select.title )
            .attr('href', select.link);
          }
        }
      }
    }

    $( document ).ready(function() {
      var self = this;
      var FavoriteWorks = FavoriteContents;
      var DOMContents = [];
      $( '.fw-background-container' ).each( function() {
        var type = $( this ).data( 'post' );
        DOMContents[ type ] = this;
      });
      var Animate = new Animation(DOMContents, FavoriteWorks);

    });
})(jQuery);
