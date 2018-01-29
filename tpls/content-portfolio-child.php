<?php
global $post, $MODEL;
/** Polylang class */
$langIds = PLL()->model->post->get_translations(get_the_ID());
$ContentType = $MODEL->getSettings('post_type', ['page_id', $langIds['en']]);
$args = [ 'post_type' => $ContentType, 'orderby' => 'menu_order', 'posts_per_page' => -1];
$request = new WP_Query( $args );
if ($request->have_posts( )):
  $index = 0;
  while ( $request->have_posts( ) ) : $request->the_post( );
    $url =  get_the_post_thumbnail_url( $request->post->ID, [300, 300] );
    if (empty( $url ) || $url === ''){
      $url = get_template_directory_uri().'/images/cover.jpg';
    }  
    $post_type = "";
    /**
     * ************************************
     * Si le contenue est un 'Brand place' 
     * ************************************
     */
    if ($request->post->post_type === 'plus_brand'):
      $terms = get_the_terms($request->post, 'brand_place');
      if ( ! is_wp_error( $terms ) && $terms != false) {
        $post_type  = empty($terms) ? "" : $terms[0]->name;
      }
    endif;
    /**
     * **********************************
     */
?>
    <div class="fw-background-container" id="brand_<?= $index ?>" data-name="" data-container='{"w":225, "h":"auto"}' style="background-image: url(<?= $url ?>); width:225px; height: 225px">
      <div class="uk-label uk-position-bottom-left fw-box-title " id="name_<?= $key ?>">
        <div><a class="dc-title" href="<?= get_permalink( $request->post->ID ) ?>"><?= strtoupper( $request->post->post_title ) ?></a></div>
        <div><p class="dc-post_type" style="font-size: 11px"><?= $post_type ?></p></div>
      </div>
    </div>

<?php 
    $index++;
  endwhile;
endif;    