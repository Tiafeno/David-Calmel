<?php

/*
** @function render_ancre 
** @desc Shortcode get picture and text hook, use for anchosage title
** @params $attrs array, $content string
** @return void
*/
function render_ancre( $attrs, $content="" ){
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


/*
** @function render_client 
** @desc Shortcode get client by activities
** @params $attrs array, $content string
** @return void
** @code e.g [dc_client term_slug="food"]
*/
function render_client( $attrs, $content = ""){
  $at = shortcode_atts([
    /*
    ** term_slug, is slug variable for activity taxonomie
    */
    'term_slug' => null,
    'term_id' => null,
    'post_type' => 'clients',
    'taxonomy' => 'activity',
    'class' => ''
  ], $attrs);
  $at = (object) $at;

  /** @return void when term_slug is null **/
  $term = is_null( $at->term_slug ) ? (!is_null( $at->term_id ) ? (int)$at->term_id : null) : $at->term_slug;
  if (is_null( $term )) return;
  $field = is_int( $term ) ? 'term_id' : 'slug';
  $args = [
    'post_type' => $at->post_type,
    'posts_per_page' => -1,
    'tax_query' => [
      [
        'taxonomy' => $at->taxonomy,
        'field' => $field,
        'terms' => $term
      ]
    ]
  ];
  $Clients = new WP_Query( $args );
  if ($Clients->have_posts()):
    $return = '';
    $clienturl = get_post_meta( $Clients->post->ID, 'clienturl', true);
    $clienturl = ($clienturl != '' || !empty( $clienturl )) ? esc_url( $clienturl ) : false;
    $return .= "<ul class='{$at->class}'>";
    while ($Clients->have_posts()) : $Clients->the_post();
      $return .= "<li>";
      $return .= $clienturl ? "<a href='{$clienturl}' target='_blank'> {$Clients->post->post_title} </a>" : $Clients->post->post_title;
      $return .= "</li>";
    endwhile;
    $return .= '</ul>';
    unset($Clients);
    return $return;
  endif;
  return null;
}

add_action( 'init', function(){
  add_shortcode( 'dc_client', 'render_client' );
  add_shortcode( 'ancre', 'render_ancre' );
});
