<?php

$args = [
  'category_name' => sanitize_title( get_Title() )
];
$Contents = new WP_Query( $args );

$BrandCtgs = [];
$lists = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
$colors = [];
$parent_terms = get_terms('category', array('name' => 'portfolio', 'hide_empty' => false ) );
while (list(, $pterms) = each( $parent_terms )):
  $terms = get_terms( 'category', array( 'parent' => $pterms->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
  while (list( $position, $term ) = each( $terms )):
    # code...
    if ($term->slug === 'favorite-works')  continue;
    $BrandCtgs[] = [
      'term_id' => $term->term_id,
      'slug' => $term->slug,
      'name' => $term->name
    ];
  endwhile;
endwhile;
?> 

 <div class="uk-child-width-1-3@m uk-grid-match content-main" uk-grid>  

<?php
while ( list($pos, $brands) = each($BrandCtgs) ) : 
  //print_r($Terms);
?>
     
        <div class="uk-card uk-card-secondary uk-card-hover">
          <div class="uk-card-body">
            <h3 class="uk-card-title">
              <a href="#">
                <?= 'BRAND '.$lists[$pos].' '.strtoupper($brands['name']) ?>
              </a>
            </h3>
          </div>
        </div>

    
<?php  endwhile;
?> </div>  
