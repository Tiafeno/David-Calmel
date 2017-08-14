<?php

/*
** @function render_ancre 
** @desc Shortcode get picture and text hook, use for anchosage title
** @params $attrs array, $content string
** @return void
*/
function render_ancre( $attrs, $content ){
  $at = shortcode_atts([
      'idhook' => null,
      'idimg' => null,
      'titles' => ''
  ], $attrs);

  $objAttrs = (object) $at;
  if (!is_null( $objAttrs->idhook )) {
    wp_enqueue_script( 'ancre', get_template_directory_uri().'/assets/js/ancre.script.js', array('jquery'), false );
    $idHook = explode("|", trim( $objAttrs->idhook ));
    $idImg = explode("|", trim( $objAttrs->idimg ));
    $Titles = explode("|", trim( $objAttrs->titles ));
    $width = count($idHook);

    if (!is_array( $idHook )) return;
    echo '<div class="uk-grid-match uk-grid-small ancre-containers" uk-grid>';
    while (list($index, $_id) = each( $idHook )){
      $url = (is_array( $idImg ) && !empty( $idImg )) ? wp_get_attachment_image_src( (int)$idImg[ $index ], [300, 250]) [ 0 ] : null;
        include 'templates/ancre.template.php';
    }
    echo '</div>';
  }
}
add_shortcode( 'ancre', 'render_ancre' );

/*
** @function render_client 
** @desc Shortcode get client by activities
** @params $attrs array, $content string
** @return void
*/
function render_client( $attrs, $content){
  $at = shortcode_atts([
    'term_slug' => null,
    'post_type' => 'clients',
    'taxonomy' => 'activity'
  ], $attrs);
  $at = (object) $at;
  $args = [
    'post_type' => $at->post_type,
    'tax_query' => [
      'taxonomy' => $at->taxonomy,
      'field' => 'slug',
      'terms' => $at->term_slug
    ]
  ];

  $Clients = new WP_Query( $args );
  if ($Clients->have_posts()):
    echo '<ul>';
    while ($Clients->have_posts()) : $Clients->the_post();
      echo "<li> {$Clients->post->post_title} </li>";
    endwhile;
    echo '</ul>';
  endif;
}
add_shortcode( 'dc_client', 'render_client' );