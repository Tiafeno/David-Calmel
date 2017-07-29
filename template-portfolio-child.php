<?php
/**
 * Template Name: Child Portfolio Page
 *
 * @package Tiafeno
 * @subpackage David-Calmel
 * @since David Calmel 1.0
 */

global $post;
$args = [ 'post_type' => 'page', 'post_parent' => $post->post_parent, 'orderby' => 'menu_order'];
$selfPostID = $post->ID;
$pChild = new WP_Query( $args );
get_header('home'); ?>

 <div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right">
<?php if ( have_posts() ) : ?>
      <header class="header-category-nav">
       <div class="uk-container uk-container-small uk-navbar">
         <div class="uk-navbar-left">
           <ul class="uk-navbar-nav category-title">
               <li class="uk-active"><a href="#"><h2><?= get_Title() ?></h2></a></li>
           </ul>
         </div>

         <div class="uk-navbar-right">
            <ul class="uk-navbar-nav uk-visible@m category-menu">
      <?php if ($pChild->have_posts()):
              while ( $pChild->have_posts() ) : $pChild->the_post();
                if ( (int)$selfPostID != (int)$pChild->post->ID): ?>
                    <li><a href="<?= get_permalink( $pChild->post->ID ) ?>"><?= esc_html($pChild->post->post_title) ?></a></li>
         <?php  endif;
              endwhile; ?>
                    <li><a href="<?= esc_url( home_url( '/' ) ) ?>">Favorite Works</a></li>
      <?php endif; ?>
            </ul> <!-- .secondary-navigation -->
         </div>

       </div>
     </header>
     <div id="primary-content" class="uk-container  uk-container-small">
      <div class="uk-child-width-1-3@m uk-grid-match content-main" uk-grid>  
<?php
    $ContentType = get_post_meta( $selfPostID, 'content_type', true );
    $args = [ 'post_type' => $ContentType, 'orderby' => 'menu_order'];
    $ContentQuery = new WP_Query( $args );
    if ($ContentQuery->have_posts()):
      while ( $ContentQuery->have_posts() ) : $ContentQuery->the_post();  ?>
        <div class="uk-card uk-card-primary">
          <div class="uk-card-body">
            <h3 class="uk-card-title">
              <a href="#">
                <?= $ContentQuery->post->post_title ?>
              </a>
            </h3>
          </div>
        </div>

<?php endwhile;
    endif;    ?> 
      </div> 
    </div> 
<?php
   else :
     get_template_part( 'tpls/content', 'none' );
   endif;
   ?>
  </div>
</div>
 <?php wp_footer(); ?>
</body>
</html>
