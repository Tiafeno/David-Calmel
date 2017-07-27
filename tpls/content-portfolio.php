<?php
$args = [ 'post_type' => 'page', 'post_parent' => get_the_ID(), 'orderby' => 'menu_order'];
$Pages = new WP_Query( $args );

?>
<div class="uk-child-width-1-3@m uk-grid-match content-main" uk-grid>  
<?php
if ($Pages->have_posts()):
  while ( $Pages->have_posts() ) : $Pages->the_post();
?>
  <div class="uk-card uk-card-secondary uk-card-hover">
    <div class="uk-card-body">
      <h3 class="uk-card-title">
        <a href="<?= get_permalink( $Pages->post->ID ) ?>">
          <?= strtoupper( $Pages->post->post_title ) ?>
        </a>
      </h3>
    </div>
  </div>
<?php  endwhile;
endif;
?> </div>  
