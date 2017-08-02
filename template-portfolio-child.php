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
$selfPost = $post;
$pChild = new WP_Query( $args );

$HTMLlists = '';
if ($pChild->have_posts()):
   while ( $pChild->have_posts() ) : $pChild->the_post();
    if ( (int)$selfPost->ID != (int)$pChild->post->ID):
      $HTMLlists .= '<li><a href="' . get_permalink( $pChild->post->ID ) . '">'. esc_html($pChild->post->post_title) .'</a></li>';
    endif;
   endwhile;
   $HTMLlists .= '<li><a href="'. esc_url( home_url( '/' ) ) .'">FAVORITE WORKS</a></li>';
endif;
get_header('home'); 
?>

<style type="text/css">
  ul.category-nav-offcanvas {
    padding-right: 29px;
  }
  ul.category-nav-offcanvas > li {
    float: left;
    list-style: none;
    padding-left: 14px;
  }
  ul.category-nav-offcanvas > li > a{
    height: inherit;
    justify-content: space-between;
    color: #00A6DE;
    font-weight: 500;
    font-size: 0.685rem !important;
  }
  .header-offcanvas-title {
    padding-left: 43px;
  }
  .header-category-nav-offcanvas .section-offcanvas{
    -webkit-transition: width 2s, height 2s, background-color 2s, -webkit-transform 2s;
    transition: transform 2s;
  }

</style>

 <div id="primary"  class="uk-container  uk-container-large uk-padding-remove-left uk-padding-remove-right">
<?php if ( have_posts() ) : ?>

      <header class="header-category-nav-offcanvas animated slideInUp uk-hidden@m">
        <div class="uk-section uk-section-secondary section-offcanvas">
          <div class="uk-container uk-container-small">
               <h2 class="header-offcanvas-title"><?= $selfPost->post_title ?></h2>
          </div>
          <div class="uk-container uk-container-small uk-text-center">
            <ul class="category-nav-offcanvas">
        <?php if ($pChild->have_posts()): print $HTMLlists; endif; ?>
            </ul> <!-- .secondary-navigation -->
          </div>
        </div>
      </header>

      <header class="header-category-nav animated slideInUp uk-visible@m">
       <div class="uk-container uk-container-small uk-navbar">
         <div class="uk-navbar-left">
           <ul class="uk-navbar-nav category-title">
               <li class="uk-active"><a href="#"><h2><?= $selfPost->post_title ?></h2></a></li>
           </ul>
         </div>

         <div class="uk-navbar-right">
            <ul class="uk-navbar-nav uk-visible@m category-menu">
        <?php if ($pChild->have_posts()): print $HTMLlists; endif; ?>
            </ul> <!-- .secondary-navigation -->
         </div>

       </div>
     </header>

     <div id="primary-content" class="uk-container  uk-container-small">
      <div class="fw-containers">  
<?php $ContentType = get_post_meta( $selfPost->ID, 'content_type', true );
      $args = [ 'post_type' => $ContentType, 'orderby' => 'menu_order'];
      $ContentQuery = new WP_Query( $args );
      if ($ContentQuery->have_posts()):
        while ( $ContentQuery->have_posts() ) : $ContentQuery->the_post();  ?>

          <div class="fw-container uk-inline">
            <div class="fw-background-container"  style="background-image: url(<?= $thumb[0] ?>);">
              <div class="uk-label  uk-label-success uk-position-bottom-right ">
                <a href="<?= get_permalink() ?>">
                  <?= strtoupper( $ContentQuery->post->post_title ) ?>
                </a>
              </div>
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
