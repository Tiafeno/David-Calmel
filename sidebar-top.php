<?php

global $post;
$args = [ 'post_type' => 'page', 'post_parent' => $post->post_parent, 'orderby' => 'menu_order'];
$currentPost = $post;
$pChild = new WP_Query( $args );

$HTMLlists = '';
if ($pChild->have_posts()):
   while ( $pChild->have_posts() ) : $pChild->the_post();
    if ( (int)$currentPost->ID != (int)$pChild->post->ID):
      $HTMLlists .= '<li><a href="' . get_permalink( $pChild->post->ID ) . '">'. esc_html($pChild->post->post_title) .'</a></li>';
    endif;
   endwhile;
   $HTMLlists .= '<li><a href="'. esc_url( home_url( '/' ) ) .'">FAVORITE WORKS</a></li>';
endif;

?>

<header class="header-category-nav-offcanvas animated slideInUp uk-hidden@m">
  <div class="uk-section uk-section-secondary section-offcanvas">
    <div class="uk-container uk-container-small">
          <h2 class="header-offcanvas-title"><?= $currentPost->post_title ?></h2>
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
          <li class="uk-active"><a href="#"><h2><?= $currentPost->post_title ?></h2></a></li>
      </ul>
    </div>

    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav uk-visible@m category-menu">
  <?php if ($pChild->have_posts()): print $HTMLlists; endif; ?>
      </ul> <!-- .secondary-navigation -->
    </div>

  </div>
</header>