<?php
global $post, $MODEL;
$ContentType = $MODEL->getSettings('post_type', ['page_id', $post->ID]);
$args = [ 'post_type' => $ContentType, 'orderby' => 'menu_order', 'posts_per_page' => -1];
$ContentQuery = new WP_Query( $args );
if ($ContentQuery->have_posts( )):
  $index = 0;
  while ( $ContentQuery->have_posts( ) ) : $ContentQuery->the_post( );
    $url =  get_the_post_thumbnail_url( $ContentQuery->post->ID, [300, 300] );
    if (empty( $url ) || $url === ''){
      $url = get_template_directory_uri().'/images/cover.jpg';
    }  
?>
    <div class="fw-background-container" id="brand_<?= $index ?>" data-name="" data-container='{"w":225, "h":"auto"}' style="background-image: url(<?= $url ?>); width:225px; height: 225px">
      <div class="uk-label uk-position-bottom-left fw-box-title " id="name_<?= $index ?>">
        <a href="<?= get_permalink( $ContentQuery->post->ID ) ?>">
          <?= strtoupper( $ContentQuery->post->post_title ) ?>
        </a>
      </div>
    </div>

<?php 
    $index++;
  endwhile;
endif;    