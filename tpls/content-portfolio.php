<?php
$coverUrl = get_template_directory_uri().'/images/cover.png';
$args = [ 
  'post_type' => 'page', 
  'post_parent' => get_the_ID(), 
  'orderby' => 'date', 
  'order' => 'ASC',
  'posts_per_page' => -1
];
$query = new WP_Query( $args );

?>
<div id="fw-containers" class="fw-containers uk-container uk-container-large uk-padding-remove-right uk-padding-remove-left" >
<?php
if ($query->have_posts()):
  $index = 0;
  while ( $query->have_posts() ) : $query->the_post();
    $thumbnailUrl =  get_the_post_thumbnail_url($query->post->ID, [300, 300]);
    $url = (empty($thumbnailUrl) || $thumbnailUrl === '') ? $coverUrl : $thumbnailUrl;
?>
    <div class="fw-background-container" id="brand_<?= $index ?>" data-name="" data-validate="1" data-post="" 
    data-container='{"w":225, "h":"auto"}' style="background-image: url('<?= $url ?>'); width:225px; height: 225px">
      <div class="fw-background"></div>
      <div class="uk-label uk-position-bottom-left fw-box-title " id="name_<?= $key ?>">
        <div><a class="dc-title" href="<?= get_permalink( $query->post->ID ) ?>"><?= strtoupper( $query->post->post_title ) ?></a></div>
        <div><p class="dc-post_type" style="font-size: 11px"></p></div>
      </div>
    </div>
<?php  
    $index++;
  endwhile;
endif;
?> </div>  
