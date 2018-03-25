<?php
$FavoriteContents = [];
$Brands = [];
$POSTTYPE = (array)unserialize( POSTTYPE );
$POST = (array)unserialize( POST );
while (list(, $type) = each( $POSTTYPE )){
  $args = [
    'post_type' => $type,
    'post_status' => 'publish',
    'posts_per_page' => -1
  ];
  $Contents = new WP_Query( $args );
  if ($Contents->have_posts()){
    while ( $Contents->have_posts() ) : $Contents->the_post();
      if ( (int)get_post_meta($Contents->post->ID, 'favorite_works', true) === 1 ){
        /** Récuperer l'url d'image à la une de l'article */
        $thumbnail = get_the_post_thumbnail_url( $Contents->post->ID, 'full' );

        /** detecter si le champ d'url gif exist */
        $gifurl = get_post_meta($Contents->post->ID, 'gifs', true);
        $url = ($gifurl || !empty( $gifurl )) ? $gifurl : $thumbnail;
        $post_type = $Contents->post->post_type;
        $FavoriteContents[] = [
          'title' => get_the_title( $Contents->post->ID ),
          'name' => $Contents->post->post_name,
          'type' => $post_type,
          //'content' => $Contents->post->post_content,
          'thumbnail_url' => $url,
          'link' => get_permalink( $Contents->post->ID )
        ];
      }
    endwhile;
  }

  /** 
   * ******************
   * Ne pas toucher 
   * Pour modifer: functions.php line 68
   * ******************
   **/
  foreach ($POST as $key => $value) {
    if ($type === $value[ 'type' ]){
      $Brands[] = [
        'type' => $type,
        'name' => $value[ 'name' ]
      ];
    }
  }
  /*** ************* */

}
?> 
<script> 
  var PostType = <?= json_encode($POST, JSON_PRETTY_PRINT); ?>;
  var FavoriteContents = <?= json_encode($FavoriteContents, JSON_PRETTY_PRINT); ?>; 
  var DefaultCover = "<?= get_template_directory_uri().'/images/cover.jpg'; ?>";
</script>

  <div id="fw-containers" data-width="" class="fw-containers uk-container uk-container-large uk-padding-remove-right uk-padding-remove-left">
    <div class="fw_loading"></div>
<?php
foreach($Brands as $key => $brand): ?>
        <div class="fw-background-container" id="brand_<?= $key ?>" data-name="" data-container='{"w":225, "h":"auto"}' style=" width:225px; height: 200px">
          <div class="loading"></div>
          <div class="fw-background"></div>
          <div class="uk-label uk-position-bottom-left fw-box-title " id="name_<?= $key ?>">
            <div><a class="dc-title" href="#"></a></div>
            <div><p class="dc-post_type" style="font-size: 11px"></p></div>
          </div>
        </div>
<?php  
endforeach; ?> 
  </div>  
