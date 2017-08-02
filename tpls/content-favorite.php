<?php
$FavoriteContents = [];
$Brands = [];
$POSTTYPE = (array)unserialize(POSTTYPE);
$POST = (array)unserialize(POST);
while (list(, $type) = each( $POSTTYPE )){
  $args = [
    'post_type' => $type
  ];
  $Contents = new WP_Query( $args );
  if ( $Contents->have_posts() ){
    $FavoriteContents[$type] = [];
    while ( $Contents->have_posts() ) : $Contents->the_post();
      if ( (int)get_post_meta($Contents->post->ID, 'favorite_works', true) === 1 ){
        $FavoriteContents[$type][] = [
          'title' => get_the_title( $Contents->post->ID ),
          'content' => $Contents->post->post_content,
          'thumbnail_url' => get_the_post_thumbnail_url( $Contents->post->ID, 'full' ),
          'link' => get_permalink( $Contents->post->ID )
        ];
      }
    endwhile;
  }
  foreach ($POST as $key => $value) {
    if ($type === $value[ 'type' ]){
      $Brands[] = [
        'type' => $type,
        'name' => $value[ 'name' ]
      ];
    }
  }

}
//print_r($FavoriteContents);
?> 
<script> 
  var PostType = <?= json_encode($POSTTYPE, JSON_PRETTY_PRINT); ?>;
  var FavoriteContents = <?= json_encode($FavoriteContents, JSON_PRETTY_PRINT); ?>; 
</script>

  <div class="fw-containers">
<?php

$url = get_template_directory_uri().'/images/cover.jpg';
foreach($Brands as $key => $brand):
?>
    <div class="fw-container uk-inline">
        <div class="fw-background-container"  style="background-image: url(<?= $url ?>);">
          <div class="uk-label  uk-label-success uk-position-bottom-right ">
            <a href="#">
              <?= strtoupper( $brand[ 'name' ] ) ?>
            </a>

          </div>
        </div>
    </div>
    
<?php  endforeach;
?> </div>  
