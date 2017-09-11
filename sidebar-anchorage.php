<?php
global $post;
$the_content = apply_filters( 'the_content', $post->post_content );
$contentDOM = new DOMDocument('1.0', 'UTF-8');
$the_content_utf8 = mb_convert_encoding($the_content, 'HTML-ENTITIES', 'UTF-8');
$lists = [];

libxml_use_internal_errors(true);
$contentDOM->loadHTML( $the_content_utf8 );
libxml_clear_errors();
$Elementh2 = $contentDOM->getElementsByTagName('h2');
?>
<script type="text/javascript">
  (function($){
    $(document).ready(function() {
      var ul_category = $( '.header-category-nav ul.category-nav-offcanvas' );
      var ul_category_offcanvas = $( '.header-category-nav-offcanvas ul.category-nav-offcanvas' );

      var skills = ul_category.find('.skills');
      var skills_offcanvas = ul_category_offcanvas.find('.skills');

      var detach = skills.detach();
      var detach_offcanvas = skills_offcanvas.detach();

      ul_category.prepend( detach );
      ul_category_offcanvas.prepend( detach_offcanvas );
    });
  })(jQuery);
</script>
<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-container uk-container-small uk-section-secondary section-offcanvas " >
    <nav class="uk-navbar" uk-navbar>
      <div class="uk-navbar-left">
        <ul class="category-nav-offcanvas">
          <?php
            foreach ($Elementh2 as $iteration => $element) {
              printf('<li class="%s"><span class="scroll" data-href="#id_%d"> %s </span></li>', 
              $element->nodeValue, $iteration, strtoupper($element->nodeValue));
            }
          ?>
        </ul>
      </div>
    </nav>
  </div>
</header>

<header class="header-category-nav uk-visible@m">
  <div class="uk-container uk-container-small" >
    <nav class="uk-navbar-transparent uk-navbar" uk-navbar>

      <div class="uk-navbar-left">
        <ul class="category-nav-offcanvas uk-padding-remove-left">
          <?php
            foreach ($Elementh2 as $iteration => $element) {
              printf('<li class="%s"><span class="scroll" data-href="#id_%d"> %s </span></li>', 
              $element->nodeValue, $iteration, strtoupper($element->nodeValue));
            }
          ?>
        </ul>
      </div>
    </nav>
  </div>
</header>