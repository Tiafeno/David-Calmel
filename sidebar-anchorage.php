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
$rubrics = [];
foreach ($Elementh2 as $iteration => $element) {
  $valueNode = &$element->nodeValue;
  $expContent = explode(' ', $valueNode);
  $value = (!empty($expContent) && count($expContent) >= 1) ? $expContent[ 0 ] : $valueNode;
  $rubrics[] = [ $element->nodeValue, $iteration, strtoupper($value) ];
  
}

?>
<header class="header-category-nav-offcanvas uk-hidden@m">
  <div class="uk-container uk-container-small uk-section-secondary section-offcanvas " >
    <nav class="uk-navbar" uk-navbar>
      <div class="uk-navbar-left">
        <ul class="category-nav-offcanvas">
          <?php
            while (list(, $rubric) = each($rubrics)) {
              printf('<li class="%s"><span class="scroll" data-href="#id_%d"> %s </span></li>', $rubric[0], $rubric[1], $rubric[2]);
            }
            unset($rubric);
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
            foreach ($rubrics as $rub) {
              printf('<li class="%s"><span class="scroll" data-href="#id_%d"> %s </span></li>', $rub[0], $rub[1], $rub[2]);
            }
          ?>
        </ul>
      </div>
    </nav>
  </div>
</header>