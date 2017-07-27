<?php
$FavoriteContents = [];
$Brands = [];
$POSTTYPE = (array)unserialize(POSTTYPE);
$POSTNAME = (array)unserialize(POSTNAME);
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
          'content' => $Contents->post->post_content
        ];
      }
    endwhile;
  }
  foreach ($POSTNAME as $key => $value) {
    # code...
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

 <div class="uk-child-width-1-3@m uk-grid-match content-main" uk-grid>  

<?php
foreach($Brands as $key => $brand):
?>
     
  <div class="uk-card uk-card-secondary uk-card-hover">
    <div class="uk-card-body">
      <h3 class="uk-card-title">
        <a href="#">
          <?= strtoupper( $brand[ 'name' ] ) ?>
        </a>
      </h3>
    </div>
  </div>

    
<?php  endforeach;
?> </div>  
