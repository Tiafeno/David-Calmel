<?php
$args = [ 'post_type' => 'page', 'post_parent' => get_the_ID(), 'orderby' => 'menu_order'];
$Pages = new WP_Query( $args );

?>
<div class="fw-containers">
<?php
if ($Pages->have_posts()):
  while ( $Pages->have_posts() ) : $Pages->the_post();
    $url =  get_the_post_thumbnail_url($Pages->post->ID, '300x300');
    if (empty($url) || $url === ''){
      $url = get_template_directory_uri().'/images/cover.jpg';
    }


?>
  <div class="fw-container uk-inline">
      <div class="fw-background-container"  style="background-image: url(<?= $url ?>);">
        <div class="uk-label  uk-label-success uk-position-bottom-right ">
          <a href="<?= get_permalink( $Pages->post->ID ) ?>">
            <?= strtoupper( $Pages->post->post_title ) ?>
          </a>
        </div>
      </div>
  </div>
<?php  endwhile;
endif;
?> </div>  
