<?php
$args = [ 
  'post_type' => 'page', 
  'post_parent' => get_the_ID(), 
  'orderby' => 'menu_order', 
  'posts_per_page' => -1
];
$Pages = new WP_Query( $args );

?>
<div id="fw-containers" class="fw-containers uk-container uk-container-large uk-margin-remove uk-padding-remove-right uk-padding-remove-left" >
<?php
if ($Pages->have_posts()):
  $index = 0;
  while ( $Pages->have_posts() ) : $Pages->the_post();
    $url =  get_the_post_thumbnail_url($Pages->post->ID, [300, 300]);
    if (empty($url) || $url === ''){
      $url = get_template_directory_uri().'/images/cover.jpg';
    }
?>
    <div class="fw-background-container" id="brand_<?= $index ?>" data-name="" data-validate="1" data-post="" data-container='{"w":280, "h":"auto"}' style="background-image: url('<?= $url ?>'); width:280px; height: 280px">
      <div class="fw-background"></div>
      <div class="uk-label uk-label-success uk-position-bottom-right " id="name_<?= $index ?>">
        <a href="<?= get_permalink( $Pages->post->ID ) ?>">
          <?= strtoupper( $Pages->post->post_title ) ?>
        </a>
      </div>
    </div>
<?php  
    $index++;
  endwhile;
endif;
?> </div>  
