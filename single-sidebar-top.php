<?php

global $post;
$POST = (array)unserialize( POST );

$currentPost = $post;
$HTMLlists = '';
$args = [
  'name' => 'Portfolio',
  'post_type' => 'page'
];
$Portfolio = get_posts( $args );
$ParentID = $Portfolio[ 0 ]->ID;

function gtTitle( $posttype, $POST ){
  foreach ($POST as $postConfig) {
    if ($posttype == $postConfig['type']){
      return [
        'name' => $postConfig['name'],
        'type' => $posttype
        ];
    }
  }
}
$Title = gtTitle( $post->post_type , $POST );
$objTitle = (object) $Title;

$args = [ 
  'post_type' => 'page', 
  'post_parent' => $ParentID,
  'orderby' => 'menu_order'
];
$PortfolioPostChild = new WP_Query( $args );

if ($PortfolioPostChild->have_posts()):
  while ($PortfolioPostChild->have_posts()) : $PortfolioPostChild->the_post();
    $pChild = $PortfolioPostChild;
    if ($objTitle->name != $pChild->post->post_title){
      $HTMLlists .= '<li><a href="' . get_permalink( $pChild->post->ID ) . '">'.
       esc_html( $pChild->post->post_title ) .'</a></li>';
    } else {
      $title = $pChild->name;
    }
      
  endwhile;
  $HTMLlists .= '<li><a href="'. esc_url( home_url( '/' ) ) .'"> FAVORITE WORKS </a></li>';
endif;
?>

<header class="header-category-nav-offcanvas animated slideInUp uk-hidden@m">
  <div class="uk-section uk-section-secondary section-offcanvas">
    <div class="uk-container uk-container-small">
          <h2 class="header-offcanvas-title"><?= $objTitle->name ?></h2>
    </div>
    <div class="uk-container uk-container-small uk-text-center">
      <ul class="category-nav-offcanvas">
  <?php if ($PortfolioPostChild->have_posts()): print $HTMLlists; endif; ?>
      </ul> <!-- .secondary-navigation -->
    </div>
  </div>
</header>

<header class="header-category-nav animated slideInUp uk-visible@m">
  <div class="uk-container uk-container-small uk-navbar">
    <div class="uk-navbar-left">
      <ul class="uk-navbar-nav category-title">
          <li class="uk-active"><a href="#"><h2><?= $objTitle->name ?></h2></a></li>
      </ul>
    </div>

    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav uk-visible@m category-menu">
  <?php if ($PortfolioPostChild->have_posts()): print $HTMLlists; endif; ?>
      </ul> <!-- .secondary-navigation -->
    </div>

  </div>
</header>