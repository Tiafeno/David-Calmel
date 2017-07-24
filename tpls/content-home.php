<?php

$args = [
  'category_name' => sanitize_title( get_Title() )
];
$Contents = new WP_Query( $args );

if( $Contents->have_posts() ){
  while ( $Contents->have_posts() ) : $Contents->the_post();

    
  endwhile;
}
