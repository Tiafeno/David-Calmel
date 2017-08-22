<?php
global $post;
$currentID = $post->ID;
$ContentType = get_post_meta( $post->ID, 'content_type', true );
$args = [ 'post_type' => $ContentType, 'orderby' => 'menu_order'];
$ContentQuery = new WP_Query( $args );
if ($ContentQuery->have_posts( )):
  $index = 0;
  while ( $ContentQuery->have_posts( ) ) : $ContentQuery->the_post( );
    $url =  get_the_post_thumbnail_url( $ContentQuery->post->ID, [300, 300] );
    if (empty( $url ) || $url === ''){
      $url = get_template_directory_uri().'/images/cover.jpg';
    }  
?>
    <div class="fw-background-container" id="brand_<?= $index ?>" data-name="" data-validate="1" data-post="" data-container='{"w":280, "h":"auto"}' style="background-image: url(<?= $url ?>); width:280px; height: 280px">
      <div class="uk-label uk-label-success uk-position-bottom-right" id="name_<?= $index ?>">
        <a href="<?= get_permalink( ) ?>?_idchild=<?= $currentID ?>">
          <?= strtoupper( $ContentQuery->post->post_title ) ?>
        </a>
      </div>
    </div>

<?php 
    $index++;
  endwhile;
endif;    