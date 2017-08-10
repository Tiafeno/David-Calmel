"use strict";

(function ($) {
  var FavoriteWorks = null;
  var Contents = [];

  var Initialize = function Initialize() {
    var DOMContents = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
    var FavoriteContents = arguments[1];

    FavoriteWorks = FavoriteContents;
    Contents = DOMContents;
    window.setInterval(function () {
      Animation();
    }, 4000);
  };
  var Animation = function Animation() {
    var ley = Object.keys(Contents);
    for (var i = 0; i < ley.length; i++) {
      if (FavoriteWorks.hasOwnProperty(ley[ i ])) {
        var element = Contents[ ley[ i ] ];
        var contents = FavoriteWorks[ ley[ i ] ]; //Array
        if (contents.length <= 0) continue;
        var select = contents[Math.floor(Math.random() * contents.length)];
        if (select.thumbnail_url) $(element).css("background-image", "url(" + select.thumbnail_url + ")");
        $('#name_' + ley[i]).text(select.title).attr('href', select.link);
      }
    }
  };

  $(document).ready(function () {
    var self = this;
    var DOMContents = [];
    $('.fw-background-container').each(function () {
      var type = $(this).data('post');
      DOMContents[type] = this;
    });

    Initialize(DOMContents, FavoriteContents);
  });
})(jQuery);