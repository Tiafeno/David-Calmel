<?php

function render_ancre( $attrs, $content ){
  $at = shortcode_atts([
      'idhook' => null,
      'idimg' => null,
      'titles' => ''
  ], $attrs);

  $objAttrs = (object) $at;
  if (!is_null( $objAttrs->idhook )) {
    $idHook = explode("|", trim( $objAttrs->idhook ));
    $idImg = explode("|", trim( $objAttrs->idimg ));
    $Titles = explode("|", trim( $objAttrs->titles ));

    if (!is_array( $idHook )) return;
    echo '<div class="uk-container uk-container-large ancre-container">';
    while (list($index, $_id) = each( $idHook )){
      $url = (is_array( $idImg ) && !empty( $idImg )) ? wp_get_attachment_image_src( (int)$idImg[ $index ], [300, 250]) [ 0 ] : null;
      
        include 'templates/ancre.template.php';
    }
    echo '</div>';
  }
}

add_shortcode( 'ancre', 'render_ancre' );